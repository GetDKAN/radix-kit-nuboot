<?php
/**
 * @file
 * Theme functions
 */

// require_once dirname(__FILE__) . '/includes/block.inc';
// require_once dirname(__FILE__) . '/includes/comment.inc';
// require_once dirname(__FILE__) . '/includes/form.inc';
// require_once dirname(__FILE__) . '/includes/menu.inc';
// require_once dirname(__FILE__) . '/includes/node.inc';
// require_once dirname(__FILE__) . '/includes/panel.inc';
// require_once dirname(__FILE__) . '/includes/search.inc';
// require_once dirname(__FILE__) . '/includes/structure.inc';
// require_once dirname(__FILE__) . '/includes/user.inc';
// require_once dirname(__FILE__) . '/includes/view.inc';

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
    $variables['copyright'] = isset($copyright['value']) ? check_markup($copyright['value'], $copyright['format']) : t('Powered by https://getdkan.org/">DKAN</a>');
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

/**
 * Submit function for theme settings form information.
 */
function {{machine_name}}_site_information_theme_settings_form_submit(&$form, &$form_state) {
  variable_set('site_name', $form_state['values']['site_name']);
  variable_set('site_slogan', $form_state['values']['site_slogan']);
  variable_set('site_mail', $form_state['values']['site_mail']);
}
