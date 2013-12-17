<?php
//Hook Widget
add_action( 'widgets_init', 'vimeo_master_widget' );
//Register Widget
function vimeo_master_widget() {
register_widget( 'vimeo_master_widget' );
}

class vimeo_master_widget extends WP_Widget {
	function vimeo_master_widget() {
	$widget_ops = array( 'classname' => 'Vimeo Master', 'description' => __('Vimeo Master for lets you integrate the superb Vimeo Video quality into any Wordpress widget position. Only for professional websites. ', 'Vimeo Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'vimeo_master_widget' );
	$this->WP_Widget( 'vimeo_master_widget', __('Vimeo Master', 'vimeo_master'), $widget_ops, $control_ops );
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
	//Display Vimeo Video
		
	//Display Vimeo Profile Button
		if ( $show_vimeobutton )
		$url_loc = plugins_url();
		echo '<br/>' .
		'<a href="'.$vimeobutton_page.'" target="_blank"><img src="'.$url_loc.'/vimeo-master/images/techgasp-vimeo-button.png"></a>';
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
	$defaults = array( 'name' => __('Vimeo Master', 'Vimeo master'), 'title' => true, 'show_vimeobutton' => false, 'vimeobutton_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'vimeo_master'); ?></b></label></br>
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_vimeobutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_vimeobutton' ); ?>" name="<?php echo $this->get_field_name( 'show_vimeobutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_vimeobutton' ); ?>"><b><?php _e('Vimeo Profile Button', 'vimeo_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'vimeobutton_page' ); ?>"><?php _e('insert your Vimeo Profile Link:', 'vimeo_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'vimeobutton_page' ); ?>" name="<?php echo $this->get_field_name( 'vimeobutton_page' ); ?>" value="<?php echo $instance['vimeobutton_page']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Show Vimeo Player</b>
	</p>
	<div class="description">Only available in advanced version.</div>
	<p><b>insert your Vimeo Video ID:</b></p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Auto-Play:</b></p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Loop:</b></p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Vimeo Width:</b></p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Vimeo Height:</b></p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Vimeo Color:</b></p>
	<div class="description">Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Shortcode Framework</b>
	</p>
	<div class="description">The shortcode framework allows you to insert Vimeo Master inside Pages & Posts without the need of extra plugins or gimmicks. Fast page load times and top SEO. Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Vimeo Master Website</b>
		</p>
		<p><a class="button-secondary" href="http://wordpress.techgasp.com/vimeo-master/" target="_blank" title="Vimeo Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/vimeo-master-documentation/" target="_blank" title="Vimeo Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/vimeo-master/" target="_blank" title="Vimeo Master Advanced">Adv. Version</a></p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Advanced Version Updater:</b>
	</p>
	<div class="description">The advanced version updater allows to automatically update your advanced plugin. Only available in advanced version.</div>
	<br>
	<?php
	}
 }
?>