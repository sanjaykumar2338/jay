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

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	
<!-- Custom script -->
</head>
<body>
<!----------------------------HEADER----------------------------------->
<header>
 <nav class="navbar my-header-nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed headernavtoggle" data-toggle="collapse">
        <span class="icon-bar top-bar"></span>
		<span class="icon-bar middle-bar"></span>
		<span class="icon-bar bottom-bar"></span>                      
      </button>
      <?php 
        if (!isset($_SESSION['userid'])) {
            echo '<a class="logo navbar-brand" href="index.php">';
        }
        else{
            echo '<a class="logo navbar-brand" href="dashboard.php">';
        }
        ?>
            <div class="brand-logo"><img src="images/logo.png" alt="logo"></div>
        </a>
    </div>
	 
	 <div class="collapse navbar-collapse" id="myNavbar2">
        <ul class="nav navbar-nav navbar-right">
        	<li><a href="logout.php" class="logdiv formlogout"><i class="fa fa-sign-out pr-3 d-none"></i> Logout </a> </li>
        </ul>
    </div>
    
  </div>
</nav>
</header>
<!----------------------------HEADER-----------------------------------> 
<?php 
//echo "<pre>";
//print_r($_POST);
//die;
//print_r($_SESSION);

if(isset($_POST['btnsearchschoolname']))
{
	$_SESSION['search_schoolname'] = $_POST['search_schoolname'];
}
if(isset($_POST['btnorderby']))
{
	$_SESSION['orderbyfield'] = $_POST['orderbyfield'];
	$_SESSION['orderbytype'] = $_POST['orderbytype'];
}

if(
isset($_POST['sub'])  
|| isset($_POST['applybtn1']) 
|| isset($_POST['applybtn2']) 
|| isset($_POST['applybtn3']) 
|| isset($_POST['applybtn4']) 
|| isset($_POST['applybtn5']) 
|| isset($_POST['applybtn6']) 
|| isset($_POST['applybtn7']) 
|| isset($_POST['applybtn8']) 
|| isset($_POST['applyfilters']) 
)
{
	$_SESSION['dataform1'] =$_POST;
	
}



if(isset($_SESSION['dataform1']) ){
   //echo "<pre>";
	//print_r($_POST);
	if(isset($_SESSION['dataform1']['distance_learning_only']))
	{
		$distance_learning_only = $_SESSION['dataform1']['distance_learning_only'];
	}
	
	$condition = '';	
	if(isset($distance_learning_only))
	{
		$distance_learning_only = 1;
	}
	else
	{
		$distance_learning_only = 0;
	}
	
	
	if(isset($_SESSION['dataform1']['offer_all']))
	{
		$offer_all = $_SESSION['dataform1']['offer_all'];
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
	
	if(isset($_SESSION['dataform1']['state']))
	{
		$state = $_SESSION['dataform1']['state'];
	}
	
	
	if(isset($state) && !empty($state)){		
		$states = implode("','", $state);
		$condition .= "WHERE `STABBR` IN ('".$states."')";		
	}else{
		$condition .= "WHERE `STABBR` LIKE '%%' ";
	}
	//Parts of the United States
	
	
	
	if(isset($_SESSION['dataform1']['parts']))
	{
		$parts = $_SESSION['dataform1']['parts'];
	}
	
	
	
	if(isset($parts) && !empty($parts) ){					
		$partsStr = implode(",", $parts);	
		$variable = explode(",",$partsStr);		
		foreach ($variable as $key => $value) {
			$array[] = "`STABBR` = '".$value."'";
		}
		$parts_search = implode(" OR ",$array);
		$condition .= " AND (". $parts_search.")";	
	}
	
	
	if(isset($_SESSION['dataform1']['inputZip']))
	{
		$inputZip = $_SESSION['dataform1']['inputZip'];
	}
	
	if(isset($_SESSION['dataform1']['miles']))
	{
		$miles = $_SESSION['dataform1']['miles'];
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

	
	
	if(isset($_SESSION['dataform1']['campusSetting']))
	{
		$campusSetting = $_SESSION['dataform1']['campusSetting'];
	}
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
	
	
	if(isset($_SESSION['dataform1']['enrollment_min']))
	{
		$enrollment_min = $_SESSION['dataform1']['enrollment_min'];
	}
	
	
	if(isset($_SESSION['dataform1']['enrollment_max']))
	{
		$enrollment_max = $_SESSION['dataform1']['enrollment_max'];
	}
	
	//Enrollment Min and Max
	if((isset($enrollment_min) && !empty($enrollment_min))  || (isset($enrollment_max) && !empty($enrollment_max)) ){
		if(empty($enrollment_min) && !empty($enrollment_max)):
			if($enrollment_max == '40000+'):
				$enrollment_max = "(SELECT MAX(ENRTOT) FROM `drvef2018`)";
			endif;
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` <= ".$enrollment_max." ";
		elseif(empty($enrollment_max) && !empty($enrollment_min)):
			if($enrollment_max == '40000+'):
				$enrollment_max = "(SELECT MAX(ENRTOT) FROM `drvef2018`)";
			endif;
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` >= ".$enrollment_min." ";
		elseif(!empty($enrollment_max) && !empty($enrollment_min)):
			if($enrollment_max == '40000+'):
				$enrollment_max = "(SELECT MAX(ENRTOT) FROM `drvef2018`)";
			endif;
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` >= ".$enrollment_min." AND `ENRTOT` <= ".$enrollment_max." ";
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

	
	
	if(isset($_SESSION['dataform1']['level_of_award']))
	{
		$level_of_award = $_SESSION['dataform1']['level_of_award'];
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
	
	
	
	if(isset($_SESSION['dataform1']['program_majors']))
	{
		$program_majors = $_SESSION['dataform1']['program_majors'];
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
	
	
	if(isset($_SESSION['dataform1']['institution_type']))
	{
		$institution_type = $_SESSION['dataform1']['institution_type'];
	}
	//old logic for institute type
	/*
	if(isset($institution_type) && !empty($institution_type)){
		$institution_type_key = implode(",",$institution_type);

		$variable = explode(",",$institution_type_key);		
		foreach ($variable as $key => $value) {
			$array[] = "`SECTOR` = '".$value."'";
		}
		$type_search = implode(" OR ",$array);
		$condition .= " AND (". $type_search.")";					
	}
*/

	$institution_type_year = array();
	$institution_type_name = array();
	foreach($institution_type as $instval){
		if($instval == '1,4,7' || $instval == '2,5,8' || $instval == '3,6,9')
			array_push($institution_type_name, $instval);
		if($instval == '1,2,3' || $instval == '4,5,6' || $instval == '7,8,9')
			array_push($institution_type_year, $instval);
	}
	
	if(!empty($institution_type_year) || !empty($institution_type_name)){
		$data12 = array();
		if(!empty($institution_type_year)){
			$sector = array();
			foreach ($institution_type_year as $ke => $valu) {
				$variable = explode(",",$valu);					
				foreach ($variable as $key => $value) {
					$sector[] = "`SECTOR` = '".$value."'";
				}
			}
			$sectorImp = '('.implode(" OR ",$sector).')';
			array_push($data12, $sectorImp);	
		}

		if(!empty($institution_type_name)){
			$sector_name = array();
			foreach ($institution_type_name as $valu_n) {
				$variable_n = explode(",",$valu_n);					
				foreach ($variable_n as  $value_n) {
					$sector_name[] = "`SECTOR` = '".$value_n."'";
				}
			}
			$sectorImp_n = '('.implode(" OR ",$sector_name).')';
			array_push($data12, $sectorImp_n);	
		}

		$type_search = implode(" AND ",$data12);
		
		$condition .= " AND (". $type_search.")";					
	}
	
	
	if(isset($_SESSION['dataform1']['housing']))
	{
		$housing = $_SESSION['dataform1']['housing'];
	}
	// Housing
	if(isset($housing) && !empty($housing)){		
		$condition .= " AND `UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `ic2018` WHERE `ROOM` = 1 )";
	}
	
	
	
	if(isset($_SESSION['dataform1']['specialized_mission']))
	{
		$specialized_mission = $_SESSION['dataform1']['specialized_mission'];
	}
	// Specialized Mission
	if(isset($specialized_mission) && !empty($specialized_mission)){	
		if($specialized_mission == 4):
			$condition .= " AND `HBCU` = 1";
		elseif($specialized_mission == 8):
			$condition .= " AND `TRIBAL` = 1";			
		endif;			
	}
	
	if(isset($_SESSION['dataform1']['extended_learning']))
	{
		$extended_learning = $_SESSION['dataform1']['extended_learning'];
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
	
	
	
	if(isset($_SESSION['dataform1']['ReligiousAffilation']))
	{
		$ReligiousAffilation = $_SESSION['dataform1']['ReligiousAffilation'];
	}
	// Religious Affiliation
	if(!empty($ReligiousAffilation)){
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `ic2018` WHERE `RELAFFIL` = '".$ReligiousAffilation."' )";
	}
	
	
	
	if(isset($_SESSION['dataform1']['athletic_team']))
	{
		$athletic_team = $_SESSION['dataform1']['athletic_team'];
	}
	if(isset($_SESSION['dataform1']['athletic_team_g']))
	{
		$athletic_team_g = $_SESSION['dataform1']['athletic_team_g'];
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
	
	
	
	if(isset($_SESSION['dataform1']['tuitionMax']))
	{
		$tuitionMax = $_SESSION['dataform1']['tuitionMax'];
	}
	if(isset($_SESSION['dataform1']['tuitionMin']))
	{
		$tuitionMin = $_SESSION['dataform1']['tuitionMin'];
	}
	// Tuition & Fees 
	if(!empty($tuitionMax) || !empty($tuitionMin)){		
		$tuitionids = array();
		if(!empty($tuitionMin) && !empty($tuitionMax) ){	
			$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."' AND `CHG1PY3` <= '".$tuitionMax."'";
			$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."' AND `CHG2AY3` <= '".$tuitionMax."'";

		}elseif (!empty($tuitionMin) && empty($tuitionMax)) {
			$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
			$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";	
			
		}elseif (empty($tuitionMin) && !empty($tuitionMax)) {
			$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` <= '".$tuitionMax."'";
			$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` <= '".$tuitionMax."'";
		}
		
		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while($id_row = $ids_result->fetch_assoc()) {
				$tuitionids[] =$id_row["UNITID"];
				
			}	
		}
		
		$ids_result_1 = $con->query($ids_sql_1);
		if ($ids_result_1->num_rows > 0) {
			while($id_row_1 = $ids_result_1->fetch_assoc()) {
				$tuitionids[] =$id_row_1["UNITID"];
			}	
		}
		
		$tuitionids = array_unique($tuitionids);
		$ids_str = implode(",",$tuitionids);
		
		if(!empty($tuitionids))
			$condition .= " AND `UNITID` IN(".$ids_str.")";	
		
	}
	// %admitted
	if(isset($_SESSION['dataform1']['applicantsAcceptedMin']))
	{
		$applicantsAcceptedMin = $_SESSION['dataform1']['applicantsAcceptedMin'];
	}
	if(isset($_SESSION['dataform1']['applicantsAcceptedMax']))
	{
		$applicantsAcceptedMax = $_SESSION['dataform1']['applicantsAcceptedMax'];
	}
	if(!empty($applicantsAcceptedMin) || !empty($applicantsAcceptedMax)){		
		$ids = array();
		if(!empty($applicantsAcceptedMin) && !empty($applicantsAcceptedMax) ){	
			$ids_sql = "SELECT UNITID FROM `drvadm2018` WHERE `DVADM01` >= '".$applicantsAcceptedMin."' AND `DVADM01` <= '".$applicantsAcceptedMax."'";
			

		}elseif (!empty($applicantsAcceptedMin) && empty($applicantsAcceptedMax)) {
			$ids_sql = "SELECT UNITID FROM `drvadm2018` WHERE `DVADM01` >= '".$applicantsAcceptedMin."'";
			
			
		}elseif (empty($applicantsAcceptedMin) && !empty($applicantsAcceptedMax)) {
			$ids_sql = "SELECT UNITID FROM `drvadm2018` WHERE `DVADM01` <= '".$applicantsAcceptedMax."' AND `DVADM01` <> 0 ";
		}
		//echo $ids_sql;
		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while($id_row = $ids_result->fetch_assoc()) {
				$ids[] =$id_row["UNITID"];
			}	
		}
		
		$ids = array_unique($ids);
		$ids_str = implode(",",$ids);

		if(!empty($ids)){	
			$condition .= " AND `UNITID` IN(".$ids_str.")";	
			
		}
	}
	
	if(isset($_SESSION['dataform1']['graduationrateMin']))
	{
		$graduationrateMin = $_SESSION['dataform1']['graduationrateMin'];
	}
	if(isset($_SESSION['dataform1']['graduationrateMax']))
	{
		$graduationrateMax = $_SESSION['dataform1']['graduationrateMax'];
	}
	if(!empty($graduationrateMin) || !empty($graduationrateMax)){
		$ids = array();
		if(!empty($graduationrateMin) && !empty($graduationrateMax) ){
			$ids_sql = "SELECT `PGGRRTT`,`UNITID` FROM `drvgr2018` WHERE  `drvgr2018`.`PGGRRTT` >= '".$graduationrateMin."' AND `drvgr2018`.`PGGRRTT` <= '".$graduationrateMax."'";


		}elseif (!empty($graduationrateMin) && empty($graduationrateMax)) {
			$ids_sql = "SELECT `PGGRRTT`,`UNITID` FROM `drvgr2018` WHERE  `drvgr2018`.`PGGRRTT` >= '".$graduationrateMin."' ";




		}elseif (empty($graduationrateMin) && !empty($graduationrateMax)) {
			$ids_sql = "SELECT `PGGRRTT`,`UNITID` FROM `drvgr2018` WHERE  `drvgr2018`.`PGGRRTT` <= '".$graduationrateMax."'";


		}
		//echo $ids_sql;
		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while($id_row = $ids_result->fetch_assoc()) {
				$ids[] =$id_row["UNITID"];
			}
		}

		$ids = array_unique($ids);
		$ids_str = implode(",",$ids);

		if(!empty($ids)){
			$condition .= " AND `UNITID` IN(".$ids_str.")";

		}
	}

	if(isset($_SESSION['dataform1']['financialaidMin']))
	{
		$financialaidMin = $_SESSION['dataform1']['financialaidMin'];
	}
	if(isset($_SESSION['dataform1']['financialaidMax']))
	{
		$financialaidMax = $_SESSION['dataform1']['financialaidMax'];
	}
	if(!empty($financialaidMin) || !empty($financialaidMax)){
		$ids = array();
		if(!empty($financialaidMin) && !empty($financialaidMax) ){
			$ids_sql = "SELECT * FROM `sfa1718_p1` WHERE  `sfa1718_p1`.`ANYAIDP` >= '".$financialaidMin."' AND `sfa1718_p1`.`ANYAIDP` <= '".$financialaidMax."'";


		}elseif (!empty($financialaidMin) && empty($financialaidMax)) {
			$ids_sql = "SELECT * FROM `sfa1718_p1` WHERE  `sfa1718_p1`.`ANYAIDP` >= '".$financialaidMin."' ";




		}elseif (empty($financialaidMin) && !empty($financialaidMax)) {
			$ids_sql = "SELECT * FROM `sfa1718_p1` WHERE  `sfa1718_p1`.`ANYAIDP` <= '".$financialaidMax."'";


		}
		//echo $ids_sql;
		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while($id_row = $ids_result->fetch_assoc()) {
				$ids[] =$id_row["UNITID"];
			}
		}

		$ids = array_unique($ids);
		$ids_str = implode(",",$ids);

		if(!empty($ids)){
			$condition .= " AND `UNITID` IN(".$ids_str.")";

		}
	}
	//Special Learning Opportunities
	if(isset($_SESSION['dataform1']['rotc']))
	{
		$rotc = $_SESSION['dataform1']['rotc'];
	}
	
	if(isset($rotc) && !empty($rotc)){
		$var = implode(",",$rotc);
		$array_learning = explode(",",$var);


		foreach ($array_learning as $key => $value) {
			$array_learning[] = "`".$value."` = '1'";
		}
		$extend_search = implode(" AND ",$array_learning);
		$condition .= " AND (`UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `ic2018` WHERE  ".$extend_search."))";

	}
	
	if(isset($_SESSION['dataform1']['satevidencetype']))
	{
		$satevidencetype = $_SESSION['dataform1']['satevidencetype'];
	}
	if(isset($_SESSION['dataform1']['satevidenceMin']))
	{
		$satevidenceMin = $_SESSION['dataform1']['satevidenceMin'];
	}
	if(isset($_SESSION['dataform1']['satevidenceMax']))
	{
		$satevidenceMax = $_SESSION['dataform1']['satevidenceMax'];
	}
	
		if(!empty($satevidencetype) &&  (!empty($satevidenceMin) || !empty($satevidenceMax))){
		$tuitionids = array();

			if ($satevidencetype == 'satevidence25th') {
				$column = 'SATVR25';
			} else if ($satevidencetype == 'satevidence75th') {
				$column = 'SATVR75';
			}
			if (!empty($satevidenceMin) && !empty($satevidenceMax)) {

				$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $satevidenceMin . "' AND `" . $column . "` <= '" . $satevidenceMax . "'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."' AND `CHG2AY3` <= '".$tuitionMax."'";

			} elseif (!empty($satevidenceMin) && empty($satevidenceMax)) {
				$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $satevidenceMin . "'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

			} elseif (empty($satevidenceMin) && !empty($satevidenceMax)) {
				$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` <= '" . $satevidenceMax . "'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` <= '".$tuitionMax."'";
			}

			$ids_result = $con->query($ids_sql);
			if ($ids_result->num_rows > 0) {
				while ($id_row = $ids_result->fetch_assoc()) {
					$tuitionids[] = $id_row["UNITID"];

				}
			}


			$ids_str = implode(",", $tuitionids);

			if (!empty($tuitionids))
				$condition .= " AND `UNITID` IN(" . $ids_str . ")";


	}
	
	if(isset($_SESSION['dataform1']['satmathtype']))
	{
		$satmathtype = $_SESSION['dataform1']['satmathtype'];
	}
	if(isset($_SESSION['dataform1']['satmathMin']))
	{
		$satmathMin = $_SESSION['dataform1']['satmathMin'];
	}
	if(isset($_SESSION['dataform1']['satmathMax']))
	{
		$satmathMax = $_SESSION['dataform1']['satmathMax'];
	}
	
		if(!empty($satmathtype) &&  (!empty($satmathMin) || !empty($satmathMax))){
		$tuitionids = array();

		if ($satmathtype == 'satmath25th') {
			$column = 'SATMT25';
		} else if ($satmathtype == 'satmath75th') {
			$column = 'SATMT75';
		}
		if (!empty($satmathMin) && !empty($satmathMax)) {

			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $satmathMin . "' AND `" . $column . "` <= '" . $satmathMax . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."' AND `CHG2AY3` <= '".$tuitionMax."'";

		} elseif (!empty($satmathMin) && empty($satmathMax)) {
			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $satmathMin . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

		} elseif (empty($satmathMin) && !empty($satmathMax)) {
			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` <= '" . $satmathMax . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` <= '".$tuitionMax."'";
		}

		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while ($id_row = $ids_result->fetch_assoc()) {
				$tuitionids[] = $id_row["UNITID"];

			}
		}


		$ids_str = implode(",", $tuitionids);

		if (!empty($tuitionids))
			$condition .= " AND `UNITID` IN(" . $ids_str . ")";


	}
	
	if(isset($_SESSION['dataform1']['actengtype']))
	{
		$actengtype = $_SESSION['dataform1']['actengtype'];
	}
	if(isset($_SESSION['dataform1']['actengMin']))
	{
		$actengMin = $_SESSION['dataform1']['actengMin'];
	}
	if(isset($_SESSION['dataform1']['actengMax']))
	{
		$actengMax = $_SESSION['dataform1']['actengMax'];
	}
	
		if(!empty($actengtype) &&  (!empty($actengMin) || !empty($actengMax))){
		$tuitionids = array();

		if ($actengtype == 'acteng25th') {
			$column = 'ACTEN25';
		} else if ($actengtype == 'acteng75th') {
			$column = 'ACTEN75';
		}
		if (!empty($actengMin) && !empty($actengMax)) {

			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $actengMin . "' AND `" . $column . "` <= '" . $actengMax . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."' AND `CHG2AY3` <= '".$tuitionMax."'";

		} elseif (!empty($satmathMin) && empty($satmathMax)) {
			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $actengMin . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

		} elseif (empty($satmathMin) && !empty($satmathMax)) {
			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` <= '" . $actengMax . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` <= '".$tuitionMax."'";
		}
      	$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while ($id_row = $ids_result->fetch_assoc()) {
				$tuitionids[] = $id_row["UNITID"];

			}
		}

        $ids_str = implode(",", $tuitionids);

		if (!empty($tuitionids))
			$condition .= " AND `UNITID` IN(" . $ids_str . ")";


	}
	
	if(isset($_SESSION['dataform1']['actmathtype']))
	{
		$actmathtype = $_SESSION['dataform1']['actmathtype'];
	}
	if(isset($_SESSION['dataform1']['actmathMin']))
	{
		$actmathMin = $_SESSION['dataform1']['actmathMin'];
	}
	if(isset($_SESSION['dataform1']['actmathMax']))
	{
		$actmathMax = $_SESSION['dataform1']['actmathMax'];
	}
		if(!empty($actmathtype) &&  (!empty($actmathMin) || !empty($actmathMax))){
		$tuitionids1 = array();

		if ($actmathtype == 'actmath25th') {
			$column = 'ACTMT25';
		} else if ($actmathtype == 'actmath75th') {
			$column = 'ACTMT75';
		}
		if (!empty($actmathMin) && !empty($actmathMax)) {

			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $actmathMin . "' AND `" . $column . "` <= '" . $actmathMax . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."' AND `CHG2AY3` <= '".$tuitionMax."'";

		} elseif (!empty($actmathMin) && empty($actmathMax)) {
			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` >= '" . $actmathMin . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

		} elseif (empty($actmathMin) && !empty($actmathMax)) {
			$ids_sql = "SELECT UNITID FROM `adm2018` WHERE `" . $column . "` <= '" . $actmathMax . "'";
			//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` <= '".$tuitionMax."'";
		}
		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while ($id_row = $ids_result->fetch_assoc()) {
				$tuitionids1[] = $id_row["UNITID"];

			}
		}

		$ids_str1 = implode(",", $tuitionids1);

		if (!empty($tuitionids))
			$condition .= " AND `UNITID` IN(" . $ids_str1 . ")";


	}
	
	if(isset($_SESSION['search_schoolname']) && !empty($_SESSION['search_schoolname']))
	{
		$condition .= " AND `INSTNM` LIKE '%".$_SESSION['search_schoolname']."%'";
	}
	
	}
	
	
	

