<?php
namespace ICO\Bylines;
use Bylines\Objects\Byline;


function get_the_bylines_posts_link() {
  if (class_exists( 'Bylines\Objects\Byline' )) {
    $bylines = get_bylines();
    $authors = [];
    $return = '';
    foreach ($bylines as $byline) {
      if ((get_user_by('ID', $byline->ID)) || get_user_by('slug', $byline->slug)) {
        //
      } else {
          $authors[] = $byline;
      }
    }
    //echo var_dump($authors);
    if((count($authors) > 0)) {
      $return .= '<span style="font-weight: bold;">Authors: </span>';
      $i = 0;
      while ($i < count($authors)) {
        $return .= '<a href="'.$authors[$i]->link.'">'.$authors[$i]->display_name.'</a>';
        $i++;
        if ($i === (count($authors)-1)) {
          if (count($authors) > 2) {
            $return .= ',';
          }
          $return .= ' and ';
        } elseif ($i === (count($authors))) {
          break;
        } else {
          $return .= ', ';
        }
      }
    }
    return $return;
  }
}
