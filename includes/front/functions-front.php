<?php
/**
 * @package CSSecoThemes
 * front/functions-front.php
 *
 * Blog Loop Custom Functions
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
	return '<span class="posted-on">Posted <a href="' . esc_url( get_the_permalink() ) . '">' . $posted_on . '</a> 
			ago</span> / <span class="posted-in">' . $output . '</span>';
}

/**
 * Generate entry-footer
 */
function csseco_posted_footer() {
	return 'tags and comments links';
}