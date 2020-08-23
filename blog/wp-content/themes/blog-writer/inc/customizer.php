<?php
/**
 * Blog Writer Theme Customizer
 * @package Blog_Writer
 */


/**
 * Control type.
 * @access public
 * @var string
 */
if ( ! class_exists( 'Blog_Writer_Customize_Static_Text_Control' ) ){
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class Blog_Writer_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="Blog-Writer-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="Blog-Writer-description Blog-Writer-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('Blog Writer Pro', 'blog-writer') ?></h1>
			
			<p><?php esc_html_e('If you decide to upgrade to the pro version of this theme, use this discount code on checkout.','blog-writer'); ?></p>	
			<div id="promotion-header"><p class="main-title"><?php esc_html_e('Upgrade to Pro (Save $5)', 'blog-writer') ?><br><?php esc_html_e('Use Code:', 'blog-writer') ?> <strong><?php esc_html_e('SAVEFIVE', 'blog-writer') ?></strong></p>
			<p><a href="https://www.bloggingthemestyles.com/wordpress-themes/blog-writer-pro/" target="_blank" class="button button-primary"><?php esc_html_e('Get the Pro - Save $5', 'blog-writer') ?></a></p></div>
			
			<p style="font-weight: 700;"><?php esc_html_e('Pro Features:', 'blog-writer') ?></p>
			<ul>
				<li><?php esc_html_e('&bull; 14 Blog Styles', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; 13 Sidebar Positions', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; Featured Image Captions', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; Add More Google Fonts', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; Typography Options', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; Custom Styled Archive Titles', 'blog-writer')?></li>
				<li><?php esc_html_e('&bull; Page Builder Ready', 'blog-writer')?></li>
			</ul>
			
			<p><a class="button" href="<?php echo esc_url('https://www.bloggingthemestyles.com/wordpress-themes/blog-writer'); ?>" target="_blank"><?php esc_html_e( 'Get the Pro', 'blog-writer' ); ?></a></p>				
			<?php
			endif;
		}
	}
}
 
// Add postMessage support for site title and description for the Theme Customizer.
function blog_writer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control('background_color')->label = esc_html__( 'Page Background Colour', 'blog-writer' );
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#site-title a',
			'render_callback' => 'blog_writer_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '#site-description',
			'render_callback' => 'blog_writer_customize_partial_blogdescription',
		) );
	}
	
// Begin theme settings

   // SECTION - EQUABLE UPGRADE
    $wp_customize->add_section( 'blog-writer_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'blog-writer' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'blog-writer_upgrade', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new Blog_Writer_Customize_Static_Text_Control( $wp_customize, 'blog-writer_upgrade', array(
			'label'	=> esc_html__('Get The Pro Version:','blog-writer'),
			'section'	=> 'blog-writer_upgrade',
			'description' => array('')
		) ) );	
		
// ADD TO SITE IDENTITY	
	// Show site title
	$wp_customize->add_setting( 'blog_writer_show_site_title',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_site_title', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Site Title', 'blog-writer' ),
		'section'  => 'title_tagline',
	) );		
		
	// Show site description
	$wp_customize->add_setting( 'blog_writer_show_site_desc',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_site_desc', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Site Description', 'blog-writer' ),
		'section'  => 'title_tagline',
	) );		

// Site Title Colour
 	$wp_customize->add_setting( 'blog_writer_sitetitle', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'blog-writer' ),
		'section' => 'title_tagline',
		'settings'   => 'blog_writer_sitetitle',
	) ) );
	
// Site Title tagline
 	$wp_customize->add_setting( 'blog_writer_site_tagline', array(
		'default'        => '#989898',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_site_tagline', array(
		'label'   => esc_html__( 'Site Tagline Colour', 'blog-writer' ),
		'section' => 'title_tagline',
		'settings'   => 'blog_writer_site_tagline',
	) ) );	
	
