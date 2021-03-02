<?php
session_start();

if (isset($_SESSION['userid'])) {
  session_destroy();
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
  $resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' AND isclosed = '0' ");
  //echo "SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ";
  //check if the user exists as well as email verified flag is set
  if(mysqli_num_rows($resdup2) > 0){
    while($row = mysqli_fetch_array($resdup2)){
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
		 $_SESSION['data_profile'] = mysqli_fetch_assoc($resprofile);
	  }
      //redirect to search page
      header("location: dashboard.php");
    }
  }
  else
  {
    //user does not exist or email verified flag is not set yet
    $errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>The email or password you have entered is incorrect. Please try again.</div>";
  }
}

 include 'headerapp.php'; ?>
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
hr {
    border-top: 1px solid #d0cfcf !important;
    margin-bottom:30px;
}
	 .col-md-12.custom-col {
    padding: 0px;
}
 </style>
<form role="form" name="myform" method="POST" >
<div class="log-inpart">
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec">
        <h2> Login </h2>
    <div class="col-md-12 custom-col">
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
        
        <div class="full"> <button class="btn logdv" name="sub" id="sub"> Login </button>
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