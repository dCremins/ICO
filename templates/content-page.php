<section>
<?php

if (get_field('video')) {
  echo '<div class="row">';
  echo '<div class="col">';
  the_content();
  echo '</div>';
  echo '<div class="col">';
  the_field('video');
  echo '</div>';
  echo '</div>';
} else {
  the_content();
}

wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

</section>
