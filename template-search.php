<?php
/**
 * Template Name: Search Template
 */

while (have_posts()) : the_post();
  echo '<div class="jumbotron">';
  get_template_part('templates/page', 'header');
  get_template_part('templates/content', 'page');
  get_search_form();
  echo '</div>';
  echo '<section>';
  dynamic_sidebar('sidebar-search');
  echo '</section>';
endwhile;
