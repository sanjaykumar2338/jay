<?php include 'header.php'; ?>
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
<!-- jQuery --> 
<script src="js/jquery.js"></script>
</head>
<body>
<div class="loading">Loading&#8230;</div>
<!----------------------------HEADER----------------------------------->
<?php
include 'top-nav-no-left-menu.php';
?>
<!----------------------------HEADER-----------------------------------> 
	<link href="css/site.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
<!--multi step form with banner start here-->

<!--banner-->
<div class="banner inner-banner multi-step-banner" style="background:url(images/chances_of_acceptance.png) no-repeat">
  <div class="container-fluid">
    <div class="banner-part">
      <h1> My Estimated Chances of Acceptance </h1>
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
          <div id="5" class=" five progress-bar-item" ><a href="#!" class="white-font"><p class="progress-bar-text">Finalize List</p></a></div>
          </div>
			</div>
		</div>
	</div>
</section>
	<!--/multi step form with banner here-->


<section class="College-Search-result apj-collage-search">
   <div class="container">

   	   				<!-- MultiStep Form -->
<!--<div class="container-fluid" >
    <div class="row justify-content-center mt-0">
       <!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
           <div class="cards px-0 pt-4 pb-0 mt-3 mb-3"> -->
      <!-- <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
	<div class="cards px-0 pt-4 pb-0 mt-3 mb-3 ">
		<div class="row ">			
			<div class="col-md-12 mx-0 col-sm-12">
				<form action="#" id="msform" method="post">
					<ul id="progressbar">
                              <a href="form2.php" title="">
                                 <li class="active" id="payment"><strong>Your Profile</strong></li>
                              </a>
							  <a title="form.php">
                                 <li class="active" id="account" class="active"><strong>Your Filters</strong></li>
                              </a>
							  
                              <a href="college-search.php" title="">
                                 <li class="active" id="personal"  class="active"><strong>Your Results</strong></li>
                              </a>
                             
                              <a title="">
                                 <li class="active" id="confirm"  class="active"><strong>Your Chances?</strong></li>
                              </a>
                           </ul>
				</form>
			</div>
		</div>
	</div>
</div>
    </div>
</div>-->
	   
     <div class="row">
		<div class="result col-sm-12">
			<!--<p style="font-size: 37px;text-align: center;">
				<!-- <img src="https://asurison.com/images/icon1.png"> <br> -->
				<!--<span style="color: #019ff0;font-weight: bold;">Your</span> Estimated Chances of <span style="color: #019ff0;font-weight: bold;">Acceptance</span>
			</p>-->
		</div>

<!--<div class="col-md-12">
<input type="submit" value="Finalize My List" class="btn btn-primary mybluebtn" style="margin-bottom: 32px;
    background: #019ff0;
    color: #fff;
    padding: 16px 34px;outline: none;
    border-radius: 50px;">
</div> -->
<div id="clgdatadiv">


<?php 

//echo "<pre>";


if(isset($_SESSION['data_profile']))
{
	$student_profile = $_SESSION['data_profile'];
}
else
{
	$student_profile = array();
}
if(isset($_SESSION['dataform1']))
{
	$list_buiders = $_SESSION['dataform1'];
}
else
{
	$list_buiders = array();
}

if(isset($_POST['clgcb'])) 
{
	if(!isset($_SESSION['clgcb']))
	{
		$_SESSION['clgcb'] = $_POST['clgcb'];
	}
	else
	{
		foreach($_POST['clgcb'] as $clglist)
		{
			if (!in_array($clglist, $_SESSION['clgcb']))
			{
				array_push($_SESSION['clgcb'],$clglist);
			}
		}
	}
	
	
}

//echo "Student Profile Data <br>";
//print_r($student_profile);
//echo "<br><br>";
//echo "List Buiders Data <br>";
//print_r($list_buiders);
//echo "<br><br>";
//echo "Selected College List <br>";
//print_r($_POST['clgcb']);

