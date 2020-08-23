<!-- Team -->
<?php if(get_theme_mod( 'creative_company_team_enable' )){ 
$team_cat = esc_attr(get_theme_mod('creative_company_team_section_category',''));	?>
<section id="team" class="section">
	<div class="container">
		<?php if(get_theme_mod( 'creative_company_team_page' )){ ?>
		<?php $post = get_post(get_theme_mod('creative_company_team_page'));
		setup_postdata($post); ?>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php  wp_reset_postdata(); } ?>
		<div class="row">
			<?php
			if($team_cat):
	            $i=0;
	            $args_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' =>6, 'category_name' => $team_cat));
	            if ($args_query->have_posts()) :?>
		                <?php
		                     while ($args_query->have_posts()):
		                        $args_query->the_post();
		                        $team_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'creative_company-team-thumb');
		                            $i++;
		                             ?>
		                            <div class="col-md-3 col-sm-6 col-xs-12 <?php if($i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
		                                    <?php if(has_post_thumbnail()): ?>
		                                    <div class="single-team">
		                                        <div class="team-head">
		                                            <img src="<?php echo esc_url($team_image[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
		                                        </div>
		                                         <?php endif; ?>
		                                         <div class="t-name">
		                                                <h4 class="team-caption-title"><?php the_title();?></h4>
		                                          </div>
		                                      </div>    
		                                </div>

		                         <?php
		                        endwhile;
		                       wp_reset_postdata();?>
	                     <?php 
	                 endif;
	            endif;?>
		   </div>
	</div>
</section>
<?php } ?>
<!--/ End Team -->