<?php
/**
 * @package CSSecoThemes
 * back/functions-admin.php
 *
 * BackEnd Functions(mostly...)
 */

function csseco_add_admin_page() {
	// Generate CSSeco Options Page
	add_menu_page(
		__('CSSeco Theme Option', 'cssecotheme'),
		__('CSSeco Theme', 'cssecotheme'),
		'manage_options',
		'csseco_first_theme_features',
		'csseco_first_themefeatures',
		get_template_directory_uri() . '/imgs/back_icons/csseco_admin_icon.png',
		110
	);
/**
 * ================
 *      ADMIN SUBPAGES
 * ================
 */
	// Generate 1.Theme Features(first subpage(this) is the same as the above(CSSeco Theme))
	add_submenu_page(
		'csseco_first_theme_features',
		__('CSSeco Theme: Theme Features Options', 'cssecotheme'),
		__('Theme Features', 'cssecotheme'),
		'manage_options',
		'csseco_first_theme_features',
		'csseco_first_themefeatures'
	);
	// Generate 2.Header(second subpage)
	add_submenu_page(
		'csseco_first_theme_features',
		__('CSSeco Theme: Header Options', 'cssecotheme'),
		__('Header', 'cssecotheme'),
		'manage_options',
		'csseco_second_header',
		'csseco_second_header_f'
	);
	// Generate 3.Content/Sidebar(third subpage)
	add_submenu_page(
		'csseco_first_theme_features',
		__('CSSeco Theme: Content/Sidebar Options', 'cssecotheme'),
		__('Content/Sidebar', 'cssecotheme'),
		'manage_options',
		'csseco_third_content_sidebar',
		'csseco_third_contentsidebar'
	);
	// Generate 4.Footer(fourth subpage)
	add_submenu_page(
		'csseco_first_theme_features',
		__('CSSeco Theme: Footer Options', 'cssecotheme'),
		__('Footer', 'cssecotheme'),
		'manage_options',
		'csseco_fourth_footer',
		'csseco_fourth_footer_f'
	);
	// Generate 5.Custom CSS(fifth subpage)
	add_submenu_page(
		'csseco_first_theme_features',
		__('CSSeco Theme: Custom CSS', 'cssecotheme'),
		__('Custom CSS', 'cssecotheme'),
		'manage_options',
		'csseco_fifth_custom_css',
		'csseco_fifth_customcss'
	);

	// Activate custom settings
	add_action( 'admin_init', 'csseco_custom_settings' );
}
add_action( 'admin_menu', 'csseco_add_admin_page' );                   // Add admin page(CSSeco Options) - BACKEND

