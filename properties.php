<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Properties — WeDoEarth</title>
<meta name="description" content="Verified real estate projects across Tamil Nadu. Browse Kudil courtyard villas at Navalur OMR and upcoming projects.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/wde.css">
<style>
  .p-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;}
  .p-filters{display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;padding:18px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);}
  .p-foot{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:36px;}
</style>
</head>
<body>
<div style="min-height:100vh;background:var(--ground);overflow-x:hidden;">
<?php $activePage='properties'; include 'includes/nav.php'; ?>

<!-- HEADER -->
<section style="max-width:1240px;margin:0 auto;padding:60px 28px 30px;">
  <div class="wde-eyebrow" style="margin-bottom:20px;">
    <span class="wde-eyebrow-text">Tamil Nadu · <span id="liveCount">1 live</span> verified · scaling</span>
  </div>
  <div style="display:grid;grid-template-columns:1.2fr .8fr;gap:48px;align-items:end;">
    <h1 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:48px;line-height:1.05;letter-spacing:-.025em;margin:0;text-wrap:balance;">Verified projects, <span style="color:var(--brand);">one place.</span></h1>
    <p style="font-size:16px;line-height:1.65;color:var(--ink-soft);margin:0;">We review the title, the approvals and the disputes on every project before it earns a card here. Fewer listings, more certainty.</p>
  </div>
</section>

<!-- FILTERS -->
<section style="max-width:1240px;margin:0 auto;padding:8px 28px 4px;">
  <div class="p-filters">
    <div style="display:flex;align-items:center;gap:18px;flex-wrap:wrap;">
      <div style="display:flex;align-items:center;gap:8px;">
        <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--ink-soft);margin-right:4px;">Type</span>
        <button class="filter-chip active" data-group="type" data-value="all">All</button>
        <button class="filter-chip" data-group="type" data-value="villa">Villas</button>
        <button class="filter-chip" data-group="type" data-value="plot">Plots</button>
        <button class="filter-chip" data-group="type" data-value="commercial">Commercial</button>
      </div>
      <div style="display:flex;align-items:center;gap:8px;">
        <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--ink-soft);margin-right:4px;">Status</span>
        <button class="filter-chip active" data-group="status" data-value="any">Any</button>
        <button class="filter-chip" data-group="status" data-value="available">Available</button>
        <button class="filter-chip" data-group="status" data-value="upcoming">Upcoming</button>
      </div>
    </div>
    <span id="shownCount" style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--ink-soft);">3 projects</span>
  </div>
</section>

