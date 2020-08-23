<?php
/**
 * Template file for the grid blog content
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Writer
 */

?>

<?php if ( is_home() || is_front_page() ) : ?>	
	<header id="page-header" class="screen-reader-text">
		<h2 class="page-title"><?php esc_html_e( 'Posts', 'blog-writer' ); ?></h2>
	</header>
<?php else : ?>
		<header id="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="description lead">', '</div>' );
		?>
	</header>	
<?php endif; ?>

<ul id="grid" class="row row-eq-height">	
<?php if ( have_posts() ) :
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>
			
		
			<li class="col-lg-6">	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					<?php if ( '' !== get_the_post_thumbnail() ) : ?>
						<div class="featured-image">
						
						<?php if( is_sticky()  && esc_attr(get_theme_mod( 'blog_writer_show_featured_tag', true ) ) ) : 
							echo '<div class="sticky-post">', esc_html_e('Featured', 'blog-writer'), '</div>';
							endif; ?>
							
							<a href="<?php esc_url(the_permalink()); ?>">			
								<?php 
								if ( esc_attr(get_theme_mod( 'blog_writer_default_thumbnails', false )) ) :
									the_post_thumbnail( 'blog-writer-grid' );  
								else :
									the_post_thumbnail( 'post-thumbnails' ); 
								endif;				
								?>
							</a>							
							
						</div>
					<?php endif; ?>
					
					<div class="card-body">
					<header class="entry-header">	
	
						<?php // get the post title and posted date info
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );							
							if ( 'post' === get_post_type() ) {
								echo '<ul class="entry-meta">';
								if( esc_attr(get_theme_mod( 'blog_writer_show_post_date', true ) ) ) :
									blog_writer_posted_on();
								endif;	
								if( esc_attr(get_theme_mod( 'blog_writer_show_post_author', true ) ) ) :	
									blog_writer_posted_by();
								endif;	
								if( esc_attr(get_theme_mod( 'blog_writer_show_post_comments', true ) ) ) :	
									blog_writer_comments_count();
								endif;
								if ( esc_attr(get_theme_mod( 'blog_writer_show_edit_link', false ) ) ) :				
									blog_writer_edit_link();
								endif;
									echo '</ul>';
							}
						?>
											
					</header>			
						<div class="entry-content">
							<?php	the_excerpt(); ?>
						</div>				
				
					</div>
					</article>
			  </li>
			
	<?php
	endwhile;
		// moved blog nav further below
	else :	
	
	echo '<li class="col-lg-12">';
		get_template_part( 'template-parts/post/content', 'none' );
	echo '</li>';
	
	endif; ?>
</ul>

<?php get_template_part( 'template-parts/navigation/nav', 'blog' ); ?>