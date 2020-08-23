<?php
/**
 * mistu functions and dynamic template
 *
 * @package mistu
 */
 
 /**
 * Register Custom Settings
 */
function mistu_custom_settings_register( $wp_customize ) {
	/*
	Theme Colors
	=====================================================
	*/
	$colors = array();
	
	$colors[] = array(
	'slug'=>'mistu_color_primary', 
	'default' => '#fff',
	'label' => __('Primary Color ', 'mistu')
	);
	
	$colors[] = array(
	'slug'=>'mistu_color_link', 
	'default' => '#aaaaaa',
	'label' => __('Link Color ', 'mistu')
	);
		
	foreach( $colors as $mistu_theme_options ) {
		// SETTINGS
			$wp_customize->add_setting(
				'mistu_theme_options[' . $mistu_theme_options['slug'] . ']', array(
				'default' => $mistu_theme_options['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$mistu_theme_options['slug'], 
				array('label' => $mistu_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'mistu_theme_options[' . $mistu_theme_options['slug'] . ']',
				)
			)
		);
	}
	
	/*
	Social Icons
	=====================================================
	*/
	$wp_customize->add_section( 'cresta_social_icons', array(
	     'title'    => esc_html__( 'Social Icons', 'mistu' ),
	     'priority' => 50,
	) );
	
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'facebookurl', 
	'default' => '',
	'label' => __('Facebook URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'twitterurl', 
	'default' => '',
	'label' => __('Twitter URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'googleplusurl', 
	'default' => '',
	'label' => __('Google Plus URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'linkedinurl', 
	'default' => '',
	'label' => __('Linkedin URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'instagramurl', 
	'default' => '',
	'label' => __('Instagram URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'youtubeurl', 
	'default' => '',
	'label' => __('YouTube URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'pinteresturl', 
	'default' => '',
	'label' => __('Pinterest URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'tumblrurl', 
	'default' => '',
	'label' => __('Tumblr URL', 'mistu')
	);
	$socialmedia[] = array(
	'slug'=>'vkurl', 
	'default' => '',
	'label' => __('VK URL', 'mistu')
	);
	
	foreach( $socialmedia as $mistu_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'mistu_theme_options_' . $mistu_theme_options['slug'], array(
				'default' => $mistu_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'theme_mod',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			$mistu_theme_options['slug'], 
			array('label' => $mistu_theme_options['label'], 
			'section'    => 'cresta_social_icons',
			'settings' =>'mistu_theme_options_' . $mistu_theme_options['slug'],
			)
		);
	}
	
	/*
	Search Button
	=====================================================
	*/
	$wp_customize->add_setting('mistu_theme_options_hidesearch', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mistu_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('hidesearch', array(
        'label'      => __( 'Show Search Button', 'mistu' ),
        'section'    => 'cresta_social_icons',
        'settings'   => 'mistu_theme_options_hidesearch',
        'type'       => 'checkbox',
    ) );
	
	/*
	Upgrade to PRO
	=====================================================
	*/
    class mistu_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	
			<p style="text-align:center;" class="mistu-upgrade-button">
				<a style="margin: 10px;" target="_blank" href="mailto:abhayrajmca@gmail.com" class="button button-secondary">
					<?php esc_html_e('Write Us', 'mistu'); ?>
				</a>
				
			</p>
			<?php
        }
    }
	
	$wp_customize->add_section( 'cresta_upgrade_pro', array(
	     'title'    => esc_html__( 'Need Help ?', 'mistu' ),
	     'priority' => 999,
	));
	
	$wp_customize->add_setting('mistu_section_upgrade_pro', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	));
	
	$wp_customize->add_control(new mistu_Customize_Upgrade_Control($wp_customize, 'mistu_section_upgrade_pro', array(
		'section' => 'cresta_upgrade_pro',
		'settings' => 'mistu_section_upgrade_pro',
	)));
	
}
add_action( 'customize_register', 'mistu_custom_settings_register' );

/**
 * Add Custom CSS to Header 
 */
function mistu_custom_css_styles() { 
	global $mistu_theme_options;
	$color_options = get_option( 'mistu_theme_options', $mistu_theme_options );	
	if( isset( $color_options[ 'mistu_color_primary' ] ) ) {
		$color_primary = $color_options['mistu_color_primary'];
	}
	if( isset( $color_options[ 'mistu_color_link' ] ) ) {
		$color_link = $color_options['mistu_color_link'];
	}
?>

<style type="text/css">
	<?php if (!empty($color_primary)) : ?>
	body,
	button,
	input,
	select,
	textarea,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus {
		color: <?php echo esc_html($color_primary); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($color_link)) : ?>
	blockquote {
		border-left: 5px solid <?php echo esc_html($color_link); ?>;
		border-right: 2px solid <?php echo esc_html($color_link); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	#wp-calendar tbody td#today,
	.readMoreLink a:hover, 
	.dataBottom a:hover,
	#toTop:hover	{
		border: 1px solid <?php echo esc_html($color_link); ?>;
	}
	a, a:hover, a:focus, a:active, .main-navigation ul li .indicator, .content-area .sticky:before {
		color: <?php echo esc_html($color_link); ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'mistu_custom_css_styles');

function mistu_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}