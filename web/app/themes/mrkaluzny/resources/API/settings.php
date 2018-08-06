<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function fetch_settings_values( $data ) {
  $fields = ['availability_status', 'availability_content'];
  $settings = (object) array(
      'availability' => (object) array(
        'status' => get_field($fields[0], 'options'),
        'content' => get_field($fields[1], 'options')
      ),
    );
  return $settings;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'api/v1', '/settings', array(
    'methods' => 'GET',
    'callback' => 'fetch_settings_values',
  ) );
} );


?>
