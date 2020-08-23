<?php
/**
 * Add inline styles to the head area
 * @package Blog_Writer
*/
 
 // Dynamic styles
function blog_writer_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	

// content
	$blog_writer_page_content_bg = get_theme_mod( 'blog_writer_page_content_bg', '#fff' );
	$blog_writer_body_text = get_theme_mod( 'blog_writer_body_text', '#424242' );
	$blog_writer_breadcrumbs_bg = get_theme_mod( 'blog_writer_breadcrumbs_bg', '#ececec' );
	$blog_writer_breadcrumbs_text = get_theme_mod( 'blog_writer_breadcrumbs_text', '#8e8e8e' );
	$blog_writer_headings = get_theme_mod( 'blog_writer_headings', '#000' );	
	$blog_writer_meta = get_theme_mod( 'blog_writer_meta', '#9b9b9b' );
	$blog_writer_links = get_theme_mod( 'blog_writer_links', '#e4a14f' );
	$blog_writer_hover_links = get_theme_mod( 'blog_writer_hover_links', '#b57732' );	
	$blog_writer_bottom_hover_links = get_theme_mod( 'blog_writer_bottom_hover_links', '#d4b48f' );
	$blog_writer_bottom_bg = get_theme_mod( 'blog_writer_bottom_bg', '#232323' );
	$blog_writer_bottom_text = get_theme_mod( 'blog_writer_bottom_text', '#bbb' );
	$blog_writer_bottom_tag_hover_bg = get_theme_mod( 'blog_writer_bottom_tag_hover_bg', '#cea26d' );
	$blog_writer_bottom_tag_hover_text = get_theme_mod( 'blog_writer_bottom_tag_hover_text', '#fff' );
	$blog_writer_footer_bg = get_theme_mod( 'blog_writer_footer_bg', '#000' );
	$blog_writer_footer_text = get_theme_mod( 'blog_writer_footer_text', '#bbb' );
	$blog_writer_featured_bg = get_theme_mod( 'blog_writer_featured_bg', '#cea26d' );
	$blog_writer_featured_text = get_theme_mod( 'blog_writer_featured_text', '#fff' );
	$blog_writer_tag_hover_bg = get_theme_mod( 'blog_writer_tag_hover_bg', '#cea26d' );
	$blog_writer_tag_hover_text = get_theme_mod( 'blog_writer_tag_hover_text', '#fff' );
	$custom .= "#page {background-color:" . esc_attr($blog_writer_page_content_bg) . ";}
	body {color:" . esc_attr($blog_writer_body_text) . ";}
	#breadcrumbs-sidebar {background-color:" . esc_attr($blog_writer_breadcrumbs_bg) . ";}
	#breadcrumbs-sidebar, #breadcrumbs-sidebar a, #breadcrumbs-sidebar a:visited {color:" . esc_attr($blog_writer_breadcrumbs_text) . ";}
	h1, h2, h3, h4, h5, h6, .entry-title a {color:" . esc_attr($blog_writer_headings) . ";}
	.entry-meta, .entry-meta a, .entry-meta a:visited {color:" . esc_attr($blog_writer_meta) . ";}	
	a, a.excerpt-readmore {color:" . esc_attr($blog_writer_links) . ";}
	a.excerpt-readmore, a:visited, a:active, a:focus, a:hover, .entry-meta a:focus,.entry-meta a:hover, #left-sidebar .widget li a:focus, #left-sidebar .widget li a:hover, #right-sidebar .widget li a:focus, #right-sidebar .widget li a:hover {color:" . esc_attr($blog_writer_hover_links) . ";}
	#bottom-sidebar {background-color:" . esc_attr($blog_writer_bottom_bg) . ";}
	#bottom-sidebar, #bottom-sidebar a, #bottom-sidebar a:visited {color:" . esc_attr($blog_writer_bottom_text) . "}
	#bottom-sidebar .tagcloud a:hover {background-color:" . esc_attr($blog_writer_bottom_tag_hover_bg) . "; border-color:" . esc_attr($blog_writer_bottom_tag_hover_bg) . "; color:" . esc_attr($blog_writer_bottom_tag_hover_text) . ";}
	#bottom-sidebar a:focus, #bottom-sidebar a:hover {color:" . esc_attr($blog_writer_bottom_hover_links) . ";}	
	#site-footer {background-color:" . esc_attr($blog_writer_footer_bg) . ";}
	#site-footer, #site-footer a, #site-footer a:visited {color:" . esc_attr($blog_writer_footer_text) . ";}
	.sticky-post {background-color:" . esc_attr($blog_writer_featured_bg) . "; color:" . esc_attr($blog_writer_featured_text) . ";}
	.tagcloud a:hover, .tag-list a:hover {background-color:" . esc_attr($blog_writer_tag_hover_bg) . "; border-color:" . esc_attr($blog_writer_tag_hover_bg) . "; color:" . esc_attr($blog_writer_tag_hover_text) . ";}	
	"."\n";
	
