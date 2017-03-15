<?php
/**
 * mrkaluzny functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mrkaluzny
 */

if ( ! function_exists( 'mrkaluzny_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mrkaluzny_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mrkaluzny, use a find and replace
	 * to change 'mrkaluzny' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mrkaluzny', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'cover-img', 1920, 1080);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mrkaluzny' ),
		'footersm' => esc_html__( 'Social Media', 'mrkaluzny' ),
		'footeruse' => esc_html__( 'Useful Links', 'mrkaluzny' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mrkaluzny_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mrkaluzny_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mrkaluzny_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mrkaluzny_content_width', 640 );
}
add_action( 'after_setup_theme', 'mrkaluzny_content_width', 0 );

function opinie_post_type() {

	$labels = array(
		'name'                  => _x( 'Opinie', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Opinia', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Opinie', 'text_domain' ),
		'name_admin_bar'        => __( 'Opinia', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Product:', 'text_domain' ),
		'all_items'             => __( 'Wszystkie opinie', 'text_domain' ),
		'add_new_item'          => __( 'Dodaj opinię', 'text_domain' ),
		'add_new'               => __( 'Nowa opinia', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edytuj opinię', 'text_domain' ),
		'update_item'           => __( 'Uaktualnij opinię', 'text_domain' ),
		'view_item'             => __( 'Zobacz opinię', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search products', 'text_domain' ),
		'not_found'             => __( 'No products found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No products found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Opinia', 'text_domain' ),
		'description'           => __( 'Opinie klientów', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'							=> 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => 'opinie',
		'capability_type'       => 'page',
	);

	$labels = array(
    'name'              => _x( 'Kategorie Opinii', 'taxonomy general name' ),
    'singular_name'     => _x( 'Kategoria  Opinii', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Project Categories' ),
    'all_items'         => __( 'All Project Categories' ),
    'parent_item'       => __( 'Parent Project Category' ),
    'parent_item_colon' => __( 'Parent Project Category:' ),
    'edit_item'         => __( 'Edit Project Category' ),
    'update_item'       => __( 'Update Project Category' ),
    'add_new_item'      => __( 'Add New Project Category' ),
    'new_item_name'     => __( 'New Project Category' ),
    'menu_name'         => __( 'Kategorie Opinii' ),
  );
  $tax = array(
    'labels' => $labels,
    'hierarchical' => true,
		'show_ui' => true,
  );

	register_post_type( 'opinie', $args );
	register_taxonomy( 'opinie_category', 'opinie', $tax);

}
add_action( 'init', 'opinie_post_type', 0 );


// Register Custom Post Type
function services_post_type() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Services Item', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Services', 'text_domain' ),
		'name_admin_bar'        => __( 'Services Item', 'text_domain' ),
		'archives'              => __( 'Archive', 'text_domain' ),
		'attributes'            => __( 'Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Usługa nadrzędna', 'text_domain' ),
		'all_items'             => __( 'All Services', 'text_domain' ),
		'add_new_item'          => __( 'Add New Services Item', 'text_domain' ),
		'add_new'               => __( 'New Services Item', 'text_domain' ),
		'new_item'              => __( 'Nowa rzecz', 'text_domain' ),
		'edit_item'             => __( 'Edytuj usługę', 'text_domain' ),
		'update_item'           => __( 'Uaktualnij usługę', 'text_domain' ),
		'view_item'             => __( 'Zobacz usługę', 'text_domain' ),
		'view_items'            => __( 'Zobacz usługi', 'text_domain' ),
		'search_items'          => __( 'Wyszukaj usługę', 'text_domain' ),
		'not_found'             => __( 'Services Not Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nie znaleziono usług w koszu', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'uslugi',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Service', 'text_domain' ),
		'description'           => __( 'Services', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => 'services',
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'services', $args );

}
add_action( 'init', 'services_post_type', 0 );

// Register Custom Post Type
function portfolio_custom_post() {

	$labels = array(
		'name'                  => _x( 'Portfolio Items', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portfolio', 'text_domain' ),
		'name_admin_bar'        => __( 'Portfolio', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'portfolio',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'text_domain' ),
		'description'           => __( 'Portfolio Custom Post', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'f115',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'post_type', $args );

}
add_action( 'init', 'portfolio_custom_post', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mrkaluzny_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mrkaluzny' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mrkaluzny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mrkaluzny_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mrkaluzny_scripts() {
	wp_enqueue_style( 'mrkaluzny-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mrkaluzny-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.min.js', array(), '20151215', true );

	wp_enqueue_script( 'vendor-js', get_template_directory_uri() . '/js/vendors.min.js', array(), '20151215', true );

	wp_enqueue_script( 'mrkaluzny-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mrkaluzny_scripts' );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
