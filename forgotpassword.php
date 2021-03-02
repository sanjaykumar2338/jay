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
			$message = 'Hi '.$name.',<br/>You recently requested to reset your password.&nbsp;';
			$message .= 'Please click the below link to reset your password:<br/><a href="'.URL.'reset-password.php?token='.$token.'">'.URL.'reset-password.php?token='.$token.'</a>';
			$message .= '<br/><br/>Regards,<br /> The Isuriz Team';
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
			$mail->Host = "mail.isuriz.com";
			$mail->Username = "support@isuriz.com"; // SMTP username
			$mail->Password = "3G5n2~nq"; // SMTP password
			$mail->SMTPSecure = "ssl";
			$mail->Port       = 25;                            // SMTP password
			$mail->setFrom('support@isuriz.com', 'Isuriz');
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
		$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>The email you have entered does not match a user account. Please try again.</div>";
	}
}
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
  <style type="text/css">
    .dropdown.multiselect.cityDropdown.open ul.dropdown-menu {
      display: block;
      height: 234px;
      overflow-y: scroll;
    }
    ul{
      list-style: none;
    }
  span.no_of_result {
    float: right;
  }
  div#navbarCollapse8 {
    padding-top: 10px;
  }
  a.nav-item.nav-link {
    padding-top: 7px;
    margin-right: 10px;
    font-size: 16px;
}
span.navbar-toggler-icon {
    font-size: 18px;
}
#logdiv1 {
    background: #019ff0;
	color:#fff;
    padding: 10px;
    border-radius: 27px;
    box-shadow: 8px 10px 28px #9fdbf9;
    width: 129px;
    text-align: center;
}
	@media screen and (max-width: 767px) {  
	  .active {
		  color:#019ff0 !important;
	  }
	  }
@media screen and (max-width: 600px) {
 #logdiv1 {
    background: transparent;
    box-shadow: none;
    color: #000;
    width: 60px;
	 padding: 0px;
}
}
    .parts ul {
      -moz-column-count:3;
      -moz-column-gap: 20px;
      -webkit-column-count: 3;
      -webkit-column-gap: 20px;
      column-count: 3;
      column-gap: 20px;
        padding: 0;
    }
   label.heading {
    font-size: 16px;
  }
  .result {
    padding-top: 0px;
    margin-top: 50px;
    border-top: 2px solid gray;
}
.loader {
  border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  display: none;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    #collegeForm .form-row {   
    clear: both;
  }
  
 .slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.topnav {
  overflow: hidden;
  background-color: #019ff0;
  position: relative;
}

.topnav #myLinks {
  display: none;
}

.topnav a {
  color: #019ff0;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: #fff;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
  padding: 20px 18px;
}
.topnav .active {
  background-color: #fff;
  color: white;
}
.topnav a.icon:hover{
  background-color: #019ff0;
  color: #fff;
}
#myLinks a{
  color: #fff;
}
.topnav .menu_login{
  border-bottom:2px solid #fff;
  }

	 a.navbar-brand.logo img{
		 height:60px;
	  }
	  
  </style>
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
<link href="css/site.css" rel="stylesheet">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</head>
<body>
<!----------------------------HEADER----------------------------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-light mycustomnav">
        <a class="navbar-brand logo" href="index.php"><img src="images10/logo-isuriz.png" alt="logo"></a>
        <!--<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse8">
            <span class="navbar-toggler-icon"></span>
        </button>-->
		
		
		<button class="navbar-toggler collapsed navtoggle" type="button" data-toggle="collapse" data-target="#navbarCollapse8" aria-controls="navbarCollapse8" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icon-bar top-bar"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>				
		</button>
		
		
		
		

        <div class="collapse navbar-collapse" id="navbarCollapse8">
			
           
              <div class="navbar-nav ml-auto" id="mainnav">
                    <a style="color:#000;" href="login.php" class="nav-item nav-link <?php if ($first_part=="login.php") {echo "active"; } else  {echo "noactive";}?>" ><i class="fa fa-sign-in pr-3 d-none"></i> Login Now</a>
              <a  id="logdiv1" href="signup.php" class="nav-item nav-link logdiv <?php if ($first_part=="signup.php") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-user-plus pr-3 d-none"></i> Sign Up</a>
              </div>
        
        </div>
</nav>
</header>
<!----------------------------HEADER-----------------------------------> 

<form role="form" name="myform" method="POST" >
<div class="log-inpart form-wrap">
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec form-white-box">
        <h2 style="padding-bottom:0px;"> Forgot Password </h2>
		  <p class="mb-5">Please enter your email address and we'll send you a link to reset your password.</p>
			<div class="row"><div class="col-md-12"><?php echo $errormsg; ?></div></div>
       <div class="row">
           <div class="col-sm-12">
              <div class="form-group">
			    <label class="control-label sr-only" for="emailid">Email</label>
         	    <input type="email" name="emailid" id="emailid" placeholder="Email" class="form-control" required="">
              </div>
           </div>
       </div>
        <div class="full"> 	<input type="submit" class="btn logdv mybluebtn" name="sub" id="sub" value="Submit">
		
		<div class="form-group col-md-12">
			<br>
			<hr>
			<p class="forget-login"><a href="login.php">Click here to login</a>.</p> 
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