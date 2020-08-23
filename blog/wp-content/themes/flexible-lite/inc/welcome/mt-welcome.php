<?php
/**
 * Welcome page of Easy Mart Theme
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Flexible_Lite_Welcome' ) ) :

class Flexible_Lite_Welcome {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'about_theme_styles' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'Welcome', 'flexible-lite' ), esc_html__( 'Welcome', 'flexible-lite' ), 'activate_plugins', 'flexible-lite-welcome', array( $this, 'welcome_screen' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function about_theme_styles( $hook ) {
		if( 'appearance_page_flexible-lite-welcome' != $hook && 'themes.php' != $hook ) {
			return;
		}
		global $flexible_lite_version;

		wp_enqueue_style( 'welcome-theme-style', get_template_directory_uri() . '/inc/welcome/welcome.css', array(), $flexible_lite_version );
	}

	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $flexible_lite_version, $pagenow;

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'flexible_lite_admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'flexible_lite_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['flexible-lite-hide-notice'] ) && isset( $_GET['_flexible_lite_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_flexible_lite_notice_nonce'], 'flexible_lite_hide_notices_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'flexible-lite' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'Cheat in &#8217; huh?', 'flexible-lite' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['flexible-lite-hide-notice'] );
			update_option( 'flexible_lite_admin_notice_' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		$theme = wp_get_theme( get_template() );
		$theme_name = $theme->get( 'Name' );
?>
		<div id="mt-theme-message" class="updated flexible-lite-message">
			<a class="flexible-lite-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'flexible-lite-hide-notice', 'welcome' ) ), 'flexible_lite_hide_notices_nonce', '_flexible_lite_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'flexible-lite' ); ?></a>
			<h2 class="welcome-title"><?php printf( esc_html__( 'Welcome to %s', 'flexible-lite' ), $theme_name ); ?></h2>
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$s welcome page %3$s.', 'flexible-lite' ), esc_html( $theme_name ), '<a href="' . esc_url( admin_url( 'themes.php?page=flexible-lite-welcome' ) ) . '">', '</a>' ); ?></p>
			<p><a class="button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=flexible-lite-welcome' ) ); ?>"><?php printf( esc_html__( 'Get started with %1$s', 'flexible-lite' ), esc_html( $theme_name ) ); ?></a></p>
		</div>
<?php
	}

	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		global $flexible_lite_version;
		$theme = wp_get_theme( get_template() );

		$theme_name = $theme->get( 'Name' );
		$theme_description = $theme->get( 'Description' );
		$theme_uri = $theme->get( 'ThemeURI' );
?>
		<div class="theme-info-wrapper">
			<div class="flexible-lite-theme-info">
				<h1> <?php printf( esc_html__( 'About %1$s', 'flexible-lite' ), $theme_name ); ?> </h1>

				<div class="welcome-description-wrap">
					<div class="about-text"><?php echo wp_kses_post( $theme_description ); ?></div>

					<div class="flexible-lite-screenshot">
						<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.jpg'; ?>" />
					</div>
				</div>
			</div>

			<p class="flexible-lite-actions">
				<a href="<?php echo esc_url( $theme_uri ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'flexible-lite' ); ?></a>

				<a href="<?php echo esc_url( apply_filters( 'flexible_lite_demo_url', 'https://demo.mysterythemes.com/flexible-lite/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'flexible-lite' ); ?></a>

				<a href="<?php echo esc_url( apply_filters( 'flexible_pro_theme_url', 'https://mysterythemes.com/wp-themes/flexible-pro/' ) ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'flexible-lite' ); ?></a>

				<a href="<?php echo esc_url( apply_filters( 'flexible_lite_rating_url', 'https://wordpress.org/support/theme/flexible-lite/reviews/?filter=5' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'flexible-lite' ); ?></a>

				<a href="<?php echo esc_url( apply_filters( 'flexible_lite_wp_tutorials', 'https://wpallresources.com/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'More Tutorials', 'flexible-lite' ); ?></a>
			</p>

			<h2 class="nav-tab-wrapper">
				<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'flexible-lite-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'flexible-lite-welcome' ), 'themes.php' ) ) ); ?>">
					<?php echo esc_html( $theme->display( 'Name' ) ); ?>
				</a>
				
				<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'flexible-lite-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Free Vs Pro', 'flexible-lite' ); ?>
				</a>

				<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'more_themes' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'flexible-lite-welcome', 'tab' => 'more_themes' ), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'More Themes', 'flexible-lite' ); ?>
				</a>

				<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'flexible-lite-welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Changelog', 'flexible-lite' ); ?>
				</a>
			</h2>
		</div><!-- .theme-info-wrapper -->
<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );

		$theme_name = $theme->get( 'Name' );
	?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<div class="changelog">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'flexible-lite' ); ?></h3>
						<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'flexible-lite' ) ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'flexible-lite' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'flexible-lite' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'flexible-lite' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://docs.mysterythemes.com/flexible/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Documentation', 'flexible-lite' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'flexible-lite' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our dedicated support forum.', 'flexible-lite' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://mysterythemes.com/support/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Support', 'flexible-lite' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more features?', 'flexible-lite' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'flexible-lite' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://mysterythemes.com/wp-themes/flexible-pro/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View PRO version', 'flexible-lite' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Have you need customization?', 'flexible-lite' ); ?></h3>
						<p><?php esc_html_e( 'Please send message with your requirement.', 'flexible-lite' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://mysterythemes.com/customization/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Customization', 'flexible-lite' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php printf( esc_html__( 'Translate %1$s', 'flexible-lite' ), esc_html( $theme_name ) ); ?></h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'flexible-lite' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/flexible-lite' ); ?>" class="button button-secondary" target="_blank"><?php printf( esc_html__( 'Translate %1$s', 'flexible-lite' ), esc_html( $theme_name ) ); ?></a>
						</p>
					</div>
				</div>
			</div><!-- .point-releases -->

			<div class="return-to-dashboard flexible-lite">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'flexible-lite' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'flexible-lite' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'flexible-lite' ) : esc_html_e( 'Go to Dashboard', 'flexible-lite' ); ?></a>
			</div><!-- .return-to-dashboard -->
		</div><!-- .about-wrap -->
	<?php
	}

	/**
	 * Output the more themes screen
	 */
	public function more_themes_screen() {
?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>
			<div class="theme-browser rendered">
				<div class="themes wp-clearfix">
					<?php
						// Set the argument array with author name.
						$args = array(
							'author' => 'mysterythemes',
							'per_page' => 100
						);
						// Set the $request array.
						$request = array(
							'body' => array(
								'action'  => 'query_themes',
								'request' => serialize( (object)$args )
							)
						);
						$themes = $this->flexible_lite_get_themes( $request );
						$active_theme = wp_get_theme()->get( 'Name' );
						$counter = 1;

						// For currently active theme.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme == $theme->name ) {					?>

								<div id="<?php echo esc_attr( $theme->slug ); ?>" class="theme active">
									<div class="theme-screenshot">
										<img src="<?php echo esc_url( $theme->screenshot_url ); ?>"/>
									</div>
									<h3 class="theme-name" id="flexible-lite-name"><strong><?php esc_html_e( 'Active', 'flexible-lite' ); ?></strong>: <?php echo esc_html( $theme->name ); ?></h3>
									<div class="theme-actions">
										<a class="button button-primary customize load-customize hide-if-no-customize" href="<?php echo esc_url( get_site_url(). '/wp-admin/customize.php' ); ?>"><?php esc_html_e( 'Customize', 'flexible-lite' ); ?></a>
									</div>
								</div><!-- .theme active -->
						<?php
							$counter++;
							break;
							}
						}

						// For all other themes.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme != $theme->name ) {
								// Set the argument array with author name.
								$args = array(
									'slug' => esc_attr( $theme->slug ),
								);
								// Set the $request array.
								$request = array(
									'body' => array(
										'action'  => 'theme_information',
										'request' => serialize( (object)$args )
									)
								);
								$theme_details = $this->flexible_lite_get_themes( $request );
								if( empty( $theme_details->template ) ) {
							?>
									<div id="<?php echo esc_attr( $theme->slug ); ?>" class="theme">
										<div class="theme-screenshot">
											<img src="<?php echo esc_url( $theme->screenshot_url ); ?>"/>
										</div>

										<h3 class="theme-name"><?php echo esc_html( $theme->name ); ?></h3>

										<div class="theme-actions">
											<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>											
												<!-- Activate Button -->
												<a  class="button button-secondary activate"
													href="<?php echo esc_url( wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . esc_attr( $theme->slug ) ) ); ?>" ><?php esc_html_e( 'Activate', 'flexible-lite' ) ?></a>
											<?php } else {
												// Set the install url for the theme.
												$install_url = add_query_arg( array(
														'action' => 'install-theme',
														'theme'  => esc_attr( $theme->slug ),
													), self_admin_url( 'update.php' ) );
											?>
												<!-- Install Button -->
												<a data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr( 'Downloaded ', 'flexible-lite' ). number_format( $theme_details->downloaded ).' '.esc_attr( 'times', 'flexible-lite' ); ?>" class="button button-secondary activate" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php esc_html_e( 'Install Now', 'flexible-lite' ); ?></a>
											<?php } ?>

											<a class="button button-primary load-customize hide-if-no-customize" target="_blank" href="<?php echo esc_url( $theme->preview_url ); ?>"><?php esc_html_e( 'Live Preview', 'flexible-lite' ); ?></a>
										</div>
									</div><!-- .theme -->
					<?php
								}
							}
						}
					?>
				</div>
			</div><!-- .cv-theme-holder -->
		</div><!-- .wrap.about-wrap -->
