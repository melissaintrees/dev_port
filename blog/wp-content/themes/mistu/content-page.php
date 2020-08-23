<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package mistu
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg">';
			the_post_thumbnail('mistu-normal-post');
			echo '</div>';
		}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mistu' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<span style="display:none" class="updated"><?php the_time(get_option('date_format')); ?></span>
	<div style="display:none" class="vcard author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></div>
	<footer class="entry-footer smallPart">
		<?php edit_post_link( esc_html__( 'Edit', 'mistu' ), '<span class="edit-link"><i class="fa fa-pencil-square-o spaceRight"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
