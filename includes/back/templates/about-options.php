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

    <input id="cssecoUpload-Logo" type="button" class="button button-secondary" value="Upload Logo" />
    <input id="cssecoThLogo" title="" type="text" name="about_logo" value="<?php echo $aboutLogo; ?>" />

<?php
}


?>

<?php $aboutLogo = get_option('about_logo'); ?>
<div class="csseco_about_class">
    <p>
        eee na!
        <img id="cssecoAdminLogo" src="<?php print $aboutLogo; ?>" alt="">
    </p>
</div>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-sidebarAbout' ); ?>
	<?php do_settings_sections('csseco_th') ?>
	<?php submit_button(); ?>
</form>