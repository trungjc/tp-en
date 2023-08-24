<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$card = get_sub_field('card');
//var_dump($card);
?>


<section class="container quality swiper container-xl">
  <p class="quality__sub-title"><?php echo $title ?></p>
  <p class="quality__title"><?php echo $description ?></p>
  <div class="quality__content swiper-wrapper">
    <?php foreach ($card as $key => $value): ?>
        <div class="quality__item swiper-slide" style="background: url('<?php echo $value['image']['url'] ?>'), lightgray 50%/cover no-repeat">
            <p class="quality__item-fix">
              <?php echo $value['text'] ?>
            </p>
            <div class="quality__item-fade">
                <p>
                  <?php echo $value['text'] ?>
                </p>
                <div class="quality__item-sub-text">
                  <?php echo $value['description'] ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
  </div>
</section>




