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
include( get_template_directory() . '/includes/back/function-admin.php' );
include( get_template_directory() . '/includes/back/enqueue.php' );


/**
 * Action & Filter Hooks
 */
add_action( 'admin_menu', 'csseco_add_admin_page' ); // Add admin page(CSSeco Options)


/**
 * Shortcodes
 */