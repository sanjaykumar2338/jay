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
    $mail->Host = 'mail.asuriz.com';
 	$mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'support@asuriz.com';
    $mail->Password = '3G5n2~nq';
	$mail->SMTPSecure = 'ssl';

    $mail->setFrom('support@asuriz.com','asuriz');
    $mail->AddAddress("support@asuriz.com", 'asuriz');  // Add a recipient
    $mail->AddBCC('jlefkovi2003@yahoo.com', 'asuriz');
	
  $mail->IsHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Contact asuriz';
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
<style>
   .send-part-box .socaldiv {
    padding-top: 20px;
    text-align: right;
}
   .send-part-box .socaldiv i {
    color: #019ff0;
}
   .afterDiv .send-part-box textarea#comment {
   height: 110px !important;
    font-size: 16px;
}
   @media(max-width:767px) {
      .send-part-box .socaldiv {
         text-align: left;
}
   }
</style>

<div class="banner inner-banner" style="background:url(images/contact-banner.jpg) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> Contact Us </h1>
    </div>
  </div>
</div>


<div class="send-part">
  <div class="container">
    <div class="afterDiv">
      <div class="send-part-box">
        <h3> Send us a Message </h3>
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
         <div class="col-md-6">
            <button type="submit" name="submit" class="SubmitDiov"> Submit </button>
         </div>
         
      </div>
		  </form>
    </div>
      
      </div>
      
  </div>
</div>

<?php include 'footer.php'; ?>

