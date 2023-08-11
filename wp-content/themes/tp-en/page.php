<?php
get_header();
?>
<main class="main">
  <?php
  if (!is_front_page()) { ?>
    <div class="container breadcrumb-container">
      <?php bcn_display(); ?>
    </div>
  <?php  } ?>
  <?php @include('flexible-content.php') ?>
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      <div class="container the-content pt-0">
        <?php the_content(); ?>
      </div>
  <?php
    endwhile;
  endif;
  ?>
  <?php get_template_part('blocks/section', 'contact') ?>
</main>
<?php
get_footer();
