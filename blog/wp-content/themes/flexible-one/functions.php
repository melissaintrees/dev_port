<?php
/**
 * Describe child theme functions
 *
 * @package Flexible Lite
 * @subpackage Flexible One
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'flexible_one_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flexible_one_setup() {

    $flexible_one_theme_info = wp_get_theme();
    $GLOBALS['flexible_one_version'] = $flexible_one_theme_info->get( 'Version' );
}
endif;

add_action( 'after_setup_theme', 'flexible_one_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the theme default color
 */
function flexible_one_customize_register( $wp_customize ) {
		global $wp_customize;

		$wp_customize->get_setting( 'flexible_lite_theme_color' )->default = '#08408E';

	}

add_action( 'customize_register', 'flexible_one_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'flexible_one_scripts', 20 );

function flexible_one_scripts() {
    
    global $flexible_one_version;
    
    wp_dequeue_style( 'flexible-lite-style' );
    wp_dequeue_style( 'flexible-lite-responsive' );
    
	wp_enqueue_style( 'flexible-lite-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $flexible_one_version ) );
    
    wp_enqueue_style( 'flexible-lite-parent-responsive', get_template_directory_uri() . '/assets/css/flexible-lite-responsive.css', array(), esc_attr( $flexible_one_version ) );
    
    wp_enqueue_style( 'flexible-one-style', get_stylesheet_uri(), array(), esc_attr( $flexible_one_version ) );
    
    $flexible_one_theme_color = esc_attr( get_theme_mod( 'flexible_lite_theme_color', '#08408E' ) );
    
    $output_css = '';
    
    $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.widget_search .search-submit,.widget_tag_cloud .tagcloud a:hover,.edit-link .post-edit-link,.reply .comment-reply-link,.home .nv-home-icon a,.nv-home-icon a:hover,#site-navigation ul li a:before,.nv-header-search-wrapper .search-form-main .search-submit,.ticker-caption,.comments-link:hover a,.news_vibrant_featured_slider .slider-posts .lSAction > a:hover,.news_vibrant_default_tabbed ul.widget-tabs li,.news_vibrant_default_tabbed ul.widget-tabs li.ui-tabs-active,.news_vibrant_default_tabbed ul.widget-tabs li:hover,.nv-block-title-nav-wrap .carousel-nav-action .carousel-controls:hover,.news_vibrant_social_media .social-link a,.news_vibrant_social_media .social-link a:hover,.nv-archive-more .nv-button:hover,.error404 .page-title,#nv-scrollup{ background: ". esc_attr( $flexible_one_theme_color ) ."}\n";
        
    $refine_output_css = flexible_one_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'flexible-one-style', $refine_output_css );
    
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'flexible_one_css_strip_whitespace' ) ) :
	function flexible_one_css_strip_whitespace( $css ) {
		$replace = array(
	        "#/\*.*?\*/#s" => "",  // Strip C style comments.
	        "#\s\s+#"      => " ", // Strip excess whitespace.
	    );
	    $search = array_keys( $replace );
	    $css = preg_replace( $search, $replace, $css );

	    $replace = array(
	        ": "  => ":",
	        "; "  => ";",
	        " {"  => "{",
	        " }"  => "}",
	        ", "  => ",",
	        "{ "  => "{",
	        ";}"  => "}", // Strip optional semicolons.
	        ",\n" => ",", // Don't wrap multiple selectors.
	        "\n}" => "}", // Don't wrap closing braces.
	        "} "  => "}\n", // Put each rule on it's own line.
	    );
	    $search = array_keys( $replace );
	    $css = str_replace( $search, $replace, $css );

	    return trim( $css );
	}
endif;