<?php 
include 'header.php';
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
	$userid = $_SESSION['userid'];
	$name = mysqli_real_escape_string($con, $_POST["name"]);
	$emailid = $_POST["emailid"];
	if(isset($_POST['isclosed']))
	{
		$isclosed = 1;
	}
	else
	{
		$isclosed = 0;
	}
	$password = mysqli_real_escape_string($con, trim($_POST['password']));
	$cryptedpwd = encrypt_decrypt('encrypt', $password);
	$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND id != '$userid'  ");
	if(mysqli_num_rows($resdup2) > 0)
	{
		$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email ID already exists !!!</div>";
	}
	else{
		//insert
		$result = mysqli_query($con,"Update tbl_users Set name = '$name',emailid = '$emailid',password = '$cryptedpwd',`isclosed` = '$isclosed' Where id = '$userid'");
		if($result)
		{
			$_SESSION['first_name'] = $name;
			$_SESSION['password'] = $password;
			$_SESSION['emailid'] = $emailid;
			mysqli_query($con,"COMMIT");
			if($isclosed == 1)
			{
			echo "<script>window.location.href = 'logout.php';</script>";	
			}
			$errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your profile has been updated successfully .</div>";					
		}
		else
		{
			mysqli_query($con,"ROLLBACK");
			$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while inserting record !!!</div>";
		}
	}
}
 ?>
 <style>
 	input[type='checkbox']:checked:after,input[type='checkbox']:before {
 		display:none;
 	}
 	input[type="checkbox"] {
     -webkit-appearance: checkbox;
    -moz-appearance: checkbox;
    appearance: auto;
    width: 24px;
    height: 15px;
    background: none;
    box-shadow: none !important;
     }
.checkbox-label {
    display: inline-block;
        float: left;
    position: relative;
    margin: auto;
    cursor: pointer;
    font-size: 22px;
    line-height: 24px;
    height: 18px;
    width: 30px;
    clear: both;
}
.checkbox-label input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}
.checkbox-label .checkbox-custom {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 22px;
    width: 22px;
    background-color: transparent;
    border-radius: 5px;
  	transition: all 0.3s ease-out;
  	-webkit-transition: all 0.3s ease-out;
  	-moz-transition: all 0.3s ease-out;
  	-ms-transition: all 0.3s ease-out;
  	-o-transition: all 0.3s ease-out;
    border: 2px solid #FFFFFF;
}
.checkbox-label input:checked ~ .checkbox-custom {
    background-color: #019ff0;
    border-radius: 5px;
    -webkit-transform: rotate(0deg) scale(1);
    -ms-transform: rotate(0deg) scale(1);
    transform: rotate(0deg) scale(1);
    opacity:1;
    border: 2px solid #019ff0;
}
.checkbox-label .checkbox-custom::after {
    position: absolute;
    content: "";
    left: 12px;
    top: 12px;
    height: 0px;
    width: 0px;
    border-radius: 5px;
    border: solid #019ff0;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(0deg) scale(0);
    -ms-transform: rotate(0deg) scale(0);
    transform: rotate(0deg) scale(0);
    opacity:1;
  	transition: all 0.3s ease-out;
  	-webkit-transition: all 0.3s ease-out;
  	-moz-transition: all 0.3s ease-out;
  	-ms-transition: all 0.3s ease-out;
  	-o-transition: all 0.3s ease-out;
}
.checkbox-label input:checked ~ .checkbox-custom::after {
  -webkit-transform: rotate(45deg) scale(1);
  -ms-transform: rotate(45deg) scale(1);
  transform: rotate(45deg) scale(1);
  opacity:1;
  left: 8px;
  top: 3px;
  width: 4px;
  height: 10px;
  border: solid #019ff0;
  border-width: 0 2px 2px 0;
  background-color: transparent;
  border-radius: 0;
}
/* For Ripple Effect */
.checkbox-label .checkbox-custom::before {
    position: absolute;
    content: "";
    left: 10px;
    top: 10px;
    width: 0px;
    height: 0px;
    border-radius: 5px;
    border: 2px solid #019ff0;
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);	
}
.checkbox-label input:checked ~ .checkbox-custom::before {
    left: -3px;
    top: -3px;
    width: 22px;
    height: 22px;
    border-radius: 5px;
    -webkit-transform: scale(3);
    -ms-transform: scale(3);
    transform: scale(3);
    opacity:0;
    z-index: 999;
    transition: all 0.3s ease-out;
  	-webkit-transition: all 0.3s ease-out;
  	-moz-transition: all 0.3s ease-out;
  	-ms-transition: all 0.3s ease-out;
  	-o-transition: all 0.3s ease-out;
}
/* Style for Circular Checkbox */
.checkbox-label .checkbox-custom.circular {
    /*border-radius: 50%;*/
    border: 2px solid #019ff0;
}
.checkbox-label input:checked ~ .checkbox-custom.circular {
    background-color: #019ff0;
   /* border-radius: 50%;*/
    border: 2px solid #019ff0;
}
.checkbox-label input:checked ~ .checkbox-custom.circular::after {
    border: solid #fff;
    border-width: 0 2px 2px 0;
}
.checkbox-label .checkbox-custom.circular::after {
    border-radius: 50%;
}
.checkbox-label .checkbox-custom.circular::before {
    border-radius: 50%;
    border: 2px solid #FFFFFF;
}
.checkbox-label input:checked ~ .checkbox-custom.circular::before {
    border-radius: 50%;
}
.updateprofile_emailid{
    margin-bottom: 3px !important;
}
.apj_update_form small{
        float: left;
            text-align: left;
}
.apj_update_form label{
    font-weight: 400;
    float: left;clear: both;
    margin-bottom: -3px;
}
.log-inpart-sec .form-control {
    padding: 22px 0;
}
.log-inpart-sec .logdv {
    margin: 20px 0 -2px 0;
}
 </style>
