<?php
/**
 * @package CSSecoThemes
 * function-admin.php
 * ================
 *      ADMIN PAGE
 * ================
 */

function csseco_add_admin_page() {

	// Generate CSSeco Options Page
	add_menu_page(
		'CSSeco Theme Option',
		'CSSeco Theme',
		'manage_options',
		'csseco_th',
		'csseco_th_create_pg',
		get_template_directory_uri() . '/imgs/back_icons/csseco_admin_icon.png',
		110
	);
/**
 * ================
 *      ADMIN SUBPAGES
 * ================
 */
	// Generate About subpage(first subpage(this) is the same as the above(CSSeco Theme Option))
	add_submenu_page(
		'csseco_th',
		'About CSSeco Theme',
		'About',
		'manage_options',
		'csseco_th',
		'csseco_th_create_pg'
	);
	// Generate Sidebar Options subpage -> Options Sidebar
	add_submenu_page(
		'csseco_th',
		'CSSeco Theme: Sidebar Options',
		'Sidebar Options',
		'manage_options',
		'csseco_th_sidebar_options',
		'csseco_th_opts_sidebar_subpage'
	);
	// Generate CSS Options subpage -> Options CSS
	add_submenu_page(
		'csseco_th',
		'CSSeco Theme: CSS Settings',
		'CSS Options',
		'manage_options',
		'csseco_th_css_settings',
		'csseco_th_opts_css_subpage'
	);

	// Activate custom settings
	add_action( 'admin_init', 'csseco_custom_settings' );

}
// These are the custom settings
function csseco_custom_settings() {
	// SETTING // register custom settings
	register_setting(
		'csseco-settings-group',
		'sidebar_width'//
	);
	register_setting(
		'csseco-settings-group',
		'sidebar_bgcol'//
	);
	// SECTION // add custom setting to page(csseco_th_sidebar_options(CSSeco Theme: Sidebar Options))
	add_settings_section(
		'csseco-sidebar-options',
		'Sidebar Options',
		'cssecoth_sidebar_options',
		'csseco_th_sidebar_options'
	);
	// FIELD // add custom fields opts to section
	add_settings_field(
		'sidebar-width',
		'Sidebar Width',
		'csseco_sidebar_width',
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	add_settings_field(
		'sidebar-bgcol',
		'Sidebar BgCol',
		'csseco_sidebar_bgcol',
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
}


/* Generate Pages */
function csseco_th_create_pg() {
	// function used by: "CSSeco Theme" and "About CSSeco Theme"
	require_once( get_template_directory() . '/includes/back/templates/about-options.php' );
}

function csseco_th_opts_sidebar_subpage() {
	// function used by: "CSSeco Theme: Sidebar Options"
	require_once( get_template_directory() . '/includes/back/templates/sidebar-options.php' );
}

function csseco_th_opts_css_subpage() {
	// function used by: "CSSeco Theme: CSS Settings"
	require_once( get_template_directory() . '/includes/back/templates/css-options.php' );
}