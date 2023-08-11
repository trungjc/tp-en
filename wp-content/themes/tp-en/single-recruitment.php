<?php
get_header();
global $post;
$salary = get_field('salary');
$date = get_field('date');
$address = get_field('address');
echo '<main class="main">'; ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div class="container breadcrumb-container">
            <?php bcn_display(); ?>
        </div>
        <div class="container ">

            <div class="row  justify-content-between the-content">

                <div class="col-md-7">
                    <article <?php post_class(); ?>>
                        <header class="entry-header mb-5">
                            <?php
                            the_title('<h1 class="entry-title">', '</h1>');
                            ?>
                        </header>
                        <div class="entry-content">
                            <div class="r-salary mb-4">
                                <?php echo $salary ?>
                            </div>
                            <div class="r-date mb-4">
                                <?php echo $date ?>
                            </div>
                            <div class="r-address mb-4">
                                <?php echo $address ?>
                            </div>
                            <div class="mb-5 mt-5"> <?php the_content(); ?></div>
                            <div class="share d-flex align-items-center">
                                <span class="f-700"><?php pll_e('Chia sẻ'); ?>:</span>
                                <div class='skype-share me-3' data-href='<?php the_permalink(); ?>' data-lang='en-US' data-text='<?php the_title(); ?>' data-style='large'></div>
                                <a class="iicon-fb me-3" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"></a>
                                <a class="iicon-twitter me-3" target="_blank" href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>"></a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-3">
                    <?php

                    $args = array(
                        'post_type' => 'recruitment',
                        'posts_per_page' => 10,
                        'post__not_in' => array($post->ID)
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                    ?>
                        <h4 class="mb-4 pb-4 r-heading"><?php pll_e('Việc làm khác'); ?></h4>

                        <?php while ($query->have_posts()) : $query->the_post();
                            $title = $post->post_title;
                            $city = get_field('city');
                            $link = get_post_permalink($post->ID);
                            $date = get_field('date');
                        ?>
                            <div class="r-item mb-4 pb-4">
                                <div class="f-300 f-14 text-nuted">
                                    <?php echo $date ?> - <?php echo $city ?>
                                </div>
                                <div class="f-16 f-700 h4 mb-0">
                                    <a href="<?php echo $link ?>" class="text-decoration-none text-heading"><?php echo $title ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php wp_reset_postdata();
                    endif; ?>

                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>

<?php
echo '</main>';

get_footer();