?>

	<link href="css/site.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/mform.css" rel="stylesheet">


<!--multi step form with banner start here-->

<!--banner-->
<div class="banner inner-banner multi-step-banner" style="background:url(images/results.png) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> My College Search Results </h1>
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
          <div id="4"class=" chances progress-bar-item progress-bar-item-edges" ><a href="#!" class="white-font"><p class="progress-bar-text">My Chances</p></a></div>
          <div id="5" class=" five progress-bar-item" ><a href="#!" class="white-font"><p class="progress-bar-text">Finalize List</p></a></div>
          </div>
			</div>
		</div>
	</div>
</section>
	<!--form steps-->


<section class="College-Search-result apj-collage-search">
   <div class="container">

   				<!-- MultiStep Form -->
<!--<div class="container-fluid" >
    <div class="row justify-content-center mt-0">
       <!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
           <div class="cards px-0 pt-4 pb-0 mt-3 mb-3"> -->
          <!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
	<div class="cards px-0 pt-4 pb-0 mt-3 mb-3 ">
		<div class="row ">			
			<div class="col-md-12 mx-0 col-sm-12">
				
					<ul id="progressbar">
                              <a href="form2.php" title="">
                                 <li class="active" id="payment"><strong>Your Profile</strong></li>
                              </a>
							  <a href="form.php">
                                 <li class="active" id="account"><strong>Your Filters</strong></li>
                              </a>
							  
                              <a href="college-search.php" title="">
                                 <li class="active" id="personal"  class="active"><strong>Your Results</strong></li>
                              </a>
                             
                              <a title="">
                                 <li id="confirm"><strong>Your Chances?</strong></li>
                              </a>
                           </ul>
				
			</div>
		</div>
	</div>
</div>
    </div>
</div> -->
	   
     <div class="row">
		<div class="result col-sm-12">
			<!--<p style="font-size: 37px;text-align: center;">
				<!-- <img src="https://asurison.com/images/icon1.png"> <br> -->
				<!--<span style="color: #019ff0;font-weight: bold;">Your</span> College Search <span style="color: #019ff0;font-weight: bold;">Results</span>
			</p>-->
		</div>



<form  method="post">
<div class="col-md-12 ">
<!-- <input type="submit" value="Chance of Acceptance?" class="btn btn-primary chance mybluebtn" > -->
    <div class="col-md-9">
    </div>
	
</div>
<div class="inner-college-search-items">
<div class="col-md-3">
	<div class="filter-title">
		<div class="row">
			<div class="col-sm-4 col-xs-4">
				<button class="filter" type="button">Filters</button>
			</div>
			<div class="col-sm-8 col-xs-8">
				<button class=" clear_all" type="button" id="btnclearfilters">Clear Search Data</button>
			</div>
		</div>
	</div>
<div class="college-search-filter mysearchfilter">

	<ul class="list-group" style="margin-bottom: 0px;"> 
  <li class="list-group-item list-group-results location" data-toggle="modal" data-target="#location-btn" onclick="changeBg('#0003')"> Location <i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results camp-set" data-toggle="modal" data-target="#campus-btn">Campus Setting <i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results std-enrolment" data-toggle="modal" data-target="#student-btn">Student Enrollment<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results pro-mjr" data-toggle="modal" data-target="#majors-btn">Programs/Majors<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results lvl-of-awd" data-toggle="modal" data-target="#award-btn">Level of Award <i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li>
   <li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#institure-btn">Institution Type<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
	
		
  <!-- <li class="list-group-item list-group-results housing list-link"href="#housing-btn">Housing<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li> -->
  <!-- <li class="list-group-item list-group-results sep-mission list-link" href="#mission-btn">Specialized Mission<i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li> -->
  <!-- <li class="list-group-item list-group-results ext-learning list-link" href="#learn-btn">Extended Learning<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results rel-afil list-link" href="#religion-btn">Religious Affiliation<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results varsity-asth-tm list-link" href="#team-btn">Varsity Athletic Teams<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li> -->
  <!-- <li class="list-group-item list-group-results tandf list-link" href="#tution-btn">Tuition & Fees<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>  -->
  <li class="list-group-item list-group-results colg-advanced-search-btn adv-search-res ad-srch" >Advanced Search<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
	<ul class="list-group advanced-search-output advance-search-menu">
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#satActScore">Test Scores<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#housingAdvance">Housing<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#tutionFeesAdvance">Tuition & Fees<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#specialMissionAdvance">Specialized Mission<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#extendedLearningAdvance">Extended Learning<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#religiousAffiliationAdvance">Religious Affiliation<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#versityAthleticAdvance">Varsity Athletic Teams<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#acceptanceRateAdvance">Acceptance Rate<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#graduationRateAdvance">Graduation Rate<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#financialAidAdvance">Financial Aid<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
		<li class="list-group-item list-group-results inst-type" data-toggle="modal" data-target="#specialLearningAdvance">Special Learning Opportunities<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
	</ul>
  <!--<input type="submit" value="Apply Filters" class="btn btn-primary apj-chance-of-acceptance mybluebtn" style="margin-bottom: 32px;background: #019ff0;color: #fff;padding: 16px 62px;outline: none;display: none; margin-left:auto;margin-right:auto;width: 100% !important;" id="applyfilters" name="applyfilters">-->
   <!--  <input type="submit" value="Chance of Acceptance?" class="btn btn-primary apj-chance-of-acceptance" style="margin-bottom: 32px;background: #019ff0;color: #fff;padding: 20px 62px;outline: none;"> --> 
