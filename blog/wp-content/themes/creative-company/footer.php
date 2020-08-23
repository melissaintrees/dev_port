<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creative-company
 */

?>

<?php get_template_part('section-parts/section','client'); ?>

<!-- Footer Area -->
<footer id="footer" class="footer section">
	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		<!--/ End Footer Top -->
		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="copyright-content">
							<p><?php
							/* translators: %s: 1: Author URL. */	
    				     	printf( esc_html__( 'Creative Company by %1$s.', 'creative-company' ), '<a href="'.esc_url( 'https://samuraithemes.com' ).'" rel="designer">'.esc_html__('Samurai Themes', 'creative-company').'</a>' ); ?></p>
						</div>
					</div>
					<?php if(get_theme_mod('creative_company_social_enable')){ ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<ul class="social">
							<?php 
							$total_media         = 5;
							$creative_company_social_icon     = array();
							$creative_company_social_url      = array();
							for( $i = 1; $i <= $total_media; $i++ ) {
								$creative_company_social_icon[]   = get_theme_mod( "creative_company_social_icon_$i", "" );
								$creative_company_social_url[]    = get_theme_mod( "creative_company_social_url_$i", "" );

							}
							for( $i = 0; $i < $total_media; $i++ ) {
								?>
								<?php if(!empty ($creative_company_social_icon[$i] ) && ($creative_company_social_url[$i])){ 
										?>
										<li><a href="<?php echo esc_url( $creative_company_social_url[ $i ] ); ?>"><i class="<?php echo esc_html( $creative_company_social_icon[ $i ] ); ?>"></i></a></li>
										<?php
								}
							}
							?>
						</ul>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!--/ End Copyright -->
	</footer>
	<!--/ End Footer Area -->
	<?php wp_footer(); ?>

</body>
</html>
