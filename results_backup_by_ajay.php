<?php include 'header.php'; ?>
<style>

#msform , .msform{
        font-size: 22px;
}
a.btn.rationale_btn {
    font-size: 14px !important;
}

	</style>
	<link href="css/custom.css" rel="stylesheet">
<section class="College-Search-result apj-collage-search">
   <div class="container">

   	   				<!-- MultiStep Form -->
<div class="container-fluid" >
    <div class="row justify-content-center mt-0">
       <!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
           <div class="cards px-0 pt-4 pb-0 mt-3 mb-3"> -->
       <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
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
</div>
     <div class="row">
		<div class="result col-sm-12">
			<p style="font-size: 37px;text-align: center;">
				<!-- <img src="https://asurison.com/images/icon1.png"> <br> -->
				<span style="color: #019ff0;font-weight: bold;">Your</span> Estimated Chances of <span style="color: #019ff0;font-weight: bold;">Acceptance</span>
			</p>
		</div>

<div class="col-md-12">
<!--<input type="submit" value="Finalize My List" class="btn btn-primary" style="margin-bottom: 32px;
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
	$_SESSION['clgcb'] = $_POST['clgcb'];
	
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
	$selclgsarr = $_POST['clgcb'];
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
		//echo '<button id="listsavebtn" class="btn btn-info" onclick=savelist()>Save List</button>';
			
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
				//$indclgidarr['THM'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['THM'] = $rowclgth['instnm'];
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

?>	
		</div>
	

<div class="mb-22 tab_results" >
<div class="tab">
	<button class="tablinks active" onclick="openCollage(event, 'showall')">Show All</button>
  <button class="tablinks " onclick="openCollage(event, 'longshot')" id="defaultOpen">Long Shot</button>
  <button class="tablinks" onclick="openCollage(event, 'Reach')">Reach</button>
  <button class="tablinks" onclick="openCollage(event, 'Match')">Match</button>
  <button class="tablinks" onclick="openCollage(event, 'Safety')">Safety</button>
  <button class="tablinks" onclick="openCollage(event, 'research')">More Research Needed</button>
  
</div>
<div class="result_college">
<div id="showall" class="tabcontent">
 
