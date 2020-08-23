<?php
/**
 * Customizer function about design settings panel
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

add_action( 'customize_register', 'flexible_lite_design_settings_register' );

if( ! function_exists( 'flexible_lite_design_settings_register' ) ) :
function flexible_lite_design_settings_register( $wp_customize ) {

    // Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'Flexible_Lite_Customize_Control_Radio_Image' );

    /**
     * Add Design Settings Panel
     */

    $wp_customize->add_panel( 
    	'flexible_lite_design_settings_panel', 
	    array(
	        'priority'       => 3,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Design Settings', 'flexible-lite' ),
	    )
    );
/*---------------------------------------------------------------------------------------------------------------*/
	/**
     * Archive Settings
     */    
    $wp_customize->add_section(
        'flexible_lite_archive_section',
        array(
            'title'		=> __( 'Archive Settings', 'flexible-lite' ),
            'priority'  => 5,
            'panel'     => 'flexible_lite_design_settings_panel',
        )
    );

    /**
     * Field for Archive Sidebar images
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_archive_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Control_Radio_Image(
        $wp_customize,
        'flexible_lite_archive_sidebar',
            array(
                'label'    => esc_html__( 'Archive Sidebars', 'flexible-lite' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'flexible-lite' ),
                'section'  => 'flexible_lite_archive_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        ),
                        'no_sidebar_center' => array(
                            'label' => esc_html__( 'No Sidebar Center', 'flexible-lite' ),
                            'url'   => '%s/assets/images/no-sidebar-center.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    // archive read more button text
    $wp_customize->add_setting(
        'flexible_lite_archive_read_more',
        array(
            'default' => __( 'Read More', 'flexible-lite' ),
            'transport'=> 'postMessage',
            'sanitize_callback' => 'flexible_lite_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'flexible_lite_archive_read_more',
        array(
            'type' => 'text',
            'priority' => 7,
            'label' => __( 'Read More button label', 'flexible-lite' ),
            'section' => 'flexible_lite_archive_section'
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'flexible_lite_archive_read_more', 
            array(
                'selector' => 'article .post-readmore',
                'render_callback' => 'flexible_lite_customize_partial_archive_read_more',
            )
    );
/*---------------------------------------------------------------------------------------------------------------*/
	/**
     * Post Settings
     */    
    $wp_customize->add_section(
        'flexible_lite_post_section',
        array(
            'title'		=> __( 'Post Settings', 'flexible-lite' ),
            'priority'  => 6,
            'panel'     => 'flexible_lite_design_settings_panel',
        )
    );

    /**
     * Field for Posts Sidebar images
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_default_post_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Control_Radio_Image(
        $wp_customize,
        'flexible_lite_default_post_sidebar',
            array(
                'label'    => esc_html__( 'Posts Sidebars', 'flexible-lite' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'flexible-lite' ),
                'section'  => 'flexible_lite_post_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        ),
                        'no_sidebar_center' => array(
                            'label' => esc_html__( 'No Sidebar Center', 'flexible-lite' ),
                            'url'   => '%s/assets/images/no-sidebar-center.png'
                        )
                ),
                'priority' => 5
            )
        )
    );
/*---------------------------------------------------------------------------------------------------------------*/
	/**
     * Page Settings
     */    
    $wp_customize->add_section(
        'flexible_lite_page_section',
        array(
            'title'		=> __( 'Page Settings', 'flexible-lite' ),
            'priority'  => 7,
            'panel'     => 'flexible_lite_design_settings_panel',
        )
    );

    /**
     * Field for Pages Sidebar images
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_default_page_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Control_Radio_Image(
        $wp_customize,
        'flexible_lite_default_page_sidebar',
            array(
                'label'    => esc_html__( 'Pages Sidebars', 'flexible-lite' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'flexible-lite' ),
                'section'  => 'flexible_lite_page_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'flexible-lite' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        ),
                        'no_sidebar_center' => array(
                            'label' => esc_html__( 'No Sidebar Center', 'flexible-lite' ),
                            'url'   => '%s/assets/images/no-sidebar-center.png'
                        )
                ),
                'priority' => 5
            )
        )
    );
}
endif;