<?php
/**
 * WeDoEarth — Secure Lead Ingestion API
 * POST /api/leads.php — accepts JSON, persists to MySQL via PDO, fires email.
 *
 * Security:
 *  - CSRF token validation (session-bound, per-form token)
 *  - AJAX-only (X-Requested-With header check)
 *  - Server-side re-validation of every client constraint
 *  - PDO prepared statements (SQL injection prevention)
 *  - strip_tags() at ingestion; HTML escaping at output, not storage
 *  - CRLF stripped from all email header values (header injection prevention)
 *  - DB-based rate limiting per IP (not bypassable via cookie omission)
 *  - Input length caps
 */

declare(strict_types=1);

// ── Security headers ─────────────────────────────────────────────────────────
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Cache-Control: no-store');

// ── Config ───────────────────────────────────────────────────────────────────
$_envPath = __DIR__ . '/../.env';
if (file_exists($_envPath)) {
    foreach (file($_envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $_line) {
        if ($_line[0] === '#' || !str_contains($_line, '=')) continue;
        [$_k, $_v] = explode('=', $_line, 2);
        $_ENV[trim($_k)] = trim($_v, " \t\n\r\0\x0B\"'");
    }
}

define('DB_HOST',    $_ENV['DB_HOST']    ?? 'localhost');
define('DB_NAME',    $_ENV['DB_NAME']    ?? 'wedoearth');
define('DB_USER',    $_ENV['DB_USER']    ?? '');
define('DB_PASS',    $_ENV['DB_PASS']    ?? '');
define('DB_CHARSET', 'utf8mb4');

define('NOTIFY_TO',      $_ENV['NOTIFY_TO']      ?? '');
define('NOTIFY_FROM',    $_ENV['NOTIFY_FROM']    ?? '');
define('NOTIFY_SUBJECT', $_ENV['NOTIFY_SUBJECT'] ?? '[WeDoEarth] New lead');

define('RATE_LIMIT_MAX',    5);
define('RATE_LIMIT_WINDOW', 3600);

// ── Helpers ──────────────────────────────────────────────────────────────────

function respond(bool $ok, string $message = '', string $errorMsg = ''): never
{
    if ($ok) {
        echo json_encode(['ok' => true, 'message' => $message]);
    } else {
        echo json_encode(['ok' => false, 'error' => $errorMsg ?: $message]);
    }
    exit;
}

/** Strip HTML tags and trim — safe for DB storage. No HTML encoding here (wrong layer). */
function sanitize(string $val): string
{
    return strip_tags(trim($val));
}

/** Strip all CR/LF characters — must be applied to any value used in email headers. */
function stripCrlf(string $val): string
{
    return str_replace(["\r", "\n"], '', $val);
}

function validatePhone(string $phone): bool
{
    $stripped = preg_replace('/[\s\-()]/', '', $phone);
    return (bool) preg_match('/^(\+91|91|0)?[6-9]\d{9}$/', $stripped);
}

// ── Request guards ───────────────────────────────────────────────────────────

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    respond(false, '', 'Method not allowed.');
}

if (($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') !== 'XMLHttpRequest') {
    http_response_code(403);
    respond(false, '', 'Forbidden.');
}

// ── Parse body ───────────────────────────────────────────────────────────────

$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!is_array($body)) {
    http_response_code(400);
    respond(false, '', 'Invalid request body.');
}

// ── CSRF validation ───────────────────────────────────────────────────────────

session_start();

$submittedToken = $body['csrf_token'] ?? '';
$sessionToken   = $_SESSION['csrf_token'] ?? '';

if (
    $sessionToken === '' ||
    !hash_equals($sessionToken, $submittedToken)
) {
    http_response_code(403);
    respond(false, '', 'Invalid or expired form token. Please refresh the page and try again.');
}

// Rotate the token after a successful validation attempt to prevent reuse
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// ── DB connection (used for both rate limiting and lead storage) ──────────────

try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_NAME, DB_CHARSET);
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    error_log('[WeDoEarth] DB connect error: ' . $e->getMessage());
    http_response_code(500);
    respond(false, '', 'Service temporarily unavailable. Please email us directly.');
}

// ── DB-based rate limiting ───────────────────────────────────────────────────
// Stored in the `rate_limits` table — not session-based, so cannot be bypassed
// by omitting cookies. Each IP gets at most RATE_LIMIT_MAX submissions per window.

$ip     = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$ipHash = hash('sha256', $ip);
$now    = time();

