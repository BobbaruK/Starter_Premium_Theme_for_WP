<h1>CSSeco Theme - CSS</h1>
<?php
/**
 * @package CSSecoThemes
 * css-options.php
 *
 */

function cssecoth_css_options() {
    echo 'Here you can modify the CSS options';
}

function csseco_css_bg() {
    $cssBgCol = get_option('css_bgCol');
?>
    <input name="css_bgCol" type="text" class="color-field" value="<?php echo $cssBgCol; ?>" placeholder="<?php echo $cssBgCol; ?>" />
<?php
}

function csseco_font_size() {
    $cssFontSize = get_option('css_fontSize');
?>
    <input name="css_fontSize" type="number" class="regular-text" value="<?php echo $cssFontSize; ?>" placeholder="<?php echo $cssFontSize; ?>" />
<?php
}

function csseco_mainBgCol() {
	$cssMainBgCol = get_option('css_mainBgCol');
?>
    <input name="css_mainBgCol" type="text" class="color-field" value="<?php echo $cssMainBgCol; ?>" placeholder="<?php echo $cssMainBgCol; ?>" />
<?php
}
?>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-CSS' ); ?>
	<?php do_settings_sections('csseco_th_css_settings') ?>
	<?php submit_button(); ?>
</form>