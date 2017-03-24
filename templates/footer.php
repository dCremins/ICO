<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <?php  if (get_field('search', 'option')) { ?>
      <div class="col-2">
        <a href="/search">Search</a>
      </div>
      <?php } ?>

      <div class="col-8">
        <?php
        if (get_field('name', 'option')) {
          echo 'For more information, please contact ';
          if (get_field('email', 'option')) {
             echo '<a href="mailto:'
             . get_field('email', 'option') . '">';
          }
          the_field('name', 'option');
          if (get_field('email', 'option')) {
             echo '</a>';
          }
          if (get_field('phone', 'option')) {
             echo ' at '
             . get_field('phone', 'option');
          }
          echo '<br />';
        }
        echo '<small><em>';
        if (get_field('year', 'option')) {
          echo '&copy; ' . get_field('year', 'option') . '.';
        }
        if (get_field('sponsor', 'option')) {
          if (get_field('website', 'option')) {
            echo '      <a href="' . get_field('website', 'option') . '">';
          }
          the_field('sponsor', 'option');
          if (get_field('website', 'option')) {
            echo '</a>     ';
          }
        }
        echo 'All rights reserved.</em></small>'; ?>
      </div>

      <?php
      if (get_field('sponsor-logo', 'option')) {
        $logo = get_field('sponsor-logo', 'option');
        echo '<div class="col-2"><div class="foot-logo">';
        if (get_field('website', 'option')) {
           echo '<a href="'
           . get_field('website', 'option') . '" alt="' . get_field('sponsor', 'option') . '">';
        }
        echo '<img src="' . $logo['url'] . '" alt="' . get_field('sponsor', 'option') . '">';
        if (get_field('website', 'option')) {
          echo '</a>';
        }
        echo '</div></div>';
      }
      ?>
      <div class="col-3">
      </div>
    </div>
  </div>
</footer>
