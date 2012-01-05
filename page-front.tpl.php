<?php
$banner_classes = theme_get_setting('banner_classes'); 
$banner_image_path = theme_get_setting('banner_image_path'); 
?>
<!DOCTYPE html>
<html>
<head>
<title><?php print $head_title ?></title>
<?php print $head ?><?php print $styles ?>
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php print base_path() . path_to_theme(); ?>/css/ie7.css"><![endif]-->
<?php print $scripts ?>
</head>
<body class="<?php print $body_classes; ?><?php stanford_wilbur_body_class($left, $right, $frontside); ?>">
<div id="skipnav">
  <p>Skip to:</p>
  <ul>
    <li><a href="#content">Main Content</a></li>
  </ul>
</div>
<!-- /#skipnav -->
<div id="layout">
  <div id="global-header">
    <div class="wrapper clear-block">
      <div id="top-logo"><a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/header-stanford-logo.png" width="198" height="11" alt="Stanford University" /></a></div>
      <?php if ($header): ?>
      <div id="top-menu"><?php print $header; ?></div>
      <?php endif; ?>
    </div>
  </div>
  <!-- /#global-header -->
  <div id="container">
    <div class="wrapper clear-block">
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
      <!-- /#header -->
      <div id="navigation" role="navigation" class="clear-block">
        <?php if (isset($primary_links)): ?>
        <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
      </div>
      <!-- /#navigation -->
      <div id="content" class="clear-block">
        <div id="front-main" role="main" class="clear-block">
          <?php if ($banner_classes): ?>
          <div id="banner" role="presentation"> <img src="<?php print $base_path . $banner_image_path; ?>" alt="" /> </div>
          <?php endif; ?>
          <?php if ($front1): ?>
          <div id="front-region1" class="clear-block"> <?php print $front1; ?> </div>
          <?php endif; ?>
          <?php if ($front2): ?>
          <div id="front-region2" class="clear-block"> <?php print $front2; ?> </div>
          <?php endif; ?>
          <?php if ($front3): ?>
          <div id="front-region3" class="clear-block"> <?php print $front3; ?> </div>
          <?php endif; ?>
          <?php print $content ?> </div>
        <!-- /#front-main -->
        <?php if ($frontside): ?>
        <div id="front-sidebar-right" class="clear-block"> <?php print $frontside; ?> </div>
        <!-- /#front-sidebar-right -->
        <?php endif; ?>
      </div>
      <!-- /#content -->
      <div id="footer" role="contentinfo" class="clear-block">
        <?php if ($footer): ?>
        <?php print $footer ?>
        <?php endif; ?>
        <?php print $footer_message ?>
        <?php if (isset($secondary_links)): ?>
        <?php $linknum = count($secondary_links); print '<div id="navigation-secondary" role="navigation" class="across-' . $linknum . '">'; $menu_name = variable_get('menu_secondary_links_source', 'secondary-links'); print menu_tree($menu_name); print '</div>'; ?>
        <?php endif; ?>
      </div>
      <!-- /#footer --> 
    </div>
  </div>
  <!-- /#container -->
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
        <p class="vcard">&copy; <span class="fn org">Stanford University</span>, <span class="adr"><span class="locality">Stanford</span>, <span class="region">California</span> <span class="postal-code">94305</span>. <span class="tel">(650) 723-2300</span></span></p>
      </div>
    </div>
  </div>
  <!-- /#global-footer --> 
</div>
<!-- /#layout --> 
<?php print $closure ?>
</body>
</html>