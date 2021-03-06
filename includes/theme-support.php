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
$optionsCustomHeaderArgs = array(
	'default-image'          => '',
	'width'                  => 800,
	'height'                 => 300,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '000000',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
if( @$optionsCustomHeader == 1 ) {
	add_theme_support( 'custom-header', $optionsCustomHeaderArgs );
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

/**
 * HTML5 Features
 */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );