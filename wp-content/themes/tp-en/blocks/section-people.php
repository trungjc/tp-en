<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$peoples = get_sub_field('peoples');

?>
<section class="people-posts text-center tpl-block bg-grey wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s">
  <div class="container">
    <div class="people-heading mb-5 pb-5">
      <h2 class="title">
        <?php echo $title ?>
      </h2>
      <div class="mb-5">
        <?php echo $description ?>
      </div>
    </div>

    <div class="sliders-people ">
      <?php if ($peoples) : ?>
        <?php $i = 0;

        foreach ($peoples as $people) : ?>
          <?php if (isset($people)) : ?>
            <?php
            $p_id = $people->ID;
            // $image = $people->image ?: '';
            $name = $people->post_title;
            $link = '';
            $detail = $people->post_content ?: '';
            ?>
            <div class="people-item position-relative px-3">
              <a class="people-item-image ratio ratio-16x9" href="<?php echo  $link['url'] ?>">
                <?php echo get_the_post_thumbnail($p_id, 'large'); ?>
              </a>
              <h3 class="h5 mb-0 name">
                <?php echo $name ?>
              </h3>
              <div class="detail d-none">
                <?php echo $detail ?>
              </div>

            </div>
          <?php endif; ?>
        <?php
        endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>