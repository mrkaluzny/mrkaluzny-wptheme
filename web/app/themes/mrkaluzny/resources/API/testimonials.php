<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_testimonials( $data ) {
  $testimonials = get_posts(array(
    'post_type' => 'opinie',
    'posts_per_page' => -1,
  ));

  $collection = [];

  foreach ($testimonials as $item) {

    $imageID = get_field('image', $item->ID);
    $object = (object) array(
      'id' => $itme->ID,
      'name' => $item->post_title,
      'image' => array(
        'small' => App::get_image_by_id($imageID, 'thumbnail'),
        'medium' => App::get_image_by_id($imageID, 'medium'),
      ),
      'position' => get_field('postion', $item->ID),
      'company' => get_field('company', $item->ID),
      'content' => $item->post_content,
    );

    array_push($collection, $object);

  }
  return $collection;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'api/v1', '/testimonials', array(
    'methods' => 'GET',
    'callback' => 'get_testimonials',
  ) );
} );


?>
