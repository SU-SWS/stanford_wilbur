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
      <!-- /header -->
      <div id="navigation" role="navigation" class="clear-block">
        <?php if (isset($primary_links)): ?>
        <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
      </div>
      <!-- /#navigation -->
      <?php if ($top): ?>
      <div id="top"><?php print $top ?></div>
      <?php endif; ?>
      <div id="content" class="clear-block">
        <div id="main" role="main">
          <?php if ($upper): ?>
          <div id="upper"><?php print $upper ?></div>
          <?php endif; ?>
          <?php if ($title): print '<h1 class="title'. ($tabs ? ' with-tabs' : '') .'">'. $title .'</h1>'; endif; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($tabs): print '</div>'; endif; ?>
          <?php if ($feature): ?>
          <div id="feature"><?php print $feature ?></div>
          <?php endif; ?>
          <?php print $help; ?> <?php print $content ?> </div>
        <!-- /#main -->
        <?php if ($left): ?>
        <div id="sidebar-left"><?php print $left; ?></div>
        <!-- /#sidebar-left -->
        <?php endif; ?>
        <?php if ($right): ?>
        <div id="sidebar-right"><?php print $right; ?></div>
        <!-- /#sidebar-right -->
        <?php endif; ?>
      </div>
      <!-- /#main -->
      <?php if ($bottom): ?>
      <div id="bottom"><?php print $bottom ?></div>
      <?php endif; ?>
      <div id="footer" role="contentinfo" class="clear-block">
        <?php if (isset($secondary_links)): ?>
        <?php $linknum = count($secondary_links); print '<div id="navigation-secondary" role="navigation" class="clear-block across-' . $linknum . '">'; $menu_name = variable_get('menu_secondary_links_source', 'secondary-links'); print menu_tree($menu_name); print '</div>'; ?>
        <?php endif; ?>
        <?php if ($footer): ?>
        <?php print $footer ?>
        <?php endif; ?>
        <?php print $footer_message ?> </div>
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