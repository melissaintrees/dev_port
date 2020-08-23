<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mistu
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div>
		<?php 
			$hideSearch = get_theme_mod('mistu_theme_options_hidesearch', '1');
			$facebookURL = get_theme_mod('mistu_theme_options_facebookurl', '#');
			$twitterURL = get_theme_mod('mistu_theme_options_twitterurl', '#');
			$googleplusURL = get_theme_mod('mistu_theme_options_googleplusurl', '#');
			$linkedinURL = get_theme_mod('mistu_theme_options_linkedinurl', '#');
			$instagramURL = get_theme_mod('mistu_theme_options_instagramurl', '#');
			$youtubeURL = get_theme_mod('mistu_theme_options_youtubeurl', '#');
			$pinterestURL = get_theme_mod('mistu_theme_options_pinteresturl', '#');
			$tumblrURL = get_theme_mod('mistu_theme_options_tumblrurl', '#');
			$vkURL = get_theme_mod('mistu_theme_options_vkurl', '#');
		?>
		<div class="socialLine smallPart">
			<?php if (!empty($facebookURL)) : ?>
				<a target="_blank" href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-facebook"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($twitterURL)) : ?>
				<a target="_blank" href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-twitter"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($googleplusURL)) : ?>
				<a target="_blank" href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-google-plus"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($linkedinURL)) : ?>
				<a target="_blank"  href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-linkedin"><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($instagramURL)) : ?>
				<a target="_blank"  href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-instagram"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($youtubeURL)) : ?>
				<a target="_blank"  href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-youtube"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($pinterestURL)) : ?>
				<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-pinterest"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($tumblrURL)) : ?>
				<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-tumblr"><span class="screen-reader-text"><?php esc_html_e( 'Tumblr', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if (!empty($vkURL)) : ?>
				<a target="_blank"  href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'mistu' ); ?>"><i class="fa spaceRightDouble fa-vk"><span class="screen-reader-text"><?php esc_html_e( 'VK', 'mistu' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($hideSearch == 1 ) : ?>
				<a target="_blank"  href="#" class="top-search"><i class="fa spaceRightDouble fa-search"></i></a>
			<?php endif; ?>
		</div>
		<?php if ($hideSearch == 1 ) : ?>
		<div class="topSearchForm">
			<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>"><input type="search" name="s" class="search" placeholder="<?php esc_attr_e('Type and hit enter...', 'mistu'); ?>"></form>
		</div>
		<?php endif; ?>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle"><?php esc_html_e( 'Select a page...', 'mistu' ); ?><i class="fa fa-align-justify"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<?php get_sidebar(); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
