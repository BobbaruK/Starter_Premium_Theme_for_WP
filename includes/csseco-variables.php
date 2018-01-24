<?php
/**
 * @package CSSecoThemes
 * csseco-variables.php
 */
function csseco_variables_global_init() {

	global $sidebarLocation, $contentWidth, $sidebarWidth;

	$sidebarLocation = get_option('sidebar_location');

	$contentWidth = ( ( get_option('sidebar_location') == 'sidebarLeft' || get_option('sidebar_location') == 'sidebarRight' ) && get_option('content_width') == 12 ? $contentWidth = 9 : ( get_option('sidebar_location') == 'sidebarBottom' || get_option('sidebar_location') == 'sidebarNone' ? 12 : get_option('content_width') ) );
	$sidebarWidth = ( get_option('sidebar_location') == 'sidebarBottom' ? 12 : 12 - $contentWidth );

}
add_action( 'after_setup_theme', 'csseco_variables_global_init' );