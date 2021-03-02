<?php 
require_once 'includes/config.php';
if(isset($_POST) ):

	
	extract($_POST);
	$condition = '';
	
	if(isset($state) && !empty($state)){		
		$states = implode("','", $state);
		$condition .= "WHERE `STABBR` IN ('".$states."')";		
	}else{
		$condition .= "WHERE `STABBR` LIKE '%%' ";
	}
	

	if(isset($parts) && !empty($parts) ){					
		$variable = explode(",",$parts);		
		foreach ($variable as $key => $value) {
			$array[] = "`STABBR` = '".$value."'";
		}
		$parts_search = implode(" OR ",$array);
		$condition .= " AND (". $parts_search.")";	
	}
	if(isset($inputZip) && isset($miles) && !empty($inputZip) && !empty($miles)):

		$postalCode = $inputZip;
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, 'http://dev.virtualearth.net/REST/v1/Locations?countryRegion=us&postalCode='.$postalCode.'&key=At2wzFZAPQDWHiFgOxzsw7zcJbKiMQQVLIhgDPiqRA18aPAgHThGzuA6ORn-d2AF ');
		curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

		$jsonData = json_decode(curl_exec($curlSession));
		curl_close($curlSession);
		$coordinates = $jsonData->resourceSets[0]->resources[0]->geocodePoints[0]->coordinates;
		$lat = $coordinates[0];
		$lon = $coordinates[1];

		$radius = $miles;
		$radius = $radius ? $radius : 20;		

		$condition .= 'AND (3958*3.1415926*sqrt((latitude-'.$lat.')*(latitude-'.$lat.') + cos(latitude/57.29578)*cos('.$lat.'/57.29578)*(longitud-'.$lon.')*(longitud-'.$lon.'))/180) <= '.$radius.'' ;

	endif;


	if(isset($campusSetting) && !empty($campusSetting) ){			
		$campusSettingArray = array();
		foreach ($campusSetting as $key => $value) {
			if($value == 'rural'):
				$rural = '41,42,43';
				$campusSettingArray[] = $rural;
			elseif($value == 'town'):
				$town = '31,32,33';
				$campusSettingArray[] = $town;
			elseif($value == 'suburb'):
				$suburb = '21,22,23';
				$campusSettingArray[] = $suburb;
			elseif($value == 'city'):
				$city = '11,12,13';
				$campusSettingArray[] = $city;				
			endif;			
		}
		
		// print_r($campusSettingArray);
		foreach ($campusSettingArray as $key => $value) {
			$variable = explode(",",$value);		
			foreach ($variable as $keyy => $val) {
				$array[] = "`LOCALE` = '".$val."'";
			}				
		}
		$campusSetting_search = implode(" OR ",$array);	
		$condition .= " AND (". $campusSetting_search.")";		

	}


	if((isset($enrollment_min) && !empty($enrollment_min))  || (isset($enrollment_max) && !empty($enrollment_max)) ){
		if(empty($enrollment_min) && !empty($enrollment_max)):
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` <= '".$enrollment_max."' ";
		elseif(empty($enrollment_max) && !empty($enrollment_min)):
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` >= '".$enrollment_min."' ";

		elseif(!empty($enrollment_max) && !empty($enrollment_min)):
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` >= '".$enrollment_min."' AND `ENRTOT` <= '".$enrollment_max."' ";
		endif;

		$result_enroll = $con->query($qry);	
		if ($result_enroll->num_rows > 0) {				
			while($rows = $result_enroll->fetch_assoc()) {
				$unitid = $rows['unitid'];
				$array_enroll[] = "`unitid` = '".$unitid."'";	
			}
			$enroll_search = implode(" OR ",$array_enroll);	
			$condition .= " AND (". $enroll_search.")";
		}	
	}


	if(isset($level_of_award) && !empty($level_of_award)){		
		$levelAwardArray = array();
		foreach ($level_of_award as $key => $value) {
			if($value == 'certificate'):
				$certificate = '4,2,1';
				$levelAwardArray[] = $certificate;
			elseif($value == 'bachelor'):
				$bachelor = '5';
				$levelAwardArray[] = $bachelor;
			elseif($value == 'associates'):
				$associates = '3';
				$levelAwardArray[] = $associates;
			elseif($value == 'advanced'):
				$advanced  = '6,7,8,9';
				$levelAwardArray[] = $advanced;				
			endif;			
		}
		
		$awards_key = implode(",",$levelAwardArray);	
		$condition .= " AND `UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `c2018_a` WHERE `AWLEVEL` IN (".$awards_key.") AND MAJORNUM = 1 )";
	}

	if(isset($institution_type) && !empty($institution_type)){
		$institution_type_key = implode(",",$institution_type);

		$variable = explode(",",$institution_type_key);		
		foreach ($variable as $key => $value) {
			$array[] = "`SECTOR` = '".$value."'";
		}
		$type_search = implode(" OR ",$array);
		$condition .= " AND (". $type_search.")";					
	}

	// Housing
	if(isset($housing) && !empty($housing)){		
		$condition .= " AND `UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `ic2018` WHERE `ROOM` = 1 )";
	}

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

