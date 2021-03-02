<?php 
include 'schoolInfoClass.php';
extract($_POST);

//call class 
$obj = new schoolInfoClass();
$clgInfo = $obj->gethd2018ById($unitid);

//type
$codvalue = $clgInfo['SECTOR'];
$clgType = $obj->getType($codvalue);


// Awards offered
$awardOffer = $obj->getAwardsOffered($unitid);

// Campus setting 
$locale = $clgInfo['LOCALE'];
$campusSetting = $obj->getCampusSetting($locale);
$address = $clgInfo['ADDR'].', '. $clgInfo['CITY'].', '.$clgInfo['STABBR'].' '.$clgInfo['ZIP'];

// Campus housing
$campusHousing = $obj->getCampusHousing($unitid);

// Student population
$stuPopulation = $obj->getStudentpopulation($unitid);

// Student-to-faculty ratio
$facultyRation = $obj->getFacultyRatio($unitid);

// Mission Statement
$missionStatement = $obj->getMissionStatement($unitid);

// Special Learning Opportunities
$splLernOpport = $obj->getSplLernOpport($unitid);

// Student Services
$studentServices = $obj->getStudentServices($unitid);

// Credit Accepted
$creditAccepted = $obj->getCreditAccepted($unitid);

// Carnegie Classification
$classification = $obj->getClassification($unitid);

// Religious Affiliation
$religiousAffi = $obj->getReligiousAffi($unitid);

// disability services
$disabilityServices = $obj->getDisabilityServices($unitid);

// Other Characteristics
$otherChar = $obj->getOtherChar($unitid);

//FACULTY AND GRADUATE ASSISTANT
$facultyAss = $obj->getFacultyAssistance($unitid);

// graduate assistants
$graduateAss = $obj->getGraduateAssistants($unitid);

// TUITION, FEES, AND ESTIMATED STUDENT EXPENSES
$studentExp = $obj->getStudentExp($unitid);

// Living arrangement
$livingArrangement = $obj->getLivingArrangement($unitid);

// TOTAL EXPENSES
$totalExp = array();

// AVERAGE GRADUATE STUDENT TUITION AND FEES FOR ACADEMIC YEAR
$avgGrdFees = $obj->getAvgGrdFees($unitid);

// ALTERNATIVE TUITION PLANS
$altTutionPlan = $obj->getAltTutionPlan($unitid);

// FINANCIAL AID
$financialAid = $obj->getFinancialAid($unitid);