</ul>

	<!--advance search field popup content-->

	<!--SAT/ACT Score-->
	<div id="satActScore" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Test Scores</h4>
            </div>
            <div class="modal-body">
			<div id="testchoice_fields">
			<div class="mform_field_wrap">
                  <label class="mod_style_outer mb-0" style="line-height: 35px;">
                     <select  class="form-control" name="testchoice" id="testchoice">
                        <option value="">Please Select</option>
                        <option value="SAT">SAT</option>
                        <option value="ACT">ACT</option>
                     </select>
                  </label>
               </div>
			   <div id="testsatscore_sat_fields">
				   <!-- radio -->
					<div class="mform_field_wrap">
					<label class="mod_style_outer mb-0 radio-butn">
					<div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
							<label><input type="radio" style="position:inherit;" name="satevidencetype" id="satevidence25th" value="satevidence25th"> 25th Percentile</label>
						</div>
						<div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
							<label><input type="radio" style="position:inherit;" name="satevidencetype" id="satevidence75th" value="satevidence75th"> 75th Percentile</label>
						</div>
					</label>
					</div>
			   <!-- radio -->
			   <h4 class="text-center">SAT Reading and Writing</h4>
				<!-- select -->
				<div class="mform_field_wrap">
			 
			 <label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="satevidenceMin"  id="satevidenceMin">   
						<option value="Minimum">Minimum</option>
						<option value="200">200</option>
						<option value="220">220</option>
						<option value="240">240</option>
						<option value="260">260</option>
						<option value="280">280</option>
						<option value="300">300</option>
						<option value="320">320</option>
						<option value="340">340</option>
						<option value="360">360</option>
						<option value="380">380</option>
						<option value="400">400</option>
						<option value="420">420</option>
						<option value="440">440</option>
						<option value="460">460</option>
						<option value="480">480</option>
						<option value="500">500</option>
						<option value="520">520</option>
						<option value="540">540</option>
						<option value="560">560</option>
						<option value="580">580</option>
						<option value="600">600</option>
						<option value="620">620</option>
						<option value="640">640</option>
						<option value="660">660</option>
						<option value="680">680</option>
						<option value="700">700</option>
						<option value="720">720</option>
						<option value="740">740</option>
						<option value="760">760</option>
						<option value="780">780</option>
						<option value="800">800</option>
					</select>
				</label>
			 
			 
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="satevidenceMax" id="satevidenceMax">
						<option value="Maximum">Maximum</option>
						<option value="200">200</option>
						<option value="220">220</option>
						<option value="240">240</option>
						<option value="260">260</option>
						<option value="280">280</option>
						<option value="300">300</option>
						<option value="320">320</option>
						<option value="340">340</option>
						<option value="360">360</option>
						<option value="380">380</option>
						<option value="400">400</option>
						<option value="420">420</option>
						<option value="440">440</option>
						<option value="460">460</option>
						<option value="480">480</option>
						<option value="500">500</option>
						<option value="520">520</option>
						<option value="540">540</option>
						<option value="560">560</option>
						<option value="580">580</option>
						<option value="600">600</option>
						<option value="620">620</option>
						<option value="640">640</option>
						<option value="660">660</option>
						<option value="680">680</option>
						<option value="700">700</option>
						<option value="720">720</option>
						<option value="740">740</option>
						<option value="760">760</option>
						<option value="780">780</option>
						<option value="800">800</option>
					</select>
				</label>
			</div>
				<div class="mform_field_wrap">
				<label class="mod_style_outer mb-0 radio-butn">
				   <div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
						<label><input type="radio" style="position:inherit" name="satmathtype" id="satmath25th" value="satmath25th" checked> 25th Percentile</label>
					</div>
					<div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
						<label><input type="radio" style="position:inherit" name="satmathtype" id="satmath75th" value="satmath75th"> 75th Percentile</label>
					</div>
				</label>
			   </div>
			   <h4 class="text-center">SAT Math</h4>
			
				<!-- select -->
				<div class="mform_field_wrap">
			 
			 <label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="satmathMin"  id="satmathMin">        
						<option value="minimum">Minimum</option>
						<option value="200">200</option>
						<option value="220">220</option>
						<option value="240">240</option>
						<option value="260">260</option>
						<option value="280">280</option>
						<option value="300">300</option>
						<option value="320">320</option>
						<option value="340">340</option>
						<option value="360">360</option>
						<option value="380">380</option>
						<option value="400">400</option>
						<option value="420">420</option>
						<option value="440">440</option>
						<option value="460">460</option>
						<option value="480">480</option>
						<option value="500">500</option>
						<option value="520">520</option>
						<option value="540">540</option>
						<option value="560">560</option>
						<option value="580">580</option>
						<option value="600">600</option>
						<option value="620">620</option>
						<option value="640">640</option>
						<option value="660">660</option>
						<option value="680">680</option>
						<option value="700">700</option>
						<option value="720">720</option>
						<option value="740">740</option>
						<option value="760">760</option>
						<option value="780">780</option>
						<option value="800">800</option>
					</select>
				</label>
			 
			 
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="satmathMax" id="satmathMax">
						<option value="Maximum">Maximum</option>
						<option value="200">200</option>
						<option value="220">220</option>
						<option value="240">240</option>
						<option value="260">260</option>
						<option value="280">280</option>
						<option value="300">300</option>
						<option value="320">320</option>
						<option value="340">340</option>
						<option value="360">360</option>
						<option value="380">380</option>
						<option value="400">400</option>
						<option value="420">420</option>
						<option value="440">440</option>
						<option value="460">460</option>
						<option value="480">480</option>
						<option value="500">500</option>
						<option value="520">520</option>
						<option value="540">540</option>
						<option value="560">560</option>
						<option value="580">580</option>
						<option value="600">600</option>
						<option value="620">620</option>
						<option value="640">640</option>
						<option value="660">660</option>
						<option value="680">680</option>
						<option value="700">700</option>
						<option value="720">720</option>
						<option value="740">740</option>
						<option value="760">760</option>
						<option value="780">780</option>
						<option value="800">800</option>
						
					</select>
				</label>
			</div>
				<!-- select -->
            </div>
            <div id="testactscore_act_fields">
			<!-- radio -->
			<div class="mform_field_wrap">
			<label class="mod_style_outer mb-0 radio-butn">
			   <div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
					<label><input type="radio" style="position:inherit" name="actengtype" id="acteng25th" value="acteng25th" checked> 25th Percentile</label>
				</div>
				<div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
					<label><input type="radio" style="position:inherit" name="actengtype" id="acteng75th" value="acteng75th"> 75th Percentile</label>
				</div>
			</label>
			   </div>
			   <!-- radio -->
			   <h4 class="text-center">ACT English</h4>
				<!-- select -->
				<div class="mform_field_wrap">
			 
			 <label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="actengMin"  id="actengMin">   
						<option value="minimum">Minimum</option>     
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
					</select>
				</label>
			 
			 
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="actengMax" id="actengMax">
						<option value="Maximum">Maximum</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
					</select>
				</label>
			</div>
			<div class="mform_field_wrap">
				<label class="mod_style_outer mb-0 radio-butn">
				   <div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
						<label><input type="radio" style="position:inherit" name="actmathtype" id="actmath25th" value="actmath25th" checked checked> 25th Percentile</label>
					</div>
					<div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
						<label><input type="radio" style="position:inherit" name="actmathtype" id="actmath75th" value="actmath75th"> 75th Percentile</label>
					</div>
				</label>
			   </div>
				<!-- select -->
			   <h4 class="text-center">ACT Math</h4>
				<!-- select -->
				<div class="mform_field_wrap">
			 
			 <label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="actmathMin"  id="actmathMin">        
						<option value="minimum">Minimum</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
					</select>
				</label>
			 
			 
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="actmathMax" id="actmathMax">
						<option value="Maximum">Maximum</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
					</select>
				</label>
			</div>
				<!-- select -->
            </div>
			</div>
            </div>
            <div class="modal-footer">
				<input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance actsatbtn mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
</div>
</div>
	<!--SAT/ACT Score end-->

	<!--Housing-->
	<div id="housingAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Housing</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" >
                     <input class="mod_style" type="checkbox" name="housing" id="housing_yes" value="Yes">
                    <span class="checkmark" id="chk_housing_yes" style="height:52px">Yes</span> </label>
    
                    <label class="mod_style_outer" >
                    <input class="mod_style" type="checkbox" name="housing" id="housing_no" value="No">
                    <span class="checkmark" id="chk_housing_no" style="height:52px">No</span> </label>
                </div>
            </div>
            <div class="modal-footer">
				<input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
</div>
</div>
	<!--Housing-->
	
	<!--Tuition & Fees-->
	<div id="tutionFeesAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tuition & Fees</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
			 
                    <label class="mod_style_outer mb-0" style="line-height: 35px;">
                           <select class="form-control" name="tuitionMin"  id="tuitionMin">        
                               <option value="">Minimum</option>
                               <option value="500">$500</option>
                               <option value="1000">$1,000</option>
                               <option value="5000">$5,000</option>
                               <option value="10000">$10,000</option>
                               <option value="15000">$15,000</option>
                               <option value="20000">$20,000</option>
                               <option value="25000">$25,000</option>
                               <option value="30000">$30,000</option>
                               <option value="35000">$35,000</option>
                               <option value="40000">$40,000</option>
                               <option value="45000">$45,000</option>
                               <option value="50000">$50,000</option>
                               <option value="60000">$60,000</option>
                           </select>
                       </label>
                    
                    
                       <label class="mod_style_outer mb-0" style="line-height: 35px;">
                           <select class="form-control" name="tuitionMax" id="tuitionMax" title="Religious Affiliation">
                               <option value="">Maximum</option>
                               <option value="500">$500</option>
                               <option value="1000">$1,000</option>
                               <option value="5000">$5,000</option>
                               <option value="10000">$10,000</option>
                               <option value="15000">$15,000</option>
                               <option value="20000">$20,000</option>
                               <option value="25000">$25,000</option>
                               <option value="30000">$30,000</option>
                               <option value="35000">$35,000</option>
                               <option value="40000">$40,000</option>
                               <option value="45000">$45,000</option>
                               <option value="50000">$50,000</option>
                               <option value="60000">$60,000</option>   
                           </select>
                       </label>
                   </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Tuition & Fees end-->
	
	<!--Specialized Mission-->
<div id="specialMissionAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Specialized Mission</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer mb-0" style="line-height: 35px;width: 50%;">
                      <select class="form-control" title="Specialized Mission" name="specialized_mission" id="specialized_mission">
                        <option selected="selected" value="0">No Preference</option>
                        <!--<option value="1">Single-sex: Men</option>
                        <option value="2">Single-sex: Women</option>-->
                        <option value="4">Historically Black College</option>
                        <option value="8">Tribal College</option>
                      </select>
                    </label>
                    </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Specialized Mission end-->
	
	<!--Extended Learning-->
<div id="extendedLearningAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Extended Learning</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" >
                      <input class="mod_style" type="checkbox" name="extended_learning[]" id="distance_learning" value="DISTNCED">
                     <span class="checkmark" id="chk_distance_learning">Distance learning only</span> </label>
                     
                     <label class="mod_style_outer" >
                      <input class="mod_style" type="checkbox" name="extended_learning[]" id="weekend_evening" value="SLO7">
                     <span class="checkmark" id="chk_weekend_evening">Weekend/evening</span> </label>
                     
                     <label class="mod_style_outer" >
                       <input class="mod_style" type="checkbox" name="extended_learning[]" id="credit_life_exp" value="CREDITS2">
                     <span class="checkmark" id="chk_credit_life_exp">Credit for life experience</span> </label>
                 </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>

	<!--Extended Learning end-->
	
	<!--Religious Affiliation-->
<div id="religiousAffiliationAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Religious Affiliation</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer mb-0" style="line-height: 35px;width: 50%;">
                           <select class="form-control" name="ReligiousAffilation" id="ReligiousAffilation" title="Religious Affiliation">
                            <option value="">No Preference</option>
                            <!-- <option value="-2">Not applicable</option> -->
                            <option value="51">African Methodist Episcopal</option>
                            <option value="24">African Methodist Episcopal Zion Church</option>
                            <option value="52">American Baptist</option>
                            <option value="22">American Evangelical Lutheran Church</option>
                            <option value="53">American Lutheran</option>
                            <option value="27">Assemblies of God Church</option>
                            <option value="54">Baptist</option>
                            <option value="28">Brethren Church</option>
                            <option value="34">Christ and Missionary Alliance Church</option>
                            <option value="61">Christian Church (Disciples of Christ)</option>
                            <option value="48">Christian Churches and Churches of Christ</option>
                            <option value="55">Christian Methodist Episcopal</option>
                            <option value="35">Christian Reformed Church</option>
                            <option value="58">Church of Brethren</option>
                            <option value="57">Church of God</option>
                            <option value="59">Church of the Nazarene</option>
                            <option value="74">Churches of Christ</option>
                            <option value="60">Cumberland Presbyterian</option>
                            <option value="101">Ecumenical Christian</option>
                            <option value="50">Episcopal Church, Reformed</option>
                            <option value="102">Evangelical Christian</option>
                            <option value="36">Evangelical Congregational Church</option>
                            <option value="37">Evangelical Covenant Church of America</option>
                            <option value="38">Evangelical Free Church of America</option>
                            <option value="39">Evangelical Lutheran Church</option>
                            <option value="64">Free Methodist</option>
                            <option value="41">Free Will Baptist Church</option>
                            <option value="65">Friends</option>
                            <option value="105">General Baptist</option>
                            <option value="91">Greek Orthodox</option>
                            <option value="42">Interdenominational</option>
                            <option value="40">International United Pentecostal Church</option>
                            <option value="80">Jewish</option>
                            <option value="68">Lutheran Church - Missouri Synod</option>
                            <option value="67">Lutheran Church in America</option>
                            <option value="43">Mennonite Brethren Church</option>
                            <option value="69">Mennonite Church</option>
                            <option value="87">Missionary Church Inc</option>
                            <option value="44">Moravian Church</option>
                            <option value="78">Multiple Protestant Denomination</option>
                            <option value="106">Muslim</option>
                            <option value="108">Non-Denominational</option>
                            <option value="45">North American Baptist</option>
                            <option value="-1">Not reported</option>
                            <option value="100">Original Free Will Baptist</option>
                            <option value="79">Other Protestant</option>
                            <option value="47">Pentecostal Holiness Church</option>
                            <option value="107">Plymouth Brethren</option>
                            <option value="103">Presbyterian</option>
                            <option value="66">Presbyterian Church (USA)</option>
                            <option value="73">Protestant Episcopal</option>
                            <option value="77">Protestant, not specified</option>
                            <option value="49">Reformed Church in America</option>
                            <option value="81">Reformed Presbyterian Church</option>
                            <option value="30">Roman Catholic</option>
                            <option value="92">Russian Orthodox</option>
                            <option value="95">Seventh Day Adventist</option>
                            <option value="75">Southern Baptist</option>
                            <option value="94">The Church of Jesus Christ of Latter-day Saints</option>
                            <option value="97">The Presbyterian Church in America</option>
                            <option value="88">Undenominational</option>
                            <option value="93">Unitarian Universalist</option>
                            <option value="84">United Brethren Church</option>
                            <option value="76">United Church of Christ</option>
                            <option value="71">United Methodist</option>
                            <option value="104">Virginia Baptist General Association</option>
                            <option value="89">Wesleyan</option>
                            <option value="33">Wisconsin Evangelical Lutheran Synod</option>
                            <option value="99">Other (none of the above)</option>
                          </select>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Religious Affiliation end-->
	
	<!--Varsity Athletic Teams-->
<div id="versityAthleticAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Varsity Athletic Teams</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" >
                         <input class="mod_style" type="checkbox" name="athletic_team_g[]" id="PARTIC_MEN_" value="PARTIC_MEN_">
                         <span class="checkmark" id="chk_PARTIC_MEN_">Men</span> 
                     </label>
                     <label class="mod_style_outer" >
                         <input class="mod_style" type="checkbox" name="athletic_team_g[]" id="PARTIC_WOMEN_" value="PARTIC_WOMEN_">
                         <span class="checkmark" id="chk_PARTIC_WOMEN_">Women</span> 
                     </label>
                 </div>
                 <div class="mform_field_wrap mt-22 mb-10" id="athletic_team_div">
                     <label class="mod_style_outer mb-0" style="line-height: 35px;">
                            <select class="form-control" title="Varsity Athletic Teams" id="athletic_team" name="athletic_team"> 
                             <option value="">No Preference</option> 
                             <option value="Archery">Archery</option>
                             <option value="Badminton">Badminton</option>
                             <option value="Bskball">Baseball</option>
                             <option value="Bskball">Basketball</option>
                             <option value="BchVoll">Beach Volleyball</option>
                             <option value="Bowling">Bowling</option>
                             <option value="Diving">Diving</option>
                             <option value="Eqstrian">Equestrian</option>
                             <option value="Fencing">Fencing</option>
                             <option value="FldHcky">Field Hockey</option>
                             <option value="Football">Football</option>
                             <option value="Golf">Golf</option>
                             <option value="Gymn">Gymnastics</option>
                             <option value="IceHcky">Ice Hockey</option>
                             <option value="Lacrsse">Lacrosse</option>
                             <option value="Rifle">Rifle</option>
                             <option value="Rodeo">Rodeo</option>
                             <option value="Rowing">Rowing</option>
                             <option value="Sailing">Sailing</option>
                             <option value="Skiing">Skiing</option>
                             <option value="Soccer">Soccer</option>
                             <option value="Softball">Softball</option>
                             <option value="Squash">Squash</option>
                             <option value="Swimming">Swimming</option>
                             <option value="SwimDivng">Swimming and Diving</option>
                             <option value="SynSwim">Synchronized Swimming</option>
                             <option value="TblTennis">Table Tennis</option>
                             <!-- <option value="21">Team Handball</option> -->
                             <option value="Tennis">Tennis</option>
                             <option value="TrkFldIn">Track and Field, Indoor</option>
                             <option value="TrkFldOut">Track and Field, Outdoor</option>
                             <option value="XCountry">Track and Field, X-Country</option>
                             <option value="Vollball">Volleyball</option>
                             <option value="WaterPolo">Water Polo</option>
                             <option value="WgtLift">Weight Lifting</option>
                             <option value="Wrestling">Wrestling</option>       
                         </select>
                     </label>
                 </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Varsity Athletic Teams end-->
	
	<!--Acceptance Rate-->
