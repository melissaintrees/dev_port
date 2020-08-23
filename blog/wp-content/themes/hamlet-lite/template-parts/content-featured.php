<div class="featured-area container">
		
	<div id="owl-demo" class="owl-carousel">
		
		<?php

			if( get_theme_mod( 'hamlet_lite_featured_number' ) )
				$hamlet_lite_featured_number = get_theme_mod( 'hamlet_lite_featured_number' );
			else
				$hamlet_lite_featured_number = 4;
		
		?>
		
		<?php $feat_query = new WP_Query( array( 'cat' => '', 'showposts' => $hamlet_lite_featured_number ) ); ?>

		<?php if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); ?>

			<div class="item" style="background-image:url(<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'hamlet-lite-slider-thumb' ); if(!$image) { echo esc_url(get_template_directory_uri() . '/img/slider-default.jpg'); } else { echo esc_url($image[0]); } ?>);">

				<div class="feat-overlay">
					<div class="feat-text">
						<span class="feat-cat"><?php the_category(', '); ?></span>
						<h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
					</div>
				</div>

			</div>
			
		<?php endwhile; endif; ?>

		<?php wp_reset_postdata(); ?>

	</div>
	
</div>