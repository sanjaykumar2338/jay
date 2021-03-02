<?php
 session_start();
 include('includes/config.php');
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
	   <link rel="stylesheet" href="css/site.css" id="maincss">
      <link rel="stylesheet" href="css/app.css" id="maincss">
      <link rel="stylesheet" href="css/dashboard.css" >
   </head>
   <body>
   <?php 

   
   ?>
      <div class="wrapper">
         <!-- top navbar-->
         <header class="topnavbar-wrapper">
            <!-- START Top Navbar-->
            <nav class="navbar topnavbar">
               <!-- START navbar header-->
               <div class="navbar-header">
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
               <ul class="navbar-nav mr-auto flex-row">
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
               <!-- START Right Navbar-->
               <ul class="navbar-nav flex-row">
                  <!-- Search icon-->
                  <!-- <li class="nav-item logout-li">
                  <a class="nav-link logout" href="partner-logout.php" data-search-open="">Logout</a></li> -->
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
                 
                  <!-- END sidebar nav-->
               </nav>
            </div>
            <!-- END Sidebar (left)-->
         </aside>
         <section class="section-container">
            <!-- Page content-->

            <?php
            $id = $_GET['id'];
            if(empty($id)):
               echo "Invalid traking id";

            else:            
            $sql = "SELECT * FROM `Partnership` WHERE id =".$id;
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $first_name = $row['first_name'];
               $last_name = $row['last_name'];
               $aff_id = $row['aff_id'];
               
            }
            ?>
            <div class="content-wrapper">
               <div class="content-heading" id="welcometext-div">
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Welcome, <span style="color:#019ff0"><?php echo $first_name; ?>!</span></h3><small data-localize="dashboard.WELCOME"></small></div>
               </div>
			   
           
               <div class="row">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card mb-4" >
                        <div class="card-header grid-card-header">
                           <div class="row">
						   <div class="col-xl-3 text-center" >
                     <?php
                   
                     $sq2 ="SELECT * FROM `partner` WHERE partner_id=$aff_id";
                     $q1 =mysqli_query($con, $sq2);
                     if(mysqli_num_rows($q1)> 0){								
                     while($row =mysqli_fetch_array($q1)){ ?>
                      <h3 style="border: 2px solid #019ff0;padding: 10px; width:40px;border-radius: 50%;background-color:#019ff0;color:white;"> <?php echo $row['credits'];?></h3><span style="padding:0px; color:#019ff0;">Number of user signup with your link</span><br>
                   <?php  }}
                     ?>
                     </div>
						   <div class="col-xl-6">
						   <table class="table  ">
									
							  <?php 
							 
							 $sq ="SELECT * FROM `commission` WHERE from_id=$aff_id";
							 $q2 =mysqli_query($con, $sq);
							 if(mysqli_num_rows($q2)> 0){	?>
                        <thead>
                              <tr>
                              <th scope="col">Name</th>
                              <th scope="col">EMAIL</th>
                              </tr>
                           </thead> 

                      <?php	



							 while($row =mysqli_fetch_array($q2)){
								$idd =$row['registed_id'];
								 $sqll ="SELECT * FROM `tbl_users` WHERE id=$idd";
								 $q3 =mysqli_query($con, $sqll);?>
								
								<?php if(mysqli_num_rows($q3) >0){ ?>
								  
							  <?PHP while($row2 =mysqli_fetch_array($q3)){
								 
								  ?>
								<tbody>
								<tr>
								<td><?php echo $row2['name'];?></td>
								<td><?php echo $row2['emailid'];?></td>
								</tr>
								
                          <?php
							 }
								 }	?> 
								
							<?php } }else{
								 echo "not found";
							 }
						  ?>
                               </tbody>
							 </table>  
							 </div>
							 <div class="col-xl-3"></div>
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
					 <!--<a href="https://www.instagram.com/isurizllc"> <em class="fa-2x mr-2 fab fa-youtube"></em> </a>-->
					 <a href=""><em class="fa-2x mr-2 fab fa-instagram"></em> </a> </div>
                     <div class="fotdiv">
                        <ul>
                           <li><a href="about.php"> About Us </a> </li>
							<li><a href="blog.php"> Blog </a></li>
                           <li><a href="contact-us.php"> Contact Us </a></li>
                           <li><a href="careers.php"> Careers </a> </li>
                           <li><a href="privacy-policy.php"> Privacy Policy </a> </li>
                           <li><a href="terms-of-use.php"> Terms of Use </a> </li>
						
                        </ul>
                        <p> © 2020 Isuriz, LLC. All Rights Reserved. </p>
                     </div>
                  </div>
               </footer>
               <!-- End Page footer-->
            </div>
            <?php endif; ?>
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

