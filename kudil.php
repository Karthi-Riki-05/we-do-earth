<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['csrf_token'];
session_write_close(); // release session lock — page doesn't need session after this
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kudil — Courtyard Villas, Navalur OMR | WeDoEarth</title>
<meta name="description" content="4 BHK courtyard villas in Navalur, OMR — 40-acre gated township, title-verified, 2 lakes bordered. 2 villas available from ₹2.45 Cr.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Non-blocking font load: browser fetches CSS after paint, not before -->
<link rel="preload" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet"></noscript>
<link rel="stylesheet" href="assets/wde.css">
<style>
  html{scroll-behavior:smooth;}
  .k-hero{display:grid;grid-template-columns:1.05fr .95fr;gap:48px;align-items:center;margin-top:22px;}
  .k-villas{display:grid;grid-template-columns:1fr 1fr;gap:22px;}
  .k-why{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}
  .k-loc{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;}
  .k-pay{display:grid;grid-template-columns:.9fr 1.1fr;gap:22px;}
  .k-gallery{display:grid;grid-template-columns:repeat(5,1fr);gap:12px;margin-top:14px;}
  .k-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
  .k-enquire{display:grid;grid-template-columns:.85fr 1.15fr;gap:54px;align-items:start;}
  @media(max-width:980px){
    .k-hero,.k-enquire{grid-template-columns:1fr!important;}
    .k-gallery{grid-template-columns:repeat(2,1fr)!important;}
    .k-villas{grid-template-columns:1fr!important;}
    .k-why{grid-template-columns:1fr!important;}
    .k-loc{grid-template-columns:1fr 1fr!important;}
    .k-pay{grid-template-columns:1fr!important;}
  }
  @media(max-width:640px){
    .k-form-grid{grid-template-columns:1fr!important;}
    .k-gallery{grid-template-columns:1fr 1fr!important;}
    .k-loc{grid-template-columns:1fr!important;}
  }
  #formSuccess{display:none;}
  #formArea{display:block;}
</style>
</head>
<body>
<div style="min-height:100vh;background:var(--ground);overflow-x:hidden;">

<!-- RERA RIBBON -->
<div class="rera-ribbon">
  <div class="rera-ribbon-inner">
    <span style="display:inline-flex;align-items:center;gap:7px;color:var(--mint);">
      <span style="width:6px;height:6px;border-radius:50%;background:var(--mint);"></span>TITLE VERIFIED
    </span>
    <span style="opacity:.4;">·</span>
    <span>TNRERA REG. No. <span style="color:var(--brass);">TN/XX/Building/XXXX/2026</span> — to be confirmed before launch</span>
  </div>
</div>

<?php $activePage=''; include 'includes/nav.php'; ?>