<!-- GRID -->
<section style="max-width:1240px;margin:0 auto;padding:28px 28px 30px;">
  <div class="p-grid" id="cardGrid">

    <!-- KUDIL -->
    <a href="kudil.php" class="wde-card" data-type="villa" data-status="available" data-live="1"
       style="background:var(--paper);border:1px solid var(--line);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;text-decoration:none;transition:transform .25s ease,box-shadow .25s ease;"
       onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 40px -24px rgba(20,32,27,.45)'"
       onmouseout="this.style.transform='';this.style.boxShadow=''">
      <div style="position:relative;height:188px;background:repeating-linear-gradient(135deg,#dcd6c4,#dcd6c4 11px,#e2ddce 11px,#e2ddce 22px);display:flex;align-items:flex-end;padding:14px;">
        <span style="position:absolute;top:14px;left:14px;display:inline-flex;align-items:center;gap:6px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--brass);color:#fff;padding:5px 10px;border-radius:7px;">
          <span style="width:5px;height:5px;border-radius:50%;background:#fff;"></span>TITLE VERIFIED
        </span>
        <span style="position:absolute;top:14px;right:14px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--ink);color:var(--paper);padding:5px 10px;border-radius:7px;">4 BHK</span>
        <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;color:var(--ink-soft);background:rgba(246,244,236,.72);padding:5px 9px;border-radius:7px;">[ courtyard villa render ]</span>
      </div>
      <div style="padding:20px 20px 22px;display:flex;flex-direction:column;flex:1;">
        <div style="font-size:12.5px;color:var(--ink-soft);display:flex;align-items:center;gap:6px;margin-bottom:7px;">📍 Navalur · OMR, Chennai</div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:21px;margin:0 0 3px;">Kudil</h3>
        <p style="font-size:13px;color:var(--ink-soft);margin:0 0 16px;">by Natarajan Estates</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;">
          <span class="mono-tag">2,662 sqft</span>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;background:rgba(63,174,127,.18);color:var(--brand);padding:6px 10px;border-radius:7px;">AVAILABLE</span>
        </div>
        <div style="margin-top:auto;display:flex;justify-content:space-between;align-items:flex-end;padding-top:15px;border-top:1px solid var(--line);">
          <div>
            <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);letter-spacing:.06em;">FROM · BEFORE GST</div>
            <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:19px;margin-top:2px;">₹2.45 Cr*</div>
          </div>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--brand);font-weight:500;">View project →</span>
        </div>
      </div>
    </a>

    <!-- MARAM -->
    <a href="properties.php" class="wde-card" data-type="plot" data-status="upcoming" data-live="0"
       style="background:var(--paper);border:1px solid var(--line);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;opacity:.62;transition:transform .25s ease,box-shadow .25s ease;"
       onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 40px -24px rgba(20,32,27,.45)'"
       onmouseout="this.style.transform='';this.style.boxShadow=''">
      <div style="position:relative;height:188px;background:repeating-linear-gradient(135deg,#e2ddce,#e2ddce 11px,#e7e3d6 11px,#e7e3d6 22px);display:flex;align-items:flex-end;padding:14px;">
        <span style="position:absolute;top:14px;left:14px;display:inline-flex;align-items:center;gap:6px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--ground-2);color:var(--ink-soft);padding:5px 10px;border-radius:7px;">
          <span style="width:5px;height:5px;border-radius:50%;background:var(--brass);"></span>VERIFYING
        </span>
        <span style="position:absolute;top:14px;right:14px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--ink);color:var(--paper);padding:5px 10px;border-radius:7px;">PLOTS</span>
        <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;color:var(--ink-soft);background:rgba(246,244,236,.72);padding:5px 9px;border-radius:7px;">[ details soon ]</span>
      </div>
      <div style="padding:20px 20px 22px;display:flex;flex-direction:column;flex:1;">
        <div style="font-size:12.5px;color:var(--ink-soft);display:flex;align-items:center;gap:6px;margin-bottom:7px;">📍 Sholinganallur · OMR</div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:21px;margin:0 0 3px;">Maram</h3>
        <p style="font-size:13px;color:var(--ink-soft);margin:0 0 16px;">Details soon</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;">
          <span class="mono-tag">1,200–2,400 sqft</span>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;background:var(--ground-2);color:var(--ink-soft);padding:6px 10px;border-radius:7px;">UPCOMING</span>
        </div>
        <div style="margin-top:auto;display:flex;justify-content:space-between;align-items:flex-end;padding-top:15px;border-top:1px solid var(--line);">
          <div>
            <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);letter-spacing:.06em;">GUIDELINE-LINKED</div>
            <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:19px;margin-top:2px;">On request</div>
          </div>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--ink-soft);font-weight:500;">Details soon</span>
        </div>
      </div>
    </a>

    <!-- ANGADI -->
    <a href="properties.php" class="wde-card" data-type="commercial" data-status="upcoming" data-live="0"
       style="background:var(--paper);border:1px solid var(--line);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;opacity:.62;transition:transform .25s ease,box-shadow .25s ease;"
       onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 40px -24px rgba(20,32,27,.45)'"
       onmouseout="this.style.transform='';this.style.boxShadow=''">
      <div style="position:relative;height:188px;background:repeating-linear-gradient(135deg,#e2ddce,#e2ddce 11px,#e7e3d6 11px,#e7e3d6 22px);display:flex;align-items:flex-end;padding:14px;">
        <span style="position:absolute;top:14px;left:14px;display:inline-flex;align-items:center;gap:6px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--ground-2);color:var(--ink-soft);padding:5px 10px;border-radius:7px;">
          <span style="width:5px;height:5px;border-radius:50%;background:var(--brass);"></span>VERIFYING
        </span>
        <span style="position:absolute;top:14px;right:14px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.06em;background:var(--ink);color:var(--paper);padding:5px 10px;border-radius:7px;">COMMERCIAL</span>
        <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;color:var(--ink-soft);background:rgba(246,244,236,.72);padding:5px 9px;border-radius:7px;">[ details soon ]</span>
      </div>
      <div style="padding:20px 20px 22px;display:flex;flex-direction:column;flex:1;">
        <div style="font-size:12.5px;color:var(--ink-soft);display:flex;align-items:center;gap:6px;margin-bottom:7px;">📍 Guindy · Chennai</div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:21px;margin:0 0 3px;">Angadi</h3>
        <p style="font-size:13px;color:var(--ink-soft);margin:0 0 16px;">Details soon</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;">
          <span class="mono-tag">Mixed-use</span>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:10.5px;background:var(--ground-2);color:var(--ink-soft);padding:6px 10px;border-radius:7px;">UPCOMING</span>
        </div>
        <div style="margin-top:auto;display:flex;justify-content:space-between;align-items:flex-end;padding-top:15px;border-top:1px solid var(--line);">
          <div>
            <div style="font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--ink-soft);letter-spacing:.06em;">GUIDELINE-LINKED</div>
            <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:19px;margin-top:2px;">On request</div>
          </div>
          <span style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--ink-soft);font-weight:500;">Details soon</span>
        </div>
      </div>
    </a>

  </div>
  <div id="emptyState" style="display:none;text-align:center;padding:60px 20px;color:var(--ink-soft);font-size:15px;">No projects match these filters yet — try widening them.</div>
