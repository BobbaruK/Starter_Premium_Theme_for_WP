<?php
/**
 * @package CSSecoThemes
 * front/shortcodes.php
 *
 * Shortcodes Functions
 */

// Tooltip function
function csseco_tooltip( $atts, $content = null ) {

	//[tooltip placement="top" title="Tooltip title"]This is the content[/tooltip]

	// get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => ''
		),
		$atts,
		'tooltip'
	);

	$title = ( $atts['title'] == '' ? $content : $atts['title'] );

	// return HTML
	return '<style>.csseco-tooltip{color: #85858b;text-decoration: underline;}</style>
			<span class="csseco-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" 
				  title="' . $title . '">' . $content . '</span>';

}

// Popover function
function csseco_popover( $atts, $content = null ) {

	// [popover title="Popover title" data-content="amazing content"]Click to toggle popover[/popover]

	// get the attributes
	$atts = shortcode_atts(
		array(
			'title' => '',
			'placement' => 'top',
			'content' => '',
			'trigger' => 'click'
		),
		$atts,
		'popover'
	);

	$cntntP = ( $atts['content'] == '' ? $content : $atts['content'] );

	return '<style>.csseco-popover{color: #56565d;text-decoration: underline;}</style>
			<span class="csseco-popover" data-toggle="popover" data-title="' . $atts['title'] . '"  
				  data-placement="' . $atts['placement'] . '" data-content="' . $cntntP . '"
				  data-trigger="' . $atts["trigger"] . '">' . $content . '</span>';

}

// Contact Form shortcode
function csseco_contact_form( $atts, $content = null ) {

	// [contact_form]

	// get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);


	// return HTML
	ob_start(); // Turn on the output buffering; ob = output buffering
	include 'templates/contact-form.php'; // this will be "saved" in ob_start

	return ob_get_clean(); // return the ob

}