<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_projects( $data ) {
  $testimonials = get_posts(array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
  ));

  $collection = [];

  foreach ($testimonials as $item) {

    $imageID = get_field('project-image', $item->ID);
    $desktopImageID = get_field('project_desktop_image', $item->ID);
    $object = (object) array(
      'id' => $item->ID,
      'name' => get_field('project-name', $item->ID),
      'image' => array(
        'small' => App::get_image_by_id($imageID, 'thumbnail'),
        'medium' => App::get_image_by_id($imageID, 'medium'),
        'large' => App::get_image_by_id($imageID, 'large'),
      ),
      'desktop_image' => array(
        'small' => App::get_image_by_id($desktopImageID, 'thumbnail'),
        'medium' => App::get_image_by_id($desktopImageID, 'medium'),
        'large' => App::get_image_by_id($desktopImageID, 'large'),
      ),
      'excerpt' => get_field('excerpt', $item->ID),
      'color' => get_field('project-color', $item->ID),
      'permalink' => get_permalink($item->ID),
    );

    array_push($collection, $object);

  }
  return $collection;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'api/v1', '/projects', array(
    'methods' => 'GET',
    'callback' => 'get_projects',
  ) );
} );


?>
