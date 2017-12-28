<?php
/**
 * @package CSSecoThemes
 * cleanup.php
 * ================
 *      Remove generator version number
 * ================
 */

/* remove version number(string) from js and css files */
function csseco_remove_wp_version_strings( $src ) {
	global $wp_version;
	parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
	if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

/* remove version number(string) from meta name="generator" */
function csseco_remove_meta_verstion() {
	return '';
}