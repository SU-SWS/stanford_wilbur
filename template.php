<?php
/*
 * Initialize theme settings
 */
if (is_null(theme_get_setting('icon_classes'))) {
  global $theme_key;
  // Make sure $defaults exactly matches the $defaults in the theme-settings.php file.
  $defaults = array(
	'layout_classes' => 'col-5 ',
	'color_classes' => 'light ',
	'sideblock_classes' => 'block-no-bg ',
	'sidemenu_classes' => 'menu-no-bg ',
	'banner_classes' => '',
	'banner_image_path' => '',
  );
  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don't save the toggle_node_info_ variables.
  if (module_exists('node')) {
    foreach (node_get_types() as $type => $name) {
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}

/**
 * Override or insert variables into the page templates.
 */
function stanford_wilbur_preprocess_page(&$vars) {
  //Adding body classes
  $theme_layout = theme_get_setting('layout_classes');
  $color_layout = theme_get_setting('color_classes');
  $block_layout = theme_get_setting('sideblock_classes');
  $menu_layout = theme_get_setting('sidemenu_classes');
  $classes = split(' ', $vars['body_classes']);
  $vars['body_classes_array'] = $classes;
  $classes[] = $theme_layout;
  $classes[] = $color_layout;
  $classes[] = $block_layout;
  $classes[] = $menu_layout;
  $vars['body_classes'] = implode(' ', $classes); // Concatenate with spaces.
  $vars['tabs2'] = menu_secondary_local_tasks();
  
  //page-[content type].tpl suggestions
  if ($vars['node']->type != "") {
    $vars['template_files'][] = "page-" . $vars['node']->type;
  }
  if (drupal_is_front_page()) {
         $vars['template_file'] = 'page-front';
  }
}

/**
 * Left and right sidebar body classes
 */
function stanford_wilbur_body_class($left, $right, $frontside) {
  if ($left != '' && $right != '') {
    $sideclass = 'sidebars';
  }
  else {
    if ($left != '') {
      $sideclass = 'sidebar-left';
    }
    if ($right != '') {
      $sideclass = 'sidebar-right';
    }
  }
  if ($frontside != '') {
    $sideclass .= ' sidebar-front';
  }
  if (isset($sideclass)) {
    print $sideclass;
  }
}

/**
 * Add "last" class to blocks within regions
 */
function stanford_wilbur_blocks($region) {
  $output = '';
  if ($list = block_list($region)) {
    $blockcounter = 1;
	$numofblocks = count($list);
    foreach ($list as $key => $block) {
      $block->extraclass = '';
      $block->extraclass .= ( $blockcounter == 1 ? ' block-first' : '' );
      $block->extraclass .= ( $blockcounter == count($list) ? ' block-last' : '' );
	  //Also count the number of blocks in a region and add the class
      $block->extraclass .= ' blocknum' . $numofblocks;
      $output .= theme('block', $block);
      $blockcounter++;
    }
  }
  // Add any content assigned to this region through drupal_set_content() calls.
  $output .= drupal_get_content($region);
  return $output;
}
function stanford_wilbur_preprocess_block(&$vars){
  $vars['classes'] .= $vars['block']->extraclass;
}

/**
 * Allow themable wrapping of all comments.
 */

function stanford_wilbur_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}


/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 */

function stanford_wilbur_menu_local_tasks() {
  return menu_primary_local_tasks();
}

function stanford_wilbur_comment_submitted($comment) {
  return t('by <strong>!username</strong> | !datetime',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

function stanford_wilbur_node_submitted($node) {
  return t('by <strong>!username</strong> | !datetime',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}