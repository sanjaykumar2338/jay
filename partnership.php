<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Best Online College List Builder | Isuriz</title>
<link rel='shortcut icon' href='images10/favicon-isuriz.png' type='image/png' />
<meta name="title" content="Best Online College List Builder | Isuriz">
<meta name="description" content="Isuriz is a cutting-edge college planning technology company that offers the best online college list builder available today.">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Best Online College List Builder | Isuriz" />
<meta property="og:description" content="Isuriz is a cutting-edge college planning technology company that offers the best online college list builder available today." />
<meta property="og:url" content="https://www.isuriz.com/" />
	
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
  
<link rel="canonical" href="https://www.isuriz.com" />

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z9G6DMQDTE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z9G6DMQDTE');
</script>

</head>
<body>
<?php 
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include('includes/config.php');
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];

$site_url =  "https://" . $_SERVER['SERVER_NAME']; 
if(isset($_POST['addPartner'])){
  $to =$_POST['email'];
  $subject = "Welcome New isuriz Partnership";
  // $uname =$_POST['username'];
  $fname =$_POST['fname'];
  $lname =$_POST['lname'];
  // $password =$_POST['password'];
  // $cpassword =  $_POST['cpassword'];
  $phone =$_POST['phone'];
  $company =$_POST['company'];
  $street =$_POST['street'];
  $city =$_POST['city'];
  $state =$_POST['state'];
  $code =$_POST['code'];
  $contry =$_POST['country'];
  $primaryurl =$_POST['primaryurl'];
  $aff_id =rand(10,10000);
  $errors = array();
  
  if($password != $cpassword){
    $errors[] = "Password Not match" ;
  }

  // check user name or email already exists
  // $qry = "SELECT * FROM `Partnership` WHERE `username` LIKE '".$uname."'";
  // $results = $con->query($qry);
  // if ($results->num_rows > 0) {
  //   $errors[] = "Username already exists";
  // }


  // check user name or email already exists
  $qry1 = "SELECT * FROM `Partnership` WHERE `email` LIKE '".$to."'";
  $results1 = $con->query($qry1);
  if ($results1->num_rows > 0) {
    $errors[] = "Email already exists";
  }

  if (empty($errors)): 

   $sql ="INSERT INTO `Partnership` (`first_name`, `last_name`, `phone`, `company`, `street`, `city`, `state`, `postal_code`, `country`, `email`, `primary_url`, `aff_id`) 
    VALUES ('$fname', '$lname', '$phone', '$company', '$street', '$city', '$state', '$code', '$contry', '$to', '$primaryurl', '$aff_id')";
    if(mysqli_query($con, $sql)){
      $id = mysqli_insert_id($con);
     
      $message = "
        <html>
        <head>
        <title>Welcome New isuriz Partnership</title>
        </head>
        <body>
        <p>Welcome to the <a href='https://www.isuriz.com/'>isuriz.com</a> Partnership Program! Below are a few things you will want to become familiar with:</p>
        <p>1. You can track your referrals by using folowing link - <br>
          Link : <a href='".$site_url."/partner-dashboard.php?id=".$id."'> ".$site_url."/partner-dashboard.php?id=".$id." </a>  <br />   
        
        2. To begin referring, use your referral link:
        <br>
        <a href='".$site_url."/signup.php?aff_id=".$aff_id."'>dev.isuriz.com/signup.php?aff_id=".$aff_id."</a>

        <br>
        
        <br>
        The isuriz Partnership Team
        
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <isuriz@example.com>' . "\r\n";
        $headers .= 'Cc: jlefkovi2003@yahoo.com' . "\r\n";
      $sucessMsg = "";
       if(mail($to,$subject,$message,$headers)){
          $sucessMsg = "Your account is created successfully and Email send to your email for affilation link";
          $_POST = array();
       }
    }
  endif;
  
  
}



?>
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
              <a id="logdiv1" href="signup.php" class="nav-item nav-link nav-logout <?php if ($first_part=="signup.php") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-user-plus pr-3 d-none"></i> Sign Up</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
 

