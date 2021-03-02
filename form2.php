<?php

   include 'header.php';
   
   /*
   $dataform2 = $_POST;
   $_SESSION['$dataform2'] =$dataform2;
   if(isset($_POST['clgcb']))
   {
   $clgcb = implode(",",$_POST['clgcb']);
   }
   else
   {
   $clgcb ='';
   }
   */
   if(isset($_SESSION['data_profile'])){
	  
   }
  // print_r($_SESSION);
   ?>
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
<!-- FONT AWESOME-->
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	
<link href="css/site.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/mform.css" rel="stylesheet">
<!-- Custom script -->
<script src="js/mycustomjs.js"></script> 
</head>
<body>
<!----------------------------HEADER----------------------------------->
<?php
include 'top-nav-no-left-menu.php';
?>
<!----------------------------HEADER-----------------------------------> 


<!--multi step form with banner start here-->
<!--banner-->
<div class="banner inner-banner multi-step-banner" style="background:url(images/create_my_profile_background.png) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> Create My Profile </h1>
    </div>
  </div>
</div>
<!--/banner-->
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 overflow-hide">
          <div id="progress-bar">
          <div id="1" class="done one progress-bar-item progress-bar-item-edges"><a href="form2.php" class="white-font"><p class="progress-bar-text">My Profile</p></a></div>
          <div id="2"class="two progress-bar-item progress-bar-item-edges"><a href="form.php" class="white-font"><p class="progress-bar-text">My Filters</p></a></div>
          <div id="3"class=" results progress-bar-item progress-bar-item-edges"><a href="college-search.php" class="white-font"><p class="progress-bar-text">My Results</p></a></div>
          <div id="4"class=" chances progress-bar-item progress-bar-item-edges"><a href="#!" class="white-font"><p class="progress-bar-text">My Chances</p></a></div>
          <div id="5" class=" five progress-bar-item"><a href="#!" class="white-font"><p class="progress-bar-text">Finalize List</p></a></div>
          </div>
			</div>
		</div>
				<!--form steps-->
				<br>
				<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 overflow-hide">
				
    <div id="sub-category-profile" class="sub-category">
        <div class="sub-category-item" >
            <div class="number main-numbers" onclick="gotostrep(2)" id="sp1">1</div>
            <div class="step-text tiny" onclick="gotostrep(2)">Graduation Date</div>
        </div>
        <div class="sub-category-item" >
            <div class="number middle-number main-numbers" onclick="gotostrep(3)" id="sp2">2</div>
            <div class="step-text" onclick="gotostrep(3)">Test Score</div>
		</div>
        <div class="sub-category-item" >
            <div class="number middle-number main-numbers" onclick="gotostrep(4)" id="sp3">3</div>
            <div class="step-text" onclick="gotostrep(4)">GPA</div>
        </div>
        <div class="sub-category-item" >
            
            <div class="number middle-number main-numbers last" onclick="gotostrep(5)" id="sp4">4</div>            
            <div class="step-text" onclick="gotostrep(5)">Classes</div>
        </div>
        <div class="sub-category-item" >
            <div class="number middle-number main-numbers" onclick="gotostrep(7)" id="sp5">5</div>
            <div class="step-text" onclick="gotostrep(7)">Early Decison</div>
        </div>
        <div class="sub-category-item" >
            <div class="number middle-number main-numbers" onclick="gotostrep(8)" id="sp6">6</div>
            <div class="step-text" onclick="gotostrep(8)">Awards</div>
        </div>
        <div class="sub-category-item">
            <div  class="number middle-number" onclick="gotostrep(9)"  id="sp7">7</div>
            <div class="step-text tiny" onclick="gotostrep(9)">Extracurricular</div>
        </div>
    </div>

				<!--/form steps-->
				
			</div>
		</div>
	</div>
</section>

<!--multi step form with banner end here-->


