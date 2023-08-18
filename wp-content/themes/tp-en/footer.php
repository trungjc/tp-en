<?php

$facebook = get_field('facebook', 'option') ?: '';
$youtube = get_field('youtube', 'option') ?: '';
$twitter = get_field('twitter', 'option') ?: '';
$linkedin = get_field('linkedin', 'option') ?: '';
$address = get_field('address', 'option') ?: '';
$hotline = get_field('hotline', 'option') ?: '';
$email = get_field('email', 'option') ?: '';
$logoText = get_field('logo_text', 'option') ?: '';
$logo_footer = get_field('logo_footer', 'option') ?: '';
$company_name = get_field('company_name', 'option') ?: '';
?>
<footer class="footer">
    <div class="flex items-center text-2xl">
        <div class="footer__logo"></div>
        <span class="font-bold sm:text-xl"><?php echo $logoText ?></span>
    </div>
    <div class="footer__inner">
        <div class="footer__left">
            <p class="uppercase"><?php  if(pll_current_language() == 'en') {?>
            Contact
          <?php  } else {?>
                    Liên hệ
          <?php  } ?></p>
            <p class="font-bold text-2xl mt-6 uppercase sm:text-xl">
                <?php echo $company_name ?>
            </p>
            <div class="footer__location">
                <strong class=""><?php  if(pll_current_language() == 'en') {?>
                        Location:
                  <?php  } else {?>
                        Trụ sở chính:
                  <?php  } ?></strong>
                <p class="">
                  <?php echo $address ?>
                </p>
            </div>

            <p class="mt-6"><strong>Hotline</strong>: <?php echo $hotline ?></p>
            <p class="mt-6"><strong>Email</strong>: <?php echo $email ?></p>
        </div>
        <div class="footer__right">
            <div class="flex-1">
                <p class=""><?php  if(pll_current_language() == 'en') {?>
                        COMPANY
                  <?php  } else {?>
                        CÔNG TY
                  <?php  } ?></p>
                <nav>
                  <?php
                  wp_nav_menu(array(
                    'theme_location' => 'bottom',
                    'container' => false,
                    'menu_class' => 'nav nav-pills ',
                    'walker' => new WP_Bootstrap_Navwalker()
                  ));
                  ?>
                </nav>
            </div>
            <div class="flex-1">
                <p class=""><?php  if(pll_current_language() == 'en') {?>
                        SOCIAL
                  <?php  } else {?>
                        LIÊN KẾT
                  <?php  } ?></p>
                <div class="flex mt-3">
                    <a target="_blank" href="<?php echo $facebook ?>">
                        <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg"
                                alt=""
                                width="36"
                                height="36"
                                class="mr-4 sm:mr-5"
                        />
                    </a>
                    <a target="_blank" href="<?php echo $youtube ?>">
                        <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.svg"
                                alt=""
                                width="36"
                                height="36"
                                class="mr-4 sm:mr-5"
                        />
                    </a>
                    <a target="_blank" href="<?php echo $linkedin ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="" width="36" height="36"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>