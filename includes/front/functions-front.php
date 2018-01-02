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
				Posted <a href="' . esc_url( get_permalink() ) . '">' . $posted_on . '</a> ago
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
			$comments = $comments_num . __( 'Comments', 'cssecotheme' );
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
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );

	if ( in_array( 'audio', $type ) ) {
		$output = str_replace( 'visual=true', 'visual=false', $embed[0] );
	} else {
		$output = $embed[0];
	}
	return $output;
}