<!-- Latest Works Area -->
<?php 
if(get_theme_mod( 'creative_company_work_enable' )){
?>
<section id="latest-works" class="latest-works section">
	<div class="container">
		<?php if(get_theme_mod('creative_company_work_page1')){ ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php
					$project_title = get_theme_mod('creative_company_work_page1');
					$queried_post = get_post($project_title);
					?>
					<h2><?php echo esc_html($queried_post->post_title); ?></h2>
					<p><?php echo esc_html($queried_post->post_content); ?></p>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php 
				$project_category_id = get_theme_mod( 'creative_company_work_section_category' );
		
				$args = array('child_of' => $project_category_id);
				$categories = get_categories( $args );?>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					
						<!-- Project Nav -->
						<div class="works-menu wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
							<ul>
								<li class="active" data-filter="*"><?php esc_html_e('All Works','creative-company');?> </li>
								<?php
									foreach($categories as $category):?>
										<li data-filter=".<?php echo esc_attr($category->slug);?>"><?php echo esc_html($category->name);?></li>
										<?php
									endforeach;
								?>
							</ul>
						</div>
						<!--/ End Project Nav -->
					
				</div>
			</div>
			<div class="row">
				<div class="isotop-active">
					<?php 
			    $sub_cats = get_categories('parent=' . $project_category_id);
			    if( $sub_cats ) :
			        foreach( $sub_cats as $sub_cat ) :
			            $sub_query = new WP_Query( array(
			                'category__in' => array( $sub_cat->term_id ),
			                'posts_per_page' => 6)
			            );
			            if ( $sub_query->have_posts() ) :
			                while( $sub_query->have_posts() ) : $sub_query->the_post();?>
						<div class="col-md-4 col-sm-4 col-xs-12 <?php echo  esc_attr($sub_cat->slug);?>">
							<!-- Single Works -->
							<div class="single-work">
								<?php
								if( has_post_thumbnail() ) :
									the_post_thumbnail('creative_company_360_280');
								endif;
								?>
								<div class="works-hover">
									<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
									<a class="link popup" href=" <?php echo esc_url(get_the_post_thumbnail_url());?> "><i class="fa fa-picture-o" aria-hidden="true"></i></a>
									
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
								</div>
							</div>
							<!--/ End Single Project -->
						</div>
						<?php endwhile;
			            endif;
			        endforeach;
			    endif;
				?>
				</div>
			</div>

		<div class="row">
			<div class="col-md-12">
				<div class="button-head">
					<div class="button">
						<span></span>
						<a href="<?php echo esc_url(get_category_link($project_category_id ));?>" class="btn"><?php esc_html_e( 'Load More','creative-company'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!--/ End Works Area -->