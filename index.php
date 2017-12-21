<?php
/**
 * @package CSSecoThemes
 * index.php
 *
 */
?>
<?php get_header(); ?>
<?php
$sideW = get_option('sidebar_width');
$sideBgCol = get_option('sidebar_bgcol');


echo 'sidebar width is: ' . $sideW . '<br>';
echo 'sidebar bgcol is: ' . $sideBgCol;
?>
<?php get_footer();