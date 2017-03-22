<?php
/**
 * Template Name: Homepage Template
 */


while (have_posts()) : the_post();
    get_template_part('templates/page', 'header');
    get_template_part('templates/content', 'page');
endwhile;
echo '<section>';
dynamic_sidebar('sidebar-home');
echo '</section>';