// SECTION - THEME OPTIONS
	$wp_customize->add_section( 'blog_writer_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'blog-writer' ),
		'priority' => 20, 
	) );	

    // Boxed layout size
    $wp_customize->add_setting( 'blog_writer_boxed_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '2560',
        ) );
    $wp_customize->add_control( 'blog_writer_boxed_size', array(
        'type'        => 'number',
        'section'     => 'blog_writer_theme_options',
        'label'       => esc_html__('Boxed Layout Width', 'blog-writer'),
		'description' => esc_html__('Change the max-width for your site content for a boxed layout. You can go from 1160px to 2560px (for really wide screens). Using the up/down arrows will change the size in increments of 100px. Default is size 2560', 'blog-writer'), 
        'input_attrs' => array(
            'min'   => 1160,
            'max'   => 2560,
            'step'  => 100,
        ),
    ) );	
	
	// Setting group for blog layout
	$wp_customize->add_setting( 'blog_writer_blog_layout', array(
		'default' => 'blog1',
		'sanitize_callback' => 'blog_writer_sanitize_select',
	) );  
	$wp_customize->add_control( 'blog_writer_blog_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Layout', 'blog-writer' ),
		  'section' => 'blog_writer_theme_options',
		  'choices' => array(	
				'blog1' => esc_html__( 'Default With Right Sidebar', 'blog-writer' ),	  
				'blog2' => esc_html__( 'Default With Left Sidebar', 'blog-writer' ),						
				'blog6' => esc_html__( 'Grid With No Sidebar', 'blog-writer' ),
				'blog7' => esc_html__( 'Grid With Right Sidebar', 'blog-writer' ),
				'blog8' => esc_html__( 'Grid With Left Sidebar', 'blog-writer' ),	
				'blog12' => esc_html__( 'Centered With No Sidebar', 'blog-writer' ),			
		) ) );	

	// Setting group for full post (single) layout  
	$wp_customize->add_setting( 'blog_writer_single_layout', array(
		'default' => 'single1',
		'sanitize_callback' => 'blog_writer_sanitize_select',
	) );  
	$wp_customize->add_control( 'blog_writer_single_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Full Post Style', 'blog-writer' ),
		  'section' => 'blog_writer_theme_options',
		  'choices' => array(	
				'single1' => esc_html__( 'Single With Right Sidebar', 'blog-writer' ),	 
				'single2' => esc_html__( 'Single With Left Sidebar', 'blog-writer' ), 
				'single3' => esc_html__( 'Single With No Sidebars', 'blog-writer' ),
		) ) );	
	
	
	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'blog_writer_use_excerpt',  array(
		  'default' => false,
		  'sanitize_callback' => 'blog_writer_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'blog_writer_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Excerpts', 'blog-writer' ),
		'description' => esc_html__( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag. NOTE: Some blog styles only use excerpts.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	  ) );

    // Excerpt size
    $wp_customize->add_setting( 'blog_writer_excerpt_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '35',
        ) );
    $wp_customize->add_control( 'blog_writer_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'blog_writer_theme_options',
        'label'       => esc_html__('Excerpt Size', 'blog-writer'),
		'description' => esc_html__('You can change the size of your blog summary excerpts with increments of 5 words.', 'blog-writer'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 1,
        ),
    ) );
	
	// Show featured label
	$wp_customize->add_setting( 'blog_writer_show_featured_tag',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_featured_tag', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Tag', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the featured tag in the post meta info. Note: It does not show on the Photowall blog style.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );
	
	// Show post date
	$wp_customize->add_setting( 'blog_writer_show_post_date',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_post_date', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Date', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the post date in the meta info group for the summary.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );	
	
	// Show post author
	$wp_customize->add_setting( 'blog_writer_show_post_author',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_post_author', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Author', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the post author in the meta info group for the summary.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );	
	
	// Show post comments
	$wp_customize->add_setting( 'blog_writer_show_post_comments',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_post_comments', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Comment Link', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the post comment link in the meta info group for the summary.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );		
	
	// show hide edit link
	$wp_customize->add_setting( 'blog_writer_show_edit_link',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_edit_link', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Edit Link', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show or hide the front-end edit link.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );
	
	// Show author bio section
	$wp_customize->add_setting( 'blog_writer_show_single_featured',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_single_featured', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Featured Image', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the featured image also on the full post view.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );	
	
	// Show full post footer group
	$wp_customize->add_setting( 'blog_writer_show_post_tags',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_post_tags', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Footer Group', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show or hide the full post footer group that includes the tags list.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );	
	
	// Show full post nav
	$wp_customize->add_setting( 'blog_writer_show_post_nav',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_post_nav', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Navigation', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the Next and Previous post navigation on the full post view.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );		

	// Show related posts section
	$wp_customize->add_setting( 'blog_writer_show_author_bio',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_author_bio', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Author Bio Section', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the author biography section in the full article view.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );
	
	// Show related posts section
	$wp_customize->add_setting( 'blog_writer_show_related_posts',	array(
		'default' => true,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_related_posts', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Related Posts Section', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the related posts section on the full article view.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );
	
	// Related Posts by
   $wp_customize->add_setting('blog_writer_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'blog_writer_sanitize_select'
   ));

   $wp_customize->add_control('blog_writer_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Displayed From:', 'blog-writer'),
      'section' => 'blog_writer_theme_options',
      'settings' => 'blog_writer_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'blog-writer'),
         'tags' => esc_html__('Related Posts By Tags', 'blog-writer')
      )
   ));			
	
	// Enable attachment comments
	$wp_customize->add_setting( 'blog_writer_show_attachment_comments',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_attachment_comments', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Image Attachment Page Comments', 'blog-writer' ),
		'description' => esc_html__( 'If you are using a WP gallery shortcode and want to showcase your images on the custom attachment page, you can enable or disable comments for images.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );	

	// Show dropcaps
	$wp_customize->add_setting( 'blog_writer_show_dropcap',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_show_dropcap', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Full Post Dropcap', 'blog-writer' ),
		'description' => esc_html__( 'This lets you show the drop cap style on the first letter of the first paragraph.', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',
	) );	
	
	// Copyright
	$wp_customize->add_setting( 'blog_writer_copyright', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'blog_writer_copyright', array(
		'settings' => 'blog_writer_copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'blog-writer' ),
		'section'  => 'blog_writer_theme_options',		
		'type'     => 'text',
	) ); 
	
	
	
