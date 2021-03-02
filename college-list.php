<?php
include 'header.php';
$userid = $_SESSION['userid'];
$dataform1 = serialize($_SESSION['dataform1']);
$clgcb = serialize($_SESSION['clgcb']);
$admiscore = $_SESSION['admiscore'];

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
<link href="css/site.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<!----------------------------BANNER----------------------------------->
<div class="banner inner-banner collage-list-banner multi-step-banner" style="background:url(images/college-list.png) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> My College List </h1>
    </div>
  </div>
</div>
<!----------------------------BANNER-----------------------------------> 

<!----------------------------BODY-----------------------------------> 


<div class="college-list">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 py-90">
         <!--alert box-->
         <section class="info-alert-model myCollegeListInfo">
            <div class="row">
               <div class="alert-box-shadow mt-3">
                  <div class="col-sm-12 col-md-12 col-xs-12">
                     <div class="alert alert-warning">
                        <div class="row">
                           <div class="col-sm-12 col-md-12 col-xs-12">
                              <span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Once you click Confirm, your college list will be saved in the My College List page on your dashboard for future reference.</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--alert box end-->
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
	  <div class="row">
			  <div class="mt-30 mb-30 blueBtnBigdiv text-center">
				  <a href="resultlistlogic.php" class="btn btn-default prev mybluebtn blue-outline btn-center-xs" >Back</a>
				 <a href="congratulations.php" class="btn btn-default prev mybluebtn" aria-hidden="false">Confirm</a>
			  </div>
		</div>	 
	  <!--Buttons-->
	  
  </div>
</div>

<!----------------------------BODY-----------------------------------> 

<?php include 'footer.php'; ?>
