<?php
/*
** get_post_types(args, output, operator);
** https://codex.wordpress.org/Function_Reference/get_post_types
*/
$post_types = get_post_types(['public'   => true], 'names', 'and');

/*
** Get Authors list is Co-Authors Plugin is installed
** https://wordpress.org/plugins/co-authors-plus/
*/
if (function_exists('coauthors_posts_links')) {
   global $coauthors_plus;
   $args = array(
     'post_type' => 'guest-author',
     'numberposts' => -1,
     'orderby' => 'title',
     'order' => 'ASC'
   );
   $guest_authors = get_posts($args);
   $tax = $coauthors_plus->coauthor_taxonomy;
   $terms = get_terms($tax);
}
?>

<h2 class="search-page subheader">
  <a data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="collapseExample">Advanced Search</a>
</h2>
<br />

<div id="search" class="search-page">
    <form id="searchform" method="get" role="search" action="<?php echo home_url('/'); ?>">
      <div class="form-group input-group">
        <label for="s" class="sr-only">Search:</label>
       <input type="search" name="s" id="s" class="form-control"
       value="<?php the_search_query(); ?>"
       placeholder="Search for..." />
         <span class="input-group-btn">
           <button class="btn btn-secondary search-button" type="submit" value="Search" alt="Search">Search</button>
         </span>
     </div>
<div class="container">
     <div id="advanced" class="collapse">
       <div class="row">

<!-- Author -->

       <fieldset class="form-group col-lg-8">
         <h3 class="search-page subheader">Types</h3>
         <p id="typeHelp" class="form-text text-muted">Defaults to all post types if no boxes are selected.</p>
        <?php
        foreach ($post_types as $post_type) {
          if ($post_type == 'attachment' || $post_type == 'guest-author') {
             continue;
          }
          if (isset($_GET['type']) && in_array($post_type, $_GET['type'])) {
            $checked = 'checked';
          } else {
            $checked = '';
          }
          echo '<div class="form-check form-check-inline">
          <label for="'
          . $post_type
          . '" class="form-check-label">
          <input name="type[]" class="form-check-input" type="checkbox" id="'
          . $post_type
          . '-checkbox" value="'
          . $post_type
          . '"'
          . $checked . ' />  '
          . ucfirst($post_type)
          . '</label>
          </div>';
        }
        ?>
      </fieldset>

<!-- Author -->

      <div id="authors-collapser" class="collapse col-lg-4">
        <?php if (function_exists('coauthors_posts_links')) { ?>
        <h3 class="search-page subheader">Author</h3>
        <p id="typeHelp" class="form-text text-muted">Narrow search by author.</p>
        <div class="input-group">
          <label class="sr-only" for="<?php echo $tax; ?>" class=""><?php _e('Select an Author: ', 'textdomain'); ?></label><br>
          <select name="<?php echo $tax; ?>" class="custom-select">
            <optgroup label="Authors">
              <option selected value="">All Authors</option>
              <?php foreach ($guest_authors as $ga) { ?>
              <option value="<?php echo $ga->post_name; ?>"><?php echo $ga->post_title; ?></option>
              <?php }; ?>
            </optgroup>
          </select>
        </div>
        <?php }?>
     </div>

<!-- /Author -->

   </div>
    </div>
</div>


     </form>
</div>