<!-- HERO -->
<section style="max-width:1240px;margin:0 auto;padding:48px 28px 20px;">
  <a href="properties.php" class="k-back-link">← All properties</a>
  <div class="k-hero">
    <div style="animation:wde-rise .6s ease both;">
      <div class="wde-eyebrow" style="margin-bottom:20px;">
        <span class="wde-eyebrow-text">Villas · Navalur · OMR, Chennai</span>
      </div>
      <h1 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:52px;line-height:1.05;letter-spacing:-.025em;margin:0 0 18px;text-wrap:balance;">Kudil — courtyard villas, the <span style="color:var(--brand);">Boat Club of OMR.</span></h1>
      <p style="font-size:17px;line-height:1.6;color:var(--ink-soft);max-width:520px;margin:0 0 18px;">A 40-acre fully-compounded gated township, 2 minutes off OMR, bordered by two lakes and mature native trees. By Natarajan Estates, marketed via WeDoEarth.</p>
      <div style="display:flex;align-items:center;gap:10px;font-size:14px;color:var(--ink-soft);margin-bottom:28px;">
        <span>📍 Greenwood City, Navalur (OMR)</span>
        <span style="opacity:.4;">·</span>
        <span style="display:inline-flex;align-items:center;gap:6px;color:var(--brand);font-weight:600;">
          <span style="width:7px;height:7px;border-radius:50%;background:var(--mint);box-shadow:0 0 0 3px rgba(63,174,127,.3);"></span>2 villas available
        </span>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:12px;">
        <a href="#enquire" class="btn-primary">Enquire</a>
        <a href="#villas" class="btn-outline">See available villas</a>
        <button id="playBtn" class="k-play-text-btn">
          <span style="width:34px;height:34px;border-radius:50%;background:var(--ink);color:var(--paper);display:inline-flex;align-items:center;justify-content:center;font-size:11px;">▶</span>
          Watch the walkthrough
        </button>
      </div>
    </div>
    <div class="k-placeholder" style="animation:wde-rise .6s .1s ease both;position:relative;height:380px;border-radius:18px;overflow:hidden;border:1px solid var(--line);box-shadow:0 30px 60px -28px rgba(20,32,27,.35);">
      <span style="position:absolute;top:16px;left:16px;font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);background:rgba(246,244,236,.72);padding:6px 11px;border-radius:8px;">[ courtyard · hero render ]</span>
      <button id="playBtn2" aria-label="Play walkthrough" class="k-play-circle-btn">▶</button>
    </div>
  </div>
  <!-- Gallery strip -->
  <div class="k-gallery">
    <?php $views=['Courtyard','Living','Exterior','Clubhouse','Aerial']; foreach($views as $v):?>
    <div class="k-placeholder-sm" style="height:104px;border-radius:12px;border:1px solid var(--line);display:flex;align-items:flex-end;padding:9px;">
      <span style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);background:rgba(246,244,236,.72);padding:4px 7px;border-radius:6px;"><?= $v ?></span>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- FACTS STRIP -->
<section style="max-width:1240px;margin:0 auto;padding:20px 28px;">
  <div style="display:flex;flex-wrap:wrap;gap:1px;background:var(--line);border:1px solid var(--line);border-radius:14px;overflow:hidden;">
    <?php $facts=[
      ['4 BHK','Configuration'],
      ['2,662 sqft','Built-up area'],
      ['40 acres','Gated township'],
      ['2 lakes','Bordered by'],
    ];
    foreach($facts as $f):?>
    <div style="flex:1;min-width:150px;background:var(--paper);padding:20px 22px;">
      <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:22px;"><?= $f[0] ?></div>
      <div style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--ink-soft);margin-top:4px;"><?= $f[1] ?></div>
    </div>
    <?php endforeach;?>
    <div style="flex:1;min-width:150px;background:var(--brand-deep);padding:20px 22px;color:var(--paper);">
      <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:22px;">₹2.45 Cr*</div>
      <div style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--mint);margin-top:4px;">From · before GST</div>
    </div>
  </div>
</section>

