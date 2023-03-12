<?php
/*
 *  DP
 *  Custom functions, support, custom post types and more.
 */

if ( ! function_exists( 'dp_support' ) ) :
	function dp_support() {
		// Alignwide and alignfull classes in the block editor.
		add_theme_support( 'align-wide' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for responsive embedded content.
		// https://github.com/Wordpress/gutenberg/issues/26901
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enqueue editor styles.
		add_editor_style(
			array(
				'/assets/ponyfill.css',
			)
		);

		add_filter(
			'block_editor_settings_all',
			function( $settings ) {
				$settings['defaultBlockTemplate'] = '<!-- wp:group {"layout":{"inherit":true}} --><div class="wp-block-group"><!-- wp:post-content /--></div><!-- /wp:group -->';
				return $settings;
			}
		);

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'dp_support', 9 );

/**
 * Block Patterns.
 */
require get_template_directory() . '/inc/patterns.php';

// Add the child theme patterns if they exist.
if ( file_exists( get_stylesheet_directory() . '/inc/patterns.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/patterns.php';
}

// Include Woocommerce
if (class_exists('Woocommerce')) {
	require get_stylesheet_directory() . '/inc/woocommerce/functions.php';
}

/**
 * SVG WP Support
 * define( 'ALLOW_UNFILTERED_UPLOADS', true ); - need to add wp-config.php as well
 */
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Minify HTML
 */
// function pt_html_minify_start() {
// 	ob_start('pt_html_minyfy_finish');
// }

// function pt_html_minyfy_finish($html) {
// 	$html = preg_replace('/<!--(?!s*(?:[if [^]]+]|!|>))(?:(?!-->).)*-->/s', '', $html);
// 	$html = str_replace(array("\r\n", "\r", "\n", "\t"), '', $html);
// 	while (stristr($html, '  '))
// 		$html = str_replace('  ', ' ', $html);
// 	return $html;
// }

// if ( !is_admin()) {
// 	add_action('init', 'pt_html_minify_start');
// }

/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
	if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
		if ( array_key_exists( 'data-toggle', $atts ) ) {
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
		}
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );

// show featured images in dashboard
add_image_size( 'haizdesign-admin-post-featured-image', 120, 120, false );

// Add the posts and pages columns filter. They both use the same function.
add_filter('manage_posts_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);

// Add the column
function haizdesign_add_post_admin_thumbnail_column($haizdesign_columns){
	$haizdesign_columns['haizdesign_thumb'] = __('Featured Image');
	return $haizdesign_columns;
}

// Manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);

// Get featured-thumbnail size post thumbnail and display it
function haizdesign_show_post_thumbnail_column($haizdesign_columns, $haizdesign_id){
	switch($haizdesign_columns){
		case 'haizdesign_thumb':
		if( function_exists('the_post_thumbnail') ) {
			echo the_post_thumbnail( 'haizdesign-admin-post-featured-image' );
		}
		else
			echo 'hmm… your theme doesn\'t support featured image…';
		break;
	}
}

// Block Theme Support
function block_theme_features() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'block_theme_features');

/**
 * Register Gutenberg ACF Flex Blocks
 */
function acf_init_block_types() {
	// Check function exists.
	if( function_exists('acf_register_block_type') ) {
		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'flex-layouts',
			'title'             => __('DP ACF Blocks'),
			'description'       => __('DP ACF Flexible Blocks'),
			'render_template'   => 'templates/acf/acf.php',
			'mode'          	=> 'preview',
			'category'          => 'design',
			'icon'              => 'layout',
			'show_in_graphql' 	=> true,
			'keywords'          => array( 'flex', 'layouts' ),
			'supports'      	=> [
				'align'         => false,
				'anchor'        => true,
				'customClassName'   => true,
				'jsx'           => true,
			]
		));
	}
}
add_action('acf/init', 'acf_init_block_types');

/**
 * Post Edit Link New Tab
 */
add_filter( 'edit_post_link', function( $link, $post_id, $text ) {
	// Add the target attribute 
	if( false === strpos( $link, 'target=' ) )
		$link = str_replace( '<a ', '<a target="_blank" ', $link );
	return $link;
}, 10, 3 );

