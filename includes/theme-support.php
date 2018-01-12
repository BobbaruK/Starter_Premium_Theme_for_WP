<?php
/**
 * @package CSSecoThemes
 * theme-support.php
 *
 * Post Formats
 */
$optionsPostFormats = get_option( 'themefeatures_postFormat' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ) {
	$output[] = ( @$optionsPostFormats[ $format ] == 1 ? $format : '' );
}
if( @$optionsPostFormats ) {
	add_theme_support( 'post-formats', $output );
}

/**
 * Custom Header
 */
$optionsCustomHeader = get_option( 'themefeatures_customHeader' );
if( @$optionsCustomHeader == 1 ) {
	add_theme_support( 'custom-header' );
}

/**
 * Custom Background
 */
$optionsCustomBg = get_option( 'themefeatures_customBackground' );
if( @$optionsCustomBg == 1 ) {
	add_theme_support( 'custom-background' );
}

/**
 * Post Thumbnails(Featured Image)
 */
add_theme_support( 'post-thumbnails' );