<!-- AVAILABLE VILLAS -->
<section id="villas" style="max-width:1240px;margin:0 auto;padding:60px 28px 30px;scroll-margin-top:140px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Available now · V1 / Essential</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:32px;letter-spacing:-.02em;margin:0 0 28px;">Two villas, ready to claim.</h2>
  <div class="k-villas">
    <?php $villas=[
      ['105C2','South facing','South','25\'0" × 60\'0"','1,501 sqft','East','30 ft road'],
      ['102B','North facing','North','24\'9" × 60\'0"','1,485 sqft','North','40 ft road'],
    ];
    foreach($villas as $v):?>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;">
      <div class="k-placeholder-villa" style="position:relative;height:190px;display:flex;align-items:center;justify-content:center;">
        <span style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);background:rgba(246,244,236,.72);padding:5px 9px;border-radius:7px;">[ Plot <?= $v[0] ?> · <?= $v[2] ?> facing ]</span>
        <span style="position:absolute;top:14px;left:14px;display:inline-flex;align-items:center;gap:6px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--brass);color:#fff;padding:5px 9px;border-radius:7px;">
          <span style="width:5px;height:5px;border-radius:50%;background:#fff;"></span>TITLE VERIFIED
        </span>
      </div>
      <div style="padding:22px 22px 24px;display:flex;flex-direction:column;flex:1;">
        <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:4px;">
          <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:21px;margin:0;">Plot <?= $v[0] ?></h3>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--brand);"><?= strtoupper($v[2]) ?> FACING</span>
        </div>
        <p style="font-size:13px;color:var(--ink-soft);margin:0 0 18px;">Plot <?= $v[3] ?> · <?= $v[4] ?> · main door <?= $v[5] ?> · <?= $v[6] ?></p>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:13px;margin-bottom:18px;">
          <div style="background:var(--ground-2);border-radius:9px;padding:10px 12px;">
            <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);letter-spacing:.06em;">BUILT-UP</div>
            <div style="font-weight:600;margin-top:3px;">2,662 sqft</div>
          </div>
          <div style="background:var(--ground-2);border-radius:9px;padding:10px 12px;">
            <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);letter-spacing:.06em;">PARKING</div>
            <div style="font-weight:600;margin-top:3px;">2 cars</div>
          </div>
        </div>
        <div style="margin-top:auto;display:flex;justify-content:space-between;align-items:flex-end;padding-top:16px;border-top:1px solid var(--line);">
          <div>
            <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);letter-spacing:.06em;">FROM (BEFORE GST)</div>
            <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:23px;margin-top:2px;">₹2.45 Cr*</div>
          </div>
          <a href="#enquire" data-unit="Plot <?= $v[0] ?> (<?= $v[1] ?>)" class="unit-enquire-btn k-unit-btn">Enquire about this villa</a>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- WHY KUDIL -->
<section style="max-width:1240px;margin:0 auto;padding:50px 28px 30px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Why Kudil</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:32px;letter-spacing:-.02em;margin:0 0 28px;">Built around a courtyard, not a corridor.</h2>
  <div class="k-why">
    <?php $why=[
      ['DESIGN','Courtyard living','A private central courtyard and double-height living bring in light and air — cross-ventilation that cuts the need for cooling.'],
      ['LAYOUT','The 4 BHK plan','Carpet 2,359 sqft: four bedrooms, four baths, family lounge, modular open-plan kitchen, foyer, balcony and two-car parking. A 3 BHK (carpet 1,827) is also offered.'],
      ['SPEC · V1','Built to last','RCC frame, premium GVT vitrified flooring, Kohler sanitaryware, Schneider/Legrand switches, African teak main door, Fenesta UPVC + Saint Gobain glass, heat-reflective cool terrace tiles. Upgrade to VS and VS Pro.'],
    ];
    foreach($why as $w):?>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:26px;">
      <div class="k-card-label"><?= $w[0] ?></div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:19px;margin:0 0 10px;"><?= $w[1] ?></h3>
      <p style="font-size:14px;line-height:1.6;color:var(--ink-soft);margin:0;"><?= $w[2] ?></p>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- TOWNSHIP -->
<section style="background:var(--brand-deep);color:var(--paper);margin-top:30px;">
  <div style="max-width:1240px;margin:0 auto;padding:64px 28px;">
    <div class="wde-eyebrow wde-eyebrow--light" style="margin-bottom:14px;">
      <span class="wde-eyebrow-text">The township</span>
    </div>
    <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:30px;letter-spacing:-.02em;margin:0 0 26px;max-width:640px;">A 40-acre neighbourhood, fully compounded and ready to live in.</h2>
    <div style="display:flex;flex-wrap:wrap;gap:11px;">
      <?php $amenities=['Clubhouse','Gym','Swimming pool','Jacuzzi','Kids\' pool','Cricket nets','5 private parks','40 ft roads','Water & sewage treatment','Clean underground water','Street lighting','Landscaped streets','Grand entrance'];
      foreach($amenities as $a):?>
      <span style="font-size:14px;background:rgba(246,244,236,.07);border:1px solid rgba(246,244,236,.18);padding:10px 16px;border-radius:30px;"><?= $a ?></span>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- LOCATION -->
