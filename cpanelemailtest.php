<?php
require 'includes/class.phpmailer.php';
// $email and $message are the data that is being
// posted to this page from our html contact form
$email = 'support@asuriz.com';
$message = 'Test msg from cpanel email' ;

$mail = new PHPMailer();

// set mailer to use SMTP
//$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "mail.asuriz.com"; // specify main and backup server

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPDebug = 2;
$mail->Username = "support@asuriz.com"; // SMTP username
$mail->Password = "3G5n2~nq"; // SMTP password
$mail->SMTPSecure = "ssl";
$mail->Port       = 25;
// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress("vaibhav.bhasin@exceledunet.com", "VB");
//$mail->AddAddress('jlefkovi2003@yahoo.com', 'Jay Lefkovitz');

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "You have received feedback from your website!";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
echo "Message could not be sent... <p>";
echo "<pre>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "Message has been sent";
?>