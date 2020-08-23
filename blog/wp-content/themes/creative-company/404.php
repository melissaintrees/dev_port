<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package creative-company
 */

get_header();
?>
<?php get_template_part( 'template-parts/content','breadcrumb' );?>

		<!-- 404 Error Page -->
		<section class="error section">
			<div class="table">
				<div class="table-cell">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="error-left">
									<h2><?php esc_html_e('404','creative-company'); ?></h2>
									<p><span><?php esc_html_e('Opps!','creative-company'); ?></span><?php esc_html_e('Page Not Found!','creative-company'); ?></p>
									<p class="p2"><?php esc_html_e( 'Sorry the Page Could not be Found here.<br>Try using the button below to go to main page of the site','creative-company' ); ?></p>
									<div class="button-head">
										<div class="button">
											<span></span>
											<a href="<?php echo esc_url(home_url()); ?>" class="btn"><?php esc_html_e( 'Go Back','creative-company' ); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End 404 Error Page -->
<?php get_template_part('section-parts/section','client'); ?>


<?php
get_sidebar();
get_footer();
