<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- 	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
    <link rel="icon" type="image/svg+xml" href="/vite.svg"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div class="wrapper">
  <?php
  $logo = get_field('logo', 'option') ?: '';
  $logoImage = "";
  if($logo ) {
    $logoImage = $logo['url'];
  }
  $logoWhite = get_field('logo_white', 'option') ?: '';
  $logoImageWhite = "";
  if($logoWhite ) {
    $logoImageWhite = $logoWhite['url'];
  }
  $logoText = get_field('logo_text', 'option') ?: '';
  $hotline = get_field('hotline', 'option') ?: '';
  $register = get_field('register', 'option') ?: '';
  ?>
    <header class="header header--transparent" style="">
        <div class="header__inner">
            <div class="header__left">
                <a href="<?php echo home_url(); ?>" class=" mr-4">
                    <img width="42" class="logo-black" src="<?php echo $logoImage ?>" alt="<?php echo $logoText?>" />
                    <img width="42" class="logo-white hidden" src="<?php echo $logoImageWhite ?>" alt="<?php echo $logoText?>" />
                </a>
                <span><?php echo $logoText?></span>
            </div>

            <div class="flex">
                <ul class="header__language">
                  <?php
                  pll_the_languages(array(
                    'dropdown' => 0,
                    'show_flags' => 0,
                    'show_names' => 1,
                    'raw' => 0,
                  )) ?>
                </ul>

                <div class="menu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <div class="nav-menu" id="overlay">
        <nav>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'nav nav-pills ',
            'walker' => new WP_Bootstrap_Navwalker()
          ));
          ?>
        </nav>
        <div></div>
    </div>







