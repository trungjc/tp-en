<?php
$title = get_sub_field('title');
$jcarousel = get_sub_field('card');

?>
<section class="card-sliders-block text-center tpl-block  wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s">
  <div class="container-fluid ">
    <h2 class="text-center title">
      <?php echo $title ?>
    </h2>
    <?php if ($jcarousel) : ?>
      <div class="card-sliders mb-0 ">

        <?php foreach ($jcarousel as $card) : ?>
          <?php
          $image = $card['image'];
          $text = $card['text'];
          $link = $card['link'] ?: '';
          ?>
          <?php if ($card) : ?>
            <div class=" card-slider-item ">
              <div class="inside text-center mb-4">
                <a class="d-block ratio ratio-16x9" href="<?php echo  $link['url'] ?>">
                  <?php if ($image) : ?>
                    <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" />
                  <?php endif; ?>
                </a>
                <h3 class=" mb-0">
                  <?php echo $text ?>
                </h3>
              </div>
            </div>
          <?php endif ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

</section>