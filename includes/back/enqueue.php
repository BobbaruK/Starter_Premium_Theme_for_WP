<?php
/**
 * @package CSSecoThemes
 * back/enqueue.php
 *
 */

function csseco_load_admin_scripts( $hook ) {

	//echo $hook;

	if ( // all pages($hook) that i want to have the style and scripts after if
		('toplevel_page_csseco_th' != $hook) &&
		('csseco-theme_page_csseco_th_sidebar_options' != $hook) &&
		('csseco-theme_page_csseco_th_css_settings' != $hook)
	) {
		return;
	}

	// Admin css
	wp_register_style(
		'csseco_admin_style',
		get_template_directory_uri() . '/css/csseco.admin.css',
		array(),
		'1.0.0',
		'all'
	);
	wp_enqueue_style('csseco_admin_style');

	// Wordpress Media Uploader
	wp_enqueue_media();
	// Admin js
	wp_register_script(
		'csseco_admin_js',
		get_template_directory_uri() . '/js/csseco.admin.js',
		array('jquery'),
		'1.0.0',
		true
	);
	wp_enqueue_script('csseco_admin_js');

}
add_action('admin_enqueue_scripts', 'csseco_load_admin_scripts');