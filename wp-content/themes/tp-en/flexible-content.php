  <?php if (have_rows('modules')) : ?>
    <?php while (have_rows('modules')) : the_row(); ?>
      <?php if (get_row_layout() == 'hero') : ?>
        <?php get_template_part('blocks/section', 'hero') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'jcarousel_card') : ?>
        <?php get_template_part('blocks/section', 'jcarousel-card') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'latest_posts') : ?>
        <?php get_template_part('blocks/section', 'latest-posts') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'card_block') : ?>
        <?php get_template_part('blocks/section', 'cards') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'intro_block') : ?>
        <?php get_template_part('blocks/section', 'intro') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'people') : ?>
        <?php get_template_part('blocks/section', 'people') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'testimonial_section') : ?>
        <?php get_template_part('blocks/section', 'testimonial') ?>
      <?php endif; ?> 
        <?php if (get_row_layout() == 'text_block') : ?>
        <?php get_template_part('blocks/section', 'text-block') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'text_editor') : ?>
        <?php get_template_part('blocks/section', 'text-editor') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'image_full') : ?>
        <?php get_template_part('blocks/section', 'image-full') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == '2_columns') : ?>
        <?php get_template_part('blocks/section', '2col-block') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'vision') : ?>
        <?php get_template_part('blocks/section', 'vision-editor') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'video') : ?>
        <?php get_template_part('blocks/section', 'videos') ?>
      <?php endif; ?> 
      <?php if (get_row_layout() == 'contact_block') : ?>
        <?php get_template_part('blocks/section', 'contact') ?>
      <?php endif; ?> 
    <?php endwhile; ?>
  <?php endif; ?>