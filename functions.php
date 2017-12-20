<?php
/**
 * @package CSSecoThemes
 *
 *
 *
 * Set up
 */


/**
 * Includes
 */
include( get_template_directory() . '/includes/back/function-admin.php' );


/**
 * Action & Filter Hooks
 */
add_action( 'admin_menu', 'csseco_add_admin_page' ); // Add admin page(CSSeco Options)


/**
 * Shortcodes
 */