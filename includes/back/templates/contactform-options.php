<h1>CSSeco Theme - Contact Form</h1>
<?php
/**
 * @package CSSecoThemes
 * contactform-options.php
 *
 */

function cssecoth_contactF_options_callback() {
	_e( 'Activate or Deactivate Contact Form!', 'cssecotheme' );
}

function contactF_checkActiv_callback() {
	$options = get_option( 'contactF_activate' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label for="contactF_activate"><input ' . $checked . ' name="contactF_activate" type="checkbox" 
          id="contactF_activate" value="1" /></label>';
}
?>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-ContactF' ); ?>
	<?php do_settings_sections('csseco_th_contactForm_settings'); ?>
	<?php submit_button(); ?>
</form>