<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blog_Writer
 */

get_header();
?>

<div id="primary" class="content-area col-lg-12">
	<main id="main" class="site-main ">
		
		<div id="error-box">
			<p id="error-type"><?php esc_html_e( '404', 'blog-writer' ); ?></p>
	
		<h1 id="error-text"><?php esc_html_e( 'Page Not Found', 'blog-writer' ); ?></h1>			

		<div id="error-content">
			<p><?php esc_html_e( 'Unfortunately, the page you were going to
appears to be missing. Use the search below to try finding it.', 'blog-writer' ); ?></p>
			
		</div>	
		<?php get_search_form(); ?>
		</div>
		
	</main>
</div>

<?php
get_footer();