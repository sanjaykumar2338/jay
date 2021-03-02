<?php
session_start();
if (isset($_SESSION['id'])) {
    session_destroy();
}

include('includes/config.php');
require 'includes/class.phpmailer.php';
$errormsg = '';
include 'headerapp.php';

//random function for generating token string
function random_string($length) {
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'));
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	return $key;	
}

if(isset($_POST['sub'])){
	$emailid = $_POST["emailid"];
	//check if this email id exists in database
	$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND is_email_verified = '1' ");
	if(mysqli_num_rows($resdup2) > 0){
		
		while($row = mysqli_fetch_array($resdup2))
		{
			//grab first and last name
			$name = $row['name'];
		}
		
		//set token and expiry time of token as well
		$token = random_string(20);
		$result = mysqli_query($con,"UPDATE `tbl_users` SET `change_password_token` = '$token', `change_password_time` = DATE_ADD(NOW(), INTERVAL 24 HOUR)
					WHERE `emailid` = '$emailid' ");
		
		if($result){		
			$message = 'Hi '.$name.' ,<br/><br/>You recently requested to reset your password.';
			$message .= 'Please click the below link to reset your password:<br/><a href="'.URL.'reset-password.php?token='.$token.'">'.URL.'reset-password.php?token='.$token.'</a>';
			$message .= '<br/><br/>Regards,<br /> The Asuriz Team';
			$mail = new PHPMailer(); // create a new object
			//$mail->IsSMTP(); // enable SMTP
			//$mail->SMTPAuth = true; // authentication enabled
			//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->Host = "mail.asuriz.com";
			$mail->Username = "support@asuriz.com"; // SMTP username
			$mail->Password = "3G5n2~nq"; // SMTP password
			$mail->SMTPSecure = "ssl";
			$mail->Port       = 25;                            // SMTP password
			$mail->setFrom('support@asuriz.com', 'Asuriz');
			$mail->AddAddress($emailid, $name);  // Add a recipient
			
			$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
			$mail->IsHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Reset Password Email';
			$mail->Body = $message;
			if(!$mail->send()) {				
				$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while sending email, please contact IT administrator !!!</div>";
				
			} else {
				
				 $errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Account password reset instructions were emailed to you.</div>";
			}
			
						
		}
		else
		{
			$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while generating token !!!</div>";			
		}
		
	}
	else
	{
		$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email ID doesn't exist !!!</div>";
	}
}
?>
<style>
 	.log-inpart-sec .form-control {
    padding: 22px 10px;
}
	 label.control-label {
    font-size: 14px !important;
    font-weight: 600 !important;
    margin: 10px 0px !important;
	text-align: left !important;
    display: block;
}
	
	.log-inpart-sec p {
    
	font-size: 14px;
}
	hr {
    border-top: 1px solid #d0cfcf !important;
}
 </style>
<form role="form" name="myform" method="POST" >
<div class="log-inpart">
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec">
        <h2 style="padding-bottom:0px;"> Forgot Password </h2>
		  <p style="margin-bottom: 20px;">Please enter your email address and we'll send you a link to reset your password.</p>
			<div class="row"><div class="col-md-12"><?php echo $errormsg; ?></div></div>
       <div class="row">
           <div class="col-sm-2"></div>
           <div class="col-sm-8">
              <div class="form-group">
			    <label class="control-label" for="emailid">Email</label>
         	    <input type="email" name="emailid" id="emailid" class="form-control" required="">
              </div>
           </div>
           <div class="col-sm-2"></div>
       </div>
        <div class="full"> 	<input type="submit" class="btn logdv" name="sub" id="sub" value="Submit">
		
		<div class="form-group col-md-12">
			<br>
			<hr>
			<p style="margin-top: 30px;"><a href="login.php">Click here to login</a>.</p> 
		</div>
				
				
        </div>
      </div>
    </div>
  </div>
</div>
</form>


<?php
include 'footer.php';
include('includes/close.php');
?>