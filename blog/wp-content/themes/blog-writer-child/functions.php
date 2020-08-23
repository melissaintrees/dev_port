<?php 


function child_theme_enqueue_styles() {

    $parent_style = 'parent-style';
	
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:400,700|Open+Sans+Condensed:300,700|Open+Sans:300,400,700', false ); 
	wp_enqueue_style( 'bootstrap-cdn-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
	
	
	wp_enqueue_script( 'bootstrap-cdn-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' );
	
}

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );




