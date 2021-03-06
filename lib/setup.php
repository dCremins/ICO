<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'pre_navigation' => __('Pre-Conference Navigation', 'sage'),
    'post_navigation' => __('Post-Conference Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Home', 'sage'),
    'id'            => 'sidebar-home',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>'
  ]);

  register_sidebar([
    'name'          => __('Search Page', 'sage'),
    'id'            => 'sidebar-search',
    'before_widget' => '<section class="col-lg-6 widget %1$s %2$s">',
    'after_widget'  => '</section>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}
/**
* Remove Wordpress Head Styles
**/

add_theme_support('admin-bar', array('callback' => '__return_false'));


/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('dashicons');
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), ['color/css', 'dashicons'], false, null);

// Set Color Via Theme Options
if (class_exists('acf')) {
  if (get_field('color_scheme', 'option') == 'Blue') {
    wp_enqueue_style('color/css', Assets\asset_path('styles/blue.css'), false, null);
  } elseif (get_field('color_scheme', 'option') == 'Red') {
    wp_enqueue_style('color/css', Assets\asset_path('styles/red.css'), false, null);
  } elseif (get_field('color_scheme', 'option') == 'Purple') {
    wp_enqueue_style('color/css', Assets\asset_path('styles/purple.css'), false, null);
  } elseif (get_field('color_scheme', 'option') == 'Orange') {
    wp_enqueue_style('color/css', Assets\asset_path('styles/orange.css'), false, null);
  } else {
    wp_enqueue_style('color/css', Assets\asset_path('styles/green.css'), false, null);
  }
} else {
  wp_enqueue_style('color/css', Assets\asset_path('styles/green.css'), false, null);
}


  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('responsive-menu/js', Assets\asset_path('scripts/menu.js'), ['jquery'], null, true);
  wp_enqueue_script('search/js', Assets\asset_path('scripts/search.js'), ['jquery'], null, true);

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('admin/css', Assets\asset_path('styles/admin.css'), false, null);
});