// SECTION - THUMBNAILS
	$wp_customize->add_section( 'blog_writer_thumbnail_options' , array(
		'title'      => esc_html__( 'Thumbnail Options', 'blog-writer' ),
		'priority' => 32,
	) );
	
	// Enable default thumbnails
	$wp_customize->add_setting( 'blog_writer_default_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_default_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Default Style Blog Thumbnails', 'blog-writer' ),
		'description' => esc_html__( 'This will create featured images for the blog 1 and 2 styled layouts. Size = 760x400 pixels.', 'blog-writer' ),
		'section'  => 'blog_writer_thumbnail_options',
	) );	

	// Enable Grid thumbnails
	$wp_customize->add_setting( 'blog_writer_grid_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_grid_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Grid Style Blog Thumbnails', 'blog-writer' ),
		'description' => esc_html__( 'This will create featured images for the grid styled layouts. Size = 660x350 pixels.', 'blog-writer' ),
		'section'  => 'blog_writer_thumbnail_options',
	) );	

	// Enable Centered thumbnails
	$wp_customize->add_setting( 'blog_writer_centered_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_centered_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Centered Style Blog Thumbnails', 'blog-writer' ),
		'description' => esc_html__( 'This will create featured images for the centered styled layouts. Size 1160x600 pixels. Best for really large photo uploads.', 'blog-writer' ),
		'section'  => 'blog_writer_thumbnail_options',
	) );	

	// Enable full post thumbnails
	$wp_customize->add_setting( 'blog_writer_singlepost_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_singlepost_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Full Post Thumbnail Creation', 'blog-writer' ),
		'description' => esc_html__( 'When enabled, a custom thumbnail will be created for the full post view. (Images will be 750x500 pixels.', 'blog-writer' ),
		'section'  => 'blog_writer_thumbnail_options',
	) );	
	
	// Enable related post thumbnails
	$wp_customize->add_setting( 'blog_writer_related_post_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_related_post_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Related Post Thumbnail Creation', 'blog-writer' ),
		'description' => esc_html__( 'When enabled, a custom thumbnail will be created for the related posts sections on the full post view.', 'blog-writer' ),
		'section'  => 'blog_writer_thumbnail_options',
	) );		

	// Enable widget gallery thumbnails
	$wp_customize->add_setting( 'blog_writer_widget_gallery_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'blog_writer_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'blog_writer_widget_gallery_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Widget Gallery Thumbnails', 'blog-writer' ),
		'description' => esc_html__( 'This will create smaller thumbnails when creating galleries with the Gallery Widget by WordPress. Size will be 100x100 pixels.', 'blog-writer' ),
		'section'  => 'blog_writer_thumbnail_options',
	) );	


