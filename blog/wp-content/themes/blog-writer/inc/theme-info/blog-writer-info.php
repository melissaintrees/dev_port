<?php
/**
 * Theme Info Page
 * Special thanks to the Consulting theme by ThinkUpThemes for this info page to be used as a foundation.
 * @package Blog_Writer
 */
 
function blog_writer_info() {    


	// About page instance
	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme

		$theme_name    = trim( ucwords( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
		$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
		$theme_version = $theme_data->get( 'Version' );

	$config = array(
		// translators: %1$s: menu title under appearance
		'menu_name'             => sprintf( esc_html__( 'About %1$s', 'blog-writer' ), ucfirst( $theme_name ) ),
		// translators: %1$s: page name 
		'page_name'             => sprintf( esc_html__( 'About %1$s', 'blog-writer' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome title 
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %1$s - v', 'blog-writer' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome content 
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a clean and minimal blog theme that is built for writers who need to create a personal blog site with simplicity and with subtle effects to make readers feel the pleasure of reading their articles. The design concept for Blog Writer includes modern, classic, and minimal styles to give you a simple and clean blog.', 'blog-writer' ), ucfirst( $theme_name ) ),
		
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => 'https://www.bloggingthemestyles.com/wordpress-themes/blog-writer-pro/',
			'price_discount'  => __( 'Upgrade and Save 5%', 'blog-writer' ),
			'price_normal'	  => __( 'Use coupon at checkout.', 'blog-writer' ),
			'coupon'	      =>  __( 'SAVEFIVE', 'blog-writer' ),
			'button'	      => __( 'Get the Pro', 'blog-writer' ),
		),		
		'tabs'                 => array(
			'getting_started'  => esc_html__( 'Getting Started', 'blog-writer' ),
			'support_content'  => esc_html__( 'Support', 'blog-writer' ),
			'theme_review'  => esc_html__( 'Reviews', 'blog-writer' ),
			'changelog'           => esc_html__( 'Changelog', 'blog-writer' ),
			'free_pro'         => esc_html__( 'Free VS PRO', 'blog-writer' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'blog-writer' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out our detailed setup documentation.', 'blog-writer' ) ),
				// translators: %1$s: theme name 
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'blog-writer' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/documentation' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'blog-writer' ),
				'text'                => esc_html__( 'Using the WordPress Customizer, you can easily customize every aspect of the theme.', 'blog-writer' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'blog-writer' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'blog-writer' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'blog-writer' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'blog-writer' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),

		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'blog-writer' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'blog-writer' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),			
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'blog-writer' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'If you experience any problems, please post your questions to support and we will be more than happy to help you out.', 'blog-writer' ),
				'button_label' => esc_html__( 'Get Free Support', 'blog-writer' ),
				'button_link'  => esc_url( '//www.bloggingthemestyles.com/support' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Common Problems', 'blog-writer' ),
				'icon'         => 'dashicons dashicons-editor-help',
				'text'         => esc_html__( 'For quick answers to the most common problems, you can check out the tutorials which can provide instant solutions and answers.', 'blog-writer' ),
				'button_label' => sprintf( esc_html__( 'Get Answers', 'blog-writer' ) ),
				'button_link'  => '//www.bloggingthemestyles.com/support/common-problems',
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),
		// Review content tab.
		'theme_review'      => array(
			'first' => array (
				'title'        => esc_html__( 'Theme Review', 'blog-writer' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'We would love to request a 5-star rating from you! If so, please visit the theme page and add your review and your star rating. If you have suggestions to help improve the theme, let us know, but If you run into any problems, request support and we will be happy to help you out.', 'blog-writer' ),
				'button_label' => esc_html__( 'Add Your Star Rating', 'blog-writer' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/blog-writer/reviews/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
		),		
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => esc_html__('Blog Writer Pro','blog-writer' ),
			'pro_theme_link'      => '//www.bloggingthemestyles.com/wordpress-themes/blog-writer-pro/',
			'get_pro_theme_label' => sprintf( esc_html__( 'Get Blog Writer Pro', 'blog-writer' ) ),
			'features'            => array(
				array(
					'title'            => esc_html__( 'Mobile Friendly', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Unlimited Colours', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Adjustable Page Width', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				
				array(
					'title'            => esc_html__( 'Background Image', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Built-In Social Menu', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Show or Hide Elements', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Custom Error Page', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				
				array(
					'title'            => esc_html__( 'Blog Styles', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '6',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '14',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Sidebar Positions', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '11',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '13',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Page Templates', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '5',
					'hidden'           => '',
				),

				array(
					'title'            => esc_html__( 'Recent Posts Widget with Thumbnails', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Related Posts with Thumbnails', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
			
				array(
					'title'            => esc_html__( 'Theme Options', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Support', 'blog-writer' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Featured Image Captions for Posts', 'blog-writer' ),
					'description'      => esc_html__('Enhance your post featured images with captions', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					

				array(
					'title'            => esc_html__( 'Custom Blog Title &amp; Introduction', 'blog-writer' ),
					'description'      => esc_html__('WordPress does not have this, but we have added a customizable blog title and intro option.', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Blog Thumbnail Creation', 'blog-writer' ),
					'description'      => esc_html__('Automatically have post featured images cropped when uploading.', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),									
				array(
					'title'            => esc_html__( 'Custom Widget Style', 'blog-writer' ),
					'description'      => esc_html__('We included a minimal custom style for your widgets that you can enable.', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),								
				array(
					'title'            => esc_html__( 'Add Google Fonts', 'blog-writer' ),
					'description'      => esc_html__('Add up to 2 more Google Fonts.', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Typography Options', 'blog-writer' ),
					'description'      => esc_html__('Change the font for your main text and headings, and more.', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Custom Styled Archive Titles', 'blog-writer' ),
					'description'      => esc_html__('We customized the style of archive titles for tags, categories, etc.', 'blog-writer'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
		
				
			),
		),
	);
	blog_writer_info_page::init( $config );

}

add_action('after_setup_theme', 'blog_writer_info');

?>