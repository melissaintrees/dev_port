<!-- Pricing Table -->
<?php if(get_theme_mod( 'creative_company_table_enable' )){ ?>
<section id="table" class="p-table4 section">
	<div class="container">
		<?php if(get_theme_mod( 'creative_company_table_page' )){ ?>
		<?php $post = get_post(get_theme_mod('creative_company_table_page'));
		setup_postdata($post); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); } ?>
		<div class="row">
			<?php if ( is_active_sidebar( 'pricing-table' ) ) : ?>		
			<!-- Single Table -->
					<?php dynamic_sidebar( 'pricing-table' ); ?>
			<!-- End Single Table-->
		<?php endif; ?>
		</div>	
	</div>	
</section>	
<?php } ?>
<!--/ End Pricing Table -->