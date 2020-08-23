<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package mistu
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<button class="sidebar-toggle"><?php esc_html_e( 'Show sidebar...', 'mistu' ); ?><i class="fa fa-table"></i></button>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
