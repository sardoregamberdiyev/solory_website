<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email_newsletter ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_newsletter ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$email_newsletter_2    = $_POST['email_newsletter'];

if(trim($email_newsletter_2) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
}
//$address = "your email address";
$address = "info@domain.com";

// Below the subject of the email
$e_subject = 'New subscription request';

// You can change this if you feel that you need to.
$e_body = "$email_newsletter want to subscribe to the newsletter" . PHP_EOL . PHP_EOL;
$e_content = "\"$email_newsletter\"" . PHP_EOL . PHP_EOL;

$msg = wordwrap( $e_body . $e_content, 70 );

$headers = "From: $email_newsletter" . PHP_EOL;
$headers .= "Reply-To: $email_newsletter" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_newsletter";
$usersubject = "Thank You";
$userheaders = "From: info@udema.com\n";
$usermessage = "Thank you for join to Udema Newsletter!";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding-top:11px'>";
	echo "Thank you <strong>$email_newsletter</strong>, your subscription is submitted!!";
	echo "</div>";

} else {

	echo 'ERROR!';

}