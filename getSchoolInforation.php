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

 <div class="College-Search-tb">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link  modal-nav-link active modal-nav-link-active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                      <a class="nav-item nav-link modal-nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> General Information</a>
                      <a class="nav-item nav-link modal-nav-link " id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tuition, Fees, Expenses </a>
                      <a class="nav-item nav-link modal-nav-link " id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Financial Aid</a>
                      <a class="nav-item nav-link modal-nav-link " id="nav-about-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-about" aria-selected="false">Net Price</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade  active in" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class=" detailOn  default">
                     	<h3><?php echo $clgInfo['INSTNM']; ?></h3>
			<p><?php echo $clgInfo['ADDR'].', '. $clgInfo['CITY'].', '.$clgInfo['STABBR'].' '.$clgInfo['ZIP'];  ?></p>
		<div class="col-md-8 col-sm-12 part-1-info">
		
			
		 <table class="bottom-tble">
				<thead>
					<tr>
						<td><strong>Telephone Number:</strong> </td>
						<td><span><?php echo $clgInfo['GENTELE']; ?></span></td>
					</tr>
					<tr>
						<td><strong>Website:</strong></td>
						<td><span><?php echo strtolower($clgInfo['WEBADDR']); ?></span></td>
					</tr>
					<tr>
						<td><strong>Type: </strong></td>
						<td><span><?php echo $clgType['valueLabel']; ?></span></td>
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
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div class="detailOn table-responsive">						
				<table class="list-Admissions">
				  	<tbody>
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
				  	<tr>
				  		<th>Mission Statement</th>
				  		<td><?php 
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
						</td>
				  	</tr>			  	

				</tbody></table>
				
				<div class="otherDetail collegeotherDetail">
					<div class="row">
					<div class="col-md-6 col-sm-12">
						
						<div class="inner-content">
							<div class="content">
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
						</div>
						
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="inner-content">
							<?php 
								if(!empty($classification)){							
									echo '<div class="content">';
									echo "<h4>Carnegie Classification</h4>";
									foreach ($classification as $key => $value) {
										echo $value. "<br />";
									}
									echo '</div>';
								}
								?>
								
							<?php 
							if(!empty($religiousAffi)){
								echo '<div class="content">';
								echo "<h4>Religious Affiliation</h4>";
								foreach ($religiousAffi as $key => $value) {
									echo $value. "<br />";
								}
								echo '</div>';
							}
							?>
							
							<?php 
							if(!empty($disabilityServices)){
								echo '<div class="content">';
								echo "<h4>Undergraduate students enrolled who are formally registered with office of disability services</h4>";
								echo $disabilityServices;
								echo '</div>';
							}
							?>

							<?php 
							// Other Characteristics
							if(!empty($otherChar)){
								echo '<div class="content">';
								echo "<h4>Other Characteristics</h4>";
								echo $otherChar;
								echo '</div>';
							}
							?>
						
						
					<!--<div class="content">
						<h4>Credit Accepted</h4>
						Dual credit<br>Advanced placement (AP) credits<br>	
						</div>
