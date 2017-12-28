<?php
/**
 * @package CSSecoThemes
 * functions.php
 *
 *
 * Set up
 */
include( get_template_directory() . '/includes/theme-support.php' );


/**
 * Includes
 */
include( get_template_directory() . '/includes/cleanup.php' ); //
include( get_template_directory() . '/includes/back/functions-admin.php' );
include( get_template_directory() . '/includes/back/enqueue.php' ); // backend styles and scripts
include( get_template_directory() . '/includes/front/enqueue.php' ); // frontend styles and scripts


/**
 * Custom Post Types
 */
include( get_template_directory() . '/includes/custom-post-types/contact-post-type.php' );


/**
 * Action & Filter Hooks
 */
// Remove current wp version nr from DOM(:not other than WP) - Scripts
add_filter( 'script_loader_src', 'csseco_remove_wp_version_strings' );
// Remove current wp version nr from DOM(:not other than WP) - Styles
add_filter( 'style_loader_src', 'csseco_remove_wp_version_strings' );
// Remove current wp version nr from meta name="generator"
add_filter( 'the_generator', 'csseco_remove_meta_verstion' );
// Add admin page(CSSeco Options) - BACKEND
add_action( 'admin_menu', 'csseco_add_admin_page' );
// hook style and scripts to the BACKEND
add_action( 'admin_enqueue_scripts', 'csseco_load_admin_scripts' );
// hook style and scripts to the FRONTEND
add_action( 'wp_enqueue_scripts', 'csseco_load_front_scripts' );


/**
 * Shortcodes
 */