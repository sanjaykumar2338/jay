<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('includes/config.php');
$action = $_REQUEST['action'];

//Request Consult 
if($action == 'requestConsult' && isset($_POST['req_by_id'])){
	$req_by_id = $_POST['req_by_id'];
	$req_to_couselorID = $_POST['req_to_couselorID'];
	$date = date("Y-m-d h:i:s");
	$req_dismiss = 0;

	$sql = "INSERT INTO counselor_request (req_date, req_by_id, req_to_couselorID, req_dismiss)
	VALUES ('".$date."', '".$req_by_id."', '".$req_to_couselorID."', '".$req_dismiss."' )";

	if ($con->query($sql) === TRUE) {
	  echo "1";
	} else {
	  echo "Error: " . $sql . "<br>" . $con->error;
	}
}



//load unseen notification
if($action == 'lode_notification' && isset($_POST['view'])){
	print_r($_POST);
	$userid = $_POST['userid'];
	$sql = "SELECT * FROM `counselor_request` WHERE req_dismiss = 0 AND req_to_couselorID = '".$userid."' "; 
	$result_n = $con->query($sql);
	if ($result_n->num_rows > 0) {
	  echo $total_request = $result_n->num_rows;
	}
}


// responseToRequest
if($action == 'responseToRequest' && isset($_POST['req_id'])){
	$value = $_POST['value'];
	$userid = $_POST['userid'];	
	$req_id = $_POST['req_id'];	
	$date = date("Y-m-d h:i:s");


	$sql = "UPDATE counselor_request SET req_dismiss='".$value."', approval_status='".$value."',response_date_cnslr='".$date."' WHERE req_to_couselorId='".$userid."' AND req_id ='".$req_id."' ";
	if ($con->query($sql) === TRUE) {
	  echo "Record updated successfully";
	} else {
	  echo "Error updating record: " . $conn->error;
	}
}


if($action == "requestDissmiss" && isset($_POST['userType'])){	
	print_r($_POST);
	$userid = $_POST['userid'];
	$userType = $_POST['userType'];
	$req_ids = $_POST['value'];	

	$req_ids = implode(",",$req_ids);

	if($userType == "College_Counselor"){
		$userType = "req_to_couselorID";
		$col = "req_dismiss";
	}else{
		$userType = "req_by_id";
		$col = "req_dismiss_stu";
	}

	$sql = "UPDATE counselor_request SET ".$col."='1' WHERE ".$userType." ='".$userid."' AND req_id IN(".$req_ids.") ";
	if ($con->query($sql) === TRUE) {
		
		// //Notification -
		// if($userType == 'College_Counselor'): 
		//   $qry = "SELECT * FROM `counselor_request` WHERE req_dismiss = 0 AND req_to_couselorID = '".$userid."' ";
		// else:
		//   $qry = "SELECT * FROM `counselor_request` WHERE req_dismiss_stu = 0 AND approval_status IS NOT NULL  AND req_by_id = '".$userid."' ";
		// endif;

		// $result_n = $con->query($qry);
		// $total_request = 0;
		// if ($result_n->num_rows > 0) {
		//   $total_request = $result_n->num_rows;
		// }
		
		// $output = '<a class="dropdown-item d-flex align-items-center"> Notification not found </a>';
		// $data = array(
		//    'notification' => $output,
		//    'unseen_notification'  => $total_request
		// );

		// echo json_encode($data);
			  
	} else {
	  // echo "Error updating record: " . $conn->error;
	}
}

