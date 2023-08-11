<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

<section class=" mb-5 pb-5 no-results not-found" >
		<div class="container">
		<div class="container breadcrumb-container border-0 mb-0">
            <?php bcn_display(); ?>
        </div>
		<header class="page-header pb-0">
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
			<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: Link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentynineteen' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentynineteen' ); ?></p>
			<?php
			// get_search_form();

		else :
			?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentynineteen' ); ?></p>
			<?php
			// get_search_form();

		endif;
		?>
		</header><!-- .page-header -->
		
			<div class="heading d-flex justify-content-center pb-5">
				<div class="text-center">
					<div class="img-404 img-404-s"> </div>
					<!-- <h1 class="h5">Trang không tồn tại</h1> -->
					<?php  if(pll_current_language() == 'en') {?>
						<p class="mb-4">Sorry, but nothing matched your search terms</p>
						<a href="<?php echo home_url(); ?>" class="btn btn-primary"> Go Home</a>
					<?php  } else {?>
						<p class="mb-4">Rất tiếc! Kết quả tìm kiếm của bạn không phù hợp</p>
						<a href="<?php echo home_url(); ?>" class="btn btn-primary"> Về trang chủ</a>
					<?php  } ?>
				</div>
			</div>
		</div>
	</section>