<?php
	}

	/** 
	 * Get all our themes by using API.
	 */
	private function flexible_lite_get_themes( $request ) {

		// Generate a cache key that would hold the response for this request:
		$key = 'flexible_lite_' . md5( serialize( $request ) );

		// Check transient. If it's there - use that, if not re fetch the theme
		if ( false === ( $themes = get_transient( $key ) ) ) {

			// Transient expired/does not exist. Send request to the API.
			$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

			// Check for the error.
			if ( !is_wp_error( $response ) ) {

				$themes = unserialize( wp_remote_retrieve_body( $response ) );

				if ( !is_object( $themes ) && !is_array( $themes ) ) {

					// Response body does not contain an object/array
					return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
				}

				// Set transient for next time... keep it for 24 hours should be good
				set_transient( $key, $themes, 60 * 60 * 24 );
			}
			else {
				// Error object returned
				return $response;
			}
		}
		return $themes;
	}
	
	/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;

	?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<h4><?php esc_html_e( 'View changelog below:', 'flexible-lite' ); ?></h4>

			<?php
				$changelog_file = apply_filters( 'flexible_lite_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}

	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<h4><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'flexible-lite' ); ?></h4>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e( 'Features', 'flexible-lite' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Flexible Lite', 'flexible-lite' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Flexible Pro', 'flexible-lite' ); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e( 'Price', 'flexible-lite' ); ?></h3></td>
						<td><?php esc_html_e( 'Free', 'flexible-lite' ); ?></td>
						<td><?php esc_html_e( '$55', 'flexible-lite' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Import Demo Data', 'flexible-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Pre Loaders', 'flexible-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Top Header Section', 'flexible-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Header Layouts', 'flexible-lite' ); ?></h3></td>
						<td><?php esc_html_e( '1', 'flexible-lite' ); ?></td>
						<td><?php esc_html_e( '3', 'flexible-lite' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Ticker Section', 'flexible-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Google Fonts', 'flexible-lite' ); ?></h3></td>
						<td><?php esc_html_e( '1', 'flexible-lite' ); ?></td>
						<td><?php esc_html_e( '600+', 'flexible-lite' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Typography Section', 'flexible-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'No. of Widgets', 'flexible-lite' ); ?></h3></td>
						<td><?php esc_html_e( '6', 'flexible-lite' ); ?></td>
						<td><?php esc_html_e( '12', 'flexible-lite' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Bottom Footer Layouts', 'flexible-lite' ); ?></h3></td>
						<td><?php esc_html_e( '1', 'flexible-lite' ); ?></td>
						<td><?php esc_html_e( '2', 'flexible-lite' ); ?></td>
					</tr>										
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'flexible_lite_pro_theme_url', 'https://mysterythemes.com/wp-themes/flexible-pro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Buy Pro', 'flexible-lite' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new Flexible_Lite_Welcome();