<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>What We Do — WeDoEarth</title>
<meta name="description" content="Four things, one verified spine: Browse, Verify title, Manage property, Invest fractionally. Plus a live cadastral parcel map of Navalur Block 12.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/wde.css">
<style>
  html{scroll-behavior:smooth;}
  .pf-hero{display:grid;grid-template-columns:.82fr 1.18fr;gap:48px;align-items:center;}
  .pf-mapwrap{display:grid;grid-template-columns:1.55fr 1fr;gap:16px;}
  .pf-modules{display:grid;grid-template-columns:1fr 1fr;gap:18px;}
  .pf-steps{display:grid;grid-template-columns:1fr 1fr 1fr;gap:18px;}
  .pf-faq{display:flex;flex-direction:column;gap:0;}
  @media(max-width:980px){
    .pf-hero{grid-template-columns:1fr!important;}
    .pf-modules{grid-template-columns:1fr 1fr!important;}
    .pf-steps{grid-template-columns:1fr!important;}
  }
  @media(max-width:640px){
    .pf-modules{grid-template-columns:1fr!important;}
    .pm-grid{grid-template-columns:repeat(6,1fr)!important;}
  }
  .faq-item{border-bottom:1px solid var(--line);}
  .faq-q{width:100%;background:none;border:none;text-align:left;padding:18px 0;font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:17px;cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:16px;color:var(--ink);}
  .faq-q::after{content:'+';font-family:'IBM Plex Mono',monospace;font-size:18px;color:var(--brand);flex-shrink:0;}
  .faq-item.open .faq-q::after{content:'−';}
  .faq-a{display:none;padding:0 0 18px;font-size:14.5px;line-height:1.7;color:var(--ink-soft);}
  .faq-item.open .faq-a{display:block;}
</style>
</head>
<body>
<div style="min-height:100vh;background:var(--ground);overflow-x:hidden;">
<?php $activePage='platform'; include 'includes/nav.php'; ?>

<!-- HERO + CADASTRAL MAP -->
<section style="max-width:1240px;margin:0 auto;padding:54px 28px 30px;">
  <div class="pf-hero">
    <div>
      <div class="wde-eyebrow" style="margin-bottom:20px;">
        <span class="wde-eyebrow-text">What we do</span>
      </div>
      <h1 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:52px;line-height:1.04;letter-spacing:-.025em;margin:0 0 20px;text-wrap:balance;">Property you can <span style="color:var(--brand);">prove.</span></h1>
      <p style="font-size:17px;line-height:1.6;color:var(--ink-soft);max-width:460px;margin:0 0 26px;">Every parcel on our map carries its own record — title status, guideline value, coordinates. Hover a parcel, select a few, and run a title scan to see what verified ground looks like.</p>
      <div style="display:flex;flex-direction:column;gap:11px;">
        <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;"><span style="width:14px;height:14px;border-radius:4px;background:var(--mint);display:inline-block;"></span> Available</div>
        <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;"><span style="width:14px;height:14px;border-radius:4px;background:var(--blue);display:inline-block;"></span> Listed for resale</div>
        <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;"><span style="width:14px;height:14px;border-radius:4px;background:var(--clay);display:inline-block;"></span> Sold</div>
        <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;"><span style="width:14px;height:14px;border-radius:4px;background:repeating-linear-gradient(45deg,var(--ground-2),var(--ground-2) 3px,rgba(20,32,27,.22) 3px,rgba(20,32,27,.22) 6px);display:inline-block;"></span> Fresh sale</div>
        <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;"><span style="width:14px;height:14px;border-radius:50%;background:var(--brass);box-shadow:0 0 0 3px rgba(169,132,47,.25);display:inline-block;"></span> Title verified</div>
      </div>
    </div>

    <!-- PARCEL MAP WIDGET -->
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:22px;box-shadow:0 30px 60px -34px rgba(20,32,27,.4);">
      <div style="display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:16px;flex-wrap:wrap;">
        <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.1em;color:var(--ink-soft);">CADASTRE · NAVALUR BLOCK 12</div>
        <button id="scanBtn" style="display:inline-flex;align-items:center;gap:8px;background:var(--ink);color:var(--paper);border:none;font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.08em;font-weight:500;padding:9px 15px;border-radius:9px;cursor:pointer;transition:background .18s ease;">
          <span id="scanDot" style="width:7px;height:7px;border-radius:50%;background:var(--ink-soft);"></span>
          <span id="scanLabel">Run title scan</span>
        </button>
      </div>
      <div class="pf-mapwrap">
        <div class="pm-grid" id="parcelGrid"></div>
        <!-- Detail panel -->
        <div style="background:var(--ground);border:1px solid var(--line);border-radius:12px;padding:18px;display:flex;flex-direction:column;min-height:240px;">
          <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.12em;color:var(--ink-soft);margin-bottom:12px;">PARCEL RECORD</div>
          <div id="dId" style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:22px;margin-bottom:2px;">—</div>
          <div id="dCoords" style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--ink-soft);margin-bottom:16px;">Hover a parcel</div>
          <div style="display:flex;flex-direction:column;gap:10px;font-size:13px;">
            <div style="display:flex;justify-content:space-between;"><span style="color:var(--ink-soft);">Area</span><span id="dArea" style="font-family:'IBM Plex Mono',monospace;">—</span></div>
            <div style="display:flex;justify-content:space-between;"><span style="color:var(--ink-soft);">Guideline</span><span id="dGuide" style="font-family:'IBM Plex Mono',monospace;">—</span></div>
            <div style="display:flex;justify-content:space-between;align-items:center;"><span style="color:var(--ink-soft);">State</span><span id="dState" style="font-family:'IBM Plex Mono',monospace;font-size:11px;">—</span></div>
            <div style="display:flex;justify-content:space-between;align-items:center;"><span style="color:var(--ink-soft);">Title</span><span id="dVerify" style="display:inline-flex;align-items:center;gap:6px;font-family:'IBM Plex Mono',monospace;font-size:11px;">—</span></div>
          </div>
          <div id="dHint" style="margin-top:auto;padding-top:14px;font-size:11.5px;color:var(--ink-soft);line-height:1.5;">Click a parcel to select it for the title scan.</div>
        </div>
      </div>
      <div style="margin-top:14px;font-family:'IBM Plex Mono',monospace;font-size:10.5px;color:var(--ink-soft);">
        <span id="selectedInfo">0 parcels selected</span>
      </div>
    </div>
  </div>