<div class="banner inner-banner multi-step-banner" style="background:url(images/partner.png) no-repeat center">
  <div class="container">
    <div class="banner-part">
      <h1> Partner with Us </h1>
    </div>
  </div>
</div>


<div class="send-part mycontactus form-wrap partner-section">
  <div class="container">
    <div class="afterDiv">
      <div class="send-part-box form-white-box custom-partner-width mx-auto float-none">
        <div class="row">         
          <div class="col-12 col-md-12 col-sm-12">
            <?php 
            if(empty($errors) && !empty($sucessMsg)){
              echo '<div class="alert alert-success">
                <strong>'.$sucessMsg.'
              </div>';
            }elseif (!empty($errors)) { ?>
              <div class="alert alert-danger">
                  <?php 
                  echo "<ul>";
                  foreach ($errors as $key => $value) {
                    echo '<li>'.$value.'</li>';
                  }
                  echo "</ul>";
                  ?>
                </div>
            <?php }
            ?>
            <section class="section-container">
              <!-- Page content-->
              <!-- <p class="affibdr">Partnership login information</p> -->
              <form method="post" id="partnerForm">
                <div class="affi1">
                
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter Username" required> 
                    </div> -->
                  <!-- <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                         <label for="password">Password</label> 
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required> </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                         <label for="cpassword"> Confirm Password</label> 
                        <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required> </div>
                    </div>
                  </div>
                </div> -->
                
                <!-- <p class="affibdr2">account information</p> -->
                <div class="affi1">
                  <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                     <div class="form-group">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="text" name="fname" class="form-control" id="fname" aria-describedby="usernameHelp" placeholder="First Name" required> 
                        </div> 
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <!-- <label for="lname">Last Name</label> -->
                        <input type="text" name="lname" class="form-control" id="lname" aria-describedby="usernameHelp" placeholder="Last Name"> </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- <label for="phone">Phone Number</label> -->
                    <input type="text" name="phone" class="form-control" id="phone" aria-describedby="usernameHelp" placeholder="Phone Number"> </div>
                  <div class="form-group">
                    <!-- <label for="company">Company</label> -->
                    <input type="text" name="company" class="form-control" id="company" aria-describedby="usernameHelp" placeholder="Company Name"> </div>
                  <div class="form-group">
                    <!-- <label for="street">Street Address</label> -->
                    <input type="text" name="street" class="form-control" id="street" aria-describedby="usernameHelp" placeholder="Address"> </div>
                  
                    
                      <div class="form-group">
                        <!-- <label for="city">City</label> -->
                        <input type="text" name="city" class="form-control" id="city" aria-describedby="usernameHelp" placeholder="City"> </div>
                   
                    <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <!-- <label for="state">State</label> -->
                        <input type="text" name="state" class="form-control" id="state" aria-describedby="usernameHelp" placeholder="State"> </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <!-- <label for="code">Zip Code</label> -->
                        <input type="text" name="code" class="form-control" id="code" aria-describedby="usernameHelp" placeholder="Zip Code"> </div>
                    </div>
                    <!-- <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                         <label for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Country"> </div>
                    </div> -->
                  </div>
                  <div class="form-group">
                    <!-- <label for="email">Email Address</label> -->
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="usernameHelp" placeholder="Email" required> 
                    </div>
                  <div class="form-group">
                    <!-- <label for="primaryurl">Primary URL</label> -->
                    <input type="text" name="primaryurl" class="form-control" id="primaryurl" aria-describedby="usernameHelp" placeholder="Website"> </div>
                </div>

                <!-- download button -->
                  <div class="download-logo">
                    <div class="logo-preview"><img src="/images/logo.png"></div>
                    <div class="logo-detail">
                      <p>Businesses that partner with Isuriz can display the Isuriz logo on their website. <a href="/images/Isuriz-logo.zip" download>Click here</a> to download the logo.</p>
                    </div>
                  </div>
                <br>
                <div class="d-flex justify-content-center">
                <button class="btn mybluebtn mb-4" name="addPartner" type="submit" id="addPartner">Submit</button>
                </div>
                <div id="message"></div>
              </form>
            </section>
          </div>
         
        </div>
      </div>

    </div>
    
  </div>
</div>

<?php include 'footer.php'; ?>
