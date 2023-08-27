<?php
$reason = get_sub_field('reason');
?>

<section class="container container-xl">
  <?php foreach ($reason as $key => $value): ?>
      <div class="reason <?php if ($key % 2 != 0) echo 'reason--reverse' ?>">
          <div class="reason__content">
              <p class="reason__sub-title"><?php echo $value['sub_title'] ?></p>
              <p class="reason__title"><?php echo $value['title'] ?></p>
              <div class="reason__text">
                <?php echo $value['text'] ?>
              </div>
          </div>
          <div class="reason__image">
              <img src="<?php echo $value['image1']['url'] ?>" alt="" />
              <img
                      src="<?php echo $value['image2']['url'] ?>"
                      alt=""
              />
          </div>
      </div>
  <?php endforeach; ?>

</section>




