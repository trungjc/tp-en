<?php

$facebook = get_field('facebook', 'option') ?: '';
$youtube = get_field('youtube', 'option') ?: '';
// $twitter = get_field('twitter', 'option') ?: '';
$address = get_field('address', 'option') ?: '';
$phone_1 = get_field('phone_1', 'option') ?: '';
$phone_2 = get_field('phone_2', 'option') ?: '';
$email = get_field('email', 'option') ?: '';
$logoText = get_field('logo_text', 'option') ?: '';
$logo_footer = get_field('logo_footer', 'option') ?: '';
?>
<footer class="app-footer">
	<div class="footer-inside">
		<div class="container">

			<div class="d-flex flex-wrap justify-content-between footer-middle">
				<div class="col-footer first-col mb-5 mb-md-0">
					<a class="mb-5 d-inline-block" href=" <?php echo home_url(); ?>">
						<img src="<?php echo $logo_footer['sizes']['large']  ?>" class="logo-img" alt="<?php echo $logoText; ?>" />
					</a>
					<div class="site-info">
						<div class="d-flex align-items-center mb-4 pb-2">
							<i class="icon-map-marker"></i>
							<div class="site-info-text">
								<?php echo $address ?>
							</div>
						</div>
						<div class="d-flex align-items-center mb-4 pb-2">
							<i class="icon-Vector-4"></i>
							<div class="site-info-text">
								<?php echo $phone_1 ?>
								<?php echo $phone_2 ?>
							</div>
						</div>
						<div class="d-flex align-items-center mb-4 pb-2">
							<i class="icon-Vector-5"></i>
							<div class="site-info-text">
								<?php echo $email ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-footer me-4 second-col">
					<?php if (pll_current_language() == 'en') {
						echo '<h6>About us</h6>';
					} else {
						echo '<h6>về iccare</h6>';
					} ?>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_column_1',
						'container' => false,
						'menu_class' => 'nav flex-column ',
						'walker' => new WP_Bootstrap_Navwalker()
					));
					?>
				</div>
				<div class="col-footer me-4 third-col">

					<?php if (pll_current_language() == 'en') {
						echo '<h6>Treatment diseases</h6>';
					} else {
						echo '<h6>BỆNH ĐIỀU TRỊ</h6>';
					} ?>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_column_2',
						'container' => false,
						'menu_class' => 'nav flex-column ',
						'walker' => new WP_Bootstrap_Navwalker()
					));
					?>
				</div>
				<div class="col-footer me-4 last-col mt-4 mt-md-0">
					<?php if (pll_current_language() == 'en') {
						echo '<h6>treatment subject</h6>';
					} else {
						echo '<h6>ĐỐI tượng điều trị</h6>';
					} ?>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_column_3',
						'container' => false,
						'menu_class' => 'nav flex-column ',
						'walker' => new WP_Bootstrap_Navwalker()
					));
					?>
				</div>
			</div>
			<div class="copy-right py-5 d-flex align-items-center justify-content-between">
				Copyright ⓒ iCCare &copy; <?php echo date("Y"); ?> All rights reserved.
				<div class="social">
					<?php if ($facebook) : ?>
						<a class="ms-4" href="<?php echo $facebook ?>">
							<i class="icon-Icon-Round-Facebook-Future-Blue"></i>
						</a>
					<?php endif ?>
					<?php if ($youtube) : ?>
						<a class="ms-4" href="<?php echo $youtube ?>">
							<i class="icon-Subtract"></i>
						</a>
					<?php endif ?>

				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>