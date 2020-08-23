<!-- Clients Area -->
<?php if(get_theme_mod( 'creative_company_brand_enable' )){ ?>
<div id="clients" class="clients section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="owl-carousel clients-slider">
					<?php 
					$brand_category		= get_theme_mod( 'creative_company_brand_categories' );

					$brand_args			= array(
						'post_type'				=> 'post',
						'cat'					=> absint( $brand_category ),
						'posts_per_page'		=> 10,
						'ignore_sticky_posts'	=> 1,
					);
					$brand_query		= new WP_Query( $brand_args );
					if($brand_query->have_posts() ) :
						while( $brand_query->have_posts() ) :
							$brand_query->the_post();
							if( has_post_thumbnail() ) :

								?>
								<!-- Single Clients -->
								<div class="single-clients">
									<?php the_post_thumbnail( ); ?>	
								</div>
								<!--/ End Single Client -->
								<?php
							endif; endwhile; endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<!--/ End Clients Area -->