<?php
session_start();

if (isset($_SESSION['userid'])) {
  header("location: dashboard.php");
	// if($_SESSION['usertype'] == 'College_Counselor'){
	// 	header("location: counselor-dashboard.php");
	// }else{
	// 	header("location: dashboard.php");
	// } 
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
  $resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND isclosed = '0' ");
  //echo "SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ";
  //check if the user exists as well as email verified flag is set
  if(mysqli_num_rows($resdup2) > 0){
    while($row = mysqli_fetch_array($resdup2)){
		
	//check if email is verified, set session if not, show msg with resend option	
	if($row['is_email_verified'] > 0){
		
		  //set session variables
		  $_SESSION['userid'] = $row['id'];
		  $_SESSION['first_name'] = $row['name'];
		  $_SESSION['password'] = $password;
		  //$_SESSION['last_name'] = $row['last_name'];
		  $_SESSION['emailid'] = $row['emailid'];
		  $_SESSION['student_type'] = $row['student_type'];
		  $_SESSION['usertype'] = $row['usertype'];
		  

		  $resprofile = mysqli_query($con,"SELECT * FROM profile_data WHERE createdby = '". $row['id']."' ORDER BY id DESC limit 0,1");
		
		  if(mysqli_num_rows($resprofile) > 0){
			  while ($rowfilters = mysqli_fetch_assoc($resprofile)) {
				 $_SESSION['data_profile'] = unserialize($rowfilters["all_data"]);	
			  }
		  }
		  
		  
		  $resfilters = mysqli_query($con,"SELECT * FROM search_data WHERE createdby = '". $row['id']."' ORDER BY id DESC limit 0,1");
		
		  if(mysqli_num_rows($resfilters) > 0){
			  while ($rowfilters = mysqli_fetch_assoc($resfilters)) {
				  $_SESSION['dataform1'] = unserialize($rowfilters["all_filters_data"]);				  
				//  $_SESSION['clgcb'] = unserialize($rowfilters["all_clg_list"]);				  
			  }
			
		  }

		//if($_SESSION['usertype'] == 'College_Counselor'){
			// header("location: counselor-dashboard.php");
		 //  }else{
			// header("location: dashboard.php");
		 //  } 
			  
		  // redirect to search page
		  header("location: dashboard.php");
		}
		else{
			
			$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your account has not been activated. To activate your account, click on the link in the email sent to you upon creating an account. If you cannot find the activation link, click <span onclick='sendverification_email(".$row['id'].")'>here</span> to request that it be resent to you.</div>";
			 
		}
    }
  }
  else
  {
    //user does not exist or email verified flag is not set yet
    $errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>The email or password you have entered is incorrect. Please try again.</div>";
  }
}

 include 'headerapp.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Isuriz</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/site.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
	<!-- Custom script -->
	<script src="js/mycustomjs.js"></script> 
  
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</head>
<body>
<!----------------------------HEADER----------------------------------->
<?php include 'header-before-login.php'; ?>
<!----------------------------HEADER-----------------------------------> 
<link href="css/site.css" rel="stylesheet">
 
 </style>
<form role="form" name="myform" method="POST" >
<div class="log-inpart myloginform form-wrap">
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec form-white-box">
        <h2> Login </h2>
    <div class="col-md-12 custom-col" id="ajaxmsg">
        <?php echo $errormsg; ?>
      </div>
        <div class="form-group">
      <label class="control-label sr-only" for="emailid">Email</label>
         <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
      <label class="control-label sr-only" for="password">Password</label>
         <input type="password" name="password" id="password" class="form-control" placeholder="Password"  minlength="6" required>
        </div>
        
        <div class="full"> <button class="btn logdv mybluebtn" name="sub" id="sub"> Login </button>
      <div class="label-part">
         <!-- <div class="label-part-lft">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="">
                Remember me</label>
            </div>
          </div> -->
          <div class="label-part-rht"> <a href="forgotpassword.php"> Forgot Password </a> </div>
        </div>
      <hr>
          <p> Don't have an account? <a href="signup.php"> Click here </a> </p>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<script>
function sendverification_email(id)
{
            var dataString = 'id=' + id;
            var url = "includes/sendverification_email.php";
           
			$.ajax({
				type: "POST",
				url: url,
				data: dataString,
				cache: false,
				beforeSend: function () {
				   $('.loading').show();
				},
				complete: function () {
				  $('.loading').hide();
				},
				success: function (data)
				{
					$("#ajaxmsg").empty();
					$("#ajaxmsg").append(data);
				},
				error: function (error) {
					alert(error);
				}
			});
			return false;
}
</script>
<?php include 'footer.php'; ?>
