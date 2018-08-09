<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function inline_svg($file_name) {
      $src = get_template_directory_uri() . '/assets/icons/' . $file_name . '.svg';
      $image_item = '<img src="'. $src .'" alt="'. $file_name .'">';
      $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
      );

      return file_get_contents($src, false, stream_context_create($arrContextOptions));
    }

    public static function get_image_by_id($imageID, $size = "full") {
      $image = wp_get_attachment_image_src($imageID, $size);
      return $image[0];
    }

    public function get_services() {
      $services = get_posts(array(
        'post_type' => 'services',
        'posts_per_page' => -1,
      ));

      return $services;
    }
}
