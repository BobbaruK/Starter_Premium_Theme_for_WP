<h1>CSSeco Theme - About</h1>
<?php
/**
 * @package CSSecoThemes
 * about-options.php
 *
 */

function cssecoth_about_options() {
	echo 'Write something about you!';
}

function csseco_about_logo() {
    $aboutLogo = get_option('about_logo');
?>

    <input type="button" class="button button-secondary" value="Upload Logo" id="cssecoUpload-Logo">
    <input name="about_logo" type="hidden" value="<?php echo $aboutLogo; ?>" />

<?php
}


?>

<div class="csseco_about_class">
    <p>
        eee na!
    </p>
</div>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-sidebarAbout' ); ?>
	<?php do_settings_sections('csseco_th') ?>
	<?php submit_button(); ?>
</form>