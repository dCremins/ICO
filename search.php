<?php
if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <div class="jumbotron">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_search_form(); ?>

  </div>
<?php else :
  get_template_part('templates/page', 'header');
endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'search'); ?>
<?php endwhile; ?>
<footer class="search-page">
<?php the_posts_navigation([
    'prev_text' => __('<i class="fa fa-arrow-left" aria-hidden="true"></i> Previous', 'sage'),
    'next_text' => __('Next <i class="fa fa-arrow-right" aria-hidden="true"></i>', 'sage')
  ]); ?>
</footer>