</section>

<!-- FOUR MODULES -->
<section id="verify" style="max-width:1240px;margin:0 auto;padding:80px 28px 30px;scroll-margin-top:80px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Four things, one verified spine</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:36px;letter-spacing:-.02em;margin:0 0 36px;">Everything we do — and why.</h2>
  <div class="pf-modules">
    <?php $modules=[
      ['#3FAE7F','VERIFY','Title verification','Before a property earns a card on our platform, we run a full title search: encumbrance certificate, patta records, building plan approval, DTCP/CMDA sanction, and dispute check.','Protect yourself before you pay a rupee','Apply for verification →'],
      ['#2C6E8E','MANAGE','Property management','Once you own, we take the hassle away: tenant sourcing, rent collection, maintenance scheduling, annual statement. One subscription, one dashboard.','Manage from anywhere','Explore management →'],
      ['#A9842F','INVEST','Fractional investment','Fractional ownership through SEBI-registered SM REIT structures. Pool with other verified investors, receive rent income, exit on the secondary market. Risks and lock-ins apply.','Invest in verified real estate','Learn about investing →'],
      ['#B8552E','BROWSE','Verified project listings','Only projects that have passed our review reach the properties page. Title verified, approvals confirmed, disputes none.','Browse live projects','Browse properties →'],
    ];
    foreach($modules as $m):?>
    <div style="background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:30px 32px;overflow:hidden;position:relative;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:<?= $m[0] ?>;margin-bottom:14px;"><?= $m[1] ?></div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:23px;margin:0 0 14px;"><?= $m[2] ?></h3>
      <p style="font-size:14.5px;line-height:1.65;color:var(--ink-soft);margin:0 0 22px;"><?= $m[3] ?></p>
      <div style="border-top:1px solid var(--line);padding-top:18px;display:flex;justify-content:space-between;align-items:center;">
        <span style="font-size:14px;font-weight:600;"><?= $m[4] ?></span>
        <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:<?= $m[0] ?>;letter-spacing:.06em;"><?= $m[5] ?></span>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- MANAGE ANCHOR -->
<div id="manage" style="height:1px;scroll-margin-top:80px;"></div>
<!-- INVEST ANCHOR -->
<div id="invest" style="height:1px;scroll-margin-top:80px;"></div>