try {
    $pdo->beginTransaction();

    $rl = $pdo->prepare('SELECT count, window_start FROM rate_limits WHERE ip_hash = ? FOR UPDATE');
    $rl->execute([$ipHash]);
    $row = $rl->fetch();

    if (!$row || ($now - (int)$row['window_start']) > RATE_LIMIT_WINDOW) {
        $pdo->prepare('REPLACE INTO rate_limits (ip_hash, window_start, count) VALUES (?, ?, 1)')
            ->execute([$ipHash, $now]);
        $currentCount = 1;
    } else {
        $currentCount = (int)$row['count'] + 1;
        $pdo->prepare('UPDATE rate_limits SET count = ? WHERE ip_hash = ?')
            ->execute([$currentCount, $ipHash]);
    }

    $pdo->commit();

    if ($currentCount > RATE_LIMIT_MAX) {
        http_response_code(429);
        respond(false, '', 'Too many submissions. Please try again later.');
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    error_log('[WeDoEarth] Rate limit DB error: ' . $e->getMessage());
    // Fall through — don't block valid users if rate limit table is unavailable
}

// ── Field extraction & sanitisation ─────────────────────────────────────────

$name     = sanitize((string) ($body['name']    ?? ''));
$email    = sanitize((string) ($body['email']   ?? ''));
$phone    = sanitize((string) ($body['phone']   ?? ''));
$unit     = sanitize((string) ($body['unit']    ?? ''));
$purpose  = sanitize((string) ($body['purpose'] ?? ''));
$budget   = sanitize((string) ($body['budget']  ?? ''));
$timeline = sanitize((string) ($body['timeline'] ?? ''));
$message  = sanitize((string) ($body['message'] ?? ''));
$consent  = filter_var($body['dpdp_consent'] ?? false, FILTER_VALIDATE_BOOLEAN);

// ── Server-side validation ───────────────────────────────────────────────────

$errors = [];

if ($name === '' || mb_strlen($name) < 2) {
    $errors[] = 'Name must be at least 2 characters.';
} elseif (mb_strlen($name) > 120) {
    $errors[] = 'Name is too long.';
}

if ($email === '') {
    $errors[] = 'Email address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
} elseif (mb_strlen($email) > 254) {
    $errors[] = 'Email address is too long.';
}

if (!validatePhone($phone)) {
    $errors[] = 'A valid +91 Indian mobile number is required.';
}

$validPurpose  = ['Live in', 'Invest', 'Both', 'Builder/List project', ''];
$validBudget   = ['Ready to buy', 'Needs finance', 'Just exploring', ''];
$validTimeline = ['Immediately', '1–3 months', '3–6 months', '6+ months', ''];

if (!in_array($purpose, $validPurpose, true)) {
    $errors[] = 'Invalid purpose value.';
}
if (!in_array($budget, $validBudget, true)) {
    $errors[] = 'Invalid budget value.';
}
if (!in_array($timeline, $validTimeline, true)) {
    $errors[] = 'Invalid timeline value.';
}
if (mb_strlen($unit) > 120) {
    $errors[] = 'Unit field is too long.';
}
if (mb_strlen($message) > 2000) {
    $errors[] = 'Message is too long (max 2,000 characters).';
}
if (!$consent) {
    $errors[] = 'DPDP consent is required.';
}

if (!empty($errors)) {
    http_response_code(422);
    respond(false, '', implode(' ', $errors));
}

// ── Persist to MySQL via PDO ──────────────────────────────────────────────────

try {
    $ua = mb_substr(sanitize($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 512);

    $stmt = $pdo->prepare(
        'INSERT INTO leads
            (name, email, phone, unit_interest, purpose, budget_readiness, timeline, message, dpdp_consent, ip_address, user_agent)
         VALUES
            (:name, :email, :phone, :unit, :purpose, :budget, :timeline, :message, :consent, :ip, :ua)'
    );

    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':phone'   => $phone,
        ':unit'    => $unit,
        ':purpose' => $purpose,
        ':budget'  => $budget,
        ':timeline'=> $timeline,
        ':message' => $message,
        ':consent' => 1,
        ':ip'      => $ip,
        ':ua'      => $ua,
    ]);

    $leadId = $pdo->lastInsertId();

} catch (PDOException $e) {
    error_log('[WeDoEarth] DB error: ' . $e->getMessage());
    http_response_code(500);
    respond(false, '', 'We could not save your enquiry right now. Please email us directly.');
}

// ── Send email notification ──────────────────────────────────────────────────
// stripCrlf() is applied to every value that goes into an email header to
// prevent header injection. Plain-text body values don't need it.

$emailBody = implode("\n", [
    "New lead #" . $leadId . " received on WeDoEarth.",
    "",
    "Name      : $name",
    "Email     : $email",
    "Phone     : $phone",
    "Unit      : " . ($unit     ?: 'Any available'),
    "Purpose   : " . ($purpose  ?: 'Not specified'),
    "Budget    : " . ($budget   ?: 'Not specified'),
    "Timeline  : " . ($timeline ?: 'Not specified'),
    "Message   : " . ($message  ?: '—'),
    "",
    "DPDP Consent: Yes",
    "IP Address  : $ip",
    "Submitted   : " . date('Y-m-d H:i:s T'),
    "",
    "---",
    "WeDoEarth — Real estate, verified.",
    "DO NOT reply to this automated message.",
]);

// CRLF stripped from header values to prevent injection
$safeFrom    = stripCrlf(NOTIFY_FROM);
$safeName    = stripCrlf($name);
$safeEmail   = stripCrlf($email);
$replyTo     = ($safeEmail !== '') ? "$safeName <$safeEmail>" : $safeFrom;

$headers = implode("\r\n", [
    'From: WeDoEarth Leads <' . $safeFrom . '>',
    'Reply-To: ' . $replyTo,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8',
    'MIME-Version: 1.0',
]);

$sent = mail(NOTIFY_TO, NOTIFY_SUBJECT . ' #' . $leadId, $emailBody, $headers);

if (!$sent) {
    error_log('[WeDoEarth] mail() failed for lead #' . $leadId);
}

// ── Success ──────────────────────────────────────────────────────────────────

respond(true, 'Enquiry received. We will call you within 24 hours.');
