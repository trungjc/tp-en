<?php

get_header();
$arrayID = array();
$category = get_queried_object();
$category_id = get_queried_object()->term_id;
?>

<main class="main">
  <div class="container breadcrumb-container border-0 mb-0">
    <?php bcn_display(); ?>
  </div>
  <section class="container category-layout">
    <header class="page-header alignwide">
      <?php
      the_archive_title('<h1 class="page-title mb-0">', '</h1>');
      the_archive_description('<div class="taxonomy-description">', '</div>');
      ?>
    </header><!-- .page-header -->

    <div class="page-header-sub"><?php pll_e('Bài viết mới nhất'); ?></div>
    <div class="list-post mb-5">
      <div class="row g-5">
        <?php
        $args = array(
          'posts_per_page' => 5,
          'tag__in' =>  $category_id,
          'orderby' => 'date',
          'order' => 'DESC',
        );
        $article = new WP_Query($args);
        if ($article->have_posts()) :
          while ($article->have_posts()) :
            $article->the_post();
            $title = $post->post_title;
            $des = $post->post_excerpt;
            $id = $post->ID;
            $link = get_post_permalink($id);
            $date = strtotime($post->post_date);
            $dateTime = wp_date('d F , Y', $date);
            $categories = get_the_category($id); ?>
            <div class="post mb-5 col-md-4">
              <a class="d-block ratio ratio-16x9 mb-4" href="<?php echo $link ?>">
                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
              </a>
              <div class=" d-flex flex-wrap f-14 mb-3">
                <div class="date text-muted "><?php echo $dateTime ?></div>
                <a href="<?php echo get_category_link($categories[0]->cat_ID); ?>" class="term-name text-decoration-none">
                  <?php echo $categories[0]->name ?>
                </a>
              </div>
              <h5 class="post-title">
                <a class="text-decoration-none" href="<?php echo $link ?>">
                  <?php echo $title ?>
                </a>
              </h5>
              <div class="excerpt f-16"><?php echo $des ?></div>
            </div>
            <?php array_push($arrayID, $id); ?>
          <?php endwhile; ?> 
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <section class="widget-section container">
    <div class="row justify-content-between">
      <div class="col-md-7">
        <div class="posts-widget">
              <?php
              $latestArgs = array(
                'posts_per_page' => 5,
                'tag__in' =>  $category_id,
                'post__not_in' => $arrayID,
                'orderby' => 'date',
                'order' => 'DESC',
              );
            
              $the_query = new WP_Query($latestArgs); 
              if ($the_query->have_posts()) : ?>
            
              <h2 class="h2 mb-5"><?php pll_e('Đọc thêm'); ?></h2>
              <div class="posts">
                <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $title = $post->post_title;
                    $des = $post->post_excerpt;
                    $id = $post->ID;
                    $link = get_post_permalink($id);
                    $date = strtotime($post->post_date);
                    $dateTime = wp_date('d F , Y', $date);
                    $categories = get_the_category($id); ?>
                    <div class="post mb-5 d-flex">
                      <div class="post-content me-4">
                        <div class=" d-flex flex-wrap f-14 mb-3">
                          <div class="date text-muted "><?php echo $dateTime ?></div>
                          <a href="<?php echo get_category_link($categories[0]->cat_ID); ?>" class="term-name text-decoration-none">
                            <?php echo $categories[0]->name ?>
                          </a>
                        </div>
                        <h5 class="post-title">
                          <a class="text-decoration-none" href="<?php echo $link ?>">
                            <?php echo $title ?>
                          </a>
                        </h5>
                        <div class="excerpt f-16"><?php echo $des ?></div>
                      </div>
                      <a class="d-block ratio ratio-16x9" href="<?php echo $link ?>">
                        <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                      </a>
                    </div>
                    <?php array_push($arrayID, $id); ?>
                  <?php endwhile; ?>
              </div>
              <?php  $exclude_id = implode(",",$arrayID);
              echo do_shortcode(' [ajax_load_more preloaded="true"
              scroll="false"
               loading_style="blue" tag__and="'.$category_id.'" post__not_in="'.$exclude_id.'" 
              images_loaded="true" posts_per_page="5" pause="true" pause_override="true"]'); ?>
              <?php endif;  ?>
              
        </div>
      </div>
      <div class="col-md-4"><?php dynamic_sidebar('secondary'); ?> </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>





