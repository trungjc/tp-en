<?php

$images = get_field('images', 'option') ?: '';
$short_code = get_field('short_code', 'option') ?: '';
$title = get_field('title', 'option') ?: '';
$description = get_field('description', 'option') ?: '';
?>

<section class="tpl-block tpl-contact p-0">
    <div class="container-fluid p-0 container-fluid-full ">
        <div class="row g-0 ">
            <div class="col-lg-6 ">
                <?php if ($images) : ?>
                    <div class="image-slider">
                        <?php foreach ($images as $image) { ?>
                            <?php
                            $img = $image['image'];
                            ?>
                            <?php if ($img) : ?>
                                <img src="<?php echo $img['sizes']['large'] ?>" alt="<?php echo $img['alt'] ?>" />
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6  col-md-6-right ">
                <div class="p-5 my-4 my-lg-0 mx-md-5 tpl-contact-right ">
                    <h2 class="title mb-4">
                        <?php echo $title ?>
                    </h2>
                    <div class="des mb-5 f-20">
                        <?php echo $description ?>
                    </div>
                    <?php echo do_shortcode($short_code); ?>
                </div>
            </div>
        </div>
    </div>
</section>