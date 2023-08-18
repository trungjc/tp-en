  <?php if (have_rows('modules')) : ?>
    <?php while (have_rows('modules')) : the_row(); ?>
        <?php if (get_row_layout() == 'hero') : ?>
        <?php get_template_part('blocks/section', 'hero') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'development_path') : ?>
        <?php get_template_part('blocks/section', 'development-path') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'core_value') : ?>
        <?php get_template_part('blocks/section', 'core-value') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'people') : ?>
        <?php get_template_part('blocks/section', 'people') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'sponsor') : ?>
        <?php get_template_part('blocks/section', 'sponsor') ?>
      <?php endif; ?>

      <?php if (get_row_layout() == 'recruitment_banner') : ?>
        <?php get_template_part('blocks/section', 'recruitment-banner') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'recruitment_reasons') : ?>
        <?php get_template_part('blocks/section', 'recruitment-reason') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'recruitment_block') : ?>
        <?php get_template_part('blocks/section', 'recruitment') ?>
      <?php endif; ?>
      <?php if (get_row_layout() == 'quote') : ?>
        <?php get_template_part('blocks/section', 'quote') ?>
      <?php endif; ?>

      <?php if (get_row_layout() == 'contact') : ?>
        <?php get_template_part('blocks/section', 'contact') ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>