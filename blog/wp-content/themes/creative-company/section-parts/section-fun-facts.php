<!-- Fun Facts Area -->
<?php if(get_theme_mod( 'create_company_counter_enable' )){ ?>
<section id="fun-facts" class="fun-facts section" data-stellar-background-ratio="0.5">
	<div class="bf-color">
		<div class="container">
			<div class="row">
				<?php 
				$counter_no         = 4;
				$counter_titles     = array();
				$counter_icons      = array();
				$counter_number     = array();
				for( $i = 1; $i <= $counter_no; $i++ ) {
					$counter_titles[]   = get_theme_mod( "creative_company_title_$i", "" );
					$counter_icons[]    = get_theme_mod( "creative_company_icon_$i", "" );
					$counter_numbers[]  = get_theme_mod( "creative_company_number_$i", "" );
				}
				?>
				 <?php
                        for( $i = 0; $i < $counter_no; $i++ ) {
                    ?>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.4s">
					<!-- Single Fun -->
					<div class="single-fun">
						<i class="<?php if( !empty( $counter_icons[ $i ] ) ) { echo esc_html( $counter_icons[ $i ] ); } ?>" aria-hidden="true"></i>
						<span class="counter"><?php if( !empty( $counter_numbers[ $i ] ) ) { echo esc_html( $counter_numbers[ $i ] ); } ?></span>
						<p><?php if( !empty( $counter_titles[ $i ] ) ) { echo esc_html( $counter_titles[ $i ] ); } ?></p>
					</div>
					<!--/ End Single Fun -->
				</div>
				<?php
                        }
                    ?>
				
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!--/ End Fun Facts Area -->