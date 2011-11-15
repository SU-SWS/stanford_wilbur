<!DOCTYPE html>
<meta charset="utf-8">
<head>
<title><?php print $head_title ?></title>
<?php print $head ?><?php print $styles ?>
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php print base_path() . path_to_theme(); ?>/css/ie7.css"><![endif]-->
<?php print $scripts ?>
</head>
<body class="<?php print $body_classes; ?><?php stanford_wilbur_body_class($left, $right, $frontside); ?>">
<div id="layout"> 
  <!-- Start Global Header -->
  <div id="global-header">
    <div class="wrapper clear-block">
      <div id="top-logo"><a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/header-stanford-logo.png" width="198" height="11" alt="Stanford University" /></a></div>
      <?php if ($header): ?>
      <div id="top-menu"><?php print $header; ?></div>
      <?php endif; ?>
    </div>
  </div>
  <!-- End Global Header -->
  <div id="container">
    <div class="wrapper clear-block"> 
      <!-- Start header -->
      <div id="header" role="banner" class="clear-block">
        <?php if ($logo): ?>
        <div id="logo"> <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a> </div>
        <?php endif; ?>
        <div id="site">
          <?php if ($site_name): ?>
          <div id="name">
            <h1><a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><?php print $site_name; ?></a></h1>
          </div>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
          <div id="slogan"> <?php print $site_slogan; ?> </div>
          <?php endif; ?>
        </div>
        <?php if($search_box): ?>
        <div id="search" role="search"> <?php print $search_box; ?> </div>
        <?php endif; ?>
      </div>
      <!-- End header -->
      <div id="navigation" role="navigation" class="clear-block">
        <?php if (isset($primary_links)): ?>
        <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
      </div>
      <!-- Start content -->
      <div id="content" role="main" class="clear-block">
        <?php if ($landingimage): ?>
        <div id="landing-image" role="presentation" class="clear-block"> <?php print $landingimage; ?> </div>
        <?php endif; ?>
        
        <div id="landing-main" class="clear-block">
          <?php if ($landing1): ?>
          <div id="landing-region1" class="clear-block"> <?php print $landing1; ?> </div>
          <?php endif; ?>
          <?php if ($landing2): ?>
          <div id="landing-region2" class="clear-block"> <?php print $landing2; ?> </div>
          <?php endif; ?>
          <?php if ($landing3): ?>
          <div id="landing-region3" class="clear-block"> <?php print $landing3; ?> </div>
          <?php endif; ?>
          <?php if ($landing4): ?>
          <div id="landing-region4" class="clear-block"> <?php print $landing4; ?> </div>
          <?php endif; ?>
          <?php if ($landing5): ?>
          <div id="landing-region5" class="clear-block"> <?php print $landing5; ?> </div>
          <?php endif; ?>
          <?php print $content ?>
        </div>
      </div>
      <!-- End content --> 
      <!-- Start footer links -->
      <div id="footer" role="contentinfo" class="clear-block">
        <?php if ($footer): ?>
        <?php print $footer ?>
        <?php endif; ?>
        <?php print $footer_message ?>
        <?php if (isset($secondary_links)): ?>
        <?php $linknum = count($secondary_links); print '<div id="navigation-secondary" role="navigation" class="across-' . $linknum . '">'; $menu_name = variable_get('menu_secondary_links_source', 'secondary-links'); print menu_tree($menu_name); print '</div>'; ?>
        <?php endif; ?>
      </div>
      <!-- End footer links --> 
    </div>
  </div>
  <!-- Start Global Footer -->
  <div id="global-footer">
    <div class="wrapper clear-block">
      <div id="bottom-logo"> <a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/footer-stanford-logo.png" alt="Stanford University" /></a> </div>
      <div id="bottom-text">
        <div id="bottom-menu" class="clear-block">
          <ul>
            <li><a href="http://www.stanford.edu">Stanford University Home</a></li>
            <li><a href="http://visit.stanford.edu/plan/maps.html">Maps &amp; Directions</a></li>
            <li><a href="http://www.stanford.edu/search/">Search Stanford</a></li>
            <li><a href="http://www.stanford.edu/site/terms.html">Terms of Use</a></li>
            <li><a href="http://www.stanford.edu/site/copyright.html">Copyright Complaints</a></li>
          </ul>
        </div>
        <p class="vcard">&copy; <span class="fn org">Stanford University</span>, <span class="adr"><span class="locality">Stanford</span>, <span class="region">California</span> <span class="postal-code">94305</span>. <span class="tel">(650) 723-2300</span></span></p></div>
    </div>
  </div>
  <!-- End Global Footer --> 
</div>
<?php print $closure ?>
</body>
</html>