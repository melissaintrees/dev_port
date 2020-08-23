<?php
/**
 * Widget for Latest News Section
 *
 * @package Mystery Themes
 * @subpackage Flexible Lite
 * @since 1.0.0
 */

class Flexible_Lite_Latest_News extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'flexible_lite_latest_news',
            'description' => __( 'Display latest posts except from selected categories.', 'flexible-lite' )
        );
        parent::__construct( 'flexible_lite_latest_news', __( 'Flexible Lite: Latest News', 'flexible-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        global $flexible_lite_categories_lists;
        
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

            'section_cat_ids' => array(
                'flexible_lite_widgets_name'         => 'section_cat_ids',
                'flexible_lite_widgets_title'        => __( 'Latest News Categories', 'flexible-lite' ),
                'flexible_lite_widgets_field_type'   => 'multicheckboxes',
                'flexible_lite_widgets_field_options' => $flexible_lite_categories_lists
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

        $flexible_lite_section_menu_id  = empty( $instance['section_menu_id'] ) ? '' : $instance['section_menu_id'];
        $flexible_lite_section_title    = empty( $instance['section_title'] ) ? '' : $instance['section_title'];        
        $flexible_lite_section_info     = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $flexible_lite_section_cat_ids  = empty( $instance['section_cat_ids'] ) ? '' : $instance['section_cat_ids'];

        if( !empty( $flexible_lite_section_menu_id ) ) {
            $flexible_lite_section_menu_id = 'id='.$flexible_lite_section_menu_id;
        }

        if( !empty( $flexible_lite_section_title ) || !empty( $flexible_lite_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

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
                <?php
                    if( !empty( $flexible_lite_section_cat_ids ) ) {
                        $checked_cats = array();
                        foreach( $flexible_lite_section_cat_ids as $cat_key => $cat_value ){
                            $checked_cats[] = $cat_key;
                        }
                        $get_checked_cat_ids = implode( ",", $checked_cats );

                        $latest_news_args = array(
                                'post_type'      => 'post',
                                'cat'            => esc_attr( $get_checked_cat_ids ),
                                'post_status'    => 'publish',
                                'posts_per_page' => 3
                            );
                        $latest_news_query = new WP_Query( $latest_news_args );
                ?>
                    <div class="latest-posts-wrapper mt-column-wrapper">
                    <?php
                        if( $latest_news_query->have_posts() ) {
                            while( $latest_news_query->have_posts() ) {
                                $latest_news_query->the_post();
                                $image_id = get_post_thumbnail_id();
                                $image_path = wp_get_attachment_image_src( $image_id, 'flexible-lite-blog-thumb', true );
                                $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
                    ?>
                            <div class="single-post-wrapper mt-column-3">
                                <div class="post-thumb">
                                    <?php if( has_post_thumbnail() ) { ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                            <img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
                                        </a>
                                    <?php } ?>
                                    <div class="post-meta">
                                        <?php flexible_lite_posted_on(); ?>
                                    </div>
                                </div>

                                <div class="blog-content-wrapper">
                                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a class="news-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php esc_html_e( 'Read More', 'flexible-lite' );?></a>
                                </div>
                            </div><!-- .single-post-wrapper -->
                    <?php
                            }
                        }
                    ?>
                        </div><!-- .latest-posts-wrapper -->
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