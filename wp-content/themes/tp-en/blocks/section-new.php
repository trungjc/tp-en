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

// Loop through the posts and display them
if ($posts) {
    foreach ($posts as $post) {
        setup_postdata($post);
        ?>
        <h2><?php the_title(); ?></h2>
        <div><?php the_excerpt(); ?></div>
        <?php
    }
    wp_reset_postdata();
} else {
    echo 'No posts found.';
}
?>

<section class="new">
    <div class="container container-xl">
        <div class="section-title">
            <div><?php echo $title ?></div>
            <div><?php echo $sub_title ?></div>
            <div><?php echo $post_number ?></div>
        </div>
        <div class=" new-slider">
            <div class="swiper-wrapper">
                <div class="new__card swiper-slide">

                </div>
            </div>
        </div>
    </div>
</section>


