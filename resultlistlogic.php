<?php 
include 'header.php'; 

//print_r ($_SESSION['clgcb']);
$clgidarr = array();
$admiscore = $_SESSION['admiscore'];
//print_r ($_SESSION['admiscore']);
if(isset($_SESSION['clgcb']) ){
   $selclgsarr = $_SESSION['clgcb'];
   $selectedclgids = '';
   $selectedclgids = implode(",",$selclgsarr);  
   //$selclgsarr = (explode(",",$selectedclgids));
   //echo $selectedclgids;
   //print_r($selclgsarr); 
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Isuriz</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- FONT AWESOME-->
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!----------------------------HEADER----------------------------------->
<?php
include 'top-nav-no-left-menu.php';
?>
<!----------------------------HEADER-----------------------------------> 
<link href="css/custom.css" rel="stylesheet">
<link href="css/site.css" rel="stylesheet">

<!--multi step form with banner start here-->

<!--banner-->
<div class="banner inner-banner multi-step-banner" style="background:url(images/finalize_my_college_list.png) no-repeat">
  <div class="container-fluid">
    <div class="banner-part">
      <h1> Finalize My List </h1>
    </div>
  </div>
</div>
<!--/banner-->
<section>
	<div class="container-fluid">
		<div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 overflow-hide">
            <div id="progress-bar">
               <div id="1" class="done one progress-bar-item progress-bar-item-edges" ><a href="form2.php" class="white-font"><p class="progress-bar-text">My Profile</p></a></div>
               <div id="2"class="done two progress-bar-item progress-bar-item-edges" ><a href="form.php" class="white-font"><p class="progress-bar-text">My Filters</p></a></div>
               <div id="3"class="done results progress-bar-item progress-bar-item-edges" ><a href="college-search.php" class="white-font"><p class="progress-bar-text">My Results</p></a></div>
               <div id="4"class="done chances progress-bar-item progress-bar-item-edges" ><a href="results.php" class="white-font"><p class="progress-bar-text">My Chances</p></a></div>
               <div id="5" class="done five progress-bar-item" ><a href="resultlistlogic.php" class="white-font"><p class="progress-bar-text">Finalize List</p></a></div>
            </div>
          </div>
		</div>
	</div>
</section>
	<!--/multi step form with banner here-->

<section class="College-Search-result apj-collage-search">
   <div class="container fluid">
   <div class="row">
      <div class="result col-sm-12">
        <!-- <p style="font-size: 37px;text-align: center;">
            <!-- <img src="https://asurison.com/images/icon1.png"> <br> -->
           <!-- <span style="color: #019ff0;font-weight: bold;">Balance</span> Your College <span style="color: #019ff0;font-weight: bold;">List</span>
         </p>-->
      </div>
   </div>

 <!--alert box-->
 <section class="info-alert-model finalizeMyListAlert">
         
            <div class="alert-box-shadow mt-3">
               <div class="col-sm-12 col-md-8 col-md-offset-2 col-xs-12 px75">
                  <div class="alert alert-warning">
                     <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                           <span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Please note that this tool provides only general information on how many colleges should be on your list and should not be relied upon as a definitive opinion. <a href="#" data-toggle="modal" data-target="#finalizeMyList">Click here</a> to review the disclaimer before proceeding.</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         
       
      <!--popup-->
	<!-- Modal -->
  <div class="modal fade" id="finalizeMyList" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Disclaimer</h4>
        </div>
        <div class="modal-body">
          <p>It is not Isuriz's intention to provide advice as a substitute for a college counselor or admissions consultant. Rather, this website, its services, and related content on this website is for informational and research purposes only, and should not be relied upon as a definitive opinion of your admissibility to a particular school and/or how many colleges to pursue. Due to the holistic process and intangible evaluation and strategic decisions made by college admissions departments, outcomes can differ from the results predicted using our data points. It is recommended that you use the information obtained on this site as a reference point in your college planning efforts and speak with a college counselor or admissions consultant to best determine whether the schools on your college list are right for you based on your unique accomplishments, and goals. By using this website, you understand that your are required to complete your own due diligence before applying to any school, and nothing contained on this website is intended to replace the value of speaking with a qualified professional.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary mybluebtn" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	<!--popup end-->  
   </section>
   <!--alert box end-->

   <div class="row">
      <div class="col-sm-12 col-md-12">
         <div class="col-sm-12 col-md-12 apj-support-div"></div>
         <!-- first two section-->
         <div class="finalizeSections">
         <div class="col-sm-12 col-md-4">
         <div class="flip-card">
            <div id="list1" class="dropdown-check-list form-control result_college_list tile-top-list apj-dropdown-bcolor1" tabindex="100">
               <span class="clg-list-heading">Long Shot Colleges <i class="fa fa-caret-down pull-right apj-down-caret" aria-hidden="true"></i></span>
               <ul class="apj-result-items list1">
            <?php
			if($countthm > 0){			
               foreach($clgidarr as $clg){
				   if(!empty($clg['THM'])){
					  echo '<li><span class="collage-title-rs">'.$clg['THM'].'</span></li>';
				   }              
				}
			}
			else{
				echo '<li><span class="collage-title-rs">There are no colleges in this category</span></li>';
				
			}
            ?>
                 <!-- 
                  <li><span class="collage-title-rs">Collage 2<i class="fa fa-close pull-right rm-clg-btn"></i></span></li> -->
               </ul>
            </div>
            <div class="flip-card-inner">
               <div class="flip-card-front apj-card-one apj-card-one-color">
                     <div class="inner-card-front">
                        <h2>L<span class="h2-subfont pl-2">ong Shot</span></h2>
                       <?php                                
                     if($countthm < 1){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($countthm > 0 && $countthm < 3){
                        echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
                     }
                     else if($countthm > 2 && $countthm < 4 ){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($countthm > 3 ){
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';                                 
                     }
                     else{}
                  ?>
                     </div>
               </div>
               <div class="flip-card-back bcolor2" id="apj-scrollbar-b">
                  <div>
                     <ul>
                  <?php       
                     if($countthm < 1){
                        if($countthm > 0 && $countthm < 2)
                           echo '<li>Currently, you have '.$countthm.' college in this category.</li>';
                        else
                           echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
                        echo '<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>';                        
                        echo '<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>';
                     }
                     else if($countthm > 0 && $countthm < 3){
                        if($countthm > 0 && $countthm < 2)
                           echo '<li>Currently, you have '.$countthm.' college in this category.</li>';
                        else
                           echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
                        echo '<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>';
                        echo '<li>These are frequently the most time-consuming applications that require additional essays and application components.</li>';
                        echo '<li>You should truly be in love with these schools as they will only consider admitting you if they can sense your extreme excitement for becoming a member of their student body.</li>';
                     }
                     else if($countthm > 2 && $countthm < 4 ){
                        if($countthm > 0 && $countthm < 2)
                           echo '<li>Currently, you have '.$countthm.' college in this category.</li>';
                        else
                           echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
                        echo '<li>Three "Long Shot" colleges may prove to be too many on most college lists.</li>';
                        echo '<li>Since typically resources of time and money are limited in the application process, adding three in this category may lead to lower quality applications being submitted to other schools on your college list.</li>';
                     }
                     else if($countthm > 3 ){
                        if($countthm > 0 && $countthm < 2)
                           echo '<li>Currently, you have '.$countthm.' college in this category.</li>';
                        else
                           echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
                        echo '<li>Applying to 4 or more "Long Shot" colleges is a waste of time and resources.</li>';
                        echo '<li>You should look for schools that are in the "Reach" and "Match" categories that have many of the great things you love about these "Long Shot" schools.</li>';
                        echo '<li>Attempting to apply to 4+ in this category almost always leads to fewer overall acceptances. Refine your search criteria and double down on the 1-2 best-fit Long Shot\'s!</li>';
                     }
                     else{}
                     ?>
                  <!--<ul>
                     <li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
                     <li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
                     <li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
                  </ul>-->
                  </ul>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <div class="col-sm-12 col-md-4">
         <div class="flip-card">
            <div id="list2" class="dropdown-check-list form-control result_college_list tile-top-list apj-dropdown-bcolor2" tabindex="100">
               <span class="clg-list-heading">Reach Colleges <i class="fa fa-caret-down pull-right apj-down-caret" aria-hidden="true"></i></span>
               <ul class="apj-result-items list2">
               <?php
			   if($counttr > 0){
				   foreach($clgidarr as $clg){
					  if(!empty($clg['TR'])){
						 echo '<li><span class="collage-title-rs">'.$clg['TR'].'</span></li>';
					  }              
				   }
			   }
			   else{
					echo '<li><span class="collage-title-rs">There are no colleges in this category</span></li>';					
				}
               ?>          
               </ul>
            </div>
            <div class="flip-card-inner">
               <div class="flip-card-front apj-card-two apj-card-two-color">
                  <!-- front content -->
                     <div class="inner-card-front">
                        <h2>R<span class="h2-subfont">each</span></h2>
                        <?php                            
                     if($counttr < 2){                      
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
                     }
                     else if($counttr > 1 && $counttr < 3){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($counttr > 2 && $counttr < 5 ){
                        echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
                     }
                     else if($counttr > 4 && $counttr < 6 ){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($counttr > 5 ){
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
                     }
                     else{}
                  ?>
                  </div>
               </div>
               <div class="flip-card-back bcolor1" id="apj-scrollbar-a">
                  <div>
                     <ul>
                  <?php
                  if($counttr < 2){       
                     if($counttr > 0 && $counttr < 2)
                        echo '<li>Currently, you have '.$counttr.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';                    
                     echo '<li>The "Reach" schools are arguably the most important category of schools on your college list.</li>';
                     echo '<li> These colleges need to represent your goals and ambitions and should be some of the schools to which you are most excited about gaining admission.</li>';                      
                     echo '<li>Less than three in this category is a missed opportunity to apply to schools that may be within reach.</li>';
                  }
                  else if($counttr > 1 && $counttr < 3){
                     if($counttr > 0 && $counttr < 2)
                        echo '<li>Currently, you have '.$counttr.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
                     echo '<li>With 2 "Reach" schools, you have begun to identify a trend or set of criteria that are most important to you.</li>';
                     echo '<li>Consider adding 1-2 more in this category to increase your likelihood of admission to a school in this important category.</li>';
                  }
                  else if($counttr > 2 && $counttr < 5 ){
                     if($counttr > 0 && $counttr < 2)
                        echo '<li>Currently, you have '.$counttr.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
                     echo '<li>Having 3-4 "Reach" schools is the sweet spot for a college list.</li>';
                     echo '<li>This will provide you the greatest chance of submitting your best possible work and gaining access to institutions at the top end of your academic range.</li>';
                  }
                  else if($counttr > 4 && $counttr < 6 ){
                     if($counttr > 0 && $counttr < 2)
                        echo '<li>Currently, you have '.$counttr.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
                     echo '<li>With 5 "Reach" schools, you may need to further clarify your hopes and desires for a future college home.</li>';
                     echo '<li>This wide of a range in the "Reach" category may be an indicator that you need to further refine your criteria, or begin to eliminate schools from your list based on gaining a deeper understanding of the unique institutions.</li>';
                  }
                  else if($counttr > 5 ){
                     if($counttr > 0 && $counttr < 2)
                        echo '<li>Currently, you have '.$counttr.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
                     echo '<li>6 or more "Reach" schools is too many for most college lists and will likely mean you are lacking in a different category.</li>';
                     echo '<li>Refine the list of schools by clarifying your criteria and gaining a deeper understanding of the differences between schools.</li>';
                  }
                  else{}
                  ?>
                     <!--<ul>
                        <li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
                        <li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
                        <li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
                     </ul>-->
                  </ul>
                  </div>
               </div>
            </div>
         </div>
         </div>
               </div> <!--end first two section-->
         <div class="col-sm-12 col-md-12 apj-support-div"></div>
      </div>
   </div>
   <div class="row pb-35">
      <div class="col-sm-12 col-md-12">
         <div class="col-sm-12 col-md-12 apj-support-div"></div>
          <!-- last two section-->
          <div class="finalizeSections">
         <div class="col-sm-12 col-md-4">
         <div class="flip-card">
            <div id="list3" class="dropdown-check-list form-control result_college_list tile-top-list apj-dropdown-bcolor2"  tabindex="100">
               <span class="clg-list-heading">Match Colleges <i class="fa fa-caret-down pull-right apj-down-caret" aria-hidden="true"></i></span>
               <ul class="apj-result-items list3">
                 <?php
				 if($counttm > 0){
				   foreach($clgidarr as $clg){
					  if(!empty($clg['TM'])){
						 echo '<li><span class="collage-title-rs">'.$clg['TM'].'</span></li>';
					  }              
				   }
				 }
				else{
					echo '<li><span class="collage-title-rs">There are no colleges in this category</span></li>';					
				}
               ?>
               </ul>
            </div>
            <div class="flip-card-inner">
               <div class="flip-card-front apj-card-three apj-card-three-color">
                  <!-- front content -->
                     <div class="inner-card-front">
                        <h2>M<span class="h2-subfont">atch</span></h2>
                        <?php                            
                     if($counttm < 2){
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
                     }
                     else if($counttm > 1 && $counttm < 3){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($counttm > 2 && $counttm < 5 ){
                        echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
                     }
                     else if($counttm > 4 && $counttm < 6 ){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($counttm > 5 ){
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
                     }
                     else{}
                  ?>
                     </div>
               </div>
               <div class="flip-card-back bcolor2" id="apj-scrollbar-a">
                  <div>
                     <ul>
                  <?php
                  if($counttm < 2){
                     if($counttm > 0 && $counttm < 2)
                        echo '<li>Currently, you have '.$counttm.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';                    
                     echo '<li>"Match" schools are the bread and butter of your college list.</li>';
                     echo '<li>Include 3 to 4 in this category to give yourself the best opportunity to gain admission to schools that are right on target academically.</li>'; 
                     echo '<li>Failing to adequately fill this category will lead to an unbalanced list that may limit your collegiate options.</li>';
                  }
                  else if($counttm > 1 && $counttm < 3){
                     if($counttm > 0 && $counttm < 2)
                        echo '<li>Currently, you have '.$counttm.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
                     echo '<li>With 2 "Match" colleges, you have begun to identify your list\'s backbone.</li>';
                     echo '<li>Strengthen this list by adding 1-2 more in this category.</li>';
                     echo '<li>These schools will be excited to receive your application and can be more flexible with grades and test scores.</li>';
                     echo '<li>They may add greater priority to your fit within their community when determining your admissions decision.</li>';
                  }
                  else if($counttm > 2 && $counttm < 5 ){
                     if($counttm > 0 && $counttm < 2)
                        echo '<li>Currently, you have '.$counttm.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
                     echo '<li>3-4 "Match" schools are perfect for a well-balanced college list.</li>';
                     echo '<li>In this range, your list is most likely to be a representation of a true fit between you and the institution.</li>';
                  }
                  else if($counttm > 4 && $counttm < 6 ){
                     if($counttm > 0 && $counttm < 2)
                        echo '<li>Currently, you have '.$counttm.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
                     echo '<li>WIth 5 "Match" schools, you are at the upper limit of this category.</li>';
                     echo '<li>Consider removing 1 school by further clarifying your interests at each college, and verifying that they meet the essentials on your checklist.</li>';
                  }
                  else if($counttm > 5 ){
                     if($counttm > 0 && $counttm < 2)
                        echo '<li>Currently, you have '.$counttm.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
                     echo '<li>6 of more "Match" schools are too many for most college lists.</li>';
                     echo '<li>Attempting to apply to this many "Match" schools will leave the other essential categories too sparsely populated. Remove 2-3 from this category.</li>';
                  }
                  else{}
                  ?>
                  <!--<ul>
                     <li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
                     <li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
                     <li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
                  </ul>-->
                  </ul>
                  </div>
               </div>
            </div>
         </div>
               </div>
         <div class="col-sm-12 col-md-4">
         <div class="flip-card">
            <div id="list4" class="dropdown-check-list form-control result_college_list tile-top-list apj-dropdown-bcolor1"  tabindex="100">
               <span class="clg-list-heading">Likely Colleges <i class="fa fa-caret-down pull-right apj-down-caret" aria-hidden="true"></i></span>
               <ul class="apj-result-items list4">
                  <?php
				  if($countts > 0){
					   foreach($clgidarr as $clg){
						  if(!empty($clg['TS'])){
							 echo '<li><span class="collage-title-rs">'.$clg['TS'].'</span></li>';
						  }              
					   }
				   }
					else{
						echo '<li><span class="collage-title-rs">There are no colleges in this category</span></li>';					
					}
					?>
               </ul>
            </div>
            <div class="flip-card-inner">
               <div class="flip-card-front apj-card-four apj-card-four-color">
                  <!-- front content -->
                     <div class="inner-card-front">
                        <h2>L<span class="h2-subfont">ikely</span></h2>
                        <?php                         
                     if($countts < 2){
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
                     }
                     else if($countts > 1 && $countts < 3){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($countts > 2 && $countts < 5 ){
                        echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
                     }
                     else if($countts > 4 && $countts < 6 ){
                        echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
                     }
                     else if($countts > 5 ){
                        echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
                     }
                     else{}
                  ?>
                     </div>
               </div>
               <div class="flip-card-back bcolor1" id="apj-scrollbar-b">
                  <div class="" >
                     <ul>
                  <?php
                  if($countts < 2){
                     if($countts > 0 && $countts < 2)
                        echo '<li>Currently, you have '.$countts.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';                    
                     echo '<li>"Safety" colleges will provide the peace of mind to help you sleep at night while you wait for results to arrive.</li>';                       
                     echo '<li>You need to have these colleges on your list to ensure that you will have an admissions offer for your undergraduate studies.</li>';
                     echo '<li>Build out this category to avoid disappointment.</li>';
                  }
                  else if($countts > 1 && $countts < 3){
                     if($countts > 0 && $countts < 2)
                        echo '<li>Currently, you have '.$countts.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
                     echo '<li>Some lists may be considered complete with just 2 "Safety" schools, but in service of preparing for the worst-case outcomes, 3-4 "Safeties" will reduce the risk of having nowhere to attend this fall.</li>';
                  }
                  else if($countts > 2 && $countts < 5 ){
                     if($countts > 0 && $countts < 2)
                        echo '<li>Currently, you have '.$countts.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
                     echo '<li>Building a strong list requires planning for any outcome.</li>';                      
                     echo '<li>Having 3 to 4 safety schools will increase the chances that you have options to select from this fall.</li>';
                  }
                  else if($countts > 4 && $countts < 6 ){
                     if($countts > 0 && $countts < 2)
                        echo '<li>Currently, you have '.$countts.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
                     echo '<li>5 "Safety" schools may be an overinvestment in the "fallbacks".</li>';
                     echo '<li>You are likely to be admitted to schools in this category and will be best served by focusing more attention on the other categories.</li>';
                     echo '<li>You should consider removing 1 to 2 schools from this category.</li>';
                  }
                  else if($countts > 5 ){
                     if($countts > 0 && $countts < 2)
                        echo '<li>Currently, you have '.$countts.' college in this category.</li>';
                     else
                        echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
                     echo '<li>There is no need for 6 or more safety schools on anyone\'s list.</li>';
                     echo '<li>You are likely to be admitted to these schools and should choose 3-4 options that best fit your goals.</li>';
                  }
                  else{}
                  ?>
                  <!--<ul>
                     <li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
                     <li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
                     <li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
                  </ul>-->
                  </ul>
                  </div>
               </div>
            </div>
         </div>
               </div>
         </div> <!--end last two section-->
         <div class="col-sm-12 col-md-4 apj-support-div"></div>
     </div>
   </div>
	   <!--buttons-->
	   <div class="row">
		  <div class="mt-30 mb-30 blueBtnBigdiv">
			  <a href="results.php" class="btn btn-default prev mybluebtn blue-outline btn-center-xs" >Back</a>
			  <a href="college-list.php" class="blueBtnBig prev myblueBtnBig" aria-hidden="false">Finalize List</a>
		  </div>
	   </div>
      <!--buttons-->
</section>
<?php include 'footer.php'; ?>
<script>
   $('#list1').click(function() {
   $('.list1').slideToggle();
   });
   $('#list2').click(function() {
   $('.list2').slideToggle();
   });
   $('#list3').click(function() {
   $('.list3').slideToggle();
   });
   $('#list4').click(function() {
   $('.list4').slideToggle();
   });
   $("#list1 .rm-clg-btn,#list2 .rm-clg-btn,#list3 .rm-clg-btn,#list4 .rm-clg-btn").click(function(e) {
   e.stopPropagation();
   });
   $(".rm-clg-btn").click(function() { $(this).closest("li").remove(); }); 
   $(".flip-card .flip-card-inner").click(function(){
   $(this).closest(".flip-card").toggleClass("hover");
   });
   $(document).on("click", function(e) {
   if ($(e.target).is("#list1,#list2,#list3,#list4,.clg-list-heading,.apj-down-caret") === false) {
   $('.list1,.list2,.list3,.list4').slideUp();
   }
   });
	
	
	
</script>
