<?php
include('includes/config.php');
session_start();


if($_COOKIE['refferal_id']) {
 	$affid = $_COOKIE['refferal_id'];
	$token = $_GET["token"];
	$id = $_GET["id"];
	//check if any records exists with same token and id
	$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE token = '$token' AND id = '$id' AND is_email_verified = '0' ");
	if(mysqli_num_rows($resdup2) > 0){   
	
		$sql ="SELECT * FROM `commission` WHERE from_id='$affid'";
		$comm =mysqli_query($con, $sql);   
	 if(mysqli_num_rows($comm) > 0){	   
	   $row =mysqli_fetch_array($comm);
	   $id3 =$_GET['id'];
   
	  if($row['from_id'] == $affid && $resdup2 == true) {
		  
		if($row['registed_id'] != $id3) {
		   
	  $inc_from =$row['credits'] + 1;
	  $idd =$row['id'];
			 
	  $sql2 = "UPDATE `commission` SET credits='$inc_from', registed_id=$id3 WHERE id=$idd";
	 if(mysqli_query($con, $sql2)){
	 
		 
	 }
		 }
   }

	 }
   }
   else{
	$sqll ="INSERT INTO `commission` (`id`, `from_id`, `credits`, `registed_id`) VALUES (NULL, '$affid', '1', `$id3`)";
	
	$query =mysqli_query($con, $sqll);

	}
}
	
if (isset($_SESSION['id'])) {
    session_destroy();
}

$errormsg = '';
$token = $_GET["token"];
$id = $_GET["id"];
//check if any records exists with same token and id
$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE token = '$token' AND id = '$id' AND is_email_verified = '0' ");
if(mysqli_num_rows($resdup2) > 0)
{
	//update email verified flag
	$sql = "UPDATE `tbl_users` SET `is_email_verified` = '1' where `id` = '$id';";
	$result = mysqli_query($con,$sql);
	if($result == 1)
	{
		$errormsg = "<div class='col-md-12 icon-check'><i class='fa fa-check' aria-hidden='true'></i></div><div class='col-md-12 err-msg'><h2>Email Verified</h2></div><div class='col-md-12 desc-msg'><p>Your Isuriz account was successfully activated.</p></div><div class='col-md-12 login-link'><a class='btn mybluebtn' href='login.php'>Click here to login</a></div>";		
	}
	else
	{
		$errormsg = "<div class='col-md-12 icon-check invalid-error'><i class='fa fa-times' aria-hidden='true'></i></div><div class='col-md-12 err-msg'><h2>Error</h2></div><div class='col-md-12 desc-msg'><p>Error updating database!</p></div>";
	}	
}
else
{
	$errormsg = "<div class='col-md-12 icon-check invalid-error'><i class='fa fa-times' aria-hidden='true'></i></div><div class='col-md-12 err-msg'><h2>Error</h2></div><div class='col-md-12 desc-msg'><p>Your activation link has expired and is no longer valid. You can <a href='https://www.isuriz.com/signup.php'>click here</a> to create an account to obtain a new activation link.</p></div>";
}

if(isset($_COOKIE['affreal_id']) ){
	$id = $_GET["id"];
	$affreal_id =$_COOKIE['affreal_id'];
	$sql = "SELECT credits FROM `Partnership` WHERE `aff_id` = ".$affreal_id;	
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$credits = $row['credits'];
		$credits = $credits + 1;
		$sql = "UPDATE Partnership SET credits='".$credits."' WHERE aff_id=".$affreal_id;
		if ($con->query($sql) === TRUE) {
			// provide user commision 
			$sqll ="INSERT INTO `commission` (`from_id`, `credits`, `registed_id`) VALUES ('$affreal_id', '5', '$id')";
			if ($con->query($sqll) === TRUE) {
			  //unset($_COOKIE['affreal_id']);
				setcookie('affreal_id', "", time()-3600);
				
			}
		} 
		
	}   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Verify User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Custom CSS -->
	<link href="css/site.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  
</head>
<body>
<!-- success/error alert after email verify -->
	<div class="verify-email">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
					<div class="verify-wrapper">
						<div class="white-wrapper">
							<?php
								echo $errormsg; 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>
<?php
include('includes/close.php');
?>