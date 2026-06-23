-- WeDoEarth — Leads table schema
-- Compatible with MySQL 8.0+ and MariaDB 10.5+
-- Import via Hostinger phpMyAdmin: Database → Import → select this file

-- Create and select the database
-- CREATE DATABASE IF NOT EXISTS `wedoearth`
--   CHARACTER SET utf8mb4
--   COLLATE utf8mb4_unicode_ci;
-- USE `wedoearth`;

-- ─────────────────────────────────────────────────────────────────
-- Table: leads
-- Stores buyer enquiry submissions from kudil.php and platform.php.
-- ─────────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `leads` (
  `id`               INT UNSIGNED      NOT NULL AUTO_INCREMENT,

  -- Contact details
  `name`             VARCHAR(120)      NOT NULL,
  `email`            VARCHAR(254)      NOT NULL DEFAULT '',
  `phone`            VARCHAR(20)       NOT NULL,         -- stored as entered, not normalised

  -- Enquiry context
  `unit_interest`    VARCHAR(120)      NOT NULL DEFAULT '',
  `purpose`          VARCHAR(50)       NOT NULL DEFAULT '',
  `budget_readiness` VARCHAR(50)       NOT NULL DEFAULT '',
  `timeline`         VARCHAR(50)       NOT NULL DEFAULT '',
  `message`          TEXT              NULL,

  -- Compliance & audit
  `dpdp_consent`     TINYINT(1)        NOT NULL DEFAULT 0,   -- 1 = consent given
  `ip_address`       VARCHAR(45)       NOT NULL DEFAULT '',  -- supports IPv6
  `user_agent`       VARCHAR(512)      NULL,

  -- CRM fields (update manually or via admin)
  `status`           ENUM('new','contacted','visit_scheduled','converted','closed')
                     NOT NULL DEFAULT 'new',
  `assigned_to`      VARCHAR(80)       NULL,
  `notes`            TEXT              NULL,

  -- Timestamps
  `created_at`       DATETIME          NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`       DATETIME          NOT NULL DEFAULT CURRENT_TIMESTAMP
                                       ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY (`id`),
  INDEX `idx_phone`      (`phone`),
  INDEX `idx_status`     (`status`),
  INDEX `idx_created_at` (`created_at`)

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Buyer enquiry leads — WeDoEarth';


-- ─────────────────────────────────────────────────────────────────
-- Table: rate_limits
-- DB-backed IP rate limiter for api/leads.php.
-- Session-based counters are bypassable by omitting cookies;
-- this table is not. Rows are keyed by SHA-256(IP).
-- ─────────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `rate_limits` (
  `ip_hash`      CHAR(64)     NOT NULL,
  `window_start` INT UNSIGNED NOT NULL,
  `count`        SMALLINT     NOT NULL DEFAULT 1,
  PRIMARY KEY (`ip_hash`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COMMENT='IP-based rate limit state for the leads API';


-- ─────────────────────────────────────────────────────────────────
-- Table: builder_leads (future — list-your-project intake)
-- ─────────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `builder_leads` (
  `id`            INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(120)  NOT NULL,
  `phone`         VARCHAR(20)   NOT NULL,
  `project_name`  VARCHAR(200)  NOT NULL DEFAULT '',
  `ip_address`    VARCHAR(45)   NOT NULL DEFAULT '',
  `status`        ENUM('new','reviewing','approved','rejected')
                  NOT NULL DEFAULT 'new',
  `created_at`    DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
                                ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_status` (`status`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Builder / developer list-your-project submissions';


-- ─────────────────────────────────────────────────────────────────
-- Useful admin queries
-- ─────────────────────────────────────────────────────────────────

-- View all new leads, newest first:
-- SELECT id, name, phone, unit_interest, purpose, budget_readiness, timeline, created_at
--   FROM leads WHERE status = 'new' ORDER BY created_at DESC;

-- Count leads by status:
-- SELECT status, COUNT(*) AS total FROM leads GROUP BY status;

-- Mark a lead as contacted:
-- UPDATE leads SET status = 'contacted', assigned_to = 'Karthick' WHERE id = 1;

-- Export to CSV (run from MySQL shell):
-- SELECT * FROM leads INTO OUTFILE '/tmp/leads_export.csv'
--   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
--   LINES TERMINATED BY '\n';
