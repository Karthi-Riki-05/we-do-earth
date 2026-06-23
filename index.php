<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WeDoEarth — Land you can trust. Homes that give back.</title>
<meta name="description" content="Title-verified, sustainability-first real estate in Tamil Nadu. Browse verified projects, starting with Kudil courtyard villas at Navalur, OMR.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/wde.css">
<style>
  .wde-hero-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:56px;align-items:center;}
  .wde-mission-grid{display:grid;grid-template-columns:1.25fr .75fr;gap:56px;align-items:start;}
  .wde-pillars{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;}
  .wde-do-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;}
  .wde-trust-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--line);}
  .wde-footer-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:36px;}
  @media(max-width:900px){
    .wde-hero-grid{grid-template-columns:1fr!important;gap:38px;}
    .wde-mission-grid{grid-template-columns:1fr!important;gap:28px;}
    .wde-pillars{grid-template-columns:1fr 1fr!important;}
    .wde-do-grid{grid-template-columns:1fr 1fr!important;}
  }
  @media(max-width:640px){
    .wde-pillars{grid-template-columns:1fr!important;}
    .wde-do-grid{grid-template-columns:1fr!important;}
    .wde-trust-grid{grid-template-columns:1fr!important;}
    .hero-h1{font-size:40px!important;}
    .mission-bq{font-size:28px!important;}
  }
</style>
</head>
<body>
<div style="min-height:100vh;background:var(--ground);overflow-x:hidden;">
<?php $activePage='home'; include 'includes/nav.php'; ?>

<!-- HERO -->
<section style="max-width:1240px;margin:0 auto;padding:64px 28px 30px;">
  <div class="wde-hero-grid">
    <div style="animation:wde-rise .7s ease both;">
      <div class="wde-eyebrow" style="margin-bottom:22px;">
        <span class="wde-eyebrow-text">Tamil Nadu · Real estate for generations</span>
      </div>
      <h1 class="hero-h1" style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:58px;line-height:1.04;letter-spacing:-.025em;margin:0 0 22px;text-wrap:balance;">
        Land you can trust.<br>Homes that <span style="color:var(--brand);">give back.</span>
      </h1>
      <p style="font-size:18px;line-height:1.6;color:var(--ink-soft);max-width:520px;margin:0 0 32px;">We verify every title and build around nature — because a home should outlast us, and leave the earth better than we found it. Starting in Tamil Nadu.</p>
      <div style="display:flex;flex-wrap:wrap;gap:14px;">
        <a href="kudil.php" class="btn-primary" style="font-size:15px;">See our project: Kudil</a>
        <a href="sustainability.php" class="btn-outline">Our promise to nature</a>
      </div>
      <div style="display:flex;gap:30px;margin-top:42px;padding-top:28px;border-top:1px solid var(--line);">
        <div>
          <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:26px;">1</div>
          <div style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft);margin-top:4px;">Live project</div>
        </div>
        <div>
          <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:26px;">100%</div>
          <div style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft);margin-top:4px;">Title verified</div>
        </div>
        <div>
          <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:26px;">2050</div>
          <div style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft);margin-top:4px;">Built for</div>
        </div>
      </div>
    </div>

    <!-- Now Selling Card -->
    <div style="animation:wde-rise .7s .12s ease both;background:var(--paper);border:1px solid var(--line);border-radius:18px;overflow:hidden;box-shadow:0 30px 60px -28px rgba(20,32,27,.35);">
      <div style="position:relative;height:248px;background:repeating-linear-gradient(135deg,#dcd6c4,#dcd6c4 11px,#e2ddce 11px,#e2ddce 22px);display:flex;align-items:flex-end;justify-content:space-between;padding:16px;">
        <span style="position:absolute;top:16px;left:16px;display:inline-flex;align-items:center;gap:7px;background:var(--brand);color:#fff;font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;padding:6px 11px;border-radius:8px;">
          <span style="width:6px;height:6px;border-radius:50%;background:var(--mint);box-shadow:0 0 0 3px rgba(63,174,127,.35);"></span>Now selling
        </span>
        <span style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);background:rgba(246,244,236,.7);padding:5px 9px;border-radius:7px;">[ courtyard villa render ]</span>
        <span style="display:inline-flex;align-items:center;gap:6px;background:var(--ink);color:var(--paper);font-size:12px;font-weight:500;padding:7px 12px;border-radius:20px;">📍 Navalur · OMR</span>
      </div>
      <div style="padding:24px 24px 26px;">
        <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:23px;margin:0 0 5px;letter-spacing:-.01em;">Kudil — courtyard villas</h3>
        <p style="font-size:13.5px;color:var(--ink-soft);margin:0 0 18px;">by Natarajan Estates · <strong style="color:var(--brand);">2 villas available</strong></p>
        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px;">
          <span class="mono-tag">4 BHK</span>
          <span class="mono-tag">2,662 sqft</span>
          <span class="mono-tag">₹2.45 Cr*</span>
        </div>
        <div style="display:flex;gap:10px;">
          <a href="kudil.php" style="flex:1;text-align:center;background:var(--brand);color:#fff;font-weight:600;font-size:14px;padding:12px;border-radius:10px;transition:background .18s ease;" onmouseover="this.style.background='var(--brand-deep)'" onmouseout="this.style.background='var(--brand)'">View project</a>
          <a href="kudil.php#enquire" style="flex:1;text-align:center;border:1.5px solid var(--line);font-weight:600;font-size:14px;padding:12px;border-radius:10px;transition:border-color .18s ease,color .18s ease;" onmouseover="this.style.borderColor='var(--brand)';this.style.color='var(--brand)'" onmouseout="this.style.borderColor='';this.style.color=''">Book a visit</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MISSION BAND -->
