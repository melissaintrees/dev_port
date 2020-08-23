<?php
/**
 * Template Name: Home Page
 *
 * This page is display all sections of homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
	        	if( is_active_sidebar( 'flexible-lite-frontpage-widget-area' ) ) {
	            	if ( !dynamic_sidebar( 'flexible-lite-frontpage-widget-area' ) ):
	            	endif;
	         	}
	        ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();