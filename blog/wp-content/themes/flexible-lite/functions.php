<?php
/**
 * Flexible Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

if ( ! function_exists( 'flexible_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flexible_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on flexible-lite, use a find and replace
	 * to change 'flexible-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'flexible-lite', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
	   'height'      => 50,
	   'width'       => 320,
	   'flex-width' => true,
	) );

	/**
	 * Define custom image size
	 */
	add_image_size( 'flexible-lite-blog-thumb', 478, 316, true );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'flexible-lite' ),
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
	add_theme_support( 'custom-background', apply_filters( 'flexible_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

}
endif;
add_action( 'after_setup_theme', 'flexible_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flexible_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flexible_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'flexible_lite_content_width', 0 );

/**
 * Set the global variable about theme version
 *
 * @global int $flexible_lite_version
 * @since 1.0.7
 */
function flexible_lite_theme_version() {
	$flexible_lite_theme_info = wp_get_theme();
	$GLOBALS['flexible_lite_version'] = $flexible_lite_theme_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'flexible_lite_theme_version', 0 );

/**
 * Enables the Excerpt meta box in Page edit screen.
 *
 * @since 1.1.0
 */
function flexible_lite_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'flexible_lite_excerpt_support_for_pages' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Added custom functions.
 */
require get_template_directory() . '/inc/flexible-lite-functions.php';

/**
 * Added flexible lite hook functions.
 */
require get_template_directory() . '/inc/flexible-lite-hooks.php';

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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load related file for widgets
 */
require get_template_directory() . '/inc/widgets/flexible-lite-widgets.php';

/**
 * Load flexible lite metaboxes
 */
require get_template_directory() . '/inc/metabox/flexible-lite-page-metabox.php'; //page metabox
require get_template_directory() . '/inc/metabox/flexible-lite-post-metabox.php'; //post metabox

/**
 * Load theme about page
 */
require get_template_directory(). '/inc/about-theme/flexible-lite-about.php';