<section style="background:var(--brand-deep);color:var(--paper);margin-top:48px;">
  <div style="max-width:1240px;margin:0 auto;padding:84px 28px;">
    <div class="wde-eyebrow wde-eyebrow--light" style="margin-bottom:34px;">
      <span class="wde-eyebrow-text">Why we exist</span>
    </div>
    <div class="wde-mission-grid">
      <blockquote class="mission-bq" style="margin:0;font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:38px;line-height:1.18;letter-spacing:-.02em;text-wrap:balance;">
        Real estate isn't just selling land — it's creating a <span style="color:var(--mint);">sustainable livelihood</span> for the generations to come.
      </blockquote>
      <p style="font-size:16px;line-height:1.7;color:rgba(246,244,236,.78);margin:8px 0 0;">We do two things others don't: we <strong style="color:var(--paper);">prove the ground is clean</strong> — verified title, real approvals, no disputes — and we <strong style="color:var(--paper);">build in a way that gives back</strong> to nature. A home should be an inheritance, not a liability.</p>
    </div>
    <div class="wde-pillars" style="margin-top:56px;">
      <?php $pillars=[
        ['01','Design with nature','Courtyards, light and cross-ventilation over concrete.'],
        ['02','Protect water & green','Keep the lakes, the trees and clean groundwater.'],
        ['03','Lighter on energy','Cool roofing, solar-ready homes, efficient fixtures.'],
        ['04','Responsible land','Verify title and approvals before a thing is listed.'],
      ];
      foreach($pillars as $p):?>
      <div style="border:1px solid rgba(246,244,236,.16);border-radius:14px;padding:22px;background:rgba(246,244,236,.03);">
        <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--mint);letter-spacing:.1em;margin-bottom:14px;"><?= $p[0] ?></div>
        <div style="font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:17px;margin-bottom:7px;"><?= $p[1] ?></div>
        <p style="font-size:13.5px;line-height:1.55;color:rgba(246,244,236,.66);margin:0;"><?= $p[2] ?></p>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- WHAT WE DO -->
