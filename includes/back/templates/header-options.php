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

function csseco_header_bgcol_callback() {
	$headerBgCol = get_option('header_bgcol');
	echo '<input name="header_bgcol" type="text" class="color-field" value="' . $headerBgCol . '"
           placeholder="' . $headerBgCol . '" data-default-color="transparent" />';
}

function csseco_header_bgimg_callback() {
    $headerBgImg = get_option('header_bgimg');
    if( empty($headerBgImg) ){
?>
        <input id="cssecoUpload-BgImage" type="button" class="button button-secondary"
               value="<?php _e('Upload Background Image', 'cssecotheme') ?>" />
        <input id="cssecoThHeaderBgImage" title="" type="text" class="" name="header_bgimg" value="" />
        <input id="cssecoRemove-BgImage" type="button" class="button button-secondary" disabled
               value="<?php _e('Remove Background Image', 'cssecotheme') ?>" />
<?php
	} else {
?>
        <input id="cssecoUpload-BgImage" type="button" class="button button-secondary"
               value="<?php _e('Replace Background Image', 'cssecotheme') ?>" />
        <input id="cssecoThHeaderBgImage" title="" type="text" class="" name="header_bgimg" value="<?php echo $headerBgImg; ?>" />
        <input id="cssecoRemove-BgImage" type="button" class="button button-secondary"
               value="<?php _e('Remove Background Image', 'cssecotheme') ?>" />
        <div class="csseco_admin_logo_preview">
            <img id="cssecoAdminHeaderBgImg" src="<?php echo $headerBgImg; ?>" alt="Header Background Image Preview">
        </div><!-- /.csseco_admin_logo_preview -->
<?php
    }
}

function csseco_header_textcol_callback() {
	$headerTextCol = get_option('header_textcol');
	echo '<input name="header_textcol" type="text" class="color-field" value="' . $headerTextCol . '"
           placeholder="' . $headerTextCol . '" data-default-color="#000000" />';
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