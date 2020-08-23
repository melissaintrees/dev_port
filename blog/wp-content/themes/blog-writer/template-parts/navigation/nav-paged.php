<?php
/**
 * Template part for displaying posts split into multiple pages
 * @package Blog_Writer
*/

wp_link_pages( array(
	'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'blog-writer' ),
	'after'       => '</div>',
	'link_before' => '<span class="page-number">',
	'link_after'  => '</span>',
) );
							
?>