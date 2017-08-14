<article class="search-page search-results">
  <header>
    <h2 class="search-page subheader">
      <a class="accent color" href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
  </header>
  <div class="entry-summary">
    <span class="muted-text">
    <?php //the_excerpt();
    echo ucfirst(get_post_type());
    if (class_exists('acf')) {
      if (get_field('session')) {
        echo ' | ' . get_the_title(get_field('session'));
      }
    }
    ?>
  </span>
  </div>
</article>
