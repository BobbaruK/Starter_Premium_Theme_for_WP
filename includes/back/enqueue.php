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

	wp_register_style(
		'csseco_admin_style',
		get_template_directory_uri() . '/css/csseco.admin.css',
		array(),
		'1.0.0',
		'all'
	);
	wp_enqueue_style('csseco_admin_style');

}
add_action('admin_enqueue_scripts', 'csseco_load_admin_scripts');