<!-- FOR BUILDERS -->
<section id="builders" style="background:var(--brand-deep);color:var(--paper);margin-top:60px;scroll-margin-top:80px;">
  <div style="max-width:1240px;margin:0 auto;padding:72px 28px;">
    <div class="wde-eyebrow wde-eyebrow--light" style="margin-bottom:16px;">
      <span class="wde-eyebrow-text">For builders & owners</span>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start;">
      <div>
        <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:40px;letter-spacing:-.02em;margin:0 0 18px;">List your project with us.</h2>
        <p style="font-size:16px;line-height:1.7;color:rgba(246,244,236,.82);margin:0 0 26px;">We verify the title, map the parcels into a cadastral widget, and route qualified buyer enquiries to you directly. No lead generation fluff — only buyers who've read the cost sheet.</p>
        <div style="display:flex;flex-direction:column;gap:14px;">
          <?php $steps=[
            ['01','Submit project details','Name, location, RERA number, title docs.'],
            ['02','We verify','Title search, approvals check, parcel mapping — usually 5–7 working days.'],
            ['03','Go live','Your project card and cadastral widget go live on weDoEarth.com.'],
            ['04','Receive enquiries','Qualified buyer leads, routed to you with their full details.'],
          ];
          foreach($steps as $s):?>
          <div style="display:flex;gap:14px;align-items:flex-start;">
            <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--mint);flex-shrink:0;width:28px;"><?= $s[0] ?></span>
            <div>
              <div style="font-weight:600;font-size:15px;margin-bottom:3px;"><?= $s[1] ?></div>
              <div style="font-size:13.5px;color:rgba(246,244,236,.72);"><?= $s[2] ?></div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>
      <div>
        <div style="background:rgba(246,244,236,.05);border:1px solid rgba(246,244,236,.16);border-radius:18px;padding:32px;">
          <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:22px;margin:0 0 20px;">Express interest</h3>
          <form id="builderForm" novalidate>
            <label class="wde-label" style="margin-bottom:14px;">
              <span class="wde-label-text" style="color:rgba(246,244,236,.6);">Your name *</span>
              <input type="text" id="b_name" required placeholder="Full name" class="wde-input" style="background:rgba(246,244,236,.08);border-color:rgba(246,244,236,.2);color:var(--paper);">
              <span class="field-error" id="be_name" style="color:var(--mint);">Enter your name.</span>
            </label>
            <label class="wde-label" style="margin-bottom:14px;">
              <span class="wde-label-text" style="color:rgba(246,244,236,.6);">Phone *</span>
              <input type="tel" id="b_phone" required placeholder="+91 98765 43210" class="wde-input" style="background:rgba(246,244,236,.08);border-color:rgba(246,244,236,.2);color:var(--paper);">
              <span class="field-error" id="be_phone" style="color:var(--mint);">Valid +91 number required.</span>
            </label>
            <label class="wde-label" style="margin-bottom:14px;">
              <span class="wde-label-text" style="color:rgba(246,244,236,.6);">Project name / location</span>
              <input type="text" id="b_project" placeholder="e.g. Maram Plots, Sholinganallur" class="wde-input" style="background:rgba(246,244,236,.08);border-color:rgba(246,244,236,.2);color:var(--paper);">
            </label>
            <button type="submit" id="builderSubmitBtn" style="width:100%;margin-top:8px;background:var(--mint);color:var(--ink);font-weight:700;font-size:15px;padding:14px;border:none;border-radius:12px;cursor:pointer;transition:background .18s ease;" onmouseover="this.style.background='#fff'" onmouseout="this.style.background='var(--mint)'">Submit project details</button>
            <div id="builderMsg" style="display:none;margin-top:14px;font-size:13px;color:var(--mint);font-family:'IBM Plex Mono',monospace;text-align:center;"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BUYER FAQ -->
