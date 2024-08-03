<?php
$title = get_sub_field('title');
$sub_title = get_sub_field('sub_title');
$number_of_posts = get_sub_field('post_number');
$link = get_sub_field('link');
$category_slug = get_sub_field('category');
?>
<?php
// Define the category slug and the number of posts you want to retrieve
$category_slug = ''; // Leave empty to fetch all posts

// Check if a category slug is provided
if (!empty($category_slug)) {
    // Get the category object by slug
    $category = get_category_by_slug($category_slug);

    if ($category) {
        // Get the category ID
        $category_id = $category->term_id;

        // Define the query arguments
        $args = array(
            'category' => $category_id,
            'numberposts' => $number_of_posts,
            'orderby' => 'date',
            'order' => 'DESC'
        );
    } else {
        echo 'Category not found.';
        return;
    }
} else {
    // Define the query arguments to get all posts
    $args = array(
        'numberposts' => $number_of_posts,
        'orderby' => 'date',
        'order' => 'DESC'
    );
}

// Fetch the posts
$posts = get_posts($args);


?>

<section class="new-section">
    <div class="container container-xl">
        <div class="flex">
            <div class="section-title">
                <div class="life__sub-title"><?php echo $title ?></div>
                <div class="life__title"><?php echo $sub_title ?></div>
                <div class="arrow-control-new-slider">
                    <div class="swiper-new-button-prev"></div>
                    <div class="swiper-new-button-next"></div>
                </div>
                <?php if ($link): ?>
                    <div class="life__btn d-none d-md-block">
                        <a class="btn-primary btn-primary--black" href="<?php echo $link['url'] ?>">
                            <span><?php echo $link['title'] ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <?php

            // Loop through the posts and display them
            if ($posts) { ?>
                <div class="new-slider-container ">
                    <div class="swiper new-slider ">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($posts as $post) {
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
             <?php if ($link): ?>
                    <div class="life__btn d-flex d-md-none justify-content-center">
                        <a class="btn-primary btn-primary--black" href="<?php echo $link['url'] ?>">
                            <span><?php echo $link['title'] ?></span>
                        </a>
                    </div>
                <?php endif; ?>
        </div>

    </div>
</section>