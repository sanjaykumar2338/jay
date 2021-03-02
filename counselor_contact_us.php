<?php
include_once 'header-dashboard.php';
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
<div class="container-fluid">
    <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading" id="welcometext-div">
                <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Send Us a Message</h3><small data-localize="dashboard.WELCOME"></small></div>
            </div>

            <!--
            <div class="row">
               <div class="col-xl-2 col-lg-6 col-md-3">

               </div>
               <div class="col-xl-8 col-md-6 home-search-bar">

                  <form action="#!" style="width: 100%">
                     <div class="input-group">
                        <input class="form-control form-control-lg" type="text" placeholder="Search for a College by Name"><span class="input-group-btn">
                        <button class="btn btn-secondary btn-lg" type="submit"><i class="fa fa-search"></i></button></span>
                     </div>
                  </form>


               </div>
               <div class="col-xl-2 col-lg-6 col-md-3">

               </div>
            </div>
             -->
            <div class="row">
                <!-- START dashboard main content-->
                <div class="col-xl-12">
                    <!-- START -->
                    <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                            <div class="mycontactus form-wrap mydashboardContact">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12">
                                        <div class="row"><div class="col-md-12"><?php echo @$errormsg; ?></div></div>
                                        <form method="post" class="dashboard-contactus form-white-box">
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
                                                <div class="col-md-6 submit-center-xs">
                                                    <button type="submit" name="submit" class="SubmitDiov btn btn-primary mt-30 mb-30"> Submit </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
            <!-- END dashboard main content-->
            <!-- START dashboard sidebar-->
        </div>
</section>
</div>
<?php include 'footer-dashboard.php'; ?>