</div>
<div id="longshot" class="tabcontent">
<?php
if($countthm < 1){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($countthm > 0 && $countthm < 3){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #42FF00;">';
	}
	else if($countthm > 2 && $countthm < 4 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($countthm > 3 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else{
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #019ff0;">';
	}
?>
 
		<h3>Long Shot</h3>
		<div class="row">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['THM'])){
						echo '<div class="col-sm-12 col-md-6">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$clg['THM'].'</li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
			
		</div>
		<a class="btn rationale_btn" data-toggle="collapse" href="#rationale1" role="button" aria-expanded="false" aria-controls="collapseExample">What's this?</a>
	<div class="collapse" id="rationale1">
		<div class="card card-body">
			A college is considered a 'Long Shot' when your student data is well below the average profile for admitted students at this institution. This category should be used sparingly and reserved for 'dream' schools. Admission to a 'Long Shot' is rare, but students that can convey a deep passion for attending the institution may be considered for admission. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.
		</div>
	</div>
</div>
</div>

<div id="Reach" class="tabcontent">
<?php
if($counttr < 2){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else if($counttr > 1 && $counttr < 3){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($counttr > 2 && $counttr < 5 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #42FF00;">';
	}
	else if($counttr > 4 && $counttr < 6 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($counttr > 5 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else{
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #019ff0;">';
	}
?>

	<h3>Reach</h3>
	<div class="row">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['TR'])){
						echo '<div class="col-sm-12 col-md-6">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$clg['TR'].'</li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
		</div>
		<a class="btn rationale_btn" data-toggle="collapse" href="#rationale2" role="button" aria-expanded="false" aria-controls="collapseExample">What's this?</a>

	<div class="collapse" id="rationale2">
		<div class="card card-body">
			A college is considered a 'Reach' when your student data is below the average profile for admitted students at this institution. You are still within range to be considered for admission but will need to rely on the quality of your writing, letters of recommendation, and intangibles not represented in academic data to impress the admissions team. Providing high-quality application materials will help ensure that you are considered for admission at your reach schools.Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.
		</div>
	</div>
</div>
</div>

<div id="Match" class="tabcontent">
<?php
if($counttm < 2){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else if($counttm > 1 && $counttm < 3){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($counttm > 2 && $counttm < 5 ){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #42FF00;">';
	}
	else if($counttm > 4 && $counttm < 6 ){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($counttm > 5 ){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else{
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #019ff0;">';
	}
?>
 
	<h3>Match</h3>
	<div class="row">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['TM'])){
						echo '<div class="col-sm-12 col-md-6">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$clg['TM'].'</li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
		</div>
		<a class="btn rationale_btn" data-toggle="collapse" href="#rationale3" role="button" aria-expanded="false" aria-controls="collapseExample">What's this?</a>

	<div class="collapse" id="rationale3">
		<div class="card card-body">
			A college is considered a 'Match' when your student data is close to the average profile for admitted students at this institution. You may be slightly above or below the target profile that this college will admit, but are in the sweet spot for admission. Match colleges are the backbone of your college list and should represent institutions that are perfect fits for your financial, social, and academic goals. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.
		</div>
	</div>
</div>
</div>
<div id="Safety" class="tabcontent">
<?php
if($countts < 2){		
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else if($countts > 1 && $countts < 3){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($countts > 2 && $countts < 5 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #42FF00;">';
	}
	else if($countts > 4 && $countts < 6 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FFFF00;">';
	}
	else if($countts > 5 ){
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #FF0000;">';
	}
	else{
		echo '<div class="box_div col-sm-12" style="border-bottom: 5px solid #019ff0;">';
	}
?>

	<h3>Safety</h3>
	<div class="row">
			<!--START Loop-->
			<?php
				foreach($clgidarr as $clg){
					if(!empty($clg['TS'])){
						echo '<div class="col-sm-12 col-md-6">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$clg['TS'].'</li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
			?>
			<!--END Loop-->
		</div>
		<a class="btn rationale_btn" data-toggle="collapse" href="#rationale4" role="button" aria-expanded="false" aria-controls="collapseExample">What's this?</a>

	<div class="collapse" id="rationale4">
		<div class="card card-body">
			A college is considered a 'Safety' when your student data is above the average profile for admitted students at this institution. Although there are no 'sure things' in college admissions, your student profile will be highly attractive to admissions teams at your safety schools. They are looking for students like you to fill their class of students each year and barring any red-flags or uncommon circumstances will likely be excited to extend you an offer of admission. Please note that there is a limit to the accuracy of our predictability due to the holistic nature of the admissions process. You should speak to an admissions consultant or counselor to determine if the schools in this category are a good fit for your college list.
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
						echo '<div class="col-sm-12 col-md-6">';
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
		<!--<a class="btn rationale_btn " data-toggle="collapse" href="#rationale5" role="button" aria-expanded="false" aria-controls="collapseExample">Is this balanced?</a>-->
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


<div id="research" class="tabcontent">
 <div class="box_div col-sm-12" style="border-bottom: 5px solid #019ff0;">
	<h3>More Research Needed</h3>
	<div class="row">
			<!--START Loop-->
			<?php
				
				if(count($missedclgarr) > 0){
					$missedclgstr = implode(",",$missedclgarr);
					
					$resclg = mysqli_query($con, "SELECT * FROM `school_ranking` where unitid in ($missedclgstr ) ");
					while ($rowclg = mysqli_fetch_assoc($resclg)){
						echo '<div class="col-sm-12 col-md-6">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$rowclg['INSTNM'].'</li>';
						echo '</ul>';
						echo '</div>';
						
					}
				}
				foreach($clgidarr as $clg){
					if(!empty($clg['NF'])){
						echo '<div class="col-sm-12 col-md-6">';
						echo '<ul class="result-card-list">';
						echo '<li>'.$clg['NF'].'</li>';
						echo '</ul>';
						echo '</div>';		
					}					
				}
				
			?>
			<!--END Loop-->
		</div>
		<a class="btn rationale_btn " data-toggle="collapse" href="#rationale5" role="button" aria-expanded="false" aria-controls="collapseExample">What's this?</a>

	<div class="collapse" id="rationale5">
		<div class="card card-body">
			Colleges in this category either do not report sufficient information to properly evaluate admissibility based on our metrics or our algorithms could not fit the colleges within the above categories based on the data you provided. As a result, more research is needed to evaluate the fit. You should speak to an admissions consultant or college counselor to determine if the schools in this category are a good fit for your college list.
		</div>
	</div>
</div>
</div>

        <div class="bottom-sec">
        	<form action="resultlistlogic.php" method="post" accept-charset="utf-8">
			<input type="hidden" value="<?php echo $selectedclgids; ?>" name="selectedclgids">
        		<button type="submit" class="text-center chance-of-acceptance hidden-mobile"><img src="images/footer-resultpage-btn.jpg" alt=""></button>
<button type="submit" class="text-center chance-of-acceptance hidden-desktop"><img src="images/footer-resultpage-btn-sm.jpg" alt=""></button>
        
        	</form>

 </div>
</div>



</div>



</section>
<?php include 'footer.php'; ?>
