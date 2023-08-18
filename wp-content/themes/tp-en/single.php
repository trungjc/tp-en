<?php
echo '<div id="page-news-detail">';

get_header();
$categories = get_the_category($post->ID);
$category_id = $categories[0]->cat_ID;

?>
    <div class="container mx-auto">
        <div class="event-detail-head">
            <p class="event-detail-head__sub"><?php $post_tags = get_the_tags();
              if ($post_tags) {
                foreach ($post_tags as $tag) {
                  echo '<a style="margin-right: 1rem" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                }
              } ?></p>
            <h1><?php echo the_title() ?></h1>
            <p class="event-head__date"><?php echo get_the_date() ?></p>
          <?php echo the_post_thumbnail('large') ?>
        </div>

        <section class="container event-detail-content">
            <?php echo the_content() ?>
        </section>
    </div>
<?php get_footer();
echo '</div>';
?>
