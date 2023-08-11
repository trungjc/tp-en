<?php
get_header();

echo '<main class="main">'; ?>

<?php 
	$block =  get_fields('modules');
?>
<?php if( have_rows('modules') ): ?>
<?php while( have_rows('modules') ): the_row(); ?>
    <?php if( get_row_layout() == 'hero' ): ?>
    <?php get_template_part('blocks/section','hero-services') ?>
    <?php endif; ?>
    <?php if( get_row_layout() == 'block_intro' ): ?>
    <?php get_template_part('blocks/section','intro-services') ?>
    <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<section class="tpl-block tpl-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <?php  $img = get_field('image_form_contact','option'); ?>
                <img src="<?php echo $img['sizes']['large']?>" alt="<?php  echo $img['alt'] ?>">
            </div>
            <div class="col-lg-6 " >
                <div class="ps-lg-5  ms-lg-5">
                <h2 class="title mb-5">
                Hãy <span>liên hệ chúng tôi</span>
                để được hỗ trợ tốt nhất
                </h2>
                <?php echo do_shortcode('[contact-form-7 id="11" title="Contact form 1"]'); ?>
                </div>
               
            </div>
        </div>
    </div>
</section>
<?php
if(have_posts()):
	while (have_posts()): the_post(); ?>
        <div class="container d-none">
            <?php  	the_content(); ?>
        </div>
    <?php 
	endwhile;
endif;
?>

<?php
echo '</main>';

get_footer();


// An Giang
// Bà rịa – Vũng tàu
// Bắc Giang
// Bắc Kạn
// Bạc Liêu
// Bắc Ninh
// Bến Tre
// Bình Định
// Bình Dương
// Bình Phước
// Bình Thuận
// Cà Mau
// Cần Thơ
// Cao Bằng 
// Đà Nẵng
// Đắk Lắk
// Đắk Nông
// Điện Biên
// Đồng Nai
// Đồng Tháp
// Gia Lai
// Hà Giang
// Hà Nam
// Hà Nội 
// Hà Tĩnh
// Hải Dương
// Hải Phòng
// Hậu Giang
// Hòa Bình
// Hưng Yên
// Khánh Hòa
// Kiên Giang
// Kon Tum
// Lai Châu
// Lâm Đồng
// Lạng Sơn
// Lào Cai
// Long An
// Nam Định
// Nghệ An
// Ninh Bình
// Ninh Thuận
// Phú Thọ
// Phú Yên
// Quảng Bình
// Quảng Nam
// Quảng Ngãi
// Quảng Ninh
// Quảng Trị
// Sóc Trăng
// Sơn La
// Tây Ninh
// Thái Bình
// Thái Nguyên
// Thanh Hóa
// Thừa Thiên Huế
// Tiền Giang
// Thành phố Hồ Chí Minh
// Trà Vinh
// Tuyên Quang
// Vĩnh Long
// Vĩnh Phúc
// Yên Bái