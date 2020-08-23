<!-- Slider Area -->
<?php if(get_theme_mod('creative_company_page1')): ?>
<section id="slider">
	<div class="single-slider" >
		<div id="particles-js">
			<canvas class="particles-js-canvas-el" width="1349" height="630" style="width: 100%; height: 100%;"></canvas>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text">
						<?php $post = get_post(get_theme_mod('creative_company_page1'));
						setup_postdata($post); ?>
						<h1 class="cd-headline clip is-full-width">
							<?php the_title(); ?>
							<span class="cd-words-wrapper" id="<?php echo esc_attr(get_theme_mod( 'creative_company_page_text' ));?>">
							</span>
						</h1>
						<?php the_excerpt(); ?>
						<div class="button-head">
							<div class="button">
								<span></span>
								<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Load More','creative-company'); ?></a>
							</div>
						</div>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
		<!--/ End Slider Area -->