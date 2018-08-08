<?php
function opinie_post_type() {
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'mrkaluzny' ),
		'singular_name'         => _x( 'Testimonials Item', 'Post Type Singular Name', 'mrkaluzny' ),
		'menu_name'             => __( 'Testimonials', 'mrkaluzny' ),
		'name_admin_bar'        => __( 'Testimonials', 'mrkaluzny' ),
		'archives'              => __( 'Item Archives', 'mrkaluzny' ),
		'attributes'            => __( 'Item Attributes', 'mrkaluzny' ),
		'parent_item_colon'     => __( 'Parent Product:', 'mrkaluzny' ),
		'all_items'             => __( 'Wszystkie opinie', 'mrkaluzny' ),
		'add_new_item'          => __( 'Dodaj opinię', 'mrkaluzny' ),
		'add_new'               => __( 'Nowa opinia', 'mrkaluzny' ),
		'new_item'              => __( 'New Item', 'mrkaluzny' ),
		'edit_item'             => __( 'Edytuj opinię', 'mrkaluzny' ),
		'update_item'           => __( 'Uaktualnij opinię', 'mrkaluzny' ),
		'view_item'             => __( 'Zobacz opinię', 'mrkaluzny' ),
		'view_items'            => __( 'View Items', 'mrkaluzny' ),
		'search_items'          => __( 'Search products', 'mrkaluzny' ),
		'not_found'             => __( 'No products found', 'mrkaluzny' ),
		'not_found_in_trash'    => __( 'No products found in Trash', 'mrkaluzny' ),
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
	$args = array(
		'label'                 => __( 'Testimonials', 'mrkaluzny' ),
		'description'           => __( 'Testimonials', 'mrkaluzny' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'							=> 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => 'testimonial',
		'capability_type'       => 'page',
    'show_in_rest'          => true,
    'rest_base'             => 'testimonial'
	);
	$labels = array(
    'name'              => _x( 'Kategorie Opinii', 'taxonomy general name' ),
    'singular_name'     => _x( 'Kategoria  Opinii', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Project Categories' ),
    'all_items'         => __( 'All Project Categories' ),
    'parent_item'       => __( 'Parent Project Category' ),
    'parent_item_colon' => __( 'Parent Project Category:' ),
    'edit_item'         => __( 'Edit Project Category' ),
    'update_item'       => __( 'Update Project Category' ),
    'add_new_item'      => __( 'Add New Project Category' ),
    'new_item_name'     => __( 'New Project Category' ),
    'menu_name'         => __( 'Kategorie Opinii' ),
  );
  $tax = array(
    'labels' => $labels,
    'hierarchical' => true,
		'show_ui' => true,
  );
	register_post_type( 'opinie', $args );
	register_taxonomy( 'opinie_category', 'opinie', $tax);
}
add_action( 'init', 'opinie_post_type', 0 );
?>
