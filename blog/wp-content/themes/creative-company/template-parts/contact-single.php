<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creative-company
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="single-news">
			<?php if( has_post_thumbnail() ){ ?>
			<div class="news-head">
				<p class="date"><?php echo get_the_date(); ?></p>
				<?php the_post_thumbnail('creative_company_360_250'); ?>
			</div>
			<?php } ?>
			<div class="news-body">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="title"><span class="user"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html( get_the_author_meta() ); ?></span> <span class="comment"><i class="fa fa-comment-o"></i><?php comments_number( 'No Comment', 'One Comment', '% Comments' ); ?></span></div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e( 'Read More','creative-company' ); ?><i class="fa fa-caret-right" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
