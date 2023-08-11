<?php

get_header();
$arrayID = array();
?>

<main class="main">
  <div class="container breadcrumb-container border-0 mb-0">
    <?php bcn_display(); ?>
  </div>
  <section class="container category-layout">
    <?php
    $category = get_queried_object();
    $category_id = $category->term_id;
    $args = array(
      'child_of'      => $category_id
    );
    $categories = get_categories($args);  
    $remain_cat = $categories;
    // Cắt 2 category đầu tiền và lấy toàn bộ số còn lại cho block sau video block
    $remain_cat = array_splice($remain_cat, 2); ?>
    <header class="page-header pb-4">
      <?php
      the_archive_title('<h1 class="page-title mb-0">', '</h1>');
      the_archive_description('<div class="taxonomy-description">', '</div>');
      ?>
      <ul class="nav f-700 mt-4 sub-category">
        <?php foreach ($categories as $category) { ?>
          <li class="nav-item">
            <a class="nav-link p-0 f-700" href="<?php echo get_category_link($category->term_id) ?>">
              <?php echo $category->name ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    </header>

    <?php $i = 1;
    foreach ($categories as $category) { ?>
      <!-- Loop toàn bộ subcategory và chỉ lấy 2 cái đầu tiên -->
      <?php if ($i == 3) {break; }?>
      <div class="page-header-sub d-flex align-items-center justify-content-between">
        <?php echo $category->name ?>
        
        <div class="d-none d-md-block">
          <a class="read-more f-16" href="<?php echo get_category_link($category->term_id) ?>">
            Read more
            <i class="ms-3 icon-arrow-next text-inherit "></i>
          </a>
        </div>
      </div>
      <div class="list-post mb-5 pb-5">
        <div class="row g-5">
          <?php
          $args = array(
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'cat' => $category->term_id,
          );
          $loop = new WP_Query($args);
          if ($loop->have_posts()) :
            while ($loop->have_posts()) :
              $loop->the_post(); 
              $id = $post->ID;?>
              <?php get_template_part('template-parts/content/content-single'); ?>
              <?php array_push($arrayID, $id); ?>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div class="d-block d-md-none mt-5">
          <a class="read-more f-16" href="<?php echo get_category_link($category->term_id) ?>">
            Read more
            <i class="ms-3 icon-arrow-next text-inherit "></i>
          </a>
        </div>
      </div>
    <?php $i++;
    } ?>
  </section>
  <section class="videos-block video-gallery-block  mb-5 pb-5 wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s">
    <div class="videos-block-inside">
      <div class="container">
        <h2 class="title mb-5">
            Video
        </h2>
        <div class="video">
          <a class="ratio ratio-16x9 d-block" data-fancybox="gallery" href="<?php echo get_field('video_link', 481) ?>">
            <?php $img = get_the_post_thumbnail_url(481, 'large'); ?>
            <?php if ($img) : ?>
              <img src="<?php echo $img ?>" alt="" />
            <?php endif; ?>
          </a>
          <div class="video-info position-absolute d-flex align-items-center">
            <a data-fancybox="gallery" href="<?php echo get_field('video_link', 481) ?>">
              <i class="video-icon"></i>
            </a>
            <div class="d-none d-md-block">
              <div class="video-name"><?php echo get_the_title(481); ?></div>
              <div class="video-des f-16"><?php echo  get_the_excerpt(481); ?></div>
            </div>
          </div>
        </div>
        <div class="d-bock d-md-none">
          <div class="video-name"><?php echo get_the_title(481); ?></div>
          <div class="video-des f-16"><?php echo  get_the_excerpt(481); ?></div>
        </div>
        <div class="list-video mt-5">
          <?php
          $args = array(
            'post_type' => 'video',
            'posts_per_page' => 10,
            'exclude' => 481
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
          ?>
            <?php while ($query->have_posts()) : $query->the_post();
              $videoDes = $post->post_excerpt;
              $title = $post->post_title;
              $videoUrl = get_field('video_link');
              $link = get_post_permalink($post->ID);
              $videoTime = get_field('video_time');
            ?>
              <div class="video ">
                <div class="position-relative mb-3">
                  <a class="ratio ratio-16x9 d-block" data-fancybox="gallery" href="<?php echo $videoUrl; ?>">
                    <?php $img = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                    <?php if ($img) : ?>
                      <img src="<?php echo $img ?>" alt="" />
                    <?php endif; ?>
                  </a>
                  <div class="video-info position-absolute d-flex align-items-center">
                    <a data-fancybox="gallery" href="<?php echo $videoUrl; ?>">
                      <i class="video-icon video-sm"></i>
                    </a>
                    <div>
                      <div class="video-time f-16"><?php echo $videoTime; ?></div>
                    </div>
                  </div>
                </div>
                <div class="video-des f-16 f-700"><?php echo $title; ?></div>
              </div>
            <?php endwhile; ?>
          <?php wp_reset_postdata();
          endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="container category-layout">
    <?php 
    foreach ($remain_cat as $category) { ?>
      <div class="page-header-sub d-flex align-items-center justify-content-between">
        <?php echo $category->name ?>
        <div class="d-none d-md-block">
          <a class="read-more f-16" href="<?php echo get_category_link($category->term_id) ?>">
            Read more
            <i class="ms-3 icon-arrow-next text-inherit "></i>
          </a>
        </div>
      </div>
      <div class="list-post mb-5 pb-5">
        <div class="row g-5">
          <?php
          $args = array(
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'cat' => $category->term_id,
          );
          $loop = new WP_Query($args);
          if ($loop->have_posts()) :
            while ($loop->have_posts()) :
              $loop->the_post(); 
              $id = $post->ID;?>
              <?php get_template_part('template-parts/content/content-single'); ?>
              <?php array_push($arrayID, $id); ?>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div class="d-block d-md-none mt-5">
          <a class="read-more f-16" href="<?php echo get_category_link($category->term_id) ?>">
            Read more
            <i class="ms-3 icon-arrow-next text-inherit "></i>
          </a>
        </div>
      </div>

    <?php 
    } ?>
  </section>
  <section class="widget-section container">
    <div class="row justify-content-between">
      <div class="col-md-7">
      <div class="posts-widget">
              <?php
              $latestArgs = array(
                'posts_per_page' => 5,
                'category__in' =>  $category_id,
                'post__not_in' => $arrayID,
                'orderby' => 'date',
                'order' => 'DESC',
              );
            
              $the_query = new WP_Query($latestArgs); 
              if ($the_query->have_posts()) : ?>
                <h2 class="h2 mb-5">Đọc thêm</h2>
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
              <?php $exclude_id = implode(",",$arrayID);  
              echo do_shortcode(' [ajax_load_more preloaded="true"
              scroll="false"
               loading_style="blue" category__and="'.$category_id.'" post__not_in="'.$exclude_id.'" 
              images_loaded="true" posts_per_page="5" pause="true" pause_override="true"]'); ?>
              <?php endif;  ?>
             
        </div>  
      </div>
      <div class="col-md-4"><?php dynamic_sidebar('secondary'); ?> </div>
    </div>
  </section>



</main>
<?php get_footer(); ?>