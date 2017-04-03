<?php

namespace Roots\Sage\Titles;

/**
 * Page titles
 */
function title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'sage');
    }
  } elseif (is_archive()) {
    return get_the_archive_title();
  } elseif (is_search()) {
    $title = 'Search Results ';
// for search term
    if (isset($_GET['s']) && $_GET['s'] != '') {
      $title .= 'for <span class="accent color">' . $_GET['s'] . '</span> ';
    }
// in post type
    if (isset($_GET['type'])) {
      $title .= 'in';
      $count = sizeof($_GET['type']);

      foreach ($_GET['type'] as $type) {
        $count -= 1;
        $object = get_post_type_object($type);
        $type = $object->labels->name;
        $title .= ' <span class="accent color">' . ucfirst($type) . '</span>';

        if ($count > 1 && sizeof($_GET['type']) > 2) {
          $title .= ',';
        } elseif ($count > 0 && sizeof($_GET['type']) > 2) {
          $title .= ', and ';
        } elseif ($count == 1) {
          $title .= ' and ';
        }
      }
    }
    return __($title, 'sage');




  } elseif (is_404()) {
    return __('Not Found', 'sage');
  } else {
    return get_the_title();
  }
}
