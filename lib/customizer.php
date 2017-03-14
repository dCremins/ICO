<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');

/**
 * Register Banner Image
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 */
$args = array(
    'default-text-color' => 'fff',
    'width'              => 1500,
    'height'             => 450,
    'flex-width'         => true,
    'flex-height'        => true,
  );
add_theme_support('custom-header', $args);

/**
 * Register Logo Image
 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
 */
add_theme_support('custom-logo', array(
 'height'      => 100,
 'width'       => 100,
 'flex-width' => true,
));

/**
* Add ACF Options Page for Theme Options
**/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
    'page_title'  => 'Theme Options',
    'menu_title'  => 'Theme Options',
    'menu_slug'   => 'theme-options'
    ));
}