// Send Message
if($action == 'sendMessage' && isset($_POST['message'])){
	$from_id = $_POST['userid'];	
	// $userType = $_POST['userType'];	
	$to_id = $_POST['to_id'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$date = date("Y-m-d h:i:s");		

	$sql = "INSERT INTO counselor_dash_message (from_id, to_id, message, subject, `date`)
	VALUES ('".$from_id."', '".$to_id."', '".$message."', '".$subject."', '".$date."' )";

	if ($con->query($sql) === TRUE) {
	  echo "1";
	} else {
	  echo "0";
	}
}


// Replay Message
if($action == 'replyMessage' && isset($_POST['message'])){
	$from_id = $_POST['userid'];		
	$to_id = $_POST['to_id'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$reply_id = $_POST['reply_id'];
	$date = date("Y-m-d h:i:s");
	$sucess = $total_replay = 0;

	$sql = "INSERT INTO counselor_dash_message (from_id, to_id, message, subject, reply_id, `date`)
	VALUES ('".$from_id."', '".$to_id."', '".$message."', '".$subject."', '".$reply_id."', '".$date."' )";

	if ($con->query($sql) === TRUE) {
		$qry = "SELECT * FROM `counselor_dash_message` WHERE reply_id = '".$reply_id."'";
		$result_n = $con->query($qry);
		$total_replay = 0;
		if ($result_n->num_rows > 0) {
		  $total_replay = $result_n->num_rows;
		}
		$sucess = 1;
	  
	} else {
	  $sucess = 0;
	}

	$data = array(
	   'sucess' => $sucess,
	   'totalReplay'  => $total_replay . ' reply'
	);
	echo json_encode($data);
}


// dismiss Message
if($action == "messageDissmiss" && isset($_POST['userid'])){		
	$userid = $_POST['userid'];	
	$value = $_POST['value'];	

	$ids = implode(",",$value);

	$sucess = 0;
	$sql = "UPDATE counselor_dash_message SET dismiss ='1' WHERE Id IN(".$ids.") ";
	if ($con->query($sql) === TRUE) {
		$sucess = 1;
	}
	$data = array(
	   'sucess' => $sucess,	   
	);
	echo json_encode($data);
}

if($action == "addParners" && isset($_POST['username'])){
	

	
	$to =$_POST['email'];
	$subject = "Welcome New isuriz Partnership";
	$uname =$_POST['username'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$password =$_POST['password'];
	$phone =$_POST['phone'];
	$company =$_POST['company'];
	$street =$_POST['street'];
	$city =$_POST['city'];
	$state =$_POST['state'];
	$code =$_POST['code'];
	$contry =$_POST['country'];
	$primaryurl =$_POST['primaryurl'];
	$aff_id =rand(10,10000);
	
	$query = mysqli_query("SELECT username FROM Partnership WHERE username='"$uname"'");
	
	if (mysqli_rows($query) != 0)
  	{
     	echo "Username already exists";
  	}
	else {
	$sql ="INSERT INTO `Partnership` (`username`, `password`, `first_name`, `last_name`, `phone`, `company`, `street`, `city`, `state`, `postal_code`, `country`, `email`, `primary_url`, `aff_id`) 
	VALUES ( '$uname', '$password', '$fname', '$lname', '$phone', '$company', '$street', '$city', '$state', '$code', '$contry', '$to', '$primaryurl', '$aff_id')";}
	if(mysqli_query($con, $sql)){
		$message = "
			<html>
			<head>
			<title>Welcome New isuriz Partnership</title>
			</head>
			<body>
			<p>Welcome to the <a href='https://www.isuriz.com/'>isuriz.com</a> Partnership Program! Below are a few things you will want to become familiar with:</p>
			<p>1. You can log in to your Partnership account at<br>
			- Partnership account login: ".$uname."<br>
			- Forgot your password?<a href='https://www.isuriz.com/forgotpassword.php'>Reset Password.</a></p><br>
			2. To begin referring, use your referral link:
			<br>
			<a href='https://dev.isuriz.com/signup.php?aff_id=".$aff_id."'>dev.isuriz.com/signup.php?aff_id=".$aff_id."</a>

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
			// $headers .= 'Cc: isuriz@example.com' . "\r\n";

		//mail($to,$subject,$message,$headers);

		echo 1;
	

	
}

}


?>