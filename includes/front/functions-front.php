<?php
/**
 * @package CSSecoThemes
 * front/functions-front.php
 *
 * FrontEnd Functions
 */

/**
 * Generate entry-meta
 */
function csseco_posted_meta() {
	$posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;
	if ( !empty($categories) ) {
		foreach ( $categories as $category ) {
			if ($i > 1) {
				$output .= $separator;
			}
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" 
						alt="' . esc_attr( 'View all posts in %s', $category->name ) . '">' .
			            esc_html( $category->name ) . '</a>';
			$i++;
		}
	}
	return '<span class="posted-on">
				Posted <a data-toggle="tooltip" data-placement="top" title="' . get_the_time('jS F, Y g:ia') . '" href="' . esc_url( get_permalink() ) . '">' . $posted_on . '</a> ago
			</span> / 
			<span class="posted-in">' . $output . '</span>';
}

/**
 * Generate entry-footer
 */
function csseco_posted_footer() {
	$comments_num = get_comments_number();
	if ( comments_open() ) {
		if ( $comments_num == 0 ) {
			$comments = __( 'No Comments', 'cssecotheme' );
		} elseif ( $comments_num > 1 ) {
			$comments = $comments_num . __( ' Comments', 'cssecotheme' );
		} else {
			$comments = __( '1 Comment', 'cssecotheme' );
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() . '">' . $comments . '</a>';
	} else {
		$comments = __( 'Comments are closed', 'cssecotheme' );
	}
	return '<div class="post-footer-container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 footer-left">
						' . get_the_tag_list( '<div class="tags-list"><i class="fa fa-tags" aria-hidden="true"></i> ', '<span>, </span>', '</div>' ) . '
					</div>
					<div class="col-xs-12 col-sm-6 footer-right">
						' . $comments . ' 
						<i class="fa fa-comments" aria-hidden="true"></i>
					</div>
				</div>
			</div>';
}

/**
 * Get post attachment
 *
 *      daca are post-thumb(feat img) si $num == 1
 *          atunci $output = attachment url
 *      daca nu
 *          $attachments = get_posts(array( sa ia primu[pt asta e to do..] attachment din post,
 *                         'posts_per_page' => $num; unde $num inseamna cate attachmenturi sa ia din post
 *          daca exista $attachments si $num == 1
 *              $output = url-ul attchmentului
 *          sau daca exista $attachments si $num > 1
 *              $output = $attachments; care $attachments este array cu toate urlurile attachmentului
 *          reset post data
 *      return $output;
 */
function csseco_get_post_attachment( $num = 1 ) {
	$output = '';
	if ( has_post_thumbnail() && $num == 1 ) {
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	} else { // TODO: mai bine fac o eroare decat sa ma cac pe asta ca nu are sens
		$attachments = get_posts( array(
			'post_parent'       =>      get_the_ID(),
			'post_type'         =>      'attachment',
//			'post_mime_type'    =>      'image',
//			'orderby'           =>      'parent',
//			'order'             =>      'DESC',
			'posts_per_page'    =>      $num
		) );
		if ( $attachments && $num == 1 ) {
			foreach ( $attachments as $attachment ) {
				$output = wp_get_attachment_url( $attachment->ID );
			}
		} elseif ( $attachments && $num > 1 ) {
			$output = $attachments;
		}
		wp_reset_postdata();
	}
	return $output;
}

/**
 * Audio post format iframe generator
 *
 * TODO: de explicat functia csseco_get_embedded_media()
 * https://www.youtube.com/watch?v=HXLviEusCyE&index=24&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX
 */
function csseco_get_embedded_media( $type = array() ) {
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) ); // getting the content(get_the_content()), apply the filters(the_content)
	$embed = get_media_embedded_in_content( $content, $type );

	if ( in_array( 'audio', $type ) ) {
		$output = str_replace( 'visual=true', 'visual=false', $embed[0] );
	} else {
		$output = $embed[0];
	}
	return $output;
}

/**
 * Generate slider on Gallery Post Format
 */
function csseco_get_bs_slides( $attachments ) {

	$output = array();
	for ( $i = 0; $i < count($attachments); $i++ ) {
		$active = ($i == 0 ? 'active' : '');

		$countA = count($attachments)-1;
		$n = ( $i == $countA ? 0 : $i+1 );
		$nextImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
		$p = ( $i == 0 ? $countA : $i-1 );
		$prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );

		$output[$i] = array(
			'class'     =>  $active,
			'url'       =>  wp_get_attachment_url( $attachments[$i]->ID ),
			'next_img'  =>  $nextImg,
			'prev_img'  =>  $prevImg,
			'caption'   =>  $attachments[$i]->post_excerpt
		);
	}

	return $output;

}

/**
 * Link for Link Post Format
 */
function csseco_grab_url() {
	if ( !preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ) {
		return false;
	}
	return esc_url_raw($links[1]);
}

/**
 * Archive url
 */
function csseco_grab_current_uri() {
	$http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
	//$referer = ( isset( $_SERVER["HTTP_REFERER"] ) ? rtrim( $_SERVER["HTTP_REFERER"], "/" ) : $http . $_SERVER["HTTP_HOST"] );
	$referer = $http . $_SERVER["HTTP_HOST"];
	$archive_url = $referer . $_SERVER["REQUEST_URI"];

	return $archive_url;
}

/**
 * Single post custom functions
 */
// Single Post Navigation
function csseco_post_navigation() {

	$nav = '<div class="row"><div class="csseco_custom_post_navigation clearfix">';

	$prev = get_previous_post_link( '<div class="post-link-nav-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>%link</div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';

	$next = get_next_post_link( '<div class="post-link-nav-next">%link<i class="fa fa-chevron-right" aria-hidden="true"></i></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $next . '</div>';

	$nav .= ' </div></div>';// .row

	return $nav;

}

// Single Post Share
function csseco_sharethis() {

	$output = '<div class="entry-share"><h4>Share this via</h4>';

	$title = get_the_title();
	$permalink = get_permalink();

	$twitterHandler = ( get_option( 'themefeatures_social_twitter' ) ? '&amp;via='.get_option( 'themefeatures_social_twitter' ) : '' );

	$facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink;
	$twitter = 'https://twitter.com/intent/tweet?text=Hei! Read this: '.$title.'&amp;url='.$permalink.$twitterHandler;
	$googleplus = 'https://plus.google.com/share?url='.$permalink;


	$output .= '<ul>';
	$output .= '<li><a href="'.$facebook.'" target="_blank" rel="nofollow"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>';
	$output .= '<li><a href="'.$twitter.'" target="_blank" rel="nofollow"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>';
	$output .= '<li><a href="'.$googleplus.'" target="_blank" rel="nofollow"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>';
	$output .= '</ul></div><!-- /.entry-share -->';

	return $output;

}
//add_filter( 'the_content', 'csseco_sharethis' ); // attach csseco_sharethis after the_content(single post content)

// Post Navigation
function csseco_get_post_navigation() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
		require( get_template_directory() . '/includes/front/templates/comment-nav.php' );
	}
}

/**
 * Custom Header
 */
function csseco_check_custom_header() {
	$output = '';
	if ( get_option( 'themefeatures_customHeader' ) == 1 ) {
		$headerBgImg = ( empty( get_header_image() ) ? '' : 'background-image: url(\'' . get_header_image() . '\'); background-position: center center; background-size: cover; background-repeat: no-repeat;' );
		$headerTextCol = ( empty( get_header_textcolor() ) ? '' : 'color: #' . get_header_textcolor() . ';' );
		$output = $headerBgImg . ' ' . $headerTextCol;
	}
	return $output;
}