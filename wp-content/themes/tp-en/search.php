<?php

get_header();
?>
<main class="main">
	<div class="container">
	<?php
	if ( have_posts() ) :	?>
		<div class="container breadcrumb-container border-0 mb-0">
				<?php bcn_display(); ?>
			</div>
		<header class="page-header alignwide">
			<h1 class="page-title mb-24">Tìm kiếm</h1>
			<div class="search-result-count ">
			<?php
			printf(
				esc_html(
					/* translators: %d: The number of search results. */
					_n(
						'%d  kết quả cho từ khoá',
						'%d  kết quả cho từ khoá',
						(int) $wp_query->found_posts,
						'twentytwentyone'
					)
				),
				(int) $wp_query->found_posts
			);
			printf(
				/* translators: %s: Search term. */
				esc_html__( '"%s"', 'twentytwentyone' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</div><!-- .search-result-count -->
		</header><!-- .page-header -->	
		<div class="search-post mb-5">
			<div class="row g-5">
		<?php
		// Start the Loop.
		while ( have_posts() ) : 
			the_post(); ?>
				<?php get_template_part( 'template-parts/content/content-single' ); ?>
			<?php	endwhile; ?>
			
			</div>
		</div>
		<div class="mb-5 pb-5"><?php  bootstrap_pagination( $wp_query );  ?></div>
		
		<?php  else :
			get_template_part( 'template-parts/content/content-none' );
		endif; ?>
	</div>
</main>
<?php
get_footer();
