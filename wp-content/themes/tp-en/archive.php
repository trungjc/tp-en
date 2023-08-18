<?php

get_header();
$arrayID = array();
$category = get_queried_object();
$category_id = get_queried_object()->term_id;
?>

<main class="main">
    <div class="container mx-auto">
      <?php
      if (have_posts()) { ?>

        <?php
        $index = 0;
        $in_items_div = false;
        while (have_posts()) {
          the_post(); // Set up the post data

          // Display the post content
          ?>
          <?php if ($index == 0) : ?>
                <div class="event-head">
                  <?php the_archive_title('<div class="event-head__sub">', '</div>') ?>
                  <?php the_archive_description('<h1>', '</h1>') ?>
                  <?php if (has_post_thumbnail()) : ?>
                    <?php
                    the_post_thumbnail('large'); ?>
                  <?php endif; ?>
                    <div class="event-head__info">
                      <?php $post_tags = get_the_tags();
                      if ($post_tags) {
                        foreach ($post_tags as $tag) {
                          echo '<a style="margin-right: 1rem" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                        }
                      } ?>
                        <p><?php the_title() ?></p>

                        <p><?php the_date(); ?></p>
                    </div>
                </div>
          <?php else:
            if ($index != 0 && !$in_items_div) {
              echo '<section class="event-list">';
              $in_items_div = true;
            }
            ?>
                    <article class="event-list__card">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('large') ?>
                        </a>
                        <div class="event-list__card-content">
                            <p>HOẠT ĐỘNG HÀNG NGÀY</p>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="date"><?php the_date(); ?></p>
                        </div>
                    </article>
<!--                    <h2><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></h2>-->
<!--                    <div class="post-meta">-->
<!--                        <span class="date">--><?php //the_date(); ?><!--</span>-->
<!--                        <span class="author">--><?php //the_author(); ?><!--</span>-->
<!--                    </div>-->
<!--                    <div class="post-content">-->
<!--                      --><?php //the_excerpt(); // Display a brief excerpt of the post ?>
<!--                    </div>-->
          <?php endif; ?>

          <?php
          $index++;

        }
        if ($in_items_div) {
          echo '</section>';
        }

        // Display pagination links if needed
        the_posts_pagination();

      } else {
        // If no posts are found
        echo '<p>No posts found.</p>';
      }
      ?>
    </div>
</main>
<?php get_footer(); ?>





