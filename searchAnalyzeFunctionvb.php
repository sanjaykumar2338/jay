<?php 
require_once 'includes/config.php';
if(isset($_POST) ):
	
	extract($_POST);
	$condition = '';

//print_r($selectedclgids);
//for integrating search and analyze together
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
/*
$resstdscales = mysqli_query($con, "SELECT * FROM `stdscale` order by id desc limit 1");
while ($rowstdscales = mysqli_fetch_assoc($resstdscales)){
	$maxsatscore = $rowstdscales['maxsatscore'];
	$maxactscore = $rowstdscales['maxactscore'];
	$maxgpa = $rowstdscales['maxgpa'];
	$maxapclass = $rowstdscales['maxapclass'];
	$maxothhnrclass = $rowstdscales['maxothhnrclass'];
	$maxrigorscale = $rowstdscales['maxrigorscale'];
	$maxecscale = $rowstdscales['maxecscale'];
	$maxedscale = $rowstdscales['maxedscale'];
	$maxawardscale = $rowstdscales['maxawardscale'];
	$maxec4yr = $rowstdscales['maxec4yr'];
	$maxec3yr = $rowstdscales['maxec3yr'];
	$maxec2yr = $rowstdscales['maxec2yr'];
	$maxec1yr = $rowstdscales['maxec1yr'];		
	
	//max wt fields for calculating student admissibility
	$testscorewt = $rowstdscales['testscorewt'];
	$gpawt = $rowstdscales['gpawt'];
	$rigorwt = $rowstdscales['rigorwt'];
	$ecscorewt = $rowstdscales['ecscorewt'];
	$edwt = $rowstdscales['edwt'];
	$awardswt = $rowstdscales['awardswt'];
}
*/
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

$hsgradyear = trim($_POST['hsgradyear']);
$testchoice = trim($_POST['testchoice']);
$testsatscore = trim($_POST['testsatscore']);
$testactscore = trim($_POST['testactscore']);
$gpa = trim($_POST['gpa']);
$rcapclscnt = trim($_POST['rcapclscnt']);
$rcothhrnclscnt = trim($_POST['rcothhrnclscnt']);
$earlyapplydecs = trim($_POST['earlyapplydecs']);
$ecact4yr = trim($_POST['ecact4yr']);
$eclr4yr = trim($_POST['eclr4yr']);
$ecact3yr = trim($_POST['ecact3yr']);
$eclr3yr = trim($_POST['eclr3yr']);
$ecact2yr = trim($_POST['ecact2yr']);
$eclr2yr = trim($_POST['eclr2yr']);
$ecact1yr = trim($_POST['ecact1yr']);
$eclr1yr = trim($_POST['eclr1yr']);
$awardscnt = trim($_POST['awardscnt']);

$stdataconvinparr = array(); //Student Data Converted Input Array
$stdataconvinparr['testscore'] = ''; //Student Data Converted Input Test Score
$stdataconvinparr['gpa'] = ''; //Student Data Converted Input GPA
$stdataconvinparr['rigor'] = ''; //Student Data Converted Input Rigor
$stdataconvinparr['ecscore'] = ''; //Student Data Converted Input EC Score
$stdataconvinparr['ed'] = ''; //Student Data Converted Input ED
$stdataconvinparr['awards'] = ''; //Student Data Converted Input Awards


//Calculate each element of converted input array based on student input


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
	//echo "<p style='font-size:16px;background-color:yellow;'>";

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
	//echo "<p style='font-size:16px;background-color:yellow;'>";
	
	
	
}


echo 'Your Admissibility Score is: '.$admiscore.'<p><br/>';

/***** VB Code ends *******/
			
