<h1>CSSeco Theme: Content/Sidebar</h1>
<?php
/**
 * @package CSSecoThemes
 * contentsidebar-options.php
 *
 */

function cssecoth_contentsidebar_options_callback() {
	_e( 'Sidebar Width, Location and BgColor', 'cssecotheme' );
}

function csseco_sidebar_width_callback() {
    $sidebarWidth = get_option('sidebar_width');
?>
    <select name="sidebar_width" title="" class="small-text">
        <?php
            for ($x = 1; $x <= 12; $x++) {
                echo '<option value="' . $x . '" ' . selected( $sidebarWidth, $x ) . '>' . $x . '</option>';
            }
        ?>
    </select>
<?php
}

function csseco_sidebar_location_callback() {
    $sidebarLocation = get_option('sidebar_location');
?>
    <select name="sidebar_location" title="" class="small-text">
        <option value="sidebarLeft" <?php selected( $sidebarLocation, 'sidebarLeft' ); ?>>
            <?php _e( 'Sidebar Left', 'cssecotheme' ); ?>
        </option>
        <option value="sidebarRight" <?php selected( $sidebarLocation, 'sidebarRight' ); ?>>
	        <?php _e( 'Sidebar Right', 'cssecotheme' ); ?>
        </option>
        <option value="sidebarBottom" <?php selected( $sidebarLocation, 'sidebarBottom' ); ?>>
	        <?php _e( 'Sidebar Bottom', 'cssecotheme' ); ?>
        </option>
        <option value="sidebarNone" <?php selected( $sidebarLocation, 'sidebarNone' ); ?>>
	        <?php _e( 'Sidebar None', 'cssecotheme' ); ?>
        </option>
    </select>
<?php
}

function csseco_sidebar_bgcol_callback() {
    $sidebarBgCol = get_option('sidebar_bgcol');
?>
    <input name="sidebar_bgcol" type="text" class="color-field" placeholder="<?php echo $sidebarBgCol ?>"
           value="<?php echo $sidebarBgCol ?>" />
<?php
}
?>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-ContentSidebar' ); ?>
	<?php do_settings_sections('csseco_third_content_sidebar') ?>
	<?php submit_button(); ?>
</form>