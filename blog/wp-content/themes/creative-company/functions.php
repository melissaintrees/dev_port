<?php
/**
 * creative_company functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creative-company
 */

if ( ! function_exists( 'creative_company_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function creative_company_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on creative-company, use a find and replace
		 * to change 'creative-company' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'creative-company');

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
		add_image_size( 'creative_company_360_280', 360, 280, true ); 
		add_image_size( 'creative_company_360_250', 360, 250, true ); 

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'creative-company' ),
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


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'creative_company_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 100,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'creative_company_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creative_company_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creative_company_content_width', 640 );
}
add_action( 'after_setup_theme', 'creative_company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creative_company_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer ', 'creative-company' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="col-md-3 col-sm-3 col-xs-12"><div class="single-footer">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2><i class="fa fa-cogs" aria-hidden="true"></i>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Pricing Table', 'creative-company' ),
		'id'            => 'pricing-table',
		'description'   => esc_html__( 'Add widgets here.', 'creative-company' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Google Map', 'creative-company' ),
		'id'            => 'map',
		'description'   => esc_html__( 'Use HTML Widget.', 'creative-company' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'creative_company_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creative_company_scripts() {

	wp_enqueue_style( 'creative_company_fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri(). '/css/slicknav.min.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri(). '/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'carousel', get_template_directory_uri(). '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri(). '/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'creative-company-animate', get_template_directory_uri(). '/css/animate.min.css' );
	wp_enqueue_style( 'creative-company-animate_text', get_template_directory_uri(). '/css/animate-text.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri(). '/css/magnific-popup.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css/font-awesome.min.css' );
	wp_enqueue_style( 'normalize', get_template_directory_uri(). '/css/normalize.css' );
	wp_enqueue_style( 'creative-company-color1', get_template_directory_uri(). '/css/color/color1.css' );
	wp_enqueue_style( 'creative-company-style', get_template_directory_uri(). '/style.css' );
	wp_enqueue_style( 'creative-company-responsive', get_template_directory_uri(). '/css/responsive.css' );
	
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'creative-company-nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '3.0.0', true );
	wp_enqueue_script( 'creative-company-scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.js', array('jquery'), '2.4.1', true );
	wp_enqueue_script( 'creative-company-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '1.0.10', true );
	wp_enqueue_script( 'creative-company-waypoint', get_template_directory_uri() . '/js/waypoints.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'creative-company-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.3.0', true );
	wp_enqueue_script( 'creative_company_isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), '3.0.4', true );
	wp_enqueue_script( 'creative-company-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'creative-company-stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array('jquery'), '0.6.2', true );
	wp_enqueue_script( 'creative-company-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'creative-company-animate', get_template_directory_uri() . '/js/animate-text.js', array('jquery'), '1.1', true );
	wp_enqueue_script( 'creative-company-particles', get_template_directory_uri() . '/js/particles.js', array('jquery'), '2.0.0', true );
	wp_enqueue_script( 'creative-company-particles_code', get_template_directory_uri() . '/js/particle-code.js', array('jquery'), '2.0.0', true );
	wp_enqueue_script( 'creative-company-counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'creative-company-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.1', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creative_company_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

if ( ! function_exists( 'creative_company_simple_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     */
    function creative_company_simple_breadcrumb() {
        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );

    }

endif;

add_action( 'creative_company_breadcrumb', 'creative_company_simple_breadcrumb', 10 );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/** creative category **/
function creative_company_category_lists(){
  $category 	=	get_categories();
  $cat_list 	=	array();
  $cat_list[0]=	esc_html__('Select category','creative-company');
  foreach ($category as $cat) {
     $cat_list[$cat->cat_ID]	=	$cat->name;
  }
 return $cat_list;
}
/*
 * custom pagination with bootstrap .pagination class
 * source: http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/
 */
function creative_company_pagination( $echo = true ) {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'   => true,
			'prev_text'    => __('Prev','creative-company'),
			'next_text'    => __('Next','creative-company'),
			
		)
	);

	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination = '<ul class="pagination">';

		foreach ( $pages as $page ) {
			$pagination .= "<li>$page</li>";
		}

		$pagination .= '</ul>';

		if ( $echo ) {
			$pagination;
		} else {
			return $pagination;
		}
	}
}