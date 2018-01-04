<h1>CSSeco Theme: Custom CSS</h1>
<?php
/**
 * @package CSSecoThemes
 * customcss-options.php
 *
 */

function cssecoth_css_options_callback() {
    _e( 'Here you can modify the CSS options', 'cssecotheme' );
}

function csseco_css_bg_callback() {
    $cssBgCol = get_option('customcss_bgCol');
?>
    <input name="customcss_bgCol" type="text" class="color-field" value="<?php echo $cssBgCol; ?>"
           placeholder="<?php echo $cssBgCol; ?>" />
<?php
}

function csseco_font_size_callback() {
    $cssFontSize = get_option('customcss_fontSize');
?>
    <input name="customcss_fontSize" type="number" class="small-text" value="<?php echo $cssFontSize; ?>"
           placeholder="<?php echo $cssFontSize; ?>" />
<?php
}

function csseco_mainBgCol_callback() {
	$cssMainBgCol = get_option('customcss_mainBgCol');
?>
    <input name="customcss_mainBgCol" type="text" class="color-field" value="<?php echo $cssMainBgCol; ?>"
           placeholder="<?php echo $cssMainBgCol; ?>" />
<?php
}

function csseco_customCSS_callback() {
    $css = get_option('customcss_thecss');
    $css = ( empty($css) ? '/* CSSeco Starter Theme - Custom CSS */' : $css );
    echo '<textarea id="customcss_thecss" name="customcss_thecss" style="display: none; visibility: hidden; opacity: 0;">' .
         $css . '</textarea>';
    echo '<div id="customCss">' . $css . '</div>';
}
?>

<?php settings_errors(); ?>
<form method="post" action="options.php" id="csseco_save_css">
	<?php settings_fields( 'cssecoSettingsGroup-CustomCss' ); ?>
	<?php do_settings_sections('csseco_fifth_custom_css') ?>
	<?php submit_button(); ?>
</form>