// ADD TO COLOUR SECTION		
// page content background
 	$wp_customize->add_setting( 'blog_writer_page_content_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_page_content_bg', array(
		'label'   => esc_html__( 'Page Content Background', 'blog-writer' ),		
		'settings'   => 'blog_writer_page_content_bg',
		'section' => 'colors',
	) ) );

// page content body text
 	$wp_customize->add_setting( 'blog_writer_body_text', array(
		'default'        => '#424242',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_body_text', array(
		'label'   => esc_html__( 'Page Content Body Text', 'blog-writer' ),		
		'settings'   => 'blog_writer_body_text',
		'section' => 'colors',
	) ) );
	
// breadcrumbs background
 	$wp_customize->add_setting( 'blog_writer_breadcrumbs_bg', array(
		'default'        => '#ececec',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_breadcrumbs_bg', array(
		'label'   => esc_html__( 'Breadcrumbs Background', 'blog-writer' ),		
		'settings'   => 'blog_writer_breadcrumbs_bg',
		'section' => 'colors',
	) ) );
	
// breadcrumbs text
 	$wp_customize->add_setting( 'blog_writer_breadcrumbs_text', array(
		'default'        => '#8e8e8e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_breadcrumbs_text', array(
		'label'   => esc_html__( 'Breadcrumbs Text', 'blog-writer' ),		
		'settings'   => 'blog_writer_breadcrumbs_text',
		'section' => 'colors',
	) ) );
	
// headings
 	$wp_customize->add_setting( 'blog_writer_headings', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_headings', array(
		'label'   => esc_html__( 'Headings Colour', 'blog-writer' ),		
		'settings'   => 'blog_writer_headings',
		'section' => 'colors',
	) ) );	
	
// meta info
 	$wp_customize->add_setting( 'blog_writer_meta', array(
		'default'        => '#9b9b9b',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_meta', array(
		'label'   => esc_html__( 'Post Meta Info', 'blog-writer' ),		
		'settings'   => 'blog_writer_meta',
		'section' => 'colors',
	) ) );	
	
// links
 	$wp_customize->add_setting( 'blog_writer_links', array(
		'default'        => '#e4a14f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_links', array(
		'label'   => esc_html__( 'Link Colour', 'blog-writer' ),		
		'settings'   => 'blog_writer_links',
		'section' => 'colors',
	) ) );	

// links visited focus active hover
 	$wp_customize->add_setting( 'blog_writer_hover_links', array(
		'default'        => '#d4b48f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_hover_links', array(
		'label'   => esc_html__( 'Link Active Visited &amp; Hover Colour', 'blog-writer' ),		
		'settings'   => 'blog_writer_hover_links',
		'section' => 'colors',
	) ) );	
	
// bottom hover links
 	$wp_customize->add_setting( 'blog_writer_bottom_hover_links', array(
		'default'        => '#d4b48f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_bottom_hover_links', array(
		'label'   => esc_html__( 'Bottom Sidebar Link Hover Colour', 'blog-writer' ),		
		'settings'   => 'blog_writer_bottom_hover_links',
		'section' => 'colors',
	) ) );	
	
// bottom sidebar background
 	$wp_customize->add_setting( 'blog_writer_bottom_bg', array(
		'default'        => '#232323',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_bottom_bg', array(
		'label'   => esc_html__( 'Bottom Sidebar Background', 'blog-writer' ),		
		'settings'   => 'blog_writer_bottom_bg',
		'section' => 'colors',
	) ) );		
	
// bottom sidebar text
 	$wp_customize->add_setting( 'blog_writer_bottom_text', array(
		'default'        => '#bbb',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_bottom_text', array(
		'label'   => esc_html__( 'Bottom Sidebar Text', 'blog-writer' ),		
		'settings'   => 'blog_writer_bottom_text',
		'section' => 'colors',
	) ) );		
	
