<!-- contact Area -->
<?php if(get_theme_mod( 'creative_company_contact_enable' )){ ?>
<section id="contact" class="contact section" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="contact-head">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="contact-left">
						<?php if(get_theme_mod( 'creative_company_contact_page' )){ ?>
						<?php $post = get_post(get_theme_mod('creative_company_contact_page'));
						setup_postdata($post); ?>
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
						<?php wp_reset_postdata(); } ?>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="contact-right">
						<div class="row">
							<?php echo do_shortcode(get_theme_mod('creative_comapny_form_shortcode'));?>
						</div>
						<!--/ End Contact Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!--/ End contact Area -->