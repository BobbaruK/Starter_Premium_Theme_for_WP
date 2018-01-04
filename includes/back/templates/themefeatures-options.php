<h1>CSSeco Theme: Theme Features</h1>
<?php
/**
 * @package CSSecoThemes
 * themefeatures-options.php
 *
 */

function cssecoth_themefeatures_options_callback() {
	_e( 'Select, activate or deactive the theme features...', 'cssecotheme' );
}

function csseco_postFormats_callback() {
	$options = get_option( 'themefeatures_postFormat' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ) {
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label for="' . $format . '" class="csseco-label-' . $format . '"><input ' . $checked . ' 
                    name="themefeatures_postFormat[' . $format . ']" type="checkbox" id="' . $format . '" 
                    class="post-format-' . $format . '" value="1" />' . $format  . '</label><br>';
	}
	echo $output;
}

function csseco_customHeader_callback() {
	$options = get_option( 'themefeatures_customHeader' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="themefeatures_customHeader"><input ' . $checked . ' name="themefeatures_customHeader" type="checkbox" 
          id="themefeatures_customHeader" value="1" /></label>';
}

function csseco_customBackground_callback() {
	$options = get_option( 'about_customBackground' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="about_customBackground"><input ' . $checked . ' name="about_customBackground" type="checkbox" 
          id="about_customBackground" value="1" /></label>';
}

function contactF_checkActiv_callback() {
	$options = get_option( 'contactF_activate' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="contactF_activate"><input ' . $checked . ' name="contactF_activate" type="checkbox" 
          id="contactF_activate" value="1" /></label>';
}

settings_errors(); ?>
<form method="post" action="options.php" class="csseco_about_page_form">
	<?php settings_fields( 'cssecoSettingsGroup-ThemeFeatures' ); ?>
	<?php do_settings_sections('csseco_first_theme_features') ?>
	<?php submit_button('Save Changes', 'primary','btnSubmit'); ?>
</form>