<div id="acceptanceRateAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Acceptance Rate</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" style="line-height: 35px;">
                    <select class="form-control" name="applicantsAcceptedMin"  id="applicantsAcceptedMin">        
                        <option selected="selected" value="">Minimum</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>
                    </select>
                    </label>
                    <label class="mod_style_outer" style="line-height: 35px;">
                    <select class="form-control" name="applicantsAcceptedMax" id="applicantsAcceptedMax" title="">
                        <option selected="selected" value="">Maximum</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>   
                    </select>
                    </label>
                  </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Acceptance Rate end-->
	
	<!--Graduation Rate-->
<div id="graduationRateAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Graduation Rate</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" style="line-height: 35px;">
                    <select class="form-control" name="graduationrateMin"  id="graduationrateMin">
                        <option selected="selected" value="">Minimum</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>
                  </select>
                  </label>
                  <label class="mod_style_outer" style="line-height: 35px;">
                  <select class="form-control" name="graduationrateMax" id="graduationrateMax" title="">
                      <option selected="selected" value="">Maximum</option>
                      <option value="5">5%</option>
                      <option value="10">10%</option>
                      <option value="20">20%</option>
                      <option value="30">30%</option>
                      <option value="40">40%</option>
                      <option value="50">50%</option>
                      <option value="60">60%</option>
                      <option value="70">70%</option>
                      <option value="80">80%</option>
                      <option value="90">90%</option>
                      <option value="100">100%</option>
                  </select>
                  </label>
                  </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Graduation Rate end-->
	
	<!--Financial Aid-->
<div id="financialAidAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Financial Aid</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" style="line-height: 35px;">
                        <select class="form-control" name="financialaidMin"  id="financialaidMin">
                            <option selected="selected" value="">Minimum</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                            <option value="40">40%</option>
                            <option value="50">50%</option>
                            <option value="60">60%</option>
                            <option value="70">70%</option>
                            <option value="80">80%</option>
                            <option value="90">90%</option>
                            <option value="100">100%</option>
                        </select>
                    </label>
                    <label class="mod_style_outer" style="line-height: 35px;">
                    <select class="form-control" name="financialaidMax" id="financialaidMax" title="">
                        <option selected="selected" value="">Maximum</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>
                    </select>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Financial Aid end-->
	
	<!--Special Learning Opportunities-->
<div id="specialLearningAdvance" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Special Learning Opportunities</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" >
                        <input class="mod_style" type="checkbox" name="rotc[]" id="rotc_army" value="SLO51">
                        <span class="checkmark" id="chk_rotc_army">ROTC: Army</span> 
                    </label>
                    <label class="mod_style_outer" >
                        <input class="mod_style" type="checkbox" name="rotc[]" id="rotc_navy" value="SLO52">
                        <span class="checkmark" id="chk_rotc_navy">ROTC: Navy</span> 
                    </label>
                    <label class="mod_style_outer" >
                        <input class="mod_style" type="checkbox" name="rotc[]" id="rotc_airforce" value="SLO53">
                        <span class="checkmark" id="chk_rotc_airforce">ROTC: Air Force</span> 
                    </label>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Apply" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
            </div>
      </div>
    </div>
</div>
	<!--Special Learning Opportunities end-->
	
	
	<!--advance search field popup content end-->
	
	<!--Location popup-->
<div id="location-btn" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Location</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer mb-0" style="width:100%">
                    <div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
                        
                      <label class="apj-location-label"><input type="radio" style="position:inherit" value="States" name="serachby"  <?php
                      if(isset($_SESSION['dataform1']['serachby']))
                        {
                            if($_SESSION['dataform1']['serachby'] == 'States')
                            {
                                echo " checked ";
                            }
                        }
                      ?>> States</label>
                    </div>
                    <div class="radio col-md-4 apj-radio" style="margin:0">
                      <label class="apj-location-label"><input type="radio"  style="position:inherit" class="klradio" value="Regions" name="serachby" <?php
                      if(isset($_SESSION['dataform1']['serachby']))
                        {
                            if($_SESSION['dataform1']['serachby'] == 'Regions')
                            {
                                echo " checked ";
                            }
                        }
                      ?>> Regions</label>
                    </div>
                    <div class="radio col-md-4 apj-radio" style="margin:0">
                      <label class="apj-location-label"><input type="radio"  style="position:inherit" class="klradio"  value="ZIP Code" name="serachby" <?php
                      if(isset($_SESSION['dataform1']['serachby']))
                        {
                            if($_SESSION['dataform1']['serachby'] == 'ZIP Code')
                            {
                                echo " checked ";
                            }
                        }
                      ?>> ZIP Code</label>
                    
                        
    
                     </div>
                     </label>
                    
                    </div>					
                    
                    
                <div class="mform_field_wrap state" id="divstate">
                   <label>State :</label>
                     <select class="js-example-basic-multiples form-control" name="state[]" id="state" multiple="multiple">  
                          <option value="AL">Alabama</option>
                          <option value="AK">Alaska</option>
                          <option value="AZ">Arizona</option>
                          <option value="AR">Arkansas</option>
                          <option value="CA">California</option>
                          <option value="CO">Colorado</option>
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="DC">District of Columbia</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="HI">Hawaii</option>
                          <option value="ID">Idaho</option>
                          <option value="IL">Illinois</option>
                          <option value="IN">Indiana</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NV">Nevada</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NM">New Mexico</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="ND">North Dakota</option>
                          <option value="OH">Ohio</option>
                          <option value="OK">Oklahoma</option>
                          <option value="OR">Oregon</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="SD">South Dakota</option>
                          <option value="TN">Tennessee</option>
                          <option value="TX">Texas</option>
                          <option value="UT">Utah</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WA">Washington</option>
                          <option value="WV">West Virginia</option>
                          <option value="WI">Wisconsin</option>
                          <option value="WY">Wyoming</option>
                          <option value="AS">American Samoa</option>
                          <option value="FM">Fed. St. Micronesia</option>
                          <option value="GU">Guam</option>
                          <option value="MH">Marshall Islands</option>
                          <option value="MP">Northern Marianas</option>
                          <option value="PW">Palau</option>
                          <option value="PR">Puerto Rico</option>
                          <option value="VI">Virgin Islands</option>
                        </select>     
     </div>	
     
     
     
                <div class="mform_field_wrap" id="divregion">
                     <label class="mod_style_outer Midwest">
                     <input class="mod_style" type="checkbox" id="midwest" name="parts[]" value="IL,IN,IA,KS,MI,MN,MO,NE,OH,WI">
                     <span class="checkmark" id="chk_midwest">Midwest</span> </label>
                     
                     <label class="mod_style_outer Southeast">
                     <input class="mod_style" type="checkbox" id="southeast" name="parts[]" value="AL,FL,GA,KY,MS,NC,SC,TN">
                     <span class="checkmark" id="chk_southeast">Southeast</span> </label>
                     
                     <label class="mod_style_outer Southwest">
                    <input class="mod_style" type="checkbox" id="southwest" name="parts[]" value="AR,CO,LA,MT,NM,ND,OK,SD,TX,UT,WY">
                     <span class="checkmark" id="chk_southwest">Southwest</span> </label>
                     
                     <label class="mod_style_outer West">
                    <input class="mod_style" type="checkbox" id="west" name="parts[]" value="AK,AZ,CA,GU,HI,ID,NV,OR.WA">
                     <span class="checkmark" id="chk_west">West</span> </label>
                     
                      <label class="mod_style_outer Northeast">
                    <input class="mod_style" type="checkbox" id="northeast" name="parts[]" value="CT,DE,DC,ME,MD,MA,NH,NJ,NY,PA,PR,RI,VT,VI,WV,WV">
                     <span class="checkmark" id="chk_northeast">Northeast</span> </label>
                     
                  </div>
                  
                  
                  <div id="divzipcode">
                   <div class="mform_field_wrap">
                     <label class="mod_style_outer labelzipcode1 mb-0" style="line-height: 35px;">
                        <input type="text" class="input1" id="inputZip" name="inputZip" Placeholder="Zip Code" >
                     </label>
                 
                <label class="mod_style_outer mb-0" style="line-height: 35px;">
                  <select id="miles" class="form-control" id="miles" name="miles">
                    <option selected="selected" value="0">Miles from</option>
                    <option value="5">5 miles</option>
                    <option value="10">10 miles</option>
                    <option value="15">15 miles</option>
                    <option value="20">20 miles</option>
                    <option value="25">25 miles</option>
                    <option value="50">50 miles</option>
                    <option value="100">100 miles</option>
                    <option value="150">150 miles</option>
                    <option value="200">200 miles</option>
                    <option value="250">250 miles</option>
                  </select>
                </label>
                </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type='submit' name="applybtn1" class='btn btn-primary next applybtn mybluebtn'>Apply</button>
            </div>
      </div>
    </div>
</div>	
<!--location popup end-->
	
<!--Campus Setting-->
	<div id="campus-btn" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Campus Setting</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer Rural">
                      <input class="mod_style" type="checkbox" name="campusSetting[]" id="rural" value="rural">
                    <span class="checkmark" id="chk_rural">Rural</span> </label>
                    
                    <label class="mod_style_outer Town">
                     <input class="mod_style" type="checkbox" name="campusSetting[]" id="town" value="town">
                    <span class="checkmark" id="chk_town">Town</span> </label>
                    
                    <label class="mod_style_outer Suburban">
                    <input class="mod_style" type="checkbox" name="campusSetting[]" id="suburban" value="suburban">
                    <span class="checkmark" id="chk_suburban">Suburban</span> </label>
                    
                    <label class="mod_style_outer City">
                       <input class="mod_style" type="checkbox" name="campusSetting[]" id="city" value="city">
                    <span class="checkmark" id="chk_city">City</span> </label>
                 </div>
            </div>
            <div class="modal-footer">
                <button type='submit' name="applybtn2" class='btn btn-primary next applybtn mybluebtn'>Apply</button>
            </div>
      </div>
    </div>
</div>
<!--campus setting end-->
	
<!--Student Enrollment-->
	<div id="student-btn" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Student Enrollment</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer mb-0" style="line-height: 35px;">
                      <select  class="form-control" name="enrollment_min" id="enrollment_min">        
                          <option value="">Minimum</option>
                          <option value="100">100</option>
                          <option value="500">500</option>
                          <option value="1000">1,000</option>
                          <option value="5000">5,000</option>
                          <option value="10000">10,000</option>
                          <option value="20000">20,000</option>
                          <option value="30000">30,000</option>
                        </select>
                    </label>
                    
                     <label class="mod_style_outer mb-0" style="line-height: 35px;">
                     <select  class="form-control" name="enrollment_max" id="enrollment_max">        
                          <option value="">Maximum</option>
                          <option value="100">100</option>
                          <option value="500">500</option>
                          <option value="1000">1,000</option>
                          <option value="5000">5,000</option>
                          <option value="10000">10,000</option>
                          <option value="20000">20,000</option>
                          <option value="30000">30,000</option>
                          <option value="40000+">40,000 +</option>
                        </select>
                    </label>
                    
                    </div>
            </div>
            <div class="modal-footer">
                <button type='submit' class='btn btn-primary next applybtn mybluebtn' name="applybtn3">Apply</button>
            </div>
      </div>
    </div>
</div>
<!--Student Enrollment end-->

<!--Programs/Majors-->
<div id="majors-btn" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Programs/Majors</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap" id="courseoptions">
                    <label class="mod_style_outer mb-0" style="width:100%;line-height: 35px;">
                      <select class="js-example-basic-multiple form-control" id="program_majors" name="program_majors[]" multiple="multiple">  
                              <?php				  			
                                $queryvertical = "SELECT * FROM `valuesets18` WHERE `TableName` = 'C2018DEP' AND `varName` = 'CIPCODE'  ORDER BY `valuesets18`.`valueLabel` ASC ";					
                                $resultvertical = mysqli_query($con,$queryvertical);
                                if(mysqli_num_rows($resultvertical) > 0) {
                                        while($row = mysqli_fetch_array($resultvertical))
                                        {
                                            echo " <option   value='".$row['Codevalue']."''>".$row['valueLabel']."</option>";
                                        }							
                                }
                            ?>     
                        </select>      
                    </label>
                       
                    </div>
                    
                    <div class="mform_field_wrap apj-checkmark">
                        <label class="mod_style_outer">
                        <input class="mod_style" type="checkbox" name="distance_learning_only" id="distance_learning_only" value="1">
                        <span class="checkmark checkmark-md"  id="chk_distance_learning_only" style="font-size:14px">Only find schools that offer these selections as Distance Education</span> </label>
                        
                        <label class="mod_style_outer">
                        <input class="mod_style" type="checkbox" name="offer_all" id="offer_all" value="1">
                        <span class="checkmark checkmark-md"  id="chk_offer_all" style="font-size:14px">Only find schools that offer ALL these selections</span> </label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type='submit' class='btn btn-primary next applybtn mybluebtn' name="applybtn4">Apply</button>
            </div>
      </div>
    </div>
</div>
<!--Programs/Majors end-->
	
<!--Level of Award-->
<div id="award-btn" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Level of Award</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer">
                     <input class="mod_style" type="checkbox" name="level_of_award[]" id="certificate" value="certificate">
                    <span class="checkmark"  id="chk_certificate" >Certificate</span> </label>
    
                    <label class="mod_style_outer">
                    <input class="mod_style" type="checkbox" name="level_of_award[]" id="bachelor" value="bachelor">
                    <span class="checkmark"  id="chk_bachelor" >Bachelor's</span> </label>
    
                    <label class="mod_style_outer">
                    <input class="mod_style" type="checkbox" name="level_of_award[]" id="associates" value="associates">
                    <span class="checkmark"  id="chk_associates" >Associate's</span> </label>
    
                    <label class="mod_style_outer">
                    <input class="mod_style" type="checkbox" name="level_of_award[]" id="advanced" value="advanced">
                    <span class="checkmark"  id="chk_advanced" >Advanced</span> </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type='submit' class='btn btn-primary next applybtn mybluebtn' name="applybtn5">Apply</button>
            </div>
      </div>
    </div>
</div>
<!--Level of Award end-->
	
<!--Institution Type-->
	<div id="institure-btn" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Institution Type</h4>
            </div>
            <div class="modal-body">
                <div class="mform_field_wrap">
                    <label class="mod_style_outer" style="min-width: 225px;">
                     <input class="mod_style" type="checkbox" name="institution_type[]" id="public" value="1,4,7">
                    <span class="checkmark" id="chk_public" >Public</span> </label>
    
                    <label class="mod_style_outer" style="min-width: 225px;">
                    <input class="mod_style" type="checkbox" name="institution_type[]" id="privat_non_profit" value="2,5,8">
                    <span class="checkmark" id="chk_privat_non_profit" >Private non-profit</span> </label>
    
                    <label class="mod_style_outer" style="min-width: 225px;">
                    <input class="mod_style" type="checkbox" name="institution_type[]" id="privat_for_profit" value="3,6,9">
                    <span class="checkmark" id="chk_privat_for_profit" >Private for-profit</span> </label>
    
                    <label class="mod_style_outer" style="min-width: 225px;">
                    <input class="mod_style" type="checkbox" name="institution_type[]" id="4_year" value="1,2,3">
                    <span class="checkmark" id="chk_4_year" >4-year</span> </label>
                    
                    <label class="mod_style_outer" style="min-width: 225px;">
                    <input class="mod_style" type="checkbox" name="institution_type[]" id="2_year" value="4,5,6">
                    <span class="checkmark" id="chk_2_year" >2-year</span> </label>
                    
                    <label class="mod_style_outer" style="min-width: 225px;">
                    <input class="mod_style" type="checkbox" name="institution_type[]" id="less_2_year" value="7,8,9">
                    <span class="checkmark" id="chk_less_2_year" >&lt; 2-year</span> </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type='submit' class='btn btn-primary next applybtn mybluebtn' name="applybtn6">Apply</button>
            </div>
      </div>
    </div>
