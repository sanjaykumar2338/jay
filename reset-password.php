<?php
session_start();
if(isset($_SESSION['id'])){
	session_destroy();
}
include('includes/config.php');
$errormsg = '';

function encrypt_decrypt($action, $string) {
	$output = false;

	$encrypt_method = "AES-256-CBC";
	$secret_key = 'X*T9B@786#!qwN';
	$secret_iv = 'V)*12qZesxd%^jK';

	// hash
	$key = hash('sha256', $secret_key);
	
	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if ( $action == 'encrypt' ) {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	} else if( $action == 'decrypt' ) {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	else{
		
	}
	return $output;
}

$token = $_GET["token"];

//check if token or reset link is expired
$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE change_password_token = '$token' AND is_email_verified = '1' AND change_password_time > NOW() ");
if(mysqli_num_rows($resdup2) > 0)
{	
}
else
{
	$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your link is expired or invalid !!!</div>";
}

if(isset($_POST['sub'])){
	//process post variables
	$password = $_POST["password"];
	$cryptedpwd = encrypt_decrypt('encrypt', $password);
	//update password in database
	$sql = "UPDATE `tbl_users` SET `password` = '$cryptedpwd', `change_password_time` = NOW() where `change_password_token` = '$token' ";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password successfully changed.</div><a href='login.php'>Click here for login</a>";		
	}
	else
	{
		$errormsg = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error !!!</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			<h2 class="col-md-12">Reset Password</h2>
			<div class="col-md-12">
				<br/>
					<?php
						if(!empty($errormsg))
						{
							echo $errormsg; 
						}
						else
						{	
					?>
					
					 <form role="form" name="myform" method="POST" id="idForm">
						 <div class="col-md-12" style="border: 1px solid; border-radius: 5px; padding: 15px; margin-top: 50px;">
							 <div class="form-group  col-md-12">
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control" minlength="6" required>
							</div>
							<div class="form-group  col-md-12">
								<label>Confirm Password</label>
								<input type="password" name="confirm_password" id="confirm_password"  minlength="6" class="form-control" required>
							</div>
							 <div class="form-group col-md-12">
								<input type="submit" class="btn btn-primary" name="sub" id="sub" value="Reset Password !">
							</div>
						</div>
					 </form>
					<?php } ?>
			</div>
		</div>
	</div>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
  //function to match password and confirm password field
	$(document).ready(function() {
		
		$("#idForm").submit(function () {
			var password = $('#password').val();
			var confirm_password = $('#confirm_password').val();
			
			if(password != confirm_password)
			{
				alert('Password and Confirm Password do not match !!!')
				return false;
			}
			
		});
		
	});
  </script>
</html>
<?php
include('includes/close.php');
?>