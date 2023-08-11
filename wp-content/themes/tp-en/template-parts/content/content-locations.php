<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
global $post;
$phone = get_field('phone');
$mobile = get_field('mobile');
$email = get_field('email');
$address = get_field('address');
$map = get_field('map');
?>

<div class="location-item my-5 row">
	<div class="col-md-4 mb-4 mb-md-0">
		<div class="ratio ratio-16x9  me-5" >
			<?php echo $map?>
		</div>
	</div>
	
	<div class="col-md-8">
		<h5 class="location-name">
		<?php the_title() ?>
		</h5>
		<div class="d-flex location-address mb-4">
			<div class="me-2">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.05025 4.05025C7.78392 1.31658 12.2161 1.31658 14.9497 4.05025C17.6834 6.78392 17.6834 11.2161 14.9497 13.9497L10 18.8995L5.05025 13.9497C2.31658 11.2161 2.31658 6.78392 5.05025 4.05025ZM10 11C11.1046 11 12 10.1046 12 9C12 7.89543 11.1046 7 10 7C8.89543 7 8 7.89543 8 9C8 10.1046 8.89543 11 10 11Z" fill="#4A5568"/> </svg>
			</div>
			<?php echo $address;?>
		</div>
	
		<a class="d-flex align-items-center mb-2 text-decoration-none text-inherit" href="tel:<?php echo $phone;?>">
			<div class="me-2">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/> </svg>
			</div>
			
			<?php echo $phone;?>
		</a>
		<a class="d-flex mb-4 align-items-center text-decoration-none text-inherit" text-inherit href="tel:<?php echo $mobile;?>">
			<div class="me-2">
				<svg width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.5 4.842C15.976 4.337 14.146 4 12 4c-2.145 0-3.976.337-5.5.842m11 0c3.021 1 4.835 2.66 5.5 3.658L20.5 11l-3-2V4.842zm-11 0c-3.021 1-4.835 2.66-5.5 3.658L3.5 11l3-2V4.842z"/><path fill="currentColor" fill-rule="evenodd" d="M10 6a1 1 0 0 1 1 1v2h2V7a1 1 0 1 1 2 0v2.586l5.121 5.121A3 3 0 0 1 21 16.828V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-1.172a3 3 0 0 1 .879-2.12L9 9.585V7a1 1 0 0 1 1-1zm2 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg>
			</div>
			<?php echo $mobile;?>
		</a>
		<a class="d-flex align-items-center text-decoration-none text-inherit" href="mailto:<?php echo $email;?>">
			<div class="me-2 opacity-7">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="40" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 3.460938 6.5625 L 26.539062 6.5625 L 26.539062 24.707031 L 3.460938 24.707031 Z M 3.460938 6.5625 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(6.269836%, 5.879211%, 5.099487%)" d="M 24.230469 11.101562 L 15 16.769531 L 5.769531 11.101562 L 5.769531 8.832031 L 15 14.503906 L 24.230469 8.832031 Z M 24.230469 6.5625 L 5.769531 6.5625 C 4.492188 6.5625 3.472656 7.578125 3.472656 8.832031 L 3.460938 22.441406 C 3.460938 23.695312 4.492188 24.707031 5.769531 24.707031 L 24.230469 24.707031 C 25.507812 24.707031 26.539062 23.695312 26.539062 22.441406 L 26.539062 8.832031 C 26.539062 7.578125 25.507812 6.5625 24.230469 6.5625 " fill-opacity="1" fill-rule="nonzero"/></g></svg>
			</div>
			<?php echo $email;?>
		</a>
		<!-- <a class="d-flex text-decoration-none" href="<?php echo $map;?>">
			Map
		</a> -->
	</div>
	
</div>