</div>
<!-- Institution Type end-->

</div>
</div>
</form>
<div class="col-md-9">
	<div class="row">
	<?php //print_r($_SESSION['clgcb']); ?>
		<div class="sort-n-search-bar">
		<div class="col-md-2 col-xs-3 sort-toggle-btn">
			<!--<div id="sort-btn" class="sort-btn"><div class="sort-icon"><i class="fa fa-sort"></i></div></div>-->
			<div id="sort-btn" class="sort-btn"><div class="sort-icon">Sort</div></div>
		</div>
		<div id="sort-content" class="sort-content">	
			<form method="post">
				<div class="row p15">
					<div class="col-md-2 col-xs-3 close-toggle-btn">
						<!--<div id="close-btn" class="close-btn"><div class="close-icon"><i class="fa fa-times" aria-hidden="true"></i></div></div>-->
						<div id="close-btn" class="close-btn"><div class="close-icon">Close</div></div>
					</div>
					<!--<div class="col-md-1 text-right" style="padding-bottom: 15px;"></div>-->
					<div class="col-md-4 col-xs-12 text-right apj-top-select mb-0-desktop">
    					<select  class="form-control apj-top-selectbox" name="orderbyfield" id="orderbyfield">
       						<option value="" >Sort By</option>
	   						<option value="instnm"  <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'instnm'){ echo "selected"; }} ?>>Colleges</option>
       						<option value="state" <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'state'){ echo "selected"; }} ?>>States</option>       
       						<option value="city"  <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'city'){ echo "selected"; }} ?>>Cities</option>
       						<option value="enrollment"  <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'enrollment'){ echo "selected"; }} ?>>Enrollment</option>
       						<option value="percentadmitted"  <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'percentadmitted'){ echo "selected"; }} ?>>Acceptance Rate</option>							
							<option value="graduationrate"  <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'graduationrate'){ echo "selected"; }} ?>>Graduation Rate</option>
							<option value="finacialaid"  <?php if(isset($_SESSION['orderbyfield']) && !empty($_SESSION['orderbyfield'])){ if($_SESSION['orderbyfield'] == 'finacialaid'){ echo "selected"; }} ?>>Financial Aid</option>
							
    					</select>
					</div>
					<div class="col-md-4 col-xs-12 text-right apj-top-select mb-0-desktop">
						<select  class="form-control apj-top-selectbox" name="orderbytype" id="orderbytype">
						   <option value="asc"  <?php if(isset($_SESSION['orderbytype']) && !empty($_SESSION['orderbytype'])){ if($_SESSION['orderbytype'] == 'asc'){ echo "selected"; }} ?>>A &#8594; Z</option>
						   <option value="desc"  <?php if(isset($_SESSION['orderbytype']) && !empty($_SESSION['orderbytype'])){ if($_SESSION['orderbytype'] == 'desc'){ echo "selected"; }} ?>>Z &#8594; A</option>
							
						</select>
					</div>
					<div class="col-md-2 col-xs-12 text-right apj-top-select">
					<button type="submit" name="btnorderby" class="btn btn-primary apj-top-select-apply-btn mybluebtn" >Apply</button>
					</div>

				</div>
			</form>
		</div>  
		<!--end sort bar-->
		
		<!--search bar-->
			<div class="col-xs-4 search-toggle-btn">
				<div id="searchBtnXs" class="searchbtn-xs"><div class="close-icon">Find</div></div>
			</div>
		<div class="col-md-7 col-xs-12 search-section">
			<div id="close-search" class="searchbtn-xs"><div class="close-icon">Close</div></div>
			<div class="result-search-bar">
				<div class="search-form">
					<form method="POST" id="searchbynameform">
						<div class="input-group">
              <div class="input-group-btn">
                 
                  
                  <button class="btn btn-default" type="submit" name="btnsearchschoolname" id="btnsearchschoolname">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </div>
							<input type="text" id="search_schoolname" name="search_schoolname" value="<?php if(isset($_SESSION['search_schoolname'])){echo $_SESSION['search_schoolname'];} ?>" class="form-control" placeholder="Find a School by Name" >
								<div class="input-group-btn">
									 <button class="btn btn-default search-close" type="button">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
								</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--end search bar-->
		
		<!--search result number-->
		<?php
			$sql = "SELECT count(*) as totalcount FROM hd2018 ".$condition ;
			$result = $con->query($sql);	
			echo '<div class="col-md-3 col-xs-5 text-right result-number-xs">';
			while($row = $result->fetch_assoc()) {
			echo '<span class="search_results">'.$row['totalcount'].' results</span>';
			}
			echo '</div>';
		?>
		<!--search result number-->
		</div>
	</div>
	
<!--alert box-->
	<div class="row">
		
	<div class="myresultalert">
		<div class="col-sm-9 col-md-9 col-xs-12">
		<div class="alert alert-warning alert-dismissible fade in alert-select-school">
    	<span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Click on the checkbox to add a school to your list. After selecting your colleges, click to see your chances of acceptance.</span>
  		</div>
		</div>
		<div class="col-sm-3 col-md-3 col-xs-12">
			<div class="view-college-btn">
				<a href=# class="selected_clgs_popup">Selected Colleges</a>
			</div>
		</div>
	</div>
	</div>
<!--end alert box-->

</div>
<form action="results.php" method="post">
	<!-- <input type="submit" value="Chances of Acceptance?" class="btn btn-primary chance" > -->
<div class="col-md-9" id="clgdatadiv">

	<?php 
if(isset($_SESSION['dataform1']) ):
   
		
		$clgidarr = array();
		
				
		$sql = "SELECT * FROM hd2018 ".$condition;
		
		if(isset($_SESSION['orderbyfield']) && isset($_SESSION['orderbytype']) && !empty($_SESSION['orderbytype']) && !empty($_SESSION['orderbyfield']))
		{
			if($_SESSION['orderbyfield'] == 'instnm')
			{
				$sql .= ' ORDER BY `INSTNM` '.$_SESSION['orderbytype'];
			}
			else if($_SESSION['orderbyfield'] == 'state')
			{
				$sql .= ' ORDER BY `STABBR` '.$_SESSION['orderbytype'];
			}
			else if($_SESSION['orderbyfield'] == 'city')
			{
				$sql .= ' ORDER BY `CITY` '.$_SESSION['orderbytype'];
			}	
			else if($_SESSION['orderbyfield'] == 'enrollment')
			{
				$sql .= ' ORDER BY '."(select `ENRTOT` from `drvef2018` where drvef2018.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'];
			}	
			else if($_SESSION['orderbyfield'] == 'percentadmitted')
			{
				$sql .= ' ORDER BY '."(select `DVADM01` from `drvadm2018` where drvadm2018.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'];
			}	
			else if($_SESSION['orderbyfield'] == 'graduationrate')
			{
				$sql .= ' ORDER BY '."(select `PGGRRTT` from `drvgr2018` where drvgr2018.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}
			else if($_SESSION['orderbyfield'] == 'finacialaid')
			{
				$sql .= ' ORDER BY '."(select `ANYAIDP` from `sfa1718_p1` where sfa1718_p1.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}
			else if($_SESSION['orderbyfield'] == 'outofstate')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `CHG3AY3` FROM `ic2018_ay` where ic2018_ay.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}else if($_SESSION['orderbyfield'] == 'instate')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `CHG2AY3` FROM `ic2018_ay` where ic2018_ay.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}else if($_SESSION['orderbyfield'] == 'books')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `CHG4AY3` FROM `ic2018_ay` where ic2018_ay.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}else if($_SESSION['orderbyfield'] == 'netprice')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `NPIST2` FROM `sfa1718_p2` where sfa1718_p2.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}else if($_SESSION['orderbyfield'] == 'satevidence')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `SATVR25` FROM `adm2018` where adm2018.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}else if($_SESSION['orderbyfield'] == 'satmath') {
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY ' . "(SELECT `SATMT25` FROM `adm2018` where adm2018.UNITID = hd2018.UNITID) " . $_SESSION['orderbytype'] . ' ';
			}else if($_SESSION['orderbyfield'] == 'actenglish')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `ACTEN25` FROM `adm2018` where adm2018.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}else if($_SESSION['orderbyfield'] == 'actmath')
			{
				///$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
				//$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";

				$sql .= ' ORDER BY '."(SELECT `ACTMT25` FROM `adm2018` where adm2018.UNITID = hd2018.UNITID) ".$_SESSION['orderbytype'].' ';
			}
			else
			{
				
			}
			
		}
		else
		{
			$sql .= ' ORDER BY `INSTNM` ASC';
		}
		$sql_kala = $sql ;
		
		echo '<input type="hidden" value="'.$sql_kala.'" id="sqlkala"/>';
		$sql .= ' LIMIT 0,30 ';
		$result = $con->query($sql);			
		
		if ($result->num_rows > 0) {			
			
			//echo '<span class="no_of_result">'. $result->num_rows.' Results </span>';
		//	echo '<input type="submit" name="submit" value="Analyze Colleges !">';
			//echo '<button id="listanalyzeclgsbtn" class="btn btn-info" onclick=analyzelist()>Analyze Colleges</button>';
		    while($row = $result->fetch_assoc()) {
				$singleclgarr = array();
				$singleclgarr['UNITID'] = $row['UNITID'];
				$singleclgarr['INSTNM']=$row['INSTNM'];
				$singleclgarr['CITY']=$row['CITY'];
				$singleclgarr['STABBR']=$row['STABBR'];
				$singleclgarr['WEBADDR']=$row['WEBADDR'];
				array_push($clgidarr,$singleclgarr);
		    }
			
			if(count($clgidarr)>0){
				//echo '<table class="table table-striped" id="table_id">
					//	<thead><tr><th>Select</th><th>College Name</th></tr></thead>
					//	<tbody>';
					$kalacount = 0;
				foreach($clgidarr as $arr){
					
					$enrollquery ='';
					$enrolresult= '';
					$enroll='';
					$percentadmitted = '';
					$percentquery = '';
					$graduationrate = 0;
					$financialaidrate = 0;
					$outofstatefees = 'N/A';
					$instatefees = 'N/A';
					$booksfees = 'N/A';
					$netprice = 'N/A';
					$satevidence = 'N/A';
					$satmath = 'N/A';
					$actenglish = 'N/A';
					$actmath = 'N/A';
					if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'enrollment')
					{
						$enrollquery = "select `ENRTOT` from `drvef2018` where drvef2018.UNITID =".$arr['UNITID'];
						$enrolresult = $con->query($enrollquery);
						$rowenroll = $enrolresult->fetch_assoc();
						if(!empty($rowenroll)){
							$enroll = $rowenroll['ENRTOT'];
						}else{
							$enroll = 0;
						}
						//echo "<pre>";print_r($rowenroll);
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'percentadmitted'){
						$percentquery = "select `DVADM01` from `drvadm2018` where drvadm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$percentadmitted = $rowpercent['DVADM01'];
						}else{
							$percentadmitted = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'graduationrate'){
						$percentquery = "select `PGGRRTT` from `drvgr2018` where drvgr2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$graduationrate = $rowpercent['PGGRRTT'];
						}else{
							$graduationrate = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'finacialaid'){
						$percentquery = "select `ANYAIDP` from `sfa1718_p1` where sfa1718_p1.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$financialaidrate = $rowpercent['ANYAIDP'];
						}else{
							$financialaidrate = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'outofstate'){
						$percentquery = "SELECT `CHG3AY3` FROM `ic2018_ay` where ic2018_ay.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$outofstatefees = $rowpercent['CHG3AY3'];
						}else{
							$outofstatefees = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'instate'){
						$percentquery = "SELECT `CHG2AY3` FROM `ic2018_ay` where ic2018_ay.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$instatefees = $rowpercent['CHG2AY3'];
						}else{
							$instatefees = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'books'){
						$percentquery = "SELECT `CHG4AY3` FROM `ic2018_ay` where ic2018_ay.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$booksfees = $rowpercent['CHG4AY3'];
						}else{
							$booksfees = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'netprice'){
						$percentquery = "SELECT `NPIST2` FROM `sfa1718_p2` where sfa1718_p2.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$netprice = $rowpercent['NPIST2'];
						}else{
							$netprice = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satevidence'){
						$percentquery = "SELECT `SATVR25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$satevidence = $rowpercent['SATVR25'];
						}else{
							$satevidence = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satmath'){
						$percentquery = "SELECT `SATMT25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$satmath = $rowpercent['SATMT25'];
						}else{
							$satmath = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actenglish'){
						$percentquery = "SELECT `ACTEN25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$actenglish = $rowpercent['ACTEN25'];
						}else{
							$actenglish = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actmath'){
						$percentquery = "SELECT `ACTMT25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$actmath = $rowpercent['ACTMT25'];
						}else{
							$actmath = 'N/A';
						}
					}
				
					$kala_backgroundclr = "";
					$kala_txtclr = "";
					$kala_btnclass = "";
					$kala_chkbox = "";
					if(isset($_SESSION['clgcb']))
					{
						foreach($_SESSION['clgcb'] as $preclgcb)
						{
							if($preclgcb == $arr['UNITID'])
							{
								$kala_backgroundclr = 'style="background-color: rgb(1, 159, 240);"';
								$kala_txtclr = 'style="color: white;"';
								$kala_btnclass = "yellow-bg";
								$kala_chkbox = "checked";
							}
						}
					}
					echo '<div class="col-md-4 col-sm-12"> 
						<input type="checkbox" onchange="toggleCheckbox(this)" class="green-tickbox" value="'.$arr['UNITID'].'" id="clgchk'.$arr['UNITID'].'" name="clgcb[]" '.$kala_chkbox.'/> 
						 <div class="College-Search-inner" id="box'.$arr['UNITID'].'" '.$kala_backgroundclr.'>
						   <div class="col-sm-12 col-md-11 col-xs-12 pr-0" onclick="toggleClgUpper('.$arr['UNITID'].')">
								<h3 '.$kala_txtclr.'>'. $arr['INSTNM'].'</h3>
								<p '.$kala_txtclr.'>'. $arr['CITY'].', '.$arr['STABBR'].'</p>';
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'enrollment') {
									if($enroll > 0)
										echo '<p>Enrollment : ' .  number_format($enroll) . '</p>';
									else
										echo '<p>Enrollment : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'percentadmitted') {
									if($percentadmitted > 0)
										echo '<p>Acceptance Rate : ' . $percentadmitted . '%</p>';
									else
										echo '<p>Acceptance Rate : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'graduationrate') {
									if($graduationrate > 0)
										echo '<p>Graduation Rate : ' . $graduationrate . '%</p>';
									else
										echo '<p>Acceptance Rate : N/A</p>';									
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'finacialaid') {
									if($financialaidrate > 0)
										echo '<p>Financial Aid : ' . $financialaidrate . '%</p>';
									else
										echo '<p>Financial Aid : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'outofstate') {
									if($outofstatefees > 0)
										echo '<p>Out-of-State Tuition : ' . $outofstatefees . '%</p>';
									else
										echo '<p>Out-of-State Tuition : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'instate') {
									if($instatefees > 0)
										echo '<p>In-State Tuition : ' . $instatefees . '%</p>';
									else
										echo '<p>In-State Tuition : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'books') {
									if($booksfees > 0)
										echo '<p>Books & Supplies : ' . $booksfees . '%</p>';
									else
										echo '<p>Books & Supplies : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'netprice') {
									if($netprice > 0)
										echo '<p>Net Price : ' . $netprice . '%</p>';
									else
										echo '<p>Net Price : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satevidence') {
									if($satevidence > 0)
										echo '<p>SAT Evidence-Based Reading and Writing : ' . $satevidence . '%</p>';
									else
										echo '<p>SAT Evidence-Based Reading and Writing : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satmath') {
									if($satmath > 0)
										echo '<p>SAT Math : ' . $satmath . '%</p>';
									else
										echo '<p>SAT Math : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actenglish') {
									if($actenglish > 0)
										echo '<p>ACT English : ' . $actenglish . '%</p>';
									else
										echo '<p>ACT English : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actmath') {
									if($actmath > 0)
										echo '<p>ACT Math : ' . $actmath . '%</p>';
									else
										echo '<p>ACT Math : N/A</p>';
								}
						   echo '</div>
							<div class="col-sm-12 col-md-12 col-xs-12 btn-college-list">
							  <div class="collage-details table-responsive-sm">
							   <ul>
									 <li>
										<a class="clg-website-address mybluebtnsmall '.$kala_btnclass.'" href="school-profile.php?unitid='.$arr['UNITID'].'" target="_blank">More Information</a>
									</li>
								  </ul>
								   </div> 
							</div>
						 </div>
					  </div>';
					
					//	echo '<tr>';
					//	echo '<td><input type="checkbox" id="clgcb[]" name="clgcb[]" value="'.$key.'"></td>';
					//	echo '<td><span class="schoolInfo" onclick="getSchoolInfo('.$key.')">'. $val .'</span>';
						//echo '<td onclick="getSchoolInfo('.$key.')">'.$val;
					//	echo '</td> </tr>';
					$kalacount++;
					
					}
					//echo '</tbody></table>';
				
			}
			
		}else{
			
			echo '<b>Try broadening your search. Only institutions matching ALL criteria in your search will be returned. </b>';
		}
		//echo '</tbody></table>';
		
