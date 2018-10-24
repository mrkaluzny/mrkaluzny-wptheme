<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */


function get_articles( $data ) {
   $articles = get_posts(array(
     'post_type' => 'post',
     'posts_per_page' => -1,
   ));

   $collection = [];

   foreach ($articles as $item) {

     $author = (object)array(
       'name' => get_author_name($item->post_author),
       'avatar' => get_avatar_url($item->post_author, array(
         'size' => 45,
       )),
     );

     $imageID = get_post_thumbnail_id($item->ID);
     $object = (object) array(
       'id' => $item->ID,
       'title' => $item->post_title,
       'author' => $author,
       'image' => array(
         'small' => App::get_image_by_id($imageID, 'thumbnail'),
         'medium' => App::get_image_by_id($imageID, 'medium'),
         'large' => App::get_image_by_id($imageID, 'large'),
       ),
       'categories' => get_the_terms($item->ID, 'category'),
       'published_on' => get_the_time('j F, Y', $item->ID),
       'time_to_read' => App::get_reading_time_for_string($item->post_content),
       'excerpt' => wp_trim_words($item->post_content, 40, '...'),
       'permalink' => get_permalink($item->ID),
     );

     array_push($collection, $object);

   }
   return $collection;
 }

 add_action( 'rest_api_init', function () {
   register_rest_route( 'api/v1', '/articles', array(
     'methods' => 'GET',
     'callback' => 'get_articles',
   ) );
 } );

function get_recent_articles( $data ) {
  $articles = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
  ));

  $collection = [];

  foreach ($articles as $item) {

    $author = (object)array(
      'name' => get_author_name($item->post_author),
      'avatar' => get_avatar_url($item->post_author, array(
        'size' => 45,
      )),
    );

    $imageID = get_post_thumbnail_id($item->ID);
    $object = (object) array(
      'id' => $item->ID,
      'title' => $item->post_title,
      'author' => $author,
      'image' => array(
        'small' => App::get_image_by_id($imageID, 'thumbnail'),
        'medium' => App::get_image_by_id($imageID, 'medium'),
        'large' => App::get_image_by_id($imageID, 'large'),
      ),
      'categories' => get_the_terms($item->ID, 'category'),
      'published_on' => get_the_time('j F, Y', $item->ID),
      'time_to_read' => App::get_reading_time_for_string($item->post_content),
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



function get_related_articles($data) {
  $articleID = $data['id'];
  $categories = get_the_category($articleID);
  $posts = get_posts(array(
    'post_type' => 'post',
    'orderby' => 'rand',
    'order'    => 'ASC',
    'posts_per_page' => 3,
    'suppress_filters' => false,
  ));

  if ($categories) {
    $categories_ids = array();
    foreach ($categories as $cat) {
      $catID = $cat->term_id;
      array_push($categories_ids, $catID);
    }

    $posts = get_posts(array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'suppress_filters' => false,
      'category' => $categories_ids,
      'post__not_in' => array($articleID),
    ));
  }

  if (!$categories || sizeof($posts) < 1) {
    $posts = get_posts(array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'suppress_filters' => false,
      'post__not_in' => array($articleID),
    ));
  }

  $collection = [];
  foreach($posts as $item) {
    $author = (object)array(
      'name' => get_author_name($item->post_author),
      'avatar' => get_avatar_url($item->post_author, array(
        'size' => 45,
      )),
    );

    $imageID = get_post_thumbnail_id($item->ID);
    $item = (object)array(
      'id' => $item->ID,
      'title' => $item->post_title,
      'author' => $author,
      'image' => array(
        'small' => App::get_image_by_id($imageID, 'thumbnail'),
        'medium' => App::get_image_by_id($imageID, 'medium'),
        'large' => App::get_image_by_id($imageID, 'large'),
      ),
      'categories' => get_the_terms($item->ID, 'category'),
      'published_on' => get_the_time('j F, Y', $item->ID),
      'time_to_read' => App::get_reading_time_for_string($item->post_content),
      'excerpt' => wp_trim_words($item->post_content, 40, '...'),
      'permalink' => get_permalink($item->ID),
    );

    array_push($collection, $item);
  };
  return $collection;
}


register_rest_route( 'api/v1', '/related_articles/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'get_related_articles',
    'args' => [
        'id'
    ],
  ) );


?>
