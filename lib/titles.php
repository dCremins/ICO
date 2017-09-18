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

    if (isset($_GET['proceeding_only']) && $_GET['proceeding_only'] != '') {
      $title = '<span class="accent color">Proceeding</span> Search Results ';
    } else {
      $title = 'Search Results ';
    }

// for search term
    if (isset($_GET['s']) && $_GET['s'] != '') {
      $title .= 'for <span class="accent color">' . $_GET['s'] . '</span> ';
    }
// days
    if (isset($_GET['days']) && $_GET['days'] != '') {
      $title .= 'on <span class="accent color">'.date("F j", strtotime($_GET['days'])).'</span> ';
    }
// sessions
    if (isset($_GET['sessions']) && $_GET['sessions'] != '') {
      $title .= 'during <span class="accent color">'.get_the_title($_GET['sessions']).'</span> ';
    }
// authors
    if (isset($_GET['authors']) && $_GET['authors'] != '') {
      $author = get_term_by('slug', $_GET['authors'], 'byline');
      $title .= 'by <span class="accent color">'.$author->name.'</span> ';
    }

    return __($title, 'sage');

  } elseif (is_404()) {
    return __('Not Found', 'sage');
  } else {
    return get_the_title();
  }
}
