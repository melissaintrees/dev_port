<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package hamlet-lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hamlet_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'hamlet_lite_body_classes' );

/**
 * Custom excerpt more
 */

function hamlet_lite_custom_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'hamlet_lite_custom_excerpt_more' );


/**
 * Custom styling
 *
 * @return string
 */
function hamlet_lite_get_custom_style(){
    $css = '';
    $primary_color = esc_attr( get_theme_mod( 'hamlet_lite_color_accent' ) );
    if ( $primary_color ) {
        $primary_color = '#'.$primary_color;

        /**
         * @TODO beautiful output code
         */
$css .= '
a {
    color: '.$primary_color.';
}
.entry-cate a, .widget-title, .entry-tags  a:hover, .instagram-title {
	color: '.$primary_color.';
}

';

    }
    return $css;
}
function hamlet_lite_get_premium_url(){
    return 'https://zthemes.net/themes/hamlet';
}