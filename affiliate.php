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
      <link rel="stylesheet" href="css/app.css" id="maincss" />
      <link rel="stylesheet" href="css/dashboard.css" />
	  	<style>
		    .affi1{
				border:1px solid #c1c1c1;
				padding:20px;
			}
			.affibdr{
				  position:absolute;
				  top:109px;
				  left:342px;
				  background:#f5f7fa;
				  padding:0px 20px;
			}
			.affibdr2{
				  position:absolute;
				  top:352px;
				  left:342px;
				  background:#f5f7fa;
				  padding:0px 20px;
			}
			.affibdr3{
				  position:absolute;
				  bottom:238px;
				  left:342px;
				  background:#f5f7fa;
				  padding:0px 20px;
			}
	  	</style>
   </head>
<body>

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
                  <li class="nav-item logout-li"><a class="nav-link logout" href="logout.php" data-search-open="">Logout</a></li>
                  <!-- Fullscreen (only desktops)-->
                  <!-- START Offsidebar button-->
               </ul>
               <!-- END Right Navbar-->
            </nav>
            <!-- END Top Navbar-->
         </header>
         
    <div class="container">   
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8 col-md-8 col-sm-10">
	        <section class="section-container">
	            <!-- Page content-->
				<h2 class="text-center">Partnership SignUp</h2>
				<p class="text-center">Thanks for signing up to be an Partnership of Isuriz! After SignUp successfully you can access premium features of isuriz</p>
				<br><br>
				<p class="affibdr">Partnership login information</p>
				<form method="post" id="partnerForm">
				<div class="affi1">
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter Username" required>
					<small id="emailHelp" class="form-text text-muted">This name will appear in your referring link.   .</small>
				</div>
				<div class="row">
				<div class="col-6">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
				</div>
				<div class="col-6">
				<div class="form-group">
					<label for="cpassword"> Confirm Password</label>
					<input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required>
				</div>
				</div>
				</div>
				</div>
				<br>
				<p class="affibdr2">account information</p>
				<div class="affi1">
				<div class="row">
				<div class="col-6">
				<div class="form-group">
				<label for="exampleInputEmail1">First Name</label>
					<input type="text" name="fname" class="form-control" id="fname" aria-describedby="usernameHelp" placeholder="Enter First Name" required>
				</div>
				</div>
				<div class="col-6">
				<div class="form-group">
				<label for="exampleInputEmail1">Last Name</label>
					<input type="text" name="lname" class="form-control" id="lname" aria-describedby="usernameHelp" placeholder="Enter Last Name" required>
				</div>
				</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Phone Number</label>
					<input type="text" name="phone" class="form-control" id="phone" aria-describedby="usernameHelp" placeholder="Enter Number" required>
					
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Company</label>
					<input type="text" name="company" class="form-control" id="company" aria-describedby="usernameHelp" placeholder="Enter Company" required>
					
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Street Address</label>
					<input type="text" name="street" class="form-control" id="street" aria-describedby="usernameHelp" placeholder="Enter Address" required>
					
				</div>
				<div class="row">
				<div class="col-3">
				<div class="form-group">
				<label for="exampleInputEmail1">City</label>
					<input type="text" name="city" class="form-control" id="city" aria-describedby="usernameHelp" placeholder="Enter City" required>
				</div>
				</div>
				<div class="col-3">
				<div class="form-group">
				<label for="exampleInputEmail1">State</label>
					<input type="text" name="state" class="form-control" id="state" aria-describedby="usernameHelp" placeholder="Enter State" required> 
				</div>
				</div>
				<div class="col-3">
				<div class="form-group">
				<label for="exampleInputEmail1">Postal Code</label>
					<input type="text" name="code" class="form-control" id="code" aria-describedby="usernameHelp" placeholder="Enter Postal Code" required>
				</div>
				</div>
				<div class="col-3">
				<div class="form-group">
					<label for="exampleInputEmail1">Country</label>
					<input type="text" name="country" id="country" class="form-control">
				
				</div>
				</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email Address</label>
					<input type="text" class="form-control" id="email" name="email" aria-describedby="usernameHelp" placeholder="Enter Email Address" required>
					
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Primary URL</label>
					<input type="text" name="primaryurl" class="form-control" id="primaryurl" aria-describedby="usernameHelp" placeholder="Enter Primary URL" required>
					
				</div>
				</div>
				<br>
				<button class="btn btn-success text-center" name="send" type="submit" id="addPartner">SignUp</button>
					<div id="message"></div>
				</form>
					<br><br>
			</section>
	    </div>  
		<div class="col-2"></div>
	</div>  
	</div>
				
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
						   <li><a href="affiliate.php"> Partnership</a> </li>
                        </ul>
                        <p> © 2020 Isuriz, LLC. All Rights Reserved. </p>
                     </div>
                  </div>
               </footer>
             
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
     
      <script type="text/javascript">
      $("#addPartner").click(function(e){
      	e.preventDefault();

      	var username = $("#username").val();
      	var password = $("#password").val();
      	var cpassword = $("#cpassword").val();
      	var email = $("#email").val();

      	if(username == ''){
      		$("#username").css("border: 1px dashed red;");
      		$("#username").focus();
      		return false;
      	}
      	if(password == ''){
      		$("#password").css("border: 1px dashed red;");
      		$("#password").focus();      		   		
      		return false;
      	}

      	if(cpassword ==''){      		
      		$("#cpassword").css("border: 1px dashed red;");
      		$("#cpassword").focus();      		
      		return false;
      	}

      	if(password != cpassword){
      		$("#password").css("border: 1px dashed red;");
      		$("#cpassword").css("border: 1px dashed red;");
      		// $("#cpassword").focus();      		
      		return false;
      	}

      	if(email == ''){
      		$("#email").css("border: 1px dashed red;");
      		$("#email").focus();      		   		
      		return false;
      	}  

      	var form = $("#partnerForm");
      	var fomdata = form.serialize();
      	$.ajax({
	      url: "ajax_function.php?action=addParners",
	      method:"POST",
	      data:fomdata,
	      // dataType:"json",
	      //dataType: "text",
	      success:function(data){ 
	      	console.log(data);
	        if(data==1){
				$("#message").append('<div style="margin-top:20px;color:#055160;background:#cff4fc;border-color:#b6effb;padding:20px;">Thanks for signing up as a Partnership of Isuriz!</div>');
			}
			  document.getElementById("partnerForm").reset();
	      }
	    });
      })      	
      </script>



   </body>
</html>

