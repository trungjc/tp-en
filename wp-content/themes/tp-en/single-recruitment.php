<?php
echo '<div class="job-detail">';
get_header();
global $post;
$salary = get_field('salary');
$date = get_field('date');
$address = get_field('address');
$department = get_field('department');
$role = get_field('role');
$btnText = get_field('send_cv_text');
$jobDetail = get_field('job_detail');
$shortCode = get_field('short_code');
echo '<main class="main" id="page-job-detail">'; ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <div class="">
            <div id="recruitment-modal" class="hidden">
                <div class="modal">
                    <div class="modal__background"></div>
                    <div class="modal__content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-x.svg" alt="" class="modal__close" />
                        <div class="recruitment-form">
                            <div class="recruitment-form__img"></div>
                            <div class="recruitment-form__content">
                                <h3>Đơn ứng tuyển</h3>
                              <?php if (pll_current_language() == 'en') {
                                echo do_shortcode('[contact-form-7 id="258" title="Form ứng tuyển english"]');
                              } else {
                                echo do_shortcode('[contact-form-7 id="255" title="Form ứng tuyển"]');
                              } ?>
<!--                                <input type="text" placeholder="Họ và tên (*)" />-->
<!--                                <div class="flex gap-4 sm:block">-->
<!--                                    <input type="text" placeholder="Số điện thoại (*)" />-->
<!--                                    <input type="text" placeholder="Email (*)" />-->
<!--                                </div>-->
<!--                                <input type="file" placeholder="Đính kèm CV" />-->
<!--                                <textarea placeholder="Nội dung" rows="10"></textarea>-->
<!---->
<!--                                <div class="btn-search text-center mt-4">Ứng tuyển</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="job-detail__title">
                    <div>
                        <div
                                class="btn-primary btn-primary--no-icon mb-4 pointer-events-none"
                        >
                            <?php echo $department ?>
                        </div>
                        <h1><?php echo the_title() ?></h1>
                        <div class="job-detail__info">
                            <div class="flex items-center sm:mt-4">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location-white.svg" alt="" />
                                <span class="text-xl ml-2 sm:text-[12px]"
                                ><?php echo $address ?>aaa</span
                                >
                            </div>
                            <div class="flex items-center mt-6 sm:mt-5">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vnd-white.svg" alt="" />
                                <span class="text-xl ml-2 sm:text-[12px]"
                                ><?php echo $salary ?></span
                                >
                            </div>
                        </div>
                    </div>

                    <div class="btn-secondary" id="open-send-cv-form"><?php echo $btnText ?></div>
                </div>
                <div class="job-detail__content">
                  <?php echo $jobDetail ?>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>

<?php
echo '</main>';

get_footer();
echo '</div>';