<div class="log-inpart">
   <div class="container">
      <!-- MultiStep Form -->
     <!-- <div class="container-fluid" >
         <div class="row justify-content-center mt-0">
            <!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
               <div class="cards px-0 pt-4 pb-0 mt-3 mb-3"> -->
          <!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
               <div class="cards px-0 pt-4 pb-0 mt-3 mb-3 ">
                  <div class="row ">
                     <div class="col-md-12 mx-0 col-sm-12">
                        <form id="msform">
                           <!-- progressbar -->
                       <!--    <ul id="progressbar">
                              <a href="form2.php" title="">
                                 <li class="active" id="payment"><strong>Your Profile</strong></li>
                              </a>
							   <a title="form.php">
                                 <li id="account"><strong>Your Filters</strong></li>
                              </a>

                              <a href="college-search.php" title="">
                                 <li id="personal"><strong>Your Results</strong></li>
                              </a>

                              <a title="">
                                 <li id="confirm"><strong>Your Chances?</strong></li>
                              </a>
                           </ul>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <div id="showtime">
         <div class="text-center" id="timeleft"></div>
         <!--  <div id='progress'><div id='progress-complete'></div></div>  -->
      </div>
      <!-- <form action="form.php" method="post" id="SignupForm" > -->
         <form action="dashboard2.php" method="post" id="SignupForm" >
        
         <fieldset >
            <legend>Disclaimer</legend>
            <div class="mform_field_wrap disclaimer-text" style="max-height: 330px;overflow: auto;">
			   <p style="text-align: justify">
			   It is not Isuriz's intention to provide advice as a substitute for a college counselor or admissions consultant. Rather, this website, its services, and related content on this website is for informational and research purposes only, and should not be relied upon as a definitive opinion of your admissibility to a particular school and/or how many colleges to pursue. Due to the holistic process and intangible evaluation and strategic decisions made by college admissions departments, outcomes can differ from the results predicted using our data points. It is recommended that you use the information obtained on this site as a reference point in your college planning efforts and speak with a college counselor or admissions consultant to best determine whether the schools on your college list are right for you based on your unique accomplishments, and goals. By using this website, you understand that your are required to complete your own due diligence before applying to any school, and nothing contained on this website is intended to replace the value of speaking with a qualified professional.
               </p>
            </div>
         </fieldset>
         <fieldset>
           <!-- <p style="font-size: 37px;text-align: center;"><span style="color: #019ff0;font-weight: bold;">Create</span> Your <span style="color: #019ff0;font-weight: bold;">Profile</span></p>-->
            <p class="legend-psub-tag">When will you graduate high school?</p>
            <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                  <select  class="form-control" name="hsgradyear" id="hsgradyear">
                     <option value="" >Please Fill</option>
                     <option value="2021" selected>2021</option>
                     <option value="2022" >2022</option>
                     <option value="2023" >2023</option>
                     <option value="2024" >2024</option>
                     <option value="2025" >2025</option>
                  </select>
               </label>
            </div>
         </fieldset>
         <fieldset>
            <!--<legend>Have you taken the SAT or ACT test?</legend>
               <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                <select  class="form-control" name="is_satact" id="is_satact" required>
                  <option value="">Please Select</option>
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
               </select>
               </label>
               </div>
               -->
            <div id="testchoice_fields">
               <legend>Which standardized test have you taken?
				<a href="javascript:void(0)" tabindex="0" data-html="true"  data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<p>In the wake of SAT and ACT cancellations due to COVID-19, many colleges are responding to these circumstances by adapting their admissions testing policies. Some have adopted a temporary test-optional stance and others have moved toward permanent test-optional policies that had already been under consideration. </p>
          <p>A test-optional college lets students decide whether they want to submit test scores with their application. Most test-optional schools will consider SAT and ACT scores if they are submitted, but focus on other factors they believe are stronger predictors of a student's potential to succeed in college.</p>
          <p>In certain instances, some colleges have taken their policies a step further and indicated that their new admission process would be “Test-blind” to remove the fear of negative consequences for not submitting a test score.  Isuriz provides the option to report an SAT score, ACT score, or select N/A if the student chooses to not report a test score.  </p>">

            <i class="faq_qa fa fa-question-circle" aria-hidden="true"></i></a>
				
				</legend>
               <div class="mform_field_wrap">
                  <label class="mod_style_outer mb-0" style="line-height: 35px;">
                     <select  class="form-control" name="testchoice" id="testchoice">
                        <option value="">Please Select</option>
                        <option value="SAT">SAT</option>
                        <option value="ACT">ACT</option>
                        <option value="NA">N/A</option>
                     </select>
                  </label>
               </div>
            </div>
            <div id="testsatscore_sat_fields">
               <legend>What is your SAT score?</legend>
               <div class="mform_field_wrap">
                  <label class="mod_style_outer mb-0">
                  <input type="text" class="input1" id="testsatscore_sat" name="testsatscore_sat" max="1600" placeholder="SAT Score" required>
                  </label>
               </div>
            </div>
            <div id="testactscore_act_fields">
               <legend>What is your ACT score?</legend>
               <div class="mform_field_wrap">
                  <label class="mod_style_outer mb-0">
                  <input type="text" class="input1" id="testactscore_act"  name="testactscore_act" max="36" placeholder="ACT Score" required>
                  </label>
               </div>
            </div>
         </fieldset>
         <fieldset>
            <legend>What is your Unweighted GPA?</legend>
            <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0">
               <input type="text" class="input1" id="gpa" value="0" min="0" max="4"  name="gpa" placeholder="Unweighted GPA Out of 4.0">
               </label>
            </div>
         </fieldset>
         <fieldset>
            <!--<legend>Have you taken any AP classes?</legend>
               <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                <select  class="form-control" name="is_rcapclscnt" id="is_rcapclscnt" required>
                  <option value="">Please Select</option>
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
               </select>
               </label>
               </div>
               -->
            <legend>How many AP and/or IB classes do you expect to complete in high school?</legend>
            <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                  <select class="form-control" name="rcapclscnt" id="rcapclscnt" required>
                     <option value="">Please Select</option>
                     <option value="0" selected>0</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4" >4</option>
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
                  </select>
               </label>
            </div>
         </fieldset>
         <fieldset>
            <!--<legend>Have you taken any Honors' classes?</legend>
               <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                <select  class="form-control" name="is_rcothhrnclscnt" id="is_rcothhrnclscnt" required>
                  <option value="">Please Select</option>
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
               </select>
               </label>
               </div>
               -->
            <legend class="w-70-lg">How many higher-level classes do you expect to complete in high school? <a href="javascript:void(0)" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Include advanced classes such as honors and college credit-bearing non-AP and/or non-IB courses."><i class="faq_qa fa fa-question-circle" aria-hidden="true"></i></a></legend>
            <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                  <select  class="form-control" name="rcothhrnclscnt" id="rcothhrnclscnt" required >
                     <option value="">Please Select</option>
                     <option value="0" selected>0</option>
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
                  </select>
               </label>
            </div>
         </fieldset>
         <fieldset>
            <legend>Do you expect to apply early decision to your first choice college? <a href="javascript:void(0)" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Early decision is a binding commitment between you and the school to attend the college that accepts you as an early decision application. This is different from early action."><i class="faq_qa fa fa-question-circle" aria-hidden="true"></i></a></legend>
            <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                  <select  class="form-control" name="earlyapplydecs" id="earlyapplydecs" required>
                     <option value="">Please Select</option>
                     <option value="1">Yes</option>
                     <option value="0" selected>No</option>
                  </select>
               </label>
            </div>
         </fieldset>

       <fieldset>
           <legend>How many awards have you received? <a href="javascript:void(0)" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Include any awards you received during your high school years that you plan to list on your college applications."><i class="faq_qa fa fa-question-circle" aria-hidden="true"></i></a></legend>
		   <div class="mform_field_wrap">
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
				<select name="awardscnt"  id="awardscnt" class="form-control" required>
					<option value="">Please Select</option>
					<option value="0" selected>0</option>
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
				</select>
				</label>
			</div>
        </fieldset>

         <fieldset>
            <legend>Have you participated in any extracurricular activities?</legend>
            <div class="mform_field_wrap">
               <label class="mod_style_outer mb-0" style="line-height: 35px;">
                  <select  class="form-control" name="is_ecclasses" id="is_ecclasses" required>
                     <option value="">Please Select</option>
                     <option value="Yes" >Yes</option>
                     <option value="No" selected>No</option>
                  </select>
               </label>
            </div>
         </fieldset>



         <fieldset>

		   <legend>First Extracurricular Activity</legend>

		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_1"  name="organization_name_1" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_1">
<input type="checkbox" id="highest_grade_9_1" name="highest_grade_1[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_1" >9</label>
<label class="checkbox-label" for="highest_grade_10_1">
<input type="checkbox" id="highest_grade_10_1" name="highest_grade_1[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_1" >10</label>
<label class="checkbox-label" for="highest_grade_11_1">
<input type="checkbox" id="highest_grade_11_1" name="highest_grade_1[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_1" >11</label>
<label class="checkbox-label" for="highest_grade_12_1">
<input type="checkbox" id="highest_grade_12_1" name="highest_grade_1[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_1" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_1">
<input type="checkbox" id="leadership_roles_1_1" name="leadership_roles_1[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_1" >1</label>
<label class="checkbox-label" for="leadership_roles_2_1">
<input type="checkbox" id="leadership_roles_2_1" name="leadership_roles_1[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_1" >2</label>
<label class="checkbox-label" for="leadership_roles_3_1">
<input type="checkbox" id="leadership_roles_3_1" name="leadership_roles_1[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_1" >3</label>
<label class="checkbox-label" for="leadership_roles_4_1">
<input type="checkbox" id="leadership_roles_4_1" name="leadership_roles_1[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_1" >4</label>
<label class="checkbox-label" for="leadership_roles_none_1">
<input type="checkbox" id="leadership_roles_none_1" name="leadership_roles_1[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_1" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_1" maxlength="150" id="activity_details_1" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

<div class="row">
<button type="button" id="addmore8" class="btn btn-primary mybluebtn">Add More</button>
</div>

         </fieldset>


         <fieldset>

		   <legend>Second Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_2"  name="organization_name_2" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_2">
