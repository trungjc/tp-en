<?php

get_header();
$categories = get_the_category($post->ID);
$category_id = $categories[0]->cat_ID;
?>

<main class="main f-18 main-single">
    <div class="container heading-block  ">
        <div class=" breadcrumb-container">
            <?php bcn_display(); ?>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-8 ">
                <h1 class="mb-4 pb-0"><?php the_title(); ?></h1>
                <!-- <div class=" d-flex flex-wrap f-14 mb-5 pb-5"> -->
                <div class=" d-flex flex-wrap f-16 ">
                    <div class="date text-muted ">
                        <?php
                        echo  get_the_date();
                        ?>
                    </div>
                    <a href="<?php echo get_category_link($categories[0]->cat_ID); ?>" class="term-name text-decoration-none">
                        <?php echo $categories[0]->name ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-content text-editior-inside">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;

        endif;
        wp_reset_postdata();
        ?>
    </div>
    <?php $copy = get_field('copy', $post->ID); ?>
    <div class="container mb-5 pb-md-5 copy-source">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-8">
                <div class=" d-flex align-items-center justify-content-between share">
                    <div class="me-5">
                        <div class="copy-post"><?php echo  $copy ?></div>
                    </div>
                    <div class=" d-flex align-items-center">
                        <span class="f-700"><?php pll_e('Chia sẻ'); ?>:</span>
                        <div class='skype-share me-3' data-href='<?php the_permalink(); ?>' data-lang='en-US' data-text='<?php the_title(); ?>' data-style='large'></div>
                        <a class="iicon-fb me-3" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"></a>
                        <a class="iicon-twitter me-3" target="_blank" href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php related_post() ?>
</main>
<?php get_footer(); ?>