<?php
/**
 * Template part for the blog navigation - previous and next
 * @package Blog_Writer
*/

the_posts_pagination( array(
	'prev_text' => '<span class="prev"><span class="nav-arrow">&laquo;</span>' . esc_html__( ' Previous page', 'blog-writer' ) . '</span>',
	'next_text' => '<span class="next">' . esc_html__( 'Next page', 'blog-writer' ) . '<span class="nav-arrow">&raquo;</span></span>',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'blog-writer' ) . ' </span>',
) );


?>