<input type="checkbox" id="highest_grade_9_2" name="highest_grade_2[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_2" >9</label>
<label class="checkbox-label" for="highest_grade_10_2">
<input type="checkbox" id="highest_grade_10_2" name="highest_grade_2[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_2" >10</label>
<label class="checkbox-label" for="highest_grade_11_2">
<input type="checkbox" id="highest_grade_11_2" name="highest_grade_2[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_2" >11</label>
<label class="checkbox-label" for="highest_grade_12_2">
<input type="checkbox" id="highest_grade_12_2" name="highest_grade_2[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_2" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_2">
<input type="checkbox" id="leadership_roles_1_2" name="leadership_roles_2[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_2" >1</label>
<label class="checkbox-label" for="leadership_roles_2_2">
<input type="checkbox" id="leadership_roles_2_2" name="leadership_roles_2[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_2" >2</label>
<label class="checkbox-label" for="leadership_roles_3_2">
<input type="checkbox" id="leadership_roles_3_2" name="leadership_roles_2[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_2" >3</label>
<label class="checkbox-label" for="leadership_roles_4_2">
<input type="checkbox" id="leadership_roles_4_2" name="leadership_roles_2[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_2" >4</label>
<label class="checkbox-label" for="leadership_roles_none_2">
<input type="checkbox" id="leadership_roles_none_2" name="leadership_roles_2[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_2" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_2" maxlength="150" id="activity_details_2" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore9" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Third Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_3"  name="organization_name_3" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_3">
<input type="checkbox" id="highest_grade_9_3" name="highest_grade_3[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_3" >9</label>
<label class="checkbox-label" for="highest_grade_10_3">
<input type="checkbox" id="highest_grade_10_3" name="highest_grade_3[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_3" >10</label>
<label class="checkbox-label" for="highest_grade_11_3">
<input type="checkbox" id="highest_grade_11_3" name="highest_grade_3[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_3" >11</label>
<label class="checkbox-label" for="highest_grade_12_3">
<input type="checkbox" id="highest_grade_12_3" name="highest_grade_3[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_3" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_3">
<input type="checkbox" id="leadership_roles_1_3" name="leadership_roles_3[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_3" >1</label>
<label class="checkbox-label" for="leadership_roles_2_3">
<input type="checkbox" id="leadership_roles_2_3" name="leadership_roles_3[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_3" >2</label>
<label class="checkbox-label" for="leadership_roles_3_3">
<input type="checkbox" id="leadership_roles_3_3" name="leadership_roles_3[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_3" >3</label>
<label class="checkbox-label" for="leadership_roles_4_3">
<input type="checkbox" id="leadership_roles_4_3" name="leadership_roles_3[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_3" >4</label>
<label class="checkbox-label" for="leadership_roles_none_3">
<input type="checkbox" id="leadership_roles_none_3" name="leadership_roles_3[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_3" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_3" maxlength="150" id="activity_details_3" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore10" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Fourth Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_4"  name="organization_name_4" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_4">
<input type="checkbox" id="highest_grade_9_4" name="highest_grade_4[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_4" >9</label>
<label class="checkbox-label" for="highest_grade_10_4">
<input type="checkbox" id="highest_grade_10_4" name="highest_grade_4[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_4" >10</label>
<label class="checkbox-label" for="highest_grade_11_4">
<input type="checkbox" id="highest_grade_11_4" name="highest_grade_4[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_4" >11</label>
<label class="checkbox-label" for="highest_grade_12_4">
<input type="checkbox" id="highest_grade_12_4" name="highest_grade_4[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_4" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_4">
<input type="checkbox" id="leadership_roles_1_4" name="leadership_roles_4[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_4" >1</label>
<label class="checkbox-label" for="leadership_roles_2_4">
<input type="checkbox" id="leadership_roles_2_4" name="leadership_roles_4[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_4" >2</label>
<label class="checkbox-label" for="leadership_roles_3_4">
<input type="checkbox" id="leadership_roles_3_4" name="leadership_roles_4[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_4" >3</label>
<label class="checkbox-label" for="leadership_roles_4_4">
<input type="checkbox" id="leadership_roles_4_4" name="leadership_roles_4[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_4" >4</label>
<label class="checkbox-label" for="leadership_roles_none_4">
<input type="checkbox" id="leadership_roles_none_4" name="leadership_roles_4[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_4" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_4" maxlength="150" id="activity_details_4" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore11" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Fifth Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_5"  name="organization_name_5" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_5">
<input type="checkbox" id="highest_grade_9_5" name="highest_grade_5[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_5" >9</label>
<label class="checkbox-label" for="highest_grade_10_5">
<input type="checkbox" id="highest_grade_10_5" name="highest_grade_5[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_5" >10</label>
<label class="checkbox-label" for="highest_grade_11_5">
<input type="checkbox" id="highest_grade_11_5" name="highest_grade_5[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_5" >11</label>
<label class="checkbox-label" for="highest_grade_12_5">
<input type="checkbox" id="highest_grade_12_5" name="highest_grade_5[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_5" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_5">
<input type="checkbox" id="leadership_roles_1_5" name="leadership_roles_5[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_5" >1</label>
<label class="checkbox-label" for="leadership_roles_2_5">
<input type="checkbox" id="leadership_roles_2_5" name="leadership_roles_5[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_5" >2</label>
<label class="checkbox-label" for="leadership_roles_3_5">
<input type="checkbox" id="leadership_roles_3_5" name="leadership_roles_5[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_5" >3</label>
<label class="checkbox-label" for="leadership_roles_4_5">
<input type="checkbox" id="leadership_roles_4_5" name="leadership_roles_5[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_5" >4</label>
<label class="checkbox-label" for="leadership_roles_none_5">
<input type="checkbox" id="leadership_roles_none_5" name="leadership_roles_5[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_5" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_5" maxlength="150" id="activity_details_5" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore12" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Sixth Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_6"  name="organization_name_6" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_6">
<input type="checkbox" id="highest_grade_9_6" name="highest_grade_6[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_6" >9</label>
<label class="checkbox-label" for="highest_grade_10_6">
<input type="checkbox" id="highest_grade_10_6" name="highest_grade_6[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_6" >10</label>
<label class="checkbox-label" for="highest_grade_11_6">
<input type="checkbox" id="highest_grade_11_6" name="highest_grade_6[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_6" >11</label>
<label class="checkbox-label" for="highest_grade_12_6">
<input type="checkbox" id="highest_grade_12_6" name="highest_grade_6[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_6" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_6">
<input type="checkbox" id="leadership_roles_1_6" name="leadership_roles_6[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_6" >1</label>
<label class="checkbox-label" for="leadership_roles_2_6">
<input type="checkbox" id="leadership_roles_2_6" name="leadership_roles_6[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_6" >2</label>
<label class="checkbox-label" for="leadership_roles_3_6">
<input type="checkbox" id="leadership_roles_3_6" name="leadership_roles_6[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_6" >3</label>
<label class="checkbox-label" for="leadership_roles_4_6">
<input type="checkbox" id="leadership_roles_4_6" name="leadership_roles_6[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_6" >4</label>
<label class="checkbox-label" for="leadership_roles_none_6">
<input type="checkbox" id="leadership_roles_none_6" name="leadership_roles_6[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_6" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_6" maxlength="150" id="activity_details_6" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore13" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Seventh Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_7"  name="organization_name_7" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_7">
<input type="checkbox" id="highest_grade_9_7" name="highest_grade_7[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_7" >9</label>
<label class="checkbox-label" for="highest_grade_10_7">
<input type="checkbox" id="highest_grade_10_7" name="highest_grade_7[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_7" >10</label>
<label class="checkbox-label" for="highest_grade_11_7">
<input type="checkbox" id="highest_grade_11_7" name="highest_grade_7[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_7" >11</label>
<label class="checkbox-label" for="highest_grade_12_7">
<input type="checkbox" id="highest_grade_12_7" name="highest_grade_7[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_7" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_7">
<input type="checkbox" id="leadership_roles_1_7" name="leadership_roles_7[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_7" >1</label>
<label class="checkbox-label" for="leadership_roles_2_7">
<input type="checkbox" id="leadership_roles_2_7" name="leadership_roles_7[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_7" >2</label>
<label class="checkbox-label" for="leadership_roles_3_7">
<input type="checkbox" id="leadership_roles_3_7" name="leadership_roles_7[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_7" >3</label>
<label class="checkbox-label" for="leadership_roles_4_7">
<input type="checkbox" id="leadership_roles_4_7" name="leadership_roles_7[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_7" >4</label>
<label class="checkbox-label" for="leadership_roles_none_7">
<input type="checkbox" id="leadership_roles_none_7" name="leadership_roles_7[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_7" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_7" maxlength="150" id="activity_details_7" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore14" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Eigth Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_8"  name="organization_name_8" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_8">
<input type="checkbox" id="highest_grade_9_8" name="highest_grade_8[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_8" >9</label>
<label class="checkbox-label" for="highest_grade_10_8">
<input type="checkbox" id="highest_grade_10_8" name="highest_grade_1[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_8" >10</label>
<label class="checkbox-label" for="highest_grade_11_8">
<input type="checkbox" id="highest_grade_11_8" name="highest_grade_8[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_8" >11</label>
<label class="checkbox-label" for="highest_grade_12_8">
<input type="checkbox" id="highest_grade_12_8" name="highest_grade_8[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_8" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_8">
<input type="checkbox" id="leadership_roles_1_8" name="leadership_roles_8[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_8" >1</label>
<label class="checkbox-label" for="leadership_roles_2_8">
<input type="checkbox" id="leadership_roles_2_8" name="leadership_roles_8[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_8" >2</label>
<label class="checkbox-label" for="leadership_roles_3_8">
<input type="checkbox" id="leadership_roles_3_8" name="leadership_roles_8[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_8" >3</label>
<label class="checkbox-label" for="leadership_roles_4_8">
<input type="checkbox" id="leadership_roles_4_8" name="leadership_roles_8[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_8" >4</label>
<label class="checkbox-label" for="leadership_roles_none_8">
<input type="checkbox" id="leadership_roles_none_8" name="leadership_roles_8[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_8" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_8" maxlength="150" id="activity_details_8" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>

		 <div class="row">
