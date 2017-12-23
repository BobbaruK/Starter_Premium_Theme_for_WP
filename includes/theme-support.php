<?php
/**
 * @package CSSecoThemes
 * theme-support.php
 *
 */

$options = get_option( 'about_postFormat' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ) {
	$output[] = ( @$options[ $format ] == 1 ? $format : '' );
}
if( !empty( $options ) ) {
	add_theme_support( 'post-formats', $output );
}