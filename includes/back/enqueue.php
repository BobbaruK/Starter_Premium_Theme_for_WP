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
		('csseco-theme_page_csseco_th_css_settings' != $hook) &&
		('csseco-theme_page_csseco_th_contact_form_settings' != $hook)
	) {
		return;
	}

	/**
	 * Admin CSS & JS
	 */
	/* Style */
	wp_register_style(
		'csseco_admin_style',
		get_template_directory_uri() . '/css/csseco.admin.css',
		array(),
		'1.0.0',
		'all'
	);
	wp_enqueue_style('csseco_admin_style');
	/* Script */
	wp_register_script(
		'csseco_admin_js',
		get_template_directory_uri() . '/js/csseco.admin.js',
		array('jquery'),
		'1.0.0',
		true
	);
	wp_enqueue_script('csseco_admin_js');

	/**
	 * Wordpress Media Uploader style
	 */
	wp_enqueue_media();

	/**
	 * Wordpress ColorPicker
	 */
	/* Style */
	wp_enqueue_style( 'wp-color-picker' );
	/* Script */
	wp_register_script(
		'custom-wp-color-pic-script-handle',
		get_template_directory_uri() . '/js/colorpicwp-init.js',
		array( 'wp-color-picker' ),
		false,
		true
	);
	wp_enqueue_script( 'custom-wp-color-pic-script-handle' );

	if ('csseco-theme_page_csseco_th_css_settings' == $hook) {
		/**
		 * Ace(makes textarea and other tags, like IDE's(phpStorm))
		 */
		/* Style */
		wp_register_style(
			'csseco_ace_css',
			get_template_directory_uri() . '/css/csseco.ace.css',
			array(),
			'1.0.0',
			'all'
		);
		wp_enqueue_style( 'csseco_ace_css' );
		/* Scripts */
		wp_register_script(
			'csseco_ace_js',
			get_template_directory_uri() . '/vendor/ace/ace.js',
			array( 'jquery' ),
			'1.2.9',
			true
		);
		wp_enqueue_script( 'csseco_ace_js' );
		wp_register_script(
			'csseco_custom_css_js',
			get_template_directory_uri() . '/js/csseco.ace.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);
		wp_enqueue_script( 'csseco_custom_css_js' );
	}

}