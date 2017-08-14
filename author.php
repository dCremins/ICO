 <?php

 get_template_part('templates/page', 'header');

 if (!have_posts()) :
  echo '<div class="alert alert-warning">' . _e('Sorry, no results were found.', 'sage') . '</div>';
   get_search_form();
 endif;

 while (have_posts()) : the_post();
   get_template_part('templates/content', 'author');
 endwhile;

 the_posts_navigation();
