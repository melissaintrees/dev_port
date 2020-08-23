<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hamlet-lite
 */

?>

	</div><!-- #content -->

    <div id="instagram-footer" class="container">
        <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Instagram Footer') ) ?>
    </div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf(esc_html__('Copyright %1$s %2$s %3$s', 'hamlet-lite'), '&copy;', esc_attr(date_i18n(__('Y', 'hamlet-lite'))), esc_attr(get_bloginfo())); ?>
                <span class="sep"> &ndash; </span>
            <?php printf(esc_html__('%1$s Designed & Developed by %2$s', 'hamlet-lite'), '', '<a href="' . esc_url('https://zthemes.net/', 'hamlet-lite') . '">ZThemes</a>'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