if(strlen($selectedclgids)>0){
	
	//for input college ids, fetch threshold values and based on admissibility score set the flag value	of $flag
	$resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ");
	$countthm = 0;
	$counttr = 0;
	$counttm = 0;
	$countts = 0;
	$countall = $resclgth->num_rows;
	//echo '<button id="listsavebtn" class="btn btn-info" onclick=savelist()>Save List</button>';
	echo '<span class="no_of_result">'.$countall.' Results </span>';
	echo '<input type="hidden" class="form-control" id="admiscore"  name="admiscore" value="'.$admiscore.'">';	
	
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
			$countts++;
		}
		array_push($clgidarr,$indclgidarr);
	}
	echo '<table class="table" id="table_id">
		<thead><tr><th></th><th>Long Shot</th><th>Reach</th><th>Match</th><th>Safety</th><th>More Research Needed</th></tr></thead>
		<tbody>';
	foreach($clgidarr as $indarr){
		echo '<tr><td>'.$indarr['col1'].'</td>';
		echo '<td>'.$indarr['THM'].'</td>';
		echo '<td>'.$indarr['TR'].'</td>';
		echo '<td>'.$indarr['TM'].'</td>';
		echo '<td>'.$indarr['TS'].'</td>';
		echo '<td>'.$indarr['NF'].'</td>';
		echo '<td></td>';
		echo '</tr>';		
		
	}
	/*
	echo '<tr><td>Count</td>';
	if($countthm < 1){
		echo '<td bgcolor="yellow" style="color:#000">'.$countthm.'</td>';
	}
	else if($countthm > 0 && $countthm < 3){
		echo '<td bgcolor="green" style="color:#fff">'.$countthm.'</td>';
	}
	else if($countthm > 2 && $countthm < 4 ){
		echo '<td bgcolor="yellow" style="color:#000">'.$countthm.'</td>';
	}
	else if($countthm > 3 ){
		echo '<td bgcolor="red" style="color:#fff">'.$countthm.'</td>';
	}
	else{}
	
	if($counttr < 2){
		echo '<td bgcolor="red" style="color:#fff">'.$counttr.'</td>';
	}
	else if($counttr > 1 && $counttr < 3){
		echo '<td bgcolor="yellow" style="color:#000">'.$counttr.'</td>';
	}
	else if($counttr > 2 && $counttr < 5 ){
		echo '<td bgcolor="green" style="color:#fff">'.$counttr.'</td>';
	}
	else if($counttr > 4 && $counttr < 6 ){
		echo '<td bgcolor="yellow" style="color:#000">'.$counttr.'</td>';
	}
	else if($counttr > 5 ){
		echo '<td bgcolor="red" style="color:#fff">'.$counttr.'</td>';
	}
	else{}
	
	if($counttm < 2){
		echo '<td bgcolor="red" style="color:#fff">'.$counttm.'</td>';
	}
	else if($counttm > 1 && $counttm < 3){
		echo '<td bgcolor="yellow" style="color:#000">'.$counttm.'</td>';
	}
	else if($counttm > 2 && $counttm < 5 ){
		echo '<td bgcolor="green" style="color:#fff">'.$counttm.'</td>';
	}
	else if($counttm > 4 && $counttm < 6 ){
		echo '<td bgcolor="yellow" style="color:#000">'.$counttm.'</td>';
	}
	else if($counttm > 5 ){
		echo '<td bgcolor="red" style="color:#fff">'.$counttm.'</td>';
	}
	else{}
	
	if($countts < 2){
		echo '<td bgcolor="red" style="color:#fff">'.$countts.'</td>';
	}
	else if($countts > 1 && $countts < 3){
		echo '<td bgcolor="yellow" style="color:#000">'.$countts.'</td>';
	}
	else if($countts > 2 && $countts < 5 ){
		echo '<td bgcolor="green" style="color:#fff">'.$countts.'</td>';
	}
	else if($countts > 4 && $countts < 6 ){
		echo '<td bgcolor="yellow" style="color:#000">'.$countts.'</td>';
	}
	else if($countts > 5 ){
		echo '<td bgcolor="red" style="color:#fff">'.$countts.'</td>';
	}
	else{}
	
	if($countall < 7){
		echo '<td bgcolor="red" style="color:#fff">'.$countall.'</td>';
	}
	else if($countall > 6 && $countall < 9){
		echo '<td bgcolor="yellow" style="color:#000">'.$countall.'</td>';
	}
	else if($countall > 8 && $countall < 13 ){
		echo '<td bgcolor="green" style="color:#fff">'.$countall.'</td>';
	}
	else if($countall > 12 && $countall < 15 ){
		echo '<td bgcolor="yellow" style="color:#000">'.$countall.'</td>';
	}
	else if($countall > 14 ){
		echo '<td bgcolor="red" style="color:#fff">'.$countall.'</td>';
	}
	else{}
	
	echo '</tr>';
	*/
	echo '<tr><td>Rationale</td>';
	if($countthm < 1){
		echo '<td bgcolor="yellow" style="color:#000">Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path. Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</td>';
	}
	else if($countthm > 0 && $countthm < 3){
		echo '<td bgcolor="green" style="color:#fff">One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money. These are frequently the most time-consuming applications that require additional essays and application components. You should truly be in love with these schools as they will require the most energy to apply, and will only admit you if they can sense your extreme sense of excitement for becoming a member of their student body.</td>';
	}
	else if($countthm > 2 && $countthm < 4 ){
		echo '<td bgcolor="yellow" style="color:#000">Three "Long Shot" colleges may prove to be too many on most college lists. Because resources of time and money are limited in the application process, adding three in this category may lead to lower quality applications being submitted to other schools on your college list.</td>';
	}
	else if($countthm > 3 ){
		echo '<td bgcolor="red" style="color:#fff">Applying to 4 or more "Long Shot" colleges is a waste of time and resources. You should look for schools that are in the "Reach" and "Match" categories that have many of the great things you love about these "Long Shot" schools. Attempting to apply to 4+ in this category almost always leads to fewer overall acceptances. Refine your search criteria and double down on the 1-2 best-fit Long Shot’s!</td>';
	}
	else{}
	
	if($counttr < 2){
		echo '<td bgcolor="red" style="color:#fff">The "Reach" schools are arguably the most important category of schools on your college list. These colleges need to represent your goals and ambitions and should be some of the schools to which you are most excited about gaining admission. Less than three in this category is a missed opportunity to apply to schools that may be within reach.</td>';
	}
	else if($counttr > 1 && $counttr < 3){
		echo '<td bgcolor="yellow" style="color:#000">With 2 "Reach" schools, you have begun to identify a trend or set of criteria that are most important to you. Consider adding 1-2 more in this category to increase your likelihood of admission to a school in this important category.</td>';
	}
	else if($counttr > 2 && $counttr < 5 ){
		echo '<td bgcolor="green" style="color:#fff">Having 3-4 "Reach" schools is the sweet spot for a college list. This will provide you the greatest chance of submitting your best possible work and gaining access to institutions at the top end of your academic range.</td>';
	}
	else if($counttr > 4 && $counttr < 6 ){
		echo '<td bgcolor="yellow" style="color:#000">With 5 "Reach" schools, you may need to further clarify your hopes and desires for a future college home. This wide of a range in the "Reach" category may be an indicator that you need to further refine your criteria, or begin to eliminate schools from your list based on gaining a deeper understanding of the unique institutions.</td>';
	}
	else if($counttr > 5 ){
		echo '<td bgcolor="red" style="color:#fff">6 or more "Reach" schools is too many for most college lists and will likely mean you are lacking in a different category. Refine the list of schools by clarifying your criteria and gaining a deeper understanding of the differences between schools. </td>';
	}
	else{}
	
	if($counttm < 2){
		echo '<td bgcolor="red" style="color:#fff">"Match" schools are the bread and butter of your college list. Include 3-4 in this category to give yourself the best opportunity to gain admission to schools that are right on target academically. Failing to adequately fill this category will lead to an unbalanced list that may limit your collegiate options.</td>';
	}
	else if($counttm > 1 && $counttm < 3){
		echo '<td bgcolor="yellow" style="color:#000">With 2 "Match" colleges, you have begun to identify your list’s backbone. Strengthen this list by adding 1-2 more in this category. These schools will be excited to receive your application and can be more flexible with grades and test scores. They may add greater priority to your fit within their community when determining your admissions decision.</td>';
	}
	else if($counttm > 2 && $counttm < 5 ){
		echo '<td bgcolor="green" style="color:#fff">3-4 "Match" schools are perfect for a well-balanced college list. In this range, your list is most likely to be a representation of a true fit between you and the institution.</td>';
	}
	else if($counttm > 4 && $counttm < 6 ){
		echo '<td bgcolor="yellow" style="color:#000">WIth 5 "Match" schools, you are at the upper limit of this category. Consider removing 1 school by further clarifying your interests at each college, and verifying that they meet the essentials on your checklist.</td>';
	}
	else if($counttm > 5 ){
		echo '<td bgcolor="red" style="color:#fff">6 of more "Match" schools are too many for most college lists. Attempting to apply to this many "Match" schools will leave the other essential categories too sparsely populated. Remove 2-3 from this category.</td>';
	}
	else{}
	
	if($countts < 2){
		echo '<td bgcolor="red" style="color:#fff">"Safety" colleges will provide the peace of mind to help you sleep at night while you wait for results to arrive. You need to have these colleges on your list to ensure that you will have an admissions offer for your undergraduate studies. Build out this category to avoid disappointment.</td>';
	}
	else if($countts > 1 && $countts < 3){
		echo '<td bgcolor="yellow" style="color:#000">Some lists may be considered complete with just 2 "Safety" schools, but in service of preparing for the worst-case outcomes, 3-4 "Safeties" will reduce the risk of having nowhere to attend this fall.</td>';
	}
	else if($countts > 2 && $countts < 5 ){
		echo '<td bgcolor="green" style="color:#fff">Building a strong list requires planning for any outcome. 3-4 safety schools will increase the chances that you have options to select from this fall.</td>';
	}
	else if($countts > 4 && $countts < 6 ){
		echo '<td bgcolor="yellow" style="color:#000">5 “Safety” schools may be an overinvestment in the "fallbacks". You are likely to be admitted to schools in this category and will be best served by focusing more attention on the other categories. Remove 1-2 from this category.</td>';
	}
	else if($countts > 5 ){
		echo '<td bgcolor="red" style="color:#fff">There is no need for 6 or more safety schools on anyone’s list. You are likely to be admitted to these schools and should choose 3-4 options that best fit your goals. </td>';
	}
	else{}
	//Comment for Not a Fit or More Research is Needed
	echo '<td style="color:#000">More research needed</td>';
	/*
	if($countall < 7){
		echo '<td bgcolor="red" style="color:#fff">WIth 6 or fewer schools on your college list, there is a tremendous missed opportunity. You likely will only apply to undergraduate college once in your lifetime. Maximize this chance by seeing what’s out there, casting a wider net, and reaching a bit higher! You can do this!</td>';
	}
	else if($countall > 6 && $countall < 9){
		echo '<td bgcolor="yellow" style="color:#000">Many students will choose to apply to 7-8 colleges and can yield excellent outcomes. Unfortunately, these students may be leaving doors unopened and stones unturned. Push yourself to add another 1-2 schools that fit your ambitions.</td>';
	}
	else if($countall > 8 && $countall < 13 ){
		echo '<td bgcolor="green" style="color:#fff">College lists with 9-12 schools are in the perfect range to enable the highest possible quality work is submitted for every college, your time and energy are appropriately utilized, and your focus on finding the "Best-Fit" college is at its peak.</td>';
	}
	else if($countall > 12 && $countall < 15 ){
		echo '<td bgcolor="yellow" style="color:#000">This is on the top end of size for a college list and can be acceptable if each school is intentional, serves a purpose, and is on the list for a good reason. Consider removing 1-2 schools that are not well aligned to your personal goals.</td>';
	}
	else if($countall > 14 ){
		echo '<td bgcolor="red" style="color:#fff">A college list of this size is unwieldy and will be tough to manage while maintaining the highest bar for your submissions. Students attempting to submit 15+ college applications will dilute their best efforts while still attempting to earn top grades in senior year, continuing and expand extracurriculars, and maintaining positive and healthy relationships. Reduce the size of your college list to the ideal range of 9-12 schools.</td>';
	}
	else{}
	*/
	echo '</tr>';
	
	echo '</tbody>';
	echo '</table>';
	
	
	
}
else{
	echo '<b>Try broadening your search. Only institutions matching ALL criteria in your search will be returned. </b>';
}
		
endif;
?>