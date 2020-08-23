<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Writer
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site" style="max-width: <?php echo esc_attr(get_theme_mod( 'blog_writer_boxed_size', '2560' ) ) ; ?>px;">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blog-writer' ); ?></a>

	<header id="masthead" class="site-header container-fluid">
		<div class="row align-items-center">
			<div class="site-header-main col-lg-12">
			<div id="site-branding">

			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			
			<?php if ( esc_attr(get_theme_mod( 'blog_writer_show_site_title', true ) ) ) : ?>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
			
			<?php	if (esc_attr(get_theme_mod( 'blog_writer_show_site_desc', true ) ) ) :
				$blog_writer_description = get_bloginfo( 'description', 'display' );
					if ( $blog_writer_description || is_customize_preview() ) : ?>
						<p id="site-description"><?php echo $blog_writer_description;  /* WPCS: xss ok. */ ?></p>
			<?php 
					endif;
				endif; ?>
			</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php esc_html_e( 'Menu', 'blog-writer' ); ?></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'blog-writer' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
						
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->
		
		</div>
	</header><!-- #masthead -->

	<div id="breadcrumbs-sidebar">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
	</div>
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>
	
	<?php if (is_page() ) : 
	echo '<div class="container"><div class="row"><div class="col-lg-12">';
	blog_writer_post_thumbnail(); 
	echo '</div></div></div>';
	endif; ?>
	
	<div id="content" class="site-content container">
	<div class="row">
