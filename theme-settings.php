<?php
/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 */
function stanford_wilbur_settings($saved_settings) {
  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the template.php file.
   */
  $defaults = array(
	'layout_classes' => 'col-5 ',
	'color_classes' => 'light ',
	'sideblock_classes' => 'block-no-bg ',
	'sidemenu_classes' => 'menu-no-bg ',
	'banner_classes' => '',
	'banner_image_path' => '',
  );

  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);

  // Create the form widgets using Forms API
  
  // Page Layout
  $form['layout_container'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page Layout'),
    '#description' => t('Use these settings to change the layout of the page.'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  $form['layout_container']['layout_classes'] = array(
    '#type'          => 'radios',
    '#title'         => t('Select page layout. All layouts are 960px fixed width and include left and right sidebars'),
    '#default_value' => $settings['layout_classes'],
    '#options'       => array(
      'col-5 ' => t('180px left sidebar / 190 right sidebar - Meant for use with a left sidebar navigation block - <strong><em>Default</em></strong>'),
	  'col-4 ' => t('220px left sidebar / 190 right sidebar - Meant for use with a left sidebar navigation block'),
      'no-nav ' => t('180px left sidebar / 280px right sidebar - Meant for use without left sidebar'),
    ),
  );
  
  $form['layout_container']['color_classes'] = array(
    '#type'          => 'radios',
    '#title'         => t('Select use of light or dark color scheme'),
    '#default_value' => $settings['color_classes'],
    '#options'       => array(
      'light ' => t('Light - <strong><em>Default</em></strong>'),
	  'dark ' => t('Dark'),
    ),
  );
  
  $form['layout_container']['sideblock_classes'] = array(
    '#type'          => 'radios',
    '#title'         => t('Select how you want sidebar blocks to be displayed'),
    '#default_value' => $settings['sideblock_classes'],
    '#options'       => array(
      'block-no-bg ' => t('No background - <strong><em>Default</em></strong>'),
	  'block-bg ' => t('With background'),
    ),
  );
      
  $form['layout_container']['sidemenu_classes'] = array(
    '#type'          => 'radios',
    '#title'         => t('Select how you want sidebar menus to be displayed'),
    '#default_value' => $settings['sidemenu_classes'],
    '#options'       => array(
      'menu-no-bg ' => t('No background - <strong><em>Default</em></strong>'),
	  'menu-bg ' => t('With background'),
    ),
  );  
	  
  // Front Page Banner Graphic
  $form['banner_container'] = array(
    '#type' => 'fieldset',
    '#title' => t('Front Page Image'),
    '#description' => t('Use these settings to add an image to the front page.'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  $form['banner_container']['banner_classes'] = array(
    '#type'          => 'radios',
    '#title'         => t('Select image display'),
    '#default_value' => $settings['banner_classes'],
    '#options'       => array(
      '' => t('No image - <strong><em>Default</em></strong>'),
	  'banner ' => t('Use image below:'),
    ),
  );
  
  // This ensures that a 'files' directory exists if it hasn't
  // already been been created.
  file_check_directory(file_directory_path(), 
    FILE_CREATE_DIRECTORY, 'file_directory_path');

  // Check for a freshly uploaded header image, save it to the
  // filesystem, and grab its full path for later use.
  if ($file = file_save_upload('banner_image',
      array('file_validate_is_image' => array()))) {
    $parts = pathinfo($file->filename);
    $filename = 'banner.'. $parts['extension'];
    if (file_copy($file, $filename, FILE_EXISTS_REPLACE)) {
      $settings['banner_image_path'] = $file->filepath;
    }
  }

  // Define the settings-related FormAPI elements.
  $form['banner_container']['banner_image'] = array(
    '#type' => 'file',
    '#title' => t('Upload graphic in .jpg, .gif, or .png format - 740px by 305px'),
    '#maxlength' => 40,
  );
  $form['banner_container']['banner_image_path'] = array(
    '#type' => 'value',
    '#value' => !empty($settings['banner_image_path']) ?
      $settings['banner_image_path'] : '',
  );
  if (!empty($settings['banner_image_path'])) {
    $form['banner_container']['banner_image_preview'] = array(
      '#type' => 'markup',
      '#value' => !empty($settings['banner_image_path']) ? 
          theme('image', $settings['banner_image_path']) : '',
    );
  }

  // Return the additional form widgets
  return $form;
}
?>