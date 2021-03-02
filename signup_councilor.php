<?php 
include('includes/config.php');
require 'includes/class.phpmailer.php';
$errormsg = '';

//random string function to generate random token string
function random_string($length) {
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'));
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	return $key;
}
//Encrypt/Decrypt password using method AES-256-CBC supported by php 7.x
function encrypt_decrypt($action, $string) {
	
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'X*T9B@786#!qwN';
	$secret_iv = 'V)*12qZesxd%^jK';

	// hash
	$key = hash('sha256', $secret_key);

	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if($action == 'encrypt') {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	}else if($action == 'decrypt') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	else{		
	}
	return $output;
}
//post variables processing
if(isset($_POST['sub'])){
	
	$councilor_name = mysqli_real_escape_string($con, $_POST["councilor_name"]);
	$councilor_business = mysqli_real_escape_string($con, $_POST["councilor_business"]);
	$councilor_about = mysqli_real_escape_string($con, $_POST["councilor_about"]);
	$councilor_telephone = mysqli_real_escape_string($con, $_POST["councilor_telephone"]);
	$councilor_mobile = mysqli_real_escape_string($con, $_POST["councilor_mobile"]);
	$councilor_postaladdress = mysqli_real_escape_string($con, $_POST["councilor_postaladdress"]);
	
	$emailid = $_POST["emailid"];
	$password = mysqli_real_escape_string($con, trim($_POST['password']));
	$cryptedpwd = encrypt_decrypt('encrypt', $password);
	$usertype = 'COUNCILOR';
	$token = random_string(20);
	//check if this email id is already registered or not even as a user of the site
	$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' ");
	if(mysqli_num_rows($resdup2) > 0)
	{
		$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email ID already exists !!!</div>";
	}
	else{
		//insert
		$result = mysqli_query($con,"INSERT INTO `tbl_users`		(`emailid`,`password`,`usertype`,`token`,`is_email_verified`,`councilor_name`,`councilor_business`,`councilor_about`,`councilor_telephone`,`councilor_mobile`,
		`councilor_postaladdress`,`created`,`created_by`)
		VALUES ('$emailid','$cryptedpwd','$usertype','$token','0','$councilor_name','$councilor_business','$councilor_about','$councilor_telephone',
		'$councilor_mobile','$councilor_postaladdress',NOW(),'0');");
		
		if($result)
		{
			$lastid= $con->insert_id;;
			$message = 'Dear '.$councilor_name.',<br/><br/>Thanks for signing up as Counselor with asurison.com !<br/><br/>Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below:<br/><br/>Username: '.$emailid.'<br/>Password: '.$password.'<br/><br/>Please click this link to activate your account:<br/><a href="'.URL.'verfication.php?token='.$token.'&id='.$lastid.'">'.URL.'verfication.php?token='.$token.'&id='.$lastid.'</a>'.'<br/><br/>regards,<br/>Web Admin';
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->Username = "sachin.saini@exceledunet.com";
			$mail->Password = "sachin@123";                            // SMTP password
			//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->From = 'sachin.saini@exceledunet.com';
			$mail->FromName = 'Web Admin';
			$mail->AddAddress($emailid, $councilor_name);  // Add a recipient
			//$mail->AddAddress($row->emailid, $row->name);               // Name is optional

			$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
			$mail->IsHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Verification Email';
			$mail->Body = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			if(!$mail->send()) {
				mysqli_query($con,"ROLLBACK");
				$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while sending email, please contact IT administrator !!!</div>";				
			} else {
				mysqli_query($con,"COMMIT");
				$errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your account has been created successfully , please verify it by clicking the activation link that has been sent to your email with other details !!!</div>";
			}						
		}
		else
		{
			mysqli_query($con,"ROLLBACK");
			$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while inserting record !!!</div>";
		}
	}
}
 include 'headerapp.php'; ?>
<div class="log-inpart">
<form role="form" name="myform" id="idForm" method="POST" autocomplete="off">
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec">
        <h3>Counselor Sign up</h3>
		<div class="col-md-12">
			<?php echo $errormsg; ?>
		</div>
			
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Name" id="councilor_name" name="councilor_name" required>
        </div>
		
		<div class="form-group">
          <input type="text" class="form-control" placeholder="Email" id="emailid" name="emailid" required>
        </div>
		
		<div class="form-group">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
        </div>
		
		<div class="form-group">
          <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
        </div>
		
		<div class="form-group">
          <input type="text" class="form-control" placeholder="Business Name" id="councilor_business" name="councilor_business" required>
        </div>
				
		<div class="form-group">
          <textarea class="form-control" placeholder="About Me" id="councilor_about" name="councilor_about" required></textarea>
        </div>
		
		<div class="form-group">
          <input type="tel" class="form-control" placeholder="Telephone" id="councilor_telephone" name="councilor_telephone" required>
        </div>
		
		<div class="form-group">
          <input type="text" class="form-control" placeholder="Mobile" id="councilor_mobile" name="councilor_mobile" required>
        </div>
		
		<div class="form-group">
          <textarea class="form-control" placeholder="Address" id="councilor_postaladdress" required name="councilor_postaladdress"></textarea>
        </div>
		
		<div class="form-group">  
			<label><input type="checkbox" name="councilor_terms" id="councilor_terms" required> I Agree to terms and condiitons.</label>
		 </div>
		 
        <div class="full"><button class="btn logdv" name="sub" id="sub"> Sign up </button> 
          <p> Don't have an account? <a href="login.php"> Sign in </a></p>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>

<?php include 'footerapp.php'; ?>
<script>
	$( document ).ready(function() {
		
		$("#idForm").submit(function () {
			var password = $('#password').val();
			var confirm_password = $('#confirm_password').val();
			
			if(password != confirm_password)
			{
				alert('Password and Confirm Password do not match.');
				return false;
			}
		});		
	});
</script>