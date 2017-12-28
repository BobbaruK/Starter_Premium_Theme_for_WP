<h1>CSSeco Theme - About</h1>
<?php
/**
 * @package CSSecoThemes
 * about-options.php
 *
 */

function cssecoth_about_options_callback() {
	_e( 'Write something about you!', 'cssecotheme' );
}

function csseco_about_logo_callback() {
	$aboutLogo = get_option('about_logo');
	if( empty($aboutLogo) ){
		?>
        <input id="cssecoUpload-Logo" type="button" class="button button-secondary"
               value="<?php _e('Upload Logo', 'cssecotheme') ?>" />
        <input id="cssecoThLogo" title="" type="text" class="" name="about_logo" value="" />
        <input id="cssecoRemove-Logo" type="button" class="button button-secondary" disabled
               value="<?php _e('Remove Logo', 'cssecotheme') ?>" />
		<?php
	} else {
		?>
        <input id="cssecoUpload-Logo" type="button" class="button button-secondary"
               value="<?php _e('Replace Logo', 'cssecotheme') ?>" />
        <input id="cssecoThLogo" title="" type="text" class="" name="about_logo" value="<?php echo $aboutLogo; ?>" />
        <input id="cssecoRemove-Logo" type="button" class="button button-secondary"
               value="<?php _e('Remove Logo', 'cssecotheme') ?>" />
		<?php
	}
}

function csseco_postFormats_callback() {
	$options = get_option( 'about_postFormat' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ) {
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label for="' . $format . '" class="csseco-label-' . $format . '"><input ' . $checked . ' 
                    name="about_postFormat[' . $format . ']" type="checkbox" id="' . $format . '" 
                    class="post-format-' . $format . '" value="1" />' . $format  . '</label><br>';
	}
	echo $output;
}

function csseco_customHeader_callback() {
	$options = get_option( 'about_customHeader' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="about_customHeader"><input ' . $checked . ' name="about_customHeader" type="checkbox" 
          id="about_customHeader" value="1" /></label>';
}

function csseco_customBackground_callback() {
	$options = get_option( 'about_customBackground' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="about_customBackground"><input ' . $checked . ' name="about_customBackground" type="checkbox" 
          id="about_customBackground" value="1" /></label>';
}

function csseco_description_callback() {
	$description =  get_option('about_description');
	?>
    <label for="about_description">Write here a long description... i dont care how long...
        <textarea name="about_description" id="about_description" class="large-text code" rows="10"><?php echo $description; ?></textarea>
    </label>
    <p class="description"><?php _e( 'HTML tags not allowed', 'cssecotheme' ); ?>(sanitize_text_field();)</p>
	<?php
}
?>


<?php $aboutLogo = get_option('about_logo'); ?>
<div class="csseco_about_class">
    <p>
        <img id="cssecoAdminLogo" src="<?php print $aboutLogo; ?>" alt="">
    </p>
</div>

<?php settings_errors(); ?>
<form method="post" action="options.php" class="csseco_about_page_form">
	<?php settings_fields( 'cssecoSettingsGroup-About' ); ?>
	<?php do_settings_sections('csseco_th') ?>
	<?php submit_button('Save Changes', 'primary','btnSubmit'); ?>
</form>