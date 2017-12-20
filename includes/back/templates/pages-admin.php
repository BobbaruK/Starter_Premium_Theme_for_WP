<h1>CSSeco Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'csseco-settings-group' ); ?>
	<?php do_settings_sections('csseco_th_sidebar_options') ?>
	<?php submit_button(); ?>
</form>