$inputclgidarr = array();
$nfclgs = array();
$thhailmaryclgs = array();
$threachclgs = array();
$thmatchclgs = array();
$thsafetyclgs = array();

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
//If SAT score is input, use SAT score else use ACT score else set it to 0.00
if($testsatscore > 0){
	$stdataconvinparr['testscore'] = ($testsatscore)/$maxsatscore;
}
elseif($testactscore > 0){
	$stdataconvinparr['testscore'] = ($testactscore)/$maxactscore;
}
else{
	$stdataconvinparr['testscore'] = 0.00;
}

$stdataconvinparr['gpa'] = $gpa/$maxgpa;
$stdataconvinparr['rigor'] = (($rcapclscnt*$maxapclass) + ($rcothhrnclscnt*$maxothhnrclass))/$maxrigorscale;
$stdataconvinparr['ecscore'] = ( (($ecact4yr+$eclr4yr)*$maxec4yr) + (($ecact3yr+$eclr3yr)*$maxec3yr) + (($ecact2yr+$eclr2yr)*$maxec2yr) + (($ecact1yr+$eclr1yr)*$maxec1yr) )/$maxecscale;
$stdataconvinparr['ed'] = $earlyapplydecs/$maxedscale;
$stdataconvinparr['awards'] = $awardscnt/$maxawardscale;

//print_r($stdataconvinparr);
$stconvinptowtarr = array(); //Student Data Converted Input Array
$stconvinptowtarr['testscore'] = ''; //Student Data Converted Input Test Score
$stconvinptowtarr['gpa'] = ''; //Student Data Converted Input GPA
$stconvinptowtarr['rigor'] = ''; //Student Data Converted Input Rigor
$stconvinptowtarr['ecscore'] = ''; //Student Data Converted Input EC Score
$stconvinptowtarr['ed'] = ''; //Student Data Converted Input ED
$stconvinptowtarr['awards'] = ''; //Student Data Converted Input Awards

$stconvinptowtarr['testscore'] = $stdataconvinparr['testscore'] * $testscorewt;
$stconvinptowtarr['gpa'] = $stdataconvinparr['gpa'] * $gpawt;
$stconvinptowtarr['rigor'] = $stdataconvinparr['rigor'] * $rigorwt;
$stconvinptowtarr['ecscore'] = $stdataconvinparr['ecscore'] * $ecscorewt;
$stconvinptowtarr['ed'] = $stdataconvinparr['ed'] * $edwt;
$stconvinptowtarr['awards'] = $stdataconvinparr['awards'] * $awardswt;

//The admissibility score of the student
$admiscore = $stconvinptowtarr['testscore'] + $stconvinptowtarr['gpa'] + $stconvinptowtarr['rigor'] + $stconvinptowtarr['ecscore'] + $stconvinptowtarr['ed'] + $stconvinptowtarr['awards'];
//echo "<p style='font-size:16px;background-color:yellow;'>";
//echo 'Your Admissibility Score is: '.$admiscore.'<p><br/>';

/***** VB Code ends *******/

