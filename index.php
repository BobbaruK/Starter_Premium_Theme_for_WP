<?php
/**
 * @package CSSecoThemes
 * index.php
 *
 */
?>
<?php get_header(); ?>
<?php
$aboutLogo              = get_option('about_logo');
$cstmHeader             = get_option( 'about_customHeader' );
$cstmBackgr             = get_option( 'about_customBackground' );
$aboutDescription       = sanitize_text_field( get_option('about_description') );

$sidebarWidth           = get_option('sidebar_width');
$sidebarLocation        = get_option('sidebar_location');
$sidebarBgCol           = get_option('sidebar_bgcol');

$cssBgCol               = get_option('css_bgCol');
$cssFontSize            = get_option('css_fontSize');
$cssMainBgCol           = get_option('css_mainBgCol');

$contactFf              = get_option( 'contactF_activate' );


echo '<h1>About Options</h1>';
echo 'logo is: ' . $aboutLogo . '<br>';
echo '<img src="' . $aboutLogo . '"><br>';

echo 'posts formats are: ';
$options = get_option( 'about_postFormat' );
$output = '';
foreach ( $options as $option ) {
	$output .= $option . '; ';
}
echo $output;
//for ($x = 0; $x <= count($options); $x++) {
//	echo $options[$x]. '<br>';
//}

echo '<br>';
echo 'custom header: ' . $cstmHeader . '<br>';
echo 'custom bg: ' . $cstmBackgr . '<br>';
echo 'description is: ' . $aboutDescription . '<br>';


echo '<h1>Sidebar Options</h1>';
echo 'sidebar width is: ' . $sidebarWidth . '<br>';
echo 'sidebar location is: ' . $sidebarLocation . '<br>';
echo 'sidebar bgcol is: ' . $sidebarBgCol . ' ->sanitize function();<br>';


echo '<h1>CSS Options</h1>';
echo 'css bgcol is: ' . $cssBgCol . ' ->sanitize_text_field();<br>';
echo 'css font size is: ' . $cssFontSize . '<br>';
echo 'css main content bgcol is: ' . $cssMainBgCol . '<br>';


echo '<h1>Contact Form Options</h1>';
echo 'contact form is: ' . $contactFf . '<br>';

?>
<?php get_footer();