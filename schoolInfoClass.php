<?php 
class schoolInfoClass{
	public function __construct(){
		$servername = "localhost";
		$username = "ipeds_user";
		$password = "Wtj63^p0";
		$dbname = "ipeds";
		$this->conn = new mysqli($servername, $username, $password, $dbname);
	}
	
		public function  gethd2018ById($unitid){		
		$sql = "SELECT * FROM `hd2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		return $row = $result->fetch_assoc();
		// return $row = $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function getType($value){		
		$sql = "SELECT `valueLabel` FROM `valuesets18` WHERE `varName` LIKE 'SECTOR' AND `tableName` = 'HD2018' AND `Codevalue` = '".$value."' ";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	public function getAwardsOffered($unitid){
		$sql = "SELECT `LEVEL1`,`LEVEL2`,`LEVEL3`,`LEVEL4`,`LEVEL5`,`LEVEL6`,`LEVEL7`,`LEVEL8`,`LEVEL12`,`LEVEL17`,`LEVEL18`,`LEVEL19` FROM `ic2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		$levels = array();
		if ($result->num_rows > 0) {
			foreach ($row as $key => $value) {
				if($value == 0){
					continue;
				}
				$levels[] = "varName = '".$key."'"; 
			}
		}
		
		if(!empty($levels)):
			$awards = implode(" OR ", $levels);
			$qry = "SELECT `varTitle` FROM `valuesets18` WHERE `TableName` = 'ic2018' AND Codevalue =1 AND (".$awards.")
			ORDER BY `valuesets18`.`varName` ASC ";
			$result = $this->conn->query($qry);
			$row = $result->fetch_all(MYSQLI_ASSOC);
			return $row;	
		endif;
			
	}

	public function getCampusSetting($codvalue){
		$sql = "SELECT `valueLabel` FROM `valuesets18` WHERE `TableName` = 'HD2018' AND `varName`='LOCALE' AND `Codevalue` = '".$codvalue."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;		
	}

	public function getCampusHousing($unitid){
		$sql = "SELECT ROOM FROM `ic2018` WHERE `UNITID` = '".$unitid."' and ROOM = 1";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			$data = 'Yes';
		}else{
			$data = 'No';
		}
		return $data;
	}

	public function getStudentpopulation($unitid){
		$sql = "SELECT EFTOTLT FROM `ef2018a` WHERE `UNITID` = '".$unitid."' AND EFALEVEL = 1";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
		
	}

	public function getFacultyRatio($unitid){		
		$sql = "SELECT STUFACR  FROM `ef2018d` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	public function getMissionStatement($unitid){
		$sql = "SELECT * FROM `ic2018mission` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();		
		return $row;		
	}

	public function getSplLernOpport($unitid){
		$sql = "SELECT SLO5,SLO51,SLO52,SLO53,SLO6,SLO7,SLO8,SLO81,SLO82,SLO83,DSTNCED1,DSTNCED2 FROM `ic2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();	
		$arr = array();
		$ROTCa = array();
		if ($result->num_rows > 0) :
			foreach ($row as $key => $value) {
				if(!empty($value) && $value == 1){

					if($key=='SLO8'||$key=='SLO81'||$key=='SLO82'||$key=='SLO83'){	
						$arr['certification'] = "Teacher certification";
					}
					if($key == "SLO51"):
						$ROTCa[] = "Army";
					endif;
					if($key == "SLO52"):
						$ROTCa[] = "Navy";
					endif;
					if($key == "SLO53"):
						$ROTCa[] = "Air Force";
					endif;

					if($key == 'SLO5'){
						$SLO5 = 1;					
					}
					if($key == "SLO6"):
						$arr['SLO6'] = "Study abroad";
					elseif($key =="SLO7"):
						$arr['SLO7'] = "Weekend/evening  college";
					elseif($key == "DSTNCED1"):
						$arr['DSTNCED1'] = "Distance education – undergraduate programs offered";
					elseif($key == "DSTNCED2"):				
						$arr["DSTNCED2"] = "Distance education – graduate programs offered";
					endif;							
				}						
			}
		endif;
		
		$rotcIn = "";
		if(!empty($ROTCa)){					
			$rotcIn = "(".implode(",", $ROTCa).")";
		}
		if(!empty($SLO5)){
			$arr['rotc'] = "ROTC".$rotcIn;
		}
		return $arr;	
	}

	public function getStudentServices($unitid){
		$sql = "SELECT STUSRV1,STUSRV2,STUSRV3,STUSRV4,STUSRV8 FROM `ic2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();	
		$arr = array();
		if ($result->num_rows > 0) :
			foreach ($row as $key => $value) {
				if(!empty($value) && $value == 1){
					$qry = "SELECT varTitle FROM `valuesets18` WHERE `varName` LIKE '".$key."' AND Codevalue = 1 AND TableName ='IC2018'";
					$resultt = $this->conn->query($qry);
					$rows = $resultt->fetch_assoc();	
					$arr[] = $rows['varTitle'];	
				}
			}
			return $arr;
		endif;
	}

	public function getCreditAccepted($unitid){
		$sql = "SELECT CREDITS1,CREDITS2,CREDITS3,CREDITS4 FROM `ic2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();	
		$arr = array();
		if ($result->num_rows > 0) :
			foreach ($row as $key => $value) {	
				if(!empty($value) && $value == 1){
					$qry = "SELECT varTitle FROM `valuesets18` WHERE `varName` LIKE '".$key."' AND Codevalue = 1 AND TableName ='IC2018'";
					$resultt = $this->conn->query($qry);
					$rows = $resultt->fetch_assoc();	
					$arr[] = $rows['varTitle'];	
				}
			}
			return $arr;
		endif;		
	}

	public function getClassification($unitid){
		$sql = "SELECT C18BASIC FROM `hd2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();	
		$arr = array();
		foreach ($row as $key => $value) {			
			$qry = "SELECT valueLabel FROM `valuesets18` WHERE varName LIKE 'C18BASIC' AND TableName LIKE 'hd2018' AND Codevalue = '".$value."'";
			$resultt = $this->conn->query($qry);
			$rows = $resultt->fetch_assoc();	
			$arr[] = $rows['valueLabel'];	
			
		}
		return $arr;
	}