<section style="max-width:1240px;margin:0 auto;padding:72px 28px 80px;">
  <div class="wde-eyebrow" style="margin-bottom:10px;">
    <span class="wde-eyebrow-text">Buyer FAQ</span>
  </div>
  <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:34px;letter-spacing:-.02em;margin:0 0 30px;">Common questions, honest answers.</h2>
  <div class="pf-faq">
    <?php $faqs=[
      ['What does "title verified" actually mean?','We obtain and review the Encumbrance Certificate (EC) going back 30 years, check the patta records against the survey number, verify building plan approval (DTCP/CMDA), and confirm there are no court disputes on the land. If any of these fail, the property does not list on WeDoEarth.'],
      ['Do you charge a brokerage fee?','No hidden charges. Our fee is built into the developer\'s listed price — the cost sheet you see is what you pay.'],
      ['Can I get a home loan for Kudil?','Yes. Kudil is structured to be bank-loanable. Leading banks including SBI and HDFC have reviewed the project. We can connect you with their representatives.'],
      ['What is the RERA number for Kudil?','The TNRERA registration is in progress — the number will appear on this page before any booking is accepted. Do not pay a booking amount before RERA registration is confirmed.'],
      ['What happens after I enquire?','Someone from the WeDoEarth team calls you within 24 hours. We qualify the visit, answer your questions, and arrange a site tour with the Natarajan Estates team. No pressure.'],
      ['Is the fractional investing product live?','Not yet. The invest module will launch via a SEBI-registered SM REIT partner in a future phase. Register interest via the contact form.'],
    ];
    foreach($faqs as $i=>$faq):?>
    <div class="faq-item">
      <button class="faq-q" aria-expanded="false"><?= $faq[0] ?></button>
      <div class="faq-a"><?= $faq[1] ?></div>
    </div>
    <?php endforeach;?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
</div>

<script>
// ── Cadastral Map ──────────────────────────────────────────────────────────
(function(){
  // 60 parcels, 10 columns × 6 rows, deterministic states
  const STATES = ['sold','sold','sold','available','sold','fresh','sold','resale','sold','sold',
                  'sold','available','sold','sold','resale','sold','fresh','sold','sold','sold',
                  'available','sold','fresh','resale','sold','sold','available','sold','sold','fresh',
                  'sold','sold','sold','available','sold','fresh','sold','sold','resale','sold',
                  'resale','sold','sold','sold','available','sold','sold','fresh','sold','sold',
                  'sold','fresh','resale','sold','available','sold','sold','sold','sold','available'];
  // which parcels are title-verified (brass dot)
  const VERIFIED = new Set([3,11,20,26,33,44,54,59]);
  // color map
  const BG = {
    available: 'var(--mint)',
    resale:    'var(--blue)',
    sold:      'var(--clay)',
    fresh:     'repeating-linear-gradient(45deg,var(--ground-2),var(--ground-2) 3px,rgba(20,32,27,.22) 3px,rgba(20,32,27,.22) 6px)',
  };
  const LABEL = { available:'AVAILABLE', resale:'RESALE LISTED', sold:'SOLD', fresh:'FRESH SALE' };
  const COLOR = { available:'var(--mint)', resale:'var(--blue)', sold:'var(--clay)', fresh:'var(--brass)' };

  const GUIDE = ['₹3,100/sqft','₹3,200/sqft','₹3,300/sqft','₹3,400/sqft','₹3,500/sqft'];
  const SQFT  = [1,200,1,350,1,485,1,501,1,620,1,800,2,000].filter((_,i)=>i%2===0).map((v,i)=>['1,200','1,350','1,485','1,501','1,620','1,800'][i]);

  const grid = document.getElementById('parcelGrid');
  const selected = new Set();

  function updateSelectedInfo(){
    const n = selected.size;
    document.getElementById('selectedInfo').textContent = n + ' parcel' + (n!==1?'s':'') + ' selected';
  }

  function setDetail(idx){
    const row = Math.floor(idx/10), col = idx%10;
    const id = 'B12-' + String(idx+1).padStart(3,'0');
    const sqft = SQFT[idx % SQFT.length];
    const guide = GUIDE[idx % GUIDE.length];
    const state = STATES[idx];
    const verified = VERIFIED.has(idx);
    document.getElementById('dId').textContent = id;
    document.getElementById('dCoords').textContent = (12.84 + row*0.001).toFixed(3) + '°N, ' + (80.23 + col*0.001).toFixed(3) + '°E';
    document.getElementById('dArea').textContent = sqft + ' sqft';
    document.getElementById('dGuide').textContent = guide;
    document.getElementById('dState').style.color = COLOR[state];
    document.getElementById('dState').textContent = LABEL[state];
    const vEl = document.getElementById('dVerify');
    if(verified){
      vEl.innerHTML = '<span style="width:7px;height:7px;border-radius:50%;background:var(--brass);"></span><span style="color:var(--brass);">VERIFIED</span>';
    } else {
      vEl.innerHTML = '<span style="color:var(--ink-soft);">Pending / not checked</span>';
    }
    document.getElementById('dHint').textContent = state === 'available'
      ? 'Click to select for title scan.'
      : (state === 'sold' ? 'This parcel is sold — off market.' : 'Click to mark for scan reference.');
  }

  for(let i=0;i<60;i++){
    const btn = document.createElement('button');
    btn.className = 'parcel-btn parcel-' + STATES[i];
    if(VERIFIED.has(i)) btn.classList.add('verified');
    btn.setAttribute('aria-label','Parcel B12-'+String(i+1).padStart(3,'0'));
    btn.innerHTML = '<span class="parcel-dot"></span>';
    btn.addEventListener('mouseenter', () => setDetail(i));
    btn.addEventListener('focus',      () => setDetail(i));
    btn.addEventListener('click', () => {
      if(selected.has(i)){ selected.delete(i); btn.classList.remove('selected'); }
      else { selected.add(i); btn.classList.add('selected'); }
      updateSelectedInfo();
    });
    grid.appendChild(btn);
  }

  // Scan button
  let scanning = false;
  const scanBtn   = document.getElementById('scanBtn');
  const scanDot   = document.getElementById('scanDot');
  const scanLabel = document.getElementById('scanLabel');
  scanBtn.addEventListener('click', () => {
    if(scanning) return;
    scanning = true;
    scanDot.style.background = 'var(--mint)';
    scanLabel.textContent = 'Scanning…';
    scanBtn.style.background = 'var(--brand-deep)';
    setTimeout(() => {
      selected.forEach(idx => {
        if(VERIFIED.has(idx)){
          grid.children[idx].style.boxShadow = '0 0 0 2px var(--brass), 0 0 0 4px rgba(169,132,47,.3)';
        }
      });
      scanDot.style.background = selected.size > 0 ? 'var(--mint)' : 'var(--clay)';
      scanLabel.textContent = selected.size > 0
        ? selected.size + ' parcel' + (selected.size!==1?'s':'') + ' scanned'
        : 'Select parcels first';
      scanning = false;
    }, 1200);
  });
})();

