
<form id="searchform" method="get" role="search" action="<?php echo home_url('/'); ?>">
<div class="search_container">
   <!-- Author -->
   <?php if (class_exists( 'Bylines\Objects\Byline' )) {
      $terms = get_terms('byline');?>
    <div class="search_filter">
      <h3 class="subheader">Author</h3>
      <div class="search_input">
        <label class="sr-only" for="authors" class=""><?php _e('Select an Author: ', 'textdomain'); ?></label><br>
        <select name="authors" class="custom-select">
          <optgroup label="Authors">
            <option selected value="">All Authors</option>
            <?php foreach ($terms as $byline) {
              if ((get_user_by('ID', $byline->ID)) || get_user_by('slug', $byline->slug)) {
                //
              } else { ?>
                <option value="<?php echo $byline->slug; ?>"><?php echo $byline->name; ?></option>
            <?php  }
            ?>
            <?php }; ?>
          </optgroup>
        </select>
      </div>
    </div>
    <?php }?>
    <!-- /Author -->
    <!-- Day -->
    <?php if (post_type_exists( 'session' )) {
      $args = array(
        'post_type'   => 'session',
        'numberposts' => -1,
      	'meta_key'		=> 'date',
      	'orderby'			=> 'meta_value',
      	'order'				=> 'ASC'
      );
      $days = get_posts($args);
      //echo var_dump($days[0]);
    ?>
     <div class="search_filter">
       <h3 class="subheader">Day</h3>
       <div class="search_input">
         <label class="sr-only" for="days" class=""><?php _e('Filter by Day: ', 'textdomain'); ?></label><br>
         <select name="days" class="custom-select">
           <optgroup label="Authors">
             <option selected value="">All Days</option>
             <?php $yesterday = '';
             foreach ($days as $date) {
               if ($yesterday !== get_field('date', $date->ID)) {
                 echo '<option value="'.get_field('date', $date->ID).'">'.date("F j", strtotime(get_field('date', $date->ID))).'</option>';
                 $yesterday = get_field('date', $date->ID);
               } else {
                 $yesterday = get_field('date', $date->ID);
                 continue;
               }
            }; ?>
           </optgroup>
         </select>
       </div>
     </div>
     <?php }?>
    <!-- /Day -->
    <!-- Session -->
    <?php if (post_type_exists( 'session' )) {
      $args = array(
        'post_type'   => 'session',
        'numberposts' => -1,
        'orderby'     => 'title',
        'order'       => 'ASC'
      );
      $sessions = get_posts($args);
    ?>
     <div class="search_filter">
       <h3 class="subheader">Session</h3>
       <div class="search_input">
         <label class="sr-only" for="sessions" class=""><?php _e('Filter by Session: ', 'textdomain'); ?></label><br>
         <select name="sessions" class="custom-select">
           <optgroup label="Session">
             <option selected value="">All Sessions</option>
             <?php foreach ($sessions as $sess) { ?>
               <option value="<?php echo $sess->ID; ?>"><?php echo $sess->post_title; ?></option>
             <?php }; ?>
           </optgroup>
         </select>
       </div>
     </div>
     <?php }?>
    <!-- /Session -->
    <!-- Proceedings Only -->
    <?php if (class_exists( 'Bylines\Objects\Byline' )) {
       $terms = get_terms('byline');?>
     <div class="search_filter">
       <h3 class="subheader">Proceedings Only</h3>
       <input type="checkbox" class="search_proceedings" name="proceeding_only" value='true' />
     </div>
     <?php }


     ?>
    <!-- /Proceedings Only -->

  <div id="search" class="search-page">
      <div class="form-group input-group">
        <label for="s" class="sr-only">Search:</label>
        <input type="search" name="s" id="s" class="form-control"
          value="<?php the_search_query(); ?>"
          placeholder="Search for..." />
        <span class="input-group-btn">
          <button class="btn btn-secondary search-button" type="submit" value="Search" alt="Search">Search</button>
        </span>
      </div>
  </div>

</div>

</form>
