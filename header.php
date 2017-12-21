<?php
/**
 * @package CSSecoThemes
 * header.php
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="cssecoHeader">
		<p>Header</p>
	</header>
    <hr>
	<div id="cssecoContent" class="site-content">