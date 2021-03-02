<?php
include 'header.php';
$resfilters = mysqli_query($con,"SELECT * FROM search_data WHERE createdby = '". $_SESSION['userid']."' ORDER BY id DESC limit 0,1");
	
if(mysqli_num_rows($resfilters) > 0){
  while ($rowfilters = mysqli_fetch_assoc($resfilters)) {	  			  
	  $clgcb = unserialize($rowfilters["all_clg_list"]);				  
	  $admiscore = $rowfilters["admiscore"];				  
  }			
}

$clgidarr = array();
//print_r ($_SESSION['admiscore']);
if(isset($clgcb) ){
   $selclgsarr = $clgcb;
   $selectedclgids = '';
   $selectedclgids = implode(",",$selclgsarr);  
   //$selclgsarr = (explode(",",$selectedclgids));
   //echo $selectedclgids;
   $to_remove = array();
   $missedclgarr = array();
   if(strlen($selectedclgids)>0){
      //for input college ids, fetch threshold values and based on admissibility score set the flag value   of $flag
      //echo "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ";
      $resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ");
      $countthm = 0;
      $counttr = 0;
      $counttm = 0;
      $countts = 0;
      $countnf = 0;     
      while ($rowclgth = mysqli_fetch_assoc($resclgth)){
         $indclgidarr =array();
         $indclgidarr['col1'] = '';
         $indclgidarr['THM'] = '';
         $indclgidarr['TR'] = '';
         $indclgidarr['TM'] = '';
         $indclgidarr['TS'] = '';
         $indclgidarr['NF'] = '';
         $flag = 'NF'; // possible values will be THM(Threshold Hail Mary), TR(Threshold Reach), TM(Threshold Match), TS(Threshold Safety), NF(Not Fit)
         if($admiscore > $rowclgth['thhailmary'])
            $flag = 'THM';
         if($admiscore > $rowclgth['threach'])
            $flag = 'TR';
         if($admiscore > $rowclgth['thmatch'])
            $flag = 'TM';
         if($admiscore > $rowclgth['thsafety'])
            $flag = 'TS';
         if($flag == 'THM'){
            $indclgidarr['THM'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';         
            $countthm++;
         }
         if($flag == 'TR'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttr++;
         }
         if($flag == 'TM'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttm++;
         }
         if($flag == 'TS'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['NF'] = '';
            $countts++;
         }
         if($flag == 'NF'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $countnf++;
         }
         array_push($clgidarr,$indclgidarr);
         array_push($to_remove,$rowclgth['unitid']);
      }
      $missedclgarr = array_diff($selclgsarr, $to_remove);
      //echo 'No Threshold Values: <pre>';
   }
  
}



$INSTNM = array_column($clgidarr, 'INSTNM');
array_multisort($INSTNM, SORT_ASC, $clgidarr);
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
      <!-- custom css-->
      <link rel="stylesheet" href="css/site.css" >
<link href="css/collage-search.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
   </head>
   <body class="my-collage-list-template">
		<div id="modalsharecollegelist" class="advance-filter-modal modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
					  <h4 class="modal-title" style="padding-top: 5px;">Share College List</h4>
					  <button type="button" style="    margin: 0px;
    padding: 0px;" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form id="mymailform" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="emailid">To:</label>
							 <input type="email" name="tomail" id="tomail" class="form-control" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="emailid">CC:</label>
							 <input type="email" name="ccmail" id="ccmail" class="form-control" placeholder="Email" >
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="submit" value="Send Mail" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
					</div>
					</form>
              
               
			  </div>
		</div>
		</div>
      <div id="modalsharecollegelist2" class="advance-filter-modal modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
              
					  <h4 class="modal-title" style="padding-top: 5px;">Share College List</h4>
                
					  <button type="button" style="    margin: 0px;
    padding: 0px;" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form id="mymailform" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="emailid">To:</label>
							 <input type="email" name="tomail"  class="form-control" placeholder="Email" disabled>
						</div>
						<div class="form-group">
							<label for="emailid">CC:</label>
							 <input type="email" name="ccmail"  class="form-control" placeholder="Email" disabled>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" value="Send Mail" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" disabled>
                  <div class="upgradepremium">
                     <div class="upgrade-content">
                     <h4>Upgrade to Premium to Access this Feature</h4>
                     <p>After at least 5 students that you have invited join Isuriz, your account will be upgraded to Premium to unlock this feature.</p>
                     </div>
                     <div class="upgrade-action">
                        <a class="upgrade-now-btn" href="dashboard-invite.php">Upgrade Now</a>
                     </div>
                  </div>
               </div>
					</form>
              
               
			  </div>
		</div>
		</div>

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
                     <li class="active">
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
                      <li>
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
                  <div class="text-center" id="welcometext-mb" style="color: #3a3a3a"><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">My College List 
                  <?php
                 $id =$_SESSION['userid'];
                  $sql ="SELECT * FROM `commission` WHERE from_id= $id";  
                  $query =mysqli_query($con, $sql);
                  if(mysqli_num_rows($query) > 0) {
                                                         
                  $row =mysqli_fetch_array($query);
                  if($row['credits'] > 4) {
					  
                  ?>
                  <button class="btn btn-primary mybluebtn "  onclick="showmodalmailer()">Share</button>
                  <?php }    else { ?>
                     <button class="btn btn-primary mybluebtn "  onclick="noshowmodel()">Share</button>
                     <?php
					
                  }
                  }else{?>   <button class="btn btn-primary mybluebtn "  onclick="noshowmodel()">Share</button><?php }?>
                  </h3><small data-localize="dashboard.WELCOME"></small></div>
               </div>
              
               <div class="row">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">

                        <!--alert box-->
                        <section class="myCollegeAlert">
                           <div class="container">
                              <div class="row">
                                 <div class="alert-box-shadow mt-3">
                                    <div class="col-sm-12 col-md-12 col-xs-12">
                                       <div class="alert alert-warning">
                                          <div class="row">
                                             <div class="col-sm-12 col-md-12 col-xs-12">
                                                <span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Please note that colleges on this page only appear after successfully building your list.</span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>   
                        </section>
                        <!--alert box end-->
                           <div class="college-list">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                      <ul class="list-group mycollegelist">
                                      <li class="list-group-item cat-header">Long Shot </li>
                                      <?php
                                       if($countthm > 0){
                                          foreach($clgidarr as $clg){
                                             if(!empty($clg['THM'])){
                                               echo '<li class="list-group-item">'.$clg['THM'].'</li>';
                                             }              
                                          }
                                       }
                                       else{
                                          echo '<li class="list-group-item">There are no colleges in this category</li>';
                                       }
                                      ?>       
                                      <!--<li class="list-group-item">Columbia University </li>-->
                                    </ul>
                                    <ul class="list-group mycollegelist">
                                      <li class="list-group-item cat-header">Reach </li>
                                      <?php
                                       if($counttr > 0){
                                          foreach($clgidarr as $clg){
                                            if(!empty($clg['TR'])){
                                              echo '<li class="list-group-item">'.$clg['TR'].'</li>';
                                            }              
                                          }
                                       }
                                       else{
                                          echo '<li class="list-group-item">There are no colleges in this category</li>';           
                                       }
                                       ?>      
                                    </ul>
                                    <ul class="list-group mycollegelist">
                                      <li class="list-group-item cat-header">Match </li>
                                      <?php
                                        if($counttm > 0){
                                          foreach($clgidarr as $clg){
                                            if(!empty($clg['TM'])){
                                              echo '<li class="list-group-item">'.$clg['TM'].'</li>';
                                            }              
                                          }
                                        }
                                        else{
                                          echo '<li class="list-group-item">There are no colleges in this category</li>';           
                                       }
                                       ?>
                                    </ul>
                                    <ul class="list-group mycollegelist">
                                      <li class="list-group-item cat-header">Likely </li>
                                      <?php
                                      if($countts > 0){
                                          foreach($clgidarr as $clg){
                                            if(!empty($clg['TS'])){
                                              echo '<li class="list-group-item">'.$clg['TS'].'</li>';
                                            }              
                                          }
                                       }
                                       else{
                                          echo '<li class="list-group-item">There are no colleges in this category</li>';           
                                       }           
                                       ?>
                                    </ul>
                                    </div>
                                  </div>
                                   <!--Buttons-->
                                   <!-- <div class="row">
                                         <div class="mt-30 mb-30 blueBtnBigdiv text-center ml-14">
                                            <a href="resultlistlogic.php" class="btn btn-default prev blue-outline btn-center-xs" >Back</a>
                                           <a href="congratulations.php" class="btn btn-default blueBtnBig ml-14" aria-hidden="false">Confirm</a>
                                         </div>
                                    </div> -->    
                                   <!--Buttons-->
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
                           <li><a href="blog.php"> Blog</a> </li>
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
function showmodalmailer()
{
	$('#modalsharecollegelist').modal('show');
}
$( "#mymailform" ).submit(function( event ) {
  $.ajax({
		type: "POST",
		url: "includes/sendmail_collegelist.php",
		dataType: 'text',
		data: $("#mymailform").serialize(),
		cache: false,
		async: false,
		beforeSend: function () {
			$('.loading').show();
		},
		success: function (data) {
			alert(data);
		},
		complete: function () {
			$('.loading').hide();
		}
	});
  event.preventDefault();
});
function noshowmodel()
{
   $('#modalsharecollegelist2').modal('show');
   event.preventDefault();

}
</script>
   </body>
</html>
