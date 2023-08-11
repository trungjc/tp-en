<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- 	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" type="image/x-icon" href="favicon.ico"> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- <style>
		.wow {
			visibility: hidden;
		}
	</style> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<div class="wrapper">
		<?php
		$logo = get_field('logo', 'option') ?: '';
		$logoText = get_field('logo_text', 'option') ?: '';
		$hotline = get_field('hotline', 'option') ?: '';
		$register = get_field('register', 'option') ?: '';
		?>
		<header class="app-header" data-wow-duration="1s" data-wow-offset="0" id="app-header">
			<div class="container-fluid px-lg-5 position-relative">
				<div class="d-flex flex-wrap align-items-center app-header-inner">
					<button class="navbar-toggler collapsed p-0 white me-4" type="button" aria-label="Toggle navigation">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
						</svg>
						<i class="icon-times opacity-0 d-none"></i>
					</button>
					<div class="logo d-flex align-items-center me-md-auto text-dark text-decoration-none">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo $logo['sizes']['large']  ?>" class="logo-img" alt="<?php echo $logoText; ?>" />
						</a>
					</div>
					<div class="main-navbar">

						<div class="buttons-mobile">
							<button class="btn btn-rounder btn-search btn-outline-primary search-btn"><i class="icon-search"></i></button>
							<?php if ($hotline) : ?>
								<a href="tel:<?php echo $hotline ?>" class="btn btn-outline-primary btn-phone "><i class="icon-Vector-4 me-2"></i><?php echo $hotline ?></a>
							<?php endif ?>
						</div>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'container' => false,
							'menu_class' => 'nav nav-pills ',
							'walker' => new WP_Bootstrap_Navwalker()
						));
						?>
						<ul class="nav-language-ms nav nav-pills d-flex d-lg-none ">
							<?php
							pll_the_languages(array(
								'dropdown' => 0,
								'show_flags' => 1,
								'show_names' => 1,
								'raw' => 0
							)) ?>
						</ul>
					</div>
					<?php get_search_form() ?>
					<button class="btn btn-rounder btn-search btn-outline-primary search-btn me-4"><i class="icon-search"></i></button>
					<?php if ($hotline) : ?>
						<a href="tel:<?php echo $hotline ?>" class="btn btn-outline-primary btn-phone me-4"><i class="icon-Vector-4 me-2"></i><?php echo $hotline ?></a>
					<?php endif ?>
					<?php if ($register) : ?>
						<a href="<?php echo $register ?>" class="btn btn-primary me-lg-4">ĐĂNG KÝ KHÁM</a>
					<?php endif ?>
					<ul class="nav nav-language opacity-0 ms-4 nav-pills d-none ">
						<?php
						pll_the_languages(array(
							'dropdown' => 0,
							'show_flags' => 1,
							'show_names' => 1,
							'raw' => 0
						)) ?>
					</ul>
				</div>
			</div>
			<span class="overlay"></span>
		</header>