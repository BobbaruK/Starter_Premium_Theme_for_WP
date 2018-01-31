<?php
/**
 * @package CSSecoThemes
 * front/ajax.php
 * Ajax Functions
 *
 * Load more(posts)
 */
add_action( 'wp_ajax_nopriv_csseco_load_more', 'csseco_load_more' ); // for all users
add_action( 'wp_ajax_csseco_load_more', 'csseco_load_more' ); // only for logged users

function csseco_load_more() {
	$paged       = $_POST["page"]+1;
	$prev        = $_POST["prev"];
	$archive     = $_POST["archive"];
	$date        = $_POST["date"];

	if( $prev == 1 && $_POST["page"] != 1 ) {
		$paged = $_POST["page"]-1;
	}

	if( $date != '0' ) {
		$anNr    = 4; // localhost(starter_premium_theme) or in .../blog/
//		$anNr    = 3; // liveserver or NOT in .../blog/
		$lunaNr  = $anNr+1;
		$ziNr    = $lunaNr+1;
		$dateVal = explode( '/', $date );
//		print_r( $dateVal );
		$an      = ( empty( $dateVal[$anNr] ) ? '' : $dateVal[$anNr] );
		$luna    = ( empty( $dateVal[$lunaNr] ) ? '' : $dateVal[$lunaNr] );
		$zi      = ( empty( $dateVal[$ziNr] ) ? '' : $dateVal[$ziNr] );
	}

	$args = array(
		'post_type'     => 'post',
		'post_status'   => 'publish',
		'year'          => $an,
		'monthnum'      => $luna,
//		'day'           => $zi,
		'paged'         => $paged
	);

	if( $archive != '0' ) {

		$archVal = explode( '/', $archive );
//		print_r( $archVal );
		$archValFlipped = array_flip($archVal);
//		print_r( $archValFlipped );

		switch ( isset( $archValFlipped ) ){

			case $archValFlipped["category"] :
				$type   = "category_name";
				$key    = "category";
				break;

			case $archValFlipped["tag"] :
				$type   = "tag";
				$key    = $type;
				break;

			case $archValFlipped["author"] :
				$type   = "author_name";
				$key    = "author";
				break;

		}

		$currKey = array_keys( $archVal, $key );
		$nextKey = $currKey[0]+1;
		$value   = $archVal[ $nextKey ];

		$args[ $type ] = $value;

		// check page trail and remove "page" value; for archive(category, tags, and author)
		if ( isset( $archValFlipped["page"] ) ) {
			$pageVal = explode( 'page', $archive );
			$page_trail = $pageVal[0];
		} else {
			$page_trail = $archive;
		}

		// check page trail and remove "page" value; for archive(yearly, monthly and daily)
		$dateValFlipped = array_flip($dateVal);
//		print_r($dateValFlipped);
		if ( isset( $dateValFlipped["page"] ) ) {
			$pageVal = explode( 'page', $date );
			$page_trail = $pageVal[0];
		} else {
			$page_trail = $date;
		}

	} else {
//		$page_trail = '/'; // live server(if root)
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

/**
 * Contact Form Submit and save Contact data
 */
add_action( 'wp_ajax_nopriv_csseco_save_user_contact_form', 'csseco_save_contact' ); // for all users
add_action( 'wp_ajax_csseco_save_user_contact_form', 'csseco_save_contact' ); // only for logged users

function csseco_save_contact() {
	$title = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$message = wp_strip_all_tags($_POST["message"]);

	$args = array(
		'post_title'    => $title,
		'post_content'  => $message,
		'post_author'   => 1,
		'post_status'   => 'publish',
		'post_type'     => 'cssecocontact',
		'meta_input'    => array(
			'_contact_email_value_key' => $email
		)
	);

	$postID = wp_insert_post( $args );

	if( $postID !== 0 ) {

		/**
		 * Better use WP Mail SMTP plugin
		 * https://ro.wordpress.org/plugins/wp-mail-smtp/
		 */

		// Send an email to admin
		$to = get_bloginfo('admin_email');
		$subject = get_bloginfo('name') . '. Contact Form - ' . $title;

		$headers[] = 'From: ' . $title . ' <' . $email . '>' . "\r\n"; // From: Krueger <bobbaru_krueger@yahoo.com>
		// $headers[] = 'From: ' . get_bloginfo('name') . '<' . $to . '>';
		$headers[] = 'Reply-to: ' . $title . '<' . $email . '>' . "\r\n";
		// $headers[] = 'MIME-Version: 1.0' . "\r\n";
		$headers[] = 'Content-Type: text/html: charset=UTF-8' . "\r\n";

		wp_mail( $to, $subject, $message, $headers );

		echo $postID;
	} else {
		echo 0;
	}

	die();
}