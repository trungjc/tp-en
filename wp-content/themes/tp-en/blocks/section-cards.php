<?php
$title = get_sub_field('title');
$sub_title = get_sub_field('sub_title');
$read_more = get_sub_field('read_more');
$cards = get_sub_field('cards');
?>
<section class="latest-cards tpl-block wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s">
  <div class="container">
    <div class="text-center heading mb-5 pb-5">
      <h2 class="title">
        <?php echo $title ?>
      </h2>
      <div class="f-20">
        <?php echo $sub_title ?>
      </div>
    </div>

    <div class="list-cards d-none d-md-block">
      <?php if ($cards) : ?>
        <div class="row g-4">

          <?php $i = 1;
          foreach ($cards as $card) : ?>
            <?php
            $image = $card['image'];
            $title = $card['title'];
            $text = $card['text'];
            $link = $card['link'] ?: '';
            ?>
            <?php if ($card) : ?>
              <div class="col-lg-3 col-md-6 <?php echo $i > 8 ? 'd-none' : '' ?>">
                <div class="inside inside-card">
                  <a class="inside-image d-block ratio ratio-16x9" href="<?php echo  $link['url'] ?>">
                    <?php if ($image) : ?>
                      <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php endif; ?>
                  </a>
                  <div class="inside-body">
                    <h3 class="title f-20">
                      <a class="" href="<?php echo  $link['url'] ?>">
                        <?php echo $title ?>
                      </a>
                    </h3>
                    <div class="text">
                      <?php echo $text ?>
                    </div>
                  </div>
                  <!-- <div class="text f-300"><!?php echo $article->post_excerpt ?></div> -->
                  <!-- <a href="" class="text-decoration-none text-secondary f-16 f-500">Tìm hiểu <i class="ms-2 icon-arrow-next-long text-inherit "></i></a> -->
                </div>
              </div>
            <?php endif ?>
          <?php $i++;
          endforeach; ?>
        </div>
      <?php endif; ?>
    </div>


    <div class="list-cards d-block d-md-none">
      <?php if ($cards) : ?>
        <div class="cards-slider-mobile">

          <?php $i = 1;
          foreach ($cards as $card) : ?>
            <?php
            $image = $card['image'];
            $title = $card['title'];
            $text = $card['text'];
            $link = $card['link'] ?: '';
            ?>
            <?php if ($card) : ?>
              <div class="card-item">
                <div class="inside inside-card mx-2">
                  <a class="inside-image d-block ratio ratio-16x9" href="<?php echo  $link['url'] ?>">
                    <?php if ($image) : ?>
                      <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php endif; ?>
                  </a>
                  <div class="inside-body">
                    <h3 class="title f-20">
                      <a class="" href="<?php echo  $link['url'] ?>">
                        <?php echo $title ?>
                      </a>
                    </h3>
                    <div class="text">
                      <?php echo $text ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>
          <?php $i++;
          endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($read_more['url']) : ?>
      <div class="text-center mt-5 d-none d-md-block">
        <a class="read-more btn btn-primary" href="<?php echo $read_more['url'] ?>" target="<?php echo $read_more['target'] ?>">
          <?php echo $read_more['title'] ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>