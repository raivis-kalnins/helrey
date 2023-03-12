<?php
/**
 * Registers blank post types
 */
 
//////////////////////////////////////////////////////////////////
// Custom Post type Components - PHP Templates + Shortcodes
//////////////////////////////////////////////////////////////////

function create_post_type_components() {

	register_taxonomy_for_object_type('category', 'components'); // Register Taxonomies for Category

	register_taxonomy_for_object_type('post_tag', 'components');

	register_post_type('components',
		array(
		'labels' => array(
			'name' => __('Components', 'dp'),
			'singular_name' => __('component', 'dp'),
			'add_new' => __('Add New', 'dp'),
			'add_new_item' => __('Add New component Post', 'dp'),
			'edit' => __('Edit', 'dp'),
			'edit_item' => __('Edit component Post', 'dp'),
			'new_item' => __('New component Post', 'dp'),
			'view' => __('View component Post', 'dp'),
			'view_item' => __('View component Post', 'dp'),
			'search_items' => __('Search component Post', 'dp'),
			'not_found' => __('No component Posts found', 'dp'),
			'not_found_in_trash' => __('No component Posts found in Trash', 'dp')
		),
		'hierarchical' => true,
		'publicly_queryable' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		//'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'supports' => array('title','editor','thumbnail'),
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array('post_tag','category')
	));
}
add_action('init', 'create_post_type_components');
 
//////////////////////////////////////////////////////////////////
// Custom Post type Sectors
//////////////////////////////////////////////////////////////////

function create_post_type_sectors() {

	register_taxonomy_for_object_type('category', 'sectors'); // Register Taxonomies for Category

	register_taxonomy_for_object_type('post_tag', 'sectors');

	register_post_type('sectors',
		array(
		'labels' => array(
			'name' => __('Sectors', 'dp'),
			'singular_name' => __('sector', 'dp'),
			'add_new' => __('Add New', 'dp'),
			'add_new_item' => __('Add New sector Post', 'dp'),
			'edit' => __('Edit', 'dp'),
			'edit_item' => __('Edit sector Post', 'dp'),
			'new_item' => __('New sector Post', 'dp'),
			'view' => __('View sector Post', 'dp'),
			'view_item' => __('View sector Post', 'dp'),
			'search_items' => __('Search sector Post', 'dp'),
			'not_found' => __('No sector Posts found', 'dp'),
			'not_found_in_trash' => __('No sector Posts found in Trash', 'dp')
		),
		'hierarchical' => true,
		'publicly_queryable' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		//'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'supports' => array('title','editor','thumbnail','revisions','author','excerpt','comments','page-attributes'),
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array('post_tag','category')
	));
}
//add_action('init', 'create_post_type_sectors');

//////////////////////////////////////////////////////////////////
// Custom Post type Jobs
//////////////////////////////////////////////////////////////////

function create_post_type_jobs() {

	register_taxonomy_for_object_type('category', 'jobs'); // Register Taxonomies for Category

	register_taxonomy_for_object_type('post_tag', 'jobs');

	register_post_type('jobs',
		array(
		'labels' => array(
			'name' => __('Jobs', 'dp'),
			'singular_name' => __('job', 'dp'),
			'add_new' => __('Add New', 'dp'),
			'add_new_item' => __('Add New job Post', 'dp'),
			'edit' => __('Edit', 'dp'),
			'edit_item' => __('Edit job Post', 'dp'),
			'new_item' => __('New job Post', 'dp'),
			'view' => __('View job Post', 'dp'),
			'view_item' => __('View job Post', 'dp'),
			'search_items' => __('Search job Post', 'dp'),
			'not_found' => __('No job Posts found', 'dp'),
			'not_found_in_trash' => __('No job Posts found in Trash', 'dp')
		),
		'hierarchical' => true,
		'publicly_queryable' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		//'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'supports' => array('title','editor','thumbnail','revisions','author','excerpt','comments','page-attributes'),
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array('post_tag','category')
	));
}
//add_action('init', 'create_post_type_jobs');
