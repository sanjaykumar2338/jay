<?php 
require_once 'includes/config.php';
if(isset($_POST) ):
	
	extract($_POST);
	$condition = '';	
	if(isset($distance_learning_only))
	{
		$distance_learning_only = 1;
	}
	else
	{
		$distance_learning_only = 0;
	}
	if(isset($offer_all))
	{
		$offer_all = 1;
	}
	else
	{
		$offer_all = 0;
	}
	//print_r($program_majors);	
	//States
	if(isset($state) && !empty($state)){		
		$states = implode("','", $state);
		$condition .= "WHERE `STABBR` IN ('".$states."')";		
	}else{
		$condition .= "WHERE `STABBR` LIKE '%%' ";
	}
	//Parts of the United States
	
	if(isset($parts) && !empty($parts) ){					
		$partsStr = implode(",", $parts);	
		$variable = explode(",",$partsStr);		
		foreach ($variable as $key => $value) {
			$array[] = "`STABBR` = '".$value."'";
		}
		$parts_search = implode(" OR ",$array);
		$condition .= " AND (". $parts_search.")";	
	}
	//Input Zip Cocde and Miles
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

	//Campus Settings
	if(isset($campusSetting) && !empty($campusSetting) ){			
		$campusSettingArray = array();
		foreach ($campusSetting as $key => $value) {
			if($value == 'rural'):
				$rural = '41,42,43';
				$campusSettingArray[] = $rural;
			elseif($value == 'town'):
				$town = '31,32,33';
				$campusSettingArray[] = $town;
			elseif($value == 'suburban'):
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

	//Enrollment Min and Max
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

	//Level of Awards
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
	// Programs/Majors
	if(isset($program_majors)){
		$cat = array();
		if(isset($program_majors)){		
			foreach ($program_majors as $key => $value) {
				$cat[]= "`CIPCODE` LIKE '".$value."%'";			
			}  
		}	

		$count = count($cat);
		$programsCat_data = implode(" OR ",$cat);
		$programsCat_data = "(".$programsCat_data.")";

		if($distance_learning_only == 1){			
			$programsCat_data .= " AND PTOTALDE <> 0";
		}

		if(($offer_all  == 1) && $count > 1){			
			$programsCat_data .= " GROUP BY UNITID 
			HAVING COUNT(UNITID) > 1";			
		}	
		
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `c2018dep` WHERE ".$programsCat_data." )";		
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
	
	// Specialized Mission
	if(isset($specialized_mission) && !empty($specialized_mission)){	
		if($specialized_mission == 4):
			$condition .= " AND `HBCU` = 1";
		elseif($specialized_mission == 8):
			$condition .= " AND `TRIBAL` = 1";			
		endif;			
	}
	
	// Extended Learning
	if(isset($extended_learning) && !empty($extended_learning)){
		$var = implode(",",$extended_learning);
		$array_learning = explode(",",$var);


		foreach ($array_learning as $key => $value) {
			$array_learning[] = "`".$value."` = '1'";
		}
		$extend_search = implode(" AND ",$array_learning);
		$condition .= " AND (`UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `ic2018` WHERE ".$extend_search."))";
		
	}
	
	// Religious Affiliation
	if(!empty($ReligiousAffilation)){
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `ic2018` WHERE `RELAFFIL` = '".$ReligiousAffilation."' )";
	}
	
	// Varsity Athletic Teams
	if(!empty($athletic_team) && !empty($athletic_team_g)){
		$newathletic_team_g = array();
		foreach ($athletic_team_g as $key => $value) {
			$newathletic_team_g[] = $value.$athletic_team.' > 0';
		}
		$teamAth = implode(" OR ",$newathletic_team_g);
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `athletic_teams` WHERE ".$teamAth.")";		
	}
	
		$clgidarr = array();
		$sql = "SELECT * FROM hd2018 ".$condition ." ORDER BY `hd2018`.`INSTNM` ASC" ;
		$result = $con->query($sql);			
		
		if ($result->num_rows > 0) {			
			
			echo '<span class="no_of_result">'. $result->num_rows.' Results </span>';
			echo '<input type="submit" name="submit" value="Analyze Colleges !">';
			//echo '<button id="listanalyzeclgsbtn" class="btn btn-info" onclick=analyzelist()>Analyze Colleges</button>';
		    while($row = $result->fetch_assoc()) {
				$key = $row['UNITID'];
				$clgidarr[$key]=$row['INSTNM'];
		    }
			
			if(count($clgidarr)>0){
				echo '<table class="table table-striped" id="table_id">
						<thead><tr><th>Select</th><th>College Name</th></tr></thead>
						<tbody>';
				foreach($clgidarr as $key=>$val){
						echo '<tr>';
						echo '<td><input type="checkbox" id="clgcb[]" name="clgcb[]" value="'.$key.'"></td>';
						echo '<td><span class="schoolInfo" onclick="getSchoolInfo('.$key.')">'. $val .'</span>';
						//echo '<td onclick="getSchoolInfo('.$key.')">'.$val;
						echo '</td> </tr>';
					}
					echo '</tbody></table>';
				
			}
			
		}else{
			
			echo '<b>Try broadening your search. Only institutions matching ALL criteria in your search will be returned. </b>';
		}
		echo '
		</tbody>
		</table>';

endif;
?>