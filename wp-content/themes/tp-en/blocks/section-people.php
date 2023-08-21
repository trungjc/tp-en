<?php
$title = get_sub_field('title');
$subTitle = get_sub_field('sub_title');
$description = get_sub_field('description');
$images = get_sub_field('images');
$link = get_sub_field('link');
?>

<section class="container life">
    <div class="life__left">
        <div class="life-pc">
            <p class="life__sub-title"><?php echo $subTitle ?></p>
            <p class="life__title">
              <?php echo $title ?>
            </p>
        </div>
        <div class="life__text">
          <?php echo $description ?>
        </div>
      <?php if ($link) : ?>
          <div class="life__btn">
              <a class="btn-primary btn-primary--black" href="<?php echo $link['url'] ?>">
                  <span><?php echo $link['title'] ?></span>
              </a>
          </div>
      <?php endif; ?>

    </div>

    <div class="life__right">
        <div class="life-sp">
            <p class="life__sub-title"><?php echo $subTitle ?></p>
            <p class="life__title">
              <?php echo $title ?>
            </p>
        </div>
        <div class="life__imgs">
          <?php foreach ($images as $key => $value): ?>
              <div data-aos="zoom-out-up"
                   data-aos-delay="<?php echo ($key + 2) * 500 ?>" class="life__img life__img-<?php echo $key + 1 ?>" style="background-image: url('<?php echo $value['image']['url'] ?>')"></div>
          <?php endforeach; ?>

        </div>
    </div>
</section>