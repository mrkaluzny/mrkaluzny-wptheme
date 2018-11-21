<?php
// Register Custom Taxonomy
function industry() {

$labels = array(
  'name'                       => _x( 'Industries', 'Taxonomy General Name', 'mrkaluzny' ),
  'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', 'mrkaluzny' ),
  'menu_name'                  => __( 'Industries', 'mrkaluzny' ),
  'all_items'                  => __( 'All Industries', 'mrkaluzny' ),
  'parent_item'                => __( 'Parent Item', 'mrkaluzny' ),
  'parent_item_colon'          => __( 'Parent Item:', 'mrkaluzny' ),
  'new_item_name'              => __( 'New Item Name', 'mrkaluzny' ),
  'add_new_item'               => __( 'Add New Item', 'mrkaluzny' ),
  'edit_item'                  => __( 'Edit Item', 'mrkaluzny' ),
  'update_item'                => __( 'Update Item', 'mrkaluzny' ),
  'view_item'                  => __( 'View Item', 'mrkaluzny' ),
  'separate_items_with_commas' => __( 'Separate items with commas', 'mrkaluzny' ),
  'add_or_remove_items'        => __( 'Add or remove items', 'mrkaluzny' ),
  'choose_from_most_used'      => __( 'Choose from the most used', 'mrkaluzny' ),
  'popular_items'              => __( 'Popular Items', 'mrkaluzny' ),
  'search_items'               => __( 'Search Items', 'mrkaluzny' ),
  'not_found'                  => __( 'Not Found', 'mrkaluzny' ),
  'no_terms'                   => __( 'No items', 'mrkaluzny' ),
  'items_list'                 => __( 'Items list', 'mrkaluzny' ),
  'items_list_navigation'      => __( 'Items list navigation', 'mrkaluzny' ),
);
$args = array(
  'labels'                     => $labels,
  'hierarchical'               => true,
  'public'                     => true,
  'show_ui'                    => true,
  'show_admin_column'          => true,
  'show_in_nav_menus'          => true,
  'show_tagcloud'              => true,
  'show_in_rest'               => true,
  'rest_base'                  => 'industry',
);
register_taxonomy( 'industry', array( 'portfolio' ), $args );

}
add_action( 'init', 'industry', 0 );
?>
