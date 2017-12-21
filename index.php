<?php
/**
 * @package CSSecoThemes
 * index.php
 *
 */
?>
<?php get_header(); ?>
<?php
$aboutCeva = get_option('about_ceva');

$sidebarWidth = get_option('sidebar_width');
$sidebarLocation = get_option('sidebar_location');
$sidebarBgCol = get_option('sidebar_bgcol');

$cssBgCol = get_option('css_bgCol');
$cssFontSize = get_option('css_fontSize');
$cssMainBgCol = get_option('css_mainBgCol');

echo '<h1>About Options</h1>';
echo 'about ceva is: ' . $aboutCeva . '<br>';
echo '<h1>Sidebar Options</h1>';
echo 'sidebar width is: ' . $sidebarWidth . '<br>';
echo 'sidebar location is: ' . $sidebarLocation . '<br>';
echo 'sidebar bgcol is: ' . $sidebarBgCol . ' ->sanitize function();<br>';
echo '<h1>CSS Options</h1>';
echo 'css bgcol is: ' . $cssBgCol . ' ->sanitize_text_field();<br>';
echo 'css font size is: ' . $cssFontSize . '<br>';
echo 'css main content bgcol is: ' . $cssMainBgCol . '<br>';
?>
<?php get_footer();