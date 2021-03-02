<?php
session_start();

if (isset($_SESSION['userid'])) {
	//redirect user to dashboard
}

include('includes/config.php');
require 'includes/class.phpmailer.php';
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

if(isset($_POST['sub'])){

	//process post variables
	$emailid = $_POST['emailid'];
	$password = mysqli_real_escape_string($con, trim($_POST['password']));
	$cryptedpwd = encrypt_decrypt('encrypt', $password);
	$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ");
	//echo "SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ";
	//check if the user exists as well as email verified flag is set
	if(mysqli_num_rows($resdup2) > 0){
		while($row = mysqli_fetch_array($resdup2)){
			//set session variables
			$_SESSION['userid'] = $row['id'];
			$_SESSION['councilor_name'] = $row['councilor_name'];			
			$_SESSION['emailid'] = $row['emailid'];			
			$_SESSION['usertype'] = $row['usertype'];
			
			//redirect to search page
			if( $row['usertype'] == 'College_Counselor'){
				header("location: counselor-dashboard.php");
			}else{
				header("location: form.php");
			}
			
		}
	}
	else
	{
		//user does not exist or email verified flag is not set yet
		$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Inavlid Credentials  !!!</div>";
	}
}

?>
<?php include 'headerapp.php'; ?>
<style>
	.row.send-part-box {
    margin: 0 auto;
}
	.log-inpart-sec .form-control {
    padding: 22px 10px;
}
   label.control-label {
    font-size: 14px !important;
    font-weight: 600 !important;
    margin: 10px 0px !important;
  text-align: left !important;
    display: block;
	   color: #000;
}
	 .col-md-12.custom-col {
    padding: 0px;
}
</style>
<link href="css/site.css" rel="stylesheet">
<!----------------------------BANNER----------------------------------->
<div class="banner inner-banner positon-center multi-step-banner" style="background:linear-gradient( rgb(0 0 0 / 35%) 100%, rgba(0, 0, 0, 0.5)100%), url(images/Counselor.jpg) no-repeat;background-position: center">
  <div class="container">
    <div class="banner-part">
      <h1> College Counselors </h1>
    </div>
  </div>
</div>
<!----------------------------BANNER----------------------------------->
<div id="counsellor">
	<div class="container">	
		<div class="row send-part-box">
			<div class="col-md-6 col-sm-12 form-left">
				<div class="log-inpart">
					<div class="after-two">
						<div class="log-inpart-sec">
							<div class="blockheader">
								<h3 class="txt-white">Welcome College Counselors</h3>
							</div>
							<div class="blockbody">
								<p class="custom-space">Isuriz’s college builder tool assists students with the complex task of identifying the "best fit" colleges. We believe that our methodology is industry-leading and truly groundbreaking in its functionality. Due to the holistic processes at certain institutions of higher education, there is a limit to the accuracy of these predictions. In order to better serve our user base, we are so excited to offer college counselors as a resource to best determine how the unique nature of each student’s accomplishments will sway the decisions from colleges. To get started, click below to create a new account.</p> <p></p> <p></p>
								<a href="signup.php" class="txt-white couseller-signup"><i class="fa fa-caret-right"></i> New Users: Create a New Account</a>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 form-right">
				<form role="form" name="myform" method="POST" >
					<div class="log-inpart">
						<div class="after-two">
						  <div class="log-inpart-sec">
						  	<div class="blockheader">
						  		<h3> Are you a returning college counselor with an existing account? </h3>
						  	</div>
						  	<div class="blockbody">
						  		<div class="col-md-12">
									<?php echo $errormsg; ?>
								</div>
								 <div class="form-group">
								  <label class="control-label" for="emailid">Email</label>
									 <input type="email" name="emailid" id="emailid" class="form-control" required>
								 </div>
								 <div class="form-group">
								  <label class="control-label" for="password">Password</label>
									 <input type="password" name="password" id="password" class="form-control"  minlength="6" required>
								 </div>

								<div class="full"> 
									<button class="btn logdv mybluebtn" name="sub" id="sub"> Login </button>
						  	    </div>
						  </div>
						</div>
					</div>
				</form>
			</div>
			  
		</div>
 	</div>
</div>

<?php include 'footer.php'; ?>