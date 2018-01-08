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
	$archive = $_POST["archive"];

	if( $prev == 1 && $_POST["page"] != 1 ) {
		$paged = $_POST["page"]-1;
	}

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
	);

	if( $archive != '0' ) {
		$archVal = explode( '/', $archive );
		//print_r( $archVal );
		/**
		 * LocalHost
		 * Array ( [0] => [1] => starter_premium_theme [2] => category [3] => uncategorized [4] => )
		 * daca instalezi in site care e in root trebuie sa tii cont de arrayul asta
		 */
		//$type = ( $archVal[2] == "category" ? "category_name" : $archVal[2] );

		//$args[ $type ] = $archVal[3];

		//$page_trail = '/' . $archVal[1] . '/' . $archVal[2] . '/' . $archVal[3] . '/';
		/**
		 * daca e site in root
		 * Array ( [0] => [1] => category [2] => uncategorized [3] => )
		 */
		$type = ( $archVal[1] == "category" ? "category_name" : $archVal[1] );

		$args[ $type ] = $archVal[2];

		$page_trail = '/' . $archVal[1] . '/' . $archVal[2] . '/';

	} else {
		//$page_trail = '/starter_premium_theme/'; // starter_premium_theme e numele folderului in care e instalat situl LocalHost
		$page_trail = '/';
	}

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		echo '<div class="page-limit" data-page="'.$page_trail.'page/'.$paged.'/">';
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