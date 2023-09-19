<?php

if (!function_exists('theme_one_setup')) {
	function theme_one_setup()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		// add_theme_support(
		// 	'post-formats',
		// 	array(
		// 		'link',
		// 		'aside',
		// 		'gallery',
		// 		'image',
		// 		'quote',
		// 		'status',
		// 		'video',
		// 		'audio',
		// 		'chat',
		// 	)
		// );

		add_theme_support('post-thumbnails');

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu'),
				'bottom' => esc_html__('bottom menu'),
				'footer_column_1'  => esc_html__('Footer menu - column 1'),
				'footer_column_2'  => esc_html__('Footer menu - column 2'),
				'footer_column_3'  => esc_html__('Footer menu - column 3'),
			)
		);
		add_filter('upload_mimes', 'cc_mime_types');

		function cc_mime_types($mimes)
		{
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add custom editor font sizes.
		// add_theme_support(
		// 	'editor-font-sizes',
		// 	array(
		// 		array(
		// 			'name'      => esc_html__( 'Extra small' ),
		// 			'shortName' => esc_html_x( 'XS', 'Font size' ),
		// 			'size'      => 16,
		// 			'slug'      => 'extra-small',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Small' ),
		// 			'shortName' => esc_html_x( 'S', 'Font size' ),
		// 			'size'      => 18,
		// 			'slug'      => 'small',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Normal' ),
		// 			'shortName' => esc_html_x( 'M', 'Font size' ),
		// 			'size'      => 20,
		// 			'slug'      => 'normal',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Large' ),
		// 			'shortName' => esc_html_x( 'L', 'Font size' ),
		// 			'size'      => 24,
		// 			'slug'      => 'large',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Extra large' ),
		// 			'shortName' => esc_html_x( 'XL', 'Font size' ),
		// 			'size'      => 40,
		// 			'slug'      => 'extra-large',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Huge' ),
		// 			'shortName' => esc_html_x( 'XXL', 'Font size' ),
		// 			'size'      => 96,
		// 			'slug'      => 'huge',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Gigantic' ),
		// 			'shortName' => esc_html_x( 'XXXL', 'Font size' ),
		// 			'size'      => 144,
		// 			'slug'      => 'gigantic',
		// 		),
		// 	)
		// );

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');
	}
}
add_action('after_setup_theme', 'theme_one_setup');


add_action('admin_head', 'editor_custom_fonts');

function editor_custom_fonts()
{
	wp_enqueue_style('style-editor', get_template_directory_uri() . '/assets/css/style-editor.css');
}

function theme_one_scripts()
{

	$root_css = get_template_directory_uri() . '/assets/css/';
	$root_js = get_template_directory_uri() . '/assets/js/';

	wp_enqueue_style('swiper-bundle.min', $root_css . 'swiper-bundle.min.css');
	wp_enqueue_style('aos', $root_css . 'aos.css');
	wp_enqueue_style('style', get_template_directory_uri() .'/style.css');
	wp_enqueue_style('main', $root_css . 'main.css');
	wp_enqueue_style('vietnam-pro-font', 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;700&family=Rubik:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');

    wp_enqueue_script(
		'jquery1',
		$root_js . 'lib/jquery.min.js',
		array('jquery'),
		false,
		true
	);
 	wp_enqueue_script(
 		'swiper',
 		$root_js . 'lib/swiper-bundle.min.js',
 		array('jquery'),
 		false,
 		true
 	);
 	wp_enqueue_script(
 		'gasp',
 		$root_js . 'lib/gsap.min.js',
 		array('jquery'),
 		false,
 		true
 	);
 	wp_enqueue_script(
 		'aos',
 		$root_js . 'lib/aos.js',
 		array('jquery'),
 		false,
 		true
 	);
	 wp_enqueue_script(
	 	'ScrollTrigger',
	 	$root_js . 'lib/ScrollTrigger.min.js',
	 	array('jquery'),
	 	false,
	 	true
	 );
	 wp_enqueue_script(
	 	'ScrollToPlugin',
	 	$root_js . 'lib/ScrollToPlugin.min.js',
	 	array('jquery'),
	 	false,
	 	true
	 );

	wp_enqueue_script(
		'main-js',
		$root_js . 'all.js',
		array('jquery'),
		false,
		true
	);
	wp_localize_script('main-js', 'ajax', array(
		'url' => admin_url('admin-ajax.php'),
	));
}
add_action('wp_enqueue_scripts', 'theme_one_scripts');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
	show_admin_bar(false);
}

