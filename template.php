<?php
/**
 * @file
 * Theme functions
 */

// Include all files from the includes directory.
$includes_path = dirname(__FILE__) . '/includes/*.inc';
foreach (glob($includes_path) as $filename) {
  require_once dirname(__FILE__) . '/includes/' . basename($filename);
}

/**
 * Implements template_preprocess_page().
 */
function {{machine_name}}_preprocess_page(&$variables) {
  // Add copyright to theme.
  if ($copyright = theme_get_setting('copyright')) {
    $variables['copyright'] = check_markup($copyright['value'], $copyright['format']);
  }
  $variables['display_login_menu'] = (theme_get_setting('display_login_menu') === NULL) ? 1 : theme_get_setting('display_login_menu');
}

/**
 * Implements hook_form_alter().
 */
function {{machine_name}}_form_alter(&$form, &$form_state, $form_id) {
  switch ($form_id) {
    case 'colorizer_admin_settings':
      $form['colorizer_global']['colorizer_cssfile']['#default_value'] = '../../../../profiles/dkan/themes/nuboot_radix/colorizer/colorizer.css';
      $form['colorizer_global']['colorizer_incfile']['#default_value'] = 'colorizer/colorizer.inc';
      break;
  }
}
