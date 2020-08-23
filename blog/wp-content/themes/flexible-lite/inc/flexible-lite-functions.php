<?php
/**
 * Define some custom function for flexible lite themes.
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */
/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles for admin
 */
add_action( 'admin_enqueue_scripts', 'flexible_lite_admin_scripts' );

function flexible_lite_admin_scripts( $hook ) {

	if( 'widgets.php' != $hook ) {
		return;
	}
	
	if ( function_exists( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
	}

	wp_enqueue_style( 'flexible-lite-admin-styles', get_template_directory_uri() . '/assets/css/admin-styles.css', array(), '1.0.0' );
	wp_enqueue_script( 'flexible-lite-admin-scripts', get_template_directory_uri() . '/assets/js/admin-scripts.js', array('jquery'), '1.0.0', true );
}
/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */
function flexible_lite_scripts() {

	global $flexible_lite_version;

	$query_args = array(
            'family' => 'Roboto:400,300,400i,500,700,700i,500i,900&subset=latin,latin-ext',
        );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'flexible-lite-google-font', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
    
	wp_enqueue_style( 'flexible-lite-style', get_stylesheet_uri(), array(), esc_attr( $flexible_lite_version ) );

	wp_enqueue_style( 'flexible-lite-responsive', get_template_directory_uri() . '/assets/css/flexible-lite-responsive.css');

	wp_enqueue_script( 'bxSlider', get_template_directory_uri() .'/assets/library/bxslider/jquery.bxslider.js', array( 'jquery' ), '4.1.2', true );

	wp_enqueue_script( 'flexible-lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'flexible-lite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery-nav', get_template_directory_uri() .'/assets/library/one-page-nav/jquery.nav.js', array('jquery'), '1.0.0' ,true );

	$header_sticky_option = get_theme_mod( 'flexible_lite_header_sticky', 'show' );
	if( $header_sticky_option == 'show' ) {
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() .'/assets/library/sticky/jquery.sticky.js', array('jquery'), '1.0.2' ,true );
		wp_enqueue_script( 'flexible-lite-sticky-setting', get_template_directory_uri() .'/assets/library/sticky/sticky-setting.js', array('jquery-sticky'), '1.0.0' ,true );
	}

	wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() .'/assets/library/jquery-parallax/jquery.parallax-1.1.3.js', array('jquery'), '1.1.3' ,true );	

	wp_enqueue_script( 'flexible-lite-custom-scripts', get_template_directory_uri() .'/assets/js/flexible-lite-custom.js', array( 'jquery', 'bxSlider' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flexible_lite_scripts' );

/*---------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'flexible_lite_the_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 */
	function flexible_lite_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Flexible Lite page dropdown
 */
$flexible_lite_pages = get_pages();
$flexible_lite_page_dropdown['0'] = __( 'Select Page', 'flexible-lite' );
foreach ( $flexible_lite_pages as $flexible_lite_page ) {
	$flexible_lite_page_dropdown[$flexible_lite_page->ID] = $flexible_lite_page->post_title;
}

/**
 * Flexible Lite category dropdown
 */
$flexible_lite_categories = get_categories( array( 'hide_empty' => 0 ) );
$flexible_lite_category_dropdown['0'] = __( 'Select Category', 'flexible-lite' );
foreach ( $flexible_lite_categories as $flexible_lite_category ) {
	$flexible_lite_category_dropdown[$flexible_lite_category->term_id] = $flexible_lite_category->cat_name;
}

/**
 * Flexible Lite category list
 */
$flexible_lite_cat_args = array(
            	'type'                     => 'post',
                'child_of'                 => 0,
            	'orderby'                  => 'name',
            	'order'                    => 'ASC',
            	'hide_empty'               => 1,
            	'taxonomy'                 => 'category',
            );
$flexible_lite_categories = get_categories( $flexible_lite_cat_args );
$flexible_lite_categories_lists = array();
foreach( $flexible_lite_categories as $category ) {
    $flexible_lite_categories_lists[$category->term_id] = $category->name;
}

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Flexible Lite homepage excerpt
 *
 * Filter the excerpt length to 150 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function flexible_lite_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'flexible_lite_excerpt_length', 999 );


/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Function define about page/post/archive sidebar
 */
if( ! function_exists( 'flexible_lite_get_sidebar' ) ):
function flexible_lite_get_sidebar() {
    global $post;
    if( $post ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'flexible_lite_page_sidebar', true );
    }
     
    if( is_home() ) {
        $front_id = get_option( 'page_for_posts' );
		$sidebar_meta_option = get_post_meta( $front_id, 'flexible_lite_page_sidebar', true );
    }
    
    if( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
        $sidebar_meta_option = 'default_sidebar';
    }
    
    $flexible_lite_archive_sidebar = get_theme_mod( 'flexible_lite_archive_sidebar', 'right_sidebar' );
    $flexible_lite_post_default_sidebar = get_theme_mod( 'flexible_lite_default_post_sidebar', 'right_sidebar' );
    $flexible_lite_page_default_sidebar = get_theme_mod( 'flexible_lite_default_page_sidebar', 'right_sidebar' );
    
    if( $sidebar_meta_option == 'default_sidebar' ) {
        if( is_single() ) {
            if( $flexible_lite_post_default_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif( $flexible_lite_post_default_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif( is_page() ) {
            if( $flexible_lite_page_default_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif( $flexible_lite_page_default_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif( $flexible_lite_archive_sidebar == 'right_sidebar' ) {
            get_sidebar();
        } elseif( $flexible_lite_archive_sidebar == 'left_sidebar' ) {
            get_sidebar( 'left' );
        }
    } elseif( $sidebar_meta_option == 'right_sidebar' ) {
        get_sidebar();
    } elseif( $sidebar_meta_option == 'left_sidebar' ) {
        get_sidebar( 'left' );
    }
}
endif;

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Social media function
 */

if( !function_exists( 'flexible_lite_social_media' ) ):
	function flexible_lite_social_media() {

		$social_section_option = get_theme_mod( 'flexible_lite_social_option', 0 );

		$social_fb = get_theme_mod( 'flexible_lite_fb_link', '' );
		$social_tw = get_theme_mod( 'flexible_lite_tw_link', '' );
		$social_gp = get_theme_mod( 'flexible_lite_gp_link', '' );
		$social_lnk = get_theme_mod( 'flexible_lite_lnk_link', '' );
		$social_yt = get_theme_mod( 'flexible_lite_yt_link', '' );
		$social_vm = get_theme_mod( 'flexible_lite_vm_link', '' );
		$social_pin = get_theme_mod( 'flexible_lite_pin_link', '' );
		$social_insta = get_theme_mod( 'flexible_lite_insta_link', '' );
		if( $social_section_option != 1 ) {
?>
			<div class="right-section">
	            <?php if( !empty( $social_fb ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_fb ); ?>" target="_blank"><i class="fa  fa-facebook"></i></a></span><?php } ?>
	            <?php if( !empty( $social_tw ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_tw ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></span><?php } ?>
	            <?php if( !empty( $social_gp ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_gp ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></span><?php } ?>
	            <?php if( !empty( $social_lnk ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_lnk ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></span><?php } ?>
	            <?php if( !empty( $social_yt ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_yt ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></span><?php } ?>
	            <?php if( !empty( $social_vm ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_vm ); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></span><?php } ?>
	            <?php if( !empty( $social_pin ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_pin ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></span><?php } ?>
	            <?php if( !empty( $social_insta ) ){ ?><span class="social-link"><a href="<?php echo esc_url( $social_insta ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></span><?php } ?>
	        </div>
<?php
		}
	}
endif;