if(isset($_SESSION['data_profile']) ){
	//extract($_POST);
	$condition = '';
	/***** VB Code starts *****/
	$maxsatscore = 0.00; //Max SAT score value
	$maxactscore = 0.00; //Max ACT score value
	$maxgpa = 0.00; //Max GPA Value
	$maxapclass = 0.00; //Rigor of Coursework - Max AP class score
	$maxothhnrclass = 0.00; //Rigor of Coursework - Max other Honors class score
	$maxec4yr = 0.00; //Max Extracurricular Scale for 4 years+ commitment
	$maxec3yr = 0.00; //Max Extracurricular Scale for 3 years+ commitment
	$maxec2yr = 0.00; //Max Extracurricular Scale for 2 years+ commitment
	$maxec1yr = 0.00; //Max Extracurricular Scale for 1 years+ commitment
	//max wt fields for calculating student admissibility
	$testscorewt = 0.00;
	$gpawt = 0.00;
	$rigorwt = 0.00;
	$ecscorewt = 0.00;
	$edwt = 0.00;
	$awardswt = 0.00;
	//define input variables and set their default values to 0.00 or blank
	$hsgradyear = ''; //H.S. Graduation Year
	$testchoice = ''; //Only input options should be SAT or ACT
	//scoring variables
	$testsatscore = 0;
	$testactscore = 0;
	$gpa = 0.00;
	//Rigor of Coursework variables
	$rcapclscnt = 0; // Rigor of Coursework - count of AP Classes
	$rcothhrnclscnt = 0; // Rigor of Coursework - count of other Honors Classes
	$earlyapplydecs = 0; // Applying Early Decision? - Yes = 1, No = 0
	//Extracirricular Involvement variables
	$ecact4yr = 0; //Activities with 4 years+ commitment, range = 0-9
	$ecact3yr = 0; //Activities with 3 years+ commitment, range = 0-9
	$ecact2yr = 0; //Activities with 2 years+ commitment, range = 0-9
	$ecact1yr = 0; //Activities with 1 years+ commitment, range = 0-9
	$eclr4yr = 0; //Number of Leadership Roles with 4 years+ commitment, range = 0-9
	$eclr3yr = 0; //Number of Leadership Roles with 3 years+ commitment, range = 0-9
	$eclr2yr = 0; //Number of Leadership Roles with 2 years+ commitment, range = 0-9
	$eclr1yr = 0; //Number of Leadership Roles with 1 years+ commitment, range = 0-9
	//Awards variable
	$awardscnt = 0; //Awards Recieved, range = 0-9
	$admiscore = 0.00;
	$clgidarr = array();
	$hsgradyear = trim($_SESSION['data_profile']['hsgradyear']);
	$testchoice = trim($_SESSION['data_profile']['testchoice']);
	$testsatscore = trim($_SESSION['data_profile']['testsatscore_sat']);
	$testactscore = trim($_SESSION['data_profile']['testactscore_act']);
	$gpa = trim($_SESSION['data_profile']['gpa']);
	$rcapclscnt = trim($_SESSION['data_profile']['rcapclscnt']);
	$rcothhrnclscnt = trim($_SESSION['data_profile']['rcothhrnclscnt']);
	$earlyapplydecs = trim($_SESSION['data_profile']['earlyapplydecs']);
	/*
	$ecact4yr = trim($_POST['ecact4yr']);
	$eclr4yr = trim($_POST['eclr4yr']);
	$ecact3yr = trim($_POST['ecact3yr']);
	$eclr3yr = trim($_POST['eclr3yr']);
	$ecact2yr = trim($_POST['ecact2yr']);
	$eclr2yr = trim($_POST['eclr2yr']);
	$ecact1yr = trim($_POST['ecact1yr']);
	$eclr1yr = trim($_POST['eclr1yr']);
	*/
	//First Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_1'])){
		if(count($_SESSION['data_profile']['highest_grade_1'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_1'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_1'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_1'])== 4){
			$ecact4yr++;
		}
		else{}
		if(isset($_SESSION['data_profile']['leadership_roles_1'])){
			if($_SESSION['data_profile']['leadership_roles_1'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_1'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_1'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_1'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Second Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_2'])){
		
		if(count($_SESSION['data_profile']['highest_grade_2'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_2'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_2'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_2'])== 4){
			$ecact4yr++;
		}
		else{}
		if(isset($_SESSION['data_profile']['leadership_roles_2'])){
			if($_SESSION['data_profile']['leadership_roles_2'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_2'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_2'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_2'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Third Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_3'])){
		
		if(count($_SESSION['data_profile']['highest_grade_3'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_3'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_3'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_3'])== 4){
			$ecact4yr++;
		}
		else{}
		if(isset($_SESSION['data_profile']['leadership_roles_3'])){
			if($_SESSION['data_profile']['leadership_roles_3'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_3'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_3'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_3'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Fourth Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_4'])){
		
		if(count($_SESSION['data_profile']['highest_grade_4'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_4'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_4'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_4'])== 4){
			$ecact4yr++;
		}
		else{}
		
		if(isset($_SESSION['data_profile']['leadership_roles_4'])){
			if($_SESSION['data_profile']['leadership_roles_4'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_4'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_4'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_4'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
		
	}
	//Fifth Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_5'])){
		
		if(count($_SESSION['data_profile']['highest_grade_5'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_5'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_5'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_5'])== 4){
			$ecact4yr++;
		}
		else{}
		
		if(isset($_SESSION['data_profile']['leadership_roles_5'])){
			if($_SESSION['data_profile']['leadership_roles_5'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_5'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_5'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_5'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Sixth Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_6'])){
		
		if(count($_SESSION['data_profile']['highest_grade_6'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_6'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_6'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_6'])== 4){
			$ecact4yr++;
		}
		else{}
		if(isset($_SESSION['data_profile']['leadership_roles_6'])){
			if($_SESSION['data_profile']['leadership_roles_6'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_6'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_6'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_6'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Seventh Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_7'])){
		
		if(count($_SESSION['data_profile']['highest_grade_7'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_7'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_7'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_7'])== 4){
			$ecact4yr++;
		}
		else{}
		
		if(isset($_SESSION['data_profile']['leadership_roles_7'])){
			if($_SESSION['data_profile']['leadership_roles_7'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_7'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_7'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_7'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Eighth Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_8'])){
		
		if(count($_SESSION['data_profile']['highest_grade_8'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_8'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_8'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_8'])== 4){
			$ecact4yr++;			
		}
		else{}
		if(isset($_SESSION['data_profile']['leadership_roles_8'])){
			if($_SESSION['data_profile']['leadership_roles_8'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_8'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_8'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_8'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	//Nineth Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_9'])){
		
		if(count($_SESSION['data_profile']['highest_grade_9'])== 1){
			$ecact1yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_9'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_9'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_9'])== 4){
			$ecact4yr++;			
		}
		else{}
		
		if(isset($_SESSION['data_profile']['leadership_roles_9'])){
			if($_SESSION['data_profile']['leadership_roles_9'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_9'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_9'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_9'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
		
	}
	//Tenth Extra Curricular Activity
	if(isset($_SESSION['data_profile']['highest_grade_10'])){
		
		if(count($_SESSION['data_profile']['highest_grade_10'])== 1){
			$ecact1yr++;					
		}
		else if(count($_SESSION['data_profile']['highest_grade_10'])== 2){
			$ecact2yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_10'])== 3){
			$ecact3yr++;
		}
		else if(count($_SESSION['data_profile']['highest_grade_10'])== 4){
			$ecact4yr++;
			
		}
		else{}
		
		if(isset($_SESSION['data_profile']['leadership_roles_10'])){
			if($_SESSION['data_profile']['leadership_roles_10'][0] == 4){
				$eclr4yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_10'][0] == 3){
				$eclr3yr++;
			}
			else if($_SESSION['data_profile']['leadership_roles_10'][0] == 2){
				$eclr2yr++;
			}
			else  if($_SESSION['data_profile']['leadership_roles_10'][0] == 1){
				$eclr1yr++;
			}
			else{}
		}
	}
	/*
	echo 'ecact1yr: '.$ecact1yr.'<br/>';
	echo 'eclr1yr: '.$eclr1yr.'<br/>';
	echo 'ecact2yr: '.$ecact2yr.'<br/>';
	echo 'eclr2yr: '.$eclr2yr.'<br/>';
	echo 'ecact3yr: '.$ecact3yr.'<br/>';
	echo 'eclr3yr: '.$eclr3yr.'<br/>';
	echo 'ecact4yr: '.$ecact4yr.'<br/>';
	echo 'eclr4yr: '.$eclr4yr.'<br/>';
	*/
	
	$awardscnt = trim($_SESSION['data_profile']['awardscnt']);
	$stdataconvinparr = array(); //Student Data Converted Input Array
	$stdataconvinparr['testscore'] = ''; //Student Data Converted Input Test Score
	$stdataconvinparr['gpa'] = ''; //Student Data Converted Input GPA
	$stdataconvinparr['rigor'] = ''; //Student Data Converted Input Rigor
	$stdataconvinparr['ecscore'] = ''; //Student Data Converted Input EC Score
	$stdataconvinparr['ed'] = ''; //Student Data Converted Input ED
	$stdataconvinparr['awards'] = ''; //Student Data Converted Input Awards
	if($testsatscore > 0 || $testactscore > 0){		
		/*	
		//if either SAT or ACT score is provided, then use following formula else use different formula without score weight
		Test Score		40%
		GPA				40%
		Rigor			7%
		EC Score		7%
		ED				3%
		Awards			3%
		*/
		//If SAT score is input, use SAT score else use ACT score else set it to 0.00
		if($testsatscore > 0){
			$stdataconvinparr['testscore'] = ($testsatscore)/1600.0;
		}
		elseif($testactscore > 0){
			$stdataconvinparr['testscore'] = ($testactscore)/36.0;
		}
		else{
			$stdataconvinparr['testscore'] = 0.00;
		}
		$stdataconvinparr['gpa'] = $gpa/4.0;
		$stdataconvinparr['rigor'] = (($rcapclscnt*1) + ($rcothhrnclscnt*0.5))/6.0;
		$stdataconvinparr['ecscore'] = ( (($ecact4yr+$eclr4yr)*1.0) + (($ecact3yr+$eclr3yr)*0.75) + (($ecact2yr+$eclr2yr)*0.5) + (($ecact1yr+$eclr1yr)*0.25) )/10.0;
		$stdataconvinparr['ed'] = $earlyapplydecs/1.0;
		$stdataconvinparr['awards'] = $awardscnt/2.0;
		//print_r($stdataconvinparr);
		$stconvinptowtarr = array(); //Student Data Converted Input Array
		$stconvinptowtarr['testscore'] = ''; //Student Data Converted Input Test Score
		$stconvinptowtarr['gpa'] = ''; //Student Data Converted Input GPA
		$stconvinptowtarr['rigor'] = ''; //Student Data Converted Input Rigor
		$stconvinptowtarr['ecscore'] = ''; //Student Data Converted Input EC Score
		$stconvinptowtarr['ed'] = ''; //Student Data Converted Input ED
		$stconvinptowtarr['awards'] = ''; //Student Data Converted Input Awards
		$stconvinptowtarr['testscore'] = $stdataconvinparr['testscore'] * 40.0;
		$stconvinptowtarr['gpa'] = $stdataconvinparr['gpa'] * 40.0;
		$stconvinptowtarr['rigor'] = $stdataconvinparr['rigor'] * 7.0;
		$stconvinptowtarr['ecscore'] = $stdataconvinparr['ecscore'] * 7.0;
		$stconvinptowtarr['ed'] = $stdataconvinparr['ed'] * 3.0;
		$stconvinptowtarr['awards'] = $stdataconvinparr['awards'] * 3.0;
		//The admissibility score of the student
		$admiscore = $stconvinptowtarr['testscore'] + $stconvinptowtarr['gpa'] + $stconvinptowtarr['rigor'] + $stconvinptowtarr['ecscore'] + $stconvinptowtarr['ed'] + $stconvinptowtarr['awards'];
		
	}
	else{
		/*
		//If no test score is provided use this formulation
		Test Score		0%
		GPA				70%
		Rigor			17%
		EC Score		7%
		ED				3%
		Awards			3%
		*/
		$stdataconvinparr['testscore'] = 0.00;
		$stdataconvinparr['gpa'] = $gpa/4.0;
		$stdataconvinparr['rigor'] = (($rcapclscnt*1) + ($rcothhrnclscnt*0.5))/6.0;
		$stdataconvinparr['ecscore'] = ( (($ecact4yr+$eclr4yr)*1.0) + (($ecact3yr+$eclr3yr)*0.75) + (($ecact2yr+$eclr2yr)*0.5) + (($ecact1yr+$eclr1yr)*0.25) )/10.0;
		$stdataconvinparr['ed'] = $earlyapplydecs/1.0;
		$stdataconvinparr['awards'] = $awardscnt/2.0;
		//print_r($stdataconvinparr);
		$stconvinptowtarr = array(); //Student Data Converted Input Array
		$stconvinptowtarr['testscore'] = ''; //Student Data Converted Input Test Score
		$stconvinptowtarr['gpa'] = ''; //Student Data Converted Input GPA
		$stconvinptowtarr['rigor'] = ''; //Student Data Converted Input Rigor
		$stconvinptowtarr['ecscore'] = ''; //Student Data Converted Input EC Score
		$stconvinptowtarr['ed'] = ''; //Student Data Converted Input ED
		$stconvinptowtarr['awards'] = ''; //Student Data Converted Input Awards
		$stconvinptowtarr['testscore'] = $stdataconvinparr['testscore'] * 0.0;
		$stconvinptowtarr['gpa'] = $stdataconvinparr['gpa'] * 70.0;
		$stconvinptowtarr['rigor'] = $stdataconvinparr['rigor'] * 17.0;
		$stconvinptowtarr['ecscore'] = $stdataconvinparr['ecscore'] * 7.0;
		$stconvinptowtarr['ed'] = $stdataconvinparr['ed'] * 3.0;
		$stconvinptowtarr['awards'] = $stdataconvinparr['awards'] * 3.0;
		//The admissibility score of the student
		$admiscore = $stconvinptowtarr['testscore'] + $stconvinptowtarr['gpa'] + $stconvinptowtarr['rigor'] + $stconvinptowtarr['ecscore'] + $stconvinptowtarr['ed'] + $stconvinptowtarr['awards'];
		
	}
	
	//echo '<p class="avil-score-txt">Your Admissibility Score is: '.$admiscore.'</p><p><br/>';
	$_SESSION['admiscore']=$admiscore;
	$selclgsarr = $_SESSION['clgcb'];
	$selectedclgids = '';
	$selectedclgids = implode(",",$selclgsarr);	
	//$selclgsarr = (explode(",",$selectedclgids));
	//echo $selectedclgids;
	//print_r($selclgsarr);	
	$to_remove = array();
	$missedclgarr = array();
	if(strlen($selectedclgids)>0){
		//for input college ids, fetch threshold values and based on admissibility score set the flag value	of $flag
		$resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ");
		$countthm = 0;
		$counttr = 0;
		$counttm = 0;
		$countts = 0;
		$countnf = 0;
		$countall = $resclgth->num_rows;
		//echo '<button id="listsavebtn" class="btn btn-info mybluebtn" onclick=savelist()>Save List</button>';
			
		while ($rowclgth = mysqli_fetch_assoc($resclgth)){
			$unitid1 = $rowclgth['unitid'];

			$sqlSlug1 = "SELECT * FROM `hd2018` WHERE `UNITID` = '".$unitid1."'";
			$resultSlug1 = $con->query($sqlSlug1);
			$rowSlug1 = $resultSlug1->fetch_assoc();
			$slug = $rowSlug1['slug'];

			$indclgidarr =array();
			$indclgidarr['col1'] = '';
			$indclgidarr['THM'] = '';
			$indclgidarr['TR'] = '';
			$indclgidarr['UNITIDKALA'] = '';
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
				//$indclgidarr['THM'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['THM'] = $rowclgth['instnm'];
				$indclgidarr['INSTNM'] = $rowclgth['instnm'];
				$indclgidarr['UNITIDKALA'] = $rowclgth['unitid'];
				$indclgidarr['slug'] = $slug;
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = '';			
				$countthm++;
			}
			if($flag == 'TR'){
				$indclgidarr['THM'] = '';
				//$indclgidarr['TR'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['TR'] = $rowclgth['instnm'];
				$indclgidarr['INSTNM'] = $rowclgth['instnm'];
				$indclgidarr['UNITIDKALA'] = $rowclgth['unitid'];
				$indclgidarr['slug'] = $slug;
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = '';
				$counttr++;
			}
			if($flag == 'TM'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = '';
				//$indclgidarr['TM'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['TM'] = $rowclgth['instnm'];
				$indclgidarr['INSTNM'] = $rowclgth['instnm'];
				$indclgidarr['UNITIDKALA'] = $rowclgth['unitid'];
				$indclgidarr['slug'] = $slug;
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = '';
				$counttm++;
			}
			if($flag == 'TS'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = '';
				//$indclgidarr['TS'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['TS'] = $rowclgth['instnm'];
				$indclgidarr['INSTNM'] = $rowclgth['instnm'];
				$indclgidarr['UNITIDKALA'] = $rowclgth['unitid'];
				$indclgidarr['slug'] = $slug;
				$indclgidarr['NF'] = '';
				$countts++;
			}
			if($flag == 'NF'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = '';
				//$indclgidarr['NF'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['NF'] = $rowclgth['instnm'];
				$indclgidarr['INSTNM'] = $rowclgth['instnm'];
				$indclgidarr['UNITIDKALA'] = $rowclgth['unitid'];
				$indclgidarr['slug'] = $slug;
				$countnf++;
			}
			array_push($clgidarr,$indclgidarr);
			array_push($to_remove,$rowclgth['unitid']);
			
		}
		$missedclgarr = array_diff($selclgsarr, $to_remove);
		//echo 'No Threshold Values: <pre>';
		//print_r($missedclgarr);
	}
}
$INSTNM = array_column($clgidarr, 'INSTNM');
array_multisort($INSTNM, SORT_ASC, $clgidarr);


?>	
		</div>
	

<div class="mb-22 tab_results" >
<div class="tab mytab-w100">
	<button class="tablinks active" onclick="openCollage(event, 'showall')">Show All</button>
  	<button class="tablinks tabbtn1" onclick="openCollage(event, 'longshot')" id="defaultOpen">Long Shot</button>
  	<button class="tablinks tabbtn2" onclick="openCollage(event, 'Reach')">Reach</button>
  	<button class="tablinks tabbtn3" onclick="openCollage(event, 'Match')">Match</button>
  	<button class="tablinks tabbtn4" onclick="openCollage(event, 'Safety')">Likely</button>
  	<button class="tablinks tabbtn5" onclick="openCollage(event, 'research')">More Research Needed</button>
</div>
	
<!--alert box-->
<section class="estimatedAlert">
	<div class="row">
		<div class="myresultalert estimatedalert-wrap">
			<div class="col-sm-12 col-md-12 col-xs-12">
				<div class="alert alert-warning alert-dismissible fade in alert-select-school">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xs-12">
							<span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Please note that this tool provides only a preliminary estimate of your chances of acceptance. <a href="#" data-toggle="modal" data-target="#estimatedDisclaimer">Click here</a> to review the disclaimer before proceeding.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--popup-->
	<!-- Modal -->
  <div class="modal fade" id="estimatedDisclaimer" role="dialog">
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
<!--end alert box-->
	
<div class="result_college myresults-w100">
<div id="showall" class="tabcontent">
 
</div>
<div id="longshot" class="tabcontent estimated-acceptance longcontent">
<?php
if($countthm < 1){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($countthm > 0 && $countthm < 3){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($countthm > 2 && $countthm < 4 ){
		echo '<div class="box_div col-sm-12">';
	}
	else if($countthm > 3 ){
		echo '<div class="box_div col-sm-12">';
	}
	else{
		echo '<div class="box_div col-sm-12">';
	}
?>
 
		<h3>Long Shot</h3>
	<!--show scroll icon in mobile if scroll exist-->
	 <div class="scroll-downs LongScroll hidescroll" data-toggle="tooltip" title="Scroll down to see more schools">
  		<div class="mousey">
    		<div class="scroller"></div>
  		</div>
	</div>
		<?php
			if($countthm < 1){
				echo '<p class="estimated-p"><i>We did not find colleges in this category. Try broadening your college preferences or selecting additional schools.</i></p>';
			}		
		?>
		<div class="row">
			<div class="clg-result-list longList">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['THM'])){
						echo '<div class="col-sm-12 col-md-12 pr-15"  id="li'.$clg['UNITIDKALA'].'">';
						echo '<ul class="result-card-list">';
						echo '<li><a  href="school-profile/'.$clg['slug'].'" target="_blank">'.$clg['THM'].'</a><span class="deleteclg" onclick="removeselectedclgcb('.$clg['UNITIDKALA'].')">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span></li>';
						echo '</ul>';
						echo '</div>';
						
					}					
				}
			?>
			<!--END Loop-->
			</div>
		</div>
	
	
	<div class="row estimated-btns">
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#longshotwhatbutton">What's this?</a>
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#longshotspecialbutton">Special Tip</a>
	</div>
	
		<!-- Modal -->
<div id="longshotwhatbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">What's this?</h4>
      </div>
      <div class="modal-body">
        <p>A college is considered a 'Long Shot' when your student data is well below the average profile for admitted students at this institution. This category should be used sparingly and reserved for 'dream' schools. Admission to a 'Long Shot' is rare, but students that can convey a deep passion for attending the institution may be considered for admission. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.</p>
      </div>
    </div>

  </div>
</div>
	
<div id="longshotspecialbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Special Tip</h4>
      </div>
      <div class="modal-body">
        <p>Finding colleges for your "Long Shot" category is about dreaming big. Set aside your doubts and worries, and pick a few of the best schools you can!</p>
      </div>
    </div>

  </div>
</div>
	

</div>
	
</div>

<div id="Reach" class="tabcontent estimated-acceptance reachcontent">
<?php
if($counttr < 2){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttr > 1 && $counttr < 3){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttr > 2 && $counttr < 5 ){
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttr > 4 && $counttr < 6 ){
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttr > 5 ){
		echo '<div class="box_div col-sm-12">';
	}
	else{
		echo '<div class="box_div col-sm-12">';
	}
?>

	<h3>Reach</h3>
	<!--show scroll icon in mobile if scroll exist-->
	 <div class="scroll-downs reachScroll hidescroll" data-toggle="tooltip" title="Scroll down to see more schools">
  		<div class="mousey">
    		<div class="scroller"></div>
  		</div>
	</div>
	<?php
		if($counttr < 1){
			echo '<p class="estimated-p"><i>We did not find colleges in this category. Try broadening your college preferences or selecting additional schools.</i></p>';
		}		
	?>
	<div class="row">
		<div class="clg-result-list reachList">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['TR'])){
						echo '<div class="col-sm-12 col-md-12 pr-15"  id="li'.$clg['UNITIDKALA'].'">';
						echo '<ul class="result-card-list">';
						echo '<li><a  href="school-profile/'.$clg['slug'].'" target="_blank">'.$clg['TR'].'</a><span class="deleteclg" onclick="removeselectedclgcb('.$clg['UNITIDKALA'].')">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span></li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
		</div>
		</div>
	
	<!--bottom button section-->
	<div class="row estimated-btns">
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#reachwhatbutton">What's this?</a>
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#reachspecialbutton">Special Tip</a>
	</div>
	
	<!-- Modal -->
<div id="reachwhatbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">What's this?</h4>
      </div>
      <div class="modal-body">
        <p>A college is considered a 'Reach' when your student data is below the average profile for admitted students at this institution. You are still within range to be considered for admission but will need to rely on the quality of your writing, letters of recommendation, and intangibles not represented in academic data to impress the admissions team. Providing high-quality application materials will help ensure that you are considered for admission at your reach schools. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.</p>
      </div>
    </div>

  </div>
</div>
	
<div id="reachspecialbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Special Tip</h4>
      </div>
      <div class="modal-body">
        <p>Finding colleges for your “Reach” category is about believing in yourself. Be sure you’re not limiting your options by selecting only schools you believe are safe.</p>
      </div>
    </div>

  </div>
</div>
	<!--end bottom btn section-->
</div>
</div>
<div id="Match" class="tabcontent estimated-acceptance matchcontent">
<?php
if($counttm < 2){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttm > 1 && $counttm < 3){
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttm > 2 && $counttm < 5 ){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttm > 4 && $counttm < 6 ){		
		echo '<div class="box_div col-sm-12">';
	}
	else if($counttm > 5 ){		
		echo '<div class="box_div col-sm-12">';
	}
	else{
		echo '<div class="box_div col-sm-12">';
	}
?>
 
	<h3>Match</h3>
	<!--show scroll icon in mobile if scroll exist-->
	 <div class="scroll-downs matchScroll hidescroll" data-toggle="tooltip" title="Scroll down to see more schools">
  		<div class="mousey">
    		<div class="scroller"></div>
  		</div>
	</div>
	<?php
		if($counttm < 1){
			echo '<p class="estimated-p"><i>We did not find colleges in this category. Try broadening your college preferences or selecting additional schools.</i></p>';
		}		
	?>
	<div class="row">
		<div class="clg-result-list matchList">
			<!--START Loop-->
			<?php
			
				
				foreach($clgidarr as $clg){
					if(!empty($clg['TM'])){
						echo '<div class="col-sm-12 col-md-12 pr-15"  id="li'.$clg['UNITIDKALA'].'">';
						echo '<ul class="result-card-list">';
						echo '<li><a  href="school-profile/'.$clg['slug'].'" target="_blank">'.$clg['TM'].'</a><span class="deleteclg" onclick="removeselectedclgcb('.$clg['UNITIDKALA'].')">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span></li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
		</div>
		</div>
	<div class="row estimated-btns">
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#matchwhatbutton">What's this?</a>
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#matchspecialbutton">Special Tip</a>
	</div>
		<!-- Modal -->
<div id="matchwhatbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">What's this?</h4>
      </div>
      <div class="modal-body">
        <p>A college is considered a 'Match' when your student data is close to the average profile for admitted students at this institution. You may be slightly above or below the target profile that this college will admit, but are in the sweet spot for admission. Match colleges are the backbone of your college list and should represent institutions that are perfect fits for your financial, social, and academic goals. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.</p>
      </div>
    </div>

  </div>
</div>
	
	<div id="matchspecialbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Special Tip</h4>
      </div>
      <div class="modal-body">
        <p>Finding colleges for your "Match" category is about planning for success. A willingness to find happiness at a greater number of schools is a recipe for success and satisfaction.</p>
      </div>
    </div>

  </div>
</div>

</div>
</div>
<div id="Safety" class="tabcontent estimated-acceptance safetycontent">
<?php
if($countts < 2){		
		echo '<div class="box_div col-sm-12 estimated-acceptance">';
	}
	else if($countts > 1 && $countts < 3){
		echo '<div class="box_div col-sm-12">';
	}
	else if($countts > 2 && $countts < 5 ){
		echo '<div class="box_div col-sm-12">';
	}
	else if($countts > 4 && $countts < 6 ){
		echo '<div class="box_div col-sm-12">';
	}
	else if($countts > 5 ){
		echo '<div class="box_div col-sm-12">';
	}
	else{
		echo '<div class="box_div col-sm-12">';
	}
?>

	<h3>Likely</h3>
	<!--show scroll icon in mobile if scroll exist-->
	 <div class="scroll-downs safetyScroll hidescroll" data-toggle="tooltip" title="Scroll down to see more schools">
  		<div class="mousey">
    		<div class="scroller"></div>
  		</div>
	</div>
	<?php
		if($countts < 1){
			echo '<p class="estimated-p"><i>We did not find colleges in this category. Try broadening your college preferences or selecting additional schools.</i></p>';
		}		
	?>
	<div class="row">
		<div class="clg-result-list safetyList">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['TS'])){
						echo '<div class="col-sm-12 col-md-12 pr-15"  id="li'.$clg['UNITIDKALA'].'">';
						echo '<ul class="result-card-list">';
						echo '<li><a  href="school-profile/'.$clg['slug'].'" target="_blank">'.$clg['TS'].'</a><span class="deleteclg" onclick="removeselectedclgcb('.$clg['UNITIDKALA'].')">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span></li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
		</div>
		</div>
	<div class="row estimated-btns">
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#safetywhatbutton">What's this?</a>
		<a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#safetyspecialbutton">Special Tip</a>
	</div>
	
			<!-- Modal -->
<div id="safetywhatbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">What's this?</h4>
      </div>
      <div class="modal-body">
        <p>A college is considered a 'Likely' when your student data is above the average profile for admitted students at this institution. Although there are no 'sure things' in college admissions, your student profile will be highly attractive to admissions teams at your Likely schools. They are looking for students like you to fill their class of students each year and barring any red-flags or uncommon circumstances will likely be excited to extend you an offer of admission. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.</p>
      </div>
    </div>

  </div>
</div>
	
	<div id="safetyspecialbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Special Tip</h4>
      </div>
      <div class="modal-body">
        <p>Finding colleges for your "Likely" category is about planning for the unexpected. Fortune favors the prepared, so select some schools that you think are likely to accept you! (And remember that any school you attend will be the springboard for a lifetime of happiness and success!)</p>
      </div>
    </div>

  </div>
</div>
	
</div>
</div>
<!--
<div id="notafit" class="tabcontent">
 <div class="box_div col-sm-12" style="border-bottom: 5px solid #019ff0;">
	<h3>Not a Fit <a href="javascript:void(0)" tabindex="0" data-toggle="popover" data-trigger="focus" data-content="Based on the data your provided, and the reported data by the colleges, our algorithms could not fit the colleges within the above categories. However, due to the holistic and independent nature of the admissions process it is recommended that you do additional research and speak to an admissions consultant or counselor to determine if these schools are a good fit for your college list."><i class="faq_qa fa fa-question-circle" aria-hidden="true"></i></a></h3>
	<div class="row">
			<!--START Loop-->
			<?php
			/*
				foreach($clgidarr as $clg){
					if(!empty($clg['NF'])){
						echo '<div class="col-sm-12 col-md-12 pr-15">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$clg['NF'].'</li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			*/
				
			?>
			<!--END Loop-->
		<!--</div>-->
		<!--<a class="btn rationale_btn mybluebtn" data-toggle="collapse" href="#rationale5" role="button" aria-expanded="false" aria-controls="collapseExample">Is this balanced?</a>-->
<!--
	<div class="collapse" id="rationale5">
		<div class="card card-body">
			This section represents the list of colleges which are either outside the range of Long Shot or insufficient data available for those colleges
			to determine the admissibility.
		</div>
	</div>
</div>
</div>
-->

<div class="row result-center-section">
<div id="research" class="tabcontent estimated-acceptance researchcontent">
 <div class="box_div col-sm-12 last-item">
	<h3>More Research Needed</h3>
	 <!--show scroll icon in mobile if scroll exist-->
	 <div class="scroll-downs researchScroll hidescroll" data-toggle="tooltip" title="Scroll down to see more schools">
  		<div class="mousey">
    		<div class="scroller"></div>
  		</div>
	</div>
	<?php
		if(count($missedclgarr) < 1){
			echo '<p class="estimated-p"><i>We did not find colleges in this category. Try broadening your college preferences or selecting additional schools.</i></p>';
		}		
	?> 
	 
	 
	<div class="row">
		
		<div id="researchList" class="clg-result-list researchList">
			<!--START Loop-->
			<?php
				
				if(count($missedclgarr) > 0){
					$missedclgstr = implode(",",$missedclgarr);
					
					$resclg = mysqli_query($con, "SELECT * FROM `school_ranking` where unitid in ($missedclgstr ) ORDER BY INSTNM ASC ");
					while ($rowclg = mysqli_fetch_assoc($resclg)){
						$unitid = $rowclg['UNITID'];
						$sqlSlug = "SELECT * FROM `hd2018` WHERE `UNITID` = '".$unitid."'";
						$resultSlug = $con->query($sqlSlug);
						$rowSlug = $resultSlug->fetch_assoc();
						  $slug = $rowSlug['slug'];


						echo '<div class="col-sm-12 col-md-12 pr-15" id="li'.$rowclg['UNITID'].'">';
						echo '<ul class="result-card-list">';
						echo '<li  ><a  href="school-profile/'.$slug.'" target="_blank">'.$rowclg['INSTNM'].'</a>	<span class="deleteclg" onclick="removeselectedclgcb('.$rowclg['UNITID'].')">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span></li>';
						echo '</ul>';
						echo '</div>';
						
					}
				}
				foreach($clgidarr as $clg){
					if(!empty($clg['NF'])){
						echo '<div class="col-sm-12 col-md-12 pr-15" id="li'.$clg['UNITIDKALA'].'">';
						echo '<ul class="result-card-list">';
						echo '<li ><a  href="school-profile/'.$clg['slug'].'" target="_blank">'.$clg['NF'].'</a><span class="deleteclg" onclick="removeselectedclgcb('.$clg['UNITIDKALA'].')">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span></li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
				
			?>
			<!--END Loop-->
			</div>
		</div>
	 <div class="row estimated-btns">
		 <a class="btn rationale_btn mybluebtn" data-toggle="modal" data-target="#researchwhatbutton">What's this?</a>
	</div>
		
	 
	 			<!-- Modal -->
<div id="researchwhatbutton" class="modal fade estimated-model-content" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">What's this?</h4>
      </div>
      <div class="modal-body">
        <p>Colleges in this category either do not report sufficient information to properly evaluate admissibility based on our metrics or our algorithms could not fit the colleges within the above categories based on the data you provided. As a result, more research is needed to evaluate the fit. You should speak to an admissions consultant or college counselor to determine if the schools in this category are a good fit for your college list.</p>
      </div>
    </div>

  </div>
</div>
	 
</div>
</div>
	
	
</div>
	<!--click here to find out button-->
	<section class="find-out-btn">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="find-text">
							<span>How many colleges should be on your list?</span>
						</div>
					<div class="find-out-wrap">
						<div class="estimatedbackbtn">
							<div class="blueBtnBigdiv text-center">
								<a class="btn btn-default prev mybluebtn blue-outline btn-center-xs" href="college-search.php">Back</a>
							</div>
						</div>
						<div class="find-btn">
						<form action="resultlistlogic.php" method="post" accept-charset="utf-8">
							<input type="hidden" value="<?php echo $selectedclgids; ?>" name="selectedclgids">
							<button type="submit" class="chance-of-acceptance">Find Out!</button>
        				</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--click here to find out button end-->

	 <!--back button-->
	<!--<div class="row estimatedbackbtn">
		<div class="mt-30 mb-30 blueBtnBigdiv text-center">
			<a class="btn btn-default prev mybluebtn blue-outline btn-center-xs" href="college-search.php">Back</a>
		</div>
	</div>-->
	<!--end back button-->
</div>


</div>



</section>
<script>
$('.loading').hide();
function removeselectedclgcb(unitid)
{
	var element = "#li"+unitid;
	 $.ajax({
		type: "POST",
		url: "includes/set_unset_clg.php",
		dataType: 'text',
		data: {
			unitid: unitid,
			action: 'unset'
		},
		cache: false,
		async: false,
		beforeSend: function () {
			$('.loading').show();
		},
		success: function (data) {
			//	$(element).remove();
			location.reload();
		},
		complete: function () {
			$('.loading').hide();
		}
	});
	return false;
}	
</script>

<?php include 'footer.php'; ?>
