<?php use Roots\Sage\Titles; ?>

<header class="page-header">
  <?php
  if (class_exists('acf')) {
    if (get_field('title', 'option')) {
      $h1 = get_field('title', 'option');
    }
  } else {
    $h1 = get_bloginfo('name');
  }
  if (is_front_page()) { ?>
      <h3 role="site-title" class="sr-only"><?php echo $h1; ?></h3>
      <h3 class="homepage"><?= Titles\title(); ?></h3>
  <?php } else { ?>
      <h1><?= Titles\title(); ?></h1>
  <?php } ?>
</header>