<section style="max-width:1240px;margin:0 auto;padding:60px 28px 30px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Location · Navalur, OMR</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:32px;letter-spacing:-.02em;margin:0 0 28px;">Two minutes off OMR, a world away from it.</h2>
  <div class="k-loc">
    <?php $loc=[
      ['CONNECTIVITY',['2 min off OMR (IT corridor)','Direct access to ECR & GST road','Upcoming metro & peripheral ring road']],
      ['SCHOOLS',['Leading international schools nearby','Engineering & medical colleges on OMR']],
      ['HOSPITALS',['Multi-speciality hospitals within reach','24×7 clinics inside Navalur']],
      ['LIFESTYLE',['CSK High Performance Centre adjacent','Navalur Eco Lake Park next door','Bordered by two lakes & native trees']],
    ];
    foreach($loc as $l):?>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:24px;">
      <div class="k-card-label"><?= $l[0] ?></div>
      <ul style="margin:0;padding-left:18px;font-size:14px;line-height:1.7;color:var(--ink-soft);">
        <?php foreach($l[1] as $li):?><li><?= $li ?></li><?php endforeach;?>
      </ul>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- PRICING -->
<section style="max-width:1240px;margin:0 auto;padding:50px 28px 30px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Pricing & payment</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:32px;letter-spacing:-.02em;margin:0 0 28px;">Everything on the table, nothing hidden.</h2>
  <div class="k-pay">
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);letter-spacing:.1em;margin-bottom:18px;">COST BREAKDOWN · V1 / ESSENTIAL</div>
      <?php $costs=[
        ['Villa base price','₹2,35,00,000'],
        ['Compound wall','₹4,40,000'],
        ['6000L sump','₹2,40,000'],
        ['EB charges','₹1,25,000'],
        ['Clubhouse charges','₹1,50,000'],
      ];
      foreach($costs as $c):?>
      <div style="display:flex;justify-content:space-between;font-size:14.5px;padding:11px 0;border-bottom:1px solid var(--line);">
        <span><?= $c[0] ?></span><span style="font-family:'IBM Plex Mono',monospace;"><?= $c[1] ?></span>
      </div>
      <?php endforeach;?>
      <div style="display:flex;justify-content:space-between;align-items:center;padding:18px 0 4px;">
        <span style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:16px;">Total before GST & reg.</span>
        <span style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:20px;color:var(--brand);">₹2,44,55,000</span>
      </div>
      <div style="margin-top:16px;display:flex;flex-direction:column;gap:8px;font-size:12px;color:var(--ink-soft);line-height:1.5;">
        <div style="display:flex;gap:8px;"><span style="color:var(--brass);">●</span> GST @ 5% extra, payable at actuals on demand.</div>
        <div style="display:flex;gap:8px;"><span style="color:var(--brass);">●</span> Registration ~9% on guideline value (₹3,300/sqft) at actuals.</div>
        <div style="display:flex;gap:8px;"><span style="color:var(--brass);">●</span> Booking advance ₹5,00,000, adjusted at registration.</div>
      </div>
    </div>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:28px;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);letter-spacing:.1em;margin-bottom:18px;">CONSTRUCTION-LINKED PAYMENT PLAN</div>
      <?php $plan=[
        ['20%','Sale & construction agreement','₹48,91,000'],
        ['20%','Land registration','₹48,91,000'],
        ['15%','Basement completion','₹36,68,250'],
        ['10%','Ground floor roof slab','₹24,45,500'],
        ['15%','First floor roof slab','₹36,68,250'],
        ['10%','Brickwork & internal plaster','₹24,45,500'],
        ['7%','Tile laying completion','₹17,11,850'],
        ['3%','Four days before handover','₹7,33,650'],
      ];
      foreach($plan as $row):?>
      <div style="display:grid;grid-template-columns:auto 1fr auto;gap:14px;align-items:center;padding:11px 0;border-bottom:1px solid var(--line);">
        <span style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--brand);width:42px;"><?= $row[0] ?></span>
        <span style="font-size:14px;"><?= $row[1] ?></span>
        <span style="font-family:'IBM Plex Mono',monospace;font-size:12.5px;color:var(--ink-soft);"><?= $row[2] ?></span>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <p style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);margin:18px 0 0;line-height:1.6;">Indicative figures sourced from the developer's cost sheet, subject to change without notice. This is a marketing listing, not an offer. Stamp duty, registration and statutory charges borne by the purchaser at actuals.</p>
