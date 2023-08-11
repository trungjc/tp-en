<?php  
$title = get_sub_field('title') ;
$description = get_sub_field('description') ;
$articles = get_sub_field('articles') ;
$image = get_sub_field('image') ;
// var_dump($image)
?>

<!-- <section class="testimonial-posts"> -->
<section class="testimonial-posts  wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s" style="background-image: url(<?php echo $image['sizes']['large'] ?>)">
  <div class="container">
    <h2>
      <?php echo $title?>
    </h2>
    <p>
    <?php echo $description?>
    </p>
    <div class="testimonials">
    <?php if($articles):?>
      <?php foreach ($articles as $article): ?>
        <?php
        $article = $article['article'];
        $position  = get_field('testimonial_position', $article->ID);
        ?> 
       <div class="testimonials-item">
          <div class="box">
            <div class="image ratio ratio-1x1">
              <?php echo get_the_post_thumbnail( $article->ID, 'medium' ); ?>
            </div>
            <div class="text f-300 mb-4"><?php echo $article->post_content ?></div>
            <div class="name f-16 f-700 mb-2 text-heading"><?php echo $article->post_title ?></div>
            <div class="position f-16 text-muted"><?php   echo $position; ?></div>
          </div>
       </div>
    
      <?php endforeach; ?>
      <?php endif ?>
    </div>
  </div>

</section>
