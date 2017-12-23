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
    <input id="cssecoThLogo" title="" type="text" class="regular-text" name="about_logo" value="<?php echo $aboutLogo; ?>" />
<?php
}

function csseco_postFormats() {
    $options = get_option( 'about_postFormat' );
    $formats = array( 'Aside', 'Gallery', 'Link', 'Image', 'Quote', 'Satus', 'Video', 'Audio', 'Chat' );
    foreach( $formats as $format ) {
	    $checked = ( @$options[$format] == 1 ? 'checked' : '' );
?>
        <label for="<?php echo $format; ?>">
            <input <?php echo $checked; ?> name="about_postFormat[<?php echo $format; ?>]" type="checkbox" id="<?php echo $format; ?>" class="post-format-<?php echo $format; ?>" value="1">
            <?php echo $format; ?>
        </label><br>
<?php
    }
}

function csseco_description() {
    $description = sanitize_text_field( get_option('about_description') );
?>
    <label for="about_description">Write here a long description... i dont care how long...</label>
    <textarea name="about_description" id="about_description" class="large-text code" rows="20"><?php echo $description; ?></textarea>
    <p class="description">HTML tags not allowed</p>
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
	<?php settings_fields( 'cssecoSettingsGroup-About' ); ?>
	<?php do_settings_sections('csseco_th') ?>
	<?php submit_button(); ?>
</form>