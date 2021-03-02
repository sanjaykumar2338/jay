<?php
/***** VB Comments Start *****
//Script to generate threshold values for schools based on Percent admitted and ACT Composite 25th percentile score

//Right now, since value for Percent admitted and ACT Composite 25th percentile score not available for all schools, first get the
//unit ids for all schools which exist in all three tables: school_ranking, drvadm2018, adm2018

//Tables involved: 
school_ranking: Lists all school ids with their names
drvadm2018: dvadm01 column holds value for Percent admitted
adm2018: actcm25 column holds value for ACT Composite 25th percentile score

***** VB Comments End *****/

//first get all college ids and save them in array
require_once 'includes/config.php';
$commonschlidarr = array();
$drvadm2018arr = array();
$adm2018arr = array();
$schoolrankarr = array();

$finalarr = array();
//fetch unit ids from drvadm2018 and save in drvadm2018arr
$resdrvadm2018 = mysqli_query($con, "SELECT * FROM `drvadm2018` ");
while ($rowdrvadm2018 = mysqli_fetch_assoc($resdrvadm2018)){
	array_push($drvadm2018arr,$rowdrvadm2018['UNITID'] );
}
//print_r($drvadm2018arr);

$resadm2018 = mysqli_query($con, "SELECT * FROM `adm2018` ");
while ($rowadm2018 = mysqli_fetch_assoc($resadm2018)){
	array_push($adm2018arr,$rowadm2018['UNITID'] );
}
//print_r($adm2018arr);

$resschlrank = mysqli_query($con, "SELECT * FROM `school_ranking`");
while ($rowschlrank = mysqli_fetch_assoc($resschlrank)){
	array_push($schoolrankarr,$rowschlrank['UNITID'] );
}

//arrayintersect function to get all unit ids which are available in all 3 tables
$commonschlidarr=array_intersect($drvadm2018arr, $adm2018arr, $schoolrankarr);
//print_r($commonschlidarr);
//Now, commonschlidarr holds the list of common school ids across all tables
for($i=0;$i<count($commonschlidarr);$i++){
	$unischlarr = array();
	$unischlarr['unitid'] = $commonschlidarr[$i];
	$unischlarr['instnm'] = '';
	$unischlarr['percentadm'] = '';
	$unischlarr['100minusd'] = '';
	$unischlarr['actcm25centile'] = '';
	$unischlarr['actcm25centage'] = '';
	$unischlarr['rptcentadmit'] = 0.00;
	$unischlarr['clgscore'] = 0.00;
	$unischlarr['thhailmary'] = 0.00;
	$unischlarr['threach'] = 0.00;
	$unischlarr['thmatch'] = 0.00;
	$unischlarr['thsafety'] = 0.00;
	$schoolid = $commonschlidarr[$i];
	//get schoolname from school_ranking table
	$resschlname = mysqli_query($con, "SELECT * FROM `school_ranking` where UNITID = '$schoolid'");
	while ($rowschlname = mysqli_fetch_assoc($resschlname)){
		$unischlarr['instnm'] = mysqli_real_escape_string($con, $rowschlname['INSTNM']) ;
	}
	
	//now get dvadm01 column of drvadm2018 table for Percent admitted - total
	$resdrvadm2018 = mysqli_query($con, "SELECT * FROM `drvadm2018` where UNITID = '$schoolid'");
	while ($rowdrvadm2018 = mysqli_fetch_assoc($resdrvadm2018)){
		$unischlarr['percentadm'] = $rowdrvadm2018['DVADM01'];
		$unischlarr['100minusd'] = 100 - $rowdrvadm2018['DVADM01'];
	}
	
	//now get actcm25 column of adm2018 table for ACT Composite 25th percentile score
	$resadm2018 = mysqli_query($con, "SELECT * FROM `adm2018` where UNITID = '$schoolid'");
	while ($rowadm2018 = mysqli_fetch_assoc($resadm2018)){
		$unischlarr['actcm25centile'] = $rowadm2018['ACTCM25'];
		$unischlarr['actcm25centage'] = ($rowadm2018['ACTCM25']/36)*100;
	}
	
	//=IF(ISBLANK(F2),(E2+7),"0") if ACT Composite 25th percentile score is blank or 0 then rptcentadmit = (100-d) else 0
	if(empty($unischlarr['actcm25centile'])){
		$unischlarr['rptcentadmit'] = $unischlarr['100minusd'];		
	}
	if(empty($unischlarr['actcm25centile'])){
		$unischlarr['clgscore'] = ($unischlarr['100minusd']);
	}
	else{
		$unischlarr['clgscore'] = (($unischlarr['100minusd'] + $unischlarr['actcm25centage'])/2);
	}
	
	$unischlarr['thhailmary'] = $unischlarr['clgscore'] - 15;
	$unischlarr['threach'] = $unischlarr['clgscore'] - 4 ;
	$unischlarr['thmatch'] = $unischlarr['clgscore'] + 10;
	$unischlarr['thsafety'] = $unischlarr['clgscore'] + 24;
	
	$query = "INSERT INTO `school_thresholds`(`unitid`, `instnm`, `percentadm`, `100minusd`, `actcm25centile`, `actcm25centage`, `rptcentadmit`, 
			  `clgscore`, `thhailmary`, `threach`, `thmatch`, `thsafety`, `createdon`)
			  VALUES 
			  ('".$unischlarr['unitid']."','".$unischlarr['instnm']."','".$unischlarr['percentadm']."','".$unischlarr['100minusd']."','".$unischlarr['actcm25centile']."','".$unischlarr['actcm25centage']."','".$unischlarr['rptcentadmit']."','".$unischlarr['clgscore']."','".$unischlarr['thhailmary']."','".$unischlarr['threach']."',
			  '".$unischlarr['thmatch']."','".$unischlarr['thsafety']."',NOW())";
	//echo $query;
	$result = mysqli_query($con, $query);
}

?>