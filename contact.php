<?php
require 'includes/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$name = e($_POST['name']);
	$email = e($_POST['email']);
	$phone = e($_POST['phone']);
	$content = e($_POST['content']);
	$errors['name'] = validateName($name);
	$errors['email'] = validateEmail($email);
	$errors['phone'] = validatePhone($phone);
	$errors['content'] = validateContent($content);

	// die('Name: ' . $name . ' - ' . 'Email: ' . $email . ' - ' . 'Phone: ' . $phone . ' - ' . 'Content: ' . $content);


	 if (!$errors['name'] && !$errors['email'] && !$errors['phone'] && !$errors['content']) {
		$formcontent=" From: $name \n Email: $email \n Phone: $phone \n Content: $content";
		$recipient = "catherinegfromont@gmail.com";
		$subject = "WRW Contact Form Submission";
		$mailheader = "From: $email \r\n";

		mail ($recipient, $subject, $formcontent, $mailheader) or die ("error");

	}

	// Add message saying well done lad.
	addMessage("success", 'Thanks for getting in touch with us, we will get back to you shortly!');
    redirect('index.php');

}



require 'partials/header.php';
require 'partials/navigation.php';

?>







<div class="animate-area">
<div class="container form">


	<!-- Jumbotron Header -->
	<header class="col-lg-12 pic">
	    <img alt="bannercontact" src="img/bannercontact.jpg" class="img-responsive center-block bannerabout">
	</header>
	


	<div class="col-md-12">
		<div class="panel panel-inverse">
			<div class="panel-heading register">Contact Us</div>
				<div class="panel-body">
	
	

	
		<form action="contact.php" method="post" onsubmit="return validate()">
			<!-- <div class="row row-sm-offset"> -->

			<div class="col-xs-12">



				<div class="form-group">
					<p>Name:</p>
					<input id="name" value="<?= !empty($name) ? $name : '' ?>" type="text" class="form-control" placeholder="Full name" name="name" ><span class="text-danger"><?= !empty($errors['name']) ? $errors['name'] : '' ?> </span>
					<div id="nameError"></div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<p>Email:</p>
					<input id="email" value="<?= !empty($email) ? $email : '' ?>" type="text" class="form-control" placeholder="Email address" name="email" ><span class="text-danger"><?= !empty($errors['email']) ? $errors['email'] : '' ?> </span>
					<div id="emailError"></div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<p>Phone:</p>
					<input id="phoneno" value="<?= !empty($phoneno) ? $phoneno : '' ?>" type="text" class="form-control" placeholder="Phone Number" name="phone" ><span class="text-danger"><?= !empty($errors['phoneno']) ? $errors['phoneno'] : '' ?> </span>
					<div id="phoneError"></div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<p>Tell us about yourself:</p>
					<textarea id="content" type="text"  value="<?= !empty($content) ? $content : '' ?>"class="form-control" placeholder="Tell us about yourself..." name="content" ></textarea><span class="text-danger"><?= !empty($errors['content']) ? $errors['content'] : '' ?> </span>
					<div id="contentError"></div>
				</div>
			</div>

			

			

			<div class="form-group">
			            <div class="col-md-12">
			            
			              <button type="submit" class="btn btn-default search">Submit</button>

			            </div>
			 </div>

		
			 <iframe class="col-md-12 img-responsive map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.203605394166!2d175.2854155508954!3d-37.785267940087024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d6d18bbdf0037e5%3A0x1295cac5842da2f7!2s130+River+Rd%2C+Hamilton+East%2C+Hamilton+3216!5e0!3m2!1sen!2snz!4v1497483268601" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</form>


	

			</div>
		</div>
	</div>
</div>
</div>

<?php


require 'partials/footer.php';


?>