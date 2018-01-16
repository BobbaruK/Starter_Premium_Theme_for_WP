<?php
/**
 * @package CSSecoThemes
 * functions.php
 *
 *
 * Set up
 */
include( get_template_directory() . '/includes/theme-support.php' );            // theme support (multiple)


/**
 * All the sh*t right here...
 */
include( get_template_directory() . '/includes/cleanup.php' );                  // remove version string from dom
include( get_template_directory() . '/includes/back/functions-admin.php' );     // functions that work in backend(mostly)
include( get_template_directory() . '/includes/back/enqueue.php' );             // backend styles and scripts
include( get_template_directory() . '/includes/front/enqueue.php' );            // frontend styles and scripts
include( get_template_directory() . '/includes/front/reg-menus.php' );          // register menus file
include( get_template_directory() . '/includes/front/functions-front.php' );    // functions that work in frontend
include( get_template_directory() . '/includes/front/ajax.php' );               // ajax functions(load more posts)
include( get_template_directory() . '/includes/front/shortcodes.php' );         // shortcodes functions
include( get_template_directory() . '/includes/front/reg-widgets.php' );        // Register sidebar and widgets
include( get_template_directory() . '/includes/csseco-variables.php' );         // CSSeco variables and shit
include( get_template_directory() . '/includes/widgets.php' );                  // Custom widgets


/**
 * Custom Post Types
 */
include( get_template_directory() . '/includes/custom-post-types/contact-post-type.php' );  // contact custom type


/**
 * Shortcodes
 */
add_shortcode( 'tooltip', 'csseco_tooltip' );
add_shortcode( 'popover', 'csseco_popover' );