add_action('init', 'do_output_buffer');
function do_output_buffer()
{
	ob_start();
}


function pixelnet_bootstrap_pagination($wp_query = false, $echo = true, $args = array())
{
	//Fallback to $wp_query global variable if no query passed
	if (false === $wp_query) {
		global $wp_query;
	}

	//Set Defaults
	$defaults = array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'format'       => '?paged=%#%',
		'current'      => max(1, get_query_var('page')),
		'total'        => $wp_query->max_num_pages,
		'type'         => 'array',
		'show_all'     => false,
		'end_size'     => 2,
		'mid_size'     => 1,
		'prev_text'    => __('&larr;'),
		'next_text'    => __('&rarr;'),
		'add_fragment' => '',
	);

	//Merge the defaults with passed arguments
	$merged = wp_parse_args($args, $defaults);

	//Get the paginated links
	$lists = paginate_links($merged);

	if (is_array($lists)) {
		$current_page = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
		$html = '<nav class="navigation"><ul class="pagination justify-content-center pagination-lg">';

		foreach ($lists as $list) {
			$html .= '<li class="page-item' . (strpos($list, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link ', $list) . '</li>';
		}

		$html .= '</ul></nav>';

		if ($echo) {
			echo $html;
		} else {
			return $html;
		}
	}

	return false;
}



function bootstrap_pagination($wp_query = false, $echo = true, $args = array())
{
	if (null === $wp_query) {
		global $wp_query;
	}

	$add_args = [];

	//add query (GET) parameters to generated page URLs
	/*if (isset($_GET[ 'sort' ])) {
      $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
  }*/

	$pages = paginate_links(
		array_merge([
			'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
			'format'       => '?paged=%#%',
			'current'      => max(1, get_query_var('paged')),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __('&larr;'),
			'next_text'    => __('&rarr;'),
			'add_args'     => $add_args,
			'add_fragment' => ''
		], $args)
	);

	if (is_array($pages)) {
		//$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<div class="navigation"><ul class="pagination justify-content-center pagination-lg">';

		foreach ($pages as $page) {
			$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
		}

		$pagination .= '</ul></div>';

		if ($echo) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}

	return null;
}



// if( function_exists('acf_add_options_page') ) {

//   acf_add_options_page(array(
//     'page_title' 	=> 'Site General Settings',
//     'menu_title'	=> 'Site Settings',
//     'menu_slug' 	=> 'site-general-settings',
//     'capability'	=> 'edit_posts',
//     'redirect'		=> false
//   ));

// }

add_filter('wp_title', 'wpse104667_wp_title');
function wpse104667_wp_title($title)
{

	global $post;
	if (
		is_singular()
		&& !is_front_page()
		&& !is_home()
		&& !is_404()
		&& !is_tag()
	)
		$new_title = get_the_title($post->ID);
	return $new_title;
}


function remove_unused_image_size($sizes)
{
	unset($sizes['small']);
	unset($sizes['thumbnail']);
	unset($sizes['100x100']);
	//   unset( $sizes['medium']);
	unset($sizes['medium_large']);
	unset($sizes['post-thumbnail']);
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_unused_image_size');




function hstngr_register_widget()
{
	register_widget('feature_post');
}
add_action('widgets_init', 'hstngr_register_widget');
class feature_post extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			// widget ID
			'feature_post',
			// widget name
			__('Feature Post Widget', ' feature_post_domain'),
			// widget description
			array('description' => __('Hostinger Widget Tutorial', 'feature_post_domain'),)
		);
	}
	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		echo $args['before_widget'];
		//if title is present
		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];
		//output
		echo __('Greetings from Hostinger.com!', 'feature_post_domain');
		echo $args['after_widget'];
	}
	public function form($instance)
	{
		if (isset($instance['title']))
			$title = $instance['title'];
		else
			$title = __('Default Title', 'feature_post_domain');
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
<?php
	}
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}
}