<button type="button" id="addmore15" class="btn btn-primary mybluebtn">Add More</button>
</div>
         </fieldset>


         <fieldset>

		   <legend>Ninth Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_9"  name="organization_name_9" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_9">
<input type="checkbox" id="highest_grade_9_9" name="highest_grade_9[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_9" >9</label>
<label class="checkbox-label" for="highest_grade_10_9">
<input type="checkbox" id="highest_grade_10_9" name="highest_grade_9[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_9" >10</label>
<label class="checkbox-label" for="highest_grade_11_9">
<input type="checkbox" id="highest_grade_11_9" name="highest_grade_9[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_9" >11</label>
<label class="checkbox-label" for="highest_grade_12_9">
<input type="checkbox" id="highest_grade_12_9" name="highest_grade_9[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_9" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_9">
<input type="checkbox" id="leadership_roles_1_9" name="leadership_roles_9[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_9" >1</label>
<label class="checkbox-label" for="leadership_roles_2_9">
<input type="checkbox" id="leadership_roles_2_9" name="leadership_roles_9[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_9" >2</label>
<label class="checkbox-label" for="leadership_roles_3_9">
<input type="checkbox" id="leadership_roles_3_9" name="leadership_roles_9[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_9" >3</label>
<label class="checkbox-label" for="leadership_roles_4_9">
<input type="checkbox" id="leadership_roles_4_9" name="leadership_roles_9[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_9" >4</label>
<label class="checkbox-label" for="leadership_roles_none_9">
<input type="checkbox" id="leadership_roles_none_9" name="leadership_roles_9[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_9" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_9" maxlength="150" id="activity_details_9" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>
<div class="row">
<button type="button" id="addmore16" class="btn btn-primary mybluebtn">Add More</button>
</div>

         </fieldset>


         <fieldset>

		   <legend>Tenth Extracurricular Activity</legend>
		 <div class="row" id="activityfield1" style="margin-bottom: 35px;">
<div class="col-md-4"> <div class="mform_field_wrap ">
<textarea class="input1 organization_name_textarea" id="organization_name_10"  name="organization_name_10" required placeholder="Organization Name" maxlength="100"></textarea>
</div></div>
<div class="col-md-4">
<div class="mform_field_wrap">
<span class="pgl_labal">Participation grade levels:</span>
<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="highest_grade_9_10">
<input type="checkbox" id="highest_grade_9_10" name="highest_grade_10[]" value="9">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_9_10" >9</label>
<label class="checkbox-label" for="highest_grade_10_10">
<input type="checkbox" id="highest_grade_10_10" name="highest_grade_10[]" value="10">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_10_10" >10</label>
<label class="checkbox-label" for="highest_grade_11_10">
<input type="checkbox" id="highest_grade_11_10" name="highest_grade_10[]" value="11">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_11_10" >11</label>
<label class="checkbox-label" for="highest_grade_12_10">
<input type="checkbox" id="highest_grade_12_10" name="highest_grade_10[]" value="12">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="highest_grade_12_10" >12</label>
</div>


</div>
<div class="mform_field_wrap">
<span class="lrh_labal">Leadership roles held:</span>

<div class="checkbox-container circular-container" style="margin-top: 10px;display: inline-flex;">
<label class="checkbox-label" for="leadership_roles_1_10">
<input type="checkbox" id="leadership_roles_1_10" name="leadership_roles_10[]" value="1">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_1_10" >1</label>
<label class="checkbox-label" for="leadership_roles_2_10">
<input type="checkbox" id="leadership_roles_2_10" name="leadership_roles_10[]" value="2">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_2_10" >2</label>
<label class="checkbox-label" for="leadership_roles_3_10">
<input type="checkbox" id="leadership_roles_3_10" name="leadership_roles_10[]" value="3">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_3_10" >3</label>
<label class="checkbox-label" for="leadership_roles_4_10">
<input type="checkbox" id="leadership_roles_4_10" name="leadership_roles_10[]" value="4">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_4_10" >4</label>
<label class="checkbox-label" for="leadership_roles_none_10">
<input type="checkbox" id="leadership_roles_none_10" name="leadership_roles_10[]" value="none">
<span class="checkbox-custom circular"></span>
</label>
<label class="form-check-label pgl-label-sub" for="leadership_roles_none_10" >none</label>

</div>
</div></div>
<div class="col-md-4"><div class="mform_field_wrap">
<textarea name="activity_details_10" maxlength="150" id="activity_details_10" class="activity_details_textarea" placeholder="Please describe this activity, including what you accomplished and any recognition you received, etc."></textarea>
</div></div>
</div>


         </fieldset>


		 <p style="margin-top: 35px;">
            <button id="SaveAccount" class="btn btn-primary submit mybluebtn">Submit form</button>
         </p>
      </form>
   </div>
</div>
</div>

<!-- Notification starts -->
<div class="apj-alert hidden">
    <!-- Success Alert -->
    <div class="alert alert-success alert-dismissible ">
       <i class="fa fa-check fa-lg apj-sucess" aria-hidden="true"></i>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong> Success!</strong> A simple success alert

    </div>
    <!-- Error Alert -->
    <div class="alert alert-danger alert-dismissible ">
      <i class="fa fa-exclamation-triangle fa-lg apj-error" aria-hidden="true"></i>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong> Error!</strong> A simple danger alert

    </div>
</div>
<!-- Notification ends -->

<?php include 'footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="js/jquery.formtowizard.js"></script>
<script src="js/multi-step-form-header.js"></script>
<script type="text/javascript">$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});</script>
<script>

