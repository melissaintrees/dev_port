<?php
/**
 * Widget for Call to Action
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

class Flexible_Lite_Cta extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'flexible_lite_cta',
            'description' => __( 'Widget for awesome call to action.', 'flexible-lite' )
        );
        parent::__construct( 'flexible_lite_cta', __( 'Flexible Lite: Call to Action', 'flexible-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'cta_title' => array(
                'flexible_lite_widgets_name'         => 'cta_title',
                'flexible_lite_widgets_title'        => __( 'Call to Action Title', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'text'
            ),

            'cta_details' => array(
                'flexible_lite_widgets_name'         => 'cta_details',
                'flexible_lite_widgets_title'        => __( 'Call to Action Description', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'textarea',
                'flexible_lite_widgets_row'          => 5

            ),

            'cta_bg_image' => array(
                'flexible_lite_widgets_name'         => 'cta_bg_image',
                'flexible_lite_widgets_title'        => __( 'Call to Action Background', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'upload'
            ),

            'cta_button_text' => array(
                'flexible_lite_widgets_name'         => 'cta_button_text',
                'flexible_lite_widgets_title'        => __( 'Call to Action Button Text', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'text'
            ),

            'cta_button_url' => array(
                'flexible_lite_widgets_name'         => 'cta_button_url',
                'flexible_lite_widgets_title'        => __( 'Call to Action Button Url', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'url'
            ),
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }
        $flexible_lite_cta_title       = empty( $instance['cta_title'] ) ? '' : $instance['cta_title'];
        $flexible_lite_cta_details     = empty( $instance['cta_details'] ) ? '' : $instance['cta_details'];
        $flexible_lite_cta_bg_image    = empty( $instance['cta_bg_image'] ) ? '' : $instance['cta_bg_image'];
        $flexible_lite_cta_button_text = empty( $instance['cta_button_text'] ) ? '' : $instance['cta_button_text'];
        $flexible_lite_cta_button_url  = empty( $instance['cta_button_url'] ) ? '#' : $instance['cta_button_url'];
        echo $before_widget;
    ?>
        <div class="flexible-lite-cta-wrapper" style="background-image: url(<?php echo esc_url( $flexible_lite_cta_bg_image ); ?>); background-attachment: fixed; background-size: cover; background-position: 50% -14px; background-repeat: no-repeat;">
            <?php if( !empty( $flexible_lite_cta_bg_image ) ) { ?>
                <div class="cta-overlay"> </div>
            <?php } ?>
            <div class="mt-container">
                <div class="cta-content-wrapper clearfix">
                    <div class="cta-title-wrap">
                        <h4 class="cta-title"><?php echo esc_html( $flexible_lite_cta_title ); ?></h4>
                        <span class="cta-detaiils"><?php echo esc_html( $flexible_lite_cta_details ); ?></span>
                    </div>
                    <a class="cta-button" href="<?php echo esc_url( $flexible_lite_cta_button_url ); ?>"><?php echo esc_html( $flexible_lite_cta_button_text ); ?></a>
                </div><!-- .cta-content-wrapper -->
            </div><!-- .mt-container -->
        </div><!-- .single-page-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    flexible_lite_widgets_updated_field_value()      defined in flexible-lite-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$flexible_lite_widgets_name] = flexible_lite_widgets_updated_field_value( $widget_field, $new_instance[$flexible_lite_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    flexible_lite_widgets_show_widget_field()        defined in flexible-lite-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $flexible_lite_widgets_field_value = !empty( $instance[$flexible_lite_widgets_name] ) ? esc_attr( $instance[$flexible_lite_widgets_name] ) : '';
            flexible_lite_widgets_show_widget_field( $this, $widget_field, $flexible_lite_widgets_field_value );
        }
    }
}