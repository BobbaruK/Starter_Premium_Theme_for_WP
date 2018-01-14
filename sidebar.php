<?php
/**
 * @package CSSecoThemes
 * sidebar.php
 *
 */

if ( !is_active_sidebar( 'csseco_sidebar' ) ) {
	return;
}
global $sidebarWidth;
?>

<aside id="secondary" class="widget-area col-xs-12 col-md-<?php echo $sidebarWidth; ?>" role="complementary">
	<?php dynamic_sidebar( 'csseco_sidebar' ); ?>
</aside>
