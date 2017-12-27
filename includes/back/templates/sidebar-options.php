<h1>CSSeco Theme - Sidebar</h1>
<?php
/**
 * @package CSSecoThemes
 * sidebar-options.php
 *
 */

function cssecoth_sidebar_options_callback() {
	echo 'Sidebar Width, Location and BgColor';
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
        <option value="sidebarLeft" <?php selected( $sidebarLocation, 'sidebarLeft' ); ?>>Sidebar Left</option>
        <option value="sidebarRight" <?php selected( $sidebarLocation, 'sidebarRight' ); ?>>Sidebar Right</option>
        <option value="sidebarBottom" <?php selected( $sidebarLocation, 'sidebarBottom' ); ?>>Sidebar Bottom</option>
        <option value="sidebarNone" <?php selected( $sidebarLocation, 'sidebarNone' ); ?>>Sidebar None</option>
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
	<?php settings_fields( 'cssecoSettingsGroup-sidebarOptions' ); ?>
	<?php do_settings_sections('csseco_th_sidebar_options') ?>
	<?php submit_button(); ?>
</form>