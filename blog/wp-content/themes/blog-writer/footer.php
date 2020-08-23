<?php
/**
 * The template for displaying the footer
 * @package Blog_Writer
 */
?>

		</div><!-- .row -->
	</div><!-- #content -->

<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>
	
	<footer id="site-footer">
		<div class="container site-info">
			<div class="row align-items-center">
				<div class="col-lg-6 copyright">
					<?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>
					<?php get_template_part( 'template-parts/navigation/nav', 'footer' ); ?>		
					<?php esc_html_e('Copyright &copy;', 'blog-writer'); ?> 
					<?php echo date_i18n( __( 'Y', 'blog-writer' ) ); // WPCS: XSS OK ?>
					<?php echo esc_html(get_theme_mod( 'blog_writer_copyright' )); ?>. <?php esc_html_e('All rights reserved.', 'blog-writer'); ?>
				</div>
				<div class="col-lg-6 footer-social">
				<?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