	public function getReligiousAffi($unitid){
		$sql = "SELECT RELAFFIL FROM `ic2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();	
		$arr = array();
		if ($result->num_rows > 0) :
			foreach ($row as $key => $value) {			
				$qry = "SELECT valueLabel FROM `valuesets18` WHERE varName LIKE 'RELAFFIL' AND TableName LIKE 'ic2018' AND Codevalue = '".$value."'";
				$resultt = $this->conn->query($qry);
				$rows = $resultt->fetch_assoc();	
				$arr[] = $rows['valueLabel'];				
			}
			return $arr;
		endif;
	}


	public function getDisabilityServices($unitid){	
		$sql = "SELECT DISAB,DISABPCT FROM `ic2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();			
		$services = "";
		if($row['DISAB'] == 1):
			$services = "3% or less";
		elseif($row['DISAB'] == 2 && !empty($row['DISABPCT'])):
			$services = $row['DISABPCT']."%";
		endif;
		return $services;
	}

	public function getOtherChar($unitid){
		$sql = "SELECT HBCU,TRIBAL FROM `hd2018` WHERE `UNITID` = '".$unitid."' AND (HBCU = 1 OR TRIBAL = 1)  ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$chr = "";
			if($row['HBCU'] =='1'){
				$chr = "Historically Black College or University";
			}elseif ($row['TRIBAL'] =='1') {
				$chr = "Tribal college";
			}	
			return $chr;		
		}	
	}
	public function getFacultyAssistance($unitid){
		$sql = "SELECT * FROM `eap2018` WHERE `UNITID` = '".$unitid."' AND EAPCAT in(20000,21000) ";
		$result = $this->conn->query($sql);
		$faculty = array();	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row['EAPCAT'] == '20000'):
					$faculty['total_full_time'] = $row['EAPFT'];
					$faculty['total_part_time'] = $row['EAPPT'];
				elseif($row['EAPCAT'] == '21000'):
					$faculty['Instructional_full_time'] = $row['EAPFT'];
					$faculty['Instructional_part_time'] = $row['EAPPT'];			
					
				endif;	
			}

			if(isset($faculty['total_full_time'])){
				$faculty['research_full_time'] = $faculty['total_full_time'] - $faculty['Instructional_full_time'];
			}
			if(isset($faculty['total_part_time'])){
				$faculty['research_part_time'] = $faculty['total_part_time'] - $faculty['Instructional_part_time'];
			}

			 
			 
		}
		return $faculty;
	}

	public function getGraduateAssistants($unitid){
		$sql = "SELECT * FROM `eap2018` WHERE `UNITID` = '".$unitid."' AND OCCUPCAT in(410,420) ";
		$result = $this->conn->query($sql);
		$faculty = array();	
		$totalGraduateFull = 0;
		$totalGraduatePart = 0;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row['OCCUPCAT'] == '410'):					
					$faculty['graduateInst_full_time'] = $row['EAPFT'];
					$faculty['graduateInst_part_time'] = $row['EAPPT'];
					$totalGraduateFull += $row['EAPFT'];
					$totalGraduatePart += $row['EAPPT'];
				elseif($row['OCCUPCAT'] == '420'):
					$faculty['graduateResh_full_time'] = $row['EAPFT'];
					$faculty['graduateResh_part_time'] = $row['EAPPT'];
					$totalGraduateFull += $row['EAPFT'];
					$totalGraduatePart += $row['EAPPT'];
				endif;	
			}	
			
			$faculty['totalGraduateFull'] = $totalGraduateFull;
			$faculty['totalGraduatePart'] = $totalGraduatePart;
		}
		return $faculty;
	}

	public function getStudentExp($unitid){
		//group Tuition and fees
		$sql = "SELECT CHG2AY1,CHG2AY2,CHG2AY3,CHG3AY1,CHG3AY2,CHG3AY3,CHG4AY1,CHG4AY2,CHG4AY3 FROM `ic2018_ay` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$stdExp = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			if(!empty($row['CHG2AY1'])):
				// In-state
				$stdExp['GTustionFees']['inState']['2016-2017'] =$row['CHG2AY1'];
				$stdExp['GTustionFees']['inState']['2017-2018'] =$row['CHG2AY2'];
				$stdExp['GTustionFees']['inState']['2018-2019'] =$row['CHG2AY3'];
			endif;		

			// Out-of-state	
			if(!empty($row['CHG3AY1'])):
				$stdExp['GTustionFees']['outOfState']['2016-2017'] =$row['CHG3AY1'];
				$stdExp['GTustionFees']['outOfState']['2017-2018'] =$row['CHG3AY2'];
				$stdExp['GTustionFees']['outOfState']['2018-2019'] =$row['CHG3AY3'];
			endif;				

			// Books and supplies
			if(!empty($row['CHG4AY1'])):
				$stdExp['GTustionFees']['booksSupplies']['2016-2017'] =$row['CHG4AY1'];
				$stdExp['GTustionFees']['booksSupplies']['2017-2018'] =$row['CHG4AY2'];
				$stdExp['GTustionFees']['booksSupplies']['2018-2019'] =$row['CHG4AY3'];
			endif;

			return $stdExp;
		}
	}

	public function getLivingArrangement($unitid){
		//group Tuition and fees
		$sql = "SELECT CHG5AY1,CHG5AY2,CHG5AY3,CHG6AY1,CHG6AY2,CHG6AY3,CHG7AY1,CHG7AY2,CHG7AY3,CHG8AY1,CHG8AY2,CHG8AY3,CHG9AY1,CHG9AY2,CHG9AY3 FROM `ic2018_ay` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);
		$stdExp = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			if(!empty($row['CHG5AY1'])):
				// On Campus - Room and board
				$stdExp['onCampus']['roomBoard']['2016-2017'] =$row['CHG5AY1'];
				$stdExp['onCampus']['roomBoard']['2017-2018'] =$row['CHG5AY2'];
				$stdExp['onCampus']['roomBoard']['2018-2019'] =$row['CHG5AY3'];
			endif;		

			// On Campus - Other
			if(!empty($row['CHG6AY1'])):
				$stdExp['onCampus']['other']['2016-2017'] =$row['CHG6AY1'];
				$stdExp['onCampus']['other']['2017-2018'] =$row['CHG6AY2'];
				$stdExp['onCampus']['other']['2018-2019'] =$row['CHG6AY3'];
			endif;

			// Off Campus - Room and board
			if(!empty($row['CHG7AY1'])):
				$stdExp['offCampus']['roomBoard']['2016-2017'] =$row['CHG7AY1'];
				$stdExp['offCampus']['roomBoard']['2017-2018'] =$row['CHG7AY2'];
				$stdExp['offCampus']['roomBoard']['2018-2019'] =$row['CHG7AY3'];
			endif;		

			// Off Campus - Other
			if(!empty($row['CHG8AY1'])):
				$stdExp['offCampus']['other']['2016-2017'] =$row['CHG8AY1'];
				$stdExp['offCampus']['other']['2017-2018'] =$row['CHG8AY2'];
				$stdExp['offCampus']['other']['2018-2019'] =$row['CHG8AY3'];
			endif;

			// Off Campus with Family
			if(!empty($row['CHG9AY1'])):
				$stdExp['offCampusFamily']['other']['2016-2017'] =$row['CHG9AY1'];
				$stdExp['offCampusFamily']['other']['2017-2018'] =$row['CHG9AY2'];
				$stdExp['offCampusFamily']['other']['2018-2019'] =$row['CHG9AY3'];
			endif;

			return $stdExp;
		}
	}

	public function getAvgGrdFees($unitid){
		$sql = "SELECT TUITION5,FEE1,TUITION7,FEE7 FROM `ic2018_ay` WHERE `UNITID` = '".$unitid."'  AND TUITION5 <> ''";
		$result = $this->conn->query($sql);
		$stdExp = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();			
			return $row;		
		}

	}

	public function getAltTutionPlan($unitid){
		$sql = "SELECT TUITPL1,TUITPL2,TUITPL3,TUITPL4 FROM `ic2018` WHERE `UNITID` = '".$unitid."'  AND TUITPL = 1";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();					
			return $row;		
		}		
	}

	public function getFinancialAid($unitid){
		$sql = "SELECT * FROM `sfa1718_p1` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();				
			return $row;
		}
	}
	public function getNetPrice($unitid){
		$sql = "SELECT `NPIST0`,`NPIST1`,`NPIST2`,`NPGRN0`,`NPGRN1`,`NPGRN2` FROM `sfa1718_p2` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}
	}

	public function getNetPriceTitleIV($unitid){
		$sql = "SELECT `NPIS410`,`NPT410`,`NPIS420`,`NPIS430`,`NPIS440`,`NPIS450`,`NPIS411`,`NPIS421`,`NPIS431`,`NPIS441`,`NPIS451`,`NPIS412`,`NPIS422`,`NPIS432`,`NPIS442`,`NPIS452`,`NPT411`,`NPT412`,`NPT420`,`NPT421`,`NPT422`,`NPT430`,`NPT431`,`NPT432`,`NPT440`,`NPT441`,`NPT442`,`NPT450`,`NPT451`,`NPT452` FROM `sfa1718_p2` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();			
			return $row;
		}
	}
	
	public function getEnrollment($unitid){
		$sql = "SELECT `EFUG`,`EFGRAD`,`EFUGTRN` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();					
			return $row;
		}
	}
	
	public function getUnderRaceEthnicity($unitid){
		$sql = "SELECT `PCUENRAN`,`PCUENRAP`,`PCUENRBK`,`PCUENRHS`,`PCUENRWH`,`PCUENR2M`,`PCUENRUN`,`PCUENRNR` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			$dataaa = array();
			foreach ($row as $key => $value) {
				if(isset($value) ):
					switch ($key) {
						case 'PCUENRAN':
							$label = 'American Indian or Alaska Native';
							break;
						
						case 'PCUENRAP':
							$label = 'Asian/Native Hawaiian/Pacific Islander';
							break;

						case 'PCUENRBK':
							$label = 'Black or African American';
							break;

						case 'PCUENRHS':
							$label = 'Hispanic/Latino';
							break;

						case 'PCUENRWH':
							$label = 'White';
							break;

						case 'PCUENR2M':
							$label = 'Two or more races';
							break;

						case 'PCUENRUN':
							$label = 'Race/ethnicity unknown';
							break;

						case 'PCUENRNR':
							$label = 'Nonresident Alien';
							break;	
						default:
							# code...
							break;
					}					
					array_push($dataaa, array(
	                    "label" => $label,
	                    "value" =>$value,
	                    "color" => "#019ff0" 
	                ));
                endif;  
			}
			return $dataaa;
		}	
	}
	public function getUndergraduateAge($unitid){
		$sql = "SELECT `DVEF13`,`DVEF14`,`DVEF15`,`DVEF16` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();					
			$dataaa = array();
			foreach ($row as $key => $value) {
				if(isset($value) ):
					switch ($key) {
						case 'DVEF13':
							$label = 'under 18';
							break;
						
						case 'DVEF14':
							$label = '18-24';
							break;

						case 'DVEF15':
							$label = '25-64';
							break;

						case 'DVEF16':
							$label = 'over 65';
							break;
						default:
							# code...
							break;
					}					
					array_push($dataaa, array(
	                    "label" => $label,
	                    "value" =>$value,
	                    "color" => "#019ff0" 
	                ));
                endif;  
			}
			return $dataaa;
		}
	}

	public function getundergraduateResidence($unitid){
		$sql = "SELECT `RMINSTTP`,`RMOUSTTP`,`RMFRGNCP`,`RMUNKNWP` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();					
			$dataaa = array();
			foreach ($row as $key => $value) {
				if(isset($value) ):
					switch ($key) {
						case 'RMINSTTP':
							$label = 'In-state';
							break;
						
						case 'RMOUSTTP':
							$label = 'Out-of-state';
							break;

						case 'RMFRGNCP':
							$label = 'Foreign countries';
							break;

						case 'RMUNKNWP':
							$label = 'Residence unknown';
							break;
						default:
							# code...
							break;
					}					
					array_push($dataaa, array(
	                    "label" => $label,
	                    "value" =>$value,
	                    "color" => "#019ff0" 
	                ));
                endif;  
			}
			return $dataaa;
		}
	}
	public function getGrdPerDistEdu($unitid){
		$sql = "SELECT `PCGDEEXC`,`PCGDESOM`,`PCGDENON` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();					
			$dataaa = array();
			foreach ($row as $key => $value) {
				if(isset($value) ):
					switch ($key) {
						case 'PCGDEEXC':
							$label = 'Enrolled only in distance education';
							break;
						
						case 'PCGDESOM':
							$label = 'Enrolled in some distance education';
							break;

						case 'PCGDENON':
							$label = 'Not enrolled in any distance education';
							break;

						default:
							# code...
							break;
					}					
					array_push($dataaa, array(
	                    "label" => $label,
	                    "value" =>$value,
	                    "color" => "#019ff0" 
	                ));
                endif;  
			}
			return $dataaa;
		}
	}
	
	public function getUnderPerDistEdu($unitid){
		$sql = "SELECT `PCUDEEXC`,`PCUDESOM`,`PCUDENON` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();					
			$dataaa = array();
			foreach ($row as $key => $value) {
				if(isset($value) ):
					switch ($key) {
						case 'PCUDEEXC':
							$label = 'Enrolled only in distance education';
							break;
						
						case 'PCUDESOM':
							$label = 'Enrolled in some distance education';
							break;

						case 'PCUDENON':
							$label = 'Not enrolled in any distance education';
							break;

						default:
							# code...
							break;
					}					
					array_push($dataaa, array(
	                    "label" => $label,
	                    "value" =>$value,
	                    "color" => "#019ff0" 
	                ));
                endif;  
			}
			return $dataaa;
		}
	}
	
	public function getGradStatus($unitid){
		$sql = "SELECT `EFGRAD`,`EFGRADFT`,`EFGRADPT` FROM `drvef2018` WHERE `UNITID` = '".$unitid."'";
		$result = $this->conn->query($sql);	
		$dataaa = array();		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			if(!empty($row) && (!empty($row['EFGRADFT']) || !empty($row['EFGRADPT']))):
			$fullTime = round(($row['EFGRADFT']/$row['EFGRAD']) * 100);
			$partTime = round(($row['EFGRADPT']/$row['EFGRAD']) * 100);	
			
			$dataaa[0]['label'] = "Full-time";
			$dataaa[0]['value'] = $fullTime;
			$dataaa[0]['color'] = "#ffbf00";
			$dataaa[1]['label'] = "Part-time";
			$dataaa[1]['value'] = $partTime;
			$dataaa[1]['color'] = "#019ff0";
			endif;	
			return $dataaa;
		}
	}
	
	public function getUndergraduateGender($unitid){
		$sql = "SELECT `EFTOTLT`,`EFTOTLM`,`EFTOTLW` FROM `ef2018a` WHERE `UNITID` = '".$unitid."' AND EFALEVEL=2 ";
		$result = $this->conn->query($sql);	
		$dataaa = array();		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();			
			
			if(!empty($row) && (!empty($row['EFTOTLM']) || !empty($row['EFTOTLW']))):

			$totalMen = round(($row['EFTOTLM']/$row['EFTOTLT']) * 100);
			$totalWomen = round(($row['EFTOTLW']/$row['EFTOTLT']) * 100);	
			
			$dataaa[0]['label'] = "Male";
			$dataaa[0]['value'] = $totalMen;
			$dataaa[0]['color'] = "#ffbf00";
			$dataaa[1]['label'] = "Female";
			$dataaa[1]['value'] = $totalWomen;
			$dataaa[1]['color'] = "#019ff0";
			endif;	
			return $dataaa;
		}
	}

	public function getUndergraduateAttendence($unitid){		
		$sql = "SELECT `EFAGE05`,`EFAGE09`,`EFAGE06` FROM `ef2018b` WHERE `UNITID` = '".$unitid."' and LSTUDY = 2 AND EFBAGE = 1 ";
		$result = $this->conn->query($sql);	
		$dataaa = array();		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();			
			
			if(!empty($row) && (!empty($row['EFAGE05']) || !empty($row['EFAGE06']))):

			$fullTime = round(($row['EFAGE05']/$row['EFAGE09']) * 100);
			$partTime = round(($row['EFAGE06']/$row['EFAGE09']) * 100);				
			$dataaa[0]['label'] = "Full-time";
			$dataaa[0]['value'] = $fullTime;
			$dataaa[0]['color'] = "#ffbf00";
			$dataaa[1]['label'] = "Part-time";
			$dataaa[1]['value'] = $partTime;
			$dataaa[1]['color'] = "#019ff0";
			endif;	
			return $dataaa;
		}
	}
	
	public function getAdmissionFall($unitid){
		$sql = "SELECT adm.APPLCN,adm.APPLCNM,adm.APPLCNW,adm.ENRLT,adm.ENRLM,adm.ENRLW,rvadm.DVADM01 ,rvadm.DVADM02,rvadm.DVADM03,adm.ADMSSN FROM `adm2018` adm LEFT JOIN drvadm2018 rvadm ON adm.UNITID = rvadm.UNITID WHERE adm.UNITID = '".$unitid."'";
		$result = $this->conn->query($sql);	
		$dataaa = array();		
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();
			return $row;
		} 
	}

	public function getAdmConsideration($unitid){
		$sql = "SELECT `ADMCON1`,`ADMCON2`,`ADMCON3`,`ADMCON4`,`ADMCON5`,`ADMCON6`,`ADMCON7`,`ADMCON8`,`ADMCON9`,`SATNUM`,`SATPCT`,`ACTNUM`,`ACTPCT`,`SATVR25`,`SATVR75`,`SATMT25`,`SATMT75`,`ACTCM25`,`ACTCM75`,`ACTEN25`,`ACTEN75`,`ACTMT25`,`ACTMT75` FROM `adm2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		$dataaa = array();
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();
			return $row;
		}
	}
	
	public function getRetentionRate($unitid){
		$sql = "SELECT `RET_PCF`,`RET_PCP` FROM `ef2018d` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		$dataaa = array();
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			if(!empty($row['RET_PCF']) || !empty($row['RET_PCP']) ):		
				$dataaa[0]['label'] = "Full-time Student";
				$dataaa[0]['value'] = intval($row['RET_PCF']);
				$dataaa[0]['color'] = "#019ff0";
				$dataaa[1]['label'] = "Part-time Student";
				$dataaa[1]['value'] = intval($row['RET_PCP']);
				$dataaa[1]['color'] = "#019ff0";	
			endif;	
		}
		return $dataaa;
	}

	public function getOverallRate($unitid){
		$sql = "SELECT `PGGRRTT`,`TRRTTOT` FROM `drvgr2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		$dataaa = array();
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			if(!empty($row['PGGRRTT']) || !empty($row['TRRTTOT'])):
				$dataaa[0]['label'] = "OVERALL GRADUATION RATE";
				$dataaa[0]['value'] = $row['PGGRRTT'];
				$dataaa[0]['color'] = "#019ff0";
				$dataaa[1]['label'] = "TRANSFER-OUT RATE";
				$dataaa[1]['value'] = $row['TRRTTOT'];
				$dataaa[1]['color'] = "#019ff0";
			endif;					
		}
		return $dataaa;	
	}

	public function getBachelorGrdRate($unitid){
		$sql = "SELECT `drvgr2018`.`GBA4RTT`,`drvgr2018`.`GBA6RTT`,`gr200_18`.`BAGR100`,`gr200_18`.`BAGR150`,`gr200_18`.`BAGR200` FROM `drvgr2018` 
		join `gr200_18` on `drvgr2018`.`UNITID`=`gr200_18`.`UNITID`
		WHERE  `drvgr2018`.`UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		
		$data =  $data1 = $category = $categories = $dataset = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();	
			if(!empty($row['GBA4RTT']) || !empty($row['GBA6RTT'])):
				$category[0]['label'] = '4-Year';
				$category[1]['label'] = '6-Year';
				$category[2]['label'] = '8-Year';

				array_push($categories, array(
			            "category" => $category,
			    )); 

				$data[0]['value'] = $row['GBA4RTT'];
				$data[1]['value'] = $row['GBA6RTT'];
				$data[2]['value'] = 0;

				$data1[0]['value'] = $row['BAGR100'];
				$data1[1]['value'] = $row['BAGR150'];
				$data1[2]['value'] = $row['BAGR200'];
				

				$dataset[0]['seriesname'] = "Began in Fall 2012";
				$dataset[0]['data'] = $data;
				
				$dataset[1]['seriesname'] = "Began in Fall 2010";
				$dataset[1]['data'] = $data1;				
			endif;	

			return array('categories'=>$categories,'dataset'=>$dataset);			
		}
		
	}

	public function getBachelorGrdRateRace($unitid){
		$sql = "SELECT `GBA6RTAN`,`GBA6RTAS`,`GBA6RTBK`,`GBA6RTHS`,`GBA6RTNH`,`GBA6RTWH`,`GBA6RTUN`,`GBA6RTNR`,`GBA6RTM`,`GBA6RTW` FROM `drvgr2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		$dataaa = array();
		$datgender =  array();
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			if(!empty($row['GBA6RTAN']) || !empty($row['GBA6RTAS']) || !empty($row['GBA6RTBK']) || !empty($row['GBA6RTHS'])):
				$dataaa[0]['label'] = "American Indian or Alaska Native ";
				$dataaa[0]['value'] = $row['GBA6RTAN'];
				$dataaa[0]['color'] = "#019ff0";

				$dataaa[1]['label'] = "Asian";
				$dataaa[1]['value'] = $row['GBA6RTAS'];
				$dataaa[1]['color'] = "#019ff0";

				$dataaa[2]['label'] = "Black, non-Hispanic";
				$dataaa[2]['value'] = $row['GBA6RTBK'];
				$dataaa[2]['color'] = "#019ff0";


				$dataaa[3]['label'] = "Hispanic";
				$dataaa[3]['value'] = $row['GBA6RTHS'];
				$dataaa[3]['color'] = "#019ff0";

				$dataaa[4]['label'] = "Native Hawaiian or Other Pacific Islander";
				$dataaa[4]['value'] = $row['GBA6RTNH'];
				$dataaa[4]['color'] = "#019ff0";

				$dataaa[5]['label'] = "White, non-Hispanic ";
				$dataaa[5]['value'] = $row['GBA6RTWH'];
				$dataaa[5]['color'] = "#019ff0";

				$dataaa[6]['label'] = "Race/ethnicity unknown";
				$dataaa[6]['value'] = $row['GBA6RTUN'];
				$dataaa[6]['color'] = "#019ff0";

				$dataaa[7]['label'] = "Nonresident alien";
				$dataaa[7]['value'] = $row['GBA6RTNR'];
				$dataaa[7]['color'] = "#019ff0";

				$datgender[0]['label'] = "Male";
				$datgender[0]['value'] = $row['GBA6RTM'];
				$datgender[0]['color'] = "#019ff0";

				$datgender[1]['label'] = "Female";
				$datgender[1]['value'] = $row['GBA6RTW'];
				$datgender[1]['color'] = "#019ff0";

			endif;				
		}

		return array('race'=>$dataaa,'gender'=>$datgender);
	}
	
	public function getOutcomeMeasff($unitid){
		$sql = "SELECT `OM1TotlBACp8`,`OM1TotlEnYp8`,`OM1TotlEnAp8`,`OM1PellBACp8`,`OM1PellEnYp8`,`OM1PellEnAp8`,`OM1nPelBACp8`,`OM1nPelEnYp8`,`OM1nPelEnAp8` FROM `drvom2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		
		$data =  $data1 = $category = $categories = $dataset = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();	
			if(!empty($row['OM1TotlBACp8']) || !empty($row['OM1TotlEnYp8'])):
				$category[0]['label'] = " Receiving a bachelor's Degree";
				$category[1]['label'] = 'Enrolled at same institution';
				$category[2]['label'] = 'Enrolled at different nstitution';

				array_push($categories, array(
			            "category" => $category,
			    )); 

				$data[0]['value'] = $row['OM1TotlBACp8'];
				$data[1]['value'] = $row['OM1TotlEnYp8'];
				$data[2]['value'] = $row['OM1TotlEnAp8'];

				$data1[0]['value'] = $row['OM1PellBACp8'];
				$data1[1]['value'] = $row['OM1PellEnYp8'];
				$data1[2]['value'] = $row['OM1PellEnAp8'];

				$data2[0]['value'] = $row['OM1nPelBACp8'];
				$data2[1]['value'] = $row['OM1nPelEnYp8'];
				$data2[2]['value'] = $row['OM1nPelEnAp8'];				

				$dataset[0]['seriesname'] = "All Students";
				$dataset[0]['data'] = $data;
				
				$dataset[1]['seriesname'] = "Pell";
				$dataset[1]['data'] = $data1;	

				$dataset[2]['seriesname'] = "Non-Pell";
				$dataset[2]['data'] = $data2;							
			endif;	
			return array('categories'=>$categories,'dataset'=>$dataset);		
		}		
	}

