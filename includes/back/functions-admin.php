<?php
/**
 * @package CSSecoThemes
 * back/functions-admin.php
 *
 * BackEnd Functions(mostly)
 */

function csseco_add_admin_page() {
	// Generate CSSeco Options Page
	add_menu_page(
		__('CSSeco Theme Option', 'cssecotheme'),
		__('CSSeco Theme', 'cssecotheme'),
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
		__('About CSSeco Theme', 'cssecotheme'),
		__('About', 'cssecotheme'),
		'manage_options',
		'csseco_th',
		'csseco_th_create_pg'
	);
	// Generate Sidebar Options subpage -> Options Sidebar
	add_submenu_page(
		'csseco_th',
		__('CSSeco Theme: Sidebar Options', 'cssecotheme'),
		__('Sidebar Options', 'cssecotheme'),
		'manage_options',
		'csseco_th_sidebar_options',
		'csseco_th_opts_sidebar_subpage'
	);
	// Generate CSS Options subpage -> Options CSS
	add_submenu_page(
		'csseco_th',
		__('CSSeco Theme: CSS Settings', 'cssecotheme'),
		__('CSS Options', 'cssecotheme'),
		'manage_options',
		'csseco_th_css_settings',
		'csseco_th_opts_css_subpage'
	);
	// Generate Contact Form Options subpage -> Options Contact Form
	add_submenu_page(
		'csseco_th',
		__('CSSeco Theme: Contact Form', 'cssecotheme'),
		__('Contact Form Options', 'cssecotheme'),
		'manage_options',
		'csseco_th_contactForm_settings',
		'csseco_th_opts_contactf_subpage'
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
	// About Options Settings
	register_setting(
		'cssecoSettingsGroup-About',
		'about_logo'//
	);
	register_setting(
		'cssecoSettingsGroup-About',
		'about_postFormat'//
	);
	register_setting(
		'cssecoSettingsGroup-About',
		'about_customHeader'//
	);
	register_setting(
		'cssecoSettingsGroup-About',
		'about_customBackground'//
	);
	register_setting(
		'cssecoSettingsGroup-About',
		'about_description',//
		'csseco_about_description_sanitization'// sanitization functions further down
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
	// CSS Options settings
	register_setting(
		'cssecoSettingsGroup-CSS',
		'css_bgCol'
	);
	register_setting(
		'cssecoSettingsGroup-CSS',
		'css_fontSize'//
	);
	register_setting(
		'cssecoSettingsGroup-CSS',
		'css_mainBgCol'//
	);
	register_setting(
		'cssecoSettingsGroup-CSS',
		'css_customcss',//
		'csseco_customcss_sanitize'
	);
	// Contact Form Options settings
	register_setting(
		'cssecoSettingsGroup-ContactF',
		'contactF_activate'//
	);

	/**
	 * ================
	 *      Sections **
	 * ================
	 */
	// SECTION // add custom setting to page
	// About Options Section
	add_settings_section(
		'csseco-about-options',
		__('About CSSeco Theme...', 'cssecotheme'),
		'cssecoth_about_options_callback',
		'csseco_th'
	);
	//CSS Options Section
	add_settings_section(
		'csseco-css-options',
		__('CSS Options', 'cssecotheme'),
		'cssecoth_css_options_callback',
		'csseco_th_css_settings'
	);
	//Sidebar Options Section
	add_settings_section(
		'csseco-sidebar-options',
		__('Sidebar Options', 'cssecotheme'),
		'cssecoth_sidebar_options_callback',
		'csseco_th_sidebar_options'
	);
	//ContactF Options Section
	add_settings_section(
		'csseco-contactf-options',
		__('Contact Form Activation', 'cssecotheme'),
		'cssecoth_contactF_options_callback',
		'csseco_th_contactForm_settings'
	);

	/**
	 * ================
	 *      FIELDS ** add custom fields opts to section
	 * ================
	 */
	// Fields for about options
	add_settings_field(
		'about-logo',
		__('Logo', 'cssecotheme'),
		'csseco_about_logo_callback',// all callbacks in settings fields are in their files
		'csseco_th',
		'csseco-about-options'
	);
	add_settings_field(
		'about-post-format',
		__('Post Formats', 'cssecotheme'),
		'csseco_postFormats_callback',// all callbacks in settings fields are in their files
		'csseco_th',
		'csseco-about-options'
	);
	add_settings_field(
		'about-custom-header',
		__('Custom Header', 'cssecotheme'),
		'csseco_customHeader_callback',// all callbacks in settings fields are in their files
		'csseco_th',
		'csseco-about-options'
	);
	add_settings_field(
		'about-custom-background',
		__('Custom background', 'cssecotheme'),
		'csseco_customBackground_callback',// all callbacks in settings fields are in their files
		'csseco_th',
		'csseco-about-options'
	);
	add_settings_field(
		'about-description',
		__('Long description', 'cssecotheme'),
		'csseco_description_callback',// all callbacks in settings fields are in their files
		'csseco_th',
		'csseco-about-options'
	);
	// Fields for sidebar options
	add_settings_field(
		'sidebar-width',
		__('Sidebar Width', 'cssecotheme'),
		'csseco_sidebar_width_callback',// all callbacks in settings fields are in their files
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	add_settings_field(
		'sidebar-location',
		__('Sidebar Location', 'cssecotheme'),
		'csseco_sidebar_location_callback',// all callbacks in settings fields are in their files
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	add_settings_field(
		'sidebar-bgcol',
		__('Sidebar BgCol', 'cssecotheme'),
		'csseco_sidebar_bgcol_callback', // all callbacks in settings fields are in their files
		'csseco_th_sidebar_options',
		'csseco-sidebar-options'
	);
	// Fields for css options
	add_settings_field(
		'css-bgcol',
		__('Background Color', 'cssecotheme'),
		'csseco_css_bg_callback',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	add_settings_field(
		'css-fontSize',
		__('Font Size', 'cssecotheme'),
		'csseco_font_size_callback',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	add_settings_field(
		'css-mainBgCol',
		__('Main Content BgColor', 'cssecotheme'),
		'csseco_mainBgCol_callback',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	add_settings_field(
		'css-customcss',
		__('Custom CSS', 'cssecotheme'),
		'csseco_customCSS_callback',// all callbacks in settings fields are in their files
		'csseco_th_css_settings',
		'csseco-css-options'
	);
	// Fields for contact form options
	add_settings_field(
		'contactF-activate',
		__('Activate Contact Form', 'cssecotheme'),
		'contactF_checkActiv_callback',// all callbacks in settings fields are in their files
		'csseco_th_contactForm_settings',
		'csseco-contactf-options'
	);

}


/**
 * ================
 *      Sanitizations and Callback functions
 * ================
 */
function csseco_about_description_sanitization( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', ' at ', $output);
	return $output;
}

function csseco_customcss_sanitize( $input ) {
	$output = esc_textarea( $input );
	return $output;
}


/**
 * ================
 *      Generate Pages
 * ================
 */
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

function csseco_th_opts_contactf_subpage() {
	// function used by: "CSSeco Theme: Contact Form Settings"
	require_once( get_template_directory() . '/includes/back/templates/contactform-options.php' );
}