// These are the custom settings
function csseco_custom_settings() {
	/**
	 * ================
	 *      Settings ** register custom settings
	 * ================
	 */
	// Theme Features Options Settings
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_postFormat'//
	);
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_customHeader'//
	);
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_customBackground'//
	);
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_contactF_activate'//
	);
		// Theme Features Social Settings
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_social_facebook'//
	);
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_social_twitter',//
		'themefeatures_social_twitter_sanitization'
	);
	register_setting(
		'cssecoSettingsGroup-ThemeFeatures',
		'themefeatures_social_googlep'//
	);
	// Header Options Settings
	register_setting(
		'cssecoSettingsGroup-Header',
		'header_logo'//
	);
	// Content/Sidebar Options settings
	register_setting(
		'cssecoSettingsGroup-ContentSidebar',
		'sidebar_location'//
	);
	register_setting(
		'cssecoSettingsGroup-ContentSidebar',
		'content_width'//
	);
	register_setting(
		'cssecoSettingsGroup-ContentSidebar',
		'sidebar_bgcol'//
	);
	// Footer Options Settings
	register_setting(
		'cssecoSettingsGroup-Footer',
		'footer_description',//
		'footer_description_sanitization'// sanitization functions further down
	);
	// CustomCSS Options settings
	register_setting(
		'cssecoSettingsGroup-CustomCss',
		'customcss_bgCol'
	);
	register_setting(
		'cssecoSettingsGroup-CustomCss',
		'customcss_fontSize'//
	);
	register_setting(
		'cssecoSettingsGroup-CustomCss',
		'customcss_mainBgCol'//
	);
	register_setting(
		'cssecoSettingsGroup-CustomCss',
		'customcss_thecss',//
		'customcss_thecss_sanitize'// sanitization functions further down
	);

	/**
	 * ================
	 *      Sections **
	 * ================
	 */
	// SECTION // add custom setting to page
	// Theme Features Options Section
	add_settings_section(
		'csseco-thfeatures-options',
		__('Theme Features', 'cssecotheme'),
		'cssecoth_themefeatures_options_callback',
		'csseco_first_theme_features'
	);
	add_settings_section(
		'csseco-thfeatures-social',
		__('Social Sharing', 'cssecotheme'),
		'cssecoth_themefeatures_social_callback',
		'csseco_first_theme_features'
	);
	// Header Options Section
	add_settings_section(
		'csseco-header-options',
		__('Header Options...', 'cssecotheme'),
		'cssecoth_header_options_callback',
		'csseco_second_header'
	);
	// Content/Sidebar Options Section
	add_settings_section(
		'csseco-content-sidebar-options',
		__('Sidebar Options', 'cssecotheme'),
		'cssecoth_contentsidebar_options_callback',
		'csseco_third_content_sidebar'
	);
	//Footer Options Section
	add_settings_section(
		'csseco-footer-options',
		__('Sidebar Options', 'cssecotheme'),
		'cssecoth_footer_options_callback',
		'csseco_fourth_footer'
	);
	//CSS Options Section
	add_settings_section(
		'csseco-css-options',
		__('CSS Options', 'cssecotheme'),
		'cssecoth_css_options_callback',
		'csseco_fifth_custom_css'
	);


	/**
	 * ================
	 *      FIELDS ** add custom fields opts to section
	 * ================
	 */
	// Fields for Theme Features Options
	add_settings_field(
		'themefeatures-post-format',
		__('Post Formats', 'cssecotheme'),
		'csseco_postFormats_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-options'
	);
	add_settings_field(
		'themefeatures-custom-header',
		__('Custom Header', 'cssecotheme'),
		'csseco_customHeader_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-options'
	);
	add_settings_field(
		'themefeatures-custom-background',
		__('Custom background', 'cssecotheme'),
		'csseco_customBackground_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-options'
	);
	add_settings_field(
		'themefeatures-contactF-activate',
		__('Activate Contact Form', 'cssecotheme'),
		'contactF_checkActiv_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-options'
	);
	// Fields for Theme Social Options
	add_settings_field(
		'themefeatures-social-facebook',
		__('Facebook', 'cssecotheme'),
		'csseco_th_social_facebook_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-social'
	);
	add_settings_field(
		'themefeatures-social-twitter',
		__('Twitter', 'cssecotheme'),
		'csseco_th_social_twitter_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-social'
	);
	add_settings_field(
		'themefeatures-social-googlep',
		__('Google Plus', 'cssecotheme'),
		'csseco_th_social_googlep_callback',// all callbacks in settings fields are in their files
		'csseco_first_theme_features',
		'csseco-thfeatures-social'
	);
	// Fields for Header Options
	add_settings_field(
		'header-logo',
		__('Logo', 'cssecotheme'),
		'csseco_about_logo_callback',// all callbacks in settings fields are in their files
		'csseco_second_header',
		'csseco-header-options'
	);
	// Fields for Content/Sidebar options
	add_settings_field(
		'sidebar-location',
		__('Sidebar Location', 'cssecotheme'),
		'csseco_sidebar_location_callback',// all callbacks in settings fields are in their files
		'csseco_third_content_sidebar',
		'csseco-content-sidebar-options'
	);
	add_settings_field(
		'content-width',
		__('Content Width', 'cssecotheme'),
		'csseco_content_width_callback',// all callbacks in settings fields are in their files
		'csseco_third_content_sidebar',
		'csseco-content-sidebar-options'
	);
	add_settings_field(
		'sidebar-bgcol',
		__('Sidebar BgCol', 'cssecotheme'),
		'csseco_sidebar_bgcol_callback', // all callbacks in settings fields are in their files
		'csseco_third_content_sidebar',
		'csseco-content-sidebar-options'
	);
	// Fields for Footer options
	add_settings_field(
		'footer-description',
		__('Long description', 'cssecotheme'),
		'csseco_description_callback',// all callbacks in settings fields are in their files
		'csseco_fourth_footer',
		'csseco-footer-options'
	);
	// Fields for css options
	add_settings_field(
		'css-bgcol',
		__('Background Color', 'cssecotheme'),
		'csseco_css_bg_callback',// all callbacks in settings fields are in their files
		'csseco_fifth_custom_css',
		'csseco-css-options'
	);
	add_settings_field(
		'css-fontSize',
		__('Font Size', 'cssecotheme'),
		'csseco_font_size_callback',// all callbacks in settings fields are in their files
		'csseco_fifth_custom_css',
		'csseco-css-options'
	);
	add_settings_field(
		'css-mainBgCol',
		__('Main Content BgColor', 'cssecotheme'),
		'csseco_mainBgCol_callback',// all callbacks in settings fields are in their files
		'csseco_fifth_custom_css',
		'csseco-css-options'
	);
	add_settings_field(
		'css-customcss',
		__('Custom CSS', 'cssecotheme'),
		'csseco_customCSS_callback',// all callbacks in settings fields are in their files
		'csseco_fifth_custom_css',
		'csseco-css-options'
	);

}


/**
 * ================
 *      Sanitizations and Callback functions
 * ================
 */
function themefeatures_social_twitter_sanitization( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output);
	return $output;
}

function footer_description_sanitization( $input ) {
	$output = sanitize_text_field( $input );
	return $output;
}

function customcss_thecss_sanitize( $input ) {
	$output = esc_textarea( $input );
	return $output;
}


/**
 * ================
 *      Generate Pages
 * ================
 */
function csseco_first_themefeatures() {
	// function used by: "CSSeco Theme" and "Theme Features"
	require_once( get_template_directory() . '/includes/back/templates/themefeatures-options.php' );
}

function csseco_second_header_f() {
	// function used by: "Header"
	require_once( get_template_directory() . '/includes/back/templates/header-options.php' );
}

function csseco_third_contentsidebar() {
	// function used by: "Content/Sidebar"
	require_once( get_template_directory() . '/includes/back/templates/contentsidebar-options.php' );
}

function csseco_fourth_footer_f() {
	// function used by: "Footer"
	require_once( get_template_directory() . '/includes/back/templates/footer-options.php' );
}

function csseco_fifth_customcss() {
	// function used by: "Custom CSS"
	require_once( get_template_directory() . '/includes/back/templates/customcss-options.php' );
}

function csseco_th_opts_contactf_subpage() {
	// function used by: "CSSeco Theme: Contact Form Settings"
	require_once( get_template_directory() . '/includes/back/templates/contactform-options.php' );
}