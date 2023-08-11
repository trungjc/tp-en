<?php
/**
 * Template Name: Page template locations
 * Description: Page template  locations
 * Application
 *
 */

get_header();
global $post; 

?>

<main class="main">
  <div class="container breadcrumb-container border-0 mb-0">
    <?php bcn_display(); ?>
  </div>
  <section class="container category-layout mb-5 pb-5">
  <?php 
    // $custom_terms = get_terms('locations_category');
    $taxonomies =  get_categories('taxonomy=locations-category&type=locations'); 
    echo "<select class='form-control' id='location'>";
    foreach ($taxonomies as $taxonomy){
        echo "<option value=".$taxonomy->term_id .">".$taxonomy->name ."</option>";
    }
    echo "</select>";
    $query_arr = array(
      'post_type' => 'locations',
          'tax_query' => array(
              array(
                  'taxonomy' => 'locations-category',
                  'field'    => 'id',
                  'terms'    => 108
              ),
          ),
      );
    $query = new WP_Query($query_arr);
    if ( $query->have_posts() ) : ?>
     <div class="loading my-5 text-center" style="display: none">Loading...</div>
     <div class="site-main">  
       
        <?php    while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/content/content-locations');
            endwhile;
        else :
            echo "<h1>' . __( 'No found!', 'justread' ) .'</h1>";
            endif;
        ?>
  </div>
  </section>
</main>
<?php get_footer(); ?>
