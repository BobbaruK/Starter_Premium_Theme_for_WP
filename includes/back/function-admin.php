<?php
/**
 * @package CSSecoThemes
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
	// Generate CSSeco Theme SubPages
	// Generate About subpage(first subpage(this) is the same as the above(CSSeco Theme Option))
	add_submenu_page(
		'csseco_th',
		'About CSSeco Theme',
		'About',
		'manage_options',
		'csseco_th',
		'csseco_th_create_pg'
	);
	// Generate CSS Options subpages -> Options
	add_submenu_page(
		'csseco_th',
		'CSSeco Theme: CSS Settings',
		'CSS Options',
		'manage_options',
		'csseco_th_css_settings',
		'csseco_th_opts_subpage'
	);
	// Generate Sidebar Options subpages -> Options
	add_submenu_page(
		'csseco_th',
		'CSSeco Theme: Sidebar Options',
		'Sidebar Options',
		'manage_options',
		'csseco_th_sidebar_options',
		'csseco_th_opts_sidebar'
	);

	// Activate custom settings
	add_action( 'admin_init', 'csseco_custom_settings' );

}
// These are the custom settings
function csseco_custom_settings() {
	// SETTING // register custom settings
	register_setting(
		'csseco-settings-group',
		'first_name'
	);
	register_setting(
		'csseco-settings-group',
		'last_name'
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
		'sidebar-fname',
		'First Name',
		'csseco_sidebar_fname',
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	add_settings_field(
		'sidebar-lname',
		'Last Name',
		'csseco_sidebar_lname',
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
}
function cssecoth_sidebar_options() {
	echo 'Custom sidebar';
}
// Custom Option First Name
function csseco_sidebar_fname() {
	$firstName = esc_attr( get_option('first_name') );
	echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />';
}
// Custom Option Last Name
function csseco_sidebar_lname() {
	$lastName = esc_attr( get_option('last_name') );
	echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
}


/* Generate Pages */
function csseco_th_create_pg() {
	// function used by: "CSSeco Theme" and "About CSSeco Theme"
	echo '<h1>About CSSeco Theme</h1>';
	echo '<h3 class="title">BobbaruK a.K.a. CSSeco or just Seco(one)</h3>';
	echo '<p>CSSeco Starter Premium Theme is the best starter theme ever</p>';
}

function csseco_th_opts_subpage() {
	// function used by: "CSSeco Theme: CSS Settings"
	echo '<h1>CSSeco Theme CSS Options</h1>';
}

function csseco_th_opts_sidebar() {
	// function used by: "CSSeco Theme: Sidebar Options"
	require_once( get_template_directory() . '/includes/back/templates/pages-admin.php' );
}