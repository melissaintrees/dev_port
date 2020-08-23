<?php
/**
 * Functions for rendering metaboxes in post area
 * 
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

add_action( 'add_meta_boxes', 'flexible_lite_post_metabox' );

if( !function_exists( 'flexible_lite_post_metabox' ) ):
	function flexible_lite_post_metabox() {
        add_meta_box(
            'flexible_lite_post_sidebar',
            __( 'Post Sidebar', 'flexible-lite' ),
            'flexible_lite_post_sidebar_callback',
            'post',
            'side',
            'default'
        );
	}
endif;

$flexible_lite_post_sidebar_option = array(
    'default-sidebar'   => array(
            'id'        => 'default-sidebar',
            'value'     => 'default_sidebar',
            'label'     => __( 'Default Layout', 'flexible-lite' )
        ),
    'right-sidebar'     => array(
            'id'        => 'right-sidebar',
            'value'     => 'right_sidebar',
            'label'     => __( 'Right Sidebar', 'flexible-lite' )
        ),
    'left-sidebar'      => array(
            'id'        => 'left-sidebar',
            'value'     => 'left_sidebar',
            'label'     => __( 'Left Sidebar', 'flexible-lite' )
        ),
    'no-sidebar-full-width' => array(
            'id'        => 'no-sidebar',
            'value'     => 'no_sidebar',
            'label'     => __( 'No Sidebar Full Width', 'flexible-lite' )
        ),
    'no-sidebar-content-centered' => array(
            'id'        => 'no-sidebar-center',
            'value'     => 'no_sidebar_center',
            'label'     => __( 'No Sidebar Content Centered', 'flexible-lite' )
        )
);

/*--------------------------------------------------------------------------------------*/
/**
 * Call back function for post sidebar
 */
if( ! function_exists( 'flexible_lite_post_sidebar_callback' ) ):
    function flexible_lite_post_sidebar_callback() {
        global $post, $flexible_lite_post_sidebar_option;

        $flexible_lite_post_sidebar = get_post_meta( $post->ID, 'flexible_lite_page_sidebar', true );
        $flexible_lite_post_sidebar = empty( $flexible_lite_post_sidebar ) ? 'default_sidebar' : $flexible_lite_post_sidebar;
        
        wp_nonce_field( basename( __FILE__ ), 'flexible_lite_post_meta_nonce' );

        foreach ( $flexible_lite_post_sidebar_option as $field ) {
    ?>
        <input id="<?php echo esc_attr( $field['id'] ); ?>" type="radio" name="flexible_lite_page_sidebar" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $flexible_lite_post_sidebar ); ?>/>
        <label for="<?php echo esc_attr( $field['id'] ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
    <?php
        }

    }
endif;

/*--------------------------------------------------------------------------------------*/
/**
 * Function for save sidebar layout of post
 */
add_action( 'save_post', 'flexible_lite_save_post_settings' );

if( ! function_exists( 'flexible_lite_save_post_settings' ) ):

function flexible_lite_save_post_settings( $post_id ) {

    global $post;
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'flexible_lite_post_meta_nonce' ] ) || !wp_verify_nonce( $_POST[ 'flexible_lite_post_meta_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
    	return;
    }        
        
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ){
        	return $post_id;  
        }            
    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }

    //Post sidebar
    $old = get_post_meta( $post->ID, 'flexible_lite_page_sidebar', true );
    $new = sanitize_text_field( $_POST['flexible_lite_page_sidebar'] );
    if ( $new && $new != $old ) {  
        update_post_meta ( $post_id, 'flexible_lite_page_sidebar', $new );  
    } elseif ( '' == $new && $old ) {  
        delete_post_meta( $post_id, 'flexible_lite_page_sidebar', $old );  
    }

}

endif;