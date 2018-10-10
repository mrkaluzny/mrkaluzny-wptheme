<?php
// Register Custom Post Type
function portfolio_post_type() {
	$labels = array(
		'name'                  => _x( 'Portfolio', 'mrkaluzny' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'mrkaluzny' ),
		'menu_name'             => __( 'Portfolio', 'mrkaluzny' ),
		'name_admin_bar'        => __( 'Portfolio', 'mrkaluzny' ),
		'archives'              => __( 'Item Archives', 'mrkaluzny' ),
		'attributes'            => __( 'Item Attributes', 'mrkaluzny' ),
		'parent_item_colon'     => __( 'Parent Item:', 'mrkaluzny' ),
		'all_items'             => __( 'All Items', 'mrkaluzny' ),
		'add_new_item'          => __( 'Add New Item', 'mrkaluzny' ),
		'add_new'               => __( 'Add New', 'mrkaluzny' ),
		'new_item'              => __( 'New Item', 'mrkaluzny' ),
		'edit_item'             => __( 'Edit Item', 'mrkaluzny' ),
		'update_item'           => __( 'Update Item', 'mrkaluzny' ),
		'view_item'             => __( 'View Item', 'mrkaluzny' ),
		'view_items'            => __( 'View Items', 'mrkaluzny' ),
		'search_items'          => __( 'Search Item', 'mrkaluzny' ),
		'not_found'             => __( 'Not found', 'mrkaluzny' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mrkaluzny' ),
		'featured_image'        => __( 'Featured Image', 'mrkaluzny' ),
		'set_featured_image'    => __( 'Set featured image', 'mrkaluzny' ),
		'remove_featured_image' => __( 'Remove featured image', 'mrkaluzny' ),
		'use_featured_image'    => __( 'Use as featured image', 'mrkaluzny' ),
		'insert_into_item'      => __( 'Insert into item', 'mrkaluzny' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mrkaluzny' ),
		'items_list'            => __( 'Items list', 'mrkaluzny' ),
		'items_list_navigation' => __( 'Items list navigation', 'mrkaluzny' ),
		'filter_items_list'     => __( 'Filter items list', 'mrkaluzny' ),
	);
	$rewrite = array(
		'slug'                  => 'portfolio',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'mrkaluzny' ),
		'description'           => __( 'Portfolio Custom Post', 'mrkaluzny' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'project_type' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => 'portfolio',
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'portfolio_post_type', 0 );
?>
