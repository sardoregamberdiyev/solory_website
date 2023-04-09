<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email_detail ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_detail ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name_detail     = $_POST['name_detail'];
$email_detail    = $_POST['email_detail'];
$message_detail    = $_POST['message_detail'];
$verify_contact_detail  = $_POST['verify_contact_detail'];

if(trim($name_detail) == '') {
	echo '<div class="error_message">You must enter your Name.</div>';
	exit();
} else if(trim($email_detail) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email_detail)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
} else if(trim($message_detail) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
} else if(!isset($verify_contact_detail) || trim($verify_contact_detail) == '') {
	echo '<div class="error_message"> Please enter the verification number.</div>';
	exit();
} else if(trim($verify_contact_detail) != '4') {
	echo '<div class="error_message">The verification number you entered is incorrect.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$message_detail = stripslashes($message_detail);
}


//$address = "HERE your email address";
$address = "info@domain.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by ' . $name_detail . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by $name_detail with additional message is as follows." . PHP_EOL . PHP_EOL;
$e_content = "\"$message_detail\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $name_detail via email: $email_detail";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email_detail" . PHP_EOL;
$headers .= "Reply-To: $email_detail" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_detail";
$usersubject = "Thank You";
$userheaders = "From: info@domain.com\n";
$usermessage = "Thank you for contact us. We will reply shortly!";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:25px 0'>";
	echo "<strong >Email Sent.</strong><br>";
	echo "Thank you <strong>$name_detail</strong>,<br> your message has been submitted. We will contact you shortly.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
