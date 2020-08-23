<?php
/**
 * For displaying breadcrumbs
 * @package Blog_Writer
*/

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="breadcrumbs">
				<?php dynamic_sidebar( 'breadcrumbs' ); ?>
			</div>
		</div>
	</div>
</div>