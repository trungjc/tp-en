<?php

$hotline = get_field('hotline', 'option') ?: '';
$address = get_field('address', 'option') ?: '';
$email = get_field('email', 'option') ?: '';
$title = get_sub_field('title');
$subTitle = get_sub_field('sub_title');
$shortCode = get_sub_field('short_code');
$image = get_sub_field('image');
?>

<div class="contact__container">
    <div class="contact__inner">
        <div class="contact__form">
            <p class="contact__form-sub"><?php echo $subTitle ?></p>
            <p class="contact__form-title"><?php echo $title ?></p>
            <p class="contact__form-text">
              <?php echo $address ?>

            </p>
            <p class="contact__form-text">Hotline: <?php echo $hotline ?></p>
            <p class="contact__form-text">Email: <?php echo $email ?></p>
          <?php echo do_shortcode($shortCode) ?>
<!--            <form class="mt-12">-->
<!--                <input type="text" placeholder="Họ và tên (*)" />-->
<!--                <div class="flex gap-4">-->
<!--                    <input type="text" placeholder="Số điện thoại (*)" />-->
<!--                    <input type="text" placeholder="Email (*)" />-->
<!--                </div>-->
<!--                <textarea placeholder="Nội dung" rows="10"></textarea>-->
<!--                <button class="btn-search mt-4">Gửi yêu cầu</button>-->
<!--            </form>-->
        </div>
        <div class="contact__location-img" style="background: radial-gradient(50% 50.00% at 50% 50.00%, rgba(250, 251, 252, 0.00) 44.27%, #FAFBFC 100%), url('<?php echo $image['url'] ?>') no-repeat"></div>
<!--        <div class="contact__location-img"></div>-->
    </div>
</div>