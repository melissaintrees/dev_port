<?php
/**
 * Flexible Lite Theme Customizer.
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flexible_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'flexible_lite_customize_partial_blogname',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'flexible_lite_customize_partial_blogdescription',
    ) );

    /**
     * Register custom section types.
     *
     * @since 1.1.1
     */
    $wp_customize->register_section_type( 'Flexible_Lite_Customize_Section_Upsell' );

    /**
     * Register theme upsell sections.
     *
     * @since 1.1.1
     */
    $wp_customize->add_section( new Flexible_Lite_Customize_Section_Upsell(
        $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Flexible Pro', 'flexible-lite' ),
                'pro_text' => esc_html__( 'Buy Pro', 'flexible-lite' ),
                'pro_url'  => 'https://mysterythemes.com/wp-themes/flexible-pro/',
                'priority'  => 1,
            )
        )
    );

}
add_action( 'customize_register', 'flexible_lite_customize_register' );

/*--------------------------------------------------------------------------------------------------------------*/
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flexible_lite_customize_preview_js() {
	wp_enqueue_script( 'flexible_lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'flexible_lite_customize_preview_js' );

/*--------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 */
function flexible_lite_customize_backend_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
    wp_enqueue_style( 'flexible_lite_admin_customizer_style', get_template_directory_uri() . '/assets/css/customizer-style.css' );
    wp_enqueue_script( 'flexible_lite_admin_customizer', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'jquery', 'customize-controls' ), '20170124', true );
}
add_action( 'customize_controls_enqueue_scripts', 'flexible_lite_customize_backend_scripts', 10 );

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site title for the selective refresh partial.
 *
 * @since Flexible Lite 1.0.0
 * @see flexible_lite_customize_register()
 *
 * @return void
 */
function flexible_lite_customize_partial_blogname() {
    bloginfo( 'name' );
}

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site title for the selective refresh partial.
 *
 * @since Flexible Lite 1.0.0
 * @see flexible_lite_customize_register()
 *
 * @return void
 */
function flexible_lite_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Render the read more text at archive for the selective refresh partial.
 *
 * @since Flexible Lite 1.0.0
 * @see flexible_lite_design_settings_register()
 *
 * @return void
 */
function flexible_lite_customize_partial_archive_read_more() {
    bloginfo( 'flexible_lite_archive_read_more' );
}

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer panels
 */
require get_template_directory() . '/inc/customizer/general-panel.php'; // General Settings
require get_template_directory() . '/inc/customizer/header-panel.php'; // Header Settings
require get_template_directory() . '/inc/customizer/frontpage-panel.php'; // FrontPage Settings
require get_template_directory() . '/inc/customizer/design-panel.php'; // Design Settings
require get_template_directory() . '/inc/customizer/footer-panel.php'; // Footer Settings

/**
 * Load custom classes file.
 */
require get_template_directory() . '/inc/customizer/flexible-lite-custom-classes.php';

/**
 * Load sanitize file.
 */
require get_template_directory() . '/inc/customizer/flexible-lite-sanitize.php';
