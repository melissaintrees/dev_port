<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */
function flexible_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'flexible-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'flexible-lite' ),
		'id'            => 'flexible-lite-sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widgets Area', 'flexible-lite' ),
		'id'            => 'flexible-lite-frontpage-widget-area',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column First', 'flexible-lite' ),
		'id'            => 'flexible-lite-footer-column-first',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column Second', 'flexible-lite' ),
		'id'            => 'flexible-lite-footer-column-second',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column Third', 'flexible-lite' ),
		'id'            => 'flexible-lite-footer-column-third',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column Forth', 'flexible-lite' ),
		'id'            => 'flexible-lite-footer-column-forth',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'flexible_lite_widgets_init' );

/**
 * Register Widget class
 */
add_action( 'widgets_init', 'flexible_lite_register_widgets' );

function flexible_lite_register_widgets() {

	//Contact US
    register_widget( 'Flexible_Lite_Contact_Us' );

    //About Us
    register_widget( 'Flexible_Lite_About_Page' );

    //CTA
    register_widget( 'Flexible_Lite_Cta' );

    //Latest News
    register_widget( 'Flexible_Lite_Latest_News' );

    //Portfolio
    register_widget( 'Flexible_Lite_Portfolio_Section' );

    //Service
    register_widget( 'Flexible_Lite_Services_Section' );

    //Sponsor
    register_widget( 'Flexible_Lite_Sponsors' );

    //Testimonials
    register_widget( 'Flexible_Lite_Testimonials_Section' );
}

/**
 * Load flexible lite required widgets
 */
require get_template_directory() . '/inc/widgets/flexible-lite-widget-fields.php';
require get_template_directory() . '/inc/widgets/flexible-lite-about-page.php';
require get_template_directory() . '/inc/widgets/flexible-lite-services.php';
require get_template_directory() . '/inc/widgets/flexible-lite-portfolios.php';
require get_template_directory() . '/inc/widgets/flexible-lite-testimonials.php';
require get_template_directory() . '/inc/widgets/flexible-lite-cta.php';
require get_template_directory() . '/inc/widgets/flexible-lite-latest-news.php';
require get_template_directory() . '/inc/widgets/flexible-lite-sponsors.php';
require get_template_directory() . '/inc/widgets/flexible-lite-contact-us.php';
