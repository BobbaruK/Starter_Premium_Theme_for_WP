<?php
/**
 * @package CSSecoThemes
 * front/ajax.php
 *
 * Ajax Functions
 */

add_action( 'wp_ajax_nopriv_csseco_load_more', 'csseco_load_more' ); // for all users
add_action( 'wp_ajax_csseco_load_more', 'csseco_load_more' ); // only for logged users

function csseco_load_more() {
	$paged = $_POST["page"]+1;
	$query = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
	) );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'includes/front/template-parts/content', get_post_format() );
		}
	}
	wp_reset_postdata();
	die();
}