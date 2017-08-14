<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Add Adobe Typekit Fonts
 */

function theme_typekit() {
    wp_enqueue_script('theme_typekit', '//use.typekit.net/ezj7hwz.js');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\theme_typekit');

function theme_typekit_inline() {
  if (wp_script_is('theme_typekit', 'done')) { ?>
    <script type="text/javascript">try{Typekit.load({ async: true });}catch(e){}</script>
<?php }
}
add_action('wp_head', __NAMESPACE__ . '\\theme_typekit_inline');

/**
 * Remove Extra menus from dashboard
 */
if (!current_user_can('administrator')) {
  add_action('admin_menu', function () {
      remove_menu_page('edit.php');
      remove_menu_page('tools.php');
      remove_menu_page('edit-comments.php');
  });

  add_action('admin_bar_menu', function () {
      global $wp_admin_bar;
      $wp_admin_bar->remove_node('new-post');
  }, 999);

  add_action('admin_init', function () {
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
  });
}
