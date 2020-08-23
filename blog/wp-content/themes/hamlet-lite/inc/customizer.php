<?php
/**
 * hamlet-lite Theme Customizer.
 *
 * @package hamlet-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hamlet_lite_customize_register( $wp_customize ) {

	require_once get_template_directory().'/inc/customizer-controls.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_panel( 'theme_options' ,
        array(
            'title'       => esc_html__( 'HAMLET LITE: Theme Options', 'hamlet-lite' ),
            'description' => ''
        )
    );


    // Sidebar settings
    $wp_customize->add_section( 'hamlet_lite_home_sidebar' ,
        array(
            'title'       => esc_html__( 'Sidebar', 'hamlet-lite' ),
            'description' => '',
            'panel'       => 'theme_options',
            'piority'     => 1
        )
    );

    $wp_customize->add_setting( 'hamlet_lite_home_sidebar', array(
        'sanitize_callback' => 'hamlet_lite_sanitize_checkbox',
        'default' => false,
    ) );

    $wp_customize->add_control(
        'hamlet_lite_home_sidebar',
            array(
                'type' => 'checkbox',
                'label'      => esc_html__( 'Disable Sidebar on Home Page, Archive Page', 'hamlet-lite' ),
                'section'    => 'hamlet_lite_home_sidebar',
            )
    );

    $wp_customize->add_setting( 'hamlet_lite_sidebar_post', array(
        'sanitize_callback' => 'hamlet_lite_sanitize_checkbox',
        'default' => false,
    ) );

    $wp_customize->add_control(
        'hamlet_lite_sidebar_post',
            array(
                'type' => 'checkbox',
                'label'      => esc_html__( 'Disable Sidebar on Single Post', 'hamlet-lite' ),
                'section'    => 'hamlet_lite_home_sidebar',
            )
    );


	// Color settings
	$wp_customize->add_section( 'hamlet_lite_color_general' ,
	    array(
	        'title'       => esc_html__( 'Color Accent', 'hamlet-lite' ),
	        'description' => '',
	        'panel'       => 'theme_options',
	        'piority'     => 2
	    )
	);

	$wp_customize->add_setting( 'hamlet_lite_color_accent', array(
	    'default'              => '#BB992E',
	    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
	    'sanitize_js_callback' => 'maybe_hash_hex_color',
	) );

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'hamlet_lite_color_accent',
	            array(
	                'label'      => esc_html__( 'Primary Color', 'hamlet-lite' ),
	                'section'    => 'hamlet_lite_color_general',
	            )
	    )
	);

	// Featured slider settings
	$wp_customize->add_section( 'hamlet_lite_featured' ,
	    array(
	        'title'       => esc_html__( 'Featured Slider', 'hamlet-lite' ),
	        'description' => '',
	        'panel'       => 'theme_options',
	        'piority'     => 3
	    )
	);

	$wp_customize->add_setting( 'hamlet_lite_featured_slider', array(
        'sanitize_callback' => 'hamlet_lite_sanitize_checkbox',
		'default' => false,
	) );

	$wp_customize->add_control(
		'hamlet_lite_featured_slider',
            array(
                'type' => 'checkbox',
                'label'      => esc_html__( 'Enable Featured Slider', 'hamlet-lite' ),
                'section'    => 'hamlet_lite_featured',
            )
	);

	$wp_customize->add_setting( 'hamlet_lite_featured_style', array(
            'sanitize_callback' => 'hamlet_lite_sanitize_sanitize_select',
            'default' => 'slider_boxes',
            'validate_callback' => 'hamlet_lite_upgrade_pro_notice'
        ) );

	$wp_customize->add_control(
            'hamlet_lite_featured_style',
            array(
                'type'       => 'radio',
                'label'      => esc_html__( 'Featured Style', 'hamlet-lite' ),
                'section'    => 'hamlet_lite_featured',
                'choices' => array(
                    'slider_boxes' => esc_html__( 'Boxes Slider Featured', 'hamlet-lite' ),
                    'slider_full' => esc_html__( 'Full Width Slider Featured', 'hamlet-lite' ),
                    'normal' => esc_html__( 'Grid Featured Area(default 3 post)', 'hamlet-lite' ),
                )
            )
	);

	$wp_customize->add_setting( 'hamlet_lite_featured_number', array(
            'sanitize_callback' => 'hamlet_lite_sanitize_number',
            'default' => 4,
    ) );

    $wp_customize->add_control(
            'hamlet_lite_featured_number',
            array(
                'type' => 'number',
                'label'      => esc_html__( 'Amount of Slides', 'hamlet-lite' ),
                'section'    => 'hamlet_lite_featured',
            )
    );

    // Social Media Settings
    $wp_customize->add_section( 
        'hamlet_lite_social',
        array(
            'title'      => esc_html__('Social Media Settings', 'hamlet-lite'),
            'description'=> esc_html__('Enter your social media(URL). Icons will not show if left blank.', 'hamlet-lite'),
            'priority'   => 4,
            'panel'       => 'theme_options',
        ) 
    );

        $wp_customize->add_setting(
            'hamlet_lite_facebook',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_twitter',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_instagram',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_pinterest',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_tumblr',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_bloglovin',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_google',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_setting(
            'hamlet_lite_youtube',
            array(
                'default'     => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'hamlet_lite_facebook',
            array(
                'label'      => esc_html__( 'Facebook', 'hamlet-lite' ),
                'section'    => 'hamlet_lite_social',
                'settings'   => 'hamlet_lite_facebook',
                'type'       => 'text',
                'priority'   => 1
            )
        )
    );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_twitter',
                array(
                    'label'      => esc_html__( 'Twitter', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_twitter',
                    'type'       => 'text',
                    'priority'   => 2
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_instagram',
                array(
                    'label'      => esc_html__( 'Instagram', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_instagram',
                    'type'       => 'text',
                    'priority'   => 3
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_pinterest',
                array(
                    'label'      => esc_html__( 'Pinterest', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_pinterest',
                    'type'       => 'text',
                    'priority'   => 4
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_bloglovin',
                array(
                    'label'      => esc_html__( 'Bloglovin', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_bloglovin',
                    'type'       => 'text',
                    'priority'   => 5
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_google',
                array(
                    'label'      => esc_html__( 'Google Plus', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_google',
                    'type'       => 'text',
                    'priority'   => 6
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_tumblr',
                array(
                    'label'      => esc_html__( 'Tumblr', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_tumblr',
                    'type'       => 'text',
                    'priority'   => 7
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'hamlet_lite_youtube',
                array(
                    'label'      => esc_html__( 'Youtube', 'hamlet-lite' ),
                    'section'    => 'hamlet_lite_social',
                    'settings'   => 'hamlet_lite_youtube',
                    'type'       => 'text',
                    'priority'   => 8
                )
            )
        );

    // View Hamlet Pro

    $wp_customize->add_section( 'hamlet_pro', array(
        'title' => esc_html__( 'View PRO Version', 'hamlet-lite' ),
        'priority'     => 300,
    ) );

    $wp_customize->add_setting( 'hamlet_pro' , array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Hamlet_Lite_Message_Control( $wp_customize, 'hamlet_pro', array(
        'label'        => '',
        'description'  => '',
        'section'      => 'hamlet_pro',
        'priority'     => 190,
        'type'         => 'list',
        'list'         => array(
            esc_html__( 'Multi-Concept', 'hamlet-lite' ),
            esc_html__( '3 Header Styles', 'hamlet-lite' ),
            esc_html__( '7 Featured Area Styles', 'hamlet-lite' ),
            esc_html__( '7 Different Blog Layouts', 'hamlet-lite' ),
            esc_html__( 'WooCommerce Compatible', 'hamlet-lite' ),
            esc_html__( '3 Custom Widgets', 'hamlet-lite' ),
            esc_html__( '3 Footer Widget', 'hamlet-lite' ),
            esc_html__( 'Love Post System', 'hamlet-lite' ),
            esc_html__( 'Footer Copyright Text', 'hamlet-lite' ),
            esc_html__( 'Footer Logo Upload', 'hamlet-lite' ),
            esc_html__( 'Well Documented', 'hamlet-lite' ),
            esc_html__( 'Child Theme included', 'hamlet-lite' ),
            esc_html__( 'Logo PSD included', 'hamlet-lite' ),
            esc_html__( 'And More...', 'hamlet-lite' ),
        ),
        'button' => array(
            'link' => hamlet_lite_get_premium_url(),
            'label' => esc_html__( 'Upgrade to Hamlet Pro', 'hamlet-lite' ),
        )
    ) ) );

}
add_action( 'customize_register', 'hamlet_lite_customize_register' );

function hamlet_lite_sanitize_checkbox( $input ){
    if ( $input == 1 || $input == 'true' || $input === true ) {
        return 1;
    } else {
        return 0;
    }
}
function hamlet_lite_sanitize_sanitize_select( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function hamlet_lite_upgrade_pro_notice( $validity, $value ){
    if ( $value !== 'slider_boxes' ) {
        $validity->add( 'notice', sprintf(esc_html__( 'Upgrade to %1s to display featured content as a "Grid Featured Area" or "Full Width Slider".', 'hamlet-lite' ), '<a target="_blank" href="https://zthemes.net/themes/hamlet">Hamlet Pro</a>' ));
    }
    return $validity;
}
function hamlet_lite_sanitize_number( $number, $setting ) {
    $number = absint( $number );
    return ( $number ? $number : $setting->default );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hamlet_lite_customize_preview_js() {
	wp_enqueue_script( 'hamlet_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hamlet_lite_customize_preview_js' );

/**
 * Load customizer style
 */
function hamlet_lite_customizer_load_css(){
    wp_enqueue_style( 'hamlet-lite-customizer', get_template_directory_uri() . '/css/customizer.css' );
}
add_action('customize_controls_print_styles', 'hamlet_lite_customizer_load_css');
