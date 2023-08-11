<?php
$title = get_sub_field('title') ?: '';
$description = get_sub_field('description') ?: '';
$image_vision = get_sub_field('vs_image');
$year = get_sub_field('year') ?: '';
$year_label = get_sub_field('year_label') ?: '';
$year_text = get_sub_field('year_text') ?: '';
$customer = get_sub_field('customer') ?: '';
$customer_label = get_sub_field('customer_label') ?: '';
$customer_text = get_sub_field('customer_text') ?: '';
$ca_kham = get_sub_field('ca_kham') ?: '';
$ca_kham_label = get_sub_field('ca_kham_label') ?: '';
$ca_kham_text = get_sub_field('ca_kham_text') ?: '';
$image = get_sub_field('image') ?: '';
$image_2 = get_sub_field('image_2') ?: '';

?>

<section class="intro-block wow fadeInUp tpl-block bg-grey" data-wow-duration=".3s" data-wow-delay=".3s">
  <div class="container">
    <div class="heading text-center mb-5 pb-5">
      <h2> <?php echo $title ?></h2>
      <div class="des f-20">
        <?php echo $description ?>
      </div>
    </div>
    <div class="d-grid">
      <div class="summary">
        <div class="d-lg-flex ">
          <div class="item">
            <div class="year h1 mb-1"><span class="scroll-counter" data-counter-time="2000"><?php echo $year ?></span>+</div>
            <div class="year_label d-none d-md-block h3  mb-1"><?php echo $year_label ?></div>
            <div class="year_text h5  mb-1"><?php echo $year_text ?></div>
          </div>
          <div class="item">
            <div class="customer h1  mb-1"><span class="scroll-counter" data-counter-time="2000"><?php echo $customer ?></span>+</div>
            <div class="customer_label d-none d-md-block h3  mb-1"><?php echo $customer_label ?></div>
            <div class="customer_text h5  mb-1"><?php echo $customer_text ?></div>
          </div>
          <div class="item">
            <div class="ca_kham h1  mb-1"><span class="scroll-counter" data-counter-time="2000"><?php echo $ca_kham ?></span>%</div>
            <div class="ca_kham_label d-none d-md-block h3  mb-1"><?php echo $ca_kham_label ?></div>
            <div class="ca_kham_text h5  mb-1"><?php echo $ca_kham_text ?></div>
          </div>
        </div>
      </div>
      <div class="image-vision">
        <?php if ($image_vision) : ?>
          <img src="<?php echo $image_vision['sizes']['large'] ?>" alt="<?php echo $image_vision['alt'] ?>" />
        <?php endif; ?>
      </div>
      <div class="  images row g-3">
        <?php if ($image) : ?>
          <div class="col col1">
            <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" />
          </div>

        <?php endif; ?>
        <?php if ($image_2) : ?>
          <div class="col col2"><img src="<?php echo $image_2['sizes']['large'] ?>" alt="<?php echo $image_2['alt'] ?>" /></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>