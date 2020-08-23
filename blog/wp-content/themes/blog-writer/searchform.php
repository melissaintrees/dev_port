<?php
/**
 * Template for displaying the search form
 * Uses CSS for the search icon
 * @package Blog_Writer
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'blog-writer' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'Search field placeholder label', 'blog-writer' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
	
	<div class="search-circle"></div>
    <div class="search-rectangle"></div>
	
	<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'Submit button', 'blog-writer' ); ?></span></button>
</form>