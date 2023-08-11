<?php
  $title = get_sub_field('title');
  $description = get_sub_field('description');
  $options = get_sub_field('options');
  $links = get_sub_field('link');
  global $post;
?>
<section class="latest-posts  wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s">
  <div class="container">
    <div class="text-center heading mb-5">
      <h2 class="title">
        <?php echo $title ?>
      </h2>
      <p>
        <?php echo $description ?>
      </p>
    </div>
   
      <div class="list-post">
        <div class=" row g-5">
        <!-- CHOSE MANUALLY -->
        <?php if ($options == 'choose post manually'): ?>
          <?php 
          $articles = get_sub_field('articles');
           ?>
          <?php if ($articles): ?>
            <?php foreach ($articles as $article): ?>
              <?php
              $article = $article['article'];
              $link = get_post_permalink($article->ID);
              $title = $article->post_title;
              $date = strtotime($article->post_date);
              $dateTime = wp_date('d F , Y', $date);
              $categories = get_the_category($article->ID);
            ?> 
              <div class="post manually col-md-4">
                <a  class="d-block ratio ratio-1x1 mb-4" href="<?php echo $link ?>" >
                  <?php echo get_the_post_thumbnail($article->ID, 'medium'); ?>
                </a>
                <div class=" d-flex flex-wrap f-14 mb-3">
                  <div class="date text-muted "><?php echo $dateTime ?></div>
                    <a  href="<?php echo get_category_link($categories[0]->term_id); ?>" class="term-name text-decoration-none">
                      <?php echo $categories[0]->name ?>
                    </a>
                    <!-- <?php if ($categories): ?>
                      <?php foreach ($categories as $category): ?>
                        <a  href="<?php echo get_category_link($category->term_id); ?>" class="term-name text-decoration-none">
                          <?php echo $category->name ?>
                        </a>
                      <?php endforeach; ?>
                    <?php endif; ?> -->
                </div>
                <h5 class="post-title">
                    <a  class="text-decoration-none" href="<?php echo $link ?>" >
                    <?php echo $title ?>
                    </a>
                </h5>
                <div class="excerpt f-16"><?php echo $article->post_excerpt ?></div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

          <!-- CHOSE POST BY CATEGORY -->
          <?php elseif ($options == 'post by category'): ?>
            <?php
            $category = get_sub_field('category');
            $args = array(
                'post_status' => 'publish',
                'posts_per_page' => 5,
                'cat' => $category,
            );
            $loop = new WP_Query($args);
            if ( $loop->have_posts() ) :
              while ($loop->have_posts()):
                $loop->the_post();
                $title = $post->post_title;
                $des = $post->post_excerpt;
                $link = get_post_permalink($post->ID);
                $date = strtotime($post->post_date);
                $dateTime = wp_date('d F , Y', $date);
                $categories = get_the_category($post->ID);?>
         
                  <div class="post c col-md-4">
                    <a  class="d-block ratio ratio-1x1 mb-4" href="<?php echo $link ?>" >
                      <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                    </a>
                    <div class=" d-flex flex-wrap f-14 mb-3">
                      <div class="date text-muted "><?php echo $dateTime ?></div>
                      <!-- <?php if ($categories): ?>
                        <?php foreach ($categories as $category): ?>
                            <a  href="<?php echo get_category_link($category->term_id); ?>" class="term-name text-decoration-none">
                            <?php echo $category->name ?>
                          </a>
                        <?php endforeach; ?>
                      <?php  endif; ?> -->
                      <a  href="<?php echo get_category_link($categories[0]->term_id); ?>" class="term-name text-decoration-none">
                      <?php echo $categories[0]->name ?>
                    </a>
                    </div>
                    <h5 class="post-title">
                        <a  class="text-decoration-none" href="<?php echo $link ?>" >
                          <?php echo $title ?>
                        </a>
                    </h5>
                    <div class="excerpt f-16"><?php echo $des ?></div>
                  </div>

            <?php endwhile; ?> 
            <?php endif; wp_reset_postdata();?> 
      
            <!-- CHOSE LASTEST POST-->
          
          <?php else: ?>
            <?php $args = array(
                      'post_status' => 'publish',
                      'posts_per_page' => 5
                  );
                  $loop = new WP_Query($args);
                  if ( $loop->have_posts() ) :
                    while ($loop->have_posts()):
                      $loop->the_post();
                      $title = $post->post_title;
                      $des = $post->post_excerpt;
                      $link = get_post_permalink($post->ID);
                      $date = strtotime($post->post_date);
                      $dateTime = wp_date('d F , Y', $date);
                      $categories = get_the_category($post->ID); ?>
         
                    <div class="post l-post col-md-4">
                      <a  class="d-block ratio ratio-1x1 mb-4" href="<?php echo $link ?>" >
                        <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                      </a>
                      <div class=" d-flex flex-wrap f-14 mb-3">
                        <div class="date text-muted "><?php echo $dateTime ?></div>
                        <a  href="<?php echo get_category_link($categories[0]->term_id); ?>" class="term-name text-decoration-none">
                          <?php echo $categories[0]->name ?>
                        </a>
                          <!-- <?php if ($categories): ?>
                            <?php foreach ($categories as $category): ?>
                              <a  href="<?php echo get_category_link($category->term_id); ?>" class="term-name text-decoration-none">
                              <?php echo $category->name ?>
                            </a>
                            <?php endforeach; ?>
                          <?php endif; ?> -->
                      </div>
                      <h5 class="post-title">
                          <a  class="text-decoration-none" href="<?php echo $link ?>" >
                            <?php echo $title ?>
                          </a>
                      </h5>
                      <div class="excerpt f-16"><?php echo $des ?></div>
                    </div>

              <?php endwhile; ?> 
              <?php endif; 
              wp_reset_postdata();
              ?> 
            <?php endif; ?>
        </div>     
      </div>
        <?php if ($links['url']): ?>
          <div class="text-center mt-5">
            <a class="read-more" href="<?php echo $links['url'] ?>" target="<?php echo $links['target'] ?>">
              <i class="ms-2 icon-arrow-next text-inherit "></i>
              <?php pll_e('Đọc thêm'); ?>
            </a>
          </div>
        <?php endif; ?>
  </div>
</section>
