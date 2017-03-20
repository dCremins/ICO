<?php
/**
 * Template Name: Search Template
 */

while (have_posts()) : the_post();
  get_template_part('templates/page', 'header');
  get_template_part('templates/content', 'page');
  get_search_form();
endwhile;
