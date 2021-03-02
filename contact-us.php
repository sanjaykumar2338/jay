<?php 

include('includes/config.php');
require 'includes/class.phpmailer.php';
$errormsg = '';
if(isset($_POST['submit'])){
   $fname = $_POST["fname"];
   $lname=$_POST["lname"];
   $email = $_POST["email"];
   $phone=$_POST["phone"];
   $message= 'Name:'.$fname. '<br> Email:' .$email.'<br>Phone:'.$phone.'<br>Message:' .$_POST["msg"];	
	if(empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($message))
  {
    $errormsg =" <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> All fields are required to be completed. </div>";
  }else{
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
	
  $mail->IsHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Contact isuriz';
  $mail->Body = $message;
	
  if(!$mail->send()) {
				//mysqli_query($con,"ROLLBACK");
				$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Mail not send ,please try again</div>";				
			} else {
				//mysqli_query($con,"COMMIT");
				$errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Your message has been successfully sent.</div>";
			}
	}
	}
   
?>
<?php include 'headerapp.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact Us | Isuriz</title>
<link rel='shortcut icon' href='images10/favicon-isuriz.png' type='image/png' />
<meta name="title" content="Contact Us | Isuriz">
<meta name="description" content="Isuriz offers the best online college list builder available today. Send us a message if you have questions or comments concerning Isuriz's products and/or services.">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Contact Us | Isuriz" />
<meta property="og:description" content="Isuriz offers the best online college list builder available today. Send us a message if you have questions or comments concerning Isuriz's products and/or services." />
<meta property="og:url" content="https://www.isuriz.com/contact-us.php" />
	
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
            <a id="nav-cn" href="login.php" class="nav-item nav-link before-login-nav-link <?php if ($first_part=="login.php") {echo "active"; } else  {echo "noactive";}?>" ><i class="fa fa-sign-in pr-3 d-none"></i> Login Now</a>
          </li>
          <li>
            <a  id="logdiv1" href="signup.php" class="nav-item nav-link nav-logout <?php if ($first_part=="signup.php") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-user-plus pr-3 d-none"></i> Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!----------------------------HEADER-----------------------------------> 


<div class="banner inner-banner multi-step-banner" style="background:url(images/contact-banner.jpg) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> Contact Us </h1>
    </div>
  </div>
</div>


<div class="send-part mycontactus form-wrap">
  <div class="container">
    <div class="afterDiv">
      <div class="send-part-box form-white-box">
        <h3 class="text-center"> Send Us a Message </h3>
		   <div class="row"><div class="col-md-12"><?php echo $errormsg; ?></div></div>
	<form method="post">
        <div class="row">
          <div class="col-md-6">
			 
            <div class="form-group">
              <input type="text" name="fname" class="form-control" placeholder="First Name" id="usr" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="lname" class="form-control" placeholder="Last Name" id="usr" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email"  name="email" class="form-control" placeholder="Email" id="usr" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="Phone Number" id="usr" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea class="form-control" name="msg" rows="5" placeholder="Type your message here..." id="comment" ></textarea>
            </div>
          </div>
        </div>
        <div class="row">
         <div class="col-md-12 text-center">
            <button type="submit" name="submit" class="SubmitDiov"> Submit </button>
         </div>
         
      </div>
		  </form>
    </div>
      
      </div>
      
  </div>
</div>

<?php include 'footer.php'; ?>