<section style="max-width:1240px;margin:0 auto;padding:84px 28px 30px;">
  <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:24px;margin-bottom:36px;flex-wrap:wrap;">
    <div>
      <div class="wde-eyebrow" style="margin-bottom:18px;">
        <span class="wde-eyebrow-text">What we do</span>
      </div>
      <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:34px;letter-spacing:-.02em;margin:0;">Everything around the land — verified.</h2>
    </div>
    <a href="platform.php" style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:var(--brand);">See the full platform →</a>
  </div>
  <div class="wde-do-grid">
    <?php $cards=[
      ['properties.php','BROWSE','Browse properties','Verified projects across Tamil Nadu, in one place.'],
      ['platform.php#verify','VERIFY','Verify a title','Title due-diligence before you ever pay a rupee.'],
      ['platform.php#manage','MANAGE','Manage property','Tenants, rent and upkeep, handled in one dashboard.'],
      ['platform.php#invest','INVEST','Invest fractionally','Via SEBI-registered SM REIT partners. Risks apply.'],
    ];
    foreach($cards as $c):?>
    <a href="<?= $c[0] ?>" class="wde-card wde-card-link" style="display:flex;flex-direction:column;min-height:188px;">
      <span style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--brand);letter-spacing:.1em;margin-bottom:auto;"><?= $c[1] ?></span>
      <div style="font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:19px;margin:18px 0 6px;"><?= $c[2] ?></div>
      <p style="font-size:13.5px;color:var(--ink-soft);line-height:1.5;margin:0;"><?= $c[3] ?></p>
    </a>
    <?php endforeach;?>
  </div>
</section>

<!-- TRUST STRIP -->
<section style="max-width:1240px;margin:0 auto;padding:40px 28px 84px;">
  <div class="wde-trust-grid" style="border:1px solid var(--line);border-radius:16px;overflow:hidden;">
    <div style="background:var(--ground-2);padding:30px 28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:var(--brand);margin-bottom:12px;">One live project</div>
      <p style="font-size:14.5px;line-height:1.55;color:var(--ink-soft);margin:0;">We'd rather do one project right than list a hundred we can't stand behind.</p>
    </div>
    <div style="background:var(--ground-2);padding:30px 28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:var(--brand);margin-bottom:12px;">Verified-first</div>
      <p style="font-size:14.5px;line-height:1.55;color:var(--ink-soft);margin:0;">Title, approvals and disputes checked before anything reaches you.</p>
    </div>
    <div style="background:var(--ground-2);padding:30px 28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:var(--brand);margin-bottom:12px;">Built for 2050</div>
      <p style="font-size:14.5px;line-height:1.55;color:var(--ink-soft);margin:0;">Homes designed to age well — for your family and the land around them.</p>
    </div>
  </div>
</section>

<!-- CLOSING CTA -->
<section style="background:var(--brand-deep);color:var(--paper);position:relative;overflow:hidden;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:linear-gradient(rgba(246,244,236,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(246,244,236,.05) 1px,transparent 1px);background-size:46px 46px;opacity:.6;"></div>
  <div style="max-width:1240px;margin:0 auto;padding:72px 28px;display:flex;align-items:center;justify-content:space-between;gap:40px;flex-wrap:wrap;position:relative;">
    <div>
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11.5px;letter-spacing:.2em;text-transform:uppercase;color:var(--mint);margin-bottom:14px;">Navalur · OMR, Chennai</div>
      <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:40px;letter-spacing:-.02em;margin:0;text-wrap:balance;">Looking for a home at Navalur?</h2>
    </div>
    <a href="kudil.php#enquire" style="background:var(--mint);color:var(--ink);font-weight:700;font-size:16px;padding:17px 32px;border-radius:12px;white-space:nowrap;box-shadow:0 14px 32px rgba(63,174,127,.3);transition:background .18s ease;" onmouseover="this.style.background='#fff'" onmouseout="this.style.background='var(--mint)'">Book a visit to Kudil</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
</div>
</body>
</html>
