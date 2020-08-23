<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creative-company
 */

?>
<div class="col-md-12 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.4s">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="single-news">
							<?php if( has_post_thumbnail() ): ?>
								<div class="news-head">
									<p class="date"><?php echo get_the_date(); ?></p>
									<?php the_post_thumbnail('full'); ?>
								</div>
							<?php endif; ?>
							<div class="news-body">
								<?php
								the_title( '<h2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
								<div class="title"><span class="user"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html( get_the_author_meta() ); ?></span> <span class="comment"><i class="fa fa-comment-o"></i><?php comments_number( 'No Comment', 'One Comment', '% Comments' ); ?></span></div>
								<?php
								the_excerpt();
								?>
							</div>
						</div>
	</article>
</div>