</section>

<!-- ENQUIRY FORM -->
<section id="enquire" style="background:var(--ground-2);margin-top:40px;scroll-margin-top:80px;">
  <div style="max-width:1240px;margin:0 auto;padding:72px 28px;" class="k-enquire">
    <div>
      <div class="wde-eyebrow" style="margin-bottom:18px;">
        <span class="wde-eyebrow-text">Enquire</span>
      </div>
      <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:34px;letter-spacing:-.02em;margin:0 0 16px;text-wrap:balance;">Tell us a little, and we'll arrange a visit.</h2>
      <p style="font-size:16px;line-height:1.65;color:var(--ink-soft);margin:0 0 26px;">No pushy calls. A few details help us match you to the right villa and the right person at Natarajan Estates — we connect you directly.</p>
      <div style="display:flex;flex-direction:column;gap:16px;">
        <div style="display:flex;gap:12px;align-items:flex-start;">
          <span style="width:8px;height:8px;border-radius:50%;background:var(--mint);margin-top:7px;flex-shrink:0;"></span>
          <div><div style="font-weight:600;font-size:14.5px;">Title-verified before you visit</div><div style="font-size:13px;color:var(--ink-soft);">We check title, approvals and disputes first.</div></div>
        </div>
        <div style="display:flex;gap:12px;align-items:flex-start;">
          <span style="width:8px;height:8px;border-radius:50%;background:var(--mint);margin-top:7px;flex-shrink:0;"></span>
          <div><div style="font-weight:600;font-size:14.5px;">Talk to the right person</div><div style="font-size:13px;color:var(--ink-soft);">We route you to the developer directly.</div></div>
        </div>
        <div style="display:flex;gap:12px;align-items:flex-start;">
          <span style="width:8px;height:8px;border-radius:50%;background:var(--mint);margin-top:7px;flex-shrink:0;"></span>
          <div><div style="font-weight:600;font-size:14.5px;">Your data stays yours</div><div style="font-size:13px;color:var(--ink-soft);">Used only for this enquiry — DPDP compliant.</div></div>
        </div>
      </div>
    </div>

    <!-- FORM -->
    <div>
      <div id="formSuccess" style="background:var(--brand-deep);color:var(--paper);border-radius:18px;padding:44px 40px;flex-direction:column;align-items:center;justify-content:center;text-align:center;">
        <!-- icon -->
        <div style="position:relative;width:72px;height:72px;margin:0 auto 24px;">
          <div style="width:72px;height:72px;border-radius:50%;background:rgba(63,174,127,.15);display:flex;align-items:center;justify-content:center;">
            <div style="width:52px;height:52px;border-radius:50%;background:var(--mint);display:flex;align-items:center;justify-content:center;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--brand-deep)" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
          </div>
        </div>

        <!-- headline -->
        <div style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.18em;text-transform:uppercase;color:var(--mint);margin-bottom:10px;">Enquiry received</div>
        <h3 id="thankYouMsg" style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:28px;letter-spacing:-.02em;margin:0 0 10px;">Thank you.</h3>
        <p id="thankYouUnit" style="font-size:15px;line-height:1.6;color:rgba(246,244,236,.75);max-width:340px;margin:0 auto 28px;">We've got your enquiry. Someone from our team will call you to arrange a visit to Kudil.</p>

        <!-- what happens next -->
        <div style="width:100%;max-width:340px;margin:0 auto;text-align:left;border-top:1px solid rgba(246,244,236,.12);padding-top:24px;display:flex;flex-direction:column;gap:16px;">
          <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.16em;text-transform:uppercase;color:rgba(246,244,236,.4);margin-bottom:2px;">What happens next</div>
          <div style="display:flex;gap:13px;align-items:flex-start;">
            <span style="flex-shrink:0;width:22px;height:22px;border-radius:50%;background:rgba(63,174,127,.18);border:1px solid rgba(63,174,127,.35);display:flex;align-items:center;justify-content:center;font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--mint);margin-top:1px;">1</span>
            <div><div style="font-size:13.5px;font-weight:600;margin-bottom:2px;">Our team is notified</div><div style="font-size:12.5px;color:rgba(246,244,236,.55);line-height:1.5;">Your details are with us right now.</div></div>
          </div>
          <div style="display:flex;gap:13px;align-items:flex-start;">
            <span style="flex-shrink:0;width:22px;height:22px;border-radius:50%;background:rgba(63,174,127,.18);border:1px solid rgba(63,174,127,.35);display:flex;align-items:center;justify-content:center;font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--mint);margin-top:1px;">2</span>
            <div><div style="font-size:13.5px;font-weight:600;margin-bottom:2px;">Call within 24 hours</div><div style="font-size:12.5px;color:rgba(246,244,236,.55);line-height:1.5;">We'll reach you on the number provided.</div></div>
          </div>
          <div style="display:flex;gap:13px;align-items:flex-start;">
            <span style="flex-shrink:0;width:22px;height:22px;border-radius:50%;background:rgba(63,174,127,.18);border:1px solid rgba(63,174,127,.35);display:flex;align-items:center;justify-content:center;font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--mint);margin-top:1px;">3</span>
            <div><div style="font-size:13.5px;font-weight:600;margin-bottom:2px;">Site visit arranged</div><div style="font-size:12.5px;color:rgba(246,244,236,.55);line-height:1.5;">Walk through Kudil at a time that suits you.</div></div>
          </div>
        </div>

        <button id="resetBtn" class="k-reset-btn">Send another enquiry</button>
      </div>

      <form id="enquiryForm" novalidate style="background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:32px;box-shadow:0 24px 50px -30px rgba(20,32,27,.4);">
        <div id="formMsg" style="display:none;padding:12px 16px;border-radius:10px;font-size:14px;margin-bottom:16px;"></div>

        <div class="k-form-grid">
          <label class="wde-label">
            <span class="wde-label-text">Name *</span>
            <input type="text" id="f_name" name="name" required placeholder="Your full name" class="wde-input">
            <span class="field-error" id="e_name">Enter your name.</span>
          </label>
          <label class="wde-label">
            <span class="wde-label-text">Email *</span>
            <input type="email" id="f_email" name="email" required placeholder="you@example.com" class="wde-input">
            <span class="field-error" id="e_email">Enter a valid email address.</span>
          </label>
        </div>

        <div class="k-form-grid" style="margin-top:16px;">
          <label class="wde-label">
            <span class="wde-label-text">Phone / WhatsApp *</span>
            <input type="tel" id="f_phone" name="phone" required placeholder="+91 98765 43210" class="wde-input">
            <span class="field-error" id="e_phone">Enter a valid +91 mobile number.</span>
          </label>
          <label class="wde-label">
            <span class="wde-label-text">Villa / Unit of interest</span>
            <select id="f_unit" name="unit" class="wde-select">
              <option value="">Any available villa</option>
              <option value="Plot 105C2 (South facing)">Plot 105C2 — South facing</option>
              <option value="Plot 102B (North facing)">Plot 102B — North facing</option>
              <option value="Both villas">Both villas</option>
            </select>
          </label>
        </div>

        <div class="k-form-grid" style="margin-top:16px;">
          <label class="wde-label">
            <span class="wde-label-text">Purpose *</span>
            <select id="f_purpose" name="purpose" required class="wde-select">
              <option value="">Select…</option>
              <option>Live in</option>
              <option>Invest</option>
              <option>Both</option>
            </select>
            <span class="field-error" id="e_purpose">Please select a purpose.</span>
          </label>
          <label class="wde-label">
            <span class="wde-label-text">Budget readiness *</span>
            <select id="f_budget" name="budget" required class="wde-select">
              <option value="">Select…</option>
              <option>Ready to buy</option>
              <option>Needs finance</option>
              <option>Just exploring</option>
            </select>
            <span class="field-error" id="e_budget">Please select your budget stage.</span>
          </label>
        </div>

        <label class="wde-label" style="margin-top:16px;">
          <span class="wde-label-text">Timeline *</span>
          <select id="f_timeline" name="timeline" required class="wde-select">
            <option value="">Select…</option>
            <option>Immediately</option>
            <option>1–3 months</option>
            <option>3–6 months</option>
            <option>6+ months</option>
          </select>
          <span class="field-error" id="e_timeline">Please select a timeline.</span>
        </label>

        <label class="wde-label" style="margin-top:16px;">
          <span class="wde-label-text">Message <span style="text-transform:none;letter-spacing:0;">(optional)</span></span>
          <textarea id="f_message" name="message" rows="2" placeholder="Anything you'd like us to know" class="wde-textarea"></textarea>
        </label>

        <label style="display:flex;gap:10px;align-items:flex-start;margin-top:18px;cursor:pointer;">
          <input type="checkbox" id="f_consent" required style="margin-top:3px;width:16px;height:16px;accent-color:var(--brand);">
          <span style="font-size:12px;color:var(--ink-soft);line-height:1.5;">I agree to be contacted about this enquiry. My details will be used only for this purpose, in line with the DPDP Act.</span>
        </label>
        <span class="field-error" id="e_consent" style="display:none;">Please give your consent to proceed.</span>

        <input type="hidden" id="csrf_token" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit" id="submitBtn" style="width:100%;margin-top:22px;background:var(--brand);color:#fff;font-weight:700;font-size:16px;padding:16px;border:none;border-radius:12px;cursor:pointer;box-shadow:0 12px 28px rgba(28,107,75,.25);transition:background .18s ease;">Send enquiry</button>
      </form>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
