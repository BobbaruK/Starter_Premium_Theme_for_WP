<?php
/**
 * @package CSSecoThemes
 * navigation-menus.php
 */

function csseco_reg_menus() {
	register_nav_menu( 'primary', __('Primary Menu', 'cssecotheme') );
	register_nav_menu( 'footer', __('Footer Menu', 'cssecotheme') );
}