// navigation
	$blog_writer_mobile_toggle_button = get_theme_mod( 'blog_writer_mobile_toggle_button', '#d4b48f' );	
	$blog_writer_mobile_toggle_label = get_theme_mod( 'blog_writer_mobile_toggle_label', '#fff' );
	$blog_writer_mobile_toggle_button_on = get_theme_mod( 'blog_writer_mobile_toggle_button_on', '#0f0f0f' );
	$blog_writer_mobile_toggle_label_on = get_theme_mod( 'blog_writer_mobile_toggle_label_on', '#fff' );
	$blog_writer_mobile_menu_lines = get_theme_mod( 'blog_writer_mobile_menu_lines', '#d1d1d1' );
	$blog_writer_menu_links = get_theme_mod( 'blog_writer_menu_links', '#1a1a1a' );
	$blog_writer_menu_hover_links = get_theme_mod( 'blog_writer_menu_hover_links', '#d6b895' );
	$blog_writer_menu_active_link_border = get_theme_mod( 'blog_writer_menu_active_link_border', '#d6b895' );
	$blog_writer_submenu_dropdown_arrow_hover = get_theme_mod( 'blog_writer_submenu_dropdown_arrow_hover', '#d6b895' );	
	$custom .= ".menu-toggle {background-color:" . esc_attr($blog_writer_mobile_toggle_button) . "; border-color:" . esc_attr($blog_writer_mobile_toggle_button) . "; color:" . esc_attr($blog_writer_mobile_toggle_label) . ";}	
	.menu-toggle.toggled-on, .menu-toggle.toggled-on:hover, .menu-toggle.toggled-on:focus {background-color:" . esc_attr($blog_writer_mobile_toggle_button_on) . "; border-color:" . esc_attr($blog_writer_mobile_toggle_button_on) . "; color:" . esc_attr($blog_writer_mobile_toggle_label_on) . ";}	
	.toggled-on .main-navigation li {border-color:" . esc_attr($blog_writer_mobile_menu_lines) . ";}	
	.main-navigation a, .dropdown-toggle {color:" . esc_attr($blog_writer_menu_links) . ";}
	.main-navigation li:hover > a,	.main-navigation li.focus > a {color:" . esc_attr($blog_writer_menu_hover_links) . ";}
	.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a {border-color:" . esc_attr($blog_writer_menu_active_link_border) . ";}	
	.dropdown-toggle:hover,.dropdown-toggle:focus {color:" . esc_attr($blog_writer_submenu_dropdown_arrow_hover) . ";}
	"."\n";	
	
// forms
	$blog_writer_button = get_theme_mod( 'blog_writer_button', '#cea26d' );
	$blog_writer_button_label = get_theme_mod( 'blog_writer_button_label', '#fff' );
	$blog_writer_button_hover = get_theme_mod( 'blog_writer_button_hover', '#0f0f0f' );
	$blog_writer_button_label_hover = get_theme_mod( 'blog_writer_button_label_hover', '#fff' );	
	$custom .= ".button, .image-navigation a, .image-navigation a:visited,.page .edit-link a,.page .edit-link a:visited, button,  button:visited,  input[type=button],  input[type=button]:visited,  input[type=reset],  input[type=reset]:visited, input[type=submit],  input[type=submit]:visited {background-color:" . esc_attr($blog_writer_button) . "; border-color:" . esc_attr($blog_writer_button) . "; color:" . esc_attr($blog_writer_button_label) . ";}	
	.search-circle, .search-rectangle {border-color:" . esc_attr($blog_writer_button_label) . ";}
	.search-circle:hover, .search-rectangle:hover {border-color:" . esc_attr($blog_writer_button_label_hover) . ";}	
	.button:hover,.button:focus,.image-navigation a:hover,.image-navigation a:focus,.page .edit-link a:focus,.page .edit-link a:hover,button:hover,button:focus,input[type=button]:hover,input[type=button]:focus,input[type=reset]:hover,input[type=reset]:focus,input[type=submit]:hover,input[type=submit]:focus {background-color:" . esc_attr($blog_writer_button_hover) . "; border-color:" . esc_attr($blog_writer_button_hover) . "; color:" . esc_attr($blog_writer_button_label_hover) . ";}		
	.about-icon, .about-icon:visited {background-color:" . esc_attr($blog_writer_button) . "; color:" . esc_attr($blog_writer_button_label) . ";}	
	.about-icon:hover {background-color:" . esc_attr($blog_writer_button_hover) . "; color:" . esc_attr($blog_writer_button_label_hover) . ";}
	"."\n";
		
// dropcap		
if( esc_attr(get_theme_mod( 'blog_writer_show_dropcap', false ) ) ) :
	$blog_writer_dropcap_colour = get_theme_mod( 'blog_writer_dropcap_colour', '#333' );		
	$custom .= ".single-post .entry-content > p:first-of-type::first-letter {
	font-weight: 700;
	font-style: normal;
	font-family: \"Times New Roman\", Times, serif;
	font-size: 5.25rem;
	font-weight: normal;
	line-height: 0.8;
	float: left;
	margin: 4px 0 0;
	padding-right: 8px;
	text-transform: uppercase;
	}
	.single-post .entry-content h2 ~ p:first-of-type::first-letter {
		font-size: initial;	
		font-weight: initial;	
		line-height: initial; 
		float: initial;	
		margin-bottom: initial;	
		padding-right: initial;	
		text-transform: initial;
	}	
	.single-post .entry-content > p:first-of-type::first-letter {color:" . esc_attr($blog_writer_dropcap_colour) . "}"."\n";
endif;

 
// END CUSTOM CSS
//Output all the styles
	wp_add_inline_style( 'blog-writer-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'blog_writer_inline_styles' );	