<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_recent_articles( $data ) {
  $articles = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
  ));

  $collection = [];

  foreach ($articles as $item) {

    $imageID = get_post_thumbnail_id($item->ID);
    $object = (object) array(
      'id' => $item->ID,
      'title' => $item->post_title,
      'image' => array(
        'small' => App::get_image_by_id($imageID, 'thumbnail'),
        'medium' => App::get_image_by_id($imageID, 'medium'),
        'large' => App::get_image_by_id($imageID, 'large'),
      ),
      'excerpt' => wp_trim_words($item->post_content, 40, '...'),
      'permalink' => get_permalink($item->ID),
    );

    array_push($collection, $object);

  }
  return $collection;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'api/v1', '/recent-articles', array(
    'methods' => 'GET',
    'callback' => 'get_recent_articles',
  ) );
} );


?>
