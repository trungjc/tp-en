<?php  
$layout = get_sub_field('layout') ;
$content = get_sub_field('content') ;
$title = get_sub_field('title') ;
$sub_title = get_sub_field('sub_title') ;
$link = get_sub_field('link') ;
$background =  get_sub_field('background'); 
$class = ($layout[0] == 1) ? "col-md-12 " : "col-md-6";
$classBg = ($background) ? "has-bg" : "";
?>

<section class="text-block wow fadeInUp <?php echo $classBg ?>" data-wow-duration=".3s" data-wow-delay=".3s" style="background-image: url(<?php echo $background['sizes']['large'];?>)">
  <div class="container">
    <div class="row">
      <div class=" mb-5 mb-md-0 <?php echo $class ?>">
        <div class="sub-title f-300 h5 mb-4 pb-4">
          <?php echo $sub_title ?>
        </div>
        <h2> <?php echo $title ?></h2>
      </div>
      <div class=" <?php echo $class ?>">
        <div class="text f-16">
          <?php echo $content ?>
        </div>
        <?php if($link['url']): ?>
        <a class="read-more" href="<?php  echo $link['url']?>" target="<?php echo $link['target'] ?>">
          <i class="ms-2 icon-arrow-next text-inherit "></i>
          <?php echo $link['title'] ?  $link['title'] : 'Xem thêm'   ?>
        </a>
        <?php endif?>
      </div>
    </div>
  </div>
</section>
