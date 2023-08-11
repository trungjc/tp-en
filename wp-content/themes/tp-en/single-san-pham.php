<?php
get_header();
$themes =  get_field('yellow_theme');
$classTheme = $themes ?'light-theme' : '';
 ?>
<main class="main <?php echo $classTheme  ?>">
<?php if( have_rows('modules') ): ?>
    <?php while( have_rows('modules') ): the_row(); ?>
        <?php if( get_row_layout() == 'hero' ): ?>
            <?php get_template_part('blocks/section','hero-services') ?>
        <?php endif; ?>
        <?php if( get_row_layout() == 'block_intro' ): ?>
            <?php get_template_part('blocks/section','intro-services') ?>
        <?php endif; ?>
        <?php if( get_row_layout() == 'text_block' ): ?>
            <?php get_template_part('blocks/section','text-block-insurance') ?>
        <?php endif; ?>
        <?php if( get_row_layout() == 'contact_block' ): ?>
            <?php get_template_part('blocks/section','contact') ?>
        <?php endif; ?> 
        <?php if( get_row_layout() == 'feature_insurance' ): ?>
            <?php get_template_part('blocks/section','feature-insurance') ?>
        <?php endif; ?> 
    <?php endwhile; ?>
<?php endif; ?>

<?php
    if(have_posts()):
        while (have_posts()): the_post(); ?>
            <div class="container d-none">
                <?php the_content(); ?>
            </div>
        <?php 
        endwhile;
    endif;
?>
</main>
<?php
get_footer();