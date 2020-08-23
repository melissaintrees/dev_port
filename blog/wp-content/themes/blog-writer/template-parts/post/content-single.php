<?php
/**
 * The default template for displaying the full post
 * @package Blog_Writer
*/
?>

<?php
while ( have_posts() ) : the_post(); ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">		
		<?php	the_title( '<h1 class="entry-title">', '</h1>' );									
			if ( 'post' === get_post_type()) {
			echo '<ul class="entry-meta">';		
				blog_writer_posted_on();
				blog_writer_posted_by();	
				blog_writer_categories();
				blog_writer_comments_count();	
				if ( esc_attr(get_theme_mod( 'blog_writer_show_edit_link', false ) ) ) :				
					blog_writer_edit_link();
				endif;
			echo '</ul>';
		};
		?>												
	</header>	
	
	<?php	if ( '' !== get_the_post_thumbnail() && esc_attr(get_theme_mod( 'blog_writer_show_single_featured', 1 ) ) ) :  
	echo '<div class="featured-image">';		
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));		
	echo '</div>';			
	endif; 
	?>

	
	<div class="entry-content post-width">
		<?php	the_content();?>	
	</div>
	
	<?php if ( esc_attr(get_theme_mod( 'blog_writer_show_post_tags', 1 )) ) : ?>		
		<div id="entry-footer" class="post-width">
			<?php	blog_writer_entry_footer();	?>
		</div>
	<?php endif; ?>

</article>

<div class="post-width">
<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) && esc_attr(get_theme_mod( 'blog_writer_show_author_bio', true ) ) ) :
		get_template_part( 'author-bio' );
	endif;
?>

<?php
	// Related Posts.
	if( esc_attr(get_theme_mod( 'blog_writer_show_related_posts', true ) ) ) :
	 get_template_part( 'inc/related-posts' );
	endif;
?>
					  
<?php 	// single post navigation
	if ( esc_attr(get_theme_mod( 'blog_writer_show_post_nav', true )) ) :
		get_template_part( 'template-parts/navigation/nav', 'post' );
	endif;
?>	

<?php 
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>
</div>