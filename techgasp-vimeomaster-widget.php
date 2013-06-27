<?php
//Load Shortcode Framework

//Hook Widget
add_action( 'widgets_init', 'techgasp_vimeomaster_widget' );
//Register Widget
function techgasp_vimeomaster_widget() {
register_widget( 'techgasp_vimeomaster_widget' );
}

class techgasp_vimeomaster_widget extends WP_Widget {
	function techgasp_vimeomaster_widget() {
	$widget_ops = array( 'classname' => 'Vimeo Master', 'description' => __('Vimeo Master for lets you integrate the superb Vimeo Video quality into any Wordpress widget position. Only for professional websites. ', 'Vimeo Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'techgasp_vimeomaster_widget' );
	$this->WP_Widget( 'techgasp_vimeomaster_widget', __('Vimeo Master', 'youtube master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "Vimeo Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$vimeospacer ="'";
		$show_vimeobutton = isset( $instance['show_vimeobutton'] ) ? $instance['show_vimeobutton'] :false;
		$vimeobutton_page = $instance['vimeobutton_page'];
		echo $before_widget;
		
	// Display the widget title
		if ( $title )
		echo $before_title . $name . $after_title;
	//Display Vimeo Profile Button
		if ( $show_vimeobutton )
		echo '<a href="'.$vimeobutton_page.'" target="_blank"><img src="../wp-content/plugins/vimeo-master/techgasp-vimeo-button.png"></a>';
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_vimeobutton'] = $new_instance['show_vimeobutton'];
		$instance['vimeobutton_page'] = $new_instance['vimeobutton_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Vimeo Master', 'Vimeo master'), 'title' => true, 'show_vimeobutton' => false, 'vimeobutton_page' => false, 'show_vimeovideo' => false, 'vimeovideo_id' => false, 'vimeovideo_auto' => false, 'vimeovideo_loop' => false, 'vimeovideo_w' => false, 'vimeovideo_h' => false, 'vimeovideo_color' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<b>Check the buttons to be displayed:</b>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'vimeo master'); ?></b></label></br>
	</p>
	<hr>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_vimeobutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_vimeobutton' ); ?>" name="<?php echo $this->get_field_name( 'show_vimeobutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_vimeobutton' ); ?>"><b><?php _e('Vimeo Profile Button', 'vimeo master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'vimeobutton_page' ); ?>"><?php _e('insert your Vimeo Profile Link:', 'vimeo master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'vimeobutton_page' ); ?>" name="<?php echo $this->get_field_name( 'vimeobutton_page' ); ?>" value="<?php echo $instance['vimeobutton_page']; ?>" style="width:auto;" />
	</p>
	<hr>
	<p>Full help, read our online documentation.</p>
	<hr>
	<p><b>Vimeo Master Advanced Version</b></p>
	<p><a class="button-primary" href="http://wordpress.techgasp.com/vimeo-master/" target="_blank" title="Vimeo Master Advanced Version">Vimeo Master Advanced Version</a></p>
	<?php
	}
 }
?>