<?php

function get_menu($data) {
  $theme_location = 'primary';
  $locations = get_nav_menu_locations();
  $menu = get_term( $locations[$theme_location], 'nav_menu' );
  $menu_items = wp_get_nav_menu_items($menu->term_id);

  $result = array();

  foreach ($menu_items as $item) {

    if (!$item->menu_item_parent) {

      $children = null;
      $new_nav_item = prepare_menu_item($item, $children);
      array_push($result, $new_nav_item);

    } else {

      $child = prepare_menu_item($item, null);
      foreach($result as $search) {
        if ($search->id == $item->menu_item_parent) {
          if (gettype($search->children) == 'array') {
            array_push($search->children, $child);
          } else {
            $search->children = array($child);
          }
        }
      }
    }
  }

  return $result;
}


function prepare_menu_item($item, $children) {
  $new_nav_item = (object) array(
    'id' => $item->ID,
    'order' => $item->menu_order,
    'title' => $item->title,
    'url' => $item->url,
    'children' => $children,
  );

  return $new_nav_item;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'api/v1', '/main-menu', array(
    'methods' => 'GET',
    'callback' => 'get_menu',
  ) );
} );

?>
