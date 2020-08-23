<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package Blog_Writer
 */

 

// Add a pingback url auto-discovery header for single posts, pages, or attachments.
function blog_writer_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blog_writer_pingback_header' );


//	Move the Continue Reading link outside of the post summary paragraph	
add_filter( 'the_content_more_link', 'blog_writer_move_more_link' );
	function blog_writer_move_more_link() {
	return '<p class="more-link-wrapper"><a class="readmore" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Continue Reading', 'blog-writer' ) . '</a></p>';
}
	
// Replaces the excerpt "Read More" text by a link
function blog_writer_excerpt_more($more) {
       global $post;
	return '<a class="excerpt-readmore" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__( '&hellip;Continue Reading', 'blog-writer' ) . '</a>';
}
add_filter('excerpt_more', 'blog_writer_excerpt_more');
	
	
// Custom excerpt size
function blog_writer_custom_excerpt_length( $length ) { 
	$blog_writer_excerpt_size = esc_attr(get_theme_mod( 'blog_writer_excerpt_size', '35' ));
	if ( is_admin() ) :
		return 55;		
	else: 	
		return $blog_writer_excerpt_size;
	endif;
	}
add_filter( 'excerpt_length', 'blog_writer_custom_excerpt_length', 999 );

	
// Display the related posts
if ( ! function_exists( 'blog_writer_related_posts' ) ) {

   function blog_writer_related_posts() {
      wp_reset_postdata();
      global $post;

      // Define shared post arguments
      $args = array(
         'no_found_rows'            => true,
         'update_post_meta_cache'   => false,
         'update_post_term_cache'   => false,
         'ignore_sticky_posts'      => 1,
         'orderby'               => 'rand',
         'post__not_in'          => array($post->ID),
         'posts_per_page'        => 3
      );
      // Related by categories
      if ( esc_attr(get_theme_mod('blog_writer_related_posts', 'categories') == 'categories' ) ) {

         $cats = get_post_meta($post->ID, 'related-posts', true);

         if ( !$cats ) {
            $cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
            $args['category__in'] = $cats;
         } else {
            $args['cat'] = $cats;
         }
      }
      // Related by tags
      if ( esc_attr( get_theme_mod('blog_writer_related_posts', 'categories') == 'tags' ) ) {

         $tags = get_post_meta($post->ID, 'related-posts', true);

         if ( !$tags ) {
            $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
            $args['tag__in'] = $tags;
         } else {
            $args['tag_slug__in'] = explode(',', $tags);
         }
         if ( !$tags ) { $break = true; }
      }

      $query = !isset($break)?new WP_Query($args):new WP_Query;
      return $query;
   }

}