public function getOutcomeMeaspf($unitid){
		$sql = "SELECT `OM2TotlBACp8`,`OM2PellBACp8`,`OM2nPelBACp8`,`OM2TotlEnYp8`,`OM2PellEnYp8`,`OM2nPelEnYp8`,`OM2TotlEnAp8`,`OM2PellEnAp8`,`OM2nPelEnAp8` FROM `drvom2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		
		$data =  $data1 = $category = $categories = $dataset = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();	
			if(!empty($row['OM2TotlBACp8']) || !empty($row['OM2PellBACp8'])):
				$category[0]['label'] = " Receiving a bachelor's Degree";
				$category[1]['label'] = 'Enrolled at same institution';
				$category[2]['label'] = 'Enrolled at different nstitution';
				array_push($categories, array(
			            "category" => $category,
			    )); 

				$data[0]['value'] = $row['OM2TotlBACp8'];
				$data[1]['value'] = $row['OM2TotlEnYp8'];
				$data[2]['value'] = $row['OM2TotlEnAp8'];

				$data1[0]['value'] = $row['OM2PellBACp8'];
				$data1[1]['value'] = $row['OM2PellEnYp8'];
				$data1[2]['value'] = $row['OM2PellEnAp8'];

				$data2[0]['value'] = $row['OM2nPelBACp8'];
				$data2[1]['value'] = $row['OM2nPelEnYp8'];
				$data2[2]['value'] = $row['OM2nPelEnAp8'];
				

				$dataset[0]['seriesname'] = "All Students";
				$dataset[0]['data'] = $data;
				
				$dataset[1]['seriesname'] = "Pell";
				$dataset[1]['data'] = $data1;	

				$dataset[2]['seriesname'] = "Non-Pell";
				$dataset[2]['data'] = $data2;							
			endif;	
			return array('categories'=>$categories,'dataset'=>$dataset);			
		}		
	}
	
	public function getOutcomeMeasfnf($unitid){
		$sql = "SELECT `OM3TotlBACp8`,`OM3PellBACp8`,`OM3nPelBACp8`,`OM3TotlEnYp8`,`OM3PellEnYp8`,`OM3nPelEnYp8`,`OM3TotlEnAp8`,`OM3PellEnAp8`,`OM3nPelEnAp8` FROM `drvom2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		
		$data =  $data1 = $category = $categories = $dataset = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();	
			if(!empty($row['OM3TotlBACp8']) || !empty($row['OM3PellBACp8'])):
				$category[0]['label'] = " Receiving a bachelor's Degree";
				$category[1]['label'] = 'Enrolled at same institution';
				$category[2]['label'] = 'Enrolled at different nstitution';
				array_push($categories, array(
			            "category" => $category,
			    )); 

				$data[0]['value'] = $row['OM3TotlBACp8'];
				$data[1]['value'] = $row['OM3TotlEnYp8'];
				$data[2]['value'] = $row['OM3TotlEnAp8'];

				$data1[0]['value'] = $row['OM3PellBACp8'];
				$data1[1]['value'] = $row['OM3PellEnYp8'];
				$data1[2]['value'] = $row['OM3PellEnAp8'];

				$data2[0]['value'] = $row['OM3nPelBACp8'];
				$data2[1]['value'] = $row['OM3nPelEnYp8'];
				$data2[2]['value'] = $row['OM3nPelEnAp8'];
				

				$dataset[0]['seriesname'] = "All Students";
				$dataset[0]['data'] = $data;
				
				$dataset[1]['seriesname'] = "Pell";
				$dataset[1]['data'] = $data1;	

				$dataset[2]['seriesname'] = "Non-Pell";
				$dataset[2]['data'] = $data2;							
			endif;	
			return array('categories'=>$categories,'dataset'=>$dataset);			
		}		
	}
	
	public function getOutcomeMeaspnf($unitid){
		$sql = "SELECT `OM4TotlBACp8`,`OM4PellBACp8`,`OM4nPelBACp8`,`OM4TotlEnYp8`,`OM4PellEnYp8`,`OM4nPelEnYp8`,`OM4TotlEnAp8`,`OM4PellEnAp8`,`OM4nPelEnAp8` FROM `drvom2018` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		
		$data =  $data1 = $category = $categories = $dataset = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();	
			if(!empty($row['OM4TotlBACp8']) || !empty($row['OM4PellBACp8'])):
				$category[0]['label'] = " Receiving a bachelor's Degree";
				$category[1]['label'] = 'Enrolled at same institution';
				$category[2]['label'] = 'Enrolled at different nstitution';
				array_push($categories, array(
			            "category" => $category,
			    )); 

				$data[0]['value'] = $row['OM4TotlBACp8'];
				$data[1]['value'] = $row['OM4TotlEnYp8'];
				$data[2]['value'] = $row['OM4TotlEnAp8'];

				$data1[0]['value'] = $row['OM4PellBACp8'];
				$data1[1]['value'] = $row['OM4PellEnYp8'];
				$data1[2]['value'] = $row['OM4PellEnAp8'];

				$data2[0]['value'] = $row['OM4nPelBACp8'];
				$data2[1]['value'] = $row['OM4nPelEnYp8'];
				$data2[2]['value'] = $row['OM4nPelEnAp8'];
				

				$dataset[0]['seriesname'] = "All Students";
				$dataset[0]['data'] = $data;
				
				$dataset[1]['seriesname'] = "Pell";
				$dataset[1]['data'] = $data1;	

				$dataset[2]['seriesname'] = "Non-Pell";
				$dataset[2]['data'] = $data2;							
			endif;	
			return array('categories'=>$categories,'dataset'=>$dataset);			
		}		
	}
	
	public function getServicemembers($unitid){
		$sql = "SELECT `UGPO9_N`,`GPO9_N`,`UGDOD_N`,`GDOD_N` FROM `sfav1718` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		$dataaa = array();
		$datgender =  array();
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			if(!empty($row['UGPO9_N']) || !empty($row['GPO9_N']) || !empty($row['UGDOD_N']) || !empty($row['GDOD_N'])):
				$dataaa[0]['label'] = "Post-9/11 GI Bill Benefits - undergraduate";
				$dataaa[0]['value'] = $row['UGPO9_N'];
				$dataaa[0]['color'] = "#019ff0";

				$dataaa[1]['label'] = "Post-9/11 GI Bill Benefits - graduate";
				$dataaa[1]['value'] = $row['GPO9_N'];
				$dataaa[1]['color'] = "#019ff0";

				$dataaa[2]['label'] = "DoD Tuition Assistance Program - undergraduate";
				$dataaa[2]['value'] = $row['UGDOD_N'];
				$dataaa[2]['color'] = "#019ff0";


				$dataaa[3]['label'] = "DoD Tuition Assistance Program - graduate";
				$dataaa[3]['value'] = $row['GDOD_N'];
				$dataaa[3]['color'] = "#019ff0";
			endif;				
		}
		return $dataaa;
	}

	public function getServicemembersA($unitid){
		$sql = "SELECT `UGPO9_A`,`GPO9_A`,`UGDOD_A`,`GDOD_A` FROM `sfav1718` WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);	
		$dataaa = array();
		$datgender =  array();
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();	
			if(!empty($row['UGPO9_A']) || !empty($row['GPO9_A']) || !empty($row['UGDOD_A']) || !empty($row['GDOD_A'])):
				$dataaa[0]['label'] = "Post-9/11 GI Bill Benefits - undergraduate";
				$dataaa[0]['value'] = $row['UGPO9_A'];
				$dataaa[0]['color'] = "#019ff0";

				$dataaa[1]['label'] = "Post-9/11 GI Bill Benefits - graduate";
				$dataaa[1]['value'] = $row['GPO9_A'];
				$dataaa[1]['color'] = "#019ff0";

				$dataaa[2]['label'] = "DoD Tuition Assistance Program - undergraduate";
				$dataaa[2]['value'] = $row['UGDOD_A'];
				$dataaa[2]['color'] = "#019ff0";


				$dataaa[3]['label'] = "DoD Tuition Assistance Program - graduate";
				$dataaa[3]['value'] = $row['GDOD_A'];
				$dataaa[3]['color'] = "#019ff0";
			endif;				
		}
		return $dataaa;
	}
	
	
	public function getVarsityAthleticTeam($unitid){
		$sql = "SELECT * FROM athletic_teams WHERE `UNITID` = '".$unitid."' ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {			
			$row = $result->fetch_assoc();				
			return $row;			
		}
	}
	
	public function getProgramMajor($unitid){
		//$sql = "SELECT * FROM `c2018dep` WHERE `UNITID` = '".$unitid."' GROUP BY FLOOR(`CIPCODE`)";
		$sql = "SELECT * FROM `c2018dep` INNER JOIN valuesets18 ON c2018dep.CIPCODE=valuesets18.Codevalue WHERE `c2018dep`.`UNITID` = '".$unitid."' AND `valuesets18`.`TableName` LIKE 'C2018DEP' AND `valuesets18`.`varName` LIKE 'CIPCODE' GROUP BY FLOOR(`c2018dep`.`CIPCODE`) ORDER BY `valuesets18`.`valueLabel` ASC";
		
		$result = $this->conn->query($sql);	
		$dataa = "";
		if ($result->num_rows > 0) {
			$dataa .= "
			<p class='note'><b>COMPLETIONS (NUMBER OF AWARDS CONFERRED) 2017-2018</b> <br />
			<span>Completions are the number of awards conferred by program and award level.</span></p>
			 <div class='response-div'>
			<table class='table'><thead><tr>
			</thead>
			<tbody>";


			
			$totalbacTotal = $totalmasTotal = $totaldocTotal = $totalpostTotal = array();

			while($row = $result->fetch_assoc()) {
				$CIPCODE = $row['CIPCODE'];
				if($CIPCODE == 99 ){
					continue;
				}
				$qry ="SELECT `valueLabel` FROM `valuesets18` WHERE `TableName` LIKE 'C2018DEP' AND `varName` LIKE 'CIPCODE' AND `Codevalue` LIKE '".$CIPCODE."' ";
				$res = $this->conn->query($qry);
				$rowRes = $res->fetch_assoc();
				$heading = $rowRes['valueLabel'];
				$dataa .= '<tr class="subrow nb"><th>'.$heading.'</th><th class="majors-title">BACHELOR</th><th class="majors-title">MASTER</th><th class="majors-title">DOCTOR</th><th class="majors-title">POSTGRADUATE<br>CERTIFICATE</th></tr>';
				//Inner data

				$qry1 ="SELECT * FROM `c2018dep` WHERE `UNITID` = '".$unitid."' AND CIPCODE LIKE '".$CIPCODE."%'";
				$res1 = $this->conn->query($qry1);	
				$totalbac = $totalmas = $totaldoc = $totalpost = 0;		
				
				if ($res1->num_rows > 0) {
					while($c2018dep = $res1->fetch_assoc()) {
						$cpCode = $c2018dep['CIPCODE'];
						$PBACHL = $c2018dep['PBACHL'];
						$PBACHLDE = $c2018dep['PBACHLDE'];
						
						$PMASTR = $c2018dep['PMASTR'];
						$PMASTRDE = $c2018dep['PMASTRDE'];

						// PDOCRS,PDOCPP
						$PDOCRS = $c2018dep['PDOCRS'];
						$PDOCRSDE = $c2018dep['PDOCRSDE'];

						$PDOCPP = $c2018dep['PDOCPP'];
						$PDOCPPDE = $c2018dep['PDOCPPDE'];
						
						$PPMAST = $c2018dep['PPMAST'];
						$PPMASTDE = $c2018dep['PPMASTDE'];

						if($cpCode == $CIPCODE){
							continue;
						}
						$DOCTOR = "";
						if($PDOCPP || $PDOCRS){
							if(!empty($PDOCRS)){
								$DOCTOR = $this->getProgramMajorData($unitid,$cpCode,17,$PDOCRSDE);
							}else{
								$DOCTOR = $this->getProgramMajorData($unitid,$cpCode,18,$PDOCRSDE);
							}
						}
						$BACHELOR = $this->getProgramMajorData($unitid,$cpCode,5,$PBACHLDE);
						$MASTER = $this->getProgramMajorData($unitid,$cpCode,7,$PMASTRDE);	
						$POSTGRADUATE = $this->getProgramMajorData($unitid,$cpCode,8,$PPMASTDE);
						$labelHeading =  $this->labelHeading($cpCode);
						
						if(is_numeric($BACHELOR)){
							$totalbac +=$BACHELOR;
						}
						if(is_numeric($MASTER)){
							$totalmas +=$MASTER;
						}
						if(is_numeric($DOCTOR)){
							$totaldoc +=$DOCTOR;
						}
						if(is_numeric($POSTGRADUATE)){
							$totalpost +=$POSTGRADUATE;
						}
						$dataa .= '<tr class="lavelIndend">';
						$dataa .= "<td>".$labelHeading."</td>";
						$dataa .= "<td>".$BACHELOR."</td>";
						$dataa .= "<td>".$MASTER."</td>";
						$dataa .= "<td>".$DOCTOR."</td>";
						$dataa .= "<td>".$POSTGRADUATE."</td>";
						$dataa .= "</tr>";
						// echo "<pre>";
						// print_r($c2018dep);
						// echo "</pre>";
					}
					$dataa .= '<tr class="lavel2Indend" style="font-weight: 600;">';
					$dataa .= "<td>Category total </td>";
					$dataa .= "<td>".$totalbac."</td>";
					$dataa .= "<td>".$totalmas."</td>";
					$dataa .= "<td>".$totaldoc."</td>";
					$dataa .= "<td>".$totalpost."</td>";
					$dataa .= "</tr>";
					array_push($totalbacTotal, $totalbac);
					array_push($totalmasTotal, $totalmas);
					array_push($totaldocTotal, $totaldoc);
					array_push($totalpostTotal, $totalpost);
				}
			}

			$dataa .= '<tr class="subrow" style="font-weight: 600;">
				<td scope="row">Grand total</td>
				<td>'.array_sum($totalbacTotal).'</td>
				<td>'.array_sum($totalmasTotal).'</td>
				<td>'.array_sum($totaldocTotal).'</td>
				<td>'.array_sum($totalpostTotal).'</td>
			</tr>';
			$dataa .= '<tr><td colspan="5"><ul style="list-style: disc;" class="note"><li>Data shown are for first majors.</li><li>(-) Program is not offered at this award level.</li><li><sup>d</sup> identifies programs and award levels that are offered as a distance education program. For program category totals, <strong><sup>d</sup></strong> is shown if one or more programs in the category are offered as a distance education program.</li></ul></td></tr>';
$dataa .= "</tbody></table></div>";	
		}
		return $dataa;
	}

	public function getProgramMajorData($unitid,$CIPCODE,$AWLEVEL,$disc ){		
		$sql = "SELECT `CIPCODE`,`AWLEVEL`,`CTOTALT` FROM `c2018_a` WHERE `UNITID` = '".$unitid."' and CIPCODE = '".$CIPCODE."' AND AWLEVEL = '".$AWLEVEL."' ";
		$result = $this->conn->query($sql);	
		$total = "-";
		$des = "";
		if ($result->num_rows > 0) {	
			$row = $result->fetch_assoc();			
			if(!empty($disc)){
				$des = "<sup>d</sup>";
			}		
			$total = $row['CTOTALT'].$des;				
		}	
		return $total;
	}
	public function labelHeading($CIPCODE){
		$qry ="SELECT `valueLabel` FROM `valuesets18` WHERE `TableName` LIKE 'C2018DEP' AND `varName` LIKE 'CIPCODE' AND `Codevalue` LIKE '".$CIPCODE."' ";
		$res = $this->conn->query($qry);
		if ($res->num_rows > 0) {
			$rowRes = $res->fetch_assoc();
			return $heading = $rowRes['valueLabel'];
		}
	}
	
	public function shortInfoStudent($unitid){
		$sql = "SELECT `EFAGE09`,`EFAGE01`,`EFAGE02`,`EFAGE05`,`EFAGE06` FROM `ef2018b` WHERE `UNITID` = '".$unitid."' ANd LSTUDY = 1 AND EFBAGE = 1 ";
		$res = $this->conn->query($sql);
		if ($res->num_rows > 0) {
			$result = $res->fetch_assoc();
			return $result;			
		}
	}
	
	public function getUnderDegNon($unitid){
		$sql = "SELECT EFTOTLT FROM `ef2018a` WHERE `UNITID` = '".$unitid."' AND EFALEVEL = 31";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}	
}

?>

	