var stepno = 0;
 function gotostrep(no)
   {
	   //if(no > stepno)
	   {
		   $('#SignupForm').formToWizard('GotoStep', no);
		    
	   }
   }
   
   
   $( function() {
       var $signupForm = $( '#SignupForm' );
       $signupForm.validate({errorElement: 'em'});
       $signupForm.formToWizard({
           submitButton: 'SaveAccount',
           nextBtnClass: 'btn btn-primary next mybluebtn',
           prevBtnClass: 'btn btn-default prev mybluebtn blue-outline',
   nextBtnName: 'Next',
   prevBtnName: 'Back',
           buttonTag:    'button',
           validateBeforeNext: function(form, step) {
               var stepIsValid = true;
               var validator = form.validate();
               $(':input', step).each( function(index) {
                   var xy = validator.element(this);
                   stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
               });
               return stepIsValid;
           },
           progress: function (i, count) {
                $('#progress-complete').width('' + (i / count * 100) + '%');
				stepno = i;
				  if(i == '0'){
					   $("#sub-category-profile").hide(); 
				  }
				   else
				   {
						$("#sub-category-profile").show();
					   
				   }
    if(i == '1'){
						    $("#sp1").removeClass("gray-number"); 
						   $("#sp2").addClass("gray-number"); 
						   $("#sp3").addClass("gray-number"); 
						   $("#sp4").addClass("gray-number"); 
						   $("#sp5").addClass("gray-number"); 
						   $("#sp6").addClass("gray-number"); 
						   $("#sp7").addClass("gray-number"); 
               $("#sp1").addClass("inactive-number-right"); 
               $("#sp2").addClass("inactive-number-left"); 
               $("#sp2").addClass("inactive-number-right"); 
               $("#sp3").addClass("inactive-number-left"); 
               $("#sp3").addClass("inactive-number-right"); 
               $("#sp4").addClass("inactive-number-left"); 
               $("#sp4").addClass("inactive-number-right");
               $("#sp5").addClass("inactive-number-left"); 
               $("#sp5").addClass("inactive-number-right");
               $("#sp6").addClass("inactive-number-left"); 
               $("#sp6").addClass("inactive-number-right");
               $("#sp7").addClass("inactive-number-left");
						
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
					  
					   if(i == '2'){
						    $("#sp1").removeClass("gray-number"); 
						   $("#sp2").removeClass("gray-number"); 
						   $("#sp3").addClass("gray-number"); 
						   $("#sp4").addClass("gray-number"); 
						   $("#sp5").addClass("gray-number"); 
						   $("#sp6").addClass("gray-number"); 
						   $("#sp7").addClass("gray-number");
               $("#sp1").removeClass("inactive-number-right"); 
               $("#sp2").removeClass("inactive-number-left"); 
               $("#sp2").addClass("inactive-number-right"); 
               $("#sp3").addClass("inactive-number-left"); 
               $("#sp3").addClass("inactive-number-right"); 
               $("#sp4").addClass("inactive-number-left"); 
               $("#sp4").addClass("inactive-number-right");
               $("#sp5").addClass("inactive-number-left"); 
               $("#sp5").addClass("inactive-number-right");
               $("#sp6").addClass("inactive-number-left"); 
               $("#sp6").addClass("inactive-number-right");
               $("#sp7").addClass("inactive-number-left");  
						  
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
						if(i == '3'){
						  
						   $("#sp1").removeClass("gray-number"); 
						   $("#sp2").removeClass("gray-number"); 
						   $("#sp3").removeClass("gray-number"); 
						   $("#sp4").addClass("gray-number"); 
						   $("#sp5").addClass("gray-number"); 
						   $("#sp6").addClass("gray-number"); 
						   $("#sp7").addClass("gray-number"); 
               $("#sp1").removeClass("inactive-number-right"); 
               $("#sp2").removeClass("inactive-number-left"); 
               $("#sp2").removeClass("inactive-number-right"); 
               $("#sp3").removeClass("inactive-number-left"); 
               $("#sp3").addClass("inactive-number-right"); 
               $("#sp4").addClass("inactive-number-left"); 
               $("#sp4").addClass("inactive-number-right");
               $("#sp5").addClass("inactive-number-left"); 
               $("#sp5").addClass("inactive-number-right");
               $("#sp6").addClass("inactive-number-left"); 
               $("#sp6").addClass("inactive-number-right");
               $("#sp7").addClass("inactive-number-left"); 
						  
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
					   
					   
					   if(i == '4' || i == '5'){
						  
						   $("#sp1").removeClass("gray-number"); 
						   $("#sp2").removeClass("gray-number"); 
						   $("#sp3").removeClass("gray-number"); 
						   $("#sp4").removeClass("gray-number"); 
						   $("#sp5").addClass("gray-number"); 
						   $("#sp6").addClass("gray-number"); 
						   $("#sp7").addClass("gray-number");
               $("#sp1").removeClass("inactive-number-right"); 
               $("#sp2").removeClass("inactive-number-left"); 
               $("#sp2").removeClass("inactive-number-right"); 
               $("#sp3").removeClass("inactive-number-left"); 
               $("#sp3").removeClass("inactive-number-right"); 
               $("#sp4").removeClass("inactive-number-left"); 
               $("#sp4").addClass("inactive-number-right");
               $("#sp5").addClass("inactive-number-left"); 
               $("#sp5").addClass("inactive-number-right");
               $("#sp6").addClass("inactive-number-left"); 
               $("#sp6").addClass("inactive-number-right"); 
               $("#sp7").addClass("inactive-number-left"); 
						  
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
					   
					   
					   if(i == '6'){
						  
						   $("#sp1").removeClass("gray-number"); 
						   $("#sp2").removeClass("gray-number"); 
						   $("#sp3").removeClass("gray-number"); 
						   $("#sp4").removeClass("gray-number"); 
						   $("#sp5").removeClass("gray-number"); 
						   $("#sp6").addClass("gray-number");
						   $("#sp7").addClass("gray-number"); 
               $("#sp1").removeClass("inactive-number-right"); 
               $("#sp2").removeClass("inactive-number-left"); 
               $("#sp2").removeClass("inactive-number-right"); 
               $("#sp3").removeClass("inactive-number-left"); 
               $("#sp3").removeClass("inactive-number-right"); 
               $("#sp4").removeClass("inactive-number-left"); 
               $("#sp4").removeClass("inactive-number-right");
               $("#sp5").removeClass("inactive-number-left"); 
               $("#sp5").addClass("inactive-number-right");
               $("#sp6").addClass("inactive-number-left"); 
               $("#sp6").addClass("inactive-number-right"); 
               $("#sp7").addClass("inactive-number-left"); 
						  
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
					   
					   	   
					   if(i == '7'){
						  
						   $("#sp1").removeClass("gray-number"); 
						   $("#sp2").removeClass("gray-number"); 
						   $("#sp3").removeClass("gray-number"); 
						   $("#sp4").removeClass("gray-number"); 
						   $("#sp5").removeClass("gray-number"); 
						   $("#sp6").removeClass("gray-number"); 
						   $("#sp7").addClass("gray-number");
               $("#sp1").removeClass("inactive-number-right"); 
               $("#sp2").removeClass("inactive-number-left"); 
               $("#sp2").removeClass("inactive-number-right"); 
               $("#sp3").removeClass("inactive-number-left"); 
               $("#sp3").removeClass("inactive-number-right"); 
               $("#sp4").removeClass("inactive-number-left"); 
               $("#sp4").removeClass("inactive-number-right");
               $("#sp5").removeClass("inactive-number-left"); 
               $("#sp5").removeClass("inactive-number-right");
               $("#sp6").removeClass("inactive-number-left");  
               $("#sp6").addClass("inactive-number-right");  
               $("#sp7").addClass("inactive-number-left");
						  
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
					   
					    if(i == '8'){
						  
						   $("#sp1").removeClass("gray-number"); 
						   $("#sp2").removeClass("gray-number"); 
						   $("#sp3").removeClass("gray-number"); 
						   $("#sp4").removeClass("gray-number"); 
						   $("#sp5").removeClass("gray-number"); 
						   $("#sp6").removeClass("gray-number"); 
						   $("#sp7").removeClass("gray-number"); 
               $("#sp1").removeClass("inactive-number-right"); 
               $("#sp2").removeClass("inactive-number-left"); 
               $("#sp2").removeClass("inactive-number-right"); 
               $("#sp3").removeClass("inactive-number-left"); 
               $("#sp3").removeClass("inactive-number-right"); 
               $("#sp4").removeClass("inactive-number-left"); 
               $("#sp4").removeClass("inactive-number-right");
               $("#sp5").removeClass("inactive-number-left"); 
               $("#sp5").removeClass("inactive-number-right");
               $("#sp6").removeClass("inactive-number-left"); 
               $("#sp6").removeClass("inactive-number-right"); 
               $("#sp7").removeClass("inactive-number-left");
						  
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }
           }
       });
   });

   $(document).ready(function () {
	 $("#step8Prev").after('<button type="submit" id="btnsearchstep7" class="btn btn-primary mybluebtn" >Finish</button>');
   
   $("#testsatscore_sat_fields").hide();
   $("#testactscore_act_fields").hide();
   
<?php
if(isset($_SESSION['data_profile'])){
	if(isset($_SESSION['data_profile']['hsgradyear'])){
		echo '$("#hsgradyear").val("'.$_SESSION['data_profile']['hsgradyear'].'");';
	}	
	
	if(isset($_SESSION['data_profile']['testchoice'])){
		echo '$("#testchoice").val("'.$_SESSION['data_profile']['testchoice'].'");';
		
		if($_SESSION['data_profile']['testchoice'] == 'ACT')
		{
			echo ' $("#testsatscore_sat_fields").hide();$("#testactscore_act_fields").show();';
			echo '$("#testactscore_act").val("'.$_SESSION['data_profile']['testactscore_act'].'");';
		}
		else if($_SESSION['data_profile']['testchoice'] == 'SAT')
		{
			echo '  $("#testsatscore_sat_fields").show(); $("#testactscore_act_fields").hide();';
			echo '$("#testsatscore_sat").val("'.$_SESSION['data_profile']['testsatscore_sat'].'");';
		}
		else
		{
			echo ' $("#testsatscore_sat_fields").hide(); $("#testactscore_act_fields").hide();';
		}
	}	
	if(isset($_SESSION['data_profile']['gpa'])){
		echo '$("#gpa").val("'.$_SESSION['data_profile']['gpa'].'");';
	}
	
	if(isset($_SESSION['data_profile']['rcapclscnt'])){
		echo '$("#rcapclscnt").val("'.$_SESSION['data_profile']['rcapclscnt'].'");';
	}
	
	if(isset($_SESSION['data_profile']['rcothhrnclscnt'])){
		echo '$("#rcothhrnclscnt").val("'.$_SESSION['data_profile']['rcothhrnclscnt'].'");';
	}
	
	if(isset($_SESSION['data_profile']['earlyapplydecs'])){
		echo '$("#earlyapplydecs").val("'.$_SESSION['data_profile']['earlyapplydecs'].'");';
	}
	
	if(isset($_SESSION['data_profile']['awardscnt'])){
		echo '$("#awardscnt").val("'.$_SESSION['data_profile']['awardscnt'].'");';
	}
		
	if(isset($_SESSION['data_profile']['is_ecclasses'])){
		echo '$("#is_ecclasses").val("'.$_SESSION['data_profile']['is_ecclasses'].'");';
		
		if($_SESSION['data_profile']['is_ecclasses'] == 'Yes')
		{
			echo '$("#btnsearchstep7").hide();$("#step8Next").show();';
			
		}
		else
		{
			echo '$("#btnsearchstep7").show();
			$("#step8Next").hide();';
		}
	}
	
	
	if(isset($_SESSION['data_profile']['organization_name_1'])){
		echo '$("#organization_name_1").val("'.$_SESSION['data_profile']['organization_name_1'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_2'])){
		echo '$("#organization_name_2").val("'.$_SESSION['data_profile']['organization_name_2'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_3'])){
		echo '$("#organization_name_3").val("'.$_SESSION['data_profile']['organization_name_3'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_4'])){
		echo '$("#organization_name_4").val("'.$_SESSION['data_profile']['organization_name_4'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_5'])){
		echo '$("#organization_name_5").val("'.$_SESSION['data_profile']['organization_name_5'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_6'])){
		echo '$("#organization_name_6").val("'.$_SESSION['data_profile']['organization_name_6'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_7'])){
		echo '$("#organization_name_7").val("'.$_SESSION['data_profile']['organization_name_7'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_8'])){
		echo '$("#organization_name_8").val("'.$_SESSION['data_profile']['organization_name_8'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_9'])){
		echo '$("#organization_name_9").val("'.$_SESSION['data_profile']['organization_name_9'].'");';
	}
	if(isset($_SESSION['data_profile']['organization_name_10'])){
		echo '$("#organization_name_10").val("'.$_SESSION['data_profile']['organization_name_10'].'");';
	}
	
	if(isset($_SESSION['data_profile']['activity_details_1'])){
		echo '$("#activity_details_1").val("'.$_SESSION['data_profile']['activity_details_1'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_2'])){
		echo '$("#activity_details_2").val("'.$_SESSION['data_profile']['activity_details_2'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_3'])){
		echo '$("#activity_details_3").val("'.$_SESSION['data_profile']['activity_details_3'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_4'])){
		echo '$("#activity_details_4").val("'.$_SESSION['data_profile']['activity_details_4'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_5'])){
		echo '$("#activity_details_5").val("'.$_SESSION['data_profile']['activity_details_5'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_6'])){
		echo '$("#activity_details_6").val("'.$_SESSION['data_profile']['activity_details_6'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_7'])){
		echo '$("#activity_details_7").val("'.$_SESSION['data_profile']['activity_details_7'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_8'])){
		echo '$("#activity_details_8").val("'.$_SESSION['data_profile']['activity_details_8'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_9'])){
		echo '$("#activity_details_9").val("'.$_SESSION['data_profile']['activity_details_9'].'");';
	}
	if(isset($_SESSION['data_profile']['activity_details_10'])){
		echo '$("#activity_details_10").val("'.$_SESSION['data_profile']['activity_details_10'].'");';
	}
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_10']))
	{
		echo 'document.getElementById("highest_grade_9_10").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_10']))
	{
		echo 'document.getElementById("highest_grade_10_10").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_10']))
	{
		echo 'document.getElementById("highest_grade_11_10").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_10']))
	{
		echo 'document.getElementById("highest_grade_12_10").checked = true;';
	}
	
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_9']))
	{
		echo 'document.getElementById("highest_grade_9_9").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_9']))
	{
		echo 'document.getElementById("highest_grade_10_9").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_9']))
	{
		echo 'document.getElementById("highest_grade_11_9").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_9']))
	{
		echo 'document.getElementById("highest_grade_12_9").checked = true;';
	}
	
	
	
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_8']))
	{
		echo 'document.getElementById("highest_grade_9_8").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_8']))
	{
		echo 'document.getElementById("highest_grade_10_8").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_8']))
	{
		echo 'document.getElementById("highest_grade_11_8").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_8']))
	{
		echo 'document.getElementById("highest_grade_12_8").checked = true;';
	}
	
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_7']))
	{
		echo 'document.getElementById("highest_grade_9_7").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_7']))
	{
		echo 'document.getElementById("highest_grade_10_7").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_7']))
	{
		echo 'document.getElementById("highest_grade_11_7").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_7']))
	{
		echo 'document.getElementById("highest_grade_12_7").checked = true;';
	}
	
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_6']))
	{
		echo 'document.getElementById("highest_grade_9_6").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_6']))
	{
		echo 'document.getElementById("highest_grade_10_6").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_6']))
	{
		echo 'document.getElementById("highest_grade_11_6").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_6']))
	{
		echo 'document.getElementById("highest_grade_12_6").checked = true;';
	}
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_5']))
	{
		echo 'document.getElementById("highest_grade_9_5").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_5']))
	{
		echo 'document.getElementById("highest_grade_10_5").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_5']))
	{
		echo 'document.getElementById("highest_grade_11_5").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_5']))
	{
		echo 'document.getElementById("highest_grade_12_5").checked = true;';
	}
	
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_4']))
	{
		echo 'document.getElementById("highest_grade_9_4").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_4']))
	{
		echo 'document.getElementById("highest_grade_10_4").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_4']))
	{
		echo 'document.getElementById("highest_grade_11_4").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_4']))
	{
		echo 'document.getElementById("highest_grade_12_4").checked = true;';
	}
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_3']))
	{
		echo 'document.getElementById("highest_grade_9_3").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_3']))
	{
		echo 'document.getElementById("highest_grade_10_3").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_3']))
	{
		echo 'document.getElementById("highest_grade_11_3").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_3']))
	{
		echo 'document.getElementById("highest_grade_12_3").checked = true;';
	}
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_2']))
	{
		echo 'document.getElementById("highest_grade_9_2").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_2']))
	{
		echo 'document.getElementById("highest_grade_10_2").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_2']))
	{
		echo 'document.getElementById("highest_grade_11_2").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_2']))
	{
		echo 'document.getElementById("highest_grade_12_2").checked = true;';
	}
	
	
	
	if (in_array("9",$_SESSION['data_profile']['highest_grade_1']))
	{
		echo 'document.getElementById("highest_grade_9_1").checked = true;';
	}
	if (in_array("10",$_SESSION['data_profile']['highest_grade_1']))
	{
		echo 'document.getElementById("highest_grade_10_1").checked = true;';
	}
	if (in_array("11",$_SESSION['data_profile']['highest_grade_1']))
	{
		echo 'document.getElementById("highest_grade_11_1").checked = true;';
	}
	if (in_array("12",$_SESSION['data_profile']['highest_grade_1']))
	{
		echo 'document.getElementById("highest_grade_12_1").checked = true;';
	}
	
	
	
	
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_10']))
	{
		echo 'document.getElementById("leadership_roles_1_10").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_10']))
	{
		echo 'document.getElementById("leadership_roles_2_10").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_10']))
	{
		echo 'document.getElementById("leadership_roles_3_10").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_10']))
	{
		echo 'document.getElementById("leadership_roles_4_10").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_10']))
	{
		echo 'document.getElementById("leadership_roles_none_10").checked = true;';
	}
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_9']))
	{
		echo 'document.getElementById("leadership_roles_1_9").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_9']))
	{
		echo 'document.getElementById("leadership_roles_2_9").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_9']))
	{
		echo 'document.getElementById("leadership_roles_3_9").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_9']))
	{
		echo 'document.getElementById("leadership_roles_4_9").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_9']))
	{
		echo 'document.getElementById("leadership_roles_none_9").checked = true;';
	}
	
	
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_8']))
	{
		echo 'document.getElementById("leadership_roles_1_8").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_8']))
	{
		echo 'document.getElementById("leadership_roles_2_8").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_8']))
	{
		echo 'document.getElementById("leadership_roles_3_8").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_8']))
	{
		echo 'document.getElementById("leadership_roles_4_8").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_8']))
	{
		echo 'document.getElementById("leadership_roles_none_8").checked = true;';
	}
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_7']))
	{
		echo 'document.getElementById("leadership_roles_1_7").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_7']))
	{
		echo 'document.getElementById("leadership_roles_2_7").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_7']))
	{
		echo 'document.getElementById("leadership_roles_3_7").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_7']))
	{
		echo 'document.getElementById("leadership_roles_4_7").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_7']))
	{
		echo 'document.getElementById("leadership_roles_none_7").checked = true;';
	}
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_6']))
	{
		echo 'document.getElementById("leadership_roles_1_6").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_6']))
	{
		echo 'document.getElementById("leadership_roles_2_6").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_6']))
	{
		echo 'document.getElementById("leadership_roles_3_6").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_6']))
	{
		echo 'document.getElementById("leadership_roles_4_6").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_6']))
	{
		echo 'document.getElementById("leadership_roles_none_6").checked = true;';
	}
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_5']))
	{
		echo 'document.getElementById("leadership_roles_1_5").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_5']))
	{
		echo 'document.getElementById("leadership_roles_2_5").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_5']))
	{
		echo 'document.getElementById("leadership_roles_3_5").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_5']))
	{
		echo 'document.getElementById("leadership_roles_4_5").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_5']))
	{
		echo 'document.getElementById("leadership_roles_none_5").checked = true;';
	}
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_4']))
	{
		echo 'document.getElementById("leadership_roles_1_4").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_4']))
	{
		echo 'document.getElementById("leadership_roles_2_4").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_4']))
	{
		echo 'document.getElementById("leadership_roles_3_4").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_4']))
	{
		echo 'document.getElementById("leadership_roles_4_4").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_4']))
	{
		echo 'document.getElementById("leadership_roles_none_4").checked = true;';
	}
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_3']))
	{
		echo 'document.getElementById("leadership_roles_1_3").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_3']))
	{
		echo 'document.getElementById("leadership_roles_2_3").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_3']))
	{
		echo 'document.getElementById("leadership_roles_3_3").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_3']))
	{
		echo 'document.getElementById("leadership_roles_4_3").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_3']))
	{
		echo 'document.getElementById("leadership_roles_none_3").checked = true;';
	}
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_2']))
	{
		echo 'document.getElementById("leadership_roles_1_2").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_2']))
	{
		echo 'document.getElementById("leadership_roles_2_2").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_2']))
	{
		echo 'document.getElementById("leadership_roles_3_2").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_2']))
	{
		echo 'document.getElementById("leadership_roles_4_2").checked = true;';
	}
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_2']))
	{
		echo 'document.getElementById("leadership_roles_none_2").checked = true;';
	}
	
	
	if (in_array("1",$_SESSION['data_profile']['leadership_roles_1']))
	{
		echo 'document.getElementById("leadership_roles_1_1").checked = true;';
	}
	if (in_array("2",$_SESSION['data_profile']['leadership_roles_1']))
	{
		echo 'document.getElementById("leadership_roles_2_1").checked = true;';
	}
	if (in_array("3",$_SESSION['data_profile']['leadership_roles_1']))
	{
		echo 'document.getElementById("leadership_roles_3_1").checked = true;';
	}
	if (in_array("4",$_SESSION['data_profile']['leadership_roles_1']))
	{
		echo 'document.getElementById("leadership_roles_4_1").checked = true;';
	}
	
	if (in_array("none",$_SESSION['data_profile']['leadership_roles_1']))
	{
		echo 'document.getElementById("leadership_roles_none_1").checked = true;';
	}
}
?>

   $("input:checkbox[name='leadership_roles_1[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});



	   $("input:checkbox[name='leadership_roles_2[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


	   $("input:checkbox[name='leadership_roles_3[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


	   $("input:checkbox[name='leadership_roles_4[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


	   $("input:checkbox[name='leadership_roles_5[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


	   $("input:checkbox[name='leadership_roles_6[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


	   $("input:checkbox[name='leadership_roles_7[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


	   $("input:checkbox[name='leadership_roles_8[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});

	   $("input:checkbox[name='leadership_roles_9[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});

	   $("input:checkbox[name='leadership_roles_10[]']").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});


    
	//$("#btnsearchstep7").show();

//$("#step8Next").hide();
$("#step9Next").hide();
$("#step10Next").hide();
$("#step11Next").hide();
$("#step12Next").hide();
$("#step13Next").hide();
$("#step14Next").hide();
$("#step15Next").hide();
$("#step16Next").hide();
$("#step17Next").hide();
$("#step18Next").hide();
$("#SaveAccount").hide();



	 $("#step9Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step10Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step11Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step12Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step13Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step14Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step15Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step16Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step17Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');
	 $("#step18Prev").after('<button type="submit"  class="btn btn-primary mybluebtn" >Finish</button>');

	  $("#addmore8").click(function () {
		  $( '#step9Next').trigger( "click" );
	  });
	   $("#addmore9").click(function () {
		  $( '#step10Next').trigger( "click" );
	  });
	   $("#addmore10").click(function () {
		  $( '#step11Next').trigger( "click" );
	  });
	   $("#addmore11").click(function () {
		  $( '#step12Next').trigger( "click" );
	  });
	   $("#addmore12").click(function () {
		  $( '#step13Next').trigger( "click" );
	  });
	   $("#addmore13").click(function () {
		  $( '#step14Next').trigger( "click" );
	  });
	   $("#addmore14").click(function () {
		  $( '#step15Next').trigger( "click" );
	  });
	   $("#addmore15").click(function () {
		  $( '#step16Next').trigger( "click" );
	  });
	   $("#addmore16").click(function () {
		  $( '#step17Next').trigger( "click" );
	  });


 // $('#SignupForm').formToWizard('GotoStep', 8);
   $("#step0Next").html("I Understand");


   $('#step10commands').addClass('col-md-12');
   $('#step7commands').addClass('col-md-12');
   //$("#testchoice_fields").hide();
   /*
   $("#is_satact").change(function () {
   var is_satact = $("#is_satact").val();
   if(is_satact == 'YES')
   {
   $("#testchoice_fields").show();
   }
   else
   {
   $("#testchoice_fields").hide();
   }
   $("#testchoice").val('');
   $("#testsatscore_sat").val('');
   $("#testactscore_act").val('');
   $("#testsatscore_sat_fields").hide();
   $("#testactscore_act_fields").hide();
   });
   */
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
   //$("#rcapclscnt").hide();
   //$("#rcothhrnclscnt").hide();
   $("#step2Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step3Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step4Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step5Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step6Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step7Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step8Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step9Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step10Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step11Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step12Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#step13Next").after(" <p class='small mb-0 mt-3 text-center'></p>");
   $("#SaveAccount").html("Search");
   /*
   $("#step2Next").click(function () {
   var is_satact = $("#is_satact").val();
   if(is_satact == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 7);
   }
   });
   $("#step6Prev").click(function () {
   var is_satact = $("#is_satact").val();
   if(is_satact == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 3);
   }
   });
   $("#step3Next").click(function () {
   var testchoice = $("#testchoice").val();
   if(testchoice == 'ACT')
   {
   $('#SignupForm').formToWizard('GotoStep', 6);
   }
   });
   $("#step5Prev").click(function () {
   var testchoice = $("#testchoice").val();
   if(testchoice == 'ACT')
   {
   $('#SignupForm').formToWizard('GotoStep', 4);
   }
   });
   $("#step6Prev").click(function () {
   var testchoice = $("#testchoice").val();
   if(testchoice == 'SAT')
   {
   $('#SignupForm').formToWizard('GotoStep', 5);
   }
   });
   $("#step4Next").click(function () {
   var testsatscore_sat = $("#testsatscore_sat").val();
   if(testsatscore_sat != '')
   {
   $('#SignupForm').formToWizard('GotoStep', 7);
   }
   });
   $("#is_rcapclscnt").change(function () {
   var is_rcapclscnt = $("#is_rcapclscnt").val();
   if(is_rcapclscnt == 'YES')
   {
   $('#rcapclscnt').show();
   $('.classes-sec-label').show();
   $('#rcapclscnt').prop('required',true);
   }
   else
   {
   $('#rcapclscnt').hide();
   $('.classes-sec-label').hide();
   $('#rcapclscnt').prop('required',false);
   $('#rcapclscnt-error').hide();
   }
   $('#rcapclscnt').val('');
   });
   $("#is_rcothhrnclscnt").change(function () {
   var is_rcothhrnclscnt = $("#is_rcothhrnclscnt").val();
   if(is_rcothhrnclscnt == 'YES')
   {
   $('#rcothhrnclscnt').show();
   $('.honors-sec-label').show();
   $('#rcothhrnclscnt').prop('required',true);
   }
   else
   {
   $('#rcothhrnclscnt-error').hide();
   $('#rcothhrnclscnt').hide();
   $('.honors-sec-label').hide();
   $('#rcothhrnclscnt').prop('required',false);
   }
   $('#rcothhrnclscnt').val('');
   });
   */
   $("#is_ecclasses").change(function () {
	   var is_ecclasses = $("#is_ecclasses").val();
	   if(is_ecclasses == 'Yes')
	   {
			$("#btnsearchstep7").hide();
			$("#step8Next").show();
	   }
	   else
	   {
			$("#btnsearchstep7").show();
			$("#step8Next").hide();
	   }
   });
   /*
   $("#step6Next").click(function () {
   var is_rcapclscnt = $("#is_rcapclscnt").val();
   if(is_rcapclscnt == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 9);
   }
   });
   $("#step8Prev").click(function () {
   var is_rcapclscnt = $("#is_rcapclscnt").val();
   if(is_rcapclscnt == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 7);
   }
   });
   $("#step10Prev").click(function () {
   var is_rcothhrnclscnt = $("#is_rcothhrnclscnt").val();
   if(is_rcothhrnclscnt == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 9);
   }
   });
   $("#step8Next").click(function () {
   var is_rcothhrnclscnt = $("#is_rcothhrnclscnt").val();
   if(is_rcothhrnclscnt == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 11);
   }
   });
   $("#step11Next").click(function () {
   var is_ecclasses = $("#is_ecclasses").val();
   if(is_ecclasses == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 17);
   }
   });
   $("#step16Prev").click(function () {
   var is_ecclasses = $("#is_ecclasses").val();
   if(is_ecclasses == 'NO')
   {
   $('#SignupForm').formToWizard('GotoStep', 12);
   }
   });
   */
   /*
   $("#chk_midwest").click(function () {
   var midwest = document.getElementById("midwest").checked;
   if(midwest)
   {
   $( "#chk_midwest" ).removeClass( "selected" );
   document.getElementById("midwest").checked == false;
   }
   else
   {
   $( "#chk_midwest" ).addClass( "selected" );
   document.getElementById("midwest").checked == true;
   }
   });

   $("#chk_PARTIC_MEN_").click(function () {
   var PARTIC_MEN_ = document.getElementById("PARTIC_MEN_").checked;
   if(PARTIC_MEN_)
   {
   $( "#chk_PARTIC_MEN_" ).removeClass( "selected" );
   document.getElementById("PARTIC_MEN_").checked == false;
   }
   else
   {
   $( "#chk_PARTIC_MEN_" ).addClass( "selected" );
   document.getElementById("PARTIC_MEN_").checked == true;
   }
   });
   $("#chk_PARTIC_WOMEN_").click(function () {
   var PARTIC_WOMEN_ = document.getElementById("PARTIC_WOMEN_").checked;
   if(PARTIC_WOMEN_)
   {
   $( "#chk_PARTIC_WOMEN_" ).removeClass( "selected" );
   document.getElementById("PARTIC_WOMEN_").checked == false;
   }
   else
   {
   $( "#chk_PARTIC_WOMEN_" ).addClass( "selected" );
   document.getElementById("PARTIC_WOMEN_").checked == true;
   }
   });
 
   $('.js-example-basic-multiple').select2();
*/


   });
$('[data-toggle="popover"]').popover({
    container: 'body'
});
</script>
