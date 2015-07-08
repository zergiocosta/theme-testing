<?php
add_theme_support('widgets');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function republitheme_sidebar_registers() {
	register_sidebar( array(
		'name' => __( 'Footer First Column', 'republitheme' ),
		'id' => 'footer_first_column',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Second Column', 'republitheme' ),
		'id' => 'footer_second_column',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Third Column', 'republitheme' ),
		'id' => 'footer_third_column',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Fourth Column', 'republitheme' ),
		'id' => 'footer_fourth_column',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Before Footer', 'republitheme' ),
		'id' => 'before_footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'After Footer', 'republitheme' ),
		'id' => 'after_footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'republitheme_sidebar_registers' );


/**
 * Adds Foo_Widget widget.
 */
class Foo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__( 'Widget Title', 'text_domain' ), // Name
			array( 'description' => __( 'A Foo Widget', 'text_domain' ), ) // Args
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		echo __( 'Hello, World!', 'text_domain' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

		return $instance;
	}

} // class Foo_Widget
// Register and load the widget
function wpb_load_widget() {
	register_widget( 'foo_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );




