<?php
function services_post_type() {
	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'mrkaluzny' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'mrkaluzny' ),
		'menu_name'             => __( 'Services', 'mrkaluzny' ),
		'name_admin_bar'        => __( 'Services', 'mrkaluzny' ),
		'archives'              => __( 'Service Archives', 'mrkaluzny' ),
		'attributes'            => __( 'Service Attributes', 'mrkaluzny' ),
		'parent_item_colon'     => __( 'Parent Service:', 'mrkaluzny' ),
		'all_items'             => __( 'All Services', 'mrkaluzny' ),
		'add_new_item'          => __( 'Add New Service', 'mrkaluzny' ),
		'add_new'               => __( 'Add New Service', 'mrkaluzny' ),
		'new_item'              => __( 'New Service', 'mrkaluzny' ),
		'edit_item'             => __( 'Edit Service', 'mrkaluzny' ),
		'update_item'           => __( 'Update Service', 'mrkaluzny' ),
		'view_item'             => __( 'View Service', 'mrkaluzny' ),
		'view_items'            => __( 'View Services', 'mrkaluzny' ),
		'search_items'          => __( 'Search Services Item', 'mrkaluzny' ),
		'not_found'             => __( 'Not found', 'mrkaluzny' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mrkaluzny' ),
		'featured_image'        => __( 'Featured Image', 'mrkaluzny' ),
		'set_featured_image'    => __( 'Set featured image', 'mrkaluzny' ),
		'remove_featured_image' => __( 'Remove featured image', 'mrkaluzny' ),
		'use_featured_image'    => __( 'Use as featured image', 'mrkaluzny' ),
		'insert_into_item'      => __( 'Insert into item', 'mrkaluzny' ),
		'uploaded_to_this_item' => __( 'Uploaded to this services Item', 'mrkaluzny' ),
		'items_list'            => __( 'Services list', 'mrkaluzny' ),
		'items_list_navigation' => __( 'Services list navigation', 'mrkaluzny' ),
		'filter_items_list'     => __( 'Filter services list', 'mrkaluzny' ),
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Services', 'mrkaluzny' ),
		'description'           => __( 'Services for the website', 'mrkaluzny' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-code',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'services',
		'rest_controller_class' => 'WP_REST_Services_Controller',
	);
	register_post_type( 'services', $args );
}
add_action( 'init', 'services_post_type', 0 );
?>
