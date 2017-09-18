<article <?php post_class(); ?>>
  <header>
    <?php if(get_post_type() === 'proceedings' && class_exists('acf')) { ?>
      <?php $session = get_field('session');
      $sessionTitle = get_the_title($session); ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <br /> <small class="accent color"><?php echo $sessionTitle; ?></small></h2>
    <?php } else { ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    | <small class="text-muted" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></small></h2>
    <?php }; ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