<div class="log-inpart">
<form role="form" name="myform" id="idForm" method="POST" >
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec">
        <h2> Settings </h2>
		<div class="col-md-12">
				<?php echo $errormsg; ?>
			</div>
        <div class="form-group apj_update_form">
        	<label for="name">Name</label>
          <input type="text" class="form-control" placeholder="Name" id="name"  value="<?php echo $_SESSION['first_name']; ?>" name="name" required>
        </div>
        <div class="form-group apj_update_form">
        	<label for="emailid">Email</label>
          <input type="text" class="form-control updateprofile_emailid" placeholder="Email" value="<?php echo $_SESSION['emailid']; ?>" id="emailid"  name="emailid" readonly>
          <!--<small>( To update your email, <a href="contact-us.php">click here</a> to contact us and someone would be glad to assist you. )</small>-->
        </div>
       <div class="form-group apj_update_form">
       	<label for="password" style="    margin-top: 14px;">Password</label>
          <input type="password" class="form-control" placeholder="Password"  value="<?php echo $_SESSION['password']; ?>"  id="password" name="password" required>
        </div>
		   <div class="form-check">
			<!-- <input type="checkbox" class="form-check-input" id="isclosed" name="isclosed" >
			<label class="form-check-label" for="isclosed">Close Account</label> -->
			<div class="checkbox-container circular-container" style="margin-top: 20px;">
        <label class="checkbox-label" for="isclosed">
            <input type="checkbox" id="isclosed" name="isclosed">
            <span class="checkbox-custom circular"></span>
        </label>
          <label class="form-check-label" for="isclosed" style="font-size: 17px;float: left;">Deactivate Account</label>
        </div>
		  </div>
        <div class="full"><button class="btn logdv" name="sub" id="sub"> Update </button>
        <a class="btn logdv" href="dashboard.php"> Cancel </a>
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
		});
	});
  </script>