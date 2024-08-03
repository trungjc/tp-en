<?php
$team = get_sub_field('team');
$title = get_sub_field('title');
?>

<section class="team">
    <div class="container container-xl">
        <div class="section-title">
            <div><?php echo $title ?></div>
        </div>
        <div class="team__block ">
            <?php foreach ($team as $key => $value): ?>
                <div class="team__card ">
                    <div class="team__image">
                        <?php echo get_the_post_thumbnail($value->ID, 'large'); ?>
                    </div>
                    <div class="team__body">
                        <div class="team__header">
                            <span class="team__title"><?php echo get_post_field('title', $value->ID) ?></span>
                            <span class="team__name"> <?php echo $value->post_title ?></span>
                        </div>
                        <!-- <div class="team__content ">
                            <?php echo $value->post_content ?>
                        </div> -->
                        <div class="team__position"><?php echo get_post_field('position', $value->ID) ?></div>
                        <a class="team__link" href="<?php echo get_post_field('linkedIn', $value->ID) ?>"
                            target="_blank">LinkedIn
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 10.9998L21.7 2.7998" stroke="#131313" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22.4992 6.8V2H17.6992" stroke="#131313" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M11.5 2H9.5C4.5 2 2.5 4 2.5 9V15C2.5 20 4.5 22 9.5 22H15.5C20.5 22 22.5 20 22.5 15V13"
                                    stroke="#131313" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class=" team-slider">
        <div class="swiper-wrapper">
            <?php foreach ($team as $key => $value): ?>
                <div class="team__card swiper-slide">
                    <div class="team__image">
                        <?php echo get_the_post_thumbnail($value->ID, 'large'); ?>
                    </div>
                    <div class="team__body">
                        <div class="team__header">
                            <span class="team__title"><?php echo get_post_field('title', $value->ID) ?></span>
                            <span class="team__name"> <?php echo $value->post_title ?></span>
                        </div>
                        <!-- <div class="team__content ">
                            <?php echo $value->post_content ?>
                        </div> -->
                        <div class="team__position"><?php echo get_post_field('position', $value->ID) ?></div>
                        <a class="team__link" href="<?php echo get_post_field('linkedIn', $value->ID) ?>"
                            target="_blank">LinkedIn
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 10.9998L21.7 2.7998" stroke="#131313" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22.4992 6.8V2H17.6992" stroke="#131313" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M11.5 2H9.5C4.5 2 2.5 4 2.5 9V15C2.5 20 4.5 22 9.5 22H15.5C20.5 22 22.5 20 22.5 15V13"
                                    stroke="#131313" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>