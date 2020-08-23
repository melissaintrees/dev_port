<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hamlet-lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hamlet-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="top-nav container">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'hamlet-lite' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

			<div id="top-social">
				
				<?php if(get_theme_mod('hamlet_lite_facebook')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_twitter')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_instagram')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_pinterest')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_bloglovin')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_google')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_tumblr')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if(get_theme_mod('hamlet_lite_youtube')) : ?><a href="<?php echo esc_url(get_theme_mod('hamlet_lite_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				
			</div>

		</div>
		</nav><!-- #site-navigation -->

		<div class="site-branding container">

			<?php
				if ( has_custom_logo() ) {

					hamlet_lite_the_custom_logo();

				}else{ ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php
				endif; ?>

			<?php	}
			?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
