<?php
$hero = get_sub_field('hero_item');
$logo_image = get_sub_field('image');
$video_option = get_sub_field('video_option');
$video_mp4_url = get_sub_field('video_mp4_url');

?>

<section class="hero position-relative  wow fadeIn <?php echo  $video_option === '1' ? 'hero-video' : 'hero-image' ?>" data-wow-duration=".3s" data-wow-delay=".3s">
  <!-- <?php if ($logo_image) : ?>
    <img class="hero__logo  wow fadeIn d-none d-lg-block" data-wow-duration=".3s" data-wow-delay=".3s" src="<?php echo $logo_image['sizes']['large'] ?>" alt="<?php echo $logo_image['alt'] ?>" />
  <?php endif; ?> -->

  <?php if ($video_option === '1') : ?>
    <?php if ($video_mp4_url) : ?>
      <div class="video-background">
        <video muted="" autoplay="" loop="" playsinline="">
          <source src="<?php echo $video_mp4_url  ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    <?php endif; ?>
  <?php else : ?>
    <div class="hero__slider ">
      <?php if ($hero) : ?>
        <?php foreach ($hero as $item) : ?>
          <?php
          $image =  $item['image'];
          // $link = $item['link'];
          $image_mb = $item['image_for_mobile'] ? $item['image_for_mobile'] : $image;

          ?>
          <div class="hero-item position-relative">
            <?php if ($image) : ?>
              <img class="d-md-block d-none" src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" />
              <img class="d-md-none" src="<?php echo $image_mb['sizes']['large'] ?>" alt="<?php echo $image_mb['alt'] ?>" />
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  <?php endif; ?>
</section>