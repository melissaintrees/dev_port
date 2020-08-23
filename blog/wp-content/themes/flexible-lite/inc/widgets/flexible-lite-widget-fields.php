<?php
/**
 * Define custom fields for widgets
 * 
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

function flexible_lite_widgets_show_widget_field( $instance = '', $widget_field = '', $mt_widget_field_value = '' ) {
    
    extract( $widget_field );

    switch ( $flexible_lite_widgets_field_type ) {

        // Standard text field
        case 'text' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ) ); ?>" type="text" value="<?php echo esc_html( $mt_widget_field_value ); ?>" />

                <?php if ( isset( $flexible_lite_widgets_description ) ) { ?>
                    <br />
                    <small><em><?php echo wp_kses_post( $flexible_lite_widgets_description ); ?></em></small>
                <?php } ?>
            </p>
        <?php
            break;

        // Standard url field
        case 'url' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ) ); ?>" type="text" value="<?php echo esc_url( $mt_widget_field_value ); ?>" />

                <?php if ( isset( $flexible_lite_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $flexible_lite_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        // Textarea field
        case 'textarea' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label>
                <textarea class="widefat" rows="<?php echo absint( $flexible_lite_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_textarea( $mt_widget_field_value ); ?></textarea>
            </p>
        <?php
            break;

        // Select field
        case 'select' :
            if( empty( $mt_widget_field_value ) ) {
                $mt_widget_field_value = $flexible_lite_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label>
                <select name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>" class="widefat">
                    <?php foreach ( $flexible_lite_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
                        <option value="<?php echo esc_attr( $athm_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" <?php selected( $athm_option_name, $mt_widget_field_value ); ?>><?php echo esc_html( $athm_option_title ); ?></option>
                    <?php } ?>
                </select>

                <?php if ( isset( $flexible_lite_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $flexible_lite_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        case 'number' :
            if( empty( $mt_widget_field_value ) ) {
                $mt_widget_field_value = $flexible_lite_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label>
                <input name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>" value="<?php echo esc_html( $mt_widget_field_value ); ?>" class="small-text" />

                <?php if ( isset( $flexible_lite_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $flexible_lite_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        //Multi checkboxes
        case 'multicheckboxes':
        ?>
            <label><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label>

        <?php    
            foreach ( $flexible_lite_widgets_field_options as $athm_option_name => $athm_option_title) {
                if( isset( $mt_widget_field_value[$athm_option_name] ) ) {
                    $mt_widget_field_value[$athm_option_name] = 1;
                }else{
                    $mt_widget_field_value[$athm_option_name] = 0;
                }
                
            ?>
                <p>
                    <input id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ).'['.$athm_option_name.']' ); ?>" type="checkbox" value="1" <?php checked('1', $mt_widget_field_value[$athm_option_name]); ?>/>
                    <label for="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
                </p>
            <?php
                }
                if ( isset( $flexible_lite_widgets_description ) ) {
            ?>
                    <small><em><?php echo wp_kses_post( $flexible_lite_widgets_description ); ?></em></small>
            <?php
                }
            break;

        //Widget info
        case 'widget_info':
        ?>
            <div class="widget-info"><?php echo esc_html( $flexible_lite_widgets_title ); ?></div>
        <?php    
            break;

        case 'upload':
            $image = $image_class = "";
            if( $mt_widget_field_value ){
                $image = '<img src="'.esc_url( $mt_widget_field_value ).'" style="max-width:100%;"/>';    
                $image_class = ' hidden';
            }
            ?>
            <div class="attachment-media-view">

            <label for="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>"><?php echo esc_html( $flexible_lite_widgets_title ); ?>:</label><br />
            
                <div class="placeholder<?php echo esc_attr( $image_class ); ?>">
                    <?php esc_html_e( 'No image selected', 'flexible-lite' ); ?>
                </div>
                <div class="thumbnail thumbnail-image">
                    <?php echo $image; ?>
                </div>

                <div class="actions clearfix">
                    <button type="button" class="button flexible-lite-delete-button align-left"><?php esc_html_e( 'Remove', 'flexible-lite' ); ?></button>
                    <button type="button" class="button flexible-lite-upload-button alignright"><?php esc_html_e( 'Select Image', 'flexible-lite' ); ?></button>
                    
                    <input name="<?php echo esc_attr( $instance->get_field_name( $flexible_lite_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $flexible_lite_widgets_name ) ); ?>" class="upload-id" type="hidden" value="<?php echo esc_url( $mt_widget_field_value ) ?>"/>
                </div>

            <?php if ( isset( $flexible_lite_widgets_description ) ) { ?>
                <br />
                <small><?php echo wp_kses_post( $flexible_lite_widgets_description ); ?></small>
            <?php } ?>

            </div>
            <?php
            break;
    }
}

function flexible_lite_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    if ( $flexible_lite_widgets_field_type == 'number') {
        return flexible_lite_sanitize_number( $new_field_value );
    } elseif ( $flexible_lite_widgets_field_type == 'textarea' ) {
        return sanitize_textarea_field( $new_field_value );
    } elseif ( $flexible_lite_widgets_field_type == 'url' ) {
        return esc_url( $new_field_value );
    } elseif( $flexible_lite_widgets_field_type == 'multicheckboxes' ) {
        return $new_field_value;
    } else {
        return sanitize_text_field( $new_field_value );
    }
}