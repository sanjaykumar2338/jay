<?php

include 'header.php';
$userid = $_SESSION['userid'];
$dataform1 = serialize($_SESSION['dataform1']);
$clgcb = serialize($_SESSION['clgcb']);
$admiscore = $_SESSION['admiscore'];
$resultdup = mysqli_query($con,"select * from search_data where createdby = '$userid' order by id desc limit 1");
if(mysqli_num_rows($resultdup) > 0) 
{
		mysqli_query($con,"UPDATE `search_data`
		SET 
		`all_clg_list` ='$clgcb',
		`all_filters_data` = '$dataform1',
		`admiscore` = '$admiscore',
		`created` = NOW(),
		`createdby` = '$userid'
		WHERE `createdby` = '$userid';");

}
else
{
	mysqli_query($con,"INSERT INTO `search_data`(`all_clg_list`,`all_filters_data`,`admiscore`,`created`,`createdby`)
	VALUES ('$clgcb','$dataform1','$admiscore',NOW(),'$userid');");
}	

$clgidarr = array();

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
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';         
            $countthm++;
         }
         if($flag == 'TR'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = $rowclgth['instnm'];
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttr++;
         }
         if($flag == 'TM'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = $rowclgth['instnm'];
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttm++;
         }
         if($flag == 'TS'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = $rowclgth['instnm'];
            $indclgidarr['NF'] = '';
            $countts++;
         }
         if($flag == 'NF'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = $rowclgth['instnm'];
            $countnf++;
         }
         array_push($clgidarr,$indclgidarr);
         array_push($to_remove,$rowclgth['unitid']);
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
	
<!-- Custom script -->
<script src="js/mycustomjs.js"></script> 
</head>
<body>
<!----------------------------HEADER----------------------------------->
<?php
include 'top-nav-no-left-menu.php';
?>
<!----------------------------HEADER-----------------------------------> 
<link href="css/site.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<section class="congratulations thankyou">
   <div class="container fluid pt-60">
   		<div class="row">
      		<div class="col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
				<div class="img-full">
					<span class="main-img-wrap">
						<img class="img-responsive main-img" src="/images/student-thumbup.png">
					</span>
				</div>
				<div class="mycontent pb-60">
					<h2 class="text-center pt-20 text-dark"><strong>Congratulations, <span class="highlightblue"><?php echo $_SESSION['first_name']; ?>!</span></strong></h2>
					<h2 class="text-center subhead-congrats">You have successfully built your college list!
						<span class="d-block">Awesome job!</span>
					</h2>
					<div class="divider1px"></div>
					<p>We recommend that you use this list as a starting point, and speak with an admissions consultant or counselor to determine if the schools on this list are right for you. Due to the holistic nature of the admissions process, there is a limit to the accuracy of our predictions. You are off to a great start, though, and we hope that we can continue to be a valuable resource in your college planning efforts!</p>
            </div>
			</div>
	   </div>
	</div>
</section>

<section>
   <div class="container fluid">
      <div class="row">
         <div class="col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            <div class="congrats-bottom-btn">
               <a href="dashboard.php" class="btn mybluebtn" name="finish"> Finish </a>
         </div>
      </div>
   </div>
</section>


<?php include 'footer.php'; ?>
