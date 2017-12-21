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

function csseco_about_ceva() {
    $aboutCeva = get_option('about_ceva');
?>

    <input name="about_ceva" type="text" class="regular-text" value="<?php echo $aboutCeva; ?>" placeholder="<?php echo $aboutCeva; ?>" />
    <p class="description">ex: Suck it!</p>

<?php
}


?>


<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-sidebarAbout' ); ?>
	<?php do_settings_sections('csseco_th') ?>
	<?php submit_button(); ?>
</form>