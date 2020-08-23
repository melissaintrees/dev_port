<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'flexible-lite' ); ?></h1>
				</header><!-- .page-header -->
				<div class="eroor-num"> <?php esc_html_e( '404', 'flexible-lite' ); ?> <span><?php esc_html_e( 'error', 'flexible-lite' );?></span> </div>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try to a search?', 'flexible-lite' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
flexible_lite_get_sidebar();
get_footer();
