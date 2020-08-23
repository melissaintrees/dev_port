<!-- Testimonials -->
<?php if(get_theme_mod( 'creative_company_testimonial_enable' )){ ?>
<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
	<section class="bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="owl-carousel testimonial-slider">
						<?php 

						$testimonial		= get_theme_mod( 'creative_company_testimonial_categories' );

						$testimonial_args			= array(
							'post_type'				=> 'post',
							'cat'					=> absint( $testimonial ),
							'posts_per_page'		=> 5,
						);
						$testimonial_query		= new WP_Query( $testimonial_args );

						if($testimonial_query->have_posts() ) :
							?>
							<!-- Project Nav -->
							<?php
							while( $testimonial_query->have_posts() ) :
								$testimonial_query->the_post(); ?>
								<div class="single-testimonial" >
									<?php the_post_thumbnail( ); ?>	
									<h2>
										<i>
											<?php esc_html_e('What Clients  Says','creative-company'); ?>		
										</i>
									</h2>
									
									<p>
										<i class="fa fa-quote-left" aria-hidden="true"></i>
									</p>
										<?php echo the_excerpt(); ?>
										<p>
										<i class="fa fa-quote-right" aria-hidden="true"></i>
									</p>
									
									<span>
										<?php esc_html_e( ' - ','creative-company'); echo the_title(); ?>
									</span>
								</div>
							<?php endwhile;  ?>
							<!--/ End Project Nav -->
						<?php endif; wp_reset_postdata($testimonial_query); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<?php } ?>
<!--/ End Testimonials -->