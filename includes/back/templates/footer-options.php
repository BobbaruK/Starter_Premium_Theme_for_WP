<h1>CSSeco Theme: Footer</h1>
<?php
/**
 * @package CSSecoThemes
 * footer-options.php
 *
 */

function cssecoth_footer_options_callback() {
	_e( 'Footer optionssss...', 'cssecotheme' );
}

function csseco_description_callback() {
	$description =  get_option('footer_description');
	?>
	<label for="footer_description">Write here a long description... i dont care how long...
		<textarea name="footer_description" id="footer_description" class="large-text code" rows="10"><?php echo $description; ?></textarea>
	</label>
	<p class="description"><?php _e( 'HTML tags not allowed', 'cssecotheme' ); ?>(sanitize_text_field();)</p>
	<?php
}

settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'cssecoSettingsGroup-Footer' ); ?>
	<?php do_settings_sections('csseco_fourth_footer') ?>
	<?php submit_button('Save Changes', 'primary','btnSubmit'); ?>
</form>