endif;
?>	
		</div>
		</div><!--#clgdatadiv-->
        <div class="bottom-sec">
			<button class="text-center chance-of-acceptance hidden-mobile"><img src="images/footer-button-design.png" alt=""></button>
			<button class="text-center chance-of-acceptance hidden-desktop"><img src="images/footer-button-design-sm.jpg" alt=""></button>
 		</div>
</form>		
     </div>
   

  <div class="modal fade" id="myModal" role="dialog" class="collage-details">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">School Profile</h4>
        </div>
        <div class="modal-body" id="infodiv">
         
	    </div>
      </div>
      
    </div>
  </div>

</section>
<div class="modal fade" id="selectedclgmodal" role="dialog" class="selectedclgmodal">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Selected Colleges</h4>
      </div>
      <div class="modal-body" id="selectedclg">
       <div class="col-xs-12 col-md-12 mb-30">
        <ul class="list-group mycollegelist" id="myselectedclgcb">
          
		  <?php if(isset($_SESSION['clgcb']) && count($_SESSION['clgcb']) > 0){
				$clgcblist = implode(",",$_SESSION['clgcb']);
				$sql = "SELECT * FROM hd2018 WHERE UNITID IN ($clgcblist)";
				$result = $con->query($sql);	
				while($row = $result->fetch_assoc()) {
					
					?>
					 <li class="list-group-item">
					
						<span class="d-selectclgs">
						  <label class="checkbox-label" for="selectclg1">
							<input type="checkbox" id="selectclg1" name="selectclg1">
						  <span class="checkbox-custom circular"></span>
						</label>
					  </span>
					 
						<span class="deleteclg">
						  <i class="mr-8 ml-8 fa fa-close"></i>
						</span>
						 <a  href="school-profile.php?unitid=<?php echo $row['UNITID']; ?>" target="_blank">
					<?php echo $row['INSTNM']; ?></a>
					</li>   
					<?php
				}
				
			 
		  }  else
			  {
				  echo '<li class="list-group-item">Nothing Selected</li>';
			  }
			  ?>
		  
		  

          <!--<li class="list-group-item">Columbia University </li>-->
        </ul>
	
      </div>
    </div>
  </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


<script src="js/sweetalert/sweetalert.min.js"></script>
	<script src="js/sweetalert/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="js/sweetalert/sweetalert.css">
	
	
