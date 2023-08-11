<?php

/*****************************/
//Create the custom post types
/*****************************/
function create_customs_post_types()
{
    // register_post_type(
    //     'technologies',
    //     array(
    //         'labels' => array(
    //             'name' => __('Phác đồ và công nghệ '),
    //             'singular_name' => __('phac-do-cong-nghe')
    //         ),
    //         //    'public' => true,
    //         //    'has_archive' => true,
    //         //    'rewrite' => array('slug' => 'he-thong-don-vi-thanh-vien'),
    //         //    'supports' => array( 'title','editor', 'custom-fields' ),
    //         //    'menu_icon' => 'dashicons-admin-post',
    //         //    'show_in_rest'       => true, 
    //         "excerpt" => true,
    //         'menu_icon' => 'dashicons-admin-post',
    //         'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
    //         'publicly_queryable' => true,  // you should be able to query it
    //         'show_ui' => true,  // you should be able to edit it in wp-admin
    //         'exclude_from_search' => true,  // you should exclude it from search results
    //         'show_in_nav_menus' => true,  // you shouldn't be able to add it to menus
    //         'has_archive' => true,  // it shouldn't have archive page
    //         'rewrite' => array('slug' => get_field('service_link', 'options')),
    //         'supports' => array('title', 'custom-fields', 'thumbnail', 'editor'),
    //     )
    // );
    register_post_type(
        'people',
        array(
            'labels' => array(
                'name' => __('People'),
                'singular_name' => __('people')
            ),
            //            'public' => true,
            //            'has_archive' => true,
            //            'rewrite' => array('slug' => 'dich-vu-noi-troi'),
            ////            'supports' => array( 'title','editor', 'custom-fields' ),
            //            'menu_icon' => 'dashicons-admin-post',
            //            'show_in_rest'       => true, 
            "excerpt" => true,
            'menu_icon' => 'dashicons-admin-post',
            'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
            'publicly_queryable' => true,  // you should be able to query it
            'show_ui' => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
            'has_archive' => true,  // it shouldn't have archive page
            // 'rewrite' => array('slug' => get_field('service_link','options')),
            'supports' => array('title', 'custom-fields', 'thumbnail', 'editor'),
        )
    );
    register_post_type(
        'recruitment',
        array(
            'labels' => array(
                'name' => __('Recruitment'),
                'singular_name' => __('recruitment')
            ),
            //            'public' => true,
            //            'has_archive' => true,
            //            'rewrite' => array('slug' => 'dich-vu-noi-troi'),
            ////            'supports' => array( 'title','editor', 'custom-fields' ),
            //            'menu_icon' => 'dashicons-admin-post',
            //            'show_in_rest'       => true, 
            "excerpt" => true,
            'menu_icon' => 'dashicons-admin-post',
            'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
            'publicly_queryable' => true,  // you should be able to query it
            'show_ui' => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
            'has_archive' => true,  // it shouldn't have archive page
            'position' => array('slug' => get_field('testimonial_position')),
            'supports' => array('title', 'custom-fields', 'thumbnail', 'editor'),
        )
    );
    // register_post_type(
    //     'treatment',
    //     array(
    //         'labels' => array(
    //             'name' => __('Bệnh điều trị'),
    //             'singular_name' => __('treatment')
    //         ),
    //         //            'public' => true,
    //         //            'has_archive' => true,
    //         //            'rewrite' => array('slug' => 'dich-vu-noi-troi'),
    //         ////            'supports' => array( 'title','editor', 'custom-fields' ),
    //         //            'menu_icon' => 'dashicons-admin-post',
    //         //            'show_in_rest'       => true, 
    //         "excerpt" => true,
    //         'menu_icon' => 'dashicons-admin-post',
    //         'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
    //         'publicly_queryable' => true,  // you should be able to query it
    //         'show_ui' => true,  // you should be able to edit it in wp-admin
    //         'exclude_from_search' => true,  // you should exclude it from search results
    //         'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
    //         'has_archive' => true,  // it shouldn't have archive page
    //         'position' => array('slug' => get_field('testimonial_position')),
    //         'supports' => array('title', 'custom-fields', 'thumbnail', 'editor'),
    //     )
    // );
}

add_action('init', 'create_customs_post_types');



add_filter('pll_get_post_types', 'add_cpt_to_pll', 10, 2);
function add_cpt_to_pll($post_types, $hide)
{
    if ($hide)
        // hides 'my_cpt' from the list of custom post types in Polylang settings
        unset($post_types['']);
    else
        // enables language and translation management for 'my_cpt'
        $post_types['people'] = 'people';
    $post_types['recruitment'] = 'recruitment';
    // $post_types['treatment'] = 'treatment';
    // $post_types['technologies'] = 'technologies';

    return $post_types;
}
// add_action('init', 'create_spa_keywords');



// function create_spa_keywords()
// {
//     register_taxonomy(
//         'services_category',
//         'services',
//         array(
//             'label'             => __('Service category', 'keywords'),
//             'hierarchical'      => true,
//             'show_ui'           => true,
//             'show_admin_column' => true,
//             'show_in_nav_menus' => true,
//             'show_tagcloud'     => true,
//             'public'            => true
//         )
//     );
// }

// register_taxonomy_for_object_type( 'services_category', 'services' );

add_action('init', 'create_news_category');

function create_news_category()
{
    register_taxonomy(
        'locations-category',
        'locations',
        array(
            'label'             => __('City', 'locations-category'),
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'public'            => true
        )
    );
}

// function wc_custom_category_add_tax_to_api() { 
//     $news_category = get_taxonomy( 'news-category' ); $news_category->show_in_rest = true; 
// } 
// add_action( 'init', 'wc_custom_category_add_tax_to_api', 30 );

add_filter('acf/fields/taxonomy/query', 'my_acf_fields_taxonomy_query', 10, 3);
function my_acf_fields_taxonomy_query($args, $field, $post_id)
{

    // Show 40 terms per AJAX call.
    $args['number'] = 40;

    // Order by most used.
    $args['orderby'] = 'count';
    $args['order'] = 'DESC';

    return $args;
}

add_filter('acf/load_field/name=block_title', function ($field) {
    $field['disabled'] = 1;
    return $field;
});