// bottom tag hover background
 	$wp_customize->add_setting( 'blog_writer_bottom_tag_hover_bg', array(
		'default'        => '#cea26d',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_bottom_tag_hover_bg', array(
		'label'   => esc_html__( 'Bottom Tags Hover Background', 'blog-writer' ),		
		'settings'   => 'blog_writer_bottom_tag_hover_bg',
		'section' => 'colors',
	) ) );	
	
// bottom tag hover text
 	$wp_customize->add_setting( 'blog_writer_bottom_tag_hover_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_bottom_tag_hover_text', array(
		'label'   => esc_html__( 'Bottom Tags Hover Text', 'blog-writer' ),		
		'settings'   => 'blog_writer_bottom_tag_hover_text',
		'section' => 'colors',
	) ) );	
	
// footer background
 	$wp_customize->add_setting( 'blog_writer_footer_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_footer_bg', array(
		'label'   => esc_html__( 'Footer Background', 'blog-writer' ),		
		'settings'   => 'blog_writer_footer_bg',
		'section' => 'colors',
	) ) );	
	
// footer text
 	$wp_customize->add_setting( 'blog_writer_footer_text', array(
		'default'        => '#bbb',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_footer_text', array(
		'label'   => esc_html__( 'Footer Text', 'blog-writer' ),		
		'settings'   => 'blog_writer_footer_text',
		'section' => 'colors',
	) ) );		
	
// featured background
 	$wp_customize->add_setting( 'blog_writer_featured_bg', array(
		'default'        => '#cea26d',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_featured_bg', array(
		'label'   => esc_html__( 'Featured Label Background', 'blog-writer' ),		
		'settings'   => 'blog_writer_featured_bg',
		'section' => 'colors',
	) ) );	
	
// featured text
 	$wp_customize->add_setting( 'blog_writer_featured_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_featured_text', array(
		'label'   => esc_html__( 'Featured Label', 'blog-writer' ),		
		'settings'   => 'blog_writer_featured_text',
		'section' => 'colors',
	) ) );		
	
// tag cloud hover background
 	$wp_customize->add_setting( 'blog_writer_tag_hover_bg', array(
		'default'        => '#cea26d',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_tag_hover_bg', array(
		'label'   => esc_html__( 'Tags Background Hover', 'blog-writer' ),		
		'settings'   => 'blog_writer_tag_hover_bg',
		'section' => 'colors',
	) ) );		
	
// tag cloud hover text
 	$wp_customize->add_setting( 'blog_writer_tag_hover_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_tag_hover_text', array(
		'label'   => esc_html__( 'Tags Text Hover', 'blog-writer' ),		
		'settings'   => 'blog_writer_tag_hover_text',
		'section' => 'colors',
	) ) );		

// mobile menu toggle button
 	$wp_customize->add_setting( 'blog_writer_mobile_toggle_button', array(
		'default'        => '#d4b48f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_mobile_toggle_button', array(
		'label'   => esc_html__( 'Mobile Toggle Button', 'blog-writer' ),		
		'settings'   => 'blog_writer_mobile_toggle_button',
		'section' => 'colors',
	) ) );			
	
// mobile menu toggle label
 	$wp_customize->add_setting( 'blog_writer_mobile_toggle_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_mobile_toggle_label', array(
		'label'   => esc_html__( 'Mobile Toggle Label', 'blog-writer' ),		
		'settings'   => 'blog_writer_mobile_toggle_label',
		'section' => 'colors',
	) ) );		
	
// mobile menu toggle button on
 	$wp_customize->add_setting( 'blog_writer_mobile_toggle_button_on', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_mobile_toggle_button_on', array(
		'label'   => esc_html__( 'Mobile Toggle Button On', 'blog-writer' ),		
		'settings'   => 'blog_writer_mobile_toggle_button_on',
		'section' => 'colors',
	) ) );		
	
// mobile menu toggle label on
 	$wp_customize->add_setting( 'blog_writer_mobile_toggle_label_on', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_mobile_toggle_label_on', array(
		'label'   => esc_html__( 'Mobile Toggle Label On', 'blog-writer' ),		
		'settings'   => 'blog_writer_mobile_toggle_label_on',
		'section' => 'colors',
	) ) );		
	
