<?php get_header(); ?>
<?php
$firstName = esc_attr( get_option('first_name') );
$lastName = esc_attr( get_option('last_name') );
echo $firstName . " " . $lastName;
?>
<?php get_footer(); ?>
