<?php
$logo_image = get_sub_field('mobile_image');
$video_mp4_url = get_sub_field('video_mp4_url');
$mobile_image = get_sub_field('mobile_image');
$banner_sub_title = get_sub_field('banner_sub_title');
$banner_title = get_sub_field('banner_title');
$banner_items = get_sub_field('banner_items');

?>

<div class="banner-wrapper">

    <div class="main-banner">
        <div class="main-banner__img" style="background-image: url('<?php echo $mobile_image['url'] ?>'); display: <?php echo $video_mp4_url ? 'none' : 'block' ?>"></div>
      <?php if ( $video_mp4_url ) : ?>
          <video autoplay muted loop>
              <source src="<?php echo $video_mp4_url ?>" type="video/mp4"/>
          </video>
      <?php endif; ?>

        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/scroll-down.svg" alt=""/>
    </div>

    <div class="intro" id="about-us">
        <div
                data-aos="fade-up"
                data-aos-duration="500"
                data-aos-delay="1000"
                class="container"
        >
            <p class="intro__sub-title"><?php echo $banner_sub_title ?></p>
            <p class="intro__title"><?php echo $banner_title ?>
            </p>
        </div>

      <?php foreach ($banner_items as $key => $item) : ?>
          <div
                  data-aos="fade-up"
                  data-aos-duration="500"
                  data-aos-delay="<?php echo 1500 + 500 * $key ?>"
                  class="intro__vision <?php if ($key === 0) echo "intro__vision-first" ?>"
          >
              <div class="container"><span><?php echo $item['title'] ?></span></div>
              <div class="container">
                  <span><?php echo $item['title'] ?></span>
                  <span class="intro__vision-detail"
                  ><?php echo $item['description'] ?></span
                  >
              </div>
          </div>
      <?php endforeach; ?>

    </div>
</div>

