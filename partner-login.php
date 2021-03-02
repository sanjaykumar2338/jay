<?php
session_start();

include('includes/config.php');

$errormsg = '';

if(isset($_POST['sub'])){
  $emailid = $_POST['emailid'];
  $password = $_POST['password'];
  $resdup2 = mysqli_query($con,"SELECT * FROM `Partnership` WHERE username = '$emailid' AND password = '$password' ");

  if(mysqli_num_rows($resdup2) > 0){	
	echo  $row =mysqli_fetch_array($resdup2);
	  $_SESSION['aff_id']=$row['aff_id'];	
	  $_SESSION['names']=$row['first_name'];
	header('location:partner-dashboard.php');	

	
  }
	 
	 else
  {    
	
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
  


</head>
<body>
<!----------------------------HEADER----------------------------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-light mycustomnav my-header-nav">
      <div class="container-fluid">
        <a class="navbar-brand logo" href="index.php">
          <div class="brand-logo"><img src="images/logo.png" alt="logo"></div>
        </a>
        <!--<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse8">
            <span class="navbar-toggler-icon"></span>
        </button>-->
		
        <button class="navbar-toggler collapsed navtoggle" type="button" data-toggle="collapse" data-target="#navbarCollapse8" aria-controls="navbarCollapse8" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>				
        </button>

        <div class="collapse navbar-collapse px-sm-0" id="navbarCollapse8">
          <ul class="navbar-nav ml-auto" id="mainnav">
            <li>
              <a href="partner-login.php" class="nav-item nav-link before-login-nav-link <?php if ($first_part=="partner-login.php") {echo "active"; } else  {echo "noactive";}?>" ><i class="fa fa-sign-in pr-3 d-none"></i> Login Now</a>
            </li>
            <li>
              <a id="logdiv1" href="signup.php" class="nav-item nav-link nav-logout logdiv <?php if ($first_part=="signup.php") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-user-plus pr-3 d-none"></i> Sign Up</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
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


<?php include 'footer.php'; ?>
