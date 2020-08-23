<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package creative-company
 */

get_header();
?>
<!-- Blog -->
		<section id="blog" class="archive section">
			<div class="container">
				<div class="row">
							
									<header>
										<h1>
										<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'creative-company' ), '<span>' . get_search_query() . '</span>' );
										?>
									</h1>
									</header>
						<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile;?>
								<?php	else :

								get_template_part( 'template-parts/content', 'none' );
								endif;
								?>	
					</div> <!-- end of row -->
									
			</div>
		</section>	
<?php
get_footer(); 


