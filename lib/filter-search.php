<?php

namespace ICO\Search;

function filter($query) {
  if (is_admin() || ! $query->is_main_query() || is_page()) {
    return;
  } else {
// Limit Number of Posts
      //$query->set('post_per_page', 20);

// Keyword
    if (isset($_GET['s'])) {
      $query->set('s', $_GET['s']);
    }

// Post Type
    if (isset($_GET['type'])) {
      $query->set('post_type', $_GET['type']);
    }

// Author Name
    if (isset($_GET['author'])) {
        $query->set('author_name', $_GET['author']);
    }
  }

  //return $query;
}; // End Function

add_action('pre_get_posts', __NAMESPACE__ . '\\filter');
