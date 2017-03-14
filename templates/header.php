<header class="banner">
    <div class="site-header">
        <?php if (get_header_image()) : ?>
          <?php the_custom_header_markup(); ?>
        <?php endif; ?>
        <div class="site-info">
          <div class="content">
            <h1>The 2017 International Conference on Ecology & Transportation</h1>
            <h2>
              May 14th - 18th, 2017 <br />
              Salt Place Convention Center | Salt Lake City, Utah
            </h2>
            <button class="header-button">
              <h3>Participant Registration</h3>
            </button>
            <button class="header-button">
              <h3>Sponsor Registration</h3>
            </button>
          </div>
        </div>
    </div>
  <div class="sticky-nav">
    <nav class="container">
      <?php
      $custom_logo_id = get_theme_mod('custom_logo');
      $image = wp_get_attachment_image_src($custom_logo_id, 'full');
      $home = get_home_url();
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'items_wrap'     => '<ul id="%1$s" class="%2$s"><li><a class="site-logo" href="'
                              . $home
                              . '"><img alt="website logo" src="'
                              . $image[0]
                              . '"></a></li> %3$s</ul>',
          'container'      => false,
          'menu_class'     => 'nav'
        ]);
      endif;
      ?>
    </nav>
  </div>
</header>
