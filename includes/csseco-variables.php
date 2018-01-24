<?php
/**
 * @package CSSecoThemes
 * csseco-variables.php
 */
function csseco_global_variables_init() {

	global $sidebarLocation, $contentWidth, $sidebarWidth, $detect;

	/*
	 * Sidebar Location
	 */
	$sidebarLocation = get_option('sidebar_location');
	/*
	 * Content and Sidebar width
	 */
	$contentWidth = ( ( get_option('sidebar_location') == 'sidebarLeft' || get_option('sidebar_location') == 'sidebarRight' ) && get_option('content_width') == 12 ? $contentWidth = 9 : ( get_option('sidebar_location') == 'sidebarBottom' || get_option('sidebar_location') == 'sidebarNone' ? 12 : get_option('content_width') ) );
	$sidebarWidth = ( get_option('sidebar_location') == 'sidebarBottom' ? 12 : 12 - $contentWidth );
	/**
	 * Mobile detect v2.8.30 - http://mobiledetect.net/
	 *
	 * use:
	 * if ( $detect->isMobile() ) {
	 *      // code here to show on mobile
	 * }
	 * global $detect; // in the file where you use Mobile Detect
	 */
	$detect = new Mobile_Detect; // watch https://youtu.be/BxQ99V_PBXA?t=3m21s

}
add_action( 'after_setup_theme', 'csseco_global_variables_init' );