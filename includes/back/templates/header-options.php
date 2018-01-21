<h1>CSSeco Theme: Header</h1>
<?php
/**
 * @package CSSecoThemes
 * header-options.php
 *
 */

function cssecoth_header_options_callback() {
	_e( 'Select Header options...', 'cssecotheme' );
}

function csseco_header_logo_callback() {
	$aboutLogo = get_option('header_logo');
	if( empty($aboutLogo) ){
?>
		<input id="cssecoUpload-Logo" type="button" class="button button-secondary"
		       value="<?php _e('Upload Logo', 'cssecotheme') ?>" />
		<input id="cssecoThLogo" title="" type="text" class="" name="header_logo" value="" />
		<input id="cssecoRemove-Logo" type="button" class="button button-secondary" disabled
		       value="<?php _e('Remove Logo', 'cssecotheme') ?>" />
<?php
	} else {
?>
		<input id="cssecoUpload-Logo" type="button" class="button button-secondary"
		       value="<?php _e('Replace Logo', 'cssecotheme') ?>" />
		<input id="cssecoThLogo" title="" type="text" class="" name="header_logo" value="<?php echo $aboutLogo; ?>" />
		<input id="cssecoRemove-Logo" type="button" class="button button-secondary"
		       value="<?php _e('Remove Logo', 'cssecotheme') ?>" />
		<div class="csseco_admin_logo_preview">
			<img id="cssecoAdminLogo" src="<?php echo $aboutLogo; ?>" alt="Logo Preview">
		</div><!-- /.csseco_admin_logo_preview -->
<?php
	}
}

settings_errors(); ?>
<form method="post" action="options.php" class="csseco_about_page_form">
	<?php settings_fields( 'cssecoSettingsGroup-Header' ); ?>
	<?php do_settings_sections('csseco_second_header') ?>
	<?php submit_button('Save Changes', 'primary','btnSubmit'); ?>
</form>