<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function fetch_project_types( $data ) {
  $terms = get_terms( 'project_type', array(
    'hide_empty' => false,
  ) );

  return $terms;
}

function fetch_industries( $data ) {
  $terms = get_terms( 'industry', array(
    'hide_empty' => false,
  ) );

  return $terms;
}

function fetch_categories( $data ) {
  $terms = get_categories();

  return $terms;
}


  register_rest_route( 'api/v1', '/filters/project_type', array(
    'methods' => 'GET',
    'callback' => 'fetch_project_types',
  ) );

  register_rest_route( 'api/v1', '/filters/industry', array(
    'methods' => 'GET',
    'callback' => 'fetch_industries',
  ) );

  register_rest_route( 'api/v1', '/filters/category', array(
    'methods' => 'GET',
    'callback' => 'fetch_categories',
  ) );



?>