</div>

<!-- VIDEO MODAL -->
<div class="video-modal" id="videoModal" role="dialog" aria-modal="true" aria-label="Kudil walkthrough video">
  <div class="video-modal-inner">
    <iframe id="videoFrame" src="" title="Kudil walkthrough" loading="lazy" allow="accelerometer;autoplay;clipboard-write;encrypted-media;gyroscope;picture-in-picture" allowfullscreen style="width:100%;height:100%;border:0;"></iframe>
  </div>
  <button class="video-modal-close" id="videoClose" aria-label="Close video">✕</button>
</div>

<div class="wde-toast" id="toast"></div>

<script>
// Phone regex: accepts +91 / 91 / 0 prefix, then 6-9 lead digit + 9 more
const PHONE_RE = /^(\+91|91|0)?[6-9]\d{9}$/;

// Unit prefill from villa enquire buttons
document.querySelectorAll('.unit-enquire-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.getElementById('f_unit').value = btn.dataset.unit;
  });
});

// Video modal
const modal = document.getElementById('videoModal');
const frame = document.getElementById('videoFrame');
const VIDEO_SRC = 'https://www.youtube.com/embed/pTp4lky-DnI?autoplay=1&rel=0';
function openVideo(){ modal.classList.add('open'); frame.src = VIDEO_SRC; }
function closeVideo(){ modal.classList.remove('open'); frame.src = ''; }
document.getElementById('playBtn').addEventListener('click', openVideo);
document.getElementById('playBtn2').addEventListener('click', openVideo);
document.getElementById('videoClose').addEventListener('click', closeVideo);
modal.addEventListener('click', e => { if(e.target === modal) closeVideo(); });
document.addEventListener('keydown', e => { if(e.key === 'Escape') closeVideo(); });

