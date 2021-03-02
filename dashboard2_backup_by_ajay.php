<?php
session_start();
include 'header.php';
$userid = $_SESSION['userid'];

if(isset($_POST))
{
	if(isset($_POST['hsgradyear'])){$hsgradyear = $_POST['hsgradyear']; } else {  $hsgradyear = ''; }
	if(isset($_POST['testchoice'])){$testchoice = $_POST['testchoice']; } else {  $testchoice = ''; }
	if(isset($_POST['testsatscore_sat'])){$testsatscore_sat = $_POST['testsatscore_sat']; } else {  $testsatscore_sat = ''; }
	if(isset($_POST['testactscore_act'])){$testactscore_act = $_POST['testactscore_act']; } else {  $testactscore_act = ''; }
	if(isset($_POST['gpa'])){$gpa = $_POST['gpa']; } else {  $gpa = ''; }
	if(isset($_POST['rcapclscnt'])){$rcapclscnt = $_POST['rcapclscnt']; } else {  $rcapclscnt = ''; }
	if(isset($_POST['rcothhrnclscnt'])){$rcothhrnclscnt = $_POST['rcothhrnclscnt']; } else {  $rcothhrnclscnt = ''; }
	if(isset($_POST['earlyapplydecs'])){$earlyapplydecs = $_POST['earlyapplydecs']; } else {  $earlyapplydecs = ''; }
	if(isset($_POST['awardscnt'])){$awardscnt = $_POST['awardscnt']; } else {  $awardscnt = ''; }
	if(isset($_POST['is_ecclasses'])){$is_ecclasses = $_POST['is_ecclasses']; } else {  $is_ecclasses = ''; }
	if(isset($_POST['organization_name_1'])){$organization_name_1 = $_POST['organization_name_1']; } else {  $organization_name_1 = ''; }
	if(isset($_POST['highest_grade_1'])){$highest_grade_1 = $_POST['highest_grade_1']; } else {  $highest_grade_1 = ''; }
	if(isset($_POST['leadership_roles_1'])){$leadership_roles_1 = $_POST['leadership_roles_1']; } else {  $leadership_roles_1 = ''; }
	if(isset($_POST['activity_details_1'])){$activity_details_1 = $_POST['activity_details_1']; } else {  $activity_details_1 = ''; }
	if(isset($_POST['organization_name_2'])){$organization_name_2 = $_POST['organization_name_2']; } else {  $organization_name_2 = ''; }
	if(isset($_POST['highest_grade_2'])){$highest_grade_2 = $_POST['highest_grade_2']; } else {  $highest_grade_2 = ''; }
	if(isset($_POST['leadership_roles_2'])){$leadership_roles_2 = $_POST['leadership_roles_2']; } else {  $leadership_roles_2 = ''; }
	if(isset($_POST['activity_details_2'])){$activity_details_2 = $_POST['activity_details_2']; } else {  $activity_details_2 = ''; }
	if(isset($_POST['organization_name_3'])){$organization_name_3 = $_POST['organization_name_3']; } else {  $organization_name_3 = ''; }
	if(isset($_POST['highest_grade_3'])){$highest_grade_3 = $_POST['highest_grade_3']; } else {  $highest_grade_3 = ''; }
	if(isset($_POST['leadership_roles_3'])){$leadership_roles_3 = $_POST['leadership_roles_3']; } else {  $leadership_roles_3 = ''; }
	if(isset($_POST['activity_details_3'])){$activity_details_3 = $_POST['activity_details_3']; } else {  $activity_details_3 = ''; }
	if(isset($_POST['organization_name_4'])){$organization_name_4 = $_POST['organization_name_4']; } else {  $organization_name_4 = ''; }
	if(isset($_POST['highest_grade_4'])){$highest_grade_4 = $_POST['highest_grade_4']; } else {  $highest_grade_4 = ''; }
	if(isset($_POST['leadership_roles_4'])){$leadership_roles_4 = $_POST['leadership_roles_4']; } else {  $leadership_roles_4 = ''; }
	if(isset($_POST['activity_details_4'])){$activity_details_4 = $_POST['activity_details_4']; } else {  $activity_details_4 = ''; }
	if(isset($_POST['organization_name_5'])){$organization_name_5 = $_POST['organization_name_5']; } else {  $organization_name_5 = ''; }
	if(isset($_POST['highest_grade_5'])){$highest_grade_5 = $_POST['highest_grade_5']; } else {  $highest_grade_5 = ''; }
	if(isset($_POST['leadership_roles_5'])){$leadership_roles_5 = $_POST['leadership_roles_5']; } else {  $leadership_roles_5 = ''; }
	if(isset($_POST['activity_details_5'])){$activity_details_5 = $_POST['activity_details_5']; } else {  $activity_details_5 = ''; }
	if(isset($_POST['organization_name_6'])){$organization_name_6 = $_POST['organization_name_6']; } else {  $organization_name_6 = ''; }
	if(isset($_POST['highest_grade_6'])){$highest_grade_6 = $_POST['highest_grade_6']; } else {  $highest_grade_6 = ''; }
	if(isset($_POST['leadership_roles_6'])){$leadership_roles_6 = $_POST['leadership_roles_6']; } else {  $leadership_roles_6 = ''; }
	if(isset($_POST['activity_details_6'])){$activity_details_6 = $_POST['activity_details_6']; } else {  $activity_details_6 = ''; }
	if(isset($_POST['organization_name_7'])){$organization_name_7 = $_POST['organization_name_7']; } else {  $organization_name_7 = ''; }
	if(isset($_POST['highest_grade_7'])){$highest_grade_7 = $_POST['highest_grade_7']; } else {  $highest_grade_7 = ''; }
	if(isset($_POST['leadership_roles_7'])){$leadership_roles_7 = $_POST['leadership_roles_7']; } else {  $leadership_roles_7 = ''; }
	if(isset($_POST['activity_details_7'])){$activity_details_7 = $_POST['activity_details_7']; } else {  $activity_details_7 = ''; }
	if(isset($_POST['organization_name_8'])){$organization_name_8 = $_POST['organization_name_8']; } else {  $organization_name_8 = ''; }
	if(isset($_POST['highest_grade_8'])){$highest_grade_8 = $_POST['highest_grade_8']; } else {  $highest_grade_8 = ''; }
	if(isset($_POST['leadership_roles_8'])){$leadership_roles_8 = $_POST['leadership_roles_8']; } else {  $leadership_roles_8 = ''; }
	if(isset($_POST['activity_details_8'])){$activity_details_8 = $_POST['activity_details_8']; } else {  $activity_details_8 = ''; }
	if(isset($_POST['organization_name_9'])){$organization_name_9 = $_POST['organization_name_9']; } else {  $organization_name_9 = ''; }
	if(isset($_POST['highest_grade_9'])){$highest_grade_9 = $_POST['highest_grade_9']; } else {  $highest_grade_9 = ''; }
	if(isset($_POST['leadership_roles_9'])){$leadership_roles_9 = $_POST['leadership_roles_9']; } else {  $leadership_roles_9 = ''; }
	if(isset($_POST['activity_details_9'])){$activity_details_9 = $_POST['activity_details_9']; } else {  $activity_details_9 = ''; }
	if(isset($_POST['organization_name_10'])){$organization_name_10 = $_POST['organization_name_10']; } else {  $organization_name_10 = ''; }
	if(isset($_POST['highest_grade_10'])){$highest_grade_10 = $_POST['highest_grade_10']; } else {  $highest_grade_10 = ''; }
	if(isset($_POST['leadership_roles_10'])){$leadership_roles_10 = $_POST['leadership_roles_10']; } else {  $leadership_roles_10 = ''; }
	if(isset($_POST['activity_details_10'])){$activity_details_10 = $_POST['activity_details_10']; } else {  $activity_details_10 = ''; }



	mysqli_query($con,"INSERT INTO `profile_data`
				(
				 `hsgradyear`,
				 `testchoice`,
				 `testsatscore_sat`,
				 `testactscore_act`,
				 `gpa`,
				 `rcapclscnt`,
				 `rcothhrnclscnt`,
				 `earlyapplydecs`,
				 `awardscnt`,
				 `is_ecclasses`,
				 `organization_name_1`,
				 `highest_grade_1`,
				 `leadership_roles_1`,
				 `activity_details_1`,
				 `organization_name_2`,
				 `highest_grade_2`,
				 `leadership_roles_2`,
				 `activity_details_2`,
				 `organization_name_3`,
				 `highest_grade_3`,
				 `leadership_roles_3`,
				 `activity_details_3`,
				 `organization_name_4`,
				 `highest_grade_4`,
				 `leadership_roles_4`,
				 `activity_details_4`,
				 `organization_name_5`,
				 `highest_grade_5`,
				 `leadership_roles_5`,
				 `activity_details_5`,
				 `organization_name_6`,
				 `highest_grade_6`,
				 `leadership_roles_6`,
				 `activity_details_6`,
				 `organization_name_7`,
				 `highest_grade_7`,
				 `leadership_roles_7`,
				 `activity_details_7`,
				 `organization_name_8`,
				 `highest_grade_8`,
				 `leadership_roles_8`,
				 `activity_details_8`,
				 `organization_name_9`,
				 `highest_grade_9`,
				 `leadership_roles_9`,
				 `activity_details_9`,
				 `organization_name_10`,
				 `highest_grade_10`,
				 `leadership_roles_10`,
				 `activity_details_10`,
				 `created`,
				 `createdby`)
	VALUES (
			'$hsgradyear','$testchoice','$testsatscore_sat','$testactscore_act','$gpa','$rcapclscnt',
			'$rcothhrnclscnt',
			'$earlyapplydecs',
			'$awardscnt',
			'$is_ecclasses',
			'$organization_name_1',
			'$highest_grade_1',
			'$leadership_roles_1',
			'$activity_details_1',
			'$organization_name_2',
			'$highest_grade_2',
			'$leadership_roles_2',
			'$activity_details_2',
			'$organization_name_3',
			'$highest_grade_3',
			'$leadership_roles_3',
			'$activity_details_3',
			'$organization_name_4',
			'$highest_grade_4',
			'$leadership_roles_4',
			'$activity_details_4',
			'$organization_name_5',
			'$highest_grade_5',
			'$leadership_roles_5',
			'$activity_details_5',
			'$organization_name_6',
			'$highest_grade_6',
			'$leadership_roles_6',
			'$activity_details_6',
			'$organization_name_7',
			'$highest_grade_7',
			'$leadership_roles_7',
			'$activity_details_7',
			'$organization_name_8',
			'$highest_grade_8',
			'$leadership_roles_8',
			'$activity_details_8',
			'$organization_name_9',
			'$highest_grade_9',
			'$leadership_roles_9',
			'$activity_details_9',
			'$organization_name_10',
			'$highest_grade_10',
			'$leadership_roles_10',
			'$activity_details_10',
			NOW(),
			'$userid');");

	$_SESSION['data_profile'] =$_POST;
}


?>
<link href="css/custom.css" rel="stylesheet">
<style type="text/css" media="screen">
  .section-two-img {
   width: 100px;height: 100px;
  }

  .topnavbar .navbar-nav>.nav-item.show>.nav-link:focus,
  .topnavbar .navbar-nav>.nav-item.show>.nav-link:hover,
  .topnavbar .navbar-nav>.nav-item>.nav-link:focus,
  .topnavbar .navbar-nav>.nav-item>.nav-link:hover {
    color: #717171;
  }

  .blueBtnBig {
    background: #019ff0;
    color: #fff !important;
    padding: 12px 33px !important;
    border-radius: 50px;
    box-shadow: 8px 10px 28px #9fdbf9;
    text-decoration: none !important;
    font-size: 16px;
    font-family: 'Montserrat', sans-serif;
  }

  .trending-collages-btn:hover {
    text-decoration: none !important;
  }

  .blue-bg {
    background: #019ff0;
  }

  .mt-20 {
    margin-top: 20px;
  }

  .mt-30 {
    margin-top: 30px
  }

  .mb-50 {
    margin-bottom: 50px;
  }

  .mb-30 {
    margin-bottom: 30px;
  }

  .l-3 {
    line-height: 3;
  }

  .section-two h2 {
    color: #3a3a3a;
    margin-bottom: 14px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 26px;
    margin-top: 2%;
  }

  .dashboard-first-section {

    padding: 0px 0;
  }

  .welcometext-mb {
    margin-bottom: 60px;
  }
.service .full:last-child p {
    padding-right: 0;
}
  @media screen and (min-width: 1500px) and (max-width: 1605px) {
    .dashboard-first-section .full span:after {
      width: 402px;
      height: 457px;
    }
  }

  @media screen and (min-width: 992px) and (max-width: 1199px) {


    .dashboard-first-section .full span:after {
      width: 285px;
      height: 272px;
      left: -11px;
    }
  }

  @media (max-width:792px) {

    .welcometext-mb {
      margin-bottom: 30px;
    }

    .dashboard-first-section .full span:after {
      display: none;
    }

    .section-two {
      margin-top: -20px;
    }

    .section-two-img {
      margin-right: 0px;
      margin-bottom: 35px;
      width: 110px;height: 110px;
    }

    .blueBtnBigdiv {
      text-align: center;
    }
  }
</style>

<!----------------------------BANNER----------------------------------->
<!--<div class="banner inner-banner" style="background:url(images/career-banner.jpg) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> Dashboard </h1>
    </div>
  </div>
</div>
-->

<!----------------------------BANNER----------------------------------->

<!----------------------------BODY----------------------------------->

<!----------------------------Section one----------------------------------->
<div class="service dashboard-first-section">
  <div class="container">
    <div class="row">
      <h3 class="text-center welcometext-mb" style="color: #3a3a3a"></h3>
      <div class="full full-boss">
        <div class="col-xl-12 col-sm-12 col-md-12" align="center">

          <span>
            <img src="images/green-tick.png" class="img-fluid float-left section-two-img" alt="">
          </span>
        </div>
        <div class="col-xl-12 col-sm-12 col-md-12">
          <div class="section-two" align="center">
            <h2 class="mt-20">Congratulations! You have finished creating your profile.</h2>
            <!--<p class="mb-50" style="font-size: 14px;">The software was installed.</p>-->

            <p class="mt-30" style="font-size: 14px;">Click Next to begin building your college filters.</p>
            <div class="mt-30 mb-30 blueBtnBigdiv">
              <a href="form.php" class="blueBtnBig" aria-hidden="false">NEXT</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------Section one----------------------------------->





<?php include 'footer.php'; ?>
