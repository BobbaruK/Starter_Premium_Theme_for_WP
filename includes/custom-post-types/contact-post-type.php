<?php
/**
 * @package CSSecoThemes
 * custom-post-type.php
 */
$contactF = get_option('contactF_activate');
if( @$contactF == 1 ) {

	add_action( 'init', 'csseco_contact_post_type' );

	add_filter( 'manage_cssecocontact_posts_columns', 'csseco_set_cssecocontact_columns' );
	add_action( 'manage_cssecocontact_posts_custom_column', 'csseco_contact_custom_column', 10, 2 );

	add_action( 'add_meta_boxes', 'csseco_contact_add_meta_box' );
	add_action( 'save_post', 'csseco_save_contact_email_data' );

}

function csseco_contact_post_type() {

	$labels = array(
		'name'              =>      'Messages',
		'singular_name'     =>      'Message',
		'menu_name'         =>      'Messages',
		'name_admin_bar'    =>      'Message'
	);
	$args = array(
		'labels'            =>      $labels,
		'show_ui'           =>      true,
		'show_in_menu'      =>      true,
		'capability_type'   =>      'post',
		'hierarchical'      =>      false,
		'menu_position'     =>      26,
		'menu_icon'         =>      'dashicons-email-alt',
		'supports'          =>      array( 'title', 'editor', 'author' )
	);

	register_post_type( 'cssecocontact', $args );

}

function csseco_set_cssecocontact_columns( $columns ) {

//	unset(
//		$columns['author']
//	);
//	return $columns;

	$cssecoContactFormCPT = array();
	$cssecoContactFormCPT['title']      =      'Full Name';
	$cssecoContactFormCPT['message']    =      'Message';
	$cssecoContactFormCPT['email']      =      'Email';
	$cssecoContactFormCPT['date']       =      'Date';
	return $cssecoContactFormCPT;

}
function csseco_contact_custom_column( $column, $post_id ) {

	switch( $column ) {
		case 'message' :
			echo get_the_excerpt();
			break;

		case 'email' :
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo '<a href="mailto:' . $email . '">' . $email . '</a>';
			break;
	}

}

/* Contact Meta Boxes */
function csseco_contact_add_meta_box() {
	add_meta_box(
		'contact_email',
		'User Email',
		'csseco_contact_email_callback',
		'cssecocontact',
		'side'
		//'default'
	);
}

function csseco_contact_email_callback( $post ) {
	wp_nonce_field('csseco_save_contact_email_data','csseco_contact_email_meta_box_nonce' );

	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );

	echo '<label for="csseco_contact_email_field">User Email Adress: </label>';
	echo '<input type="email" id="csseco_contact_email_field" name="csseco_contact_email_field" 
				 value="' . esc_attr( $value ) . '" size="25" />';
}

function csseco_save_contact_email_data( $post_id ) {
	if( !isset( $_POST['csseco_contact_email_meta_box_nonce'] ) ) { // metabox exist
		return;
	}
	if( !wp_verify_nonce( $_POST['csseco_contact_email_meta_box_nonce'], 'csseco_save_contact_email_data' ) ) { // nonce exist
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { // doing autosave
		return;
	}
	if( !current_user_can( 'edit_post', $post_id ) ) { // user can edit this post(msg)
		return;
	}
	if( !isset( $_POST['csseco_contact_email_field'] ) ) { // input has a value(email adress)
		return;
	}

	$csseco_cpt_contact_email_data = sanitize_text_field( $_POST['csseco_contact_email_field'] );

	update_post_meta(
		$post_id,
		'_contact_email_value_key',
		$csseco_cpt_contact_email_data
	);
}