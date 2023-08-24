<?php
$title = get_sub_field('title');
$subTitle = get_sub_field('sub_title');
$jobs = get_sub_field('jobs');
$image = get_sub_field('image');
$link = get_sub_field('link');
?>


<section class="banner" style="background-image: url('<?php echo $image['url'] ?>')">
    <div class="banner__content">
        <div class="banner__text">
            <p><?php echo $subTitle ?></p>
            <p><?php echo $title ?></p>
            <div class="banner__jobs swiper">
              <div class="swiper-wrapper">
                <?php foreach ($jobs as $key => $value): ?>
                    <span class="swiper-slide <?php if ($key === 0) echo 'active' ?>"><?php echo $value['job'] ?></span>
                <?php endforeach; ?>
              </div>
            </div>
            <a class="btn-primary" href="#recruitment-list">
                <span><?php echo $link ? $link['title'] : "" ?></span>
            </a>
        </div>
    </div>
</section>




