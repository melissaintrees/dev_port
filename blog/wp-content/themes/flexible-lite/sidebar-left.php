<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'flexible-lite-sidebar-left' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area aside-left" role="complementary">
	<?php dynamic_sidebar( 'flexible-lite-sidebar-left' ); ?>
</aside><!-- #secondary -->
