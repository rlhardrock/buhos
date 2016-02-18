<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name : contact form
*/
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
if( $cuckoo_settings['theme-style'] == 'dark' ){
	$preoladColor = '#fff';
}else{
	$preoladColor = '#000';
}
?>
<form id="cuckoo-contact-form" class="contact-form" name="contact_form" autocomplete="off">
	<p class="comment-form-author">
		<span id="name">
			<label class="form_label_logs_name" for="contact_name"><?php _e('Name ', THEMENAME); ?><span style="color:red;">*</span></label>
			<input id="contact_name" type="text" class="overlayField_name" name="contact_name" value="" />
		</span>	
	</p>
	<p class="comment-form-email">
		<span id="contact_email">
			<label class="form_label_logs_email" for="email_contact"><?php _e("Email ", THEMENAME); ?><span style="color:red;">*</span></label>
			<input id="email_contact" class="overlayField_email" type="email" name="contact_email" value="" />
		</span>
	</p>
	<p class="comment-form-comment">
		<span id="message">
			<label class="form_label_textarea" for="contact_message"><?php _e("Your Message...", THEMENAME); ?></label>
			<textarea id="contact_message" class="overlayField_textarea" name="contact_message" rows="7" cols="10"></textarea>
		</span>
	</p>
	<p class="form-submit" style="display:inline-block;">
		<input type="submit" value="<?php _e("Send Message", THEMENAME); ?>" id="submit" class="form-submit" />
	</p>
	<div id="number_checked">
		<div class="number-checked-box">
			<h3><?php _e( 'Are You a Human?', THEMENAME ); ?></h3>
				<span class="numb-amount">
					<?php _e('Enter the sum of ', THEMENAME); ?>
					<?php  echo $_SESSION['n1']; ?> + <?php echo $_SESSION['n2']; ?>
					<?php _e(' below to prove you are a human.', THEMENAME); ?>
				</span>
			<input type="text" class="amount-checker" name="amount-checker" value="" />
			<input type="submit" value="<?php _e("Submit", THEMENAME); ?>" id="submit-all" class="form-submit" />
			<div class="number-close"></div>
		</div>
	</div>
	<input type="hidden" name="style-theme" value="<?php echo $preoladColor; ?>" />
	<input type="hidden" name="amount-cuckoo" value="<?php echo $_SESSION['expect']; ?>" />
</form>