/**
* Rename default post type to news
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function news_rename_labels( $labels ) {
	
	# Labels
	$labels->name = 'Blog';
	$labels->singular_name = 'Blog';
	$labels->add_new = 'Add Post';
	$labels->add_new_item = 'Add Post';
	$labels->edit_item = 'Edit Post';
	$labels->new_item = 'New Post';
	$labels->view_item = 'View Post';
	$labels->view_items = 'View Post';
	$labels->search_items = 'Search Post';
	$labels->not_found = 'No Post found.';
	$labels->not_found_in_trash = 'No Post found in Trash.';
	$labels->parent_item_colon = 'Parent Post'; // Not for "post"
	$labels->archives = 'Post Archives';
	$labels->attributes = 'Post Attributes';
	$labels->insert_into_item = 'Insert into Post';
	$labels->uploaded_to_this_item = 'Uploaded to this Post';
	$labels->featured_image = 'Featured Image';
	$labels->set_featured_image = 'Set featured image';
	$labels->remove_featured_image = 'Remove featured image';
	$labels->use_featured_image = 'Use as featured image';
	$labels->filter_items_list = 'Filter Post list';
	$labels->items_list_navigation = 'Post list navigation';
	$labels->items_list = 'Post list';

	# Menu
	$labels->menu_name = 'Blog';
	$labels->all_items = 'All Posts';
	$labels->name_admin_bar = 'Blog';

	return $labels;
}

add_filter( 'post_type_labels_post', 'news_rename_labels' );

/**
 * Add site ID to footer for admins
 */
function dp_display_blog_id() {
	if ( current_user_can( 'administrator' ) ) {
		echo 'Site Id :' . get_current_blog_id();
	} else {
		return false;
	}
}
add_filter( 'update_footer', 'dp_display_blog_id', 11 );

/**
 * Add Thumbnail Theme Support
 */
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size('large', 700, '', true); // Large Thumbnail
	add_image_size('medium', 250, '', true); // Medium Thumbnail
	add_image_size('small', 120, '', true); // Small Thumbnail
	add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}

/**
 * Custom image sizes.
 *
 * @package dp
 */

// Register new image sizes.
add_image_size( 'small_square', 250, 250, true );
add_image_size( 'medium', 300, 200, true );
add_image_size( 'hd', 1280, 720, true );
add_image_size( 'medium_square', 500, 500, true );
add_image_size( 'full_hd', 1920, 1080, true );

/**
 * Register a new image size options to the list of selectable sizes in the Media Library
 */
function dp_custom_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'small_square'  => __( 'Small Square', 'dp' ),
			'medium'        => __( 'Medium', 'dp' ),
			'medium_square' => __( 'Medium Square', 'dp' ),
			'hd'            => __( 'HD', 'dp' ),
			'full_hd'       => __( 'Full HD', 'dp' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'dp_custom_image_sizes' );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'dp_setup' ) ) :
	function dp_setup() {

		load_theme_textdomain( 'dp', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1170, 0 );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
		add_theme_support( 'responsive-embeds' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Disable WooCommerce wizard redirect
		add_filter('woocommerce_enable_setup_wizard', '__return_false');
		add_filter('woocommerce_show_admin_notice', '__return_false');
		add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_false');
		
	}
	add_action( 'after_setup_theme', 'dp_setup' );
endif;

/**
 * Contact Form 7 custom Countries list select
 */
function cf7_select_countries($tag) {

	if ( $tag['name'] != 'cf7-countries' )
		return $tag;

	$countries = get_fields(795)['form_countries_list'];

	if (!empty($countries)):
		foreach($countries as $country):
			$country = $country['country'] . ' ';
			$tag['raw_values'][] = $country;
			$tag['labels'][] = $country;
		endforeach;
	endif;

	$pipes = new WPCF7_Pipes($tag['raw_values']);
	$tag['values'] = $pipes->collect_befores();
	$tag['pipes'] = $pipes;

	return $tag;
}

add_filter( 'wpcf7_form_tag', 'cf7_select_countries', 10, 2);

/**
 * Contact Form 7 custom Jobs list select
 */
function cf7_select_jobs($tag) {

	if ( $tag['name'] != 'cf7-jobs' )
		return $tag;

	//$jobs = get_fields(2526)['form_jobs_list'];
	//print_r($jobs);
	$jobs = get_fields('options')['form_jobs_list'];

	if (!empty($jobs)):

		foreach($jobs as $job):

			$job_title = $job['job'] . ' ';
			$job_item = $job_title;
			//print_r($job_item);

			$tag['raw_values'][] = $job_item;
			$tag['labels'][] = $job_item;

		endforeach;
	endif;

	$pipes = new WPCF7_Pipes($tag['raw_values']);
	$tag['values'] = $pipes->collect_befores();
	$tag['pipes'] = $pipes;

	return $tag;
}

add_filter( 'wpcf7_form_tag', 'cf7_select_jobs', 10, 2);

/**
 * Hide from admin menu
 */
function remove_item_from_menu() {
    //remove_menu_page( 'edit.php' ); // removes blog posts
    remove_menu_page( 'edit-comments.php' ); // removes comment menu
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // removes acf
}
add_action( 'admin_init', 'remove_item_from_menu' );

/**
 * Remove <title> meta tag and keep Yoast SEO <title> tag
 */
function custom_remove_title_tag() {
    remove_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'custom_remove_title_tag', 10000 );

/**
 * Remove rel=shortlink WP head
 */
function remove_redundant_shortlink() {
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}
add_filter('after_setup_theme', 'remove_redundant_shortlink');

/**
 * Remove xmlrpc WP head
 */
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');

