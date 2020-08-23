<?php
/**
 * Define sections for header settings
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

add_action( 'customize_register', 'flexible_lite_header_settings_register' );

if( ! function_exists( 'flexible_lite_header_settings_register' ) ) :
function flexible_lite_header_settings_register( $wp_customize ) {

    /**
     * Add Header Settings Panel
     */
    $wp_customize->add_panel( 
        'flexible_lite_header_settings_panel', 
        array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Header Settings', 'flexible-lite' ),
        ) 
    );
/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Header Style
     */
    $wp_customize->add_section(
        'flexible_lite_header_section',
        array(
            'title'     => __( 'Header Extra Options', 'flexible-lite' ),
            'priority'  => 50,
            'panel'     => 'flexible_lite_header_settings_panel'
        )
    );

    /**
     * Switch option for menu sticky
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_header_sticky',
        array(
            'default' => 'show',
            'transport' => 'postMessage',
            'sanitize_callback' => 'flexible_lite_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Switch_Control(
        $wp_customize, 
            'flexible_lite_header_sticky', 
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Sticky Header Option', 'flexible-lite' ),
                'description'   => esc_html__( 'Enable/Disable header section sticky features.', 'flexible-lite' ),
                'section'   => 'flexible_lite_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Enable', 'flexible-lite' ),
                    'hide'  => esc_html__( 'Disable', 'flexible-lite' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Switch option for header search
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_header_search',
        array(
            'default' => 'show',
            'sanitize_callback' => 'flexible_lite_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Switch_Control(
        $wp_customize, 
            'flexible_lite_header_search', 
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Search Icon', 'flexible-lite' ),
                'description'   => esc_html__( 'Show/hide search icon at menu section.', 'flexible-lite' ),
                'section'   => 'flexible_lite_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'flexible-lite' ),
                    'hide'  => esc_html__( 'Hide', 'flexible-lite' )
                    ),
                'priority'  => 10,
            )
        )
    );
}
endif;