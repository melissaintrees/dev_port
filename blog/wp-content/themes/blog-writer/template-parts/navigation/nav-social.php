<?php
/**
 * Displays social navigation
 * @package Blog_Writer
 */
?>

<?php	if ( has_nav_menu( 'social' ) ) : ?>
	<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Menu', 'blog-writer' ); ?>">
		<?php
			wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'social',
				'menu_class'     => 'social-menu',
				'link_before'    => '&#91; ',
				'link_after'     => ' &#93;',
				'depth'          => 1,
			) );
		?>
	</nav>
<?php endif; ?>