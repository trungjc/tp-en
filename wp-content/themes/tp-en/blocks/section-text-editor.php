<?php  

$content = get_sub_field('text') ;

?>

<section class="text-editor-block wow fadeInUp" data-wow-duration=".3s" data-wow-delay=".3s">
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-editior-inside">
                <?php echo $content;?>
            </div>
    </div>
  </div>
</section>


