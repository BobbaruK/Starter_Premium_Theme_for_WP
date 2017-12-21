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
	/**
	 * ================
	 *      Settings ** register custom settings
	 * ================
	 */
	// CSS Options settings
	register_setting(
		'cssecoSettingsGroup-cssOptions',
		'css_bgCol'
	);
	register_setting(
		'cssecoSettingsGroup-cssOptions',
		'css_fontSize'
	);
	register_setting(
		'cssecoSettingsGroup-cssOptions',
		'css_mainBgCol'
	);
	// Sidebar Options settings
	register_setting(
		'cssecoSettingsGroup-sidebarOptions',
		'sidebar_width'//
	);
	register_setting(
		'cssecoSettingsGroup-sidebarOptions',
		'sidebar_location'//
	);
	register_setting(
		'cssecoSettingsGroup-sidebarOptions',
		'sidebar_bgcol'//
	);

	/**
	 * ================
	 *      Sections **
	 * ================
	 */
	// SECTION // add custom setting to page(csseco_th_sidebar_options(CSSeco Theme: Sidebar Options))
	add_settings_section(//CSS Options Section
		'csseco-css-options',
		'CSS Options',
		'cssecoth_css_options',
		'csseco_th_css_settings'
	);
	add_settings_section(//Sidebar Options Section
		'csseco-sidebar-options',
		'Sidebar Options',
		'cssecoth_sidebar_options',
		'csseco_th_sidebar_options'
	);

	/**
	 * ================
	 *      FIELDS ** add custom fields opts to section
	 * ================
	 */
	// Fields for css options
	add_settings_field(
		'css-bgcol',
		'Background Color',
		'csseco_css_bg',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	add_settings_field(
		'css-fontSize',
		'Font Size',
		'csseco_font_size',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	add_settings_field(
		'css-mainBgCol',
		'Main Content BgColor',
		'csseco_mainBgCol',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	// Fields for sidebar options
	add_settings_field(
		'sidebar-width',
		'Sidebar Width',
		'csseco_sidebar_width',// all callbacks in settings fields are in their files
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	add_settings_field(
		'sidebar-location',
		'Sidebar Location',
		'csseco_sidebar_location',// all callbacks in settings fields are in their files
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	add_settings_field(
		'sidebar-bgcol',
		'Sidebar BgCol',
		'csseco_sidebar_bgcol', // all callbacks in settings fields are in their files
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
}


/* Generate Pages */
function csseco_th_create_pg() {
	// function used by: "CSSeco Theme" and "About CSSeco Theme"
	require_once( get_template_directory() . '/includes/back/templates/about-options.php' );
}

function csseco_th_opts_css_subpage() {
	// function used by: "CSSeco Theme: CSS Settings"
	require_once( get_template_directory() . '/includes/back/templates/css-options.php' );
}

function csseco_th_opts_sidebar_subpage() {
	// function used by: "CSSeco Theme: Sidebar Options"
	require_once( get_template_directory() . '/includes/back/templates/sidebar-options.php' );
}