// This is the final query that does the search against selected filters to get the filtered colleges list
	 $sql = "SELECT * FROM hd2018 ".$condition." limit 0,50" ;
	
		$result = $con->query($sql);	
		/*
		echo '<table class="table table-striped" id="table_id">
		<thead>
		</thead>
		<th>Location</th>
		<tbody>

		';
*/
		if ($result->num_rows > 0) {
			
			echo '<button id="listsavebtn" class="btn btn-info" onclick=savelist()>Save List</button>';
			echo '<span class="no_of_result">'. $result->num_rows.' Results </span>';
			echo '<input type="hidden" class="form-control" id="admiscore"  name="admiscore" value="'.$admiscore.'">';
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
				//push each UNITID of college in an array which will be used later to fetch their respective threshold values
				array_push($inputclgidarr,$row['UNITID']);
				/*
				$url = $row['WEBADDR'];
		       	echo '<tr>';
				echo '<td>';
				echo '<a href="'.$url.'" target="_blank">'. $row['INSTNM'] .'</a>';

				echo '</td>';
				echo '</tr>';
				*/
		    }
			
			if(count($inputclgidarr)>0){
				$inputclgidstr = '';
				$inputclgidstr = implode(",",$inputclgidarr);
				$inputclgidstr = rtrim($inputclgidstr,",");
				//for input college ids, fetch threshold values and based on admissibility score set the flag value	of $flag
				$resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($inputclgidstr ) ");
				
				while ($rowclgth = mysqli_fetch_assoc($resclgth)){
					$flag = 'NF'; // possible values will be THM(Threshold Hail Mary), TR(Threshold Reach), TM(Threshold Match), TS(Threshold Safety), NF(Not Fit)
					if($admiscore > $rowclgth['thhailmary'])
						$flag = 'THM';
					if($admiscore > $rowclgth['threach'])
						$flag = 'TR';
					if($admiscore > $rowclgth['thmatch'])
						$flag = 'TM';
					if($admiscore > $rowclgth['thsafety'])
						$flag = 'TS';
					
					if($flag == 'NF'){
						$key = $rowclgth['unitid'];
						$nfclgs[$key] = $rowclgth['instnm'];
						//array_push($nfclgs,$rowclgth['instnm']);
					}
					if($flag == 'THM'){
						$key = $rowclgth['unitid'];
						$thhailmaryclgs[$key] = $rowclgth['instnm'];
						//array_push($thhailmaryclgs,$rowclgth['instnm']);
					}
					if($flag == 'TR'){
						$key = $rowclgth['unitid'];
						$threachclgs[$key] = $rowclgth['instnm'];
						//array_push($threachclgs,$rowclgth['instnm']);
					}
					if($flag == 'TM'){
						$key = $rowclgth['unitid'];
						$thmatchclgs[$key] = $rowclgth['instnm'];
						array_push($thmatchclgs,$rowclgth['instnm']);
					}
					if($flag == 'TS'){
						$key = $rowclgth['unitid'];
						$thsafetyclgs[$key] = $rowclgth['instnm'];
						//array_push($thsafetyclgs,$rowclgth['instnm']);
					}
				}
				if(count($thhailmaryclgs)>0){
					echo '<h3>List of Hail Mary Colleges: </h3>';
					//print_r($thhailmaryclgs);
					echo '<table class="table table-striped" id="table_id">
						<thead><tr><th>Select</th><th>College Name</th></tr></thead>
						<tbody>';
					//for($i=0; $i<count($thhailmaryclgs); $i++){
					foreach($thhailmaryclgs as $key=>$val){
						echo '<tr> <td>';
						echo '<input type="checkbox" id="clgcb[]" name="clgcb[]" value="h'.$key.'"></td>';
						echo '<td>'.$val;
						echo '</td> </tr>';
					}
					echo '</tbody></table>';
				}
				else{
					echo '<h3>List of Hail Mary Colleges: </h3>';
					echo '<p>No Hail Mary Colleges Found</p>';
				}
				
				if(count($threachclgs)>0){
					echo '<h3>List of Reach Colleges: </h3>';
					echo '<table class="table table-striped" id="table_id">
						<thead><tr><th>Select</th><th>College Name</th></tr></thead>
						<tbody>';
					//for($i=0; $i<count($threachclgs); $i++){
					foreach($threachclgs as $key=>$val){
						echo '<tr> <td>';
						echo '<input type="checkbox" id="clgcb[]" name="clgcb[]" value="r'.$key.'"></td>';
						echo '<td>'.$val;
						echo '</td> </tr>';
					}
					echo '</tbody></table>';
				}
				else{
					echo '<h3>List of Reach Colleges: </h3>';
					echo '<p>No Reach Colleges Found</p>';
				}
				
				if(count($thmatchclgs)>0){
					echo '<h3>List of Match Colleges: </h3>';
					echo '<table class="table table-striped" id="table_id">
						<thead><tr><th>Select</th><th>College Name</th></tr></thead>
						<tbody>';
					//for($i=0; $i<count($thmatchclgs); $i++){
					foreach($thmatchclgs as $key=>$val){
						echo '<tr> <td>';
						echo '<input type="checkbox" id="clgcb[]" name="clgcb[]" value="m'.$key.'"></td>';
						echo '<td>'.$val;
						echo '</td> </tr>';
					}
					echo '</tbody></table>';
				}
				else{
					echo '<h3>List of Match Colleges: </h3>';
					echo '<p>No Match Colleges Found</p>';
				}
				
				if(count($thsafetyclgs)>0){
					echo '<h3>List of Safety Colleges: </h3>';
					echo '<table class="table table-striped" id="table_id">
						<thead><tr><th>Select</th><th>College Name</th></tr></thead>
						<tbody>';
					//for($i=0; $i<count($thsafetyclgs); $i++){
					foreach($thsafetyclgs as $key=>$val){
						echo '<tr> <td>';
						echo '<input type="checkbox" id="clgcb[]" name="clgcb[]"  value="s'.$key.'"></td>';
						echo '<td>'.$val;
						echo '</td> </tr>';
					}
					echo '</tbody></table>';
				}
				else{
					echo '<h3>List of Safety Colleges: </h3>';
					echo '<p>No Match Colleges Found</p>';
				}
				/*
				if(count($nfclgs)>0){
					echo '<h3>List of Not Fit Colleges: </h3>';
					echo '<table class="table table-striped" id="table_id">
						<thead><tr><th>Select</th><th>College Name</th></tr></thead>
						<tbody>';
					//for($i=0; $i<count($thsafetyclgs); $i++){
					foreach($nfclgs as $key=>$val){
						echo '<tr> <td>';
						echo '<input type="checkbox" id="s'.$key.'" name="s'.$key.'"></td>';
						echo '<td>'.$val;
						echo '</td> </tr>';
					}
					echo '</tbody></table>';
				}
				*/
			}
			else{
				echo '<b>Try broadening your search. Only institutions matching ALL criteria in your search will be returned. </b>';
			}
		}else{
			
			echo '<b>Try broadening your search. Only institutions matching ALL criteria in your search will be returned. </b>';
		}
		/*
		echo '
		</tbody>
		</table>';
		*/
endif;
?>