</section>

<!-- FOR BUILDERS STRIP -->
<section style="max-width:1240px;margin:0 auto;padding:20px 28px 80px;">
  <div style="background:var(--brand-deep);color:var(--paper);border-radius:18px;padding:44px 40px;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap;position:relative;overflow:hidden;">
    <div aria-hidden="true" style="position:absolute;inset:0;background-image:linear-gradient(rgba(246,244,236,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(246,244,236,.05) 1px,transparent 1px);background-size:40px 40px;opacity:.6;"></div>
    <div style="position:relative;">
      <div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--mint);margin-bottom:12px;">For builders & owners</div>
      <h2 style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:30px;letter-spacing:-.02em;margin:0;text-wrap:balance;">Have a project to sell?</h2>
      <p style="font-size:15px;color:rgba(246,244,236,.78);margin:10px 0 0;max-width:440px;">List with us — we verify the title, map the parcels, and send you qualified buyer enquiries.</p>
    </div>
    <a href="platform.php#builders" style="position:relative;background:var(--mint);color:var(--ink);font-weight:700;font-size:15px;padding:15px 28px;border-radius:12px;white-space:nowrap;transition:background .18s ease;" onmouseover="this.style.background='#fff'" onmouseout="this.style.background='var(--mint)'">List a project →</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
</div>

<script>
(function(){
  const cards = document.querySelectorAll('#cardGrid .wde-card');
  const shownEl = document.getElementById('shownCount');
  const emptyEl = document.getElementById('emptyState');
  let activeType = 'all', activeStatus = 'any';

  function applyFilters(){
    let shown = 0;
    cards.forEach(c => {
      const typeMatch   = activeType   === 'all' || c.dataset.type   === activeType;
      const statusMatch = activeStatus === 'any'  || c.dataset.status === activeStatus;
      const visible = typeMatch && statusMatch;
      c.style.display = visible ? '' : 'none';
      if(visible) shown++;
    });
    shownEl.textContent = shown + (shown === 1 ? ' project' : ' projects');
    emptyEl.style.display = shown === 0 ? 'block' : 'none';
  }

  document.querySelectorAll('.filter-chip').forEach(btn => {
    btn.addEventListener('click', () => {
      const group = btn.dataset.group;
      const val   = btn.dataset.value;
      document.querySelectorAll(`.filter-chip[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      if(group === 'type')   activeType   = val;
      if(group === 'status') activeStatus = val;
      applyFilters();
    });
  });

  applyFilters();
})();
</script>
</body>
</html>
