<?php
include_once 'inc/theme-init.php';
include_once 'inc/helpers.php';
include_once 'inc/theme-function.php';
include_once 'inc/register-blocks.php';
include_once 'inc/register-post-type.php';
include_once 'inc/class-wp-bootstrap-navwalker.php';
// include_once 'inc/checkout.php';
// add_filter("the_content", "plugin_myContentFilter");

// function plugin_myContentFilter($content)
// {
//   // Take the existing content and return a subset of it
//   return substr($content, 0, 300);
// }


// remove_theme_support('widgets-block-editor')

remove_filter('template_redirect', 'redirect_canonical');


function themename_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Footer First column', 'tasco'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'tasco'),
        'id'            => 'secondary',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'themename_widgets_init');

add_filter('get_the_archive_title', 'replaceCategoryName');
function replaceCategoryName($title)
{

    $title =  single_cat_title('', false);
    return $title;
}

function tg_exclude_pages_from_search_results($query)
{
    if ($query->is_main_query() && $query->is_search() && !is_admin()) {
        $query->set('post_type', array('post'));
    }
}
add_action('pre_get_posts', 'tg_exclude_pages_from_search_results');
add_action('init', function () {
    // pll_register_string('mytheme-job', 'Công việc');
    // pll_register_string('mytheme-level', 'Cấp bậc');
    // pll_register_string('mytheme-career', 'Ngành nghề');
    // pll_register_string('mytheme-location', 'Địa điểm');
    // pll_register_string('mytheme-deadline-submission', 'Hạn nộp hồ sơ');
    // pll_register_string('mytheme-latest', 'Bài viết mới nhất');
    // pll_register_string('mytheme-readmore', 'Đọc thêm');
    // pll_register_string('mytheme-support', 'Bạn cần tư vấn');
    // pll_register_string('mytheme-share', 'Chia sẻ');
    // pll_register_string('mytheme-otherJob', 'Việc làm khác');
    // pll_register_string('mytheme-discovery', 'Khám phá ngay');
    // pll_register_string('mytheme-detail', 'Xem chi tiết');

});

function justread_custom_scripts()
{
    // $terms = get_terms(array(
    //     'taxonomy'   => 'locations',
    //     'hide_empty' => false,
    // ));
    // foreach ($terms as $term) {
    //     $location[] = $term->name;
    // }
    // $object = [
    //     'ajax_url' => admin_url('admin-ajax.php'),
    //     'location_autocomplete' => $location,
    // ];

    // wp_enqueue_script('justread-ajax-filter-locations', get_stylesheet_directory_uri() . '/assets/js/all.js', array('jquery'), '', true);
    // wp_localize_script('justread-ajax-filter-locations', 'ajax_object', $object);
}
add_action('wp_enqueue_scripts', 'justread_custom_scripts');

function justread_filter_locations()
{
    $location = $_POST['location'];
    $query_arr = array(
        'post_type' => 'locations',
        'tax_query' => array(
            array(
                'taxonomy' => 'locations-category',
                'field'    => 'id',
                'terms'    => $location
            ),
        ),
    );
    $query = new WP_Query($query_arr);

    if ($query->have_posts()) :
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content/content-locations');
        endwhile;
        $posts = ob_get_clean();
    else :
        $posts = '<h1>' . __('No found!', 'justread') . '</h1>';
    endif;

    $return = array(
        'posts' => $posts,
    );
    wp_send_json($return);
}
add_action('wp_ajax_justread_filter_locations', 'justread_filter_locations');
add_action('wp_ajax_nopriv_justread_filter_locations', 'justread_filter_locations');
