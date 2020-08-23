<?php
/**
 * Widget for about us section.
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

class Flexible_Lite_About_Page extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'flexible_lite_about_page',
            'description' => __( 'Show your page in about section.', 'flexible-lite' )
        );
        parent::__construct( 'flexible_lite_about_page', __( 'Flexible Lite: About Us Section', 'flexible-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        global $flexible_lite_page_dropdown;
        
        $fields = array(

            'section_menu_id' => array(
                'flexible_lite_widgets_name'         => 'section_menu_id',
                'flexible_lite_widgets_title'        => __( 'Section ID', 'flexible-lite' ),
                'flexible_lite_widgets_description'  => __( 'Section Id is only used in One Page Menu.', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'text'
            ),

            'section_title' => array(
                'flexible_lite_widgets_name'         => 'section_title',
                'flexible_lite_widgets_title'        => __( 'Section Title', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'text'
            ),

            'section_page_id' => array(
                'flexible_lite_widgets_name' => 'section_page_id',
                'flexible_lite_widgets_title' => __( 'Select Page', 'flexible-lite' ),
                'flexible_lite_widgets_default'      => 0,
                'flexible_lite_widgets_field_type' => 'select',
                'flexible_lite_widgets_field_options' => $flexible_lite_page_dropdown
            )
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
        $flexible_lite_section_menu_id = empty( $instance['section_menu_id'] ) ? '' : $instance['section_menu_id'];
        $flexible_lite_section_title   = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $flexible_lite_section_page_id    = empty( $instance['section_page_id'] ) ? null: $instance['section_page_id'];
        
        if( !empty( $flexible_lite_section_menu_id ) ) {
            $flexible_lite_section_menu_id = 'id='.$flexible_lite_section_menu_id;
        }

        echo $before_widget;
    ?>
        <div <?php echo $flexible_lite_section_menu_id; ?> class="section-wrapper about-section-wrapper flexible-lite-widget-wrapper">
            <div class="mt-container">
                <div class="about-section">
                    <?php 
                        if( $flexible_lite_section_page_id ) {
                            $about_page_query = new WP_Query( 'page_id='.$flexible_lite_section_page_id );
                            if( $about_page_query->have_posts() ) {
                                while( $about_page_query->have_posts() ) {
                                    $about_page_query->the_post();
                                    $image_id = get_post_thumbnail_id();
                                    $image_path = wp_get_attachment_image_src( $image_id, 'large', true );                       
                                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                    ?>
                                    <div class="section-content-wrapper">
                                        <?php 
                                            if( !empty( $flexible_lite_section_title ) ) {
                                                echo $before_title . esc_html( $flexible_lite_section_title ) . $after_title;
                                            } else {
                                                echo $before_title . get_the_title() . $after_title;
                                            }
                                        ?>
                                        <div class="page-content"><?php the_content();?></div>
                                    </div><!-- .page-main-wrapper -->
                                    <div class="page-thumb-wrapper">
                                        <figure><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt ); ?>"></figure>
                                    </div><!-- .page-thumb-wrapper -->
                    <?php
                                }
                            }
                        }
                    ?>
                </div><!-- .about-section -->
            </div><!-- .mt-container -->
        </div><!-- .section-wrapper -->
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