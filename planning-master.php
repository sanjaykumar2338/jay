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
	   $countrow = 0;   
	  foreach($selclgsarr as $unitid)
	  {
		   $resclgth = mysqli_query($con, "SELECT * FROM `hd2018` where UNITID ='$unitid' ");
		 
		  while ($rowclgth = mysqli_fetch_assoc($resclgth)){
			 $indclgidarr =array();
			 $indclgidarr['col1'] = '';
			 $indclgidarr['instnm'] = $rowclgth['INSTNM'];
			 $indclgidarr['unitid'] = $rowclgth['UNITID'];
			 array_push($clgidarr,$indclgidarr);
			 array_push($to_remove,$rowclgth['unitid']);
			  $countrow++;
		  }
	  }
     
	  
	  
      $missedclgarr = array_diff($selclgsarr, $to_remove);
      //echo 'No Threshold Values: <pre>';
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
      <!-- custom css-->
      <link rel="stylesheet" href="css/site.css" >
	  
	  
	  
<style>
			.loading {
			display: none;
		  position: fixed;
		  z-index: 9999;
		  height: 2em;
		  width: 2em;
		  overflow: visible;
		  margin: auto;
		  top: 0;
		  left: 0;
		  bottom: 0;
		  right: 0;
		}

		/* Transparent Overlay */
		.loading:before {
		  content: '';
		  display: block;
		  position: fixed;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		  background-color: rgba(0,0,0,0.3);
		}

		/* :not(:required) hides these rules from IE9 and below */
		.loading:not(:required) {
		  /* hide "loading..." text */
		  font: 0/0 a;
		  color: transparent;
		  text-shadow: none;
		  background-color: transparent;
		  border: 0;
		}

		.loading:not(:required):after {
		  content: '';
		  display: block;
		  font-size: 10px;
		  width: 1em;
		  height: 1em;
		  margin-top: -0.5em;
		  -webkit-animation: spinner 1500ms infinite linear;
		  -moz-animation: spinner 1500ms infinite linear;
		  -ms-animation: spinner 1500ms infinite linear;
		  -o-animation: spinner 1500ms infinite linear;
		  animation: spinner 1500ms infinite linear;
		  border-radius: 0.5em;
		  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
		  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
		}

