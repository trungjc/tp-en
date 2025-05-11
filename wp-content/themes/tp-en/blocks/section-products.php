<?php
$title = get_sub_field('title');
$sub_title = get_sub_field('sub_title');
$products = get_sub_field('product');
var_dump($products);
?>


<section class="product-section">
  <div class="container container-xl">


    <?php
    if ($products) { ?>
      <div class="new-slider-container ">
        <div class="swiper new-slider ">
          <div class="swiper-wrapper">
            <?php
            foreach ($products as $post) {
              setup_postdata($post);
              ?>
              <div class="new__card swiper-slide">
                <article class="event-list__card">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large') ?>
                  </a>
                  <div class="event-list__card-content">
                    <p style="margin-bottom: 1rem"><?php $post_tags = get_the_tags();
                    if ($post_tags) {
                      foreach ($post_tags as $tag) {
                        echo '<a style="margin-right: 2rem;" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                      }
                    } ?></p>
                    <h3>
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="date"><?php the_date(); ?></p>
                  </div>
                </article>

              </div>

              <?php
            }
            wp_reset_postdata();
            ?>

          </div>
          <div class="swiper-button-prev" style="opacity:0"></div>
          <div class="swiper-button-next" style="opacity:0"></div>
        </div>

      </div>
    <?php }
    ?>
   

  </div>
</section>