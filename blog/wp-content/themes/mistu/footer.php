<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package mistu
 */
?>

	<footer id="colophon" class="site-footer">
		<div class="site-info smallPart">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mistu' ) ); ?>">
			<?php
			/* translators: %s: WordPress name */
			printf( esc_html__( 'powered by %s', 'mistu' ), 'WordPress' );
			?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: theme name, 2: theme developer */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'mistu' ), '<a target="_blank" href="https://inizsoft.com/wpthemes/mistu/" rel="nofollow" title="mistu Theme">mistu</a>', 'Abhay Raj' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	</div><!-- #content -->
	
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
