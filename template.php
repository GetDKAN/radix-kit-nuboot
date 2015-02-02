<?php
/**
 * @file
 * Theme functions
 */

/**
 * Implements hook_form_alter().
 */
function notice_form_alter(&$form, &$form_state, $form_id) {
  switch ($form_id) {
    case 'colorizer_admin_settings':
      $form['colorizer_global']['colorizer_cssfile']['#default_value'] = 'colorizer/colorizer.css';
      $form['colorizer_global']['colorizer_incfile']['#default_value'] = 'colorizer/colorizer.inc';
      break;
  }
}