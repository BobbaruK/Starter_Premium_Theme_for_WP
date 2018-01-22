<?php
/**
 * @package CSSecoThemes
 * contact-form.php
 *
 * Contact Form Template
 */
?>

<form id="cssecoContactForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<div class="form-group">
		<input type="text" id="name" class="form-control" placeholder="Your Name" name="name"  />
		<small class="text-danger form-control-msg">Your Name is Required</small>
	</div>
	<div class="form-group">
		<input type="email" id="email" class="form-control" placeholder="Your Email" name="email"  />
		<small class="text-danger form-control-msg">Your Email is Required</small>
	</div>
	<div class="form-group">
		<textarea name="message" id="message" class="form-control" placeholder="Your Message" ></textarea>
		<small class="text-danger form-control-msg">A Message is Required</small>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	<small class="text-info form-control-msg js-form-submission"><i class="fa fa-spinner fa-pulse fa-fw"></i>Submission in process, please wait...</small>
	<small class="text-success form-control-msg js-form-success">Message successfully submitted. Thank you!</small>
	<small class="text-danger form-control-msg js-form-error">There was a problem with the Form. Please try again!</small>
</form>
