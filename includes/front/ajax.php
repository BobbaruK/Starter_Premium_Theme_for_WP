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
	$prev = $_POST["prev"];

	if( $prev == 1 && $_POST["page"] != 1 ) {
		$paged = $_POST["page"]-1;
	}

	$query = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
	) );

	if ( $query->have_posts() ) {
		echo '<div class="page-limit" data-page="'.esc_url( home_url( '/' ) ).'page/'.$paged.'">';
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'includes/front/template-parts/content', get_post_format() );
		}
		echo '</div>';
	} else {
		echo 0;
	}
	wp_reset_postdata();
	die();
}

function csseco_check_paged( $num = null ) {
	$output = '';
	if ( is_paged() ) { $output = 'page/' . get_query_var( 'paged' ); }
	if ( $num == 1 ) {
		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
		return $paged;
	} else {
		return $output;
	}
}