/* Animation */

		@-webkit-keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
		@-moz-keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
		@-o-keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
		@keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}

		</style>

   </head>
   <body class="my-collage-list-template">
   <div class="loading">Loading&#8230;</div>
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
                  <li class="nav-item dropdown dropdown-list message-alert-box-icon alertbox-icon"><a class="nav-link dropdown-toggle dropdown-toggle-nocaret apj-notificationicon-1" href="#" data-toggle="dropdown"><em class="icon-bell"></em><span class="badge badge-danger">2</span></a><!-- START Dropdown menu-->
                     <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                        <h6 class="dropdown-header">
                           Alerts Center
                        </h6>
                        <div class="dropdown-item">
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- list item-->
                              <div class="list-group-item list-group-item-action dismiss">
                                 <div class="media">
                                    <div class="media-body font-weight-bold">
                                       <div class="m-0 text-muted text-sm small text-gray-500">12-12-2020</div>
                                       <div class=" m-0 pb-1">Arul Prasad J arul@gmail.com</div>
                                       <button type="button" class="btn btn-success responseRequest"  value="1">Accept</button>
                                       <button type="button" class="btn btn-danger responseRequest"  value="0">Reject</button> 
                                    </div>
                                 </div>
                              </div><!-- list item-->
                              <!-- list item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media">
                                    <div class="align-self-start mr-2 dropdown-list-image"><img class="rounded-circle" src="https://img.icons8.com/color/100/000000/test-account.png" alt=""></div>
                                    <div class="media-body">
                                     <div class="m-0 pt-2"><b>Arul Prasad J</b> Approve your request</div>
                                     <div class="m-0 text-muted text-sm small text-gray-500">20 seconds</div>
                                  </div>
                               </div>
                            </div><!-- list item-->
                            <div class="list-group-item list-group-item-action apj_action text-center small"><a href="#" style="text-decoration: none;"><span class=" align-items-center"><span class="text-sm text-gray-500">Show All Alerts</span></span></a></div>
                         </div><!-- END list group-->
                      </div>
                   </div><!-- END Dropdown menu-->
                </li><!-- END Alert menu-->
                <li class="nav-item dropdown dropdown-list message-alert-box-icon messagealertbox-icon"><a class="nav-link dropdown-toggle dropdown-toggle-nocaret apj-notificationicon-1" href="#" data-toggle="dropdown"><em class="icon-envelope"></em><span class="badge badge-danger">3</span></a><!-- START Dropdown menu-->
                  <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                     <h6 class="dropdown-header">
                        Message Center
                     </h6>
                     <div class="dropdown-item">
                        <!-- START list group-->
                        <div class="list-group">
                           <!-- list item-->
                           <div class="list-group-item list-group-item-action">
                              <div class="media">
                                 <div class="align-self-start mr-2 dropdown-list-image"><img class="rounded-circle" src="https://img.icons8.com/color/100/000000/test-account.png" alt=""></div>
                                 <div class="media-body font-weight-bold">
                                  <div class="text-truncate m-0 pt-2">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                  <div class="m-0 text-muted text-sm small text-gray-500">Jae Chun · 1d</div>
                               </div>
                            </div>
                         </div><!-- list item-->
                         <!-- list item-->
                         <div class="list-group-item list-group-item-action">
                           <div class="media">
                              <div class="align-self-start mr-2 dropdown-list-image"><img class="rounded-circle" src="https://img.icons8.com/color/100/000000/test-account.png" alt=""></div>
                              <div class="media-body">
                               <div class="text-truncate m-0 pt-2">I have the photos that you ordered last month, how would you like them sent to you?</div>
                               <div class="m-0 text-muted text-sm small text-gray-500">Jae Chun · 1d</div>
                            </div>
                         </div>
                      </div><!-- list item-->
                      <div class="list-group-item list-group-item-action apj_action text-center small"><a href="message.php" style="text-decoration: none;"><span class=" align-items-center"><span class="text-sm text-gray-500">Read More Messages</span></span></a></div>
                   </div><!-- END list group-->
                </div>
             </div><!-- END Dropdown menu-->
          </li><!-- END Alert menu-->
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
					 
					  <li class="active">
                        <a href="planning-master.php" title="Planning Master" >
                        <em class="fas fa-retweet"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Planning Master</span>
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
                     <li class=" ">
                        <a href="dashboard-updateprofile.php" title="Settings">
                        <em class="icon-settings"></em>
                        <span>Settings</span>
                        </a>
                     </li>
                     <li>
                        <a href="counselor-dashboard.php" title="Settings">
                           <em class="fa fa-globe"></em>
                           <span>College Counselor Hub</span>                        
                        </a>                    
                     </li> 
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
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Planning Master</h3><small data-localize="dashboard.WELCOME"></small></div>
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
                                    <div class="col-xs-6 col-md-6">
                                      <h3 style='background-color: #019ff0 !important;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    padding: 10px 15px;
    font-family: "Montserrat", sans-serif;'>College Names </h3>
                                      <ul class="list-group mycollegelist"  id="sortable">
                                      <?php
                                       if($countrow > 0){ 
                                          foreach($clgidarr as $clg){
                                               echo '<li class="list-group-item" id="'.$clg['unitid'].'">'.$clg['instnm'].'</li>';             
                                          }
                                       }
                                       else{
                                          echo '<li class="list-group-item">There are no colleges in your college list</li>';
                                       }
                                      ?>       
                                      <!--<li class="list-group-item">Columbia University </li>-->
                                    </ul>
                                   </div>
								    <div class="col-xs-6 col-md-6">
									<button class="btn logdv blueBtnBig blue-border " id="btnfinalize" onclick="finalizelist()">Finalize Your Periority</button>
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
                        <p> © 2020 Isuriz, LLC. All Rights Reserved. </p>
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
	  
	  
	  
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  
	  <script>
	  function finalizelist()
	  {
		  var myRows = [];
		  $("#sortable li").each(function() {
				var ids = $(this).attr('id');
				 myRows.push(ids);
			});
		 var myTableArray = myRows.join(',');
		 
		 
		 var url = "includes/planning_master_update.php";
		$.ajax({
			type: "POST",
			url: url,
			data: {
				'myTableArray': myTableArray
			},
			cache: false,
			beforeSend: function () {
				$('.loading').show();
			},
			complete: function () {
				$('.loading').hide();
			},
			success: function (data)
			{
				alert(data);
			},
			error: function (error) {
				alert(error);
			}
		});
		return false;
	  }
	  
  $( function() {
	  
    $("#sortable").sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
  
  
   </body>
</html>
