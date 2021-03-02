<?php
session_start();
include 'header.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$_SESSION['userid'];
$errormsg = '';
if(isset($_POST['submit'])){
   $invite =$_SESSION['emailid'];
   $studentName = $_POST['name'];
	$to =$_POST['email'];
   $userName = $_SESSION['first_name'];
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
    
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     <title>A Simple Responsive HTML Email</title>
     <style type="text/css">
     body {margin: 0; padding: 0; min-width: 100%!important;}
     img {height: auto;}
     .content {width: 100%; max-width: 600px;}
     .innerpadding {padding: 30px 30px 30px 30px;}
     .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
     .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
     .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
     .bodycopy {font-size: 16px; line-height: 22px;}
     .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
     .button a {color: #ffffff; text-decoration: none;}
     @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
     body[yahoo] .hide {display: none!important;}
     body[yahoo] .buttonwrapper {background-color: transparent!important;}
     body[yahoo] .button {padding: 0px!important;}
     body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
     body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
     }
     </style>
   </head>
   
   <body yahoo bgcolor="#131416" style="padding-top: 50px;">
   <table width="100%" bgcolor="#131416" border="0" cellpadding="0" cellspacing="0">
   <tr>
     <td>  
       <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">     
         <tr>
           <td class="innerpadding">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td class="h2">
                   Hi '.$_POST['name'].',
                 </td>
               </tr>
               <tr>
                 <td class="bodycopy" style="font-weight: 500;">
                   This is dev. I’d like to invite you to join Isuriz, an online college list builder and college planning technology company. This could be a great resource in your college planning efforts.
                 </td>
               </tr>
             </table>
           </td>
         </tr>
         <tr>
           <td class="innerpadding">
             <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
               <tr>
                 <td>
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <td class="bodycopy">
                         <span style="color: gray;" >Message from '.$_SESSION['first_name'].' :</span>
                         '.$_POST['message'].'
                       </td>
                     </tr>
                     <tr>
                       <td style="padding: 20px 0 0 0; ">
                         <table class="buttonwrapper" bgcolor="#019ff0" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td class="button" height="45">
                               <a href="https://dev.isuriz.com/signup.php?aid='.$_SESSION['userid'].'">Click this link to accept the invite
                              </a>
                             </td>
                           </tr>
                         </table>
                       </td>
                     </tr>
                   </table>
                 </td>
               </tr>
             </table>        
           </td>
         </tr>
         
         <tr>
           <td class="innerpadding bodycopy">
             If you cannot click on the link, copy and paste the URL into your browser :  <br />
             <a href="https://dev.isuriz.com/signup.php?aid='.$_SESSION['userid'].'" style="color: gray;">https://dev.isuriz.com/signup.php?aid='.$_SESSION['userid'].'</a>
   
           </td>
         </tr>
        
       </table>
       </td>
     </tr>
   </table>
   </body>
   </html>
   
   
   ';
	$mail = new PHPMailer(); // create a new object
  	$mail->IsSMTP();
    $mail->Host = 'mail.isuriz.com';
 	$mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username ='support@isuriz.com';
    $mail->Password = '3G5n2~nq';
	$mail->SMTPSecure = 'ssl';

    $mail->setFrom('support@isuriz.com','isuriz');
    
    $mail->AddAddress($to, 'isuriz');  // Add a recipient
    $mail->AddBCC($to, 'isuriz');
	
	  $mail->IsHTML(true);                                  // Set email format to HTML

	  $mail->Subject = 'Invitation to Join Isuriz';
	  $mail->Body = $message;
	
  if(!$mail->send()) {
				//mysqli_query($con,"ROLLBACK");
				$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Mail not send ,please try again</div>";				
			} else {
				//mysqli_query($con,"COMMIT");
            header( "refresh:4;url=dashboard-invite.php" );
				$errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Your invitation has been successful sent.</div>";
			}
	
 }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>Isuriz</title>
      <!-- =============== VENDOR STYLES ===============-->
      <!-- FONT AWESOME-->
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">
      <!-- SIMPLE LINE ICONS-->
      <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
      <!-- ANIMATE.CSS-->
      <link rel="stylesheet" href="vendor/animate.css/animate.css">
      <!-- WHIRL (spinners)-->
      <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
      <!-- =============== PAGE VENDOR STYLES ===============-->
      <!-- WEATHER ICONS-->
      <link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">
      <!-- =============== BOOTSTRAP STYLES ===============-->
      <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
      <!-- =============== APP STYLES ===============-->
      <link rel="stylesheet" href="css/app.css" id="maincss">
      <link rel="stylesheet" href="css/dashboard.css" >
      <!-- Custom CSS -->
      <link href="css/site.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <style>
      .clickbtn:hover{
         cursor:pointer;
         color:blue;
      }
      </style>
   </head>
   <body>