// Toast helper
function showToast(msg, duration=3500){
  const t = document.getElementById('toast');
  t.textContent = msg; t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), duration);
}

// Form submission
const form = document.getElementById('enquiryForm');
const formSuccess = document.getElementById('formSuccess');
const submitBtn = document.getElementById('submitBtn');

function clearErrors(){
  document.querySelectorAll('.field-error').forEach(e => e.classList.remove('show'));
  document.querySelectorAll('.wde-input,.wde-select,.wde-textarea').forEach(e => e.classList.remove('error'));
}
function fieldError(id, errId){
  document.getElementById(id).classList.add('error');
  document.getElementById(errId).classList.add('show');
  return false;
}

form.addEventListener('submit', async e => {
  e.preventDefault();
  clearErrors();

  const name     = document.getElementById('f_name').value.trim();
  const email    = document.getElementById('f_email').value.trim();
  const phone    = document.getElementById('f_phone').value.trim();
  const unit     = document.getElementById('f_unit').value;
  const purpose  = document.getElementById('f_purpose').value;
  const budget   = document.getElementById('f_budget').value;
  const timeline = document.getElementById('f_timeline').value;
  const message  = document.getElementById('f_message').value.trim();
  const consent  = document.getElementById('f_consent').checked;

  const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  let valid = true;
  if(!name)                        valid = fieldError('f_name','e_name')     && false;
  if(!EMAIL_RE.test(email))        valid = fieldError('f_email','e_email')   && false;
  if(!PHONE_RE.test(phone.replace(/\s/g,''))) valid = fieldError('f_phone','e_phone') && false;
  if(!purpose)                     valid = fieldError('f_purpose','e_purpose') && false;
  if(!budget)                      valid = fieldError('f_budget','e_budget')   && false;
  if(!timeline)                    valid = fieldError('f_timeline','e_timeline')&& false;
  if(!consent){ document.getElementById('e_consent').classList.add('show'); valid = false; }
  if(!valid) return;

  submitBtn.disabled = true;
  submitBtn.textContent = 'Sending…';

  try {
    const csrfToken = document.getElementById('csrf_token').value;
    const res = await fetch('api/leads.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
      body: JSON.stringify({name,email,phone,unit,purpose,budget,timeline,message,dpdp_consent:true,csrf_token:csrfToken})
    });
    const data = await res.json();
    if(data.ok){
      form.style.display = 'none';
      const firstName = name ? name.trim().split(' ')[0] : '';
      document.getElementById('thankYouMsg').textContent = 'Thank you' + (firstName ? ', ' + firstName : '') + '.';
      document.getElementById('thankYouUnit').textContent = unit
        ? 'We\'ve got your enquiry about ' + unit + '. Someone from our team will call you to arrange a visit to Kudil.'
        : 'We\'ve got your enquiry. Someone from our team will call you to arrange a visit to Kudil.';
      formSuccess.style.display = 'flex';
    } else {
      const msgEl = document.getElementById('formMsg');
      msgEl.style.display = 'block';
      msgEl.style.background = '#fde8e2';
      msgEl.style.color = 'var(--clay)';
      msgEl.textContent = data.error || 'Something went wrong. Please try again.';
    }
  } catch(err){
    showToast('Network error — please try again.');
  } finally {
    submitBtn.disabled = false;
    if(submitBtn.textContent === 'Sending…') submitBtn.textContent = 'Send enquiry';
  }
});

document.getElementById('resetBtn').addEventListener('click', () => {
  formSuccess.style.display = 'none';
  form.style.display = '';
  form.reset();
  clearErrors();
  document.getElementById('formMsg').style.display = 'none';
  submitBtn.disabled = false;
  submitBtn.textContent = 'Send enquiry';
});
</script>
</body>
</html>
