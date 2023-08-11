<?php

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
//        'delimiter'   => ' &gt; ',
//        'wrap_before' => '<li class="breadcrumb-item" itemprop="breadcrumb">',
//        'wrap_after'  => '</li>',
        'before'      => '<li class="breadcrumb-item">',
        'after'       => '</li>',
        'home'        => _x( 'DEVELOPMENT KITS', 'breadcrumb', 'woocommerce' ),
    );
}

// // change the breadcrumb on the product page
// add_filter( 'woocommerce_get_breadcrumb', 'custom_breadcrumb', 20, 2 );
// function custom_breadcrumb( $crumbs, $breadcrumb ) {

//     // only on the single product page
//     if ( ! is_product() ) {
//         return $crumbs;
//     }

//     // gets the first element of the array "$crumbs"
//     $new_crumbs[] = reset( $crumbs );
//     // gets the last element of the array "$crumbs"
//     $new_crumbs[] = end( $crumbs );
//     return $new_crumbs;
// }


add_filter( 'show_admin_bar', '__return_false' );

flush_rewrite_rules( false );


add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' ); //change page with your post type slug.
}

add_action( 'init', 'my_add_excerpts_to_service' );
function my_add_excerpts_to_service() {
     add_post_type_support( 'services', 'excerpt' ); //change page with your post type slug.
}

// add_action( 'init', 'my_add_excerpts_to_people' );
// function my_add_excerpts_to_people() {
//      add_post_type_support( 'people', 'excerpt' ); //change page with your post type slug.
// }

// function get_the_excerpt( $post = null ) {
// 	if ( is_bool( $post ) ) {
// 		_deprecated_argument( __FUNCTION__, '2.3.0' );
// 	}

// 	$post = get_post( $post );
// 	if ( empty( $post ) ) {
// 		return '';
// 	}

// 	if ( post_password_required( $post ) ) {
// 		return __( 'There is no excerpt because this is a protected post.' );
// 	}

// 	/**
// 	 * Filters the retrieved post excerpt.
// 	 *
// 	 * @since 1.2.0
// 	 * @since 4.5.0 Introduced the `$post` parameter.
// 	 *
// 	 * @param string  $post_excerpt The post excerpt.
// 	 * @param WP_Post $post         Post object.
// 	 */
// 	return apply_filters( 'get_the_excerpt', $post->post_excerpt, $post );
// }



function related_post() { ?>
    <section class="related-post">
        <div class="container">
        <?php  
            global $post; 
            $categories = get_the_category( $post->ID);
            $category_id = $categories[0]->cat_ID;?>
          
            <?php  if(pll_current_language() == 'en') {?>
						  <h2 class="mb-5">Read more</h2>
            <?php  } else {?>
              <h2 class="mb-5">Đọc thêm</h2>
            <?php  } ?>
            <div class="row">
                <?php
            
                $args = array(
                    'numberposts' => 6, 
                    'offset'=> 1, 
                    'category__in' =>  $category_id , 
                    'exclude' => $post->ID
                );
            
                $article = new WP_Query($args);
                if ( $article->have_posts() ) :
                  while ($article->have_posts()):
                    $article->the_post();
                    $title = $post->post_title;
                    $des = $post->post_excerpt;
                    $link = get_post_permalink($post->ID);
                    $date = strtotime($post->post_date);
                    // $dateTime = date('d F , Y', $date);
                    $dateTime = wp_date('d F , Y', $date);
                    $categories = get_the_category($post->ID);?>
                      <div class="post mb-5 col-md-4 d-flex d-md-block">
                        <a  class="d-block ratio ratio-16x9 mb-4" href="<?php echo $link ?>" >
                          <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                        </a>
                        <div class="post-text">
                          <div class=" d-flex flex-wrap f-14 mb-3">
                            <div class="date text-muted "><?php echo $dateTime ?></div>
                            <a  href="<?php echo get_category_link($categories[0]->cat_ID); ?>" class="term-name text-decoration-none">
                                  <?php echo $categories[0]->name ?>
                              </a>
                            <!-- <?php if ($categories): ?>
                              <?php foreach ($categories as $category): ?>
                                  <a  href="<?php echo get_category_link($category->term_id); ?>" class="term-name text-decoration-none">
                                  <?php echo $category->name ?>
                                </a>
                              <?php endforeach; ?>
                            <?php  endif; ?> -->
                          </div>
                          <h5 class="post-title">
                              <a  class="text-decoration-none" href="<?php echo $link ?>" >
                                <?php echo $title ?>
                              </a>
                          </h5>
                          <div class="excerpt f-16 d-none d-md-block"><?php echo $des ?></div>
                        </div>
                      </div>
                    <?php endwhile; ?> 
                <?php endif; ?>
            </div>    
        </div>
    </section>
<?php } ?>