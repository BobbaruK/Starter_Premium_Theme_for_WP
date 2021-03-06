<?php
/**
 * @package CSSecoThemes
 * front/enqueue.php
 *
 */

function csseco_load_front_scripts() {

	/**
	 * jquery
	 */
//	wp_deregister_script( 'jquery' );
//	wp_register_script(
//		'jquery',
//		get_template_directory_uri() . '/vendor/jquery-v1.12.4/jquery.min.js',
//		false,
//		'1.12.4',
//		true
//	);/* jquery v1.12.4 */
//	wp_register_script(
//		'jquery',
//		get_template_directory_uri() . '/vendor/jquery-v3.2.1/jquery.min.js',
//		false,
//		'3.2.1',
//		true
//	);/* jquery v3.2.1 */
//	wp_enqueue_script( 'jquery' );

	/**
	 * Bootstrap v3.3.7
	 */
	/* Style */
	wp_register_style(
		'csseco_front_bootstrap_style',
		get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.css',
		array(),
		'3.3.7',
		'all'
	);
	wp_enqueue_style('csseco_front_bootstrap_style');
	/* Script */
	wp_register_script(
		'csseco_front_bootstrap_js',
		get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js',
		array('jquery'),
		'3.3.7',
		true
	);
	wp_enqueue_script('csseco_front_bootstrap_js');

	/**
	 * FrontEnd
	 */
	/* Style */
	wp_register_style(
		'csseco_front_style',
		get_template_directory_uri() . '/css/csseco.css',
		array(),
		'1.0.0',
		'all'
	);
	wp_enqueue_style('csseco_front_style');
	/* Script */
	wp_register_script(
		'csseco_front_js',
		get_template_directory_uri() . '/js/csseco.js',
		array('jquery'),
		'1.0.0',
		true
	);
	wp_enqueue_script('csseco_front_js');
	/* Auto Load More Next Posts Init*/
	if ( get_option( 'themefeatures_loadMore_or_pagination' ) == 'autoLoadMoreButtonPagination' ) {
		wp_register_script(
			'autoload_init',
			get_template_directory_uri() . '/js/csseco.autoload-init.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);
		wp_enqueue_script('autoload_init');
	}

}
add_action( 'wp_enqueue_scripts', 'csseco_load_front_scripts' );       // hook style and scripts to the FRONTEND