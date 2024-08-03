<?php

$title = get_sub_field('title');
$sub_title = get_sub_field('sub_title');
$post_number = get_sub_field('post_number');
$link = get_sub_field('link');
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
    </div>
</section>