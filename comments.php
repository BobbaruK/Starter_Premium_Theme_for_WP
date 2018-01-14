<?php
/**
 * @package CSSecoThemes
 * comments.php
 *
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	    if ( have_comments() ) {
	    	//We have comments
    ?>

	    <h2 class="comments-title">
			<?php
			    printf(
			    	esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments-title', 'cssecotheme' ) ),
			    	number_format_i18n( get_comments_number() ),
			    	'<span>'. get_the_title() . '</span>'
			    );
			?>
	    </h2>

		<?php csseco_get_post_navigation(); ?>

	    <ol class="comments-list">
		    <?php
		        $args = array(
		        	'walker'            => null,
		        	'max-depth'         => '',
		        	'style'             => 'ol',
			        'callback'          => null,
			        'end-callback'      => null,
			        'type'              => 'all',
			        'reply_text'        => 'Reply',
			        'page'              => '',
			        'per_page'          => '',
			        'avatar_size'       => 64,
			        'reverse_top_level' => null,
			        'reverse_children'  => '',
			        'format'            => 'html5', // or 'xhtml' if no 'HTML5'
			        'short_ping'        => false,
			        'echo'              => true
		        );
		        wp_list_comments( $args );
	        ?>
	    </ol>

	    <?php csseco_get_post_navigation(); ?>

	    <?php
	        if( !comments_open() && get_comments_number() ) {
	        	echo '<p class="no-comments">' . esc_html_e( 'Comments are closed.', 'cssecotheme' ) . '</p>';
	        }
	    ?>

	<?php
	    }
	?>

	<?php
		$fields = array(
			'author' =>
				'<div class="form-group"><label for="author">' . __( 'Name', 'cssecotheme' ) .
				'<span class="required">*</span></label>' .
				'<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .
				'" required="required" /></div>',

			'email' =>
				'<div class="form-group"><label for="email">' . __( 'Email', 'cssecotheme' ) .
				'<span class="required">*</span></label>' .
				'<input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" required="required" /></div>',

			'url' =>
				'<div class="form-group"><label for="url">' . __( 'Website', 'cssecotheme' ) . '</label>' .
				'<input id="url" name="url" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" /></div>',
		);

		$args = array(
			'class_submit'      => 'btn btn-primary',
			'label_submit'      => __( 'Submit Comment', 'cssecotheme' ),
			'comment_field'     => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
									<textarea id="comment" class="form-control" name="comment" rows="5" required="required" 
									aria-required="true"></textarea></div>',
			'fields'            => apply_filters( 'comment_form_default_fields', $fields )
		);
		comment_form( $args );
	?>
</div><!-- /#comments -->