// NET PRICE 
$netPrice = $obj->getNetPrice($unitid);
$netPriceTitleIv = $obj->getNetPriceTitleIV($unitid);
?>
<div class="collegeinfo">

	<div class="col-md-12">
		<button class="back" onclick="backtoResult();"> <i class="fa fa-arrow-circle-left"></i> Back</button>	
	</div>
	<div class="col-md-12 dashboard">
		<div class="col-md-8 col-sm-12 part-1-info">
			<span class="heading"><strong><?php echo $clgInfo['INSTNM']; ?></strong></span><br />
			<span><?php echo $clgInfo['ADDR'].', '. $clgInfo['CITY'].', '.$clgInfo['STABBR'].' '.$clgInfo['ZIP'];  ?></span>
			<br /><br />
			<table class="table">
				<thead>
					<tr>
						<td><strong>General information:</strong> </td>
						<td><span> <?php echo $clgInfo['GENTELE']; ?></span></td>
					</tr>
					<tr>
						<td><strong>Website:</strong></td>
						<td><span><?php echo $clgInfo['WEBADDR']; ?> </span></td>
					</tr>
					<tr>
						<td><strong>Type: </strong></td>
						<td><span><?php echo $clgType['valueLabel']; ?> </span></td>
					</tr>
					<tr>
						<td><strong>Awards offered: </strong></td>
						<td>
							<span>
								<?php 
									if(!empty($awardOffer)):
										foreach ($awardOffer as $key => $value) {							
											echo $value['varTitle']."<br />";
										}

									endif;
								?> 
							</span>
						</td>
					</tr>
					<tr>
						<td><strong>Campus setting:</strong></td>
						<td><?php echo $campusSetting['valueLabel']; ?></td>
					</tr>
					<tr>
						<td><strong>Campus housing: </strong></td>
						<td><?php echo $campusHousing; ?></td>
					</tr>
					<tr>
						<td><strong>Student population:</strong></td>
						<td><?php echo $stuPopulation['EFTOTLT']; ?></td>
					</tr>
					<tr>
						<td><strong>Student-to-faculty ratio:</strong></td>
						<td><?php echo $facultyRation['STUFACR']; ?>  to 1</td>
					</tr>
				</thead>	
			</table>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="map-section">
				<a href="https://maps.google.com/?q=<?php echo $address;?>" target="_blank">
					<img src="images/google-maker.png" class="google_maker"><br />View on Google Maps
				</a>
			</div>
			
		</div>
	</div>
	<div class="col-md-12 fadeyell">
		<div class="expandcollapse colorful">
			<a href="#" onclick="expendAll();return(false);">Expand All</a>
			<span class="pipe">&nbsp;|&nbsp;</span>
			<a href="#" onclick="collapseAll(false);return(false);">Collapse All</a>
		</div>
	</div>
	<div class="col-md-12">
		<div class="detail-box">
			<div class="heading" onclick="stoggle('general');return(false);" id="general">
				<a href="#" class="stoggle">
					<span class="Plus" id="ICONgeneral"></span>
					<span> GENERAL INFORMATION</span>
				</a>				
			</div>
			<div class="detailOff" id="collapsegeneral" style="display: none;" >						
				<table>
				  	<tr>
				  		<th>Admissions</th>
				  		<td>
				  			<?php $webaddr = addhttp($clgInfo['ADMINURL']); ?>
				  			<a href="<?php echo $webaddr; ?>" target="_blank">
				  				<?php echo $clgInfo['ADMINURL']; ?>			  					
				  			</a>
				  		</td>
				  	</tr>
				  	<tr>
				  		<th>Apply Online</th>
				  		<td>
				  			<a href="<?php echo addhttp($clgInfo['APPLURL']); ?>" target="_blank">
				  				<?php echo $clgInfo['APPLURL']; ?>			  					
				  			</a>
				  		</td>
				  	</tr>
				  	<tr>
				  		<th>Financial Aid</th>
				  		<td>
				  			<a href="<?php echo addhttp($clgInfo['FAIDURL']); ?>" target="_blank">
				  				<?php echo $clgInfo['FAIDURL']; ?>
					  		</a>
					  	</td>
				  	</tr>
				  	<tr>
				  		<th>Net Price Calculator</th>
				  		<td>
				  			<a href="<?php echo addhttp($clgInfo['NPRICURL']); ?>" target="_blank">
				  				<?php echo $clgInfo['NPRICURL']; ?>
					  		</a>
					  	</td>
				  	</tr>
				  	<tr>
				  		<th>Tuition Policies for Servicemembers and Veterans</th>
				  		<td>
				  			<a href="<?php echo addhttp($clgInfo['VETURL']); ?>" target="_blank">
				  				<?php echo $clgInfo['VETURL']; ?>
					  		</a>
				  		</td>
				  	</tr>
				  	<tr>
				  		<th>Disability Services</th>
				  		<td>
				  			<a href="<?php echo addhttp($clgInfo['DISAURL']); ?>" target="_blank">
				  				<?php echo $clgInfo['DISAURL']; ?>
					  		</a>
				  		</td>
				  	</tr>
				  	<tr>
				  		<th>Athletic Graduation Rates</th>
				  		<td></td>
				  	</tr>			  	
				</table>
				<div class="missionBox">
					<strong>Mission Statement</strong> <br />
					<?php 
					if(!empty($missionStatement)):
						$mission = $missionStatement['missionURL'];
						if(!empty($mission)){
							$missionUrl = addhttp($mission);
							echo "<i><a href='".$missionUrl."' target='_blank'>".$mission."</a></i>";
						}else{
							echo $mission = $missionStatement['mission'];

						}
					endif	
					?>
				</div>
				<div class="otherDetail">
					<div class="row col-md-6 col-sm-12">
						<strong>Special Learning Opportunities</strong><br />
						<?php 
						if(!empty($splLernOpport)):
							echo "";
							foreach ($splLernOpport as $key => $value) {
								echo $value. "<br />";
							}
						else:
							echo "None";
						endif;

						if(!empty($studentServices)):
							echo "<br>";
							echo "<strong>Student Services</strong> <br />";
							foreach ($studentServices as $key => $value) {
								echo $value. "<br />";
							}
						endif;

						if(!empty($creditAccepted)):
							echo "<br>";
							echo "<strong>Credit Accepted</strong> <br />";
							foreach ($creditAccepted as $key => $value) {
								echo $value. "<br />";
							}
						endif;
						?>						
					</div>
					<div class="row col-md-6 col-sm-12">
						<?php 
						if(!empty($classification)):
							echo "<strong>Carnegie Classification</strong><br />";
							foreach ($classification as $key => $value) {
								echo $value. "<br />";
							}
						endif;
						?>

						<br /><strong>Religious Affiliation</strong><br />
						<?php 
						if(!empty($religiousAffi)):							
							foreach ($religiousAffi as $key => $value) {
								echo $value. "<br />";
							}
						endif;
						?>

						<?php 
						if(!empty($disabilityServices)):
							echo "<br />";
							echo "<strong>Undergraduate students enrolled who are formally registered with office of disability services</strong><br />";
							echo $disabilityServices;
							echo "<br />";
						endif;
						?>

						<?php 
						// Other Characteristics
						if(!empty($otherChar)):
							echo "<br /> <strong>Other Characteristics</strong><br />";
							echo $otherChar;
						endif;
						?>
					</div>					
				</div>
				<div class="otherDetail col-md-12">
					<table style="width: 100%;">
						<tr>
							<th>FACULTY AND GRADUATE ASSISTANTS BY PRIMARY FUNCTION	</th>
							<th>FULL TIME</th>
							<th>PART TIME</th>
						</tr>
						<tr>
							<td>Total faculty</td>
							<td>
								<?php 
								if(!empty($facultyAss['total_full_time'])){ 
									echo $facultyAss['total_full_time'];
								}else{
									echo 0;
								}?>								
							</td>
							<td><?php 
								if(!empty($facultyAss['total_part_time'])){ 
									echo $facultyAss['total_part_time'];
								}else{
									echo 0;
								}?>
									
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Instructional</td>
							<td><?php
								if(!empty($facultyAss['Instructional_full_time'])){ 
									echo $facultyAss['Instructional_full_time'];
								}else{
									echo 0;
								} ?>									
							</td>
							<td><?php
								if(!empty($facultyAss['Instructional_part_time'])){ 
									echo $facultyAss['Instructional_part_time'];
								}else{
									echo 0;
								} ?>									
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Research and public service</td>
							<td><?php							
								if(!empty($facultyAss['research_full_time'])){ 
									echo $facultyAss['research_full_time'];
								}else{
									echo 0;
								} ?>									
							</td>
							<td><?php
								if(!empty($facultyAss['research_part_time'])){ 
									echo $facultyAss['research_part_time'];
								}else{
									echo 0;
								} ?>									
							</td>							
						</tr>
						<?php if(!empty($graduateAss)): ?>
						<tr>
							<td>Total graduate assistants</td>
							<td>
								<?php 
								if(isset($graduateAss['totalGraduateFull'])):
									echo $graduateAss['totalGraduateFull'];
								endif;
								?>									
							</td>
							<td>
								<?php 
								if(isset($graduateAss['totalGraduatePart'])):
									echo $graduateAss['totalGraduatePart'] ;
								endif;
								?>	
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Instructional</td>
							<td><?php							
								if(!empty($graduateAss['graduateInst_full_time'])){ 
									echo $graduateAss['graduateInst_full_time'];
								}else{
									echo 0;
								} ?>									
							</td>
							<td><?php							
								if(!empty($graduateAss['graduateInst_part_time'])){ 
									echo $graduateAss['graduateInst_part_time'];
								}else{
									echo 0;
								} ?>									
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Research and public service</td>
							<td><?php							
								if(!empty($graduateAss['graduateResh_full_time'])){ 
									echo $graduateAss['graduateResh_full_time'];
								}else{
									echo 0;
								} ?>									
							</td>
							<td><?php							
								if(!empty($graduateAss['graduateResh_part_time'])){ 
									echo $graduateAss['graduateResh_part_time'];
								}else{
									echo 0;
								} ?>									
							</td>
						</tr>	
						<?php endif; ?>				
					</table>
				</div>
			</div>
		</div>

		<div class="detail-box">
			<div class="heading" onclick="stoggle('feesExpenses');return(false);" id="feesExpenses">
				<a href="#" class="stoggle">
					<span class="Plus" id="ICONfeesExpenses"></span>
					<span> TUITION, FEES, AND ESTIMATED STUDENT EXPENSES</span></a>				
			</div>
			<div class="detailOff" id="collapsefeesExpenses" style="display: none;" >
				<strong class="tablename">Estimated Expenses for Full-time Beginning Undergraduate Students</strong>
			  	<ul style="list-style: disc;"><li>Beginning students are those who are entering postsecondary education for the first time.</li></ul>
			  	<table>
				  	<thead>
				  		<tr>
							<th scope="col">Estimated expenses for academic year</th>
							<th scope="col">2016-2017</th>
							<th scope="col">2017-2018</th>
							<th scope="col">2018-2019</th>							
							<th scope="col">% change 2017-2018 to 2018-2019</th>
						</tr>
				  	</thead>
				  	<tbody>
				  		<?php if(!empty($studentExp)): ?>
					  		<tr class="sub-row">
					  			<td colspan="5">Tuition and fees</td>
					  		</tr>
					  		<?php if(!empty($studentExp['GTustionFees']['inState'])): 
					  			$inState = $studentExp['GTustionFees']['inState'];
					  			$totalExp['onCampus']['2016-2017'][]= $inState['2016-2017'];
					  			$totalExp['onCampus']['2017-2018'][]= $inState['2017-2018'];
					  			$totalExp['onCampus']['2018-2019'][]= $inState['2018-2019'];

					  			$totalExp['offCampus']['2016-2017'][]= $inState['2016-2017'];
					  			$totalExp['offCampus']['2017-2018'][]= $inState['2017-2018'];
					  			$totalExp['offCampus']['2018-2019'][]= $inState['2018-2019'];

					  			$totalExp['offCampusFamily']['2016-2017'][]= $inState['2016-2017'];
					  			$totalExp['offCampusFamily']['2017-2018'][]= $inState['2017-2018'];
					  			$totalExp['offCampusFamily']['2018-2019'][]= $inState['2018-2019'];


					  			?>
					  			<tr class="lavelIndend">
					  				<td>In-state</td>
					  				<td><?php echo '$'.number_format($inState['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($inState['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($inState['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $inState['2018-2019'] - $inState['2017-2018'];
					  					$per = ($diff * 100)/ $inState['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>

					  		<?php $outOfState = $studentExp['GTustionFees']['outOfState'];
					  		if(!empty($outOfState)): 
					  			$totalExp['outState']['2016-2017'][]= $outOfState['2016-2017'];
					  			$totalExp['outState']['2017-2018'][]= $outOfState['2017-2018'];
					  			$totalExp['outState']['2018-2019'][]= $outOfState['2018-2019'];
					  			?>
					  			<tr class="lavelIndend">
					  				<td>Out-of-state</td>
					  				<td><?php echo '$'.number_format($outOfState['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($outOfState['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($outOfState['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $outOfState['2018-2019'] - $outOfState['2017-2018'];
					  					$per = ($diff * 100)/ $outOfState['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>

					  		<?php $booksSupplies = $studentExp['GTustionFees']['booksSupplies'];
					  		if(!empty($booksSupplies)): 
					  			$totalExp['onCampus']['2016-2017'][]= $booksSupplies['2016-2017'];
					  			$totalExp['onCampus']['2017-2018'][]= $booksSupplies['2017-2018'];
					  			$totalExp['onCampus']['2018-2019'][]= $booksSupplies['2018-2019'];

					  			$totalExp['offCampus']['2016-2017'][]= $booksSupplies['2016-2017'];
					  			$totalExp['offCampus']['2017-2018'][]= $booksSupplies['2017-2018'];
					  			$totalExp['offCampus']['2018-2019'][]= $booksSupplies['2018-2019'];

					  			$totalExp['offCampusFamily']['2016-2017'][]= $booksSupplies['2016-2017'];
					  			$totalExp['offCampusFamily']['2017-2018'][]= $booksSupplies['2017-2018'];
					  			$totalExp['offCampusFamily']['2018-2019'][]= $booksSupplies['2018-2019'];

					  			$totalExp['outState']['2016-2017'][]= $booksSupplies['2016-2017'];
					  			$totalExp['outState']['2017-2018'][]= $booksSupplies['2017-2018'];
					  			$totalExp['outState']['2018-2019'][]= $booksSupplies['2018-2019'];

					  			?>
					  			<tr class="lavelIndend">
					  				<td>Books and supplies</td>
					  				<td><?php echo '$'.number_format($booksSupplies['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($booksSupplies['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($booksSupplies['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $booksSupplies['2018-2019'] - $booksSupplies['2017-2018'];
					  					$per = ($diff * 100)/ $booksSupplies['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>					  		
				  		<?php endif; ?>

				  		<!-- Living arrangement	 -->
				  		<?php if(!empty($livingArrangement)): ?>
				  			<tr class="sub-row">
						  		<td colspan="5">Living arrangement</td>
						  	</tr>
						  	<?php 
						  		$onCampus = $livingArrangement['onCampus']['roomBoard'];
						  		if(!empty($onCampus)):
						  			$totalExp['onCampus']['2016-2017'][]= $onCampus['2016-2017'];
						  			$totalExp['onCampus']['2017-2018'][]= $onCampus['2017-2018'];
						  			$totalExp['onCampus']['2018-2019'][]= $onCampus['2018-2019'];

						  			$totalExp['outStateOn']['2016-2017'][]= $onCampus['2016-2017'];
						  			$totalExp['outStateOn']['2017-2018'][]= $onCampus['2017-2018'];
						  			$totalExp['outStateOn']['2018-2019'][]= $onCampus['2018-2019'];
						  		 ?>
						  		<tr><td colspan="5">On Campus</td></tr>
					  			<tr class="lavelIndend">
					  				<td>Room and board</td>
					  				<td><?php echo '$'.number_format($onCampus['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($onCampus['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($onCampus['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $onCampus['2018-2019'] - $onCampus['2017-2018'];
					  					$per = ($diff * 100)/ $onCampus['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>

					  		<?php 
						  		$onCampusOther = $livingArrangement['onCampus']['other'];
						  		if(!empty($onCampusOther)):
						  			$totalExp['onCampus']['2016-2017'][]= $onCampusOther['2016-2017'];
						  			$totalExp['onCampus']['2017-2018'][]= $onCampusOther['2017-2018'];
						  			$totalExp['onCampus']['2018-2019'][]= $onCampusOther['2018-2019'];

						  			$totalExp['outStateOn']['2016-2017'][]= $onCampusOther['2016-2017'];
						  			$totalExp['outStateOn']['2017-2018'][]= $onCampusOther['2017-2018'];
						  			$totalExp['outStateOn']['2018-2019'][]= $onCampusOther['2018-2019'];
						  		?>						  		
					  			<tr class="lavelIndend">
					  				<td>Other</td>
					  				<td><?php echo '$'.number_format($onCampusOther['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($onCampusOther['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($onCampusOther['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $onCampusOther['2018-2019'] - $onCampusOther['2017-2018'];
					  					$per = ($diff * 100)/ $onCampusOther['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>

					  		<?php 
						  		$offCampus = $livingArrangement['offCampus']['roomBoard'];
						  		if(!empty($offCampus)): 

					  			$totalExp['offCampus']['2016-2017'][]= $offCampus['2016-2017'];
					  			$totalExp['offCampus']['2017-2018'][]= $offCampus['2017-2018'];
					  			$totalExp['offCampus']['2018-2019'][]= $offCampus['2018-2019'];

					  			$totalExp['outStateOff']['2016-2017'][]= $offCampus['2016-2017'];
						  		$totalExp['outStateOff']['2017-2018'][]= $offCampus['2017-2018'];
						  		$totalExp['outStateOff']['2018-2019'][]= $offCampus['2018-2019'];
					  			?>
						  		<tr><td colspan="5">Off Campus</td></tr>
					  			<tr class="lavelIndend">
					  				<td>Room and board</td>
					  				<td><?php echo '$'.number_format($offCampus['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($offCampus['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($offCampus['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $offCampus['2018-2019'] - $offCampus['2017-2018'];
					  					$per = ($diff * 100)/ $offCampus['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>	

					  		<?php 
						  		$offCampusOther = $livingArrangement['offCampus']['other'];
						  		if(!empty($offCampusOther)): 
						  			$totalExp['offCampus']['2016-2017'][]= $offCampusOther['2016-2017'];
						  			$totalExp['offCampus']['2017-2018'][]= $offCampusOther['2017-2018'];
						  			$totalExp['offCampus']['2018-2019'][]= $offCampusOther['2018-2019'];

						  			$totalExp['outStateOff']['2016-2017'][]= $offCampusOther['2016-2017'];
							  		$totalExp['outStateOff']['2017-2018'][]= $offCampusOther['2017-2018'];
							  		$totalExp['outStateOff']['2018-2019'][]= $offCampusOther['2018-2019'];
					  			?>
						  		
					  			<tr class="lavelIndend">
					  				<td>other</td>
					  				<td><?php echo '$'.number_format($offCampusOther['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($offCampusOther['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($offCampusOther['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $offCampusOther['2018-2019'] - $offCampusOther['2017-2018'];
					  					$per = ($diff * 100)/ $offCampusOther['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>

					  		<!-- Off Campus with Family -->
					  		<?php 
						  		$offCampusFamily = $livingArrangement['offCampusFamily']['other'];
						  		if(!empty($offCampusFamily)): 
						  		$totalExp['offCampusFamily']['2016-2017'][]= $offCampusFamily['2016-2017'];
					  			$totalExp['offCampusFamily']['2017-2018'][]= $offCampusFamily['2017-2018'];
					  			$totalExp['offCampusFamily']['2018-2019'][]= $offCampusFamily['2018-2019']
					  			;
					  			$totalExp['outStateFamily']['2016-2017'][]= $offCampusFamily['2016-2017'];
							  	$totalExp['outStateFamily']['2017-2018'][]= $offCampusFamily['2017-2018'];
							  	$totalExp['outStateFamily']['2018-2019'][]= $offCampusFamily['2018-2019'];


						  		?>
						  		<tr><td colspan="5">Off Campus with Family</td></tr>
					  			<tr class="lavelIndend">
					  				<td>other</td>
					  				<td><?php echo '$'.number_format($offCampusFamily['2016-2017']); ?></td>
					  				<td><?php echo '$'.number_format($offCampusFamily['2017-2018']); ?></td>
					  				<td><?php echo '$'.number_format($offCampusFamily['2018-2019']); ?></td>
					  				<td> 
					  					<?php
					  					$diff = $offCampusFamily['2018-2019'] - $offCampusFamily['2017-2018'];
					  					$per = ($diff * 100)/ $offCampusFamily['2018-2019'];
					  					echo round($per,2).'%';
					  					?>
					  				</td>
					  			</tr>
					  		<?php endif; ?>

				  		<?php endif; ?>	

				  		<?php if(!empty($totalExp)): ?>
				  		<tr class="mainhead">
				  			<th>Total Expenses</th>
				  			<th>2016-2017</th>
				  			<th>2017-2018</th>
				  			<th>2018-2019</th>
				  			<th>% change 2017-2018 to 2018-2019</th>
				  		</tr>	
				  		<tr class="sub-row">
					  		<td colspan="5">In-state</td>
					  	</tr>	
					  	<tr class="lavelIndend">
					  		<td>On Campus</td>	
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['onCampus']['2016-2017'])):
					  				echo '$'.number_format(array_sum($totalExp['onCampus']['2016-2017']));
					  			endif;
					  			?> 

					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['onCampus']['2017-2018'])):
					  				$offCamFl2018 = array_sum($totalExp['onCampus']['2017-2018']);
					  				echo '$'.number_format($offCamFl2018);
					  			endif;
					  			?>					  			
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['onCampus']['2018-2019'])):
					  				$offCamFl2019 = array_sum($totalExp['onCampus']['2018-2019']);
					  				echo '$'.number_format($offCamFl2019);
					  			endif;
					  			?>
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['onCampus'])):	
					  				$perq = (($offCamFl2019 - $offCamFl2018)*100)/$offCamFl2018;
					  				echo round($perq,2).'%';					  				
					  			endif;
					  			?>
					  		</td>
					  	</tr> 
					  	<tr class="lavelIndend">
					  		<td>Off Campus</td>	
					  		<td>
					  			<?php 						  			
					  			if(!empty($totalExp['offCampus']['2016-2017'])):
					  				echo '$'.number_format(array_sum($totalExp['offCampus']['2016-2017']));
					  			endif;
					  			?> 

					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['offCampus']['2017-2018'])):
					  				$offCamFl2018 = array_sum($totalExp['offCampus']['2017-2018']);
					  				echo '$'.number_format($offCamFl2018);
					  			endif;
					  			?>					  			
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['offCampus']['2018-2019'])):
					  				$offCamFl2019 = array_sum($totalExp['offCampus']['2018-2019']);
					  				echo '$'.number_format($offCamFl2019);
					  			endif;
					  			?>
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['offCampus'])):	
					  				$perq = (($offCamFl2019 - $offCamFl2018)*100)/$offCamFl2018;
					  				echo round($perq,2).'%';					  				
					  			endif;
					  			?>
					  		</td>
					  	</tr> 
					  	<tr class="lavelIndend">
					  		<td>Off Campus with Family</td>	
					  		<td>
					  			<?php 						  			
					  			if(!empty($totalExp['offCampusFamily']['2016-2017'])):
					  				echo '$'.number_format(array_sum($totalExp['offCampusFamily']['2016-2017']));
					  			endif;
					  			?> 
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['offCampusFamily']['2017-2018'])):
					  				$offCamFl2018 =  array_sum($totalExp['offCampusFamily']['2017-2018']);
					  				echo '$'.number_format($offCamFl2018);
					  			endif;
					  			?>					  			
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['offCampusFamily']['2018-2019'])):
					  				$offCamFl2019 = array_sum($totalExp['offCampusFamily']['2018-2019']);
					  				echo '$'.number_format($offCamFl2019);
					  			endif;
					  			?>
					  		</td>

					  		<td>
					  			<?php 
					  			if(!empty($totalExp['offCampusFamily'])):	
					  				$perq = (($offCamFl2019 - $offCamFl2018)*100)/$offCamFl2018;
					  				echo round($perq,2).'%';					  				
					  			endif;
					  			?>
					  		</td>
					  	</tr>	
					  	<tr class="sub-row">
					  		<td colspan="5">Out-of-state</td>					  		
					  	</tr>
					  	<tr class="lavelIndend">
					  		<td>On Campus</td>
					  		<td>
					  			<?php 
					  			$total = 0;						  			
					  			if(!empty($totalExp['outState']['2016-2017'])):	
					  				$total += array_sum($totalExp['outState']['2016-2017']);	
					  			endif;
					  			if(!empty($totalExp['outStateOn']['2016-2017'])):	
					  				$total += array_sum($totalExp['outStateOn']['2016-2017']);	
					  			endif;
					  			echo '$'.number_format($total);
					  			
					  			?> 
					  		</td>
					  		<td>
					  			<?php 
					  			$outStateOn2018 = 0;						  			
					  			if(!empty($totalExp['outState']['2017-2018'])):	
					  				$outStateOn2018 += array_sum($totalExp['outState']['2017-2018']);	
					  			endif;
					  			if(!empty($totalExp['outStateOn']['2017-2018'])):	
					  				$outStateOn2018 += array_sum($totalExp['outStateOn']['2017-2018']);	
					  			endif;					  		
					  			echo '$'.number_format($outStateOn2018);
					  			?> 
					  		</td>

					  		<td>
					  			<?php 
					  			$outStateOn2019 = 0;						  			
					  			if(!empty($totalExp['outState']['2018-2019'])):	
					  				$outStateOn2019 += array_sum($totalExp['outState']['2018-2019']);	
					  			endif;
					  			if(!empty($totalExp['outStateOn']['2018-2019'])):	
					  				$outStateOn2019 += array_sum($totalExp['outStateOn']['2018-2019']);	
					  			endif;					  			
					  			echo '$'.number_format($outStateOn2019);

					  			?> 
					  		</td>

					  		<td>
					  			<?php 
					  			if(!empty($totalExp['outStateOn'])):	
					  				$diff = $outStateOn2019 - $outStateOn2018;
					  				$per = ($diff * 100) / $outStateOn2018;
					  				echo round($per, 2).'%';
					  			endif;
					  			?>
					  		</td>
					  	</tr>	

					  	<tr class="lavelIndend">
					  		<td>Off Campus</td>
					  		<td>
					  			<?php 
					  			$total = 0;						  			
					  			if(!empty($totalExp['outState']['2016-2017'])):	
					  				$total += array_sum($totalExp['outState']['2016-2017']);	
					  			endif;
					  			if(!empty($totalExp['outStateOff']['2016-2017'])):	
					  				$total += array_sum($totalExp['outStateOff']['2016-2017']);	
					  			endif;					  			
					  			echo '$'.number_format($total);
					  			?> 
					  		</td>
					  		<td>
					  			<?php 
					  			$outState2018 = 0;						  			
					  			if(!empty($totalExp['outState']['2017-2018'])):	
					  				$outState2018 += array_sum($totalExp['outState']['2017-2018']);	
					  			endif;
					  			if(!empty($totalExp['outStateOff']['2017-2018'])):	
					  				$outState2018 += array_sum($totalExp['outStateOff']['2017-2018']);	
					  			endif;					  			
					  			echo '$'.number_format($outState2018);
					  			?> 
					  		</td>

					  		<td>
					  			<?php 
					  			$outState2019 = 0;						  			
					  			if(!empty($totalExp['outState']['2018-2019'])):	
					  				$outState2019 += array_sum($totalExp['outState']['2018-2019']);	
					  			endif;
					  			if(!empty($totalExp['outStateOff']['2018-2019'])):	
					  				$outState2019 += array_sum($totalExp['outStateOff']['2018-2019']);	
					  			endif;					  			
					  			echo '$'.number_format($outState2019);
					  			?> 
					  		</td>

					  		<td>
					  			<?php 
					  			if(!empty($totalExp['outStateOff'])):	
					  				$diff = $outState2019 - $outState2018;
					  				$per = ($diff * 100) / $outState2018;
					  				echo round($per, 2).'%';
					  			endif;
					  			?>
					  		</td>
					  	</tr>

					  	<!-- Off Campus with Family -->
					  	<tr class="lavelIndend">
					  		<td>Off Campus with Family</td>
					  		<td>
					  			<?php 
					  			$total = 0;						  			
					  			if(!empty($totalExp['outState']['2016-2017'])):	
					  				$total += array_sum($totalExp['outState']['2016-2017']);	
					  			endif;
					  			if(!empty($totalExp['outStateFamily']['2016-2017'])):	
					  				$total += array_sum($totalExp['outStateFamily']['2016-2017']);	
					  			endif;					  			
					  			echo '$'.number_format($total);
					  			?> 
					  		</td>
					  		<td>
					  			<?php 
					  			$year2018 = 0;						  			
					  			if(!empty($totalExp['outState']['2017-2018'])):	
					  				$year2018 += array_sum($totalExp['outState']['2017-2018']);	
					  			endif;
					  			if(!empty($totalExp['outStateFamily']['2017-2018'])):	
					  				$year2018 += array_sum($totalExp['outStateFamily']['2017-2018']);	
					  			endif;					  			
					  			echo '$'.number_format($year2018);
					  			?> 
					  		</td>

					  		<td>
					  			<?php 
					  			$year2019 = 0;						  			
					  			if(!empty($totalExp['outState']['2018-2019'])):	
					  				$year2019 += array_sum($totalExp['outState']['2018-2019']);	
					  			endif;
					  			if(!empty($totalExp['outStateFamily']['2018-2019'])):	
					  				$year2019 += array_sum($totalExp['outStateFamily']['2018-2019']);	
					  			endif;					  			
					  			echo '$'.number_format($year2019);
					  			?> 
					  		</td>
					  		<td>
					  			<?php 
					  			if(!empty($totalExp['outStateFamily'])):	
					  				$diff = $year2019 - $year2018;
					  				$per = ($diff * 100) / $year2018;
					  				echo round($per, 2).'%';
					  			endif;
					  			?>
					  		</td>
					  	</tr>
					  <?php endif; ?>

				  	</tbody>			  	
			  	</table>
			  	<?php if(!empty($avgGrdFees)): ?>			  	
			  	<table>
			  		<thead>
			  			<tr>
			  				<th>AVERAGE GRADUATE STUDENT TUITION AND FEES FOR ACADEMIC YEAR</th>
			  				<th>2018-2019</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<tr>
			  				<td>In-state tuition</td>
			  				<td>$<?php echo number_format($avgGrdFees['TUITION5']); ?></td>
			  			</tr>
			  			<tr>
			  				<td>In-state fees</td>
			  				<td>$<?php echo number_format($avgGrdFees['FEE1']); ?></td>
			  			</tr>
			  			<tr>
			  				<td>Out-of-state tuition</td>
			  				<td>$<?php echo number_format($avgGrdFees['TUITION7']); ?></td>
			  			</tr>
			  			<tr>
			  				<td>Out-of-state fees</td>
			  				<td>$<?php echo number_format($avgGrdFees['FEE7']); ?></td>
			  			</tr>			  			
			  		</tbody>
			  	</table>
			  	<?php endif; ?>

			  	<?php if(!empty($altTutionPlan)): ?>
			  		<table>
			  			<thead>
			  				<tr>
			  					<th colspan="1">ALTERNATIVE TUITION PLANS</th>
			  				</tr>	
			  				<tr>
			  					<th>TYPE OF PLAN</th>
			  					<th>OFFERED</th>
			  				</tr>		  				
			  			</thead>
			  			<tbody>
				  			<tr>
				  				<td>Tuition guarantee plan</td>
				  				<td> <?php 
				  					if($altTutionPlan['TUITPL1'] == 1):
				  						echo "X";
				  					endif;
				  				?></td>
				  			</tr>
				  			<tr>
				  				<td>Prepaid tuition plan</td>
				  				<td>
				  					<?php 
				  					if($altTutionPlan['TUITPL2'] == 1):
				  						echo "X";
				  					endif;
				  					?>
				  				</td>
				  			</tr>
				  			<tr>
				  				<td>Tuition payment plan</td>
				  				<td>
				  					<?php 
				  					if($altTutionPlan['TUITPL3'] == 1):
				  						echo "X";
				  					endif;
				  					?>
				  				</td>
				  			</tr>
				  			<tr>
				  				<td>Other alternative tuition plan</td>
				  				<td>
				  					<?php 
				  					if($altTutionPlan['TUITPL4'] == 1):
				  						echo "X";
				  					endif;
				  					?>
				  				</td>
				  			</tr>			  				
			  			</tbody>			  			
			  		</table>
			  	<?php endif; ?>
			</div> 
		</div>

		<div class="detail-box">
			<div class="heading" onclick="stoggle('finacialAid');return(false);" id="finacialAid">
				<a href="#" class="stoggle">
					<span class="Plus" id="ICONfinacialAid"></span>
					<span> FINANCIAL AID </span></a>				
			</div>
			<div class="detailOff" id="collapsefinacialAid" style="display: none;" >
				<strong class="tablename">UNDERGRADUATE STUDENT FINANCIAL AID, 2017-2018</strong>
				<p><strong>Full-time Beginning Undergraduate Students</strong></p>			  	
			  <ul style="list-style: disc;">
			    <li>Beginning students are those who are entering postsecondary education for the first time.</li>			    
			  </ul>
				<table>
				  	<thead>
				  		<tr>
				  			<th scope="col">Type of Aid</th>
				  			<th scope="col">Number receiving aid</th>
				  			<th scope="col">Percent receiving aid</th>
				  			<th scope="col">Total amount of aid received</th>
				  			<th scope="col">Average amount of aid received</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				  		<tr>
				  			<td>Any student financial aid <sup>1</sup></td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['ANYAIDN'])):
				  						echo number_format($financialAid['ANYAIDN']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['ANYAIDP'])):
				  						echo $financialAid['ANYAIDP'].'%';
				  					endif;
				  				?>
				  			</td>
				  			<td> -- </td>
				  			<td>--</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>Grant or scholarship aid</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['AGRNT_N'])):
				  						echo number_format($financialAid['AGRNT_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['AGRNT_P'])):
				  						echo number_format($financialAid['AGRNT_P']).'%';
				  					endif;
				  				?>			  				
				  			</td>
				  			<td> 
				  				<?php 
				  					if(!empty($financialAid['AGRNT_T'])):
				  						echo '$'.number_format($financialAid['AGRNT_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['AGRNT_A'])):
				  						echo '$'.number_format($financialAid['AGRNT_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>
				  		<tr class="lavel2Indend">
				  			<td>Federal grants</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FGRNT_N'])):
				  						echo number_format($financialAid['FGRNT_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FGRNT_P'])):
				  						echo number_format($financialAid['FGRNT_P']).'%';
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FGRNT_T'])):
				  						echo '$'.number_format($financialAid['FGRNT_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FGRNT_A'])):
				  						echo '$'.number_format($financialAid['FGRNT_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>

				  		<tr class="lavel2Indend">
							<td>Pell grants</td>
							<td>
				  				<?php 
				  					if(!empty($financialAid['PGRNT_N'])):
				  						echo number_format($financialAid['PGRNT_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['PGRNT_P'])):
				  						echo number_format($financialAid['PGRNT_P']).'%';
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['PGRNT_T'])):
				  						echo '$'.number_format($financialAid['PGRNT_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['PGRNT_A'])):
				  						echo '$'.number_format($financialAid['PGRNT_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>

				  		<tr class="lavel2Indend">
							<td>Other federal grants</td>
							<td>
				  				<?php 
				  					if(!empty($financialAid['OFGRT_N'])):
				  						echo number_format($financialAid['OFGRT_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OFGRT_P'])):
				  						echo number_format($financialAid['OFGRT_P']).'%';
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OFGRT_T'])):
				  						echo '$'.number_format($financialAid['OFGRT_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OFGRT_A'])):
				  						echo '$'.number_format($financialAid['OFGRT_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>State/local government grant or scholarships</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['SGRNT_N'])):
				  						echo number_format($financialAid['SGRNT_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['SGRNT_P'])):
				  						echo number_format($financialAid['SGRNT_P']).'%';
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['SGRNT_T'])):
				  						echo '$'. number_format($financialAid['SGRNT_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['SGRNT_A'])):
				  						echo '$'.number_format($financialAid['SGRNT_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>

				  		<tr class="lavelIndend">
				  			<td>Institutional grants or scholarships</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['IGRNT_N'])):
				  						echo number_format($financialAid['IGRNT_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['IGRNT_P'])):
				  						echo number_format($financialAid['IGRNT_P']).'%';
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['IGRNT_T'])):
				  						echo '$'.number_format($financialAid['IGRNT_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['IGRNT_A'])):
				  						echo '$'.number_format($financialAid['IGRNT_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Student loan aid</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['LOAN_N'])):
				  						echo number_format($financialAid['LOAN_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['LOAN_P'])):
				  						echo number_format($financialAid['LOAN_P']).'%';
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['LOAN_T'])):
				  						echo '$'.number_format($financialAid['LOAN_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['LOAN_A'])):
				  						echo '$'.number_format($financialAid['LOAN_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>Federal student loans</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FLOAN_N'])):
				  						echo number_format($financialAid['FLOAN_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FLOAN_P'])):
				  						echo number_format($financialAid['FLOAN_P'])."%";
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FLOAN_T'])):
				  						echo '$'. number_format($financialAid['FLOAN_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['FLOAN_A'])):
				  						echo '$'.number_format($financialAid['FLOAN_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>Other student loans</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OLOAN_N'])):
				  						echo number_format($financialAid['OLOAN_N']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OLOAN_P'])):
				  						echo number_format($financialAid['OLOAN_P'])."%";
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OLOAN_T'])):
				  						echo '$'. number_format($financialAid['OLOAN_T']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['OLOAN_A'])):
				  						echo '$'.number_format($financialAid['OLOAN_A']);
				  					endif;
				  				?>
				  			</td>
				  		</tr>
				  	</tbody>
				</table>
				<div class="note">
					<ul>
						<li style="list-style:disc;"><sup>1</sup> Includes students receiving Federal work study aid and aid from other sources not listed above.</li>
						<li style="list-style:disc;"><span style="font-style:italic">The institution does not participate in Federal Student Loan Programs.</span>
						</li>
					</ul>
				</div>


				<p><strong> All Undergraduate Students</strong></p>
				<table>
					<thead>
						<tr>
							<th>TYPE OF AID</th>
							<th>NUMBER RECEIVING AID</th>
							<th>TOTAL AMOUNT OF AID RECEIVED</th>
							<th>AVERAGE AMOUNT OF AID RECEIVED</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Grant or scholarship aid<sup>1</sup></td>
							<td>
				  				<?php 				  				
				  					if(!empty($financialAid['UAGRNTN'])):
				  						echo number_format($financialAid['UAGRNTN']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['UAGRNTT'])):
				  						echo '$'.number_format($financialAid['UAGRNTT']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['UAGRNTA'])):
				  						echo '$'.number_format($financialAid['UAGRNTA']);
				  					endif;
				  				?>
				  			</td>
						</tr> 
						<tr>
							<td>Pell grants</td>
							<td>
				  				<?php 
				  					if(!empty($financialAid['UPGRNTN'])):
				  						echo number_format($financialAid['UPGRNTN']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['UPGRNTT'])):
				  						echo '$'.number_format($financialAid['UPGRNTT']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['UPGRNTA'])):
				  						echo '$'.number_format($financialAid['UPGRNTA']);
				  					endif;
				  				?>
				  			</td>				  			
						</tr>

						<tr>
							<td>Federal student loans</td>
							<td>
				  				<?php 
				  					if(!empty($financialAid['UFLOANN'])):
				  						echo number_format($financialAid['UFLOANN']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['UFLOANT'])):
				  						echo '$'.number_format($financialAid['UFLOANT']);
				  					endif;
				  				?>
				  			</td>
				  			<td>
				  				<?php 
				  					if(!empty($financialAid['UFLOANA'])):
				  						echo '$'.number_format($financialAid['UFLOANA']);
				  					endif;
				  				?>
				  			</td>	
						</tr>
					</tbody>
				</table>
				<div class="note">
					<ul>						
						<li style="list-style:disc;"><sup>1</sup> Grant or scholarship aid includes aid received, from the federal government, state or local government, the institution, and other sources known by the institution.</li>	
						<li style="list-style:disc;">For more information on Student Financial Assistance Programs or to apply for financial aid via the web, visit <a href="http://studentaid.ed.gov" target="_blank">Federal Student Aid</a>.</li>	
					</ul>
				</div>



			</div>
		</div>
		
	<div class="detail-box">
			<div class="heading" onclick="stoggle('netPrice');return(false);" id="netPrice">
				<a href="#" class="stoggle">
					<span class="Plus" id="ICONnetPrice"></span>
					<span> NET PRICE </span></a>				
			</div>
			<div class="detailOff" id="collapsenetPrice" style="display: none;" >
				<strong class="tablename">AVERAGE NET PRICE FOR FULL-TIME BEGINNING STUDENTS</strong>
			  	
			  	<?php if(!empty($netPrice)): ?>
			  		<p>Full-time beginning undergraduate students who paid the in-state or in-district tuition rate and were awarded grant or scholarship aid from federal, state or local governments, or the institution.</p>
			  		<table>
				  		<thead>
				  			<tr>
				  				<th></th> <th>2015-2016</th> <th>2016-2017</th> <th>2017-2018</th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<tr>
				  				<td>Average net price</td>
				  				<td>
				  					<?php if(isset($netPrice['NPIST0'])){	
				  						echo '$'.number_format($netPrice['NPIST0']);
				  					}else{
				  						echo "--";
				  					} ?>
				  				</td>
				  				<td>
				  					<?php if(isset($netPrice['NPIST1'])){	
				  						echo '$'.number_format($netPrice['NPIST1']);
				  					}else{
				  						echo "--";
				  					} ?>
				  				</td>
				  				<td>
				  					<?php if(isset($netPrice['NPIST2'])){	
				  						echo '$'.number_format($netPrice['NPIST2']);
				  					}else{
				  						echo "--";
				  					} ?>
				  				</td>
				  			</tr>				  			
				  		</tbody>
				  	</table>
			  	<?php endif; ?>  

			  	<p></p>
			  	
			  	<?php if(!empty($netPriceTitleIv)): ?>
			  		<p>Full-time beginning undergraduate students who paid the in-state or in-district tuition rate and were awarded Title IV aid by income.</p>
			  		<table>
			  			<thead>
			  				<tr>
			  					<th>AVERAGE NET PRICE BY INCOME</th>
			  					<th>2015-2016</th> 
			  					<th>2016-2017</th> 
			  					<th>2017-2018</th>
			  				</tr>			  				
			  			</thead>
			  			<tbody>
			  				<tr>
			  					<td>$0 – $30,000</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS410']) ? '$'.number_format($netPriceTitleIv['NPIS410']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS411']) ? '$'.number_format($netPriceTitleIv['NPIS411']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS412']) ? '$'.number_format($netPriceTitleIv['NPIS412']) : "--";
			  						?>
			  					</td>			  					
			  				</tr>
			  				<tr>
			  					<td>$30,001 – $48,000</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS420']) ? '$'.number_format($netPriceTitleIv['NPIS420']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS421']) ? '$'.number_format($netPriceTitleIv['NPIS421']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS422']) ? '$'.number_format($netPriceTitleIv['NPIS422']) : "--";
			  						?>
			  					</td>	
			  				</tr>
			  				<tr>
			  					<td>$48,001 – $75,000</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS430']) ? '$'.number_format($netPriceTitleIv['NPIS430']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS431']) ? '$'.number_format($netPriceTitleIv['NPIS431']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS432']) ? '$'.number_format($netPriceTitleIv['NPIS432']) : "--";
			  						?>
			  					</td>	
			  				</tr>

			  				<tr>
			  					<td>$75,001 – $110,000</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS440']) ? '$'.number_format($netPriceTitleIv['NPIS440']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS441']) ? '$'.number_format($netPriceTitleIv['NPIS441']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS442']) ? '$'.number_format($netPriceTitleIv['NPIS442']) : "--";
			  						?>
			  					</td>	
			  				</tr>
			  				<tr>
			  					<td>$110,001 and more</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS450']) ? '$'.number_format($netPriceTitleIv['NPIS450']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS451']) ? '$'.number_format($netPriceTitleIv['NPIS451']) : "--";
			  						?>
			  					</td>
			  					<td>
			  						<?php 
			  						echo ($netPriceTitleIv['NPIS452']) ? '$'.number_format($netPriceTitleIv['NPIS452']) : "--";
			  						?>
			  					</td>	
			  				</tr>			  				
			  			</tbody>
			  		</table>
			  	<?php endif; ?> 

			  	<?php $NPRICURL =  trim($clgInfo['NPRICURL']);
			  	if(!empty($NPRICURL)): ?>
			  		<strong class="tablename">NET PRICE CALCULATOR</strong>
				  	<p>An institution’s net price calculator allows current and prospective students, families, and other consumers to estimate the net price of attending that institution for a particular student.</p>
				  	
				  	<a href="<?php echo addhttp($clgInfo['NPRICURL']); ?>" target="_blank">
				  		<button class="btn calculator">Visit this institution's <strong>net price calculator </strong> <i class="fa fa-chevron-circle-right" style="color:#5bc0de"></i> </button>				  	
					  	<?php echo $clgInfo['NPRICURL']; ?>
					</a>
			  	<?php endif; ?>

			  	

			</div>
		</div>
	
	</div>
</div>
<?php 
function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
?>
