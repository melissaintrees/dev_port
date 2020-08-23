<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creative-company
 */

get_header();
?>
<!-- Blog -->
		<section id="blog" class="archive section">
			<div class="container">
				<div class="row">
							<?php
							if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) :
									?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
									<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'archive' );

								endwhile;?>
								<?php	else :

								get_template_part( 'template-parts/content', 'none' );
								endif;
								?>	


								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="pagination-head">
										<div class="pagination">
											<?php the_posts_pagination(); ?>
										</div>
									</div>
								</div>
				
					</div> <!-- end of row -->
									
			</div>
		</section>	

<?php 
get_footer(); ?>