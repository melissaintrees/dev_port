<?php
/**
 * File to define the custom hook functions 
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.3
 *
 */


/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Flexible Lite front slider
 */
add_action( 'flexible_lite_front_slider', 'flexible_lite_front_slider_cb', 10 );

if( !function_exists( 'flexible_lite_front_slider_cb' ) ) :
	function flexible_lite_front_slider_cb() {
?>
	<section class="flexible-lite-front-slider">
		<?php
			$flexible_lite_slider_category = get_theme_mod( 'flexible_lite_slider_cat_id', '0' );
			$slider_args = array(
					'cat' => $flexible_lite_slider_category
				);
			$slider_query = new WP_Query( $slider_args );
			if( $slider_query->have_posts() ) {
				echo '<div id="homeSlider">';
				while( $slider_query->have_posts() ) {
					$slider_query->the_post();
					if( has_post_thumbnail() ) {
		?>
					<div class="front-slide">
						<?php the_post_thumbnail( 'full' ); ?>
	                    <!-- <div class="slider-overlay"> </div> -->
						<div class="slider-caption-wrapper">
							<h2 class="slide-caption"><?php the_title(); ?></h2>
							<div class="slide-content"><?php the_content(); ?></div>
						</div><!-- .slider-caption-wrapper -->
					</div><!-- .front-slide -->
		<?php
					}
				}
				echo '</div>';
			}
			wp_reset_query();
		?>
	</section>
<?php
	}
endif;