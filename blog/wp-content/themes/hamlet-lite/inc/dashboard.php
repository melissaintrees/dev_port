<?php
/**
 * Add theme dashboard page
 */

add_action('admin_menu', 'hamlet_lite_theme_info');
if ( ! function_exists( 'hamlet_lite_theme_info' ) ) {
    function hamlet_lite_theme_info()
    {
        $theme_data = wp_get_theme();
        add_theme_page(sprintf(esc_html__('%s Theme Dashboard', 'hamlet-lite'), $theme_data->Name), sprintf(esc_html__('%s theme', 'hamlet-lite'), $theme_data->Name), 'edit_theme_options', 'hamlet-lite', 'hamlet_lite_theme_info_page');
    }
}

if ( ! function_exists( 'hamlet_lite_admin_scripts' ) ) {
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
    function hamlet_lite_admin_scripts( $hook )
    {
            wp_enqueue_style('hamlet-lite-admin-css', get_template_directory_uri() . '/css/dashboard.css');
    }
}
add_action('admin_enqueue_scripts', 'hamlet_lite_admin_scripts');

if ( ! function_exists( 'hamlet_lite_theme_info_page' ) ) {
    function hamlet_lite_theme_info_page()
    {
        $theme_data = wp_get_theme();
        // Check for current viewing tab
        $tab = null;
        if ( isset( $_GET['tab'] ) ) {
            $tab = $_GET['tab'];
        } else {
            $tab = null;
        }

        ?>

        <div class="wrap about-wrap theme_info_wrapper">
            <h1><?php printf(esc_html__('Welcome to %1s - Version %2s', 'hamlet-lite'), $theme_data->Name, $theme_data->Version); ?></h1>

            <div class="about-text"><?php esc_html_e("Hamlet Lite is a Responsive WordPress blog theme. The theme is a perfect combination of beautiful and professional.", 'hamlet-lite') ?></div>
            <a target="_blank" href="<?php echo esc_url('https://zthemes.net/'); ?>"
               class="zthemes-badge wp-badge"><span><?php echo esc_html('ZThemes Studio', 'hamlet-lite'); ?></span></a>

            <h2 class="nav-tab-wrapper">
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'hamlet-lite' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab <?php echo ( ! $tab || $tab == 'hamlet-lite' ) ? ' nav-tab-active' : ''; ?>"><?php echo esc_html($theme_data->Name); ?></a>
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'hamlet-lite', 'tab' => 'free_pro' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'free_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free vs PRO', 'hamlet-lite' ); ?></span></a>
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'hamlet-lite', 'tab' => 'contribute' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'contribute' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Contribute', 'hamlet-lite' ); ?><span class="dashicons dashicons-thumbs-up"></span></a>
            </h2>

            <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e('Theme Customizer', 'hamlet-lite'); ?></h3>

                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'hamlet-lite'), $theme_data->Name); ?></p>

                            <p>
                                <a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-secondary"><?php esc_html_e('Start Customize', 'hamlet-lite'); ?> &#8594;</a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e('Having Trouble, Need Support?', 'hamlet-lite'); ?></h3>

                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through ZThemes Studio support ticket system.', 'hamlet-lite'), $theme_data->Name); ?></p>

                            <p>
                                <a class="button button-secondary" target="_blank" href="https://zthemes.net/support"><?php esc_html_e( 'Create a support ticket', 'hamlet-lite' ) ?></a>&nbsp;
                                <a href="http://demo.zthemes.net/docs/" target="_blank" class="button button-secondary"><?php esc_html_e('Some Tips', 'hamlet-lite'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3 class="hamlet-lite-upgrade"><?php esc_html_e('Upgrade to Hamlet Pro', 'hamlet-lite'); ?></h3>

                            <p class="about"><?php printf(esc_html__('Our #1 blogging WordPress theme with premium features designed for bloggers and content lovers.', 'hamlet-lite'), $theme_data->Name); ?></p>

                            <p>
                                <a class="button button-secondary" target="_blank" href="http://demo.zthemes.net/hamlet/"><?php _e( 'Hamlet Pro Demo', 'hamlet-lite' ) ?> &#8594;</a>&nbsp;
                                <a class="button button-primary" target="_blank" href="https://zthemes.net/themes/hamlet"><?php _e( 'Upgrade Now', 'hamlet-lite' ) ?> &#8594;</a>
                            </p>
                        </div>
                    </div>

                    <div class="theme_info_right">
                        <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_attr_e('Theme Screenshot', 'hamlet-lite'); ?>"/>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if ( $tab == 'contribute' ) { ?>
            <div class="contribute-tab-content feature-section three-col">
                <div class="col">
                    <div class="theme_info_boxed">
                        <p><strong><?php esc_html_e( 'Are you a polyglot? Want to translate Hamlet Lite into your own language?', 'hamlet-lite' ); ?></strong></p>
                        <p><?php esc_html_e('Get involved at WordPress.org.', 'hamlet-lite'); ?></p>
                        <p>
                            <a href="https://translate.wordpress.org/projects/wp-themes/hamlet-lite" target="_blank" class="button button-primary"><?php esc_html_e('Translate Hamlet Lite', 'hamlet-lite'); ?> <span class="dashicons dashicons-external"></span></a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="theme_info_boxed">
                        <p><strong><?php esc_html_e( 'Are you enjoying Hamlet Lite theme?', 'hamlet-lite' ); ?></strong></p>
                        <p><?php printf( esc_html__('Rate our theme on %1s. We\'d really appreciate it!', 'hamlet-lite'), '<a target="_blank" href="https://wordpress.org/support/theme/hamlet-lite/reviews/?filter=5">WordPress.org</a>' ); ?></p>
                        <p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
                    </div>
                </div>
            </div>
        <?php } ?>

	        <?php if ( $tab == 'free_pro' ) { ?>
                <div id="free_pro" class="freepro-tab-content info-tab-content">
                    <table class="free-pro-table">
                        <thead><tr><th></th><th>Hamlet Lite</th><th>Hamlet Pro</th></tr></thead>
                        <tbody>
                        <tr>
                            <td>
                                <h4>Responsive Design</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Translation Ready</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Upload Your Own Logo</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sidebar Layout</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Featured Slider</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Featured Slider Options</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blog Layouts</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Header Layouts</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>WooCommerce Compatible</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Custom Widgets</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Posts/Page Settings</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Instagram Feed Widget</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Footer Widget Area</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Footer Copyright Editor</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>

                        <tr class="ti-about-page-text-center"><td></td><td colspan="2"><a href="https://zthemes.net/themes/hamlet" target="_blank" class="button button-primary button-hero">Get Hamlet Pro now!</a></td></tr>
                        </tbody>
                    </table>
                </div>
	        <?php } ?>


        </div> <!-- END .theme_info -->
        <script type="text/javascript">
            jQuery(  document).ready( function( $ ){
                $( 'body').addClass( 'about-php' );
            } );
        </script>
        <?php
    }
}
