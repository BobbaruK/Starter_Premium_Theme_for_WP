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

		// check if are "category" in archVal
		if ( in_array( "category", $archVal ) ) {
			$type = "category_name";
			$currKey = array_keys( $archVal, "category" );
			$nextKey = $currKey[0]+1;
			$value = $archVal[ $nextKey ];

			$args[ $type ] = $value;

		}

		if ( in_array( "tag", $archVal ) ) {
			$type = "tag";
			$currKey = array_keys( $archVal, "tag" );
			$nextKey = $currKey[0]+1;
			$value = $archVal[ $nextKey ];

			$args[ $type ] = $value;

		}

		if ( in_array( "author", $archVal ) ) {
			$type = "author";
			$currKey = array_keys( $archVal, "author" );
			$nextKey = $currKey[0]+1;
			$value = $archVal[ $nextKey ];

			$args[ $type ] = $value;

		}

		// check page trail and remove "page" value
		if ( in_array( "page", $archVal ) ) {
			$pageVal = explode( 'page', $archive );
			$page_trail = $pageVal[0];
		} else {
			$page_trail = $archive;
		}

	} else {
		//$page_trail = '/';
		$page_trail = '/starter_premium_theme/'; // starter_premium_theme e numele folderului in care e instalat situl LocalHost
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
	if ( is_paged() ) {
		$output = 'page/' . get_query_var( 'paged' );
	}
	if ( $num == 1 ) {
		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
		return $paged;
	} else {
		return $output;
	}
}