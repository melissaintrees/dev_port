<!-- Blog -->
<?php if(get_theme_mod( 'creative_company_news_enable' )){ ?>
<section id="blog" class="section">
	<div class="container">
		<?php if(get_theme_mod( 'creative_company_news_page1' )){ ?>
		<?php $post = get_post(get_theme_mod('creative_company_news_page1'));
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
		<?php 
		$categories_id 				= get_theme_mod( 'creative_company_news_section_category' );
		
			$news_args 					= array(
				'post_type'             => 'post',
				'posts_per_page'        => 3,
				'cat'                   => $categories_id,
				'ignore_sticky_posts'   => 1,
			);
			$news_query			= new WP_Query( $news_args );
			if( $news_query->have_posts() ){
		?>
		<div class="row">
			<?php 
				while( $news_query->have_posts() ) {
            			$news_query->the_post();
			?>
			<div class="col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.4s">
				<div class="single-news">
					
					<?php if( has_post_thumbnail() ){ ?>
					<div class="news-head">
						<p class="date"><?php echo get_the_date(); ?></p>
						<?php the_post_thumbnail('creative_company_360_250'); ?>
					</div>
					<?php } ?>
					<div class="news-body">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="title"><span class="user"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_attr( get_the_author_meta() ); ?></span>
						<span class="author_post"><?php  echo esc_url(the_author_posts_link()); ?></span>
						 <span class="comment"><i class="fa fa-comment-o"></i><?php comments_number( 'No Comment', 'One Comment', '% Comments' ); ?></span></div>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e( 'Read More','creative-company' ) ?><i class="fa fa-caret-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<?php }  ?>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="button-head">
					<div class="button">
						<span></span>
						
						<a href="<?php echo esc_url(get_category_link( $news_args['cat'])); ?>" class="btn"><?php esc_html_e( 'Load More','creative-company' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php } wp_reset_postdata($news_query); ?>
	</div>
</section>
<?php } ?>
		<!--/ End Blog -->