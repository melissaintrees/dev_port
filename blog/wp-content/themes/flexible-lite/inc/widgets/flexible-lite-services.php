<?php
/**
 * Widget for services sections.
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

class Flexible_Lite_Services_Section extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'flexible_lite_services_section',
            'description' => __( 'Display some pages in services section.', 'flexible-lite' )
        );
        parent::__construct( 'flexible_lite_services_section', __( 'Flexible Lite: Services Section', 'flexible-lite' ), $widget_ops );
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

            'section_bg_image' => array(
                'flexible_lite_widgets_name'         => 'section_bg_image',
                'flexible_lite_widgets_title'        => __( 'Section Background Image', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'upload'
            ),

            'section_page_count' => array(
                'flexible_lite_widgets_name'         => 'section_page_count',
                'flexible_lite_widgets_title'        => __( 'Number of pages to display', 'flexible-lite' ),
                'flexible_lite_widgets_default'      => 6,
                'flexible_lite_widgets_field_type'   => 'number'
            ),

            'section_widget_info' => array(
                'flexible_lite_widgets_name'         => 'section_widget_info',
                'flexible_lite_widgets_title'        => __( 'Note: Create the pages and select Services Template to display Services pages.', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'widget_info'
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

        $flexible_lite_section_menu_id       = empty( $instance['section_menu_id'] ) ? '' : $instance['section_menu_id'];
        $flexible_lite_section_title         = empty( $instance['section_title'] ) ? '' : $instance['section_title'];        
        $flexible_lite_section_info          = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $flexible_lite_section_bg_image      = empty( $instance['section_bg_image'] ) ? '' : $instance['section_bg_image'];
        $flexible_lite_section_page_count    = empty( $instance['section_page_count'] ) ? 6: $instance['section_page_count'];

        if( !empty( $flexible_lite_section_menu_id ) ) {
            $flexible_lite_section_menu_id = 'id='.$flexible_lite_section_menu_id;
        }

        if( !empty( $flexible_lite_section_title ) || !empty( $flexible_lite_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $page_array = array();
        $pages = get_pages();
        // get the pages associated with Services Template.
        foreach ( $pages as $page ) {
            $page_id = $page->ID;
            $template_name = get_post_meta( $page_id, '_wp_page_template', true );
            if( $template_name == 'templates/flexible-lite-services.php' ) {
                array_push( $page_array, $page_id );
            }
        }
        $services_page_args = array(
            'post_type'         => 'page',
            'post__in'          => $page_array,
            'posts_per_page'    => absint( $flexible_lite_section_page_count ),
            'orderby'           => array( 'menu_order' => 'ASC', 'date' => 'DESC' )
        );
        $services_page_query = new WP_Query( $services_page_args );

        echo $before_widget;
    ?>
        <div <?php echo $flexible_lite_section_menu_id; ?> class="section-wrapper flexible-lite-widget-wrapper" style="background-image: url(<?php echo esc_url( $flexible_lite_section_bg_image ); ?>); background-attachment: fixed; background-size: cover; background-position: 50% -14px; background-repeat: no-repeat;">
            <div class="service-overlay"> </div>
            <div class="mt-container">
                <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
                    <?php
                        if( !empty( $flexible_lite_section_title ) ) {
                            echo $before_title . esc_html( $flexible_lite_section_title ) . $after_title;
                        }

                        if( !empty( $flexible_lite_section_info ) ) {
                            echo '<span class="section-info">'. esc_html( $flexible_lite_section_info ) .'</span>';
                        }
                    ?>
                </div><!-- .section-title-wrapper -->

                <?php
                    if( !empty( $page_array ) ) {
                        $page_count = 0;
                ?>
                    <div class="service-pages-wrapper mt-column-wrapper">
                        <?php
                            if( $services_page_query->have_posts() ) {
                                while( $services_page_query->have_posts() ) {
                                    $services_page_query->the_post();
                                    $page_count++;
                                    $page_id = get_the_ID();
                                    $service_page_icon = get_post_meta( $page_id, 'flexible_lite_page_icon', true );
                                    $icon_image_class = '';
                                    if( !empty ( $service_page_icon ) ) {
                                        $icon_image_class = 'service_icon_class';
                                        $services_icon = '<i class="fa ' . esc_html( $service_page_icon ) . '"></i>';
                                    }
                                    if( has_post_thumbnail() ) {
                                        $icon_image_class = 'service_image_class';
                                        $services_icon = get_the_post_thumbnail( $page_id, 'thumbnail' );
                                    }
                        ?>
                                    <div class="single-service-wrapper mt-column-3 clearfix">
                                        <?php if( has_post_thumbnail() || !empty ( $service_page_icon ) ) { ?>
                                            <div class="<?php echo esc_attr( $icon_image_class ); ?>">
                                                <?php echo $services_icon; ?>
                                            </div>
                                        <?php } ?>
                                        <div class="single-service-content-wrapper">
                                            <h5 class="service-title"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
                                            <div class="page-content"><?php the_excerpt(); ?></div>
                                        </div><!-- .single-content-wrapper" -->
                                    </div><!-- .single-page-wrapper -->
                        <?php
                                    if( $page_count % 3 == 0 && $page_count > 1 ) {
                                        echo '<div class="clearfix"></div>';
                                    }
                                }
                            }
                        ?>
                    </div><!-- .service-pages-wrapper -->
                <?php
                    }
                ?>
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
            $flexible_lite_widgets_field_value = !empty( $instance[$flexible_lite_widgets_name] ) ? wp_kses_post( $instance[$flexible_lite_widgets_name] ) : '';
            flexible_lite_widgets_show_widget_field( $this, $widget_field, $flexible_lite_widgets_field_value );
        }
    }
}