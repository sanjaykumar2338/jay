<?php
include 'header.php';

$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($con->connect_errno) {
    die("Database selection failed: " . mysqli_error());
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
   </head>
   <body>
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
                     if(mysqli_num_rows($qu) >= 0){
                       $row =mysqli_fetch_array($qu);  
                        if($row['credits'] >4) {  ?>    
                          <!-- <em class="fa fa-user-check"></em> -->
                          <i class="fas fa-user-circle"></i>
                        <?php echo "<span>Premium</span> <span>Account</span>"; 
                         }else {?>
                          <!-- <em class="fa fa-user"></em> -->
                          <i class="fas fa-user-circle"></i>
                        <?php echo "<span>Basic</span> <span>Account</span>";?>
                        <?php  } } ?> 
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
                           <div class="item user-block">-->
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
                     <li>
                        <a href="dashboard-contact-us.php" title="Contact Us">
                        <em class="fas fa-ticket-alt"></em>
                        <span>Contact Us</span>
                        </a>
                     </li>
                     <li class="">
                        <a href="dashboard-invite.php" title="Contact Us">
                        <em class="fas fa-ticket-alt"></em>
                        <span>Invite Students</span>
                        </a>
                     </li>
                     <li class="active">
                        <a href="testimonial.php" title="Testimonial">
                        <em class="fas fa-star"></em>
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
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Write Testimonial</h3><small data-localize="dashboard.WELCOME"></small></div>
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
                    <!-- START dashboard main content-->
                      <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                        <section class="write-review">
    <div class="">
   		<div class="row">
      		<div class="col-xs-12 col-md-12 col-lg-6">
               <div class="w-review-wrapper">
                 
                  <form action="" method="POST" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="email" name="email" placeholder="Email" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="text" name="school_name" placeholder="School Name" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12 col-sm-4">
                           <div class="form-group">
                              <input class="form-control" type="text" name="city" placeholder="City" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="form-group">
                              <input class="form-control" type="text" name="state" placeholder="State" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="form-group">
                              <input class="form-control" type="text" name="graduation_year" placeholder="Graduation Year" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                           <textarea class="form-control" name="testimonial" rows="5" name="testimonial" placeholder="Type your testimonial here..." required></textarea>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <label>Upload Your Photo</label>
                           <input class="form-control mb-0" type="file" name="filename" id="uploadPhoto" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12">
                           <div class="form-group mb-0">
                              <button class="btn mybluebtn" name="submit" id="sub"> Submit </button>
                           </div>
                        </div>
                     </div>                     

                  </form>
                 <?php 
if(isset($_POST['submit'])){
   $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
   $school_name = $_POST['school_name'];
   $city = $_POST['city'];
   $state = $_POST['state'];
    $graduation_year = $_POST['graduation_year'];
	$testimonial = $_POST['testimonial'];
	$filename = $_POST['filename'];
	
// file uplads
				   
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["filename"]["name"];
        $filetype = $_FILES["filename"]["type"];
        $filesize = $_FILES["filename"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            //if(file_exists("upload/" . $filename)){
                //echo $filename . " is already exists.";
           // } else{
                move_uploaded_file($_FILES["filename"]["tmp_name"], "upload/" . $filename);
                echo "";
            //} 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["filename"]["error"];
    }
}	
	
// Insert data into database.

	$sql = "INSERT INTO `testimonials` (first_name, last_name, email, school_name, city, state, graduation_year, testimonial, filename) VALUES ('$first_name', '$last_name', '$email', '$school_name', '$city', '$state', '$graduation_year', '$testimonial', '$filename')";
	
	if ($con->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

	//Send Mail.
	
	$to = "jlefkovi2003@yahoo.com"; // this is your gmail address 
   	$from = $_POST['email']; // this is the sender's gmail address
	
	$message = "Full Name: " .$first_name. " " .$last_name. "\n\n Email: "  .$email. "\n\n School Name: "  .$school_name. "\n\n City: "  .$city. "\n\n State: "  .$state. "\n\n Graduation Year: "  .$graduation_year. "\n\n Testimonial: "  . $testimonial. "\n\n Uploaded File: " . $filename;
    $headers = "From:" . $from;
   $headers2 = "From:" . $to;
   mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);  // sends a copy of the message to the sender
     echo "Thank you " . $first_name . ", for your review.";
//     // You can also use header('Location: thank_you.php'); to redirect to another page.
	
	
}
 $con->close();
	            
?> 
               </div>
            </div>
         </div>
      </div>
</section>
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
   </body>
</html>

