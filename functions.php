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


/**
 * Custom Post Types
 */
include( get_template_directory() . '/includes/custom-post-types/contact-post-type.php' );  // contact custom type


/**
 * Action & Filter Hooks
 */
add_filter( 'script_loader_src', 'csseco_remove_wp_version_strings' ); // Remove current wp version nr from Scripts
add_filter( 'style_loader_src', 'csseco_remove_wp_version_strings' );  // Remove current wp version nr from Styles
add_filter( 'the_generator', 'csseco_remove_meta_verstion' );          // Remove current wp version nr from meta name="generator"
add_action( 'admin_menu', 'csseco_add_admin_page' );                   // Add admin page(CSSeco Options) - BACKEND
add_action( 'admin_enqueue_scripts', 'csseco_load_admin_scripts' );    // hook style and scripts to the BACKEND
add_action( 'wp_enqueue_scripts', 'csseco_load_front_scripts' );       // hook style and scripts to the FRONTEND
add_action( 'after_setup_theme', 'csseco_reg_menus' );                 // register menus function


/**
 * Shortcodes
 */
add_shortcode( 'tooltip', 'csseco_tooltip' );
add_shortcode( 'popover', 'csseco_popover' );