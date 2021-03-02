<?php 
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
include 'collegenavigator/clgnav-header.php';
include 'schoolInfoClass.php';
include("collegenavigator/includes/fusioncharts.php");
extract($_REQUEST);
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
// ENROLLMENT
$enrollment = $obj->getEnrollment($unitid);
// UNDERGRADUATE RACE/ETHNICITY
$getRaceEthnicity = $obj->getUnderRaceEthnicity($unitid);
// UNDERGRADUATE STUDENT AGE
$undergraduateAge = $obj->getUndergraduateAge($unitid);
// UNDERGRADUATE STUDENT RESIDENCE
$undergraduateResidence = $obj->getundergraduateResidence($unitid);
// UNDERGRADUATE DISTANCE EDUCATION STATUS
$underPerDistEdu = $obj->getUnderPerDistEdu($unitid);
// GRADUATE DISTANCE EDUCATION STATUS
$grdPerDistEdu = $obj->getGrdPerDistEdu($unitid);
$gradStatus = $obj->getGradStatus($unitid); // GRADUATE ATTENDANCE STATUS
$undergraduateGender = $obj->getUndergraduateGender($unitid);  //UNDERGRADUATE STUDENT GENDER
$undergraduateAttendence = $obj->getUndergraduateAttendence($unitid);
$admissionFall = $obj->getAdmissionFall($unitid);  //ADMISSIONS
$admConsideration = $obj->getAdmConsideration($unitid);  //ADMISSIONS CONSIDERATIONS
$retentionRate = $obj->getRetentionRate($unitid);  // RETENTION AND GRADUATION RATES
$overallRate = $obj->getOverallRate($unitid); // OVERALL GRADUATION RATE AND TRANSFER-OUT RATE
// BACHELOR'S DEGREE GRADUATION RATES RATE 
$bachelorGrdRate = $obj->getBachelorGrdRate($unitid); 
$bachelorGrdRateRace = $obj->getBachelorGrdRateRace($unitid); 
// OUTCOME MEASURES
$outcomeMeasff = $obj->getOutcomeMeasff($unitid); 
$outcomeMeaspf = $obj->getOutcomeMeaspf($unitid); 
$outcomeMeasfnf = $obj->getOutcomeMeasfnf($unitid);
$outcomeMeaspnf = $obj->getOutcomeMeaspnf($unitid);
// PROGRAMS/MAJORS
$programMajor = $obj->getProgramMajor($unitid);
// PROGRAMS/MAJORS
$servicemembers = $obj->getServicemembers($unitid);
$servicemembersA = $obj->getServicemembersA($unitid);
$varsityAthleticTeam = $obj->getVarsityAthleticTeam($unitid);
$shortInfoStu = $obj->shortInfoStudent($unitid);
$UnderDegNonDegree = $obj->getUnderDegNon($unitid);
?>
<div class="container-fluid">
  <div class="row main-container">
    <div class="col-md-3 col-sm-3 sidebar-section">
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'snapshot')" id="btn_overview">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
          Snapshot         
        </button>
        
        <button class="tablinks" onclick="openCity(event, 'tuitionCosts')" id="btn_tuitionCosts">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
          Tuition & Costs
          
        </button>
        <button class="tablinks" onclick="openCity(event, 'financialAid')" id="btn_financialAid">
         <i class="fas fa-coins" aria-hidden="true"></i>
          Financial Aid
         
        </button>
        <button class="tablinks" onclick="openCity(event, 'netPrice_tab')" id="btn_netPrice_tab">
          <i class="fa fa-check-circle" aria-hidden="true"></i>
          Net Price          
        </button>
        <button class="tablinks" onclick="openCity(event, 'enrollment')" id="btn_enrollment">
          Enrollment
          <i class="fa fa-check-circle" aria-hidden="true">
          </i>
        </button>
        <button class="tablinks" onclick="openCity(event, 'admissionsSection')" id="btn_admissionsSection">
          <i class="fas fa-school" aria-hidden="true"></i>
          Admissions
          
        </button>
        <button class="tablinks" onclick="openCity(event, 'retentionRates')" id="btn_retentionRates">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
          Retention & Graduation Rate
          
        </button>
        <button class="tablinks" onclick="openCity(event, 'outcomeMeasuresSection')" id="btn_outcomeMeasuresSection">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
          Outcome Measures
          
        </button>
        <button class="tablinks" onclick="openCity(event, 'programsMajor')" id="btn_programsMajor">
          <i class="fa fa-check-circle" aria-hidden="true"></i>
          Programs/Majors       
          
        </button>
        <button class="tablinks" onclick="openCity(event, 'servicememersVet')" id="btn_servicememersVet">
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           Servicemembers & Veterans     
          
        </button>
        <button class="tablinks" onclick="openCity(event, 'athleticTeam')" id="btn_athleticTeam">
          <i class="fa fa-check-circle" aria-hidden="true"></i>
          Varsity Athletic Teams        
          
        </button>
      </div>
    </div>
    <div class=" col-md-9 col-sm-9 collegeinfo">
      <div id="snapshot" class="tabcontent">  
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <div class="col-md-12 breadCrumg">
            <ul style="">
            <li>
                <a href="#generaInfo_">General Information
                </a> 
              </li>
              <li>
                <a href="#quickFacts">Highlights
                </a> 
              </li>
              
            </ul>
          </div>
        </div>

        <div class="col-md-12"></div>


        <div class="col-md-12 school-profile" id="generaInfo_">
          <h3  class="quickFacts_anchor">General Information
          </h3>
          <!-- General Info -->

          <div class="part-1-info">
          <table class="table">
            <thead> 
        <tr>
                <td><strong>Address:</strong></td>
                <td><span><?php echo $clgInfo['ADDR'].', '. $clgInfo['CITY'].', '.$clgInfo['STABBR'].' '.$clgInfo['ZIP'];  ?></span></td>
              </tr>       
        
              <tr>
                  <td><strong>Phone:</strong></td>
                <td> 
                    <?php 
                    $phone = $clgInfo['GENTELE'];
                    if(!empty($phone)):
                      $phone = format_phone('us', $phone);
            echo $phone;
                    else:
                      echo "--";

                    endif;
                    
                    ?>                  
                 
                </td>
              </tr>         
              <tr>
                <td>
                  <strong>Website:
                  </strong>
                </td>
                <td>
                  <span>
                    <?php echo $clgInfo['WEBADDR']; ?> 
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Institution Type: 
                  </strong>
                </td>
                <td>
                  <span>
                    <?php echo $clgType['valueLabel']; ?> 
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Awards offered: 
                  </strong>
                </td>
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
                <td>
                  <strong>Campus setting:
                  </strong>
                </td>
                <td>
                  <?php echo $campusSetting['valueLabel']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Campus housing: 
                  </strong>
                </td>
                <td>
                  <?php echo $campusHousing; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Student population:
                  </strong>
                </td>
                <td>
                  <?php echo $stuPopulation['EFTOTLT']; ?>
                </td>
              </tr>
              <?php if($facultyRation['STUFACR']): ?>
              <tr>
                <td>
                  <strong>Student-to-faculty ratio:
                  </strong>
                </td>
                <td>
                  <?php echo $facultyRation['STUFACR']; ?>  to 1
                </td>
              </tr>
              <?php endif; ?>
              <tr>
                <td colspan="2" style="background: white;">
                  <div class="map-section">
                    <a href="https://maps.google.com/?q=<?php echo $address;?>" target="_blank">
                      <img src="images/google-maker.png" class="google_maker">
                      <br />View on Google Maps
                    </a>
                  </div>
                </td>           
              </tr>
            </thead>  
          </table>
        </div>
         
          <div class="col-sm-12 otherDetail secion2">
            <div class="col-md-6 col-sm-12 inner-part">
              <strong>Special Learning Opportunities
              </strong>
              <br />
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
            <div class="col-md-6 col-sm-12 inner-part second">
              <?php 
        if(!empty($classification)):
        echo "<strong>Carnegie Classification</strong><br />";
        foreach ($classification as $key => $value) {
        echo $value. "<br />";
        }
        endif;
        ?>
              <br />
              <strong>Religious Affiliation
              </strong>
              <br />
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
          
        </div>










        <div class="col-md-12 school-profile" id="quickFacts">
          <h3 class="quickFacts_anchor">Highlights
          </h3>
          <div class="">
            <div class="col-sm-6 outer-box">
              <div class="inner-box full-height">
                <div class="header-box">
                  <h3>
                    <span class="Feature"> 
                    <?php echo $status = (empty($stuPopulation['EFTOTLT'])) ? "N/A" : number_format($stuPopulation['EFTOTLT']); ?>
                    </span>
                    <span class="labelText">Students
                    </span>
                  </h3>
                </div>
                <div class="body-text">
                  <ul>
                    <li>
                      <span>
                        <?php
            echo $status = (empty($shortInfoStu['EFAGE05'])) ? "N/A" : number_format($shortInfoStu['EFAGE05']);
            ?>
                      </span>full time
                    </li>
                    <li>
                      <span>
                        <?php
            echo $status = (empty($shortInfoStu['EFAGE06'])) ? "N/A" : number_format($shortInfoStu['EFAGE06']);
            ?>                    
                                  </span>part time
                    </li>
                    <li>
                      <span>
                        <?php
            echo $status = (empty($shortInfoStu['EFAGE01'])) ? "N/A" : number_format($shortInfoStu['EFAGE01']);
            ?>  
                      </span>men full time
                    </li>
                    <li>
                      <span>
                        <?php
            echo $status = (empty($shortInfoStu['EFAGE02'])) ? "N/A" : number_format($shortInfoStu['EFAGE02']);
            ?>
                      </span>women full time
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6 outer-box">
              <div class="inner-box full-height">
                <div class="header-box">
                  <h3>
                    <span class="Feature">
                      <?php 
            echo $status = (empty($admissionFall['DVADM01'])) ? "N/A" : number_format($admissionFall['DVADM01']).'%';
            ?>
                    </span>
                    <span class="labelText">Admitted
                    </span>
                  </h3>
                </div>
                <div class="body-text">
                  <ul>
                    <li>
                      <span>
                        <?php 
            echo $status = (empty($admissionFall['APPLCN'])) ? "N/A" : number_format($admissionFall['APPLCN']);
            ?>  
                      </span>applied
                    </li>
                    <li>
                      <span>
                        <?php 
            echo $status = (empty($admissionFall['ADMSSN'])) ? "N/A" : number_format($admissionFall['ADMSSN']);
            ?>
                      </span>admitted
                    </li>
                    <li>
                      <span>
                        <?php
            echo $status = (empty($admissionFall['ENRLT'])) ? "N/A" : number_format($admissionFall['ENRLT']);
            ?>                  
                      </span>enrolled
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="col-sm-6 outer-box">
              <div class="inner-box full-height">
                <div class="header-box">
                  <?php 
          $undergraduate = $enrollment['EFUG'];
          $graduate = $enrollment['EFGRAD'];
          $Transfer_in = $enrollment['EFUGTRN'];    
          ?>
                  <h3>
                    <span class="Feature">
                      <?php 
            echo $un = (empty($undergraduate)) ? "N/A" : number_format($undergraduate);
            ?>
                    </span>
                    <span class="labelText">Undergraduates
                    </span>
                  </h3>
                </div>
                <div class="body-text">
                  <ul>
                    <li>
                      <span>
                        <?php 
            echo $gr = (empty($graduate)) ? "N/A" : number_format($graduate);
            ?>
                      </span>Graduates
                    </li>
                    <li>
                      <span>
                        <?php 
            echo $gr = (empty($UnderDegNonDegree['EFTOTLT'])) ? "N/A" : number_format($UnderDegNonDegree['EFTOTLT']);
              ?>
                      </span>Non-Degree
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6 outer-box">
              <div class="inner-box full-height">
                <div class="header-box">
                  <h3>
                    <span class="Feature"> 
                      <?php
            echo $EFTOTLT = (empty($studentExp['GTustionFees']['inState']['2018-2019'])) ? "N/A" : number_format($studentExp['GTustionFees']['inState']['2018-2019']);?>
                    </span>
                    <span class="labelText">Tuition/Year
                    </span>
                  </h3>
                </div>
                <div class="body-text">
                  <ul>
                    <li>
                      <span>
                        <?php 
            echo $inState = (empty($studentExp['GTustionFees']['inState']['2018-2019'])) ? "N/A" : number_format($studentExp['GTustionFees']['inState']['2018-2019']);
            ?>
                      </span>in state
                    </li>
                    <li>
                      <span>
                        <?php 
            echo $status = (empty($livingArrangement['onCampus']['roomBoard']['2018-2019'])) ? "N/A" : number_format($livingArrangement['onCampus']['roomBoard']['2018-2019']); ?>
                      </span>room & board
                    </li>
                    <li>
                      <span>
                        <?php 
            echo $status = (empty($studentExp['GTustionFees']['booksSupplies']['2018-2019'])) ? "N/A" : number_format($studentExp['GTustionFees']['booksSupplies']['2018-2019']); ?>
                      </span>books and supplies
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="otherDetail section3">
            <table style="width: 100%;" class="table-striped">
              <tr>
                <th>FACULTY AND GRADUATE ASSISTANTS BY PRIMARY FUNCTION 
                </th>
                <th>FULL TIME
                </th>
                <th>PART TIME
                </th>
              </tr>
              <tr>
                <td>Total faculty
                </td>
                <td>
                  <?php 
          if(!empty($facultyAss['total_full_time'])){ 
          echo $facultyAss['total_full_time'];
          }else{
          echo 0;
          }?>               
                </td>
                <td>
                  <?php 
          if(!empty($facultyAss['total_part_time'])){ 
          echo $facultyAss['total_part_time'];
          }else{
          echo 0;
          }?>
                </td>
              </tr>
              <tr>
                <td style="padding-left:16px">Instructional
                </td>
                <td>
                  <?php
          if(!empty($facultyAss['Instructional_full_time'])){ 
          echo $facultyAss['Instructional_full_time'];
          }else{
          echo 0;
          } ?>                  
                </td>
                <td>
                  <?php
          if(!empty($facultyAss['Instructional_part_time'])){ 
          echo $facultyAss['Instructional_part_time'];
          }else{
          echo 0;
          } ?>                  
                </td>
              </tr>
              <tr>
                <td style="padding-left:16px">Research and public service
                </td>
                <td>
                  <?php             
          if(!empty($facultyAss['research_full_time'])){ 
          echo $facultyAss['research_full_time'];
          }else{
          echo 0;
          } ?>                  
                </td>
                <td>
                  <?php
          if(!empty($facultyAss['research_part_time'])){ 
          echo $facultyAss['research_part_time'];
          }else{
          echo 0;
          } ?>                  
                </td>             
              </tr>
              <?php if(!empty($graduateAss)): ?>
              <tr>
                <td>Total graduate assistants
                </td>
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
                <td style="padding-left:16px">Instructional
                </td>
                <td>
                  <?php             
          if(!empty($graduateAss['graduateInst_full_time'])){ 
          echo $graduateAss['graduateInst_full_time'];
          }else{
          echo 0;
          } ?>                  
                          </td>
                          <td>
                            <?php             
          if(!empty($graduateAss['graduateInst_part_time'])){ 
          echo $graduateAss['graduateInst_part_time'];
          }else{
          echo 0;
          } ?>                  
                </td>
              </tr>
              <tr>
                <td style="padding-left:16px">Research and public service
                </td>
                <td>
                  <?php             
          if(!empty($graduateAss['graduateResh_full_time'])){ 
          echo $graduateAss['graduateResh_full_time'];
          }else{
          echo 0;
          } ?>                  
                          </td>
                          <td>
                            <?php             
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
        
        

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>


        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'tuitionCosts')" class="nextTab">Next: Tuition & Costs
          </button>
        </div>
      </div>
      <div id="tuitionCosts" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
        </div>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">TUITION, FEES, AND ESTIMATED STUDENT EXPENSES
          </h3>
          <strong class="tablename">Estimated Expenses for Full-time Beginning Undergraduate Students
          </strong>
          <ul style="list-style: disc;">
            <li>Beginning students are those who are entering postsecondary education for the first time.
            </li>
          </ul>
          <div class="response-div">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">Estimated expenses for academic year
                </th>
                <th scope="col">2016-2017
                </th>
                <th scope="col">2017-2018
                </th>
                <th scope="col">2018-2019
                </th>             
                <th scope="col">% change 2017-2018 to 2018-2019
                </th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($studentExp)): ?>
              <tr class="sub-row">
                <td colspan="5">Tuition and fees
                </td>
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
                <td>In-state
                </td>
                <td>
                  <?php echo '$'.number_format($inState['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($inState['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($inState['2018-2019']); ?>
                </td>
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
                <td>Out-of-state
                </td>
                <td>
                  <?php echo '$'.number_format($outOfState['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($outOfState['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($outOfState['2018-2019']); ?>
                </td>
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
                <td>Books and supplies
                </td>
                <td>
                  <?php echo '$'.number_format($booksSupplies['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($booksSupplies['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($booksSupplies['2018-2019']); ?>
                </td>
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
              <!-- Living arrangement  -->
              <?php if(!empty($livingArrangement)): ?>
              <tr class="sub-row">
                <td colspan="5">Living arrangement
                </td>
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
              <tr>
                <td colspan="5" class="odd-heading">On Campus
                </td>
              </tr>
              <tr class="lavelIndend">
                <td>Room and board
                </td>
                <td>
                  <?php echo '$'.number_format($onCampus['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($onCampus['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($onCampus['2018-2019']); ?>
                </td>
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
                <td>Other
                </td>
                <td>
                  <?php echo '$'.number_format($onCampusOther['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($onCampusOther['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($onCampusOther['2018-2019']); ?>
                </td>
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
              <tr>
                <td colspan="5" class="odd-heading">Off Campus
                </td>
              </tr>
              <tr class="lavelIndend">
                <td>Room and board
                </td>
                <td>
                  <?php echo '$'.number_format($offCampus['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($offCampus['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($offCampus['2018-2019']); ?>
                </td>
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
                <td>other
                </td>
                <td>
                  <?php echo '$'.number_format($offCampusOther['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($offCampusOther['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($offCampusOther['2018-2019']); ?>
                </td>
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
              <tr>
                <td colspan="5" class="odd-heading">Off Campus with Family
                </td>
              </tr>
              <tr class="lavelIndend">
                <td>other
                </td>
                <td>
                  <?php echo '$'.number_format($offCampusFamily['2016-2017']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($offCampusFamily['2017-2018']); ?>
                </td>
                <td>
                  <?php echo '$'.number_format($offCampusFamily['2018-2019']); ?>
                </td>
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
                <th>Total Expenses
                </th>
                <th>2016-2017
                </th>
                <th>2017-2018
                </th>
                <th>2018-2019
                </th>
                <th>% change 2017-2018 to 2018-2019
                </th>
              </tr> 
              <tr class="sub-row">
                <td colspan="5">In-state
                </td>
              </tr> 
              <tr class="lavelIndend">
                <td>On Campus
                </td> 
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
                    <td>Off Campus
                    </td> 
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
                    <td>Off Campus with Family
                    </td> 
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
                    <td colspan="5">Out-of-state
                    </td>               
                  </tr>
                  <tr class="lavelIndend">
                    <td>On Campus
                    </td>
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
                    <td>Off Campus
                    </td>
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
                <td>Off Campus with Family
                </td>
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
          </div>
        </div>
        <?php if(!empty($avgGrdFees)): ?>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">AVERAGE GRADUATE STUDENT TUITION AND FEES FOR ACADEMIC YEAR - 2018-2019
          </h3>
        </div>
        <div class="col-sm-12 part-1-info">         
          <table class="table">             
            <tbody>
              <tr>
                <td>In-state tuition
                </td>
                <td>$
                  <?php echo number_format($avgGrdFees['TUITION5']); ?>
                </td>
              </tr>
              <tr>
                <td>In-state fees
                </td>
                <td>$
                  <?php echo number_format($avgGrdFees['FEE1']); ?>
                </td>
              </tr>
              <tr>
                <td>Out-of-state tuition
                </td>
                <td>$
                  <?php echo number_format($avgGrdFees['TUITION7']); ?>
                </td>
              </tr>
              <tr>
                <td>Out-of-state fees
                </td>
                <td>$
                  <?php echo number_format($avgGrdFees['FEE7']); ?>
                </td>
              </tr>             
            </tbody>
          </table>
        </div>
        <?php endif; ?>
        <?php if(!empty($altTutionPlan)): ?>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">ALTERNATIVE TUITION PLANS
          </h3>
        </div>
        <div class="col-sm-12 part-1-info">       
          <table class="table">
            <thead>                   
              <tr>
                <th>TYPE OF PLAN
                </th>
                <th>OFFERED
                </th>
              </tr>             
            </thead>
            <tbody>
              <tr>
                <td>Tuition guarantee plan
                </td>
                <td> 
                  <?php 
          if($altTutionPlan['TUITPL1'] == 1):
          echo "X";
          endif;
          ?>
                </td>
              </tr>
              <tr>
                <td>Prepaid tuition plan
                </td>
                <td>
                  <?php 
          if($altTutionPlan['TUITPL2'] == 1):
          echo "X";
          endif;
          ?>
                </td>
              </tr>
              <tr>
                <td>Tuition payment plan
                </td>
                <td>
                  <?php 
            if($altTutionPlan['TUITPL3'] == 1):
            echo "X";
            endif;
            ?>
                </td>
              </tr>
              <tr>
                <td>Other alternative tuition plan
                </td>
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
        </div>  
        <?php endif; ?>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'financialAid')" class="nextTab">Next: Financial Aid</button>
        </div>  
      </div>
      <div id="financialAid" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <div class="col-md-12 breadCrumg">
            <ul style="">         
              <li>
                <a href="#fullTimeBeg">Full-time Beginning Undergraduate
                </a> 
              </li>
              <li>
                <a href="#allUnder">All Undergraduate Students
                </a> 
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">UNDERGRADUATE STUDENT FINANCIAL AID, 2017-2018
          </h3>

          <?php if(isset($clgInfo['FAIDURL']) && !empty($clgInfo['FAIDURL'])): ?>
          <p>
            <a href="<?php echo addhttp($clgInfo['FAIDURL']); ?>" target="_blank">
            <button class="btn calculator">Website Link              
              <i class="fa fa-chevron-circle-right" style="color:#5bc0de">
              </i>
            </button>           
            <?php echo $clgInfo['FAIDURL']; ?></a>
          </p>
        <?php endif; ?>
          

            
        </div>
        <div class="col-sm-12 detailOff" id="fullTimeBeg">      
          <p>
            <strong>Full-time Beginning Undergraduate Students
            </strong>
          </p>          
          <ul style="list-style: disc;">
            <li>Beginning students are those who are entering postsecondary education for the first time.
            </li>         
          </ul>
          <div class="response-div">
          <table class="table multisection">
            <thead>
              <tr>
                <th scope="col">Type of Aid
                </th>
                <th scope="col">Number receiving aid
                </th>
                <th scope="col">Percent receiving aid
                </th>
                <th scope="col">Total amount of aid received
                </th>
                <th scope="col">Average amount of aid received
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Any student financial aid 
                  <sup>1
                  </sup>
                </td>
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
                        <td> -- 
                        </td>
                        <td>--
                        </td>
                      </tr>
                      <tr class="lavelIndend">
                        <td>Grant or scholarship aid
                        </td>
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
                        <td>Federal grants
                        </td>
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
                        <td>Pell grants
                        </td>
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
                        <td>Other federal grants
                        </td>
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
                        <td>State/local government grant or scholarships
                        </td>
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
                        <td>Institutional grants or scholarships
                        </td>
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
                        <td>Student loan aid
                        </td>
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
                        <td>Federal student loans
                        </td>
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
                        <td>Other student loans
                        </td>
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
        </div>
          <div class="note">
            <ul>
              <li style="list-style:disc;">
                <sup>1
                </sup> Includes students receiving Federal work study aid and aid from other sources not listed above.
              </li>
              <li style="list-style:disc;">
                <span style="font-style:italic">The institution does not participate in Federal Student Loan Programs.
                </span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 detailOff" id="allUnder" style="clear:both;padding-top: 20px;">
          <p>
            <strong> All Undergraduate Students
            </strong>
          </p>
            <div class="response-div">
          <table class="table  table-striped">
            <thead>
              <tr>
                <th>TYPE OF AID
                </th>
                <th>NUMBER RECEIVING AID
                </th>
                <th>TOTAL AMOUNT OF AID RECEIVED
                </th>
                <th>AVERAGE AMOUNT OF AID RECEIVED
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Grant or scholarship aid
                  <sup>1
                  </sup>
                </td>
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
                <td>Pell grants
                </td>
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
                <td>Federal student loans
                </td>
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
        </div>
          <div class="note">
            <ul>            
              <li style="list-style:disc;">
                <sup>1
                </sup> Grant or scholarship aid includes aid received, from the federal government, state or local government, the institution, and other sources known by the institution.
              </li> 
              <li style="list-style:disc;">For more information on Student Financial Assistance Programs or to apply for financial aid via the web, visit 
                <a href="http://studentaid.ed.gov" target="_blank">Federal Student Aid
                </a>.
              </li> 
            </ul>
          </div>
        </div>


        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>

        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'netPrice_tab')" class="nextTab">Next: Net Price
          </button>
        </div>
      </div>
      <div id="netPrice_tab" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <!-- <div class="col-md-12 breadCrumg">
            <ul style="">         
              <li>
                <a href="#fullTimeBeg">Full-time Beginning Undergraduate
                </a> 
              </li>
              <li>
                <a href="#allUnder">All Undergraduate Students
                </a> 
              </li>
            </ul>
          </div> -->
        </div>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">AVERAGE NET PRICE FOR FULL-TIME BEGINNING STUDENTS
          </h3>
        </div>
        <div class="col-sm-12 detailOff">
          <strong class="tablename">AVERAGE NET PRICE FOR FULL-TIME BEGINNING STUDENTS
          </strong>

          <?php if(!empty($netPrice)): ?>
          <p>Full-time beginning undergraduate students who paid the in-state or in-district tuition rate and were awarded grant or scholarship aid from federal, state or local governments, or the institution.
          </p>
          <div class="response-div">
          <table class="table">
            <thead>
              <tr>
                <th>
                </th> 
                <th>2015-2016
                </th> 
                <th>2016-2017
                </th> 
                <th>2017-2018
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Average net price
                </td>
                <td>
                  <?php if(isset($netPrice['NPIST0']) && !empty($netPrice['NPIST0'])){ 
                    echo '$'.number_format($netPrice['NPIST0']);
                    }elseif (isset($netPrice['NPGRN0']) && !empty($netPrice['NPGRN0'])) {
                      echo '$'.number_format($netPrice['NPGRN0']);
                    }else {
                    echo "--";
                    } ?>
                </td>
                <td>
                  <?php if(isset($netPrice['NPIST1'])){ 
                    echo '$'.number_format($netPrice['NPIST1']);
                    }elseif (isset($netPrice['NPGRN1']) && !empty($netPrice['NPGRN1'])) {
                      echo '$'.number_format($netPrice['NPGRN1']);
                    }else {
                    echo "--";
                    } ?>
                </td>
                <td>
                  <?php if(isset($netPrice['NPIST2'])){ 
                    echo '$'.number_format($netPrice['NPIST2']);
                    }elseif (isset($netPrice['NPGRN2']) && !empty($netPrice['NPGRN2'])) {
                      echo '$'.number_format($netPrice['NPGRN2']);
                    }else {
                    echo "--";
                    } ?>
                                    
                </td>
              </tr>               
            </tbody>
          </table>
          </div>
          <?php endif; ?>  
          <p>
          </p>
          <?php if(!empty($netPriceTitleIv)): ?>
          <p>Full-time beginning undergraduate students who paid the in-state or in-district tuition rate and were awarded Title IV aid by income.
          </p>
          <div class="response-div">
          <table class="table">
            <thead>
              <tr>
                <th>AVERAGE NET PRICE BY INCOME
                </th>
                <th>2015-2016
                </th> 
                <th>2016-2017
                </th> 
                <th>2017-2018
                </th>
              </tr>               
            </thead>
            <tbody>
              <tr>
                <td>$0 – $30,000
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS410'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS410']);

                  }elseif (!empty($netPriceTitleIv['NPT410'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT410']);
                  }else{
                    echo "--";
                  }
                    // echo ($netPriceTitleIv['NPIS410']) ? '$'.number_format($netPriceTitleIv['NPIS410']) : "--";
                    ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS411'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS411']);

                  }elseif (!empty($netPriceTitleIv['NPT411'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT411']);
                  }else{
                    echo "--";
                  }

                  //echo ($netPriceTitleIv['NPIS411']) ? '$'.number_format($netPriceTitleIv['NPIS411']) : "--";
                ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS412'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS412']);

                  }elseif (!empty($netPriceTitleIv['NPT412'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT412']);
                  }else{
                    echo "--";
                  }
                  // echo ($netPriceTitleIv['NPIS412']) ? '$'.number_format($netPriceTitleIv['NPIS412']) : "--";?>
                </td>                 
              </tr>
              <tr>
                <td>$30,001 – $48,000
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS420'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS420']);

                  }elseif (!empty($netPriceTitleIv['NPT420'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT420']);
                  }else{
                    echo "--";
                  }



                  // echo ($netPriceTitleIv['NPIS420']) ? '$'.number_format($netPriceTitleIv['NPIS420']) : "--";
                  ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS421'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS421']);

                  }elseif (!empty($netPriceTitleIv['NPT421'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT421']);
                  }else{
                    echo "--";
                  }

                  // echo ($netPriceTitleIv['NPIS421']) ? '$'.number_format($netPriceTitleIv['NPIS421']) : "--";
                  ?>
                </td>
                <td>
                  <?php
                  if(!empty($netPriceTitleIv['NPIS422'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS422']);

                  }elseif (!empty($netPriceTitleIv['NPT422'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT422']);
                  }else{
                    echo "--";
                  }

                  // echo ($netPriceTitleIv['NPIS422']) ? '$'.number_format($netPriceTitleIv['NPIS422']) : "--";
                    ?>
                </td> 
              </tr>
              <tr>
                <td>$48,001 – $75,000
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS430'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS430']);

                  }elseif (!empty($netPriceTitleIv['NPT430'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT430']);
                  }else{
                    echo "--";
                  }

                  // echo ($netPriceTitleIv['NPIS430']) ? '$'.number_format($netPriceTitleIv['NPIS430']) : "--";
                  ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS431'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS431']);

                  }elseif (!empty($netPriceTitleIv['NPT431'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT431']);
                  }else{
                    echo "--";
                  }
                  // echo ($netPriceTitleIv['NPIS431']) ? '$'.number_format($netPriceTitleIv['NPIS431']) : "--";
                  ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS432'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS432']);

                  }elseif (!empty($netPriceTitleIv['NPT432'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT432']);
                  }else{
                    echo "--";
                  }
                  // echo ($netPriceTitleIv['NPIS432']) ? '$'.number_format($netPriceTitleIv['NPIS432']) : "--";
                  ?>
                </td> 
              </tr>
              <tr>
                <td>$75,001 – $110,000
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS440'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS440']);

                  }elseif (!empty($netPriceTitleIv['NPT440'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT440']);
                  }else{
                    echo "--";
                  }
                  // echo ($netPriceTitleIv['NPIS440']) ? '$'.number_format($netPriceTitleIv['NPIS440']) : "--";
                  ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS441'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS441']);

                  }elseif (!empty($netPriceTitleIv['NPT441'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT441']);
                  }else{
                    echo "--";
                  }

                  // echo ($netPriceTitleIv['NPIS441']) ? '$'.number_format($netPriceTitleIv['NPIS441']) : "--";
                  ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS442'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS442']);

                  }elseif (!empty($netPriceTitleIv['NPT442'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT442']);
                  }else{
                    echo "--";
                  }

                  // echo ($netPriceTitleIv['NPIS442']) ? '$'.number_format($netPriceTitleIv['NPIS442']) : "--";
                  ?>
                </td> 
              </tr>
              <tr>
                <td>$110,001 and more
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS450'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS450']);

                  }elseif (!empty($netPriceTitleIv['NPT450'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT450']);
                  }else{
                    echo "--";
                  }
                // echo ($netPriceTitleIv['NPIS450']) ? '$'.number_format($netPriceTitleIv['NPIS450']) : "--";
                ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS451'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS451']);

                  }elseif (!empty($netPriceTitleIv['NPT451'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT451']);
                  }else{
                    echo "--";
                  }
                  // echo ($netPriceTitleIv['NPIS451']) ? '$'.number_format($netPriceTitleIv['NPIS451']) : "--";
                  ?>
                </td>
                <td>
                  <?php 
                  if(!empty($netPriceTitleIv['NPIS452'])){
                    echo '$'.number_format($netPriceTitleIv['NPIS452']);

                  }elseif (!empty($netPriceTitleIv['NPT452'])) {
                    echo '$'.number_format($netPriceTitleIv['NPT452']);
                  }else{
                    echo "--";
                  }
                  // echo ($netPriceTitleIv['NPIS452']) ? '$'.number_format($netPriceTitleIv['NPIS452']) : "--";
                  ?>
                </td> 
              </tr>               
            </tbody>
          </table>
         
          </div>
          <?php endif; ?>           
          <?php $NPRICURL =  trim($clgInfo['NPRICURL']);
      if(!empty($NPRICURL)): ?>
          <strong class="tablename">NET PRICE CALCULATOR
          </strong>
          <p>An institution’s net price calculator allows current and prospective students, families, and other consumers to estimate the net price of attending that institution for a particular student.
          </p>
          <a href="<?php echo addhttp($clgInfo['NPRICURL']); ?>" target="_blank">
            <button class="btn calculator">Visit this institution's 
              <strong>net price calculator 
              </strong> 
              <i class="fa fa-chevron-circle-right" style="color:#5bc0de">
              </i>
            </button>           
            <?php echo $clgInfo['NPRICURL']; ?>
          </a>
          <?php endif; ?>
        </div>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>



        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'enrollment')" class="nextTab">Next: Enrollment
          </button>
        </div>
      </div>
      <div id="enrollment" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <div class="col-md-12 breadCrumg">
            <ul style="">         
              <li>
                <a href="#attenGenStatus">ATTENDANCE/GENDER
                </a> 
              </li>
              <li>
                <a href="#raceEthi">RACE/ETHNICITY 
                </a> 
              </li>
              <li>
                <a href="#ageRegidence">AGE/ RESIDENCE 
                </a> 
              </li> 
              <li>
                <a href="#gradStatus">GRADUATE ATTENDANCE STATUS
                </a> 
              </li>
              <li>
                <a href="#grdPerDistEdu">DISTANCE EDUCATION
                </a> 
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">FALL 2018
          </h3>
        </div>
        <div class="col-sm-12 part-1-info">      
          <?php if(!empty($enrollment)): 
      $undergraduate = $enrollment['EFUG'];
      $graduate = $enrollment['EFGRAD'];
      $Transfer_in = $enrollment['EFUGTRN'];          
      ?>
          <table class="table">
            <thead>
              <tr>
                <th>Total enrollment
                </th>
                <?php if(!empty($undergraduate) && !empty($graduate)): ?>
                <th>
                  <?php echo number_format($undergraduate + $graduate + $Transfer_in); ?>
                </th>
                <?php elseif (!empty($undergraduate)): ?> 
                <th>
                  <?php echo number_format($undergraduate + $Transfer_in); ?>  (all undergraduate)
                </th>
                <?php elseif (!empty($graduate)): ?>  
                <th>
                  <?php echo number_format($graduate); ?>  (all graduate)
                </th>
                <?php endif; ?> 
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($undergraduate) && !empty($graduate)): ?>
              <tr>
                <td>Undergraduate enrollment
                </td>
                <td>
                  <?php echo number_format($undergraduate); ?>
                </td>
              </tr>
              <tr class="lavelIndend">
                <td>Undergraduate transfer-in enrollment
                </td>
                <td>
                  <?php echo number_format($Transfer_in); ?>
                </td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($undergraduate) && !empty($graduate)): ?>
              <tr>
                <td>Graduate enrollment
                </td>
                <td>
                  <?php echo number_format($graduate); ?>
                </td>
              </tr>
              <?php endif; ?>     
            </tbody>
          </table>
        </div>
        <div class="col-sm-12" id="attenGenStatus">
          <?php endif; ?>
          <?php if(!empty($undergraduateGender) || !empty($undergraduateAttendence)): ?>
          <table class="table graphtabs">
            <thead>
              <tr>
                <th class="text-center">UNDERGRADUATE ATTENDANCE STATUS
                </th>
                <th class="text-center">UNDERGRADUATE STUDENT GENDER
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo piechartGenerator($undergraduateAttendence,'undergraduateAttendence'); ?>
                </td>
                <td>
                  <?php echo piechartGenerator($undergraduateGender,'undergraduateGender'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
        <div class="col-sm-12" id="raceEthi">
          <?php if(!empty($getRaceEthnicity )): ?>        
          <table class="table graphtabs">
            <thead>
              <tr>
                <th class="text-center">UNDERGRADUATE RACE/ETHNICITY
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td >
                  <?php echo barchartGeneratorEnrollment($getRaceEthnicity,'getRaceEthnicity'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
        <div class="col-sm-12" id="ageRegidence">
          <?php if(!empty($undergraduateAge) || !empty($undergraduateResidence)): ?>  
          <table class="table graphtabs">
            <thead>
              <tr>
                <th class="text-center">UNDERGRADUATE STUDENT AGE
                </th>
                <th class="text-center">UNDERGRADUATE STUDENT RESIDENCE
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td >
                  <?php echo barchartGenerator($undergraduateAge,'undergraduateAge'); ?>
                </td>
                <td >
                  <?php echo barchartGenerator($undergraduateResidence,'undergraduateResidence'); ?>                  
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
        <div class="col-sm-12" id="gradStatus">
          <?php if(!empty($gradStatus)): ?>
          <table class="table graphtabs">
            <thead>
              <tr>
                <th class="text-center">GRADUATE ATTENDANCE STATUS
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo piechartGenerator($gradStatus,'gradStatus'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
        <div class="col-sm-12" id="grdPerDistEdu">
          <?php if(!empty($underPerDistEdu) || !empty($grdPerDistEdu)): ?>
          <table class="table graphtabs">
            <thead>
              <tr>
                <th class="text-center">UNDERGRADUATE DISTANCE EDUCATION STATUS
                </th>
                <th class="text-center">GRADUATE DISTANCE EDUCATION STATUS
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td >
                  <?php echo barchartGenerator($underPerDistEdu,'underPerDistEdu'); ?>
                </td>
                <td>
                  <?php echo barchartGenerator($grdPerDistEdu,'grdPerDistEdu'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
        </div>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'admissionsSection')" class="nextTab">Next: Admissions   </button>
        </div>
      </div>
      <div id="admissionsSection" class="tabcontent"> 
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <!-- <div class="col-md-12 breadCrumg">
<ul style="">         
<li><a href="#attenGenStatus">ATTENDANCE/GENDER Status</a> </li>
<li><a href="#allUnder">All Undergraduate Students</a> </li>
</ul>
</div> -->
        </div>
        <div class="col-sm-12">
          <h3 class="quickFacts_anchor">ADMISSIONS
          </h3>
        </div>
        <div class="col-md-12 detailOff"  >
          <div class="part-1-info">
              <table class="table">
                <tr>
                  <td>Admissions
                  </td>
                  <td>
                    <?php $webaddr = addhttp($clgInfo['ADMINURL']); ?>
                    <a href="<?php echo $webaddr; ?>" target="_blank">
                      <?php echo $clgInfo['ADMINURL']; ?>                 
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Apply Online
                  </td>
                  <td>
                    <a href="<?php echo addhttp($clgInfo['APPLURL']); ?>" target="_blank">
                      <?php echo $clgInfo['APPLURL']; ?>                  
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Phone
                  </td>
                  <td> 
                      <?php 
                      $phone = $clgInfo['GENTELE'];
                      if(!empty($phone)):
                        $phone = format_phone('us', $phone);
              echo $phone;
                      endif;
                      
                      ?>                  
                   
                  </td>
                </tr>
                        
              </table>
          </div>

        <h3 class="quickFacts_anchor">UNDERGRADUATE ADMISSIONS FALL 2018</h3>  



          <?php if(!empty($admissionFall)): ?>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">
                </th>
                <th>TOTAL
                </th>
                <th>MALE
                </th>
                <th>FEMALE
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Number of applicants
                </td>
                <td>
                  <?php echo $admissionFall['APPLCN']; ?>
                </td>
                <td>
                  <?php echo $admissionFall['APPLCNM']; ?>
                </td>
                <td>
                  <?php echo $admissionFall['APPLCNW']; ?>
                </td>
              </tr>
              <tr>
                <td>Percent admitted
                </td>
                <td>
                  <?php echo $admissionFall['DVADM01']; ?>%
                </td>
                <td>
                  <?php echo $admissionFall['DVADM02']; ?>%
                </td>
                <td>
                  <?php echo $admissionFall['DVADM03']; ?>%
                </td>
              </tr> 
              <tr>
                <td>Percent admitted who enrolled
                </td>
                <td>
                  <?php
$total = round(($admissionFall['ENRLT'] / $admissionFall['APPLCN'])*100);   
echo $total ."%"; 
?>
                </td>
                <td>
                  <?php
$manper =  round(($admissionFall['ENRLM'] / $admissionFall['APPLCNM'])*100); 
echo $manper ."%";
?>
                </td>
                <td>
                  <?php
$womenper =  round(($admissionFall['ENRLW'] / $admissionFall['APPLCNW'])*100);
echo $womenper ."%";
?>
                </td>
              </tr>             
            </tbody>          
          </table>
          <?php endif; ?> 
          <?php if(!empty($admConsideration)): ?> 
          <h3  class="quickFacts_anchor">Admissions Requirements
          </h3>
          <div class="response-div">
          <table class="table">
            <thead>
              <th>ADMISSIONS CONSIDERATIONS
              </th>
              <th>REQUIRED
              </th>
              <th>RECOMMENDED
              </th>
              <th>CONSIDERED BUT NOT REQUIRED
              </th>
            </thead>
            <tbody>
              <?php if($admConsideration['ADMCON1'] == 1 || $admConsideration['ADMCON1'] == 2 || $admConsideration['ADMCON1'] == 5 ): ?>
              <tr>
                <td>Secondary school GPA
                </td>
                <td>
                  <?php if($admConsideration['ADMCON1'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON1'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON1'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON2'] == 1 || $admConsideration['ADMCON2'] == 2 || $admConsideration['ADMCON2'] == 5 ): ?>
              <tr>
                <td>Secondary school rank
                </td>
                <td>
                  <?php if($admConsideration['ADMCON2'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON2'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON2'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON3'] == 1 || $admConsideration['ADMCON3'] == 2 || $admConsideration['ADMCON3'] == 5 ): ?>
              <tr>
                <td>Secondary school record
                </td>
                <td>
                  <?php if($admConsideration['ADMCON3'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON3'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON3'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON4'] == 1 || $admConsideration['ADMCON4'] == 2 || $admConsideration['ADMCON4'] == 5 ): ?>
              <tr>
                <td>Completion of college-preparatory program
                </td>
                <td>
                  <?php if($admConsideration['ADMCON4'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON4'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON4'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON5'] == 1 || $admConsideration['ADMCON5'] == 2 || $admConsideration['ADMCON5'] == 5) : ?>
              <tr>
                <td>Recommendations
                </td>
                <td>
                  <?php if($admConsideration['ADMCON5'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON5'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON5'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON6'] == 1 || $admConsideration['ADMCON6'] == 2 || $admConsideration['ADMCON6'] == 5) : ?>
              <tr>
                <td>Formal demonstration of competencies
                </td>
                <td>
                  <?php if($admConsideration['ADMCON6'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON6'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON6'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON7'] == 1 || $admConsideration['ADMCON7'] == 2 || $admConsideration['ADMCON7'] == 5) : ?>
              <tr>
                <td>Admission test scores (SAT/ACT)
                </td>
                <td>
                  <?php if($admConsideration['ADMCON7'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON7'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON7'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON8'] == 1 || $admConsideration['ADMCON8'] == 2 || $admConsideration['ADMCON8'] == 5) : ?>
              <tr>
                <td>TOEFL (Test of English as a Foreign language)
                </td>
                <td>
                  <?php if($admConsideration['ADMCON8'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON8'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON8'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
              <?php if($admConsideration['ADMCON9'] == 1 || $admConsideration['ADMCON9'] == 2 || $admConsideration['ADMCON9'] == 5): ?>
              <tr>
                <td>Other Test (Wonderlic, WISC-III, etc.)  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON9'] == 1){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON9'] == 2){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
                <td>
                  <?php if($admConsideration['ADMCON9'] == 5){ echo '<i class="fa fa-check" style="color:green"></i>';} ?>  
                </td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
          </div>
          <?php endif; ?> 
          <?php if(!empty($admConsideration['SATNUM'])): ?>
          <h3 class="quickFacts_anchor">TEST SCORES: FALL 2018 (ENROLLED FIRST-TIME STUDENTS)
          </h3>
          <div class="response-div">
          <table class="table">
            <thead>
              <th>STUDENTS SUBMITTING SCORES
              </th>
              <th>NUMBER
              </th>
              <th>PERCENT
              </th>
            </thead>
            <tbody>
              <tr>
                <td>SAT
                </td>
                <td>
                  <?php echo $admConsideration['SATNUM']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['SATPCT']; ?>%
                </td>
              </tr>
              <tr>
                <td>ACT
                </td>
                <td>
                  <?php echo $admConsideration['ACTNUM']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['ACTPCT']; ?>%
                </td>
              </tr>
            </tbody>
          </table>
          </div>
          <?php endif; ?> 
          <?php if(!empty($admConsideration['SATVR25'])): ?>    
          <div class="response-div">        
          <table class="table">
            <thead>
              <th>TEST SCORES
              </th>
              <th>25TH PERCENTILE*
              </th>
              <th>75TH PERCENTILE**
              </th>
            </thead>
            <tbody>
              <tr>
                <td>SAT Evidence-Based Reading and Writing
                </td>
                <td>
                  <?php echo $admConsideration['SATVR25']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['SATVR75']; ?>
                </td>
              </tr>
              <tr>
                <td>SAT Math
                </td>
                <td>
                  <?php echo $admConsideration['SATMT25']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['SATMT75']; ?>
                </td>
              </tr>
              <tr>
                <td>ACT Composite
                </td>
                <td>
                  <?php echo $admConsideration['ACTCM25']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['ACTCM75']; ?>
                </td>
              </tr>
              <tr>
                <td>ACT English
                </td>
                <td>
                  <?php echo $admConsideration['ACTEN25']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['ACTEN75']; ?>
                </td>
              </tr>
              <tr>
                <td>ACT Math
                </td>
                <td>
                  <?php echo $admConsideration['ACTMT25']; ?>
                </td>
                <td>
                  <?php echo $admConsideration['ACTMT75']; ?>
                </td>
              </tr>
              <tr>
                <td class="note" colspan="3" style="font-size: 12px;padding: 10px">
                  <br />
                  <span>
                    <b>NOTES:
                    </b>
                  </span>
                  <br />
                  <span>*  25% of students scored at or below
                  </span>
                  <br />
                  <span>** 25% of students scored above
                  </span>
                  <br />
                  <ul style="list-style: disc;">
                    <li>Data apply to first-time degree/certificate-seeking students.
                    </li>
                    <li>Institutions are asked to report test scores only if they are required for admission.
                    </li>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
          <?php endif; ?> 
        </div>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'retentionRates')" class="nextTab">Next: Retention and Graduation Rate
           </button>
        </div>
      </div>
      <div id="retentionRates" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <div class="col-md-12 breadCrumg">
            <ul style=""> 
              <?php if(!empty($retentionRate)): ?>
              <li>
                <a href="#firstSEcondRetention">FIRST-TO-SECOND
                </a> 
              </li>
              <?php endif; ?>       
              <?php if(!empty($overallRate)) : ?> 
              <li>
                <a href="#overallRate">OVERALL GRADUATION
                </a> 
              </li>
              <?php endif; ?>
              <?php if(!empty($bachelorGrdRateRace['race']) || !empty($bachelorGrdRateRace['gender']) || !empty($bachelorGrdRate)) : ?>
              <li>
                <a href="#bachDegRate">BACHELOR'S DEGREE GRADUATION RATES
                </a> 
              </li>
              <?php endif; ?> 
            </ul>
          </div>
        </div>
        <div class="col-sm-12 detailOff" >
          <?php if(empty($retentionRate) || empty($overallRate) || empty($bachelorGrdRateRace)):
echo "<p>This institution did not offer programs at or below the baccalaureate level, therefore graduation rate information was not reported.</p>";
else:
?>
          <?php if(!empty($retentionRate)):?>
          <h3 class="quickFacts_anchor">FIRST-TO-SECOND YEAR RETENTION RATES
          </h3>
          <div id="firstSEcondRetention">
            <p class="">Retention rates measure the percentage of first-time students who are seeking bachelor's degrees who return to the institution to continue their studies the following fall.
            </p>          
            <table class="table graphtabs">
              <thead>
                <th>
                  <center>RETENTION RATES FOR FIRST-TIME STUDENTS PURSUING BACHELOR'S DEGREES
                  </center>
                </th>             
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="chartSection">
                      <?php echo barchartGenerator($retentionRate,'retentionRate'); ?>
                    </div>                  
                  </td>
                </tr>
                <tr>
                  <td>
                    <center>
                      <p class="text-center">Percentage of Students Who Began Their Studies in Fall 2017 and Returned in Fall 2018
                      </p>
                    </center>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php endif; ?>
          <?php if(!empty($overallRate)) : ?>
          <div id="overallRate">
            <h3 class="quickFacts_anchor">OVERALL GRADUATION RATE AND TRANSFER-OUT RATE
            </h3> 
            <p class="text-center">
              The overall graduation rate is also known as the "Student Right to Know" or IPEDS graduation rate. It tracks the progress of students who began their studies as full-time, first-time degree- or certificate-seeking students to see if they complete a degree or other award such as a certificate within 150% of "normal time" for completing the program in which they are enrolled.
              <br />Some institutions also report a transfer-out rate, which is the percentage of the full-time, first-time students who transferred to another institution.
            </p>
            <table class="table graphtabs">
              <thead>
                <tr>
                  <th>
                    <center>OVERALL GRADUATION AND TRANSFER-OUT RATES FOR STUDENTS WHO BEGAN THEIR STUDIES IN FALL 2012
                    </center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>                  
                    <div class="chartSection">
                      <?php echo barchartGenerator($overallRate,'overallRate'); ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">
                    <center>
                      <b> Percentage of Full-time, First-Time Students Who Graduated or Transferred Out Within 150% of "Normal Time" to Completion for Their Program
                      </b>
                    </center>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php endif; ?>
          <?php if(!empty($bachelorGrdRateRace['race']) || !empty($bachelorGrdRateRace['gender']) || !empty($bachelorGrdRate)) : ?> 
          <div id="bachDegRate">
            <h3 class="quickFacts_anchor">BACHELOR'S DEGREE GRADUATION RATES
            </h3>
            <p class="text-center">Bachelor’s degree graduation rates measure the percentage of entering students beginning their studies full-time and are planning to get a bachelor’s degree and who complete their degree program within a specified amount of time.
            </p>
            <table class="table graphtabs">
              <thead>
                <tr>
                  <th>
                    <center>GRADUATION RATES FOR STUDENTS PURSUING BACHELOR'S DEGREES
                    </center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php echo mulibarchartGenerator($bachelorGrdRate,'bachelorGrdRate'); ?>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">
                    Percentage of Full-time, First-time Students Who Graduated in the Specified Amount of Time and Began in Fall 2010 or Fall 2012
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="table graphtabs">
              <thead>
                <tr>
                  <th>
                    <center> 6-YEAR GRADUATION RATE BY GENDER FOR STUDENTS PURSUING BACHELOR'S DEGREES
                    </center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="chartSection">
                      <?php echo barchartGenerator($bachelorGrdRateRace['gender'],'bachelorGrdRategender'); ?>
                    </div>                    
                  </td>
                </tr>
                <tr>
                  <td class="text-center">Percentage of Full-time, First-time Students Who Began Their Studies in Fall 2012 and Received a Degree or Award Within 150% of "Normal Time" to Completion for Their Program
                  </td>
                </tr>             
              </tbody>
            </table>
            <table class="table graphtabs">
              <thead>
                <th>
                  <center> 6-YEAR GRADUATION RATE BY RACE/ETHNICITY FOR STUDENTS PURSUING BACHELOR'S DEGREES 
                  </center> 
                </th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php echo barchartGenerator($bachelorGrdRateRace['race'],'bachelorGrdRateRace'); ?>                  
                  </td>
                </tr>
                <tr>
                  <td class="text-center">
                    Percentage of Full-time, First-time Students Who Began Their Studies in Fall 2012 and Received a Degree or Award Within 150% of "Normal Time" to Completion for Their Program 
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'outcomeMeasuresSection')" class="nextTab">Next: Outcome Measures    
          </button>
        </div>
      </div>
      <div id="outcomeMeasuresSection" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>
          <!-- <div class="col-md-12 breadCrumg">
<ul style="">         
<li><a href="#attenGenStatus">ATTENDANCE/GENDER Status</a> </li>
<li><a href="#allUnder">All Undergraduate Students</a> </li>
</ul>
</div> -->
        </div>
        <div class="col-md-12 detailOff" >
          <h3 class="quickFacts_anchor">OUTCOME MEASURES
          </h3>
          <?php
if(empty($outcomeMeasff) && empty($outcomeMeaspf) && empty($outcomeMeasfnf) && empty($outcomeMeaspnf)): //main if start
echo "<p class='note'>Institutions that did not offer undergraduate programs were not required to report Outcome Measures.</p>";
else: ?>
          <p class="">
            Alternative measures of student success are reported by degree-granting institutions to describe the outcomes of degree/certificate-seeking undergraduate students who are not only first-time, full-time students, but also part-time attending and non-first-time (transfer-in) students. These measures are also reported for students receiving Pell grants and those students that do not receive Pell grants. These measures provide the 8-year award-completion rates by award level (certificates, associate's and bachelor degrees) after entering an institution. For students who did not earn any undergraduate award after 8-years of entry, the enrollment statuses are reported as either still enrolled at the institution, or subsequently transferred out of the institution. Unlike the Graduation Rates data, all reporting institutions must report on their transfer outs regardless if the institution has a mission that provides substantial transfer preparation.
          </p>
          <?php if(!empty($outcomeMeasff)): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>FULL-TIME, FIRST-TIME DEGREE/CERTIFICATE-SEEKING UNDERGRADUATES WHO ENTERED IN 2010-11
                  </center>
                </th>
              </tr>           
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo mulibarchartGenerator($outcomeMeasff,'outcomeMeasff'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
          <?php if(!empty($outcomeMeaspf)): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>PART-TIME, FIRST-TIME DEGREE/CERTIFICATE-SEEKING UNDERGRADUATES WHO ENTERED IN 2010-11
                  </center>
                </th>
              </tr>           
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo mulibarchartGenerator($outcomeMeaspf,'outcomeMeaspf'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
          <?php if(!empty($outcomeMeasfnf)): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>FULL-TIME, NON-FIRST-TIME DEGREE/CERTIFICATE-SEEKING UNDERGRADUATES WHO ENTERED IN 2010-11
                  </center>
                </th>
              </tr>           
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo mulibarchartGenerator($outcomeMeasfnf,'outcomeMeasfnf'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
          <?php if(!empty($outcomeMeaspnf)): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>PART-TIME, NON-FIRST-TIME DEGREE/CERTIFICATE-SEEKING UNDERGRADUATES WHO ENTERED IN 2010-11
                  </center>
                </th>
              </tr>           
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo mulibarchartGenerator($outcomeMeaspnf,'outcomeMeaspnf'); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
          <?php endif; ?>  
          <!-- main if end -->
        </div>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'programsMajor')" class="nextTab">Next: Programs/Majors
          </button>
        </div>
      </div>
      <div id="programsMajor" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>     
        </div>    
        <div class="col-md-12 detailOff" >
          <h3 class="quickFacts_anchor">PROGRAMS/MAJORS
          </h3>
          <?php if(!empty($programMajor )): ?>
          <?php echo $programMajor;  ?>
          <?php endif; ?>
        </div>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'servicememersVet')" class="nextTab">Next: Servicemembers and Veterans
          
          

          </button>
        </div>
      </div>
      <div id="servicememersVet" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>     
        </div>
        <div class="col-md-12 detailOff" >
          <h3 class="quickFacts_anchor">SERVICEMEMBERS AND VETERANS
          </h3>



          <?php if(isset($clgInfo['VETURL']) && !empty($clgInfo['VETURL'])): 
           $urls = $clgInfo['VETURL'];

           $string = preg_replace('/\s+/', '', $urls);

          if($string){ ?>
             <p>
                <a href="<?php echo addhttp($clgInfo['VETURL']); ?>" target="_blank">
                <button class="btn calculator">Tuition Policies for Servicemembers and Veterans             
                  <i class="fa fa-chevron-circle-right" style="color:#5bc0de">
                  </i>
                </button>           
                <?php echo $clgInfo['VETURL']; ?></a>
              </p>

            <?php

          }


          ?>


           
          <?php endif; ?>



          <?php if(!empty($servicemembers ) || $servicemembersA ): ?>
          <p style="font-size: 14px" >
            Services and Programs for Servicemembers and Veterans 
            <br />
            Yellow Ribbon Program (officially known as Post-9/11 GI Bill, Yellow Ribbon Program)
            Credit for military training
            <br />
            Dedicated point of contact for support services for Veterans, military Servicemembers, and their families
            <br />
            Recognized student veteran organization
            <br />
            Member of Servicemembers Opportunity Colleges
            <br />
            <br />
            Tuition policies specifically for Veterans and Servicemembers
          </p>
          <strong class="tablename">EDUCATIONAL BENEFITS, 2018-2019
          </strong>
          <?php if(!empty($servicemembers)): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>NUMBER OF STUDENTS RECEIVING BENEFITS/ASSISTANCE
                  </center>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="">
                    <?php echo barchartGeneratorWithouP($servicemembers,'servicemembers'); ?>
                  </div>  
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
          <?php if(!empty($servicemembersA)): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>AVERAGE AMOUNT OF BENEFITS/ASSISTANCE AWARDED THROUGH THE INSTITUTION
                  </center>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="">
                    <?php echo barchartGeneratorWithouP($servicemembersA,'servicemembersA'); ?>
                  </div>  
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
          <?php else: ?>
          <p class="note">
          </p>
          <?php endif; ?>
        </div>

        <div class="col-sm-12 alert alert-info" role="alert">
       Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
    </div>
        <div class="col-md-12 nextbutton">      
          <button onclick="opentab(event, 'athleticTeam')" class="nextTab">Next: Varsity Athletic Teams  </button>
        </div>
      </div>
      <div id="athleticTeam" class="tabcontent">
        <div class="col-md-12 primaryCollegeName">
          <h2>
            <?php echo $clgInfo['INSTNM']; ?>
            <span class="statName">
              <?php echo  $clgInfo['CITY'].', '.$clgInfo['STABBR']; ?>
            </span>
          </h2>     
        </div>    
        <div class="col-md-12" >
          <h3 class="quickFacts_anchor">2018-2019 VARSITY ATHLETES
          </h3>   
        </div>
        <div class="col-md-12 detailOff" >
          <?php if(!empty($varsityAthleticTeam )): ?>
          <table class="table">
            <thead>
              <tr>
                <th>
                  <?php echo $varsityAthleticTeam['classification_name']; ?>
                </th>
                <th>Men
                </th>
                <th>Women
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 
        $i = 0;
        foreach ($varsityAthleticTeam as $key => $value) {
        if($i < 3){
        }else{
        if(!empty($value)){
        $exp = explode('_', $key);
        $ath = $exp[2];
        $men = "";
        $women = "";
        $keyM = 'PARTIC_MEN_'.$ath;
        $keyW = 'PARTIC_WOMEN_'.$ath;
        if (array_key_exists($keyM,$varsityAthleticTeam)){
        $men = $varsityAthleticTeam['PARTIC_MEN_'.$ath];
        }
        if (array_key_exists($keyW,$varsityAthleticTeam)){
        $women = $varsityAthleticTeam['PARTIC_WOMEN_'.$ath];
        }
        switch ($ath) {
        case 'Bskball':
        $ath = "Basketball";
        break;
        case 'BchVoll':
        $ath = "Beach Volleyball";
        break;
        case 'Eqstrian':
        $ath = "Equestrian";
        break;
        case 'FldHcky':
        $ath = "Field Hockey";
        break;
        case 'Gymn':
        $ath = "Gymnastics";
        break;
        case 'IceHcky':
        $ath = "Ice Hockey";
        break;
        case 'Lacrsse':
        $ath = "Lacrosse";
        break;
        case 'SwimDivng':
        $ath = "Swimming and Diving";
        break;
        case 'SynSwim':
        $ath = "Synchronized Swimming";
        break;
        case 'TblTennis':
        $ath = "Table Tennis";
        break;
        case 'TrkFldIn':
        $ath = "Track and Field, Indoor";
        break;
        case 'TrkFldOut':
        $ath = "Track and Field, Outdoor";
        break;
        case 'XCountry':
        $ath = "Track and Field, X-Country";
        break;
        case 'Vollball':
        $ath = "Volleyball";
        break;
        case 'WaterPolo':
        $ath = ">Water Polo";
        break;
        case 'WgtLift':
        $ath = "Weight Lifting";
        break;
        default:
        # code...
        break;
        }
        $men = (empty($men)) ? "-" : $men;
        $women = (empty($women)) ? "-" : $women;
        echo "<tr>";                    
        echo "<td> ".$ath." </td>";
        echo "<td> ".$men." </td>";
        echo "<td> ".$women." </td>";
        echo "</tr>";
        }
        }
        $i ++;
        }?>
              <tr>
                <td colspan="3">
                  <div class="note">
                    <ul style="list-style: disc;">  
                      <li>For further information on varsity athletic teams please visit the 
                        <a href="https://ope.ed.gov/athletics/" target="_blank"> OPE Athletics Home Page
                        </a>.
                      </li> 
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <?php else: ?>
          <div class="note">
            <ul style="list-style: disc;">
              <li>No varsity sports data reported for this institution.
              </li>
              <li>For further information on varsity athletic teams please visit the 
                <a href="https://ope.ed.gov/athletics/" target="_blank"> OPE Athletics Home Page
                </a>.
              </li> 
            </ul>
          </div>
          <?php endif; ?>

          <div class="col-sm-12 alert alert-info" role="alert">
         Source: U.S. Department of Education. Institute of Education Sciences, National Center for Education Statistics.
      </div>

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
function barchartGeneratorEnrollment($chartData,$chartName){
$arrChartConfig = array(
"chart" => array(
"caption" => "",
"subcaption" => "",
"numbersuffix" => "%",
"theme" => "fusion"
)
);
$rand = rand();
$arrChartConfig['data'] = $chartData;
$jsonEncodedData = json_encode($arrChartConfig);
$charName = "enrollment".$rand.$chartName;
$chart = "enrllmentClass".$rand.$chartName;
$columnChart = new FusionCharts("column2d", $chart, "100%", 350, $charName, "json", $jsonEncodedData);
$columnChart->render();?>
  <center>
    <div id="<?php echo $charName; ?>" class="<?php echo $charName; ?>" >Chart will render here!
    </div>
  </center>
  <?php 
}
function barchartGenerator($chartData,$chartName){
$arrChartConfig = array(
"chart" => array(
"caption" => "",
"subcaption" => "",
"numbersuffix" => "%",
"theme" => "fusion"
)
);
$rand = rand();
$arrChartConfig['data'] = $chartData;
$jsonEncodedData = json_encode($arrChartConfig);
$charName = "charName".$rand.$chartName;
$chart = "chartClass".$rand.$chartName;
$columnChart = new FusionCharts("column2d", $chart, "100%", 400, $charName, "json", $jsonEncodedData);
$columnChart->render();?>
  <center>
    <div id="<?php echo $charName; ?>" class="chartSection" >Chart will render here!
    </div>
  </center>
  <?php 
}
function barchartGeneratorWithouP($chartData,$chartName){
$arrChartConfig = array(
"chart" => array(
"caption" => "",
"subcaption" => "",
"numbersuffix" => "",
"theme" => "fusion"
)
);
$rand = rand();
$arrChartConfig['data'] = $chartData;
$jsonEncodedData = json_encode($arrChartConfig);
$charName = "charName".$rand.$chartName;
$chart = "chartClass".$rand.$chartName;
$columnChart = new FusionCharts("column2d", $chart, "100%", 400, $charName, "json", $jsonEncodedData);
$columnChart->render();?>
  <center>
    <div id="<?php echo $charName; ?>" class="chartSection" >Chart will render here!
    </div>
  </center>
  <?php 
}
function mulibarchartGenerator($chartData,$chartName){
$arrChartConfig = array(
"chart" => array(
"caption" => "",
"subcaption" => "",
"numbersuffix" => "%",
"theme" => "fusion"
)
);
$rand = rand();
$arrChartConfig['categories'] = $chartData['categories'];
$arrChartConfig['dataset'] = $chartData['dataset'];
$jsonEncodedData = json_encode($arrChartConfig);
$charName = "charName".$rand.$chartName;
$chart = "chartClass".$rand.$chartName;
$columnChart = new FusionCharts("mscolumn2d", $chart, "100%", 400, $charName, "json", $jsonEncodedData);
$columnChart->render();?>
  <center>
    <div id="<?php echo $charName; ?>" class="chartSection" >Chart will render here!
    </div>
  </center>
  <?php 
}
function piechartGenerator($chartData,$chartName){
$arrChartConfig = array(
"chart" => array(
"caption" => "",
"showlegend" => "1",
"showpercentvalues" => "1",
"legendposition" => "bottom",
"usedataplotcolorforlabels" => "1",
"theme" => "fusion"
)
);
$rand = rand();
$arrChartConfig['data'] = $chartData;
$jsonEncodedData = json_encode($arrChartConfig);
$charName = "charName".$rand.$chartName;
$chart = "chartClass".$rand.$chartName;
$columnChart = new FusionCharts("pie2d", $chart, "100%", 400, $charName, "json", $jsonEncodedData);
$columnChart->render();?>
  <center>
    <div id="<?php echo $charName; ?>" class="chartSection" >Chart will render here!
    </div>
  </center>
  <?php 
}




function format_phone($country, $phone) {
  $function = 'format_phone_' . $country;
  if(function_exists($function)) {
    return $function($phone);
  }
  return $phone;
}

function format_phone_us($phone) {
  // note: making sure we have something
  if(!isset($phone{3})) { return ''; }
  // note: strip out everything but numbers 
  $phone = preg_replace("/[^0-9]/", "", $phone);
  $length = strlen($phone);
  switch($length) {
  case 7:
    return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
  break;
  case 10:
   return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
  break;
  case 11:
  return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
  break;
  default:
    return $phone;
  break;
  }
}

?>
  <?php include 'collegenavigator/clgnav-footer.php'; ?>
