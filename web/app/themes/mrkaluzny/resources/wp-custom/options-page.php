<?php
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Availability Settings',
		'menu_title'	=> 'Availability',
		'parent_slug'	=> 'theme-general-settings',
    'post_id' => 'availability-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}
?>
