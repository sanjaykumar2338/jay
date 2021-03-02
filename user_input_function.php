<?php 
require 'includes/class.phpmailer.php';

if(isset($_POST)){
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$usertype = $_POST['usertype'];
	$comment = $_POST['comment'];
	$source = $_POST['source'];
	$accept = $_POST['accept'];
	$accept_1 = $_POST['accept_1'];
	
	
	$message= 'Name:'.$username. '<br> Email:' .$email.'<br>User Type:'.$usertype.'<br>comment:' .$comment.'<br>source:' .$source;

	if($accept == 1){
		$message .= '<label><input type="checkbox" checked> By submitting this change request, you consent to being publicly disclosed as the source, and grant Isuriz and any user of Isuriz the irrevocable license to use this proposed edit freely and in perpetuity. If you are providing general feedback and bringing a detail to our attention, please click N/A.</label>';
	}
	if($accept_1 == 1){
		$message .= '<label><input type="checkbox" checked> N/A</label>';
	}

	$mail = new PHPMailer(); // create a new object
  	$mail->IsSMTP();
    $mail->Host = 'mail.isuriz.com';
 	$mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'support@isuriz.com';
    $mail->Password = '3G5n2~nq';
	$mail->SMTPSecure = 'ssl';

    $mail->setFrom('support@isuriz.com','isuriz');
    $mail->AddAddress("support@isuriz.com", 'isuriz');  // Add a recipient
    $mail->AddBCC('jlefkovi2003@yahoo.com', 'isuriz');	
	$mail->IsHTML(true);                                 // Set email format to HTML
	$mail->Subject = 'Contact isuriz from User inputs';
	$mail->Body = $message;

	if(!$mail->send()) {		
		echo $errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Mail not send ,please try again</div>";				
	} else {		
		echo $errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Your message has been successfully sent.</div>";		
	}

}
?>