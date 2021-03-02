<?php 
include 'header-dashboard.php'; 
//include('includes/config.php');
require 'includes/class.phpmailer.php';
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];

$message = '';
$errormsg = '';
if(isset($_POST['submit'])){
   $fname = $_POST["fname"];
   $lname=$_POST["lname"];
   $email = $_POST["email"];
   $phone=$_POST["phone"];
   $message= 'Name:'.$fname. '<br> Email:' .$email.'<br>Phone:'.$phone.'<br>Message:' .$_POST["msg"]; 
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

  $mail->Subject = 'Contact isuriz from counselor dashboard';
  $mail->Body = $message;
  
  if(!$mail->send()) {
        //mysqli_query($con,"ROLLBACK");
        $errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Mail not send ,please try again</div>";        
  } else {
        //mysqli_query($con,"COMMIT");
        $errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Your message has been successfully sent.</div>";
  }
}
   
?>

<style type="text/css"> 

.widget-26-contact-info .btn{
    padding: 10px 16px !important;
    border: 0px;
    min-width: 175px;
    color: #fff;
    border-radius: 27px;
    
}
.btn.yellow {
    background: #e5c300;
}
.btn.green {
    background: #00c851;
}
.widget-26-contact-info {
    padding: 0px 20px;
    text-align:center;
    padding-top: 22px;
}


.result-list {
    border-top: 1px solid #ddd;
    padding: 20px;
}
.result-list:hover {
    background: #9e9e9e0a;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
}
.txt-blue{
    color: #019ff0;
}

.txt-black-01{
    font-weight: 600;
    color: #3a3a3a;
}



@media only screen and (max-width: 768px) {
  /* For mobile phones: */
    .result-list {
     text-align: center;    
    }
    .widget-26-contact-info {      
        padding-top: 10px;
    }

}


</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Contact Us</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
      <div class="col-md-12"><?php echo $errormsg; ?></div>
      <!-- Counselor List -->
      <form method="post">
        <div class="row">
          <div class="col-md-6">
       
            <div class="form-group">
              <input type="text" name="fname" class="form-control" placeholder="First Name" id="fname"  required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="lname" class="form-control" placeholder="Last Name" id="lastName">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email"  name="email" class="form-control" placeholder="Email" id="email" required >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="Phone Number" id="phone" required >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea class="form-control" name="msg" rows="5" placeholder="Type your message here..." id="comment"  required></textarea>
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

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<?php include 'footer-dashboard.php'; ?>
