<?php
/**
 * @package CSSecoThemes
 * widgets.php
 *
 * CSSeco Custom Widget
 */
class CSSeco_custom_Widget extends WP_Widget {
	// Setup the widget name, desc, etc...
	public function __construct() {
		$widget_opts = array(
			'classname'     => 'csseco-custom-widget',
			'description'   => 'CSSeco Custom Widget Description'
		);
		parent::__construct( 'csseco_widget', 'CSSeo Custom Widget', $widget_opts );
	}

	// back-end display of widget
	public function form( $instance ) {
		echo '<p><strong>No options for this widget!</strong><br>You can control this Widget from <a href="./admin.php?page=csseco_second_header">this page</a>.</p>';
	}

	// front-end display of widget
	public function widget( $args, $instance ){
		$aboutLogo = get_option('header_logo');
		echo $args['before_widget'];
		echo $args['before_title'];
		echo 'Logo';
		echo $args['after_title'];
		echo '<img src="' . $aboutLogo . '" alt="" />';
		echo $args['after_widget'];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'CSSeco_custom_Widget' );
} );