<script> 
$(document).ready(function(){
$(".search-close").click(function(){
   $("#search_schoolname").val('');
   $( '#btnsearchschoolname').trigger( "click" );
  
   
});

	$("#divstate").hide();
		$("#divregion").hide();
		$("#divzipcode").hide();
		
	<?php 
	if(isset($_SESSION['dataform1']['serachby']))
	{
		if($_SESSION['dataform1']['serachby'] == 'Regions')
		{
			echo ' $("#divzipcode").hide();
				 $("#divregion").show();
				  $("#divstate").hide();';
		}
		
		if($_SESSION['dataform1']['serachby'] == 'States')
		{
			echo ' $("#divzipcode").hide();
				 $("#divregion").hide();
				  $("#divstate").show();';
		}
		
		if($_SESSION['dataform1']['serachby'] == 'ZIP Code')
		{
			echo ' $("#divzipcode").show();
				 $("#divregion").hide();
				  $("#divstate").hide();';
		}
	}	
		
	if(isset($_SESSION['dataform1']['state']))
	{
		$state = implode(",",$_SESSION['dataform1']['state']);
		echo 'var state = "'.$state.'";';
		//echo 'alert(state);';
		echo '$("#state").val(state.split(",")); ';
	}
	
	if(isset($_SESSION['dataform1']['parts']))
	{
		if (in_array("IL,IN,IA,KS,MI,MN,MO,NE,OH,WI",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_midwest" ).addClass( "selected" );';
			echo 'document.getElementById("midwest").checked = true;';
		}
		if (in_array("AL,FL,GA,KY,MS,NC,SC,TN",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_southeast" ).addClass( "selected" );';
			echo 'document.getElementById("southeast").checked = true;';
		}
		if (in_array("AR,CO,LA,MT,NM,ND,OK,SD,TX,UT,WY",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_southwest" ).addClass( "selected" );';
			echo 'document.getElementById("southwest").checked = true;';
		}
		if (in_array("AK,AZ,CA,GU,HI,ID,NV,OR.WA",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_west" ).addClass( "selected" );';
			echo 'document.getElementById("west").checked = true;';
		}
		if (in_array("CT,DE,DC,ME,MD,MA,NH,NJ,NY,PA,PR,RI,VT,VI,WV,WV",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_northeast" ).addClass( "selected" );';
			echo 'document.getElementById("northeast").checked = true;';
		}
	}
	
	
	if(isset($_SESSION['dataform1']['campusSetting']))
	{
		if (in_array("city",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_city" ).addClass( "selected" );';
			echo 'document.getElementById("city").checked = true;';
		}
		if (in_array("rural",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_rural" ).addClass( "selected" );';
			echo 'document.getElementById("rural").checked = true;';
		}
		if (in_array("town",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_town" ).addClass( "selected" );';
			echo 'document.getElementById("town").checked = true;';
		}
		if (in_array("suburban",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_suburban" ).addClass( "selected" );';
			echo 'document.getElementById("suburban").checked = true;';
		}
	}
	
	if(isset($_SESSION['dataform1']['inputZip']))
	{
		echo '$("#inputZip").val("'.$_SESSION['dataform1']['inputZip'].'");';
	}
	
	if(isset($_SESSION['dataform1']['miles']))
	{
		echo '$("#miles").val("'.$_SESSION['dataform1']['miles'].'");';
	}
	
	
	if(isset($_SESSION['dataform1']['enrollment_max']))
	{
		echo '$("#enrollment_max").val("'.$_SESSION['dataform1']['enrollment_max'].'");';
	}
	
	if(isset($_SESSION['dataform1']['enrollment_min']))
	{
		echo '$("#enrollment_min").val("'.$_SESSION['dataform1']['enrollment_min'].'");';
	}
	
	if(isset($_SESSION['dataform1']['program_majors']))
	{
		$program_majors = implode(",",$_SESSION['dataform1']['program_majors']);
		echo 'var program_majors = "'.$program_majors.'";';
		//echo 'alert(program_majors);';
		echo '$("#program_majors").val(program_majors.split(",")); ';
	}
		
	if(isset($_SESSION['dataform1']['distance_learning_only']))
	{
		echo '$( "#chk_distance_learning_only" ).addClass( "selected" );';
		echo 'document.getElementById("distance_learning_only").checked = true;';
	}
	
	if(isset($_SESSION['dataform1']['offer_all']))
	{
		echo '$( "#chk_offer_all" ).addClass( "selected" );';
		echo 'document.getElementById("offer_all").checked = true;';
	}
	
	if(isset($_SESSION['dataform1']['level_of_award']))
	{
		if (in_array("certificate",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_certificate" ).addClass( "selected" );';
			echo 'document.getElementById("certificate").checked = true;';
		}
		if (in_array("bachelor",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_bachelor" ).addClass( "selected" );';
			echo 'document.getElementById("bachelor").checked = true;';
		}
		if (in_array("associates",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_associates" ).addClass( "selected" );';
			echo 'document.getElementById("associates").checked = true;';
		}
		if (in_array("advanced",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_advanced" ).addClass( "selected" );';
			echo 'document.getElementById("advanced").checked = true;';
		}
		
	}
	
	if(isset($_SESSION['dataform1']['institution_type']))
	{
		if (in_array("1,4,7",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_public" ).addClass( "selected" );';
			echo 'document.getElementById("public").checked = true;';
		}
		if (in_array("2,5,8",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_privat_non_profit" ).addClass( "selected" );';
			echo 'document.getElementById("privat_non_profit").checked = true;';
		}
		if (in_array("3,6,9",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_privat_for_profit" ).addClass( "selected" );';
			echo 'document.getElementById("privat_for_profit").checked = true;';
		}
		if (in_array("1,2,3",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_4_year" ).addClass( "selected" );';
			echo 'document.getElementById("4_year").checked = true;';
		}
		if (in_array("4,5,6",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_2_year" ).addClass( "selected" );';
			echo 'document.getElementById("2_year").checked = true;';
		}
		if (in_array("7,8,9",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_less_2_year" ).addClass( "selected" );';
			echo 'document.getElementById("less_2_year").checked = true;';
		}
		
	}
	
	
	if(isset($_SESSION['dataform1']['housing']))
	{
		//echo "alert('if');";
		if($_SESSION['dataform1']['housing'] == 'Yes')
		{
			echo '$( "#chk_housing_yes" ).addClass( "selected" );
			$( "#chk_housing_yes" ).removeClass( "apjselected" );
			document.getElementById("housing_yes").checked = true;';
		}
		else
		{
			echo '$( "#chk_housing_no" ).addClass( "selected" );
			$( "#chk_housing_no" ).removeClass( "apjselected" );
			document.getElementById("housing_no").checked = true;';
		}
		/*
		echo '$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append("Yes");
			document.getElementById("housing").checked = true;';
*/
	}
	else
	{
		//echo "alert('else');";
	}
	if(isset($_SESSION['dataform1']['specialized_mission']))
	{
		echo '$("#specialized_mission").val("'.$_SESSION['dataform1']['specialized_mission'].'");';
	}
	
	
	if(isset($_SESSION['dataform1']['extended_learning']))
	{
		if (in_array("DISTNCED",$_SESSION['dataform1']['extended_learning']))
		{
			echo '$( "#chk_distance_learning" ).addClass( "selected" );';
			echo 'document.getElementById("distance_learning").checked = true;';
		}
		if (in_array("SLO7",$_SESSION['dataform1']['extended_learning']))
		{
			echo '$( "#chk_weekend_evening" ).addClass( "selected" );';
			echo 'document.getElementById("weekend_evening").checked = true;';
		}
		if (in_array("CREDITS2",$_SESSION['dataform1']['extended_learning']))
		{
			echo '$( "#chk_credit_life_exp" ).addClass( "selected" );';
			echo 'document.getElementById("credit_life_exp").checked = true;';
		}
		
	}
	if(isset($_SESSION['dataform1']['rotc']))
	{
		if (in_array("SLO51",$_SESSION['dataform1']['rotc']))
		{
			echo '$( "#chk_rotc_army" ).addClass( "selected" );';
			echo 'document.getElementById("rotc_army").checked = true;';
		}
		if (in_array("SLO52",$_SESSION['dataform1']['rotc']))
		{
			echo '$( "#chk_rotc_navy" ).addClass( "selected" );';
			echo 'document.getElementById("rotc_navy").checked = true;';
		}
		if (in_array("SLO53",$_SESSION['dataform1']['rotc']))
		{
			echo '$( "#chk_rotc_airforce" ).addClass( "selected" );';
			echo 'document.getElementById("rotc_airforce").checked = true;';
		}

	}
	if(isset($_SESSION['dataform1']['ReligiousAffilation']))
	{
		echo '$("#ReligiousAffilation").val("'.$_SESSION['dataform1']['ReligiousAffilation'].'");';
	}
	
	if(isset($_SESSION['dataform1']['athletic_team_g']))
	{
		if (in_array("PARTIC_MEN_",$_SESSION['dataform1']['athletic_team_g']))
		{
			echo '$( "#chk_PARTIC_MEN_" ).addClass( "selected" );';
			echo 'document.getElementById("PARTIC_MEN_").checked = true;';
		}
		if (in_array("PARTIC_WOMEN_",$_SESSION['dataform1']['athletic_team_g']))
		{
			echo '$( "#chk_PARTIC_WOMEN_" ).addClass( "selected" );';
			echo 'document.getElementById("PARTIC_WOMEN_").checked = true;';
		}
		
	}
	
	if(isset($_SESSION['dataform1']['athletic_team']))
	{
		echo '$("#athletic_team").val("'.$_SESSION['dataform1']['athletic_team'].'");';
	}
	
	if(isset($_SESSION['dataform1']['tuitionMin']))
	{
		echo '$("#tuitionMin").val("'.$_SESSION['dataform1']['tuitionMin'].'");';
	}
	
	if(isset($_SESSION['dataform1']['tuitionMax']))
	{
		echo '$("#tuitionMax").val("'.$_SESSION['dataform1']['tuitionMax'].'");';
	}
	
	if(isset($_SESSION['dataform1']['applicantsAcceptedMin']))
	{
		echo '$("#applicantsAcceptedMin").val("'.$_SESSION['dataform1']['applicantsAcceptedMin'].'");';
	}
	
	if(isset($_SESSION['dataform1']['applicantsAcceptedMax']))
	{
		echo '$("#applicantsAcceptedMax").val("'.$_SESSION['dataform1']['applicantsAcceptedMax'].'");';
	}
	if(isset($_SESSION['dataform1']['graduationrateMin']))
	{
		echo '$("#graduationrateMin").val("'.$_SESSION['dataform1']['graduationrateMin'].'");';
	}

	if(isset($_SESSION['dataform1']['graduationrateMax']))
	{
		echo '$("#graduationrateMax").val("'.$_SESSION['dataform1']['graduationrateMax'].'");';
	}
	if(isset($_SESSION['dataform1']['financialaidMin']))
	{
		echo '$("#financialaidMin").val("'.$_SESSION['dataform1']['financialaidMin'].'");';
	}

	if(isset($_SESSION['dataform1']['financialaidMax']))
	{
		echo '$("#financialaidMax").val("'.$_SESSION['dataform1']['financialaidMax'].'");';
	}
	?>
	
		
	
	//$('.js-example-basic-multiple').select2();
    $(".js-example-basic-multiples").select2({ dropdownParent: "#divstate" });
    $(".js-example-basic-multiple").select2({ dropdownParent: "#courseoptions" });
  $('[data-toggle="tooltip"]').tooltip();   
 
/*
  $('.green-tickbox').change(function() {
  	console.log(this.checked);
	var unitid = $(this).val();
    if(this.checked) {
      $(this).next('.College-Search-inner').css('background-color', '#019ff0'); 
      $(this).next('.College-Search-inner').find('h3').css('color', 'white');
      $(this).next('.College-Search-inner').find('p').css('color', 'white');  
      $(this).next('.College-Search-inner').find('span').css('color', 'white'); 
	  
    } else {
      $(this).next('.College-Search-inner').css('background-color', 'white');
      $(this).next('.College-Search-inner').find('h3').css('color', 'black');
      $(this).next('.College-Search-inner').find('p').css('color', 'black');  
      $(this).next('.College-Search-inner').find('span').css('color', 'black'); 
    }
	
});
*/
});
  /* 
 $("#chk_housing").click(function () {
		var housing = document.getElementById("housing").checked;
		 if(housing) 
		 {
			$( "#chk_housing" ).removeClass( "selected" );
			$( "#chk_housing" ).addClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append('No');
			document.getElementById("housing").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append('Yes');
			document.getElementById("housing").checked == true;
		} 
			
});
*/
 $("#chk_housing_yes").click(function () {
		var chk_housing_yes = document.getElementById("housing_yes").checked;
		 if(chk_housing_yes) 
		 {
			$( "#chk_housing_yes" ).removeClass( "selected" );
			$( "#chk_housing_yes" ).addClass( "apjselected" );
			document.getElementById("housing_yes").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing_yes" ).addClass( "selected" );
			$( "#chk_housing_yes" ).removeClass( "apjselected" );
			document.getElementById("housing_yes").checked == true;
			
			$( "#chk_housing_no" ).removeClass( "selected" );
			$( "#chk_housing_no" ).addClass( "apjselected" );
			document.getElementById("housing_no").checked == false;
		} 
			
});


 $("#btnclearfilters").click(function () {
	 
	 swal({
    title: "Are you sure you would like to clear your search data. This will reset your filters and selected colleges?",
    text: "",
    showCancelButton: true,
    confirmButtonText: 'Yes',
    cancelButtonText: "No",
    closeOnConfirm: true,
    closeOnCancel: true
 },
 function(isConfirm){

   if (isConfirm){
		 $.ajax({
			type: "POST",
			url: "includes/clearfilters.php",
			dataType: 'text',
			cache: false,
			async: false,
			beforeSend: function () {
				$('.loading').show();
			},
			success: function (data) {
				window.location.href = "college-search.php";
				//location.reload();
			},
			complete: function () {
				$('.loading').hide();
			}
		});
    } else {
		
        return false;
    }
 });
 
 
	  
 });
 $("#chk_housing_no").click(function () {
		var chk_housing_no = document.getElementById("housing_no").checked;
		 if(chk_housing_no) 
		 {
			$( "#chk_housing_no" ).removeClass( "selected" );
			$( "#chk_housing_no" ).addClass( "apjselected" );
			document.getElementById("housing_no").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing_no" ).addClass( "selected" );
			$( "#chk_housing_no" ).removeClass( "apjselected" );
			document.getElementById("housing_no").checked == true;
			
			
			$( "#chk_housing_yes" ).removeClass( "selected" );
			$( "#chk_housing_yes" ).addClass( "apjselected" );
			document.getElementById("housing_yes").checked == false;
			
		} 
			
});
/* $(".College-Search-inner").hover(function () {
 	if ($(this).hasClass("College-Search-inner-active")) {
		
 	}else{
 		console.log('3');
   $(this).find('.clg-website-address').toggleClass("yellow-bg");
}
});*/
/*  $("#clgdatadiv").hover(function () {
 	if ($('.College-Search-inner').hasClass("College-Search-inner-active")) {
		$(this).find('.clg-website-address').addClass('yellow-bg'); 
 	}else{
 		console.log('4');
   $('.College-Search-inner-inactive').find('.clg-website-address').removeClass("yellow-bg");
}
});*/

function toggleCheckbox(element)
 {
   var action = '';
	var unitid = $(element).val();
	var filterVal = 'invert(1)';
	var filterVals = 'invert(0)';
    if(element.checked) {
	  action = 'set';
    } else {
	   action = 'unset';
    }
	
	
	
	 $.ajax({
		type: "POST",
		url: "includes/set_unset_clg.php",
		dataType: 'text',
		data: {
			unitid: unitid,
			action: action
		},
		cache: false,
		async: false,
		beforeSend: function () {
			$('.loading').show();
		},
		success: function (data) {
			if(element.checked) {
			  $(element).next('.College-Search-inner').css('background-color', '#019ff0'); 
			  $(element).next('.College-Search-inner').find('h3').css('color', 'white');
			  $(element).next('.College-Search-inner').find('p').css('color', 'white');  
			  $(element).next('.College-Search-inner').find('span').css('color', 'white'); 
			  /*$(element).next('.College-Search-inner').find('a').css('color', 'white'); */
			  /*$(element).next('.College-Search-inner').find('.websiteimage').css('filter',filterVal); 
			  $(element).next('.College-Search-inner').find('.yesno').css('filter',filterVal); */
			  $(element).next('.College-Search-inner').find('.clg-website-address').addClass('yellow-bg'); 
			  $(element).next('.College-Search-inner').addClass('College-Search-inner-active'); 
			  $(element).next('.College-Search-inner').removeClass('College-Search-inner-inactive'); 
			} else {

			  $(element).next('.College-Search-inner').find('.clg-website-address').removeClass('yellow-bg'); 
			  $(element).next('.College-Search-inner').css('background-color', '');
			  $(element).next('.College-Search-inner').find('h3').css('color', '#333');
			  $(element).next('.College-Search-inner').find('p').css('color', '#333');  
			  $(element).next('.College-Search-inner').find('span').css('color', '#333'); 
			  $(element).next('.College-Search-inner').removeClass('College-Search-inner-active'); 
			  $(element).next('.College-Search-inner').addClass('College-Search-inner-inactive'); 
			 /* $(element).next('.College-Search-inner').find('a').css('color', 'black'); */
			   /*$(element).next('.College-Search-inner').find('.websiteimage').css('filter',filterVals); 
			  $(element).next('.College-Search-inner').find('.yesno').css('filter',filterVals); */
			}
		},
		complete: function () {
			$('.loading').hide();
		}
	});
	return false;
	
	
 }

 

</script>

<script>

	window.limit =30;
	window.norow = 0;

	 $(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
				if(norow == 0)
				{
					limit = limit + 9;
					var sqlkala = $("#sqlkala").val();
					 $.ajax({
							type: "POST",
							url: "includes/getcollegesbylimit.php",
							data: {
										sql: sqlkala,
										limit: limit
									},
							dataType: 'text',
							cache: false,
							async: false,
							beforeSend: function () {
								$('.loading').show();
							},
							success: function (data) {
								if(data == 'No Row')
								{
									$("#clgdatadiv").append('<div class="col-md-12">No More Data</div>');
									norow = 1;
									//alert(norow);
									//enableScroll();
								}
								else
								{
									$("#clgdatadiv").append(data);
									//enableScroll();
								}
								
								
							},
							complete: function () {
								$('.loading').hide();
							}
						});
						
				}
				
				return false;
				
			}
	 });
	 
function selectschool(value)
{
	if($( "#box"+value ).hasClass( "active" ))
	{
		$( "#box"+value).removeClass("active");
		$("#clgchk"+value).attr('checked', false);
	}
	else
	{
		$( "#box"+value).addClass("active");
		$("#clgchk"+value).attr('checked', true);
	}
}	 
/*
function getSchoolInfo(value){
   $("#infodiv").empty();
  var myKeyVals = { unitid :value};
  $.ajax({
    url: 'getSchoolInforation.php',
    type: 'post',       
    data: myKeyVals,
    beforeSend: function() {  
		$(".loading").show();
    },
    success: function(response) {
$(".loading").hide();		
      console.log(response);
	  $("#infodiv").empty();
	  $("#infodiv").append(response);
	 $('#myModal').modal('show');
     // $(".result").css("display","none");
    //  $(".colegeInfo").html(response);
    }
  });
}
*/
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="js/jquery.formtowizard.js"></script>
  <script>
   function skipstep(no)
   {
	  $("#step"+no+"Next").trigger("click");
   }
		
		$(document).ready(function () {  
		
		 
		$('input[type=radio][name=serachby]').change(function() {
				
			 var serachby =   $(":radio[name=serachby]:checked").val();
			 if(serachby == 'ZIP Code')
			 {
				 $("#divzipcode").show();
				 $("#divregion").hide();
				  $("#divstate").hide();
			 }
			 else if(serachby == 'Regions')
			 {
				 $("#divzipcode").hide();
				 $("#divregion").show();
				  $("#divstate").hide();
			 }
			 else if(serachby == 'States')
			 {
				 $("#divzipcode").hide();
				 $("#divregion").hide();
				  $("#divstate").show();
			 }
			 else
			 {
				
			 }
			 
			 $("#state").val('');
			 $("#miles").val('0');
			 $("#inputZip").val('');
			$( "#chk_midwest" ).removeClass( "selected" );
			$( "#chk_southeast" ).removeClass( "selected" );
			$( "#chk_southwest" ).removeClass( "selected" );
			$( "#chk_west" ).removeClass( "selected" );
			$( "#chk_northeast" ).removeClass( "selected" );
			$( "#chk_midwest" ).addClass( "apjselected" );
			$( "#chk_southeast" ).addClass( "apjselected" );
			$( "#chk_southwest" ).addClass( "apjselected" );
			$( "#chk_west" ).addClass( "apjselected" );
			$( "#chk_northeast" ).addClass( "apjselected" );
			document.getElementById("midwest").checked == false;
			document.getElementById("southeast").checked == false;
			document.getElementById("southwest").checked == false;
			document.getElementById("west").checked == false;
			document.getElementById("northeast").checked == false;
			 //$('.js-example-basic-multiple').select2();
		 });

		$("#showtime").hide();
		 $("#SaveAccount").html("Search");
		 $("#step0Next").html("I Understand");
		
 $("#chk_midwest").click(function () {
		var midwest = document.getElementById("midwest").checked;
		 if(midwest) 
		 {
		 	
			$( "#chk_midwest" ).removeClass( "selected" );
			$( "#chk_midwest" ).addClass( "apjselected" );
			document.getElementById("midwest").checked == false;
		} 
		else 
		{ 
			$( "#chk_midwest" ).addClass( "selected" );
			$( "#chk_midwest" ).removeClass( "apjselected" );
			document.getElementById("midwest").checked == true;
		} 
			
});


 $("#chk_southeast").click(function () {
		var southeast = document.getElementById("southeast").checked;
		 if(southeast) 
		 {
			$( "#chk_southeast" ).removeClass( "selected" );
			$( "#chk_southeast" ).addClass( "apjselected" );
			document.getElementById("southeast").checked == false;
		} 
		else 
		{ 
			$( "#chk_southeast" ).addClass( "selected" );
			$( "#chk_southeast" ).removeClass( "apjselected" );
			document.getElementById("southeast").checked == true;
		} 
			
});



 $("#chk_southwest").click(function () {
		var southwest = document.getElementById("southwest").checked;
		 if(southwest) 
		 {
			$( "#chk_southwest" ).removeClass( "selected" );
			$( "#chk_southwest" ).addClass( "apjselected" );
			document.getElementById("southwest").checked == false;
		} 
		else 
		{ 
			$( "#chk_southwest" ).addClass( "selected" );
			$( "#chk_southwest" ).removeClass( "apjselected" );
			document.getElementById("southwest").checked == true;
		} 
			
});


 $("#chk_west").click(function () {
		var west = document.getElementById("west").checked;
		 if(west) 
		 {
			$( "#chk_west" ).removeClass( "selected" );
			$( "#chk_west" ).addClass( "apjselected" );
			document.getElementById("west").checked == false;
		} 
		else 
		{ 
			$( "#chk_west" ).addClass( "selected" );
			$( "#chk_west" ).removeClass( "apjselected" );
			document.getElementById("west").checked == true;
		} 
			
});



 $("#chk_northeast").click(function () {
		var northeast = document.getElementById("northeast").checked;
		 if(northeast) 
		 {
			$( "#chk_northeast" ).removeClass( "selected" );
			$( "#chk_northeast" ).addClass( "apjselected" );
			document.getElementById("northeast").checked == false;
		} 
		else 
		{ 
			$( "#chk_northeast" ).addClass( "selected" );
			$( "#chk_northeast" ).removeClass( "apjselected" );
			document.getElementById("northeast").checked == true;
		} 
			
});




 $("#chk_rural").click(function () {
		var rural = document.getElementById("rural").checked;
		 if(rural) 
		 {
			$( "#chk_rural" ).removeClass( "selected" );
			$( "#chk_rural" ).addClass( "apjselected" );
			document.getElementById("rural").checked == false;
		} 
		else 
		{ 
			$( "#chk_rural" ).addClass( "selected" );
			$( "#chk_rural" ).removeClass( "apjselected" );
			document.getElementById("rural").checked == true;
		} 
			
});

 $("#chk_town").click(function () {
		var town = document.getElementById("town").checked;
		 if(town) 
		 {
			$( "#chk_town" ).removeClass( "selected" );
			$( "#chk_town" ).addClass( "apjselected" );
			document.getElementById("town").checked == false;
		} 
		else 
		{ 
			$( "#chk_town" ).addClass( "selected" );
			$( "#chk_town" ).removeClass( "apjselected" );
			document.getElementById("town").checked == true;
		} 
			
});


 $("#chk_suburban").click(function () {
		var suburban = document.getElementById("suburban").checked;
		 if(suburban) 
		 {
			$( "#chk_suburban" ).removeClass( "selected" );
			$( "#chk_suburban" ).addClass( "apjselected" );
			document.getElementById("suburban").checked == false;
		} 
		else 
		{ 
			$( "#chk_suburban" ).addClass( "selected" );
			$( "#chk_suburban" ).removeClass( "apjselected" );
			document.getElementById("suburban").checked == true;
		} 
			
});



 $("#chk_city").click(function () {
		var city = document.getElementById("city").checked;
		 if(city) 
		 {
			$( "#chk_city" ).removeClass( "selected" );
			$( "#chk_city" ).addClass( "apjselected" );
			document.getElementById("city").checked == false;
		} 
		else 
		{ 
			$( "#chk_city" ).addClass( "selected" );
			$( "#chk_city" ).removeClass( "apjselected" );
			document.getElementById("city").checked == true;
		} 
			
});


 $("#chk_distance_learning_only").click(function () {
		var distance_learning_only = document.getElementById("distance_learning_only").checked;
		 if(distance_learning_only) 
		 {
			$( "#chk_distance_learning_only" ).removeClass( "selected" );
			$( "#chk_distance_learning_only" ).addClass( "apjselected" );
			document.getElementById("distance_learning_only").checked == false;
		} 
		else 
		{ 
			$( "#chk_distance_learning_only" ).addClass( "selected" );
			$( "#chk_distance_learning_only" ).removeClass( "apjselected" );
			document.getElementById("distance_learning_only").checked == true;
		} 
			
});



 $("#chk_offer_all").click(function () {
		var offer_all = document.getElementById("offer_all").checked;
		 if(offer_all) 
		 {
			$( "#chk_offer_all" ).removeClass( "selected" );
			$( "#chk_offer_all" ).addClass( "apjselected" );
			document.getElementById("offer_all").checked == false;
		} 
		else 
		{ 
			$( "#chk_offer_all" ).addClass( "selected" );
			$( "#chk_offer_all" ).removeClass( "apjselected" );
			document.getElementById("offer_all").checked == true;
		} 
			
});




 $("#chk_certificate").click(function () {
		var certificate = document.getElementById("certificate").checked;
		 if(certificate) 
		 {
			$( "#chk_certificate" ).removeClass( "selected" );
			$( "#chk_certificate" ).addClass( "apjselected" );
			document.getElementById("certificate").checked == false;
		} 
		else 
		{ 
			$( "#chk_certificate" ).addClass( "selected" );
			$( "#chk_certificate" ).removeClass( "apjselected" );
			document.getElementById("certificate").checked == true;
		} 
			
});




 $("#chk_bachelor").click(function () {
		var bachelor = document.getElementById("bachelor").checked;
		 if(bachelor) 
		 {
			$( "#chk_bachelor" ).removeClass( "selected" );
			$( "#chk_bachelor" ).addClass( "apjselected" );
			document.getElementById("bachelor").checked == false;
		} 
		else 
		{ 
			$( "#chk_bachelor" ).addClass( "selected" );
			$( "#chk_bachelor" ).removeClass( "apjselected" );
			document.getElementById("bachelor").checked == true;
		} 
			
});



 $("#chk_associates").click(function () {
		var associates = document.getElementById("associates").checked;
		 if(associates) 
		 {
			$( "#chk_associates" ).removeClass( "selected" );
			$( "#chk_associates" ).addClass( "apjselected" );
			document.getElementById("associates").checked == false;
		} 
		else 
		{ 
			$( "#chk_associates" ).addClass( "selected" );
			$( "#chk_associates" ).removeClass( "apjselected" );
			document.getElementById("associates").checked == true;
		} 
			
});

 $("#chk_advanced").click(function () {
		var advanced = document.getElementById("advanced").checked;
		 if(advanced) 
		 {
			$( "#chk_advanced" ).removeClass( "selected" );
			$( "#chk_advanced" ).addClass( "apjselected" );
			document.getElementById("advanced").checked == false;
		} 
		else 
		{ 
			$( "#chk_advanced" ).addClass( "selected" );
			$( "#chk_advanced" ).removeClass( "apjselected" );
			document.getElementById("advanced").checked == true;
		} 
			
});

 $("#chk_public").click(function () {
		var public1 = document.getElementById("public").checked;
		 if(public1) 
		 {
			$( "#chk_public" ).removeClass( "selected" );
			$( "#chk_public" ).addClass( "apjselected" );
			document.getElementById("public").checked == false;
		} 
		else 
		{ 
			$( "#chk_public" ).addClass( "selected" );
			$( "#chk_public" ).removeClass( "apjselected" );
			document.getElementById("public").checked == true;
		} 
			
});

 $("#chk_privat_non_profit").click(function () {
		var privat_non_profit = document.getElementById("privat_non_profit").checked;
		 if(privat_non_profit) 
		 {
			$( "#chk_privat_non_profit" ).removeClass( "selected" );
			$( "#chk_privat_non_profit" ).addClass( "apjselected" );
			document.getElementById("privat_non_profit").checked == false;
		} 
		else 
		{ 
			$( "#chk_privat_non_profit" ).addClass( "selected" );
			$( "#chk_privat_non_profit" ).removeClass( "apjselected" );
			document.getElementById("privat_non_profit").checked == true;
		} 
			
});


 $("#chk_privat_for_profit").click(function () {
		var privat_for_profit = document.getElementById("privat_for_profit").checked;
		 if(privat_for_profit) 
		 {
			$( "#chk_privat_for_profit" ).removeClass( "selected" );
			$( "#chk_privat_for_profit" ).addClass( "apjselected" );
			document.getElementById("privat_for_profit").checked == false;
		} 
		else 
		{ 
			$( "#chk_privat_for_profit" ).addClass( "selected" );
			$( "#chk_privat_for_profit" ).removeClass( "apjselected" );
			document.getElementById("privat_for_profit").checked == true;
		} 
			
});




 $("#chk_4_year").click(function () {
		var temp4_year = document.getElementById("4_year").checked;
		 if(temp4_year) 
		 {
			$( "#chk_4_year" ).removeClass( "selected" );
			$( "#chk_4_year" ).addClass( "apjselected" );
			document.getElementById("4_year").checked == false;
		} 
		else 
		{ 
			$( "#chk_4_year" ).addClass( "selected" );
			$( "#chk_4_year" ).removeClass( "apjselected" );
			document.getElementById("4_year").checked == true;
		} 
			
});
   
   
 $("#chk_2_year").click(function () {
		var temp_2_year = document.getElementById("2_year").checked;
		 if(temp_2_year) 
		 {
			$( "#chk_2_year" ).removeClass( "selected" );
			$( "#chk_2_year" ).addClass( "apjselected" );
			document.getElementById("2_year").checked == false;
		} 
		else 
		{ 
			$( "#chk_2_year" ).addClass( "selected" );
			$( "#chk_2_year" ).removeClass( "apjselected" );
			document.getElementById("2_year").checked == true;
		} 
			
});


   
   
 $("#chk_less_2_year").click(function () {
		var less_2_year = document.getElementById("less_2_year").checked;
		 if(less_2_year) 
		 {
			$( "#chk_less_2_year" ).removeClass( "selected" );
			$( "#chk_less_2_year" ).addClass( "apjselected" );
			document.getElementById("less_2_year").checked == false;
		} 
		else 
		{ 
			$( "#chk_less_2_year" ).addClass( "selected" );
			$( "#chk_less_2_year" ).removeClass( "apjselected" );
			document.getElementById("less_2_year").checked == true;
		} 
			
});

   
 /*  
 $("#chk_housing").click(function () {
		var housing = document.getElementById("housing").checked;
		 if(housing) 
		 {
			$( "#chk_housing" ).removeClass( "selected" );
			$( "#chk_housing" ).addClass( "apjselected" );
			document.getElementById("housing").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			document.getElementById("housing").checked == true;
		} 
			
});
*/
   
   
 $("#chk_distance_learning").click(function () {
		var distance_learning = document.getElementById("distance_learning").checked;
		 if(distance_learning) 
		 {
			$( "#chk_distance_learning" ).removeClass( "selected" );
			$( "#chk_distance_learning" ).addClass( "apjselected" );
			document.getElementById("distance_learning").checked == false;
		} 
		else 
		{ 
			$( "#chk_distance_learning" ).addClass( "selected" );
			$( "#chk_distance_learning" ).removeClass( "apjselected" );
			document.getElementById("distance_learning").checked == true;
		} 
			
});

   
   
 $("#chk_weekend_evening").click(function () {
		var weekend_evening = document.getElementById("weekend_evening").checked;
		 if(weekend_evening) 
		 {
			$( "#chk_weekend_evening" ).removeClass( "selected" );
			$( "#chk_weekend_evening" ).addClass( "apjselected" );
			document.getElementById("weekend_evening").checked == false;
		} 
		else 
		{ 
			$( "#chk_weekend_evening" ).addClass( "selected" );
			$( "#chk_weekend_evening" ).removeClass( "apjselected" );
			document.getElementById("weekend_evening").checked == true;
		} 
			
});

   
   
 $("#chk_credit_life_exp").click(function () {
		var credit_life_exp = document.getElementById("credit_life_exp").checked;
		 if(credit_life_exp) 
		 {
			$( "#chk_credit_life_exp" ).removeClass( "selected" );
			$( "#chk_credit_life_exp" ).addClass( "apjselected" );
			document.getElementById("credit_life_exp").checked == false;
		} 
		else 
		{ 
			$( "#chk_credit_life_exp" ).addClass( "selected" );
			$( "#chk_credit_life_exp" ).removeClass( "apjselected" );
			document.getElementById("credit_life_exp").checked == true;
		} 
			
});

$("#chk_rotc_navy").click(function () {
				var distance_learning = document.getElementById("rotc_navy").checked;
				if(distance_learning)
				{
					$( "#chk_rotc_navy" ).removeClass( "selected" );
					$( "#chk_rotc_navy" ).addClass( "apjselected" );
					document.getElementById("rotc_navy").checked == false;
				}
				else
				{
					$( "#chk_rotc_navy" ).addClass( "selected" );
					$( "#chk_rotc_navy" ).removeClass( "apjselected" );
					document.getElementById("rotc_navy").checked == true;
				}

			});



			$("#chk_rotc_army").click(function () {
				var weekend_evening = document.getElementById("rotc_army").checked;
				if(weekend_evening)
				{
					$( "#chk_rotc_army" ).removeClass( "selected" );
					$( "#chk_rotc_army" ).addClass( "apjselected" );
					document.getElementById("rotc_army").checked == false;
				}
				else
				{
					$( "#chk_rotc_army" ).addClass( "selected" );
					$( "#chk_rotc_army" ).removeClass( "apjselected" );
					document.getElementById("rotc_army").checked == true;
				}

			});



			$("#chk_rotc_airforce").click(function () {
				var credit_life_exp = document.getElementById("rotc_airforce").checked;
				if(credit_life_exp)
				{
					$( "#chk_rotc_airforce" ).removeClass( "selected" );
					$( "#chk_rotc_airforce" ).addClass( "apjselected" );
					document.getElementById("rotc_airforce").checked == false;
				}
				else
				{
					$( "#chk_rotc_airforce" ).addClass( "selected" );
					$( "#chk_rotc_airforce" ).removeClass( "apjselected" );
					document.getElementById("rotc_airforce").checked == true;
				}

			});
   
   
 $("#chk_PARTIC_MEN_").click(function () {
		var PARTIC_MEN_ = document.getElementById("PARTIC_MEN_").checked;
		 if(PARTIC_MEN_) 
		 {
			$( "#chk_PARTIC_MEN_" ).removeClass( "selected" );
			$( "#chk_PARTIC_MEN_" ).addClass( "apjselected" );
			document.getElementById("PARTIC_MEN_").checked == false;
		} 
		else 
		{ 
			$( "#chk_PARTIC_MEN_" ).addClass( "selected" );
			$( "#chk_PARTIC_MEN_" ).removeClass( "apjselected" );
			document.getElementById("PARTIC_MEN_").checked == true;
		} 
			
});


   
   
 $("#chk_PARTIC_WOMEN_").click(function () {
		var PARTIC_WOMEN_ = document.getElementById("PARTIC_WOMEN_").checked;
		 if(PARTIC_WOMEN_) 
		 {
			$( "#chk_PARTIC_WOMEN_" ).removeClass( "selected" );
			$( "#chk_PARTIC_WOMEN_" ).addClass( "apjselected" );
			document.getElementById("PARTIC_WOMEN_").checked == false;
		} 
		else 
		{ 
			$( "#chk_PARTIC_WOMEN_" ).addClass( "selected" );
			$( "#chk_PARTIC_WOMEN_" ).removeClass( "apjselected" );
			document.getElementById("PARTIC_WOMEN_").checked == true;
		} 
			
});

   

		
			  //$('.js-example-basic-multiple').select2();
			   $("#SignupForm").submit(function () {
				   var state = $("#state").val();
				   var inputZip = $("#inputZip").val();
				   var miles = $("#miles").val();
				   
				   //parts[]
				   var midwest = document.getElementById("midwest").checked;
				   var southeast = document.getElementById("southeast").checked;
				   var southwest = document.getElementById("southwest").checked;
				   var west = document.getElementById("west").checked;
				   var northeast = document.getElementById("northeast").checked;
				   
				   //campusSetting[]
				   var rural = document.getElementById("rural").checked;
				   var town = document.getElementById("town").checked;
				   var suburban = document.getElementById("suburban").checked;
				   var city = document.getElementById("city").checked;
				   
				   
				   
				   
				   
/*				 
				 if(midwest)  { 
                        alert("Check box in Checked"); 
                    } else { 
                        alert("Check box is Unchecked"); 
                    } 
	*/				
				   var state = $("#state").val();
					//alert(state);
					//return false;
			   });
		});
$(document).ready(function(){


     $(".list-link").click(function (e) {
     e.preventDefault();
     $(".cmn-field").removeClass("active");
     var content_id = $(this).attr("href");
     $(content_id).addClass("active");

 });
     $(".remove-icon").click(function (e) {
     e.preventDefault();
     $(".cmn-field").removeClass("active");
  });
	$(".closeBtn").click(function (e) {
     e.preventDefault();
     $(".cmn-field").removeClass("active")
		$("body").removeClass("bg-change");
  });
   $(".list-link").click(function(){
    $("body").addClass("bg-change");
  });
    $(".remove-icon").click(function(){
    $("body").removeClass("bg-change");
  });

  $(".colg-advanced-search-btn").click(function(){
    $(".advanced-search-output").slideToggle();
    $("#applyfilters").slideToggle();
  });
  
});


$(document).ready(function() {

	
	$("#ajaxsubmitfrm").submit(function() {
    $.ajax({
           type: "POST",
           url: 'setclgsearch.php',
           data: $(this).serialize(), //Serialize a form to a query string.
           success: function(response){
			   console.log(response);
			    $("#clgdatadiv").empty();
				$("#clgdatadiv").append(response);
				window.limit =30;
				window.norow = 0;
                //response from server.
           }
         });
    return false; // prevent form to submit.
});
	
	
	$(".selected_clgs_popup").click(function (e) {
		e.preventDefault();
		$.ajax({
           type: "POST",
           url: 'includes/getmyselectedclgcb.php',
           success: function(response){
			    $("#myselectedclgcb").empty();
				$("#myselectedclgcb").append(response);
           }
         });
		$('#selectedclgmodal').modal('show');
	});
});
function removeselectedclgcb(unitid)
{
	var element = '#clgchk'+unitid;
	
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
			$(element).next('.College-Search-inner').find('.clg-website-address').removeClass('yellow-bg'); 
			$(element).next('.College-Search-inner').css('background-color', '');
			$(element).next('.College-Search-inner').find('h3').css('color', '#333');
			$(element).next('.College-Search-inner').find('p').css('color', '#333');  
			$(element).next('.College-Search-inner').find('span').css('color', '#333'); 
			$(element).next('.College-Search-inner').removeClass('College-Search-inner-active'); 
			$(element).next('.College-Search-inner').addClass('College-Search-inner-inactive'); 
			$(element).attr('checked', false);
			$.ajax({
			   type: "POST",
			   url: 'includes/getmyselectedclgcb.php',
			   success: function(response){
					$("#myselectedclgcb").empty();
					$("#myselectedclgcb").append(response);
			   }
			 });
			 
			 
		},
		complete: function () {
			$('.loading').hide();
		}
	});
	return false;
}

function toggleClgUpper(id)
 {
	$( '#clgchk' + id).trigger( "click" );
 }

 //SAT/ACT Score
 $(document).ready(function() {
$("#satActScore .actsatbtn").show();
$("#satActScore .modal-dialog :input").attr('style', 'display: inline !important');
 $("#testsatscore_sat_fields").hide();
   $("#testactscore_act_fields").hide();
 $("#testchoice").change(function () {
   var testchoice = $("#testchoice").val();
   if(testchoice == 'SAT')
   {
   $("#testsatscore_sat_fields").show();
   $("#testactscore_act_fields").hide();
   }
   else if(testchoice == 'ACT')
   {
   $("#testsatscore_sat_fields").hide();
   $("#testactscore_act_fields").show();
   }
   else
   {
   $("#testsatscore_sat_fields").hide();
   $("#testactscore_act_fields").hide();
   }
   $("#testsatscore_sat").val('');
   $("#testactscore_act").val('');
   });
});
//SAT/ACT Score end

    </script>
<?php include 'footer.php'; ?>

