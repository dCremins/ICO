<header class="banner" role="banner">
  <?php if (is_front_page()) { ?>
    <div class="site-header">
        <?php
        if (get_field('banner_image', 'option')) {
          $banner = get_field('banner_image', 'option');
          echo '<div class="wp-custom-header">
          <img src="' . $banner['url'] . '" alt="' . get_bloginfo('name') . '">
          </div>';
        } elseif (get_header_image()) {
          echo '<div class="image-overlay"></div>';
          the_custom_header_markup();
        }
        ?>

        <div class="site-info">
          <div class="content <?php if (get_field('darken_image', 'option')) {echo 'image-overlay';}?>">
            <h1>
              <?php
              if (get_field('title', 'option')) {
                the_field('title', 'option');
              } else {
                bloginfo('name');
              } ?>
            </h1>
            <h2>
              <?php
              if (get_field('sub_title', 'option')) {
                the_field('sub_title', 'option');
              } else {
                bloginfo('description');
              }
              if (get_field('extra_sub_title', 'option')) {
                echo '<br />';
                the_field('extra_sub_title', 'option');
              } ?>
            </h2>
            <?php
            if (have_rows('buttons', 'option') && !get_field('post_conference', 'option')) {
              while (have_rows('buttons', 'option')) {
                the_row();
                echo '<a class="btn btn-secondary" href="' . get_sub_field('link', 'option') . '" role="button">';
                the_sub_field('text', 'option');
                echo '</a>';
              }
            } ?>
          </div>
        </div>
    </div>

    <?php } ?>
  <div class="sticky-nav">
    <nav role="navigation" id="site-navigation" class="container">
      <?php
      if (get_field('logo', 'option')) {
        $image = get_field('logo', 'option');
        $src = $image['url'];
      } else {
        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
        $src = $image[0];
      }
      $home = get_home_url();
      if (get_field('post_conference', 'option')) {
        if (has_nav_menu('post_navigation')) {
            echo '<a class="site-logo" href="'
                . $home
                . '"><img alt="website logo" src="'
                . $src
                . '"></a>';

            echo '<button class="menu-toggle btn btn-secondary" aria-label="responsive menu toggle">
                 <i class="fa fa-bars" aria-hidden="true"></i>
                 </button>';
          wp_nav_menu([
            'theme_location' => 'post_navigation',
            'items_wrap'     => '<ul id="%1$s" class="%2$s"> %3$s</ul>',
            'container'      => false,
            'menu_class'     => 'nav'
          ]);
        }
      } else {
        if (has_nav_menu('pre_navigation')) {
            echo '<a class="site-logo" href="'
                . $home
                . '"><img alt="website logo" src="'
                . $src
                . '"></a>';

            echo '<button class="menu-toggle btn btn-secondary" aria-label="responsive menu toggle">
                 <i class="fa fa-bars" aria-hidden="true"></i>
                 </button>';
          wp_nav_menu([
            'theme_location' => 'pre_navigation',
            'items_wrap'     => '<ul id="%1$s" class="%2$s"> %3$s</ul>',
            'container'      => false,
            'menu_class'     => 'nav'
          ]);
        }
      }
      ?>
    </nav>
  </div>
</header>
