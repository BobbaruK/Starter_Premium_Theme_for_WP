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
	$options = get_option( 'themefeatures_customBackground' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="themefeatures_customBackground"><input ' . $checked . ' name="themefeatures_customBackground" type="checkbox" 
          id="themefeatures_customBackground" value="1" /></label>';
}

function contactF_checkActiv_callback() {
	$options = get_option( 'themefeatures_contactF_activate' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="themefeatures_contactF_activate"><input ' . $checked . ' name="themefeatures_contactF_activate" type="checkbox" 
          id="themefeatures_contactF_activate" value="1" />Use shortcode: </label><code>[contact_form]</code>';
}

function cssecoth_themefeatures_social_callback() {
	_e( 'Set your social sharing sites', 'cssecotheme' );
}

function csseco_th_social_facebook_callback() {
    $social_FB = get_option( 'themefeatures_social_facebook' );
    echo '<input type="text" title="" name="themefeatures_social_facebook" value="' . $social_FB . '">';
}

function csseco_th_social_twitter_callback() {
    $social_TW = get_option( 'themefeatures_social_twitter' );
	echo '<input type="text" title="" name="themefeatures_social_twitter" value="' . $social_TW . '">';
}

function csseco_th_social_googlep_callback() {
	$social_GP = get_option( 'themefeatures_social_googlep' );
	echo '<input type="text" title="" name="themefeatures_social_googlep" value="' . $social_GP . '">';
}

settings_errors(); ?>
<form method="post" action="options.php" class="csseco_about_page_form">
	<?php settings_fields( 'cssecoSettingsGroup-ThemeFeatures' ); ?>
	<?php do_settings_sections('csseco_first_theme_features') ?>
	<?php do_settings_sections('csseco_first_theme_social') ?>
	<?php submit_button('Save Changes', 'primary','btnSubmit'); ?>
</form>