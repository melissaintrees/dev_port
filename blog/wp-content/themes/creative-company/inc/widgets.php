<?php


/**
 * Adds creative_company_Widget widget.
 */
class creative_company_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'creative_company_widget', // Base ID
			esc_html__( 'Pricing Table Widget', 'creative-company' ), // Name
			array( 'description' => esc_html__( 'A Table Widget', 'creative-company' ), ) // Args
		);
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
		echo esc_html( $args['before_widget'] );
		if ( esc_html( $instance['title'] ) ) {
			//echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<!-- Table Head -->
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="single-table">
				<div class="table-head">
					<?php if(!empty($instance['title'])){ ?>
						<div class="title-head">
							<h2 class="title">
								<?php echo esc_html(  $instance['title'] ); ?>
							</h2>
						</div>
						<?php } ?>
						<?php if(!empty($instance['price'])){ ?>
							<div class="price">
								<p class="amount"><?php echo esc_html( $instance['price'] ); ?></p>
							</div>	
							<?php } ?>
						</div>
						<!-- Table List -->

						<ul class="table-list">
							<?php if(!empty($instance['item1'])){ ?>
								<li><?php echo esc_html( $instance['item1'] ); ?></li>
								<?php } ?>
								<?php if(!empty($instance['item2'])){ ?>
									<li><?php echo esc_html( $instance['item2'] ); ?></li>
									<?php } ?>
									<?php if(!empty($instance['item3'])){ ?>
										<li><?php echo esc_html( $instance['item3'] ); ?></li>
										<?php } ?>
										<?php if(!empty($instance['item4'])){ ?>
											<li><?php echo esc_html( $instance['item4'] ); ?></li>
											<?php } ?>
											<?php if(!empty($instance['item5'])){ ?>
												<li><?php echo esc_html( $instance['item5'] ); ?></li>
												<?php } ?>
												<?php if(!empty($instance['item6'])){ ?>
													<li><?php echo esc_html( $instance['item6'] ); ?></li>
													<?php } ?>
												</ul>
												<?php if($instance['buy'] && $instance['buy_url']){ ?>
													<div class="button-head">
														<div class="button">
															<span></span>
															<a href="<?php echo esc_url($instance['buy_url']); ?>" class="btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo esc_html( $instance['buy'] ); ?></a>
														</div>
													</div>
												</div></div>
												<?php } ?>
												<!-- Table Bottom -->
												<?php



												echo esc_html( $args['after_widget'] );
											}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'title', 'creative-company' );
		$price = ! empty( $instance['price'] ) ? $instance['price'] : esc_html__( 'price', 'creative-company' );
		$item1 = ! empty( $instance['item1'] ) ? $instance['item1'] : esc_html__( 'item name', 'creative-company' );
		$item2 = ! empty( $instance['item2'] ) ? $instance['item2'] : esc_html__( 'item name', 'creative-company' );
		$item3 = ! empty( $instance['item3'] ) ? $instance['item3'] : esc_html__( 'item name', 'creative-company' );
		$item4 = ! empty( $instance['item4'] ) ? $instance['item4'] : esc_html__( 'item name', 'creative-company' );
		$item5 = ! empty( $instance['item5'] ) ? $instance['item5'] : esc_html__( 'item name', 'creative-company' );
		$item6 = ! empty( $instance['item6'] ) ? $instance['item6'] : esc_html__( 'item name', 'creative-company' );
		$buy   = ! empty( $instance['buy'] ) ? $instance['buy'] : esc_html__( 'label of link', 'creative-company' );
		$buy_url = ! empty( $instance['buy_url'] ) ? $instance['buy_url'] : esc_html__( 'label url', 'creative-company' );

		?>
		<p>
			<!-- Widgets Title -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'creative-company' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

			<!-- Widgets Price -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Price:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'price' ) ); ?>" type="text" value="<?php echo esc_attr( $price ); ?>">

			<!-- Widgets Table List Item1 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Table List Item1:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'item1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item1' ) ); ?>" type="text" value="<?php echo esc_attr( $item1 ); ?>">

			<!-- Widgets Table List Item2 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Table List Item2:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'item2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item2' ) ); ?>" type="text" value="<?php echo esc_attr( $item2 ); ?>">

			<!-- Widgets Table List Item3 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Table List Item3:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'item3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item3' ) ); ?>" type="text" value="<?php echo esc_attr( $item3 ); ?>">

			<!-- Widgets Table List Item4 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Table List Item4:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'item4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item4' ) ); ?>" type="text" value="<?php echo esc_attr( $item4 ); ?>">

			<!-- Widgets Table List Item5 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Table List Item5:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'item5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item5' ) ); ?>" type="text" value="<?php echo esc_attr( $item5 ); ?>">

			<!-- Widgets Table List Item6 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Table List Item6:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'item6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item6' ) ); ?>" type="text" value="<?php echo esc_attr( $item6 ); ?>">

			<!-- Widgets Buy Title-->
			<label for="<?php echo esc_attr( $this->get_field_id( 'buy' ) ); ?>"><?php esc_html_e( 'Lable of Link:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'buy' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'buy' ) ); ?>" type="text" value="<?php echo esc_attr( $buy ); ?>">

			<!-- Widgets Table List Item6 -->
			<label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'URL of Link:', 'creative-company' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'buy_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'buy_url' ) ); ?>" type="text" value="<?php echo esc_url( $buy_url ); ?>">



		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['price'] = ( ! empty( $new_instance['price'] ) ) ? strip_tags( $new_instance['price'] ) : '';
		$instance['item1'] = ( ! empty( $new_instance['item1'] ) ) ? strip_tags( $new_instance['item1'] ) : '';
		$instance['item2'] = ( ! empty( $new_instance['item2'] ) ) ? strip_tags( $new_instance['item2'] ) : '';
		$instance['item3'] = ( ! empty( $new_instance['item3'] ) ) ? strip_tags( $new_instance['item3'] ) : '';
		$instance['item4'] = ( ! empty( $new_instance['item4'] ) ) ? strip_tags( $new_instance['item4'] ) : '';
		$instance['item5'] = ( ! empty( $new_instance['item5'] ) ) ? strip_tags( $new_instance['item5'] ) : '';
		$instance['item6'] = ( ! empty( $new_instance['item6'] ) ) ? strip_tags( $new_instance['item6'] ) : '';
		$instance['buy']   = ( ! empty( $new_instance['buy'] ) ) ? strip_tags( $new_instance['buy'] ) : '';
		$instance['buy_url'] = ( ! empty( $new_instance['buy_url'] ) ) ? strip_tags( $new_instance['buy_url'] ) : '';
		return $instance;
	}

} // class creative_company_Widget


// register creative_company_Widget widget
function register_creative_company_widget() {
	register_widget( 'creative_company_Widget' );
}
add_action( 'widgets_init', 'register_creative_company_widget' );