<?php
// Usage: $activePage = 'home'|'properties'|'sustainability'|'platform'|'contact'
// $navDark = true for dark nav (sustainability page)
$isDark = !empty($navDark);
$cls = $isDark ? 'wde-header wde-header--dark' : 'wde-header';
?>
<header class="<?= $cls ?>">
  <nav class="wde-nav">
    <a href="index.php" aria-label="WeDoEarth home" class="wde-logo">
      <span class="wde-logo-icon">
        <span></span><span></span><span></span><span></span>
      </span>
      <span class="wde-logo-text">
        <span class="wde-logo-name">WeDoEarth</span>
        <span class="wde-logo-sub">Real estate, verified</span>
      </span>
    </a>
    <nav class="wde-navlinks" aria-label="Site navigation">
      <a href="properties.php"    <?= ($activePage==='properties')   ? 'class="active"' : '' ?>>Properties</a>
      <a href="sustainability.php"<?= ($activePage==='sustainability')? 'class="active"' : '' ?>>Sustainability</a>
      <a href="platform.php"      <?= ($activePage==='platform')     ? 'class="active"' : '' ?>>What we do</a>
      <a href="platform.php#builders">For builders</a>
    </nav>
    <a href="kudil.php#enquire" class="wde-cta">Enquire</a>
  </nav>
</header>
