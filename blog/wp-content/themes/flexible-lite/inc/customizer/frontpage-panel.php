<?php
/**
 * Define customizer options/section for frontpage
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

add_action( 'customize_register', 'flexible_lite_frontpage_settings_register' );

function flexible_lite_frontpage_settings_register( $wp_customize ) {

  	/**
	 * Added frontpage panel
	 */
	$wp_customize->add_panel( 
    'flexible_lite_frontpage_settings_panel',
    array(
        'priority'       => 3,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'FrontPage Settings', 'flexible-lite' ),
        ) 
    );
/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Slider Section
     */    
    $wp_customize->add_section(
        'flexible_lite_slider_section',
        array(
            'title'     => __( 'Slider Settings', 'flexible-lite' ),
            'priority'  => 5,
            'panel'     => 'flexible_lite_frontpage_settings_panel',
        )
    );

    /**
     * Switch option for Slider Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_slider_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'flexible_lite_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Switch_Control(
        $wp_customize, 
            'flexible_lite_slider_option', 
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Slider Section Option', 'flexible-lite' ),
                'description'   => esc_html__( 'Show/hide option for frontpage slider.', 'flexible-lite' ),
                'section'   => 'flexible_lite_slider_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'flexible-lite' ),
                    'hide'  => esc_html__( 'Hide', 'flexible-lite' )
                    ),
                'priority'  => 5,
            )
        )
    );

    
    /** 
     * Slider Category
     * 
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_slider_cat_id',
        array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Category_Control( 
        $wp_customize,
        'flexible_lite_slider_cat_id', 
        array(
            'label' => __( 'Slider Category', 'flexible-lite' ),
            'description' => __( 'Select category for slider in homepage.', 'flexible-lite' ),
            'section' => 'flexible_lite_slider_section',
            'priority' => 10
            )
        )
    );

}//endfor