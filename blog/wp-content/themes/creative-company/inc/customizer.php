<?php
/**
 * creative-company Theme Customizer
 *
 * @package creative-company
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function creative_company_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Sanitization Callback

	require_once trailingslashit( get_template_directory() ) . '/inc/sanitize.php'; 

	 $creative_company_category_lists   = creative_company_category_lists();

	// Sanitization Callback

	require_once trailingslashit( get_template_directory() ) . '/inc/customizer-front.php'; 

	// Load Upgrade to Pro control.
	require_once trailingslashit( get_template_directory() ) . '/inc/upgrade/controls.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'Creative_Company_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Creative_Company_Customize_Section_Upsell(
			$wp_customize,
			'upsell',
			array(
				'title'    => esc_html__( 'Go Pro', 'creative-company' ),
				'pro_text' => esc_html__( 'Buy Creative Company Plus', 'creative-company' ),
				'pro_url'  => 'https://justwpthemes.com/downloads/creative-company-plus/',
				'priority' => 1,
			)
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'creative_company_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'creative_company_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'creative_company_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function creative_company_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function creative_company_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function creative_company_customize_preview_js() {
	wp_enqueue_script( 'creative-company-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'creative_company_customize_preview_js' );


function creative_company_customizer_control_scripts() {

	wp_enqueue_script( 'creative-company-customize-controls', get_template_directory_uri() . '/inc/upgrade/controls.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'creative-company-customize-controls', get_template_directory_uri() . '/inc/upgrade/controls.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'creative_company_customizer_control_scripts', 0 );
