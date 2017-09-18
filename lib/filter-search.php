<?php

namespace ICO\Search;

function filter($query) {
  if (is_admin() || !$query->is_main_query() || is_page()) {
    return;
  } else {
// Limit Number of Posts
      //$query->set('post_per_page', 20);

// Keyword
    if (isset($_GET['s'])) {
      $query->set('s', $_GET['s']);
    }

// Post Type
    if (isset($_GET['proceeding_only'])) {
      $query->set('post_type', 'proceedings');
    }

// Author
    if (isset($_GET['authors']) && $_GET['authors'] != '') {
        $query->set('tax_query', [
          [
            'taxonomy' => 'byline',
            'field' => 'slug',
            'terms' => $_GET['authors']
          ]
        ]);
    }

// Day
    if (isset($_GET['days']) && $_GET['days'] != '') {
      $sessions = get_posts(['post_type'=> 'session']);
      $ids = [];
      foreach ($sessions as $key) {
        if (get_field('date', $key->ID) == $_GET['days']) {
          $ids[] = $key->ID;
        }
      }
      $query->set('meta_key', 'session');
      $query->set('meta_value', $ids);
    }

// Session
    if (isset($_GET['sessions']) && $_GET['sessions'] != '') {
        $query->set('meta_key', 'session');
        $query->set('meta_value', $_GET['sessions']);
    }
  }

  return $query;
}; // End Function

add_action('pre_get_posts', __NAMESPACE__ . '\\filter');
