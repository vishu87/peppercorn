<?php /* Template Name: Contact Page */

	$captcha_instance = new ReallySimpleCaptcha();

	global $wpdb;
	$flag_error = '';
	if(isset($_POST['is_submit'])) {

		if(wp_verify_nonce($_POST["_wpnonce"], 'contact_form')) {

			$prefix = $_POST["prefix"];
			$correct = $captcha_instance->check( $prefix, $_POST["captcha_test"] );
			
			if($correct) {
				$captcha_instance->remove( $prefix );
				$name = isset($_POST["full_name"])?esc_attr($_POST["full_name"]):'';
				$email = isset($_POST["email"])?esc_attr($_POST["email"]):'';
				$mobile = isset($_POST["mobile"])?esc_attr($_POST["mobile"]):'';
				$message = isset($_POST["message"])?esc_attr($_POST["message"]):'';

				if($name && $email && $mobile) {

					$check_preg = true;
					if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
						$flag_error = "Please provide a valid email address";
						$check_preg = false;
					}

					if($check_preg) {
						$wpdb->insert('messages',array(
							"name" => $name,
							"email" => $email,
							"mobile" => $mobile,
							"message" => $message
						));
						$to = 'vishu.iitd@gmail.com';
						$subject = 'Contact Form - Peppercorn Avenue';
						$message = 'Name: '.$name.'<br>Email: '.$email.'<br>
							Mobile: '.$mobile.'<br>
							Message: '.$message;

						$headers = array('Content-Type: text/html; charset=UTF-8');
						
						wp_mail( $to, $subject, $message, $headers );

				   	wp_redirect(get_permalink().'?submit=true#success');
					}
				} else {
					$flag_error = 'Please fill all the fields';
				}
			} else {
				$flag_error = 'Please enter the correct captcha code.';
			}
		} else {
			$flag_error = 'Invalid Request';
		}
	}
?>
<?php
	$word = $captcha_instance->generate_random_word();
	$prefix = mt_rand();
	$img = $captcha_instance->generate_image( $prefix, $word );
	get_header('inner'); the_post();
?>

<div class="location-page home-regional-treasure">
	<h1 id="form-error" class="sec-title menu-title" data-aos="zoom-in-up" data-aos-once="true">Contact Us</h1>
	<div class="row mar-0">
		<div class="col-md-3 padd-0" data-aos="slide-left" data-aos-once="true">
			<div class="left">
				<?php echo Peppercorn::image('regional-treasure.png'); ?>
			</div>
		</div>
		<div class="col-md-6">
			<?php if($flag_error != ''): ?>
				<div class="flag-error">
					<?php echo $flag_error; ?>
				</div>
			<?php endif; ?>
			<div class="reservation-form" data-aos="zoom-in-up" data-aos-once="true">
				<?php if($_GET["submit"]): ?>
					<div class="div-success" id="success" >
						Thank you for getting in touch. We will get back to you soon.
					</div>
				<?php else: ?>
					<form method="POST" action="#form-error" class="check-form">
						<div class="form-elem">
							<label>Name<span class="red-asterik">*</span></label>
							<input type="text" name="full_name" value="<?php echo ($_POST["full_name"])?esc_attr($_POST["full_name"]):'' ?>" required="true">
						</div>
						<div class="form-elem">
							<label>Email<span class="red-asterik">*</span></label>
							<input type="email" name="email" value="<?php echo ($_POST["email"])?esc_attr($_POST["email"]):'' ?>" required="true">
						</div>
						<div class="form-elem">
							<label>Mobile<span class="red-asterik">*</span></label>
							<input type="text" name="mobile" value="<?php echo ($_POST["mobile"])?esc_attr($_POST["mobile"]):'' ?>" required="true">
						</div>
						<div class="form-elem">
							<label>Message</label>
							<textarea name="message" value="<?php echo ($_POST["message"])?esc_attr($_POST["message"]):'' ?>"><?php echo ($_POST["message"])?esc_attr($_POST["message"]):'' ?></textarea>
						</div>
						<div class="form-elem">
							<label>Please fill the text shown in image below</label>
							<input name="captcha_test" required="true">
							<div style="text-align:left;margin-top:10px;">
								<span class="captcha-image"><img src="<?php echo home_url().'/wp-content/plugins/really-simple-captcha/tmp/'.$img; ?>" /></span>
								<span class="reload-captcha"> <i class="fa fa-refresh"></i> Reload</span>
							</div>
						</div>

						<input type="hidden" name="is_submit" value="1">
						<input type="hidden" id="prefix" name="prefix" value="<?php echo $prefix; ?>">

						<?php wp_nonce_field('contact_form') ?>
						
						<div style="text-align:left">	
							<button type="submit" class="submit-btn">Submit</button>
						</div>
					</form>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-3 padd-0" style="text-align:right" data-aos="slide-right" data-aos-once="true">
			<div class="right">
				<?php echo Peppercorn::image('regional-treasure.png'); ?>
			</div>
		</div>
	</div>
</div>



<?php get_footer();?>