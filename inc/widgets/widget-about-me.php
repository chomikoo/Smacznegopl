<?php 
/**
 * About me widget.
 *
 *
 * @package Smacznegopl
 */
class About_Me extends WP_Widget {

    /**
    * Sets up the widgets name etc
    */
    public function __construct() {
        $widget_ops = array( 
            // 'classname' => 'widget__aboutme',
            'description' => __( 'O mnie', 'Smacznegopl' ) 
        );
        parent::__construct( 'about_me', 'O mnie', $widget_ops );
    }
	public function form( $instance ) {
		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'img'     => '',
			'textarea' => '',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
            <input class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>" />
        </p>
        
        <?php // Image ?>
        <p>
            <button class="button button-secondary" id="aboutme__image">Dodaj zdj</button>
            <input 
            type="hidden" 
            id="<?php echo esc_attr( $this->get_field_id('img')); ?>" 
            name="<?php echo esc_attr( $this->get_field_name('img')); ?>" 
            class="image_er_link" value="<?php echo esc_attr( $img ); ?>">
            <div class="image_show">
                <img src="<?php echo esc_attr( $img ); ?>" width="300" height="auto" alt="">
            </div>
        </p>

		<?php // Textarea Field ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>"><?php _e( 'Textarea:', 'text_domain' ); ?></label>
            <textarea class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'textarea' ) ); ?>">
            <?php echo wp_kses_post( $textarea ); ?>
        </textarea>
		</p>




	<?php }
	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        $instance['textarea'] = isset( $new_instance['textarea'] ) ? wp_kses_post( $new_instance['textarea'] ) : '';
	    $instance['img'] = isset( $new_instance['img'] ) ? strip_tags( $new_instance['img'] ) : '';
        
		return $instance;
	}
	// Display the widget
	public function widget( $args, $instance ) {
		extract( $args );
		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $textarea = isset( $instance['textarea'] ) ? $instance['textarea'] : '';
		$img = isset( $instance['img'] ) ? $instance['img'] : '';
        

		// WordPress core before_widget hook (always include )
		echo $before_widget;
		// Display the widget
		echo '<div class="aboutme">';
			// Display widget title if defined
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			
			// Display img field
			if ( $img ) {
				echo '<div class="aboutme__img thumbnail"><img src="' . $img . '" alt="autor bloga" /></div>';
			}
			// Display textarea field
			if ( $textarea ) {
				echo '<p class="aboutme__content">' . $textarea . '</p>';
			}

		echo '</div>';
		// WordPress core after_widget hook (always include )
		echo $after_widget;
	}
}
