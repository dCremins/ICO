<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <?php if (is_front_page()) { ?>
      <h3 class="homepage"><?= Titles\title(); ?></h3>
  <?php } else { ?>
      <h1><?= Titles\title(); ?></h1>
  <?php } ?>
</div>