// ── FAQ accordion ──────────────────────────────────────────────────────────
document.querySelectorAll('.faq-item').forEach(item => {
  item.querySelector('.faq-q').addEventListener('click', () => {
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
    if(!isOpen) item.classList.add('open');
  });
});

// ── Builder form ───────────────────────────────────────────────────────────
const PHONE_RE = /^(\+91|91|0)?[6-9]\d{9}$/;
document.getElementById('builderForm').addEventListener('submit', async e => {
  e.preventDefault();
  const name  = document.getElementById('b_name').value.trim();
  const phone = document.getElementById('b_phone').value.trim();
  const proj  = document.getElementById('b_project').value.trim();
  document.querySelectorAll('#builderForm .field-error').forEach(el => el.classList.remove('show'));
  let ok = true;
  if(!name)  { document.getElementById('be_name').classList.add('show'); ok=false; }
  if(!PHONE_RE.test(phone.replace(/\s/g,''))) { document.getElementById('be_phone').classList.add('show'); ok=false; }
  if(!ok) return;
  const btn = document.getElementById('builderSubmitBtn');
  btn.disabled=true; btn.textContent='Sending…';
  try {
    const res = await fetch('api/leads.php',{
      method:'POST',
      headers:{'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
      body:JSON.stringify({name,phone,unit:'Builder enquiry: '+proj,purpose:'Builder/List project',budget:'',timeline:'',message:'',dpdp_consent:true})
    });
    const data = await res.json();
    const msg = document.getElementById('builderMsg');
    msg.style.display='block';
    if(data.ok){
      msg.textContent='✓ Received. We\'ll call you within 2 working days.';
      document.getElementById('builderForm').reset();
    } else {
      msg.style.color='var(--clay)';
      msg.textContent = data.error || 'Something went wrong.';
    }
  } catch(_){ document.getElementById('builderMsg').textContent='Network error — try again.'; document.getElementById('builderMsg').style.display='block';}
  finally{ btn.disabled=false; btn.textContent='Submit project details'; }
});
</script>
</body>
</html>
