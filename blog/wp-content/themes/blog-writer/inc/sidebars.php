<?php 
/**
 * Register theme sidebars
 * @package Blog_Writer
*/
 
function blog_writer_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'blog-writer' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'blog-writer' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'Left sidebar for the blog', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'blog-writer' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'blog-writer' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'Left sidebar for pages', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'blog-writer' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'blog-writer' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	

	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'blog-writer' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'blog-writer' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'blog-writer' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'blog-writer' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'blog-writer' ),
		'id' => 'footer',
		'description' => esc_html__( 'Footer position', 'blog-writer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Register Recent posts widget
	register_widget( 'Blog_Writer_Recent_Posts_Widget' );
	
}
add_action( 'widgets_init', 'blog_writer_widgets_init' );

// Count the number of widgets to enable resizable widgets in the bottom group.
function blog_writer_bottom_group() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-lg-6';
			break;
		case '3':
			$class = 'col-lg-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr( $class ) . '"';
}