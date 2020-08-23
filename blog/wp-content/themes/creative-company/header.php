<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creative-company
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Header Area -->
	<header id="header" class="header">
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="logo">
							<?php
								if(has_custom_logo()):
									the_custom_logo();
								else: ?>		
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html(bloginfo('name'));?></a></h1>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-9 col-sm-9">
						<div class="mobile-menu"></div>
						<nav class="navbar navbar-default">
							<div class="collapse navbar-collapse">
								<?php
								if ( has_nav_menu( 'menu-1' ) ) :
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'nav',
									'menu_class' => 'nav navbar-nav',
									'container' => 'false',
								) );
								?>
								<?php else : ?>
					            <ul class="nav navbar-nav" id="nav">
					                <li>
					                     <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','creative-company'); ?></a>
					                </li>
					            </ul>
					        	<?php endif; ?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
		<!--/ End Header Area -->
<?php if( is_home() || (!is_front_page())):?>
	<!-- Breadcrumb -->
<div class="breadcrumb" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-text">
					<?php
					if ( is_archive() ) {
					the_archive_title( '<h2>', '</h2>' );
					}
					else{
						echo '<h2>';
					echo esc_html( get_the_title() );
					echo '</h2>';
					}?>
					<?php do_action( 'creative_company_breadcrumb' );		
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php   endif; ?>