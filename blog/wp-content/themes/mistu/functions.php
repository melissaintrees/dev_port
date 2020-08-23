<?php
/**
 * mistu functions and definitions
 *
 * @package mistu
 */

if ( ! function_exists( 'mistu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mistu_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'mistu-normal-post' , 800, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'mistu' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mistu_custom_background_args', array(
		'default-color' => '404040',
		'default-image' => '',
	) ) );
}
endif; // mistu_setup
add_action( 'after_setup_theme', 'mistu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mistu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mistu_content_width', 800 );
}
add_action( 'after_setup_theme', 'mistu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mistu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mistu' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'mistu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mistu_scripts() {
	wp_enqueue_style( 'mistu-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	$query_args = array(
		'family' => 'Alegreya+Sans:300,400,700'
	);
	wp_enqueue_style( 'mistu-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'mistu-custom', get_template_directory_uri() . '/js/jquery.mistu.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'mistu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'mistu-sticky', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js', array('jquery'), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mistu_scripts' );

/**
 * Replace more Excerpt
 */
if ( ! function_exists( 'mistu_new_excerpt_more' ) ) {
	function mistu_new_excerpt_more($more) {
		if ( is_admin() ) {
			return $more;
		}
		return '&hellip;';
	}
}
add_filter('excerpt_more', 'mistu_new_excerpt_more');

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load mistu Dynamic.
 */
require get_template_directory() . '/inc/mistu-dynamic.php';