-->
						</div>			
					</div>	
					</div>				
				</div>
				<div class="otherDetail bottom-tble table-responsive">
					<table style="width: 100%;">
						<tbody><tr>
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
							<td>
								<?php
									if(!empty($facultyAss['Instructional_full_time'])){ 
										echo $facultyAss['Instructional_full_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
							<td>
								<?php
									if(!empty($facultyAss['Instructional_part_time'])){ 
										echo $facultyAss['Instructional_part_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Research and public service</td>
							<td>
								<?php							
									if(!empty($facultyAss['research_full_time'])){ 
										echo $facultyAss['research_full_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
							<td>
								<?php
									if(!empty($facultyAss['research_part_time'])){ 
										echo $facultyAss['research_part_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>							
						</tr>
						<?php if(!empty($graduateAss)){ ?>
						<tr>
							<td>Total graduate assistants</td>
							<td>
								<?php 
								if(isset($graduateAss['totalGraduateFull'])){
									echo $graduateAss['totalGraduateFull'];
								}
								?>									
							</td>
							<td>
								<?php 
								if(isset($graduateAss['totalGraduatePart'])){
									echo $graduateAss['totalGraduatePart'] ;
								}
								?>	
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Instructional</td>
							<td>
								<?php							
									if(!empty($graduateAss['graduateInst_full_time'])){ 
										echo $graduateAss['graduateInst_full_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
							<td>
								<?php							
									if(!empty($graduateAss['graduateInst_part_time'])){ 
										echo $graduateAss['graduateInst_part_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
						</tr>
						<tr>
							<td style="padding-left:16px">Research and public service</td>
							<td>
								<?php							
									if(!empty($graduateAss['graduateResh_full_time'])){ 
										echo $graduateAss['graduateResh_full_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
							<td>
								<?php							
									if(!empty($graduateAss['graduateResh_part_time'])){ 
										echo $graduateAss['graduateResh_part_time'];
									}else{
										echo 0;
									} 
								?>									
							</td>
						</tr>	
						<?php } ?>				
					</tbody></table>
				</div>
			</div>
                    </div>
				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
				<div class="detailOn">
				<h3 class="tablename">Estimated Expenses for Full-time Beginning Undergraduate Students</h3>
			  	<ul style="list-style: disc;"><li>Beginning students are those who are entering postsecondary education for the first time.</li></ul>
			  	<div class="table-responsive">
			  	<table class="bottom-tble">
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
					<?php if(!empty($studentExp)){ ?>
				  			<tr class="sub-row">
					  			<td colspan="5">Tuition and fees</td>
					  		</tr>
							<?php if(!empty($studentExp['GTustionFees']['inState'])){ 
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
					  		<?php } ?>
							<?php $outOfState = $studentExp['GTustionFees']['outOfState'];
								if(!empty($outOfState)){ 
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
							<?php } ?>
							<?php $booksSupplies = $studentExp['GTustionFees']['booksSupplies'];
								if(!empty($booksSupplies)){ 
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
							<?php } ?>					  		
				  		<?php } ?>
				  		<!-- Living arrangement	 -->
						<?php if(!empty($livingArrangement)){ ?>
				  			<tr class="sub-row">
						  		<td colspan="5">Living arrangement</td>
						  	</tr>
							<?php 
						  		$onCampus = $livingArrangement['onCampus']['roomBoard'];
						  		if(!empty($onCampus)){
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
								<?php } ?>
					  			<?php 
									$onCampusOther = $livingArrangement['onCampus']['other'];
									if(!empty($onCampusOther)){
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
								<?php } ?>
								<?php 
									$offCampus = $livingArrangement['offCampus']['roomBoard'];
									if(!empty($offCampus)){

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
					  			<?php } ?>
					  			<?php 
						  		$offCampusOther = $livingArrangement['offCampus']['other'];
						  		if(!empty($offCampusOther)){ 
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
								<?php } ?>
					  		<!-- Off Campus with Family -->
								<?php 
						  		$offCampusFamily = $livingArrangement['offCampusFamily']['other'];
						  		if(!empty($offCampusFamily)){ 
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
								<?php } ?>

				  		<?php } ?>	
					  			</tbody>			  	
			  	</table>
				  			
                          <table class="bottom-tble">
                          	</tbody>	

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
					  			$22,886 

					  		</td>
					  		<td>
					  			$22,416					  			
					  		</td>
					  		<td>
					  			$23,462					  		</td>
					  		<td>
					  			4.67%					  		</td>
					  	</tr> 
					  	<tr class="lavelIndend">
					  		<td>Off Campus with Family</td>	
					  		<td>
					  			$14,056 
					  		</td>
					  		<td>
					  			$14,037					  			
					  		</td>
					  		<td>
					  			$14,334					  		</td>

					  		<td>
					  			2.12%					  		</td>
					  	</tr>	
					  	<tr class="sub-row">
					  		<td colspan="5">Out-of-state</td>					  		
					  	</tr>
					  	<tr class="lavelIndend">
					  		<td>On Campus</td>
					  		<td>
					  			$31,016 
					  		</td>
					  		<td>
					  			$31,436 
					  		</td>

					  		<td>
					  			$32,072 
					  		</td>

					  		<td>
					  			2.02%					  		</td>
					  	</tr>	

					  	<tr class="lavelIndend">
					  		<td>Off Campus</td>
					  		<td>
					  			$31,016 
					  		</td>
					  		<td>
					  			$30,795 
					  		</td>

					  		<td>
					  			$32,072 
					  		</td>

					  		<td>
					  			4.15%					  		</td>
					  	</tr>

					  	<!-- Off Campus with Family -->
					  	<tr class="lavelIndend">
					  		<td>Off Campus with Family</td>
					  		<td>
					  			$22,186 
					  		</td>
					  		<td>
					  			$22,416 
					  		</td>

					  		<td>
					  			$22,944 
					  		</td>
					  		<td>
					  			2.36%					  		</td>
					  	</tr>
					  
				  	</tbody>			  	
			  	</table>
			  				  	
			  	<table class="bottom-tble">
			  		<thead>
			  			<tr>
			  				<th>AVERAGE GRADUATE STUDENT TUITION AND FEES FOR ACADEMIC YEAR</th>
			  				<th>2018-2019</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<tr>
			  				<td>In-state tuition</td>
			  				<td>$10,128</td>
			  			</tr>
			  			<tr>
			  				<td>In-state fees</td>
			  				<td>$1,134</td>
			  			</tr>
			  			<tr>
			  				<td>Out-of-state tuition</td>
			  				<td>$20,160</td>
			  			</tr>
			  			<tr>
			  				<td>Out-of-state fees</td>
			  				<td>$1,134</td>
			  			</tr>			  			
			  		</tbody>
			  	</table>
			  			<h3>ALTERNATIVE TUITION PLANS</h3>
			  	
			  				  		<table class="bottom-tble">
			  			<thead>
			  				<tr>
			  					
			  				
			  					<th>TYPE OF PLAN</th>
			  					<th>OFFERED</th>
			  				</tr>		  				
			  			</thead>
			  			<tbody>
				  			<tr>
				  				<td>Tuition guarantee plan</td>
				  				<td> </td>
				  			</tr>
				  			<tr>
				  				<td>Prepaid tuition plan</td>
				  				<td>
				  									  				</td>
				  			</tr>
				  			<tr>
				  				<td>Tuition payment plan</td>
				  				<td>
				  					X				  				</td>
				  			</tr>
				  			<tr>
				  				<td>Other alternative tuition plan</td>
				  				<td>
				  									  				</td>
				  			</tr>			  				
			  			</tbody>			  			
			  		</table>
			  	</div>
			  				</div>.
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <div class="detailOn"  style="">
				<h3 class="tablename">UNDERGRADUATE STUDENT FINANCIAL AID, 2017-2018</h3>
				<h3>Full-time Beginning Undergraduate Students</h3>		  	
			  <ul style="list-style: disc;">
			    <li>Beginning students are those who are entering postsecondary education for the first time.</li>			    
			  </ul>
			  <div class="table-responsive">
				<table class="bottom-tble">
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
				  				1,172				  			</td>
				  			<td>
				  				91%				  			</td>
				  			<td> -- </td>
				  			<td>--</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>Grant or scholarship aid</td>
				  			<td>
				  				1,172				  			</td>
				  			<td>
				  				91%			  				
				  			</td>
				  			<td> 
				  				$12,264,163				  			</td>
				  			<td>
				  				$10,464				  			</td>
				  		</tr>
				  		<tr class="lavel2Indend">
				  			<td>Federal grants</td>
				  			<td>
				  				909				  			</td>
				  			<td>
				  				71%				  			</td>
				  			<td>
				  				$4,630,954				  			</td>
				  			<td>
				  				$5,095				  			</td>
				  		</tr>

				  		<tr class="lavel2Indend">
							<td>Pell grants</td>
							<td>
				  				909				  			</td>
				  			<td>
				  				71%				  			</td>
				  			<td>
				  				$4,505,654				  			</td>
				  			<td>
				  				$4,957				  			</td>
				  		</tr>

				  		<tr class="lavel2Indend">
							<td>Other federal grants</td>
							<td>
				  				61				  			</td>
				  			<td>
				  				5%				  			</td>
				  			<td>
				  				$125,300				  			</td>
				  			<td>
				  				$2,054				  			</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>State/local government grant or scholarships</td>
				  			<td>
				  				62				  			</td>
				  			<td>
				  				5%				  			</td>
				  			<td>
				  				$451,452				  			</td>
				  			<td>
				  				$7,281				  			</td>
				  		</tr>

				  		<tr class="lavelIndend">
				  			<td>Institutional grants or scholarships</td>
				  			<td>
				  				870				  			</td>
				  			<td>
				  				68%				  			</td>
				  			<td>
				  				$7,181,757				  			</td>
				  			<td>
				  				$8,255				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Student loan aid</td>
				  			<td>
				  				922				  			</td>
				  			<td>
				  				72%				  			</td>
				  			<td>
				  				$5,925,868				  			</td>
				  			<td>
				  				$6,427				  			</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>Federal student loans</td>
				  			<td>
				  				920				  			</td>
				  			<td>
				  				71%				  			</td>
				  			<td>
				  				$5,776,179				  			</td>
				  			<td>
				  				$6,278				  			</td>
				  		</tr>
				  		<tr class="lavelIndend">
				  			<td>Other student loans</td>
				  			<td>
				  				15				  			</td>
				  			<td>
				  				1%				  			</td>
				  			<td>
				  				$149,689				  			</td>
				  			<td>
				  				$9,979				  			</td>
				  		</tr>
				  	</tbody>
				</table>
			</div>
				<div class="note">
					<ul>
						<li style="list-style:disc;"><sup>1</sup> Includes students receiving Federal work study aid and aid from other sources not listed above.</li>
						<li style="list-style:disc;"><span style="font-style:italic">The institution does not participate in Federal Student Loan Programs.</span>
						</li>
					</ul>
				</div>


				<p><strong> All Undergraduate Students</strong></p>
				<div class="table-responsive">
			<table class="bottom-tble">
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
				  				4,401				  			</td>
				  			<td>
				  				$42,706,297				  			</td>
				  			<td>
				  				$9,704				  			</td>
						</tr> 
						<tr>
							<td>Pell grants</td>
							<td>
				  				3,561				  			</td>
				  			<td>
				  				$17,821,852				  			</td>
				  			<td>
				  				$5,005				  			</td>				  			
						</tr>

						<tr>
							<td>Federal student loans</td>
							<td>
				  				3,781				  			</td>
				  			<td>
				  				$26,570,635				  			</td>
				  			<td>
				  				$7,027				  			</td>	
						</tr>
					</tbody>
				</table>
			</div>
				<div class="note">
					<ul>						
						<li style="list-style:disc;"><sup>1</sup> Grant or scholarship aid includes aid received, from the federal government, state or local government, the institution, and other sources known by the institution.</li>	
						<li style="list-style:disc;">For more information on Student Financial Assistance Programs or to apply for financial aid via the web, visit <a href="http://studentaid.ed.gov" target="_blank">Federal Student Aid</a>.</li>	
					</ul>
				</div>



			</div>
                    </div>
                     <div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-about-tab">
                     <div class="detailOn"  style="">
				<h3 class="tablename">AVERAGE NET PRICE FOR FULL-TIME BEGINNING STUDENTS</h3>
			  	
			  				  		<p>Full-time beginning undergraduate students who paid the in-state or in-district tuition rate and were awarded grant or scholarship aid from federal, state or local governments, or the institution.</p>
			  <div class="table-responsive">
			  <table class="bottom-tble">
				  		<thead>
				  			<tr>
				  				<th></th> <th>2015-2016</th> <th>2016-2017</th> <th>2017-2018</th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<tr>
				  				<td>Average net price</td>
				  				<td>
				  					$15,547				  				</td>
				  				<td>
				  					$15,812				  				</td>
				  				<td>
				  					$13,956				  				</td>
				  			</tr>				  			
				  		</tbody>
				  	</table>
			  	
			  				  		<p>Full-time beginning undergraduate students who paid the in-state or in-district tuition rate and were awarded Title IV aid by income.</p>
			  	<table class="bottom-tble">
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
			  						$15,043			  					</td>
			  					<td>
			  						$14,719			  					</td>
			  					<td>
			  						$13,893			  					</td>			  					
			  				</tr>
			  				<tr>
			  					<td>$30,001 – $48,000</td>
			  					<td>
			  						$15,491			  					</td>
			  					<td>
			  						$14,447			  					</td>
			  					<td>
			  						$13,976			  					</td>	
			  				</tr>
			  				<tr>
			  					<td>$48,001 – $75,000</td>
			  					<td>
			  						$17,335			  					</td>
			  					<td>
			  						$16,746			  					</td>
			  					<td>
			  						$15,995			  					</td>	
			  				</tr>

			  				<tr>
			  					<td>$75,001 – $110,000</td>
			  					<td>
			  						$19,562			  					</td>
			  					<td>
			  						$17,127			  					</td>
			  					<td>
			  						$18,957			  					</td>	
			  				</tr>
			  				<tr>
			  					<td>$110,001 and more</td>
			  					<td>
			  						$18,865			  					</td>
			  					<td>
			  						$18,956			  					</td>
			  					<td>
			  						$17,140			  					</td>	
			  				</tr>			  				
			  			</tbody>
			  		</table>
			  	 </div>

			  				  		<h3 class="tablename">NET PRICE CALCULATOR</h3>
				  	<p>An institution’s net price calculator allows current and prospective students, families, and other consumers to estimate the net price of attending that institution for a particular student.</p>
				  	
				  	<a href="https://galileo.aamu.edu/NetPriceCalculator/npcalc.htm" target="_blank">
				  		<button class="btn calculator">Visit this institution's <strong>net price calculator </strong> <i class="fa fa-chevron-circle-right" style="color:#5bc0de"></i> </button>				  	
					  	https://galileo.aamu.edu/NetPriceCalculator/npcalc.htm					</a>
			  	
			  	

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
<script>
	 $(".modal-nav-link").click(function () {
$(".modal-nav-link").removeClass("modal-nav-link-active");
    $(this).addClass("modal-nav-link-active");   
    });
</script>