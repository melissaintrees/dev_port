<?php
/**
 * Widget for testimonials section
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

class Flexible_Lite_Testimonials_Section extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'flexible_lite_testimonials_section',
            'description' => __( 'Display posts from selected category in testimonials section.', 'flexible-lite' )
        );
        parent::__construct( 'flexible_lite_testimonials_section', __( 'Flexible Lite: Testimonials Section', 'flexible-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        global $flexible_lite_category_dropdown;
        
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

            'section_info' => array(
                'flexible_lite_widgets_name'         => 'section_info',
                'flexible_lite_widgets_title'        => __( 'Section Info', 'flexible-lite' ),
                'flexible_lite_widgets_row'          => 5,
                'flexible_lite_widgets_field_type'   => 'textarea'
            ),

            'section_cat_id' => array(
                'flexible_lite_widgets_name'         => 'section_cat_id',
                'flexible_lite_widgets_title'        => __( 'Select category', 'flexible-lite' ),
                'flexible_lite_widgets_default'      => 0,
                'flexible_lite_widgets_field_type'   => 'select',
                'flexible_lite_widgets_field_options' => $flexible_lite_category_dropdown
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

        $flexible_lite_section_menu_id       = empty( $instance['section_menu_id'] ) ? '' : $instance['section_menu_id'];
        $flexible_lite_section_title         = empty( $instance['section_title'] ) ? '' : $instance['section_title'];        
        $flexible_lite_section_info          = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $flexible_lite_section_cat_id        = empty( $instance['section_cat_id'] ) ? 0 : $instance['section_cat_id'];


        if( !empty( $flexible_lite_section_menu_id ) ) {
            $flexible_lite_section_menu_id = 'id='.$flexible_lite_section_menu_id;
        }

        if( !empty( $flexible_lite_section_title ) || !empty( $flexible_lite_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $testimonials_args = array(
                'post_type'     => 'post',
                'category__in'  => absint( $flexible_lite_section_cat_id ),
                'posts_per_page'=> -1
            );
        $testimonials_query = new WP_Query( $testimonials_args );
        echo $before_widget;
    ?>
            <div <?php echo $flexible_lite_section_menu_id; ?> class="section-wrapper flexible-lite-widget-wrapper">
                <div class="mt-container">
                    <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?>">
                        <?php
                            if( !empty( $flexible_lite_section_title ) ) {
                                echo $before_title . esc_html( $flexible_lite_section_title ) . $after_title;
                            }

                            if( !empty( $flexible_lite_section_info ) ) {
                                echo '<span class="section-info">'. esc_html( $flexible_lite_section_info ) .'</span>';
                            }
                        ?>
                    </div><!-- .section-title-wrapper -->
                    <div class="section-content-wrapper">
                        <?php
                            if( $testimonials_query->have_posts() ) {
                                echo '<ul class="testimonial-slider">';
                                while( $testimonials_query->have_posts() ) {
                                    $testimonials_query->the_post();
                                    $image_id      = get_post_thumbnail_id();
                                    $image_path    = wp_get_attachment_image_src( $image_id, 'thumbnail', true );
                                    $image_details = get_post( $image_id );
                                    $image_caption = $image_details->post_excerpt;
                        ?>
                                        <li>
                                            <div class="testimonial-content">
                                                <?php the_content();?>
                                            </div>
                                            <div class="testi-author-wrap clearfix">
                                                <div class="testi-img">
                                                    <?php if( has_post_thumbnail() ) { ?>
                                                        <img src="<?php echo esc_url( $image_path[0] );?>" title="<?php the_title_attribute(); ?>">
                                                    <?php } ?>
                                                </div>
                                                <div class="author-info">
                                                    <h5 class="testi-author-name"><?php the_title(); ?></h5>
                                                    <?php if( !empty( $image_caption ) ) { ?>
                                                        <span class="testi-author-position"><?php echo esc_html( $image_caption ); ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </li>
                        <?php
                                }
                                echo '</ul>';
                            }
                        ?>
                    </div><!-- .section-content-wrapper -->
                </div><!-- .mt-container -->
            </div>
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