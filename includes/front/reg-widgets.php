<?php
/**
 * @package CSSecoThemes
 * front/widgets.php
 *
 * Register sidebar and widgets
 */

function csseco_sidebar_init() {
	register_sidebar( array (
		'name'              => __('Sidebar', 'cssecotheme'),
		'id'                => 'csseco_sidebar',
		'description'       => __( 'Widget area', 'cssecotheme'),
		'class'             => '',
		'before_widget'     => '<section id="%1$s" class="csseco-widget %2$s">',
		'after_widget'      => '</section>',
		'before_title'      => '<h3 class="csseco-widget-title">',
		'after_title'       => '</h3>'
	) );
}
add_action( 'widgets_init', 'csseco_sidebar_init' );                   // register widget area(sidebar)