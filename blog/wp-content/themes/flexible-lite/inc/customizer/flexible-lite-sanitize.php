<?php
/**
 * File to sanitize customizer field
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

//Text
function flexible_lite_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Email
function flexible_lite_sanitize_email( $input ) {
    return sanitize_email( $input );
}

//Checkboxes
function flexible_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}

// Number
function flexible_lite_sanitize_number( $input ) {
    $output = intval($input);
     return $output;
}

// site layout
function flexible_lite_sanitize_site_layout( $input ) {
    $valid_keys = array(
        'wide_layout'   => __( 'Wide Layout', 'flexible-lite' ),
        'boxed_layout'  => __( 'Boxed Layout', 'flexible-lite' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

// Archive Layouts
function flexible_lite_sidebar_layout( $input ) {
    $valid_keys = array(
        'right_sidebar'     => __( 'Right Sidebar', 'flexible-lite' ),
        'left_sidebar'      => __( 'Left Sidebar', 'flexible-lite' ),
        'no_sidebar'        => __( 'No sidebar Full Width', 'flexible-lite' ),
        'no_sidebar_center' => __( 'No sidebar Centered', 'flexible-lite' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//Footer widget columns
function flexible_lite_footer_widget_columns( $input ) {
    $valid_keys = array(
        'four_columns'  => __( 'Four Columns', 'flexible-lite' ),
        'three_columns' => __( 'Three Columns', 'flexible-lite' ),
        'two_columns'   => __( 'Two Columns', 'flexible-lite' ),
        'one_column'    => __( 'One Column', 'flexible-lite' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize switch button
 *
 * @since 1.0.3
 */
function flexible_lite_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Show', 'flexible-lite' ),
            'hide'  => esc_html__( 'Hide', 'flexible-lite' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}