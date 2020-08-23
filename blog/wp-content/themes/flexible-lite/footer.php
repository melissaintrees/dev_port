<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

?>
	<?php if( ! is_page_template( 'templates/flexible-lite-home.php' ) ) { ?>
        </div><!-- .mt-container-->
    <?php } ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
			<?php get_sidebar( 'footer' ); ?>
			<div class="site-info">
				<div class="mt-container">
					<div class="flexible-lite-copyright-wrapper">
						<?php $flexible_lite_copyright_txt = get_theme_mod( 'flexible_lite_copyright_txt', __( 'Flexible Lite', 'flexible-lite' ) ); ?>
						<span class="flexible-lite-copyright"><?php echo wp_kses_post( $flexible_lite_copyright_txt ); ?></span>
						<span class="sep"> | </span>
						<?php printf( esc_html__( '%1$s by %2$s.', 'flexible-lite' ), 'Flexible Lite Theme', '<a href="'. esc_url( 'http://mysterythemes.com/wp-themes/flexible/' ).'" rel="designer">Mystery Themes</a>' ); ?>
					</div>
					<div class="flexible-lite-social-media">
						<?php flexible_lite_social_media(); ?>
					</div><!-- .flexible-lite-social-media -->
				</div>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div id="mt-scrollup" class="animated arrow-hide"><i class="fa fa-chevron-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
