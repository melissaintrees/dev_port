<?php
/**
 * Customizer function about footer settings panel
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

add_action( 'customize_register', 'flexible_lite_footer_settings_register' );

function flexible_lite_footer_settings_register( $wp_customize ) {

	/**
     * Add Design Settings Panel
     */

    $wp_customize->add_panel( 
    	'flexible_lite_footer_settings_panel', 
	    array(
	        'priority'       => 3,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Footer Settings', 'flexible-lite' ),
	    )
    );
/*---------------------------------------------------------------------------------------------------------------*/
	/**
     * Widget Settings
     */    
    $wp_customize->add_section(
        'flexible_lite_widget_section',
        array(
            'title'		=> __( 'Widget Settings', 'flexible-lite' ),
            'priority'  => 5,
            'panel'     => 'flexible_lite_footer_settings_panel',
        )
    );

    /**
         * Field for Image Radio
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'flexible_lite_footer_widget',
            array(
                'default'           => 'three_columns',
                'sanitize_callback' => 'sanitize_key',
            )
        );
        $wp_customize->add_control( new Flexible_Lite_Customize_Control_Radio_Image(
            $wp_customize,
            'flexible_lite_footer_widget',
                array(
                    'label'    => esc_html__( 'Footer Widget Layout', 'flexible-lite' ),
                    'description' => esc_html__( 'Choose layout from available layouts', 'flexible-lite' ),
                    'section'  => 'flexible_lite_widget_section',
                    'choices'  => array(
                            'four_columns' => array(
                                'label' => esc_html__( 'Four Columns', 'flexible-lite' ),
                                'url'   => '%s/assets/images/footer-4.png'
                            ),
                            'three_columns' => array(
                                'label' => esc_html__( 'Three Columns', 'flexible-lite' ),
                                'url'   => '%s/assets/images/footer-3.png'
                            ),
                            'two_columns' => array(
                                'label' => esc_html__( 'Two Columns', 'flexible-lite' ),
                                'url'   => '%s/assets/images/footer-2.png'
                            ),
                            'one_column' => array(
                                'label' => esc_html__( 'One Column', 'flexible-lite' ),
                                'url'   => '%s/assets/images/footer-1.png'
                            )
                    ),
                    'priority' => 5
                )
            )
        );
        
/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Footer Copyright
     */    
    $wp_customize->add_section(
        'flexible_lite_footer_copyright_section',
        array(
            'title'     => __( 'Footer Copyright', 'flexible-lite' ),
            'priority'  => 10,
            'panel'     => 'flexible_lite_footer_settings_panel',
        )
    );

    //Footer copyright textarea
    $wp_customize->add_setting(
        'flexible_lite_copyright_txt',
            array(
                'default'   => __( 'Flexible Lite', 'flexible-lite' ),
                'transport' => 'postMessage',
                'sanitize_callback' => 'flexible_lite_sanitize_text'
           )
    );    
    $wp_customize->add_control( new Flexible_Lite_Textarea_Custom_Control (
        $wp_customize,
        'flexible_lite_copyright_txt',
            array(
            'type'       => 'flexible_lite_textarea',
            'label'      => __( 'Footer Copyright', 'flexible-lite' ),
            'section'    => 'flexible_lite_footer_copyright_section',
            'description' => __( 'Edit your copyright content.', 'flexible-lite' )
            )
        )
    );

/*---------------------------------------------------------------------------------------------------------------*/
	/**
     * Social Media
     */    
    $wp_customize->add_section(
        'flexible_lite_social_media_section',
        array(
            'title'		=> __( 'Social Media', 'flexible-lite' ),
            'priority'  => 15,
            'panel'     => 'flexible_lite_footer_settings_panel',
        )
    );

    /**
     * Switch option for social media
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'flexible_lite_social_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'flexible_lite_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new Flexible_Lite_Customize_Switch_Control(
        $wp_customize, 
            'flexible_lite_social_option', 
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Social Media', 'flexible-lite' ),
                'description'   => esc_html__( 'Show/hide social icons section at footer.', 'flexible-lite' ),
                'section'   => 'flexible_lite_social_media_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'flexible-lite' ),
                    'hide'  => esc_html__( 'Hide', 'flexible-lite' )
                    ),
                'priority'  => 5,
            )
        )
    );


    /**
     * Social media icons
     */
    $mt_social_icons_name = array(
            'flexible_lite_fb_link' => __( 'Facebook', 'flexible-lite' ),
            'flexible_lite_tw_link' => __( 'Twitter', 'flexible-lite' ),
            'flexible_lite_gp_link' => __( 'Google +', 'flexible-lite' ),
            'flexible_lite_lnk_link' => __( 'LinkedIn', 'flexible-lite' ),
            'flexible_lite_yt_link' => __( 'YouTube', 'flexible-lite' ),
            'flexible_lite_vm_link' => __( 'Vimeo', 'flexible-lite' ),
            'flexible_lite_pin_link' => __( 'Pinterest', 'flexible-lite' ),
            'flexible_lite_insta_link' => __( 'Instagram', 'flexible-lite' ),
        );

    $count = 7;
    foreach ( $mt_social_icons_name as $icon_key => $icon_name ) {
        $wp_customize->add_setting(
            $icon_key,
                array(
                    'default' => '',
                    'sanitize_callback' => 'esc_url_raw',
                    'transport' => 'postMessage'
               )
        );    
        $wp_customize->add_control(
            $icon_key,
                array(
                'type' => 'text',
                'label' => $icon_name,
                'section' => 'flexible_lite_social_media_section',
                'priority' => $count
                )
        );
        $count++;
    }
}