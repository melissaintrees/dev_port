<?php
/**
 * Template part for displaying post navigation - next and previous posts
 * @package Blog_Writer
*/

the_post_navigation( array(
	'next_text' => '<p class="meta-nav clear" aria-hidden="true">' . esc_html__( 'Next', 'blog-writer' ) . '<span class="nav-arrow-next">&raquo;</span></p> ' .
		'<p class="screen-reader-text">' . esc_html__( 'Next post:', 'blog-writer' ) . '</p> ' .
		'<p class="post-title">%title</p>',
	'prev_text' => '<p class="meta-nav clear" aria-hidden="true"><span class="nav-arrow-prev">&laquo;</span>' . esc_html__( 'Previous', 'blog-writer' ) . '</p> ' .
		'<p class="screen-reader-text">' . esc_html__( 'Previous post:', 'blog-writer' ) . '</p> ' .
		'<p class="post-title">%title</p>',
) );	
							
?>