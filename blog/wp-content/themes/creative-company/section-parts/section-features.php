<!-- features Area -->
<?php if(get_theme_mod('creative_company_features_enable')){ ?>
<section id="features" class="section">
	<div class="container">
		<?php $post = get_post(get_theme_mod('creative_company_features_page'));
		setup_postdata($post); ?>
		<?php if(get_theme_mod('creative_company_features_page')): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2><?php the_title(); ?></h2>
					<?php the_content() ;?>
				</div>
			</div>
		</div>
	<?php endif; ?>
		<?php wp_reset_postdata();  ?>
		<div class="row">
			<?php $post = get_post(get_theme_mod('creative_company_features_page'));
			setup_postdata($post); ?>
			<?php if(get_theme_mod('creative_company_features_page')): ?>
			<div class="col-md-6 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.9s">
				<div class="feature-left">
					<?php the_post_thumbnail(); ?>
				</div>	
			</div>
		<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			<div class="col-md-6 col-sm-12 col-xs-12 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.9s">
				<div class="feature-right">
					<?php $post = get_post(get_theme_mod('creative_company_features_page1'));
					setup_postdata($post); ?>
					<?php if(get_theme_mod('creative_company_features_page1')): ?>
					<div class="single-right">
						<?php if(get_theme_mod('creative_company_features_icon1')): ?>
						<i class="<?php echo esc_html( get_theme_mod('creative_company_features_icon1') ); ?>" aria-hidden="true"></i>
					<?php endif; ?>
						<div class="right-content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<?php $post = get_post(get_theme_mod('creative_company_features_page2'));
					setup_postdata($post); ?>
					<?php if(get_theme_mod('creative_company_features_page2')): ?>
					<div class="single-right">
						<?php if(get_theme_mod('creative_company_features_icon2')): ?>
						<i class="<?php echo esc_html( get_theme_mod('creative_company_features_icon2') );  ?>" aria-hidden="true"></i>
					<?php endif; ?>
						<div class="right-content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<?php $post = get_post(get_theme_mod('creative_company_features_page3'));
					setup_postdata($post); ?>
					<?php if(get_theme_mod('creative_company_features_page3')): ?>
					<div class="single-right">
						<?php if(get_theme_mod('creative_company_features_icon3')): ?>
						<i class="<?php echo esc_html( get_theme_mod('creative_company_features_icon3') );  ?>" aria-hidden="true"></i>
					<?php endif; ?>
						<div class="right-content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<?php $post = get_post(get_theme_mod('creative_company_features_page4'));
					setup_postdata($post); ?>
					<?php if(get_theme_mod('creative_company_features_page4')): ?>
					<div class="single-right">
						<?php if(get_theme_mod('creative_company_features_icon4')): ?>
						<i class="<?php echo esc_html( get_theme_mod('creative_company_features_icon4') );  ?>" aria-hidden="true"></i>
					<?php endif; ?>
						<div class="right-content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
		<!--/ End features Area -->