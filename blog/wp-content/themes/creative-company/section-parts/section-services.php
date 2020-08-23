<!-- Start Service area -->
<?php if(get_theme_mod('creative_company_exclusive_enable')){ ?>
<section id="Services" class="section">
	<div class="container">
		<?php if(get_theme_mod('creative_company_exclusive_page')){ ?>
		<?php $post = get_post(get_theme_mod('creative_company_exclusive_page'));
		setup_postdata($post); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); } ?>
		<div class="row">
			<?php if(get_theme_mod('creative_company_exclusive_page1')){ ?>
			<?php $post = get_post(get_theme_mod('creative_company_exclusive_page1'));
			setup_postdata($post); ?>
			
			<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s">
				<div class="single-service">
					<?php if(get_theme_mod('creative_company_exclusive_icon1')){ ?>
					<i class="<?php echo esc_html( get_theme_mod('creative_company_exclusive_icon1') );  ?>" aria-hidden="true"></i>
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
			<?php  wp_reset_postdata(); } ?>
			<?php if(get_theme_mod('creative_company_exclusive_page2')){ ?>
			<?php $post = get_post(get_theme_mod('creative_company_exclusive_page2'));
			setup_postdata($post); ?>
			
			<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.5s">
				<div class="single-service">
					<?php if(get_theme_mod('creative_company_exclusive_icon2')){ ?>
					<i class="<?php echo esc_html(get_theme_mod('creative_company_exclusive_icon2'));  ?>" aria-hidden="true"></i>
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
			<?php  wp_reset_postdata(); } ?>
			<?php if(get_theme_mod('creative_company_exclusive_page3')){ ?>
			<?php $post = get_post(get_theme_mod('creative_company_exclusive_page3'));
			setup_postdata($post); ?>
			
			<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.6s">
				<div class="single-service">
					<?php if(get_theme_mod('creative_company_exclusive_icon3')){ ?>
					<i class="<?php echo esc_html(get_theme_mod('creative_company_exclusive_icon3'));  ?>" aria-hidden="true"></i>
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
			<?php  wp_reset_postdata(); } ?>
			<?php if(get_theme_mod('creative_company_exclusive_page4')){ ?>
			<?php $post = get_post(get_theme_mod('creative_company_exclusive_page4'));
			setup_postdata($post); ?>
			
			<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.7s">
				<div class="single-service">
					<?php if(get_theme_mod('creative_company_exclusive_icon4')){ ?>
					<i class="<?php echo esc_html( get_theme_mod('creative_company_exclusive_icon4') );  ?>" aria-hidden="true"></i>
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
			<?php  wp_reset_postdata(); } ?>
			<?php if(get_theme_mod('creative_company_exclusive_page5')){ ?>
			<?php $post = get_post(get_theme_mod('creative_company_exclusive_page5'));
			setup_postdata($post); ?>
			
			<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.8s">
				<div class="single-service">
					<?php if(get_theme_mod('creative_company_exclusive_icon5')){ ?>
					<i class="<?php echo esc_html( get_theme_mod('creative_company_exclusive_icon5') );  ?>" aria-hidden="true"></i>
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
			<?php  wp_reset_postdata(); } ?>
			<?php if(get_theme_mod('creative_company_exclusive_page6')){ ?>
			<?php $post = get_post(get_theme_mod('creative_company_exclusive_page6'));
			setup_postdata($post); ?>
			
			<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.9s">
				<div class="single-service">
					<?php if(get_theme_mod('creative_company_exclusive_icon6')){ ?>
					<i class="<?php echo esc_html(get_theme_mod('creative_company_exclusive_icon6'));  ?>" aria-hidden="true"></i>
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
			<?php  wp_reset_postdata(); } ?>
		</div>
	</div>
</section>
<?php }?>
		<!-- End Service -->