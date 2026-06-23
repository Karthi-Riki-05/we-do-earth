<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sustainability — WeDoEarth</title>
<meta name="description" content="We don't just sell land. We grow what lives on it. Our environmental promise: design with nature, protect water, lighter on energy, responsible land.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/wde.css">
<style>
  .s-commit{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
  .s-goals{display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;}
</style>
</head>
<body>
<div style="min-height:100vh;background:var(--ground);overflow-x:hidden;">
<?php $activePage='sustainability'; $navDark=true; include 'includes/nav.php'; ?>

<!-- HERO -->
<section style="background:var(--brand-deep);color:var(--paper);position:relative;overflow:hidden;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:linear-gradient(rgba(246,244,236,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(246,244,236,.05) 1px,transparent 1px);background-size:46px 46px;opacity:.55;"></div>
  <div style="max-width:1240px;margin:0 auto;padding:80px 28px 84px;position:relative;">
    <div class="wde-eyebrow wde-eyebrow--light" style="margin-bottom:24px;">
      <span class="wde-eyebrow-text">Our initiative</span>
    </div>
    <h1 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:58px;line-height:1.04;letter-spacing:-.025em;margin:0 0 22px;max-width:880px;text-wrap:balance;">
      We don't just sell land. We grow what <span style="color:var(--mint);">lives on it.</span>
    </h1>
    <p style="font-size:18px;line-height:1.6;color:rgba(246,244,236,.78);max-width:600px;margin:0;">A home should be an inheritance, not a footprint. We hold land in trust for the next generation — verifying what's beneath it and protecting what grows on it.</p>
  </div>
</section>

<!-- BELIEF -->
<section style="max-width:1240px;margin:0 auto;padding:72px 28px 40px;">
  <div style="border:1px solid var(--line);border-left:3px solid var(--brand);border-radius:14px;background:var(--paper);padding:44px;">
    <blockquote style="margin:0 0 22px;font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:34px;line-height:1.2;letter-spacing:-.02em;text-wrap:balance;">
      Real estate isn't just selling land — it's creating a <span style="color:var(--brand);">sustainable livelihood</span> for the generations to come.
    </blockquote>
    <p style="font-size:16px;line-height:1.7;color:var(--ink-soft);margin:0;max-width:760px;">Sustainability isn't a feature we bolt on — it's the reason we exist. Every project we touch has to leave the land, the water and the people around it better than we found them. That belief shapes what we build, where we build it, and what we refuse to list.</p>
  </div>
</section>

<!-- FOUR COMMITMENTS -->
<section style="max-width:1240px;margin:0 auto;padding:40px 28px 30px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Four commitments</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:34px;letter-spacing:-.02em;margin:0 0 30px;">How we give back, in practice.</h2>
  <div class="s-commit">
    <?php $commits=[
      ['01','Design with nature',[
        'Central courtyards and double-height spaces',
        'Cross-ventilation and natural light by default',
        'Human-centric layouts that cut energy use',
      ]],
      ['02','Protect water & green',[
        'Retain native trees and existing lakes',
        'Rainwater harvesting and groundwater recharge',
        'Water & sewage treatment; clean groundwater',
      ]],
      ['03','Lighter on energy',[
        'Heat-reflective "cool" roofing',
        'Solar-ready homes',
        'Efficient fixtures and LED lighting throughout',
      ]],
      ['04','Responsible land',[
        'Title verified before anything is listed',
        'No encroached or disputed parcels',
        'RERA compliance on every project',
      ]],
    ];
    foreach($commits as $c):?>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:30px;">
      <div style="display:flex;align-items:baseline;gap:12px;margin-bottom:16px;">
        <span style="font-family:'IBM Plex Mono',monospace;font-size:13px;color:var(--mint);"><?= $c[0] ?></span>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:21px;margin:0;"><?= $c[1] ?></h3>
      </div>
      <ul style="margin:0;padding-left:18px;font-size:14.5px;line-height:1.75;color:var(--ink-soft);">
        <?php foreach($c[2] as $li):?><li><?= $li ?></li><?php endforeach;?>
      </ul>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- WHAT IT LOOKS LIKE ON THE GROUND -->
<section style="background:var(--brand-deep);color:var(--paper);margin-top:40px;">
  <div style="max-width:1240px;margin:0 auto;padding:64px 28px;">
    <div class="wde-eyebrow wde-eyebrow--light" style="margin-bottom:16px;">
      <span class="wde-eyebrow-text">On the ground</span>
    </div>
    <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:34px;letter-spacing:-.02em;margin:0 0 30px;">What the belief looks like at Kudil.</h2>
    <div style="display:flex;flex-wrap:wrap;gap:11px;">
      <?php $items=[
        'Private central courtyard','Double-height living',
        'Cross-ventilated layout','Heat-reflective cool terrace tiles',
        'Solar-ready roof structure','2 lakes bordered & retained',
        'Native tree canopy preserved','Rainwater harvest channels',
        'Water & sewage treatment plant','Clean-bore underground water',
        '5 private parks within township','Landscaped streets (not concrete)',
      ];
      foreach($items as $it):?>
      <span style="font-size:14px;background:rgba(246,244,236,.07);border:1px solid rgba(246,244,236,.18);padding:10px 16px;border-radius:30px;"><?= $it ?></span>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- GOALS vs LIVE -->
<section style="max-width:1240px;margin:0 auto;padding:64px 28px 30px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Honest framing</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:34px;letter-spacing:-.02em;margin:0 0 26px;">Goals vs. what's live today.</h2>
  <div class="s-goals">
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--mint);letter-spacing:.1em;margin-bottom:14px;">✓ LIVE NOW</div>
      <ul style="margin:0;padding-left:18px;font-size:14px;line-height:1.8;color:var(--ink-soft);">
        <li>Title-verified listings only</li>
        <li>Courtyard + cross-ventilation design</li>
        <li>Cool roofing material spec</li>
        <li>Lake & tree buffer maintained</li>
        <li>Water treatment in township</li>
      </ul>
    </div>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--brass);letter-spacing:.1em;margin-bottom:14px;">⟳ IN PROGRESS</div>
      <ul style="margin:0;padding-left:18px;font-size:14px;line-height:1.8;color:var(--ink-soft);">
        <li>Solar panel installation (on handover)</li>
        <li>EV charging infrastructure</li>
        <li>Rainwater harvest system commissioning</li>
        <li>RERA filing pending confirmation</li>
      </ul>
    </div>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--clay);letter-spacing:.1em;margin-bottom:14px;">◎ ON THE ROADMAP</div>
      <ul style="margin:0;padding-left:18px;font-size:14px;line-height:1.8;color:var(--ink-soft);">
        <li>Native species planting programme</li>
        <li>Compost & organic waste circuit</li>
        <li>Community solar grid (future phases)</li>
        <li>Third-party sustainability audit</li>
      </ul>
    </div>
  </div>
</section>

<!-- CLOSING CTA -->
<section style="max-width:1240px;margin:0 auto;padding:30px 28px 80px;">
  <div style="background:var(--brand-deep);color:var(--paper);border-radius:18px;padding:56px 48px;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap;position:relative;overflow:hidden;">
    <div aria-hidden="true" style="position:absolute;inset:0;background-image:linear-gradient(rgba(246,244,236,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(246,244,236,.05) 1px,transparent 1px);background-size:40px 40px;opacity:.6;"></div>
    <div style="position:relative;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--mint);margin-bottom:12px;">Navalur · OMR</div>
      <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:36px;letter-spacing:-.02em;margin:0;text-wrap:balance;">Ready to own ground that gives back?</h2>
    </div>
    <a href="kudil.php#enquire" style="position:relative;background:var(--mint);color:var(--ink);font-weight:700;font-size:16px;padding:17px 32px;border-radius:12px;white-space:nowrap;box-shadow:0 14px 32px rgba(63,174,127,.3);transition:background .18s ease;" onmouseover="this.style.background='#fff'" onmouseout="this.style.background='var(--mint)'">Book a visit to Kudil</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
</div>
</body>
</html>
