<h1>CSSeco Theme - Sidebar</h1>
<?php
/**
 * @package CSSecoThemes
 * sidebar-options.php
 *
 */

function cssecoth_sidebar_options() {
	echo 'Sidebar Width, Location and BgColor';
}

function csseco_sidebar_width() {
    $sidebarWidth = get_option('sidebar_width');
?>
    <select name="sidebar_width" title="" class="regular-text">
        <option value="1" <?php selected( $sidebarWidth, 1 ); ?>>1</option>
        <option value="2" <?php selected( $sidebarWidth, 2 ); ?>>2</option>
        <option value="3" <?php selected( $sidebarWidth, 3 ); ?>>3</option>
        <option value="4" <?php selected( $sidebarWidth, 4 ); ?>>4</option>
        <option value="5" <?php selected( $sidebarWidth, 5 ); ?>>5</option>
        <option value="6" <?php selected( $sidebarWidth, 6 ); ?>>6</option>
        <option value="7" <?php selected( $sidebarWidth, 7 ); ?>>7</option>
        <option value="8" <?php selected( $sidebarWidth, 8 ); ?>>8</option>
        <option value="9" <?php selected( $sidebarWidth, 9 ); ?>>9</option>
        <option value="10" <?php selected( $sidebarWidth, 10 ); ?>>10</option>
        <option value="11" <?php selected( $sidebarWidth, 11 ); ?>>11</option>
        <option value="12" <?php selected( $sidebarWidth, 12 ); ?>>12</option>
    </select>
<?php
}

function csseco_sidebar_location() {
    $sidebarLocation = get_option('sidebar_location');
?>
    <select name="sidebar_location" title="" class="regular-text">
        <option value="sidebarLeft" <?php selected( $sidebarLocation, 'sidebarLeft' ); ?>>Sidebar Left</option>
        <option value="sidebarRight" <?php selected( $sidebarLocation, 'sidebarRight' ); ?>>Sidebar Right</option>
        <option value="sidebarBottom" <?php selected( $sidebarLocation, 'sidebarBottom' ); ?>>Sidebar Bottom</option>
        <option value="sidebarNone" <?php selected( $sidebarLocation, 'sidebarNone' ); ?>>Sidebar None</option>
    </select>
<?php
}

function csseco_sidebar_bgcol() {
    $sidebarBgCol = get_option('sidebar_bgcol');
?>
    <input name="sidebar_bgcol" type="text" class="regular-text" placeholder="<?php echo $sidebarBgCol ?>" value="<?php echo $sidebarBgCol ?>" />
<?php
}
?>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-sidebarOptions' ); ?>
	<?php do_settings_sections('csseco_th_sidebar_options') ?>
	<?php submit_button(); ?>
</form>