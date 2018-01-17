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

/* Edit tag widget font size */
function csseco_tag_cloud_font_change( $args ) {
	$args['smallest'] = 8;
	$args['largest'] = 18;

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'csseco_tag_cloud_font_change' );

/**
 * Save Posts Views
 */
function csseco_save_post_views( $postID ) {
	$metaKey = 'csseco_post_views';
	$views = get_post_meta( $postID, $metaKey, true );

	$count = ( empty( $views ) ? 0 : $views );
	$count++;

	update_post_meta( $postID, $metaKey, $count );

	//echo '<h1>'.$views.'</h1>';
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/**
 * Popular posts widget
 */
class CSSeco_Popular_Posts_Widget extends WP_Widget {
	// Setup the widget name, desc, etc...
	public function __construct() {
		$widget_opts = array(
			'classname'     => 'csseco-popular-posts',
			'description'   => 'CSSeco Popular Posts Widget'
		);
		parent::__construct( 'csseco_popuplar_posts_widget', 'CSSeo Popular Posts Widget', $widget_opts );
	}

	// back-end display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 2 );

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" 
					name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" 
					name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '">';
		$output .= '</p>';

		echo $output;
	}

	// update widget info
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}

	// front-end display of widget
	public function widget( $args, $instance ) {
		$tot = absint( $instance[ 'tot' ] );

		$posts_args = array(
			'post_type'         => 'post',
			'posts_per_page'    => $tot,
			//'year'              => 2018,
			'meta_key'          => 'csseco_post_views',
			'orderby'           => 'meta_value_num',
			'order'             => 'DESC'
		);

		$posts_query = new WP_Query( $posts_args );

		echo $args[ 'before_widget' ];

			if ( !empty( $instance[ 'title' ] ) ) {
				echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			}

			if ( $posts_query->have_posts() ) {
				echo '<ul>';
				while ( $posts_query->have_posts() ) {
					$posts_query->the_post();
					echo '<li class="post-' . ( get_post_format() ? get_post_format() : 'standard' ) . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
				}
				echo '</ul>';
			}
			wp_reset_postdata();

		echo $args[ 'after_widget' ];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'CSSeco_Popular_Posts_Widget' );
} );