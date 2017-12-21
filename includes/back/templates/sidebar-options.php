<?php
/**
 * @package CSSecoThemes
 * sidebar-options.php
 *
 */
?>

<?php

function cssecoth_sidebar_options() {
	echo 'Sidebar Width and BgColor';
}
function csseco_sidebar_width() {
    $sideW = get_option('sidebar_width');
?>

    <select name="sidebar_width">
        <option value="1" <?php selected( $sideW, 1 ); ?>>1</option>
        <option value="2" <?php selected( $sideW, 2 ); ?>>2</option>
        <option value="3" <?php selected( $sideW, 3 ); ?>>3</option>
        <option value="4" <?php selected( $sideW, 4 ); ?>>4</option>
        <option value="5" <?php selected( $sideW, 5 ); ?>>5</option>
        <option value="6" <?php selected( $sideW, 6 ); ?>>6</option>
        <option value="7" <?php selected( $sideW, 7 ); ?>>7</option>
        <option value="8" <?php selected( $sideW, 8 ); ?>>8</option>
        <option value="9" <?php selected( $sideW, 9 ); ?>>9</option>
        <option value="10" <?php selected( $sideW, 10 ); ?>>10</option>
        <option value="11" <?php selected( $sideW, 11 ); ?>>11</option>
        <option value="12" <?php selected( $sideW, 12 ); ?>>12</option>
    </select>

<?php

}

function csseco_sidebar_bgcol() {
    $sideBgCol = esc_attr( get_option('sidebar_bgcol') );
?>
    <input type="text" name="sidebar_bgcol" placeholder="<?php echo $sideBgCol ?>" />
<?php
}

function cssecoth_social_icons() {
	echo 'Sidebar Social Icons';
}




?>







<h1>CSSeco Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'csseco-settings-group' ); ?>
	<?php do_settings_sections('csseco_th_sidebar_options') ?>
	<?php submit_button(); ?>
</form>