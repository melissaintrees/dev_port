<?php
/**
 * Blog Writer functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Blog_Writer
 */

if ( ! function_exists( 'blog_writer_setup' ) ) :

	// Set the default content width.
		$GLOBALS['content_width'] = 1160;
		
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. The init hook is too late for some features, such as indicating support for post thumbnails.
	 */
	function blog_writer_setup() {
		// Make theme available for translation. Translations can be filed in the /languages/ directory. If you're building a theme based on Blog Writer, use a find and replace to change 'blog-writer' to the name of your theme in all the template files.
		load_theme_textdomain( 'blog-writer', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title. By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		
		// create recent posts thumbnails
		add_image_size( 'blog-writer-recent', 100, 75, true );
		
		// create small wp gallery thumbnails
		if( esc_attr(get_theme_mod( 'blog_writer_widget_gallery_thumbnails', false ) ) ) :
		add_image_size( 'blog-writer-widget-gallery', 100, 100, true );		
		endif;
		
		// create related post thumbnails
		if( esc_attr(get_theme_mod( 'blog_writer_related_post_thumbnails', false ) ) ) :
			add_image_size( 'blog-writer-related-posts', 225, 150, true );
		endif;	

		// create featured images for the default blog style
		if( esc_attr(get_theme_mod( 'blog_writer_default_thumbnails', false ) ) ) :
			add_image_size( 'blog-writer-default', 760, 440, true );
		endif;
				
		// create featured images for the grid blog style
		if( esc_attr(get_theme_mod( 'blog_writer_grid_thumbnails', false ) ) ) :
			add_image_size( 'blog-writer-grid', 660, 350, true );
		endif;			
		
		// create featured images for the centered blog style
		if( esc_attr(get_theme_mod( 'blog_writer_centered_thumbnails', false ) ) ) :
			add_image_size( 'blog-writer-centered', 1160, 600, true );
		endif;	

		// create featured images for the single post thumbnail
		if( esc_attr(get_theme_mod( 'blog_writer_singlepost_thumbnails', false ) ) ) :
			add_image_size( 'singlepost', 760, 500, true );
		endif;	

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'footer' => esc_html__( 'Footer', 'blog-writer' ),
			'primary' => esc_html__( 'Primary', 'blog-writer' ),
			'social' => esc_html__( 'Social', 'blog-writer' ),
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
				
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blog_writer_custom_background_args', array(
			'default-color' => '414347',
			'default-image' => false,
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// This theme styles the visual editor to resemble the theme style, specifically font, colors, and column width.
		add_editor_style( 'css/editor.css' );
		
		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'blog_writer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function blog_writer_content_width() {
	$content_width = $GLOBALS['content_width'];
	// Check if is single post and there is no sidebar.
	if ( is_active_sidebar( 'pageleft'  ) || is_active_sidebar( 'pageright' ) || is_active_sidebar( 'blogleft' ) || is_active_sidebar( 'blogright' ) ) {
		$content_width = 760;
	}	
  $GLOBALS['content_width'] = apply_filters( 'blog_writer_content_width', $content_width );
}
add_action( 'template_redirect', 'blog_writer_content_width', 0 );


/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function blog_writer_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'blog_writer_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function blog_writer_scripts() {
	
	// Stylesheets
	wp_enqueue_style( 'blog-writer-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'blog-writer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '2018', true );
		
	// Theme functions and navigation
	wp_enqueue_script( 'blog-writer-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2018', true );
	wp_localize_script( 'blog-writer-script', 'blogwriterscreenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'blog-writer' ),
		'collapse' => esc_html__( 'collapse child menu', 'blog-writer' ),
	) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blog_writer_scripts' );


// Include better comments file
require get_template_directory() .'/inc/comment-style.php';

// Theme info page class
require get_template_directory() . '/inc/theme-info/blog-writer-info-class-about.php';
	
// Theme Info Page
require get_template_directory() . '/inc/theme-info/blog-writer-info.php';

// Register recent posts widget
require get_template_directory() . '/inc/widgets/class-blog-writer-recent-posts-widget.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/sidebars.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load CSS overrides
require get_template_directory() . '/inc/inline-styles.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