// mobile menu lines
 	$wp_customize->add_setting( 'blog_writer_mobile_menu_lines', array(
		'default'        => '#d1d1d1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_mobile_menu_lines', array(
		'label'   => esc_html__( 'Mobile Menu Lines', 'blog-writer' ),		
		'settings'   => 'blog_writer_mobile_menu_lines',
		'section' => 'colors',
	) ) );		
	
// menu links
 	$wp_customize->add_setting( 'blog_writer_menu_links', array(
		'default'        => '#1a1a1a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_menu_links', array(
		'label'   => esc_html__( 'Main Menu Links', 'blog-writer' ),		
		'settings'   => 'blog_writer_menu_links',
		'section' => 'colors',
	) ) );		
	
// menu hover links
 	$wp_customize->add_setting( 'blog_writer_menu_hover_links', array(
		'default'        => '#d6b895',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_menu_hover_links', array(
		'label'   => esc_html__( 'Main Menu Hover Links', 'blog-writer' ),		
		'settings'   => 'blog_writer_menu_hover_links',
		'section' => 'colors',
	) ) );		
	
// menu active link border
 	$wp_customize->add_setting( 'blog_writer_menu_active_link_border', array(
		'default'        => '#d6b895',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_menu_active_link_border', array(
		'label'   => esc_html__( 'Main Menu Active Link Border', 'blog-writer' ),		
		'settings'   => 'blog_writer_menu_active_link_border',
		'section' => 'colors',
	) ) );		
	
// submenu toggle arrow hover
 	$wp_customize->add_setting( 'blog_writer_submenu_dropdown_arrow_hover', array(
		'default'        => '#d6b895',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_submenu_dropdown_arrow_hover', array(
		'label'   => esc_html__( 'Submenu Toggle Arrow Hover Colour', 'blog-writer' ),		
		'settings'   => 'blog_writer_submenu_dropdown_arrow_hover',
		'section' => 'colors',
	) ) );		
	
// button
 	$wp_customize->add_setting( 'blog_writer_button', array(
		'default'        => '#cea26d',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_button', array(
		'label'   => esc_html__( 'Buttons', 'blog-writer' ),		
		'settings'   => 'blog_writer_button',
		'section' => 'colors',
	) ) );		
	
// button label
 	$wp_customize->add_setting( 'blog_writer_button_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_button_label', array(
		'label'   => esc_html__( 'Button Label', 'blog-writer' ),		
		'settings'   => 'blog_writer_button_label',
		'section' => 'colors',
	) ) );		
	
// button hover
 	$wp_customize->add_setting( 'blog_writer_button_hover', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_button_hover', array(
		'label'   => esc_html__( 'Button Hover', 'blog-writer' ),		
		'settings'   => 'blog_writer_button_hover',
		'section' => 'colors',
	) ) );		
	
// button label hover
 	$wp_customize->add_setting( 'blog_writer_button_label_hover', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_button_label_hover', array(
		'label'   => esc_html__( 'Button Label Hover', 'blog-writer' ),		
		'settings'   => 'blog_writer_button_label_hover',
		'section' => 'colors',
	) ) );		
	
// dropcap colour
 	$wp_customize->add_setting( 'blog_writer_dropcap_colour', array(
		'default'        => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_writer_dropcap_colour', array(
		'label'   => esc_html__( 'Dropcap Letter Colour', 'blog-writer' ),
		'section' => 'colors',
		'settings'   => 'blog_writer_dropcap_colour',
	) ) );		
	
// End theme settings
	
}
add_action( 'customize_register', 'blog_writer_customize_register' );


/**
 * SANITIZATION
 * Required for cleaning up bad inputs
 */

// Strip Slashes
	function blog_writer_sanitize_strip_slashes($input) {
		return wp_kses_stripslashes($input);
	}	
	
// Radio and Select	
	function blog_writer_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	 	
// Checkbox
	function blog_writer_sanitize_checkbox( $input ) {
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
// Array of valid image file types
	function blog_writer_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


// Adds sanitization callback function: Slider Category
function blog_writer_sanitize_slidecat( $input ) {

	if ( array_key_exists( $input, blog_writer_cats() ) ) {
		return $input;
	} else {
		return '';
	}
}

// Adds sanitization callback function: Number
function blog_writer_sanitize_number( $input ) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_writer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_writer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_writer_customize_preview_js() {
	wp_enqueue_script( 'blog-writer-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_writer_customize_preview_js' );
