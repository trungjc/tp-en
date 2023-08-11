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

?>

<div class="post  col-md-4">
	<a  class="d-block ratio ratio-1x1 mb-4" href="<?php the_permalink(); ?>" >
		<?php the_post_thumbnail('medium'); ?>
	</a>

	<div class=" d-flex flex-wrap f-14 mb-3">
		<div class="date text-muted ">
		<?php echo get_the_date('d F,Y') ?>
		</div>
		<?php $categories = get_the_category($post->ID); ?>
		<a  href="<?php echo get_category_link($categories[0]->term_id); ?>" class="term-name text-decoration-none">
				<?php echo $categories[0]->name ?>
			</a>
		<!-- <?php if ($categories): ?>
			<?php foreach ($categories as $category): ?>
			<a  href="<?php echo get_category_link($category->term_id); ?>" class="term-name text-decoration-none">
				<?php echo $category->name ?>
			</a>
			<?php endforeach; ?>
		<?php endif; ?> -->
	</div>
	<h5 class="post-title">
		<a  class="text-decoration-none" href="<?php the_permalink(); ?>"  >
		<?php the_title() ?>
		</a>
	</h5>
	<div class="excerpt f-16"><?php the_excerpt() ?></div>
</div>