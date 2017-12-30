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
					<div class="col-xs-12 col-sm-6">
						' . get_the_tag_list( '<div class="tags-list"><i class="fa fa-tags" aria-hidden="true"></i> ', ', ', '</div>' ) . '
					</div>
					<div class="col-xs-12 col-sm-6 text-right">
						' . $comments . '
						<i class="fa fa-comments" aria-hidden="true"></i>
					</div>
				</div>
			</div>';
}

/**
 * Get post attachment
 */
function csseco_get_post_attachment() {
	$output = '';
	if ( has_post_thumbnail() ) {
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	} else { // TODO: mai bine fac o eroare decat sa ma cac pe asta ca nu are sens
		$attachments = get_posts( array(
			'post_parent'       =>      get_the_ID(),
			'post_type'         =>      'attachment',
			'post_mime_type'    =>      'image',
			//'order'             =>      'ASC',
			'posts_per_page'    =>      1
		) );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				$output = wp_get_attachment_url( $attachment->ID );
			}
		}
		wp_reset_postdata();
	}
	return $output;
}