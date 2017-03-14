<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <?php if (is_front_page()) { ?>
      <h4 class="homepage"><?= Titles\title(); ?></h4>
  <?php } else { ?>
      <h1><?= Titles\title(); ?></h1>
  <?php } ?>
</div>
