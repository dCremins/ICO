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
    if (get_field('date')) {
      echo ' | ' . date("F jS", strtotime(get_field('date')));
    } elseif (get_field('session_title')) {
      echo ' | ' . date("F jS", strtotime(get_field('session')));
    } elseif (get_field('session')) {
      echo ' | ' . date("F jS", strtotime(get_field('date', get_field('session'))));
    }
    ?>
  </span>
  </div>
</article>