<!-- Modal show premium features -->
      <div class="modal fade" id="invitePrime" role="dialog">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title" id="exampleModalLabel">Premium features</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               <div class="primefeatures">
                  <ul>
                     <li><i class="fas fa-check mr-2"></i> Easily share your college list with others with a click of a button.</li>
                     <li><i class="fas fa-check mr-2"></i> Gain access to numerous advanced search filters to help find the right college.</li>
                     <li><i class="fas fa-check mr-2"></i> Receive priority when contacting Isuriz with a support need.</li>
                  </ul>
               </div>
               </div>
            </div>
         </div>
      </div>
         <!--modal end-->

      <div class="wrapper">
         <!-- top navbar-->
         <header class="topnavbar-wrapper theme-custom-header">
            <!-- START Top Navbar-->
            <nav class="navbar topnavbar">
               <!-- START navbar header-->
               <div class="navbar-header mr-auto">
                  <?php 
					if (!isset($_SESSION['userid'])) {
						echo '<a class="navbar-brand" href="index.php">';
					}
					else{
						echo '<a class="navbar-brand" href="dashboard.php">';
					}
					?>
                     <div class="brand-logo"><img class="img-fluid" src="https://isuriz.com/images/logo.png" alt="App Logo" ></div>
                     <div class="brand-logo-collapsed"><img class="img-fluid" src="images/collapse-logo.png" alt="App Logo"></div>
                  </a>
               </div>
               <!-- END navbar header-->
               <!-- START Left navbar-->
               <ul class="navbar-nav mr-auto flex-row both-toggle-btn">
                  <li class="nav-item">
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="javascript:void(0);" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a class="nav-link sidebar-toggle d-md-none" href="javascript:void(0);" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a>
                  </li>
                  <!-- START User avatar toggle-->
                  <!-- <li class="nav-item d-none d-md-block"> -->
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <!-- <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse"><em class="icon-user"></em></a>
                  </li> -->
                  <!-- END User avatar toggle-->
               </ul>
               <!-- END Left navbar-->

               <!--user status-->
                <div class="user-status">
                  <?php 
                    $id =$_SESSION['userid'];
                     $sql ="SELECT * FROM `commission` WHERE `from_id` =$id";
                     $qu =mysqli_query($con, $sql);
                     if(mysqli_num_rows($qu) > 0){
                       $row =mysqli_fetch_array($qu);  
                        if($row['credits'] >4) {  ?>    
                          <!-- <em class="fa fa-user-check"></em> -->
                          <i class="fas fa-user-circle"></i>
                        <?php echo "<span>Premium</span> <span>Account</span>"; 
                         }else {?>
                          <!-- <em class="fa fa-user"></em> -->
                          <i class="fas fa-user-circle"></i>
                        <?php echo "<span>Basic</span> <span>Account</span>";?>
                        <?php  } }else{ ?>
                           <i class="fas fa-user-circle"></i>
                           <span>Basic</span> <span>Account</span>
                        <?php
                        }
                        
                        ?> 
                     </div>   
               <!--end user status-->

               <!-- START Right Navbar-->
               <ul class="navbar-nav flex-row">
                  <!-- Search icon-->
                  <li class="nav-item logout-li"><a class="nav-link logout" href="logout.php" data-search-open="">Logout</a></li>
                  <!-- Fullscreen (only desktops)-->
                  <!-- START Offsidebar button-->
               </ul>
               <!-- END Right Navbar-->
            </nav>
            <!-- END Top Navbar-->
         </header>
         <!-- sidebar-->
         <aside class="aside-container">
            <!-- START Sidebar (left)-->
            <div class="aside-inner">
               <nav class="sidebar" data-sidebar-anyclick-close="">
                  <!-- START sidebar nav-->
                  <ul class="sidebar-nav">
                     <!-- START user info-->
                     <!-- <li class="has-user-block">
                        <div class="collapse show" id="user-block">
                           <div class="item user-block">
                              <!-- User picture-->
                              <!-- <div class="user-block-picture">
                                 <div class="user-block-status">
                                    <img class="img-thumbnail rounded-circle" src="images/user.png" alt="Avatar" width="60" height="60">
                                    <div class="circle bg-success circle-lg"></div>
                                 </div>
                              </div> -->
                              <!-- Name and Job-->
                              <!-- <div class="user-block-info"><span class="user-block-name">Hello, Arul</span><span class="user-block-role">Designer</span></div>
                           </div>
                        </div>
                     </li> -->
                     <!-- END user info-->
                     <!-- Iterates over all sidebar items-->
                     <li class="nav-heading "><span data-localize="sidebar.heading.HEADER">Main Navigation</span></li>
                     <li class="">
                        <a href="dashboard.php" title="Dashboard" >
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                        </a>
                     </li>
                     <li class="">
                        <a href="my-college-list.php" title="My College List" >
                        <em class="fas fa-list"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">My College List</span>
                        </a>
                     </li>
                     <li class=" ">
                        <a href="form2.php" title="Edit Profile">
                        <em class="icon-note"></em>
                        <span data-localize="sidebar.nav.WIDGETS">Edit Profile</span>
                        </a>
                     </li>
                     <!--<li class=" ">
                        <a href="#layout1" title="Find a College">
                        <em class="fab fa-wpexplorer"></em>
                        <span>Find a College</span>
                        </a>
                     </li>
                     <li class=" ">
                        <a href="#layout1" title="Launch List Builder">
                        <em class="far fa-folder-open"></em>
                        <span>Launch List Builder</span>
                        </a>
                     </li>-->
                     <li class="">
                        <a href="dashboard-contact-us.php" title="Contact Us">
                        <em class="fas fa-ticket-alt"></em>
                        <span>Contact Us</span>
                        </a>
                     </li>
                     <li class="active">
                        <a href="dashboard-invite.php" title="Invite Students">
                        <em class="fas fa-ticket-alt"></em>
                        <span>Invite Students</span>
                        </a>
                     </li>
					  <li>
                        <a href="testimonial.php" title="Testimonial">
                           <em class="fa fa-star"></em>
                           <span>Write Testimonial</span>                     
                        </a>                    
                     </li>
                     <li class=" ">
                        <a href="dashboard-updateprofile.php" title="Settings">
                        <em class="icon-settings"></em>
                        <span>Settings</span>
                        </a>
                     </li>
					 <!--
					  <li>
                        <a href="counselor-dashboard.php" title="Settings">
                           <em class="fa fa-globe"></em>
                           <span>College Counselor Hub</span>                        
                        </a>                    
                     </li> 
					 -->
                     <li class=" ">
                        <a href="logout.php" title="Logout">
                        <em class="icon-lock"></em>
                        <span>Logout</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END sidebar nav-->
               </nav>
            </div>
            <!-- END Sidebar (left)-->
         </aside>
         <section class="section-container">
            <!-- Page content-->
            <div class="content-wrapper">
               <div class="content-heading" id="welcometext-div">
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a;text-align:left !important;">Invite Students</h3>
                     <span style="font-size: 14px;"></span><small data-localize="dashboard.WELCOME"></small></div>
                  </div>
         
               <div class="row">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                           <div class="mycontactus form-wrap mydashboardContact mb-4">
                           <div class="row">
                              <div class="col-xl-12 col-sm-12">
                               <div class="row">
                               <div class="col-12"><?php echo $errormsg; ?></div>
                               </div>
                              <form method="post" class="dashboard-contactus form-white-box">
                                   <div class="row">
                                     <div class="col-12 col-xl-4">
                                       <div class="user-complete-progress">
                                       <p class="invite-intro">Invite students to join Isuriz and unlock premium features after 5 students have joined. <a href="#" data-toggle="modal" data-target="#invitePrime">Click here</a> to see amazing benefits you can receive with a premium account.</p>
									               <?php 
															$id =$_SESSION['userid'];
															$sql ="SELECT * FROM `commission` WHERE from_id= $id";  
														   $query =mysqli_query($con, $sql);
													      if(mysqli_num_rows($query) > 0) {
                                                $row =mysqli_fetch_array($query);
                                                echo "<div class='d-flex my-5'><h2 class='mr-4'>Your Progress</h2><h2>".$row['credits']."/5</h2></div>";
                                             }
                                             else{
                                                echo "<div class='d-flex my-5'><h2 class='mr-4'>Your Progress</h2><h2>0/5</h2></div>";
                                             }
														?>
                                       </div>
                                       <div class="user-invite-form">
                                       <div class="form-group">
                                          <input type="text"  name="name" class="form-control mb-3" placeholder="Name" id="name" required >
                                       </div>
                                       <div class="form-group">
                                          <input type="email"  name="email" class="form-control mb-3" placeholder="Email" id="usr"  required>
                                       </div>
                                       <div class="form-group">
                                          <textarea id="w3review" name="message" rows="4" class="form-control"  placeholder="Message"></textarea>
                                       </div>
                                       <div class="">
                                          <button type="submit" name="submit" value="Invite" class="SubmitDiov blueBtnBig blue-border">Invite </button>
                                       </div>

                                       </div>
									         </div>

                                    
                                    <div class="col-12 col-xl-8">
                                    <div class="invite-preview h-100">
                                       <div class="preview-icon">
                                          <img class="img-fluid" src="/images/email-icon.png">
                                       </div>
                                       <div class="form-group preview-content showhide mb-0" style="border:2px solid #f2f2f2; padding:30px;">
                                          <div class="preview-title">
                                             <h2>Email Invitation Template</h2>
                                          </div>
                                          <table width="100%" cellpadding="0" cellspacing="0">
                                             <tr>
                                                <td>  
                                                   <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">     
                                                      <tr>
                                                         <td class="innerpadding">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                               <tr>
                                                                  <td class="h2">
                                                                     <h2 style="font-size:24px; font-weight:bold;">Hi (Recipient’s name),</h2>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td class="bodycopy" style="font-weight: 500;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
                                                                  This is (Sender’s Name). I’d like to invite you to join Isuriz, a dynamic and innovative online college list builder. This could be a great resource in your college planning efforts. You should check it out!
                                                                  </td>
                                                               </tr>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="innerpadding">
                                                            <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
                                                               <tr>
                                                                  <td>
                                                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                           <td class="bodycopy body-msg" style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;padding-top:40px;">
                                                                              <span style="color:gray;" >Message from (Sender’s Name) : You can write an optional personal message here.</span>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="padding: 20px 0 0 0; ">
                                                                              <table class="buttonwrapper email-btn-wrap" bgcolor="#019ff0" border="0" cellspacing="0" cellpadding="0">
                                                                                 <tr>
                                                                                    <td class="button" height="45">
                                                                                       <a style="color:white;padding: 0px 30px;font-weight: bold;" href="#">Accept Invite
                                                                                       </a>    
                                                                                    </td>
                                                                                 </tr>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                            </table>        
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="innerpadding bodycopy" style="padding-top: 40px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
                                                         If you can not click on the link, copy and paste the URL into your browser :<br />
                                                            <span style="color: #019ff0; text-decoration:underline;">https://isuriz.com/signup.php?aid=userid</span>
                                                         </td>
                                                      </tr>
                                                   </table>
                                                </td>
                                             </tr>
                                          </table>
               
                                       </div>
                                    </div>
                                 </div> <!--end col-->
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
               <!-- Page footer-->
               <footer>
                  <div class="container">
                     <div class="socaldiv"> <a href="https://www.facebook.com/Isuriz-102213118305822"> <em class="fa-2x mr-2 fab fa-facebook-f"></em> </a> <a href="https://twitter.com/IsurizLLC"> <em class="fa-2x mr-2 fab fa-twitter"></em> </a> 
           <!--<a href=""> <em class="fa-2x mr-2 fab fa-youtube"></em> </a>-->
           <a href="https://www.instagram.com/isurizllc"><em class="fa-2x mr-2 fab fa-instagram"></em> </a> </div>
                     <div class="fotdiv">
                        <ul>
                           <li><a href="about.php"> About Us </a> </li>
                          <li><a href="blog.php">Blog </a> </li>
                           <li><a href="contact-us.php"> Contact Us </a> </li>
                           <li><a href="careers.php"> Careers </a> </li>
                           <li><a href="privacy-policy.php"> Privacy Policy </a> </li>
                           <li><a href="terms-of-use.php"> Terms of Use </a> </li>
                        </ul>
                        <p> © 2021 Isuriz, LLC. All Rights Reserved. </p>
                     </div>
                  </div>
               </footer>
               <!-- End Page footer-->
            </div>
         </section>
      </div>
      <!-- =============== VENDOR SCRIPTS ===============-->
      <!-- MODERNIZR-->

  


      
      <script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
      <script src="vendor/js-storage/js.storage.js"></script><!-- SCREENFULL-->
      <script src="vendor/screenfull/dist/screenfull.js"></script><!-- i18next-->
      <script src="vendor/i18next/i18next.js"></script>
      <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
      <script src="vendor/jquery/dist/jquery.js"></script>
      <script src="vendor/popper.js/dist/umd/popper.js"></script>
      <script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
      <!-- SLIMSCROLL-->
      <script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script><!-- SPARKLINE-->
      <script src="vendor/jquery-sparkline/jquery.sparkline.js"></script><!-- FLOT CHART-->
      <script src="vendor/flot/jquery.flot.js"></script>
      <script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
      <script src="vendor/flot/jquery.flot.resize.js"></script>
      <script src="vendor/flot/jquery.flot.pie.js"></script>
      <script src="vendor/flot/jquery.flot.time.js"></script>
      <script src="vendor/flot/jquery.flot.categories.js"></script>
      <script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script><!-- EASY PIE CHART-->
      <script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script><!-- MOMENT JS-->
      <script src="vendor/moment/min/moment-with-locales.js"></script><!-- =============== APP SCRIPTS ===============-->
      <script src="js/app.js"></script>
      <script>
      jQuery(document).ready(function(){
         
         jQuery(".clickbtn").click(function(){
            event.preventDefault();
         jQuery(".showhide").toggle(600);
      });
      });
      </script>
   </body>
</html>

