<?php
/**
 * Template Name: Page template Recruitment
 * Description: Page template  Recruitment
 * Application
 *
 */

get_header();
global $post; 

?>

<main class="main">
      <?php 
        
        if(have_posts()):
          while (have_posts()): the_post();?>
          <div class="recruitment-heading">
            
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class=" breadcrumb-container border-0 mb-0">
                    <?php bcn_display(); ?>
                  </div>
                  <?php the_content(); ?>
                </div>
                <div class="col-md-6">
                <?php  $img = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
                <?php if($img):?>
                  <img src="<?php echo $img?>" alt="" />
              <?php endif;?>
              
                
                </div>
              </div>
            </div>
          </div>
        <?php    
          endwhile;
        endif;
          ?>
  <div class="recruitments my-5 py-5">
    <div class="container">
    
    <?php 
    $args = array(
      'post_type' => 'recruitment',
      'posts_per_page' => 10,
      'paged' => $paged,
    );
    $query = new WP_Query($args);
if ($query->have_posts()): 
  ?>
  <div class="table-responsive ">
  <table class="table f-16 mb-5" style="    min-width: 500px;">
    <tr>
      <th class="ps-0"><?php pll_e('Công việc'); ?></th>
      <th><?php pll_e('Cấp bậc'); ?></th>
      <th><?php pll_e('Ngành nghề'); ?></th>
      <th><?php pll_e('Địa điểm'); ?></th>
      <th class="text-end pe-0"><?php pll_e('Hạn nộp hồ sơ'); ?></th>
    </tr>
 
  <?php while ($query->have_posts()): $query->the_post(); 
    $title= $post->post_title;
    $position = get_field('position');
    $career = get_field('career');
    $city = get_field('city');
    $date = get_field('date');
    $tag = get_field('tag');
    $link =get_post_permalink( $post->ID );
     ?>
       <tr>
        <td class="ps-0"> 
         <h5 class="mb-0"> <a href="<?php echo  $link ?>"><?php  echo $title ?></a> 
         <?php if($tag):?>
          <span class="badge badge-primary ml-3" ><?php echo $tag?></span>
        <?php endif;?>
        </h5>
        </td>
        <td>
          <?php  echo $position ?>
        </td>
        <td>
          <?php  echo $career  ?>
        </td>
        <td>
          <?php  echo $city ?>
        </td>
        <td class="text-end pe-0">
          <?php  echo $date ?>
        </td>
       </tr>
       
        <?php endwhile; ?>
      
 </table>
  </div>
 <?php     bootstrap_pagination( $query ); ?>
 <?php  wp_reset_postdata();
        endif; ?>
    </div>
  </div>
  
</main>
<?php get_footer(); ?>
