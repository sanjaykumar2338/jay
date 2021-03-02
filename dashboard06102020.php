<?php
session_start();
include 'header.php';
?>
<link href="css/custom.css" rel="stylesheet">
<style type="text/css" media="screen">
  .section-two-img {
    margin-right: 35px;
  }
  .topnavbar .navbar-nav>.nav-item.show>.nav-link:focus, .topnavbar .navbar-nav>.nav-item.show>.nav-link:hover, .topnavbar .navbar-nav>.nav-item>.nav-link:focus, .topnavbar .navbar-nav>.nav-item>.nav-link:hover {
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
  .trending-collages-btn:hover{
    text-decoration: none !important;
  }
  .blue-bg{
    background: #019ff0;
  }
  .mt-20{
    margin-top: 20px;
  }
  .mt-30{
    margin-top: 30px
  }
  .mb-20 {
    margin-bottom: 20px;
  }
  .mb-30 {
    margin-bottom: 30px;
  }
  .l-3{
    line-height: 3;
  }
  .section-two h2 {
    color: #3a3a3a;
    margin-bottom: 14px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 26px;
    margin-top: 0%;
  }
  .dashboard-first-section .full span:after {
    content: '';
    background: #019ff0;
    width: 360px;
    height: 382px;
    position: absolute;
    left: -19px;
    z-index: -1;
    top: 35px;
  }
  .dashboard-first-section{

    padding: 0px 0;
  }
  .welcometext-mb{
    margin-bottom:50px;
  }
	 @media (max-width:792px){
	.container{
		padding-left:15px;
		 }
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
      left:-11px;
    }
  }

  @media (max-width:792px){

    .welcometext-mb{
      margin-bottom:30px;
    }
    .dashboard-first-section .full span:after {
      display: none;
    }
    .section-two{
      margin-top: -20px;
    }
    .section-two-img {
      margin-right: 0px;
      margin-bottom: 35px;
    }
    .blueBtnBigdiv{
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
       <h3 class="text-center welcometext-mb" style="color: #3a3a3a">Welcome, <span style="color:#019ff0"><?php echo $_SESSION['first_name']; ?>!</span></h3>
      <div class="full full-boss">
        <div class="col-xl-12 col-sm-12 col-md-4">

        	<span>
                     <img src="images/kids-steps.png" class="img-fluid float-left section-two-img" alt="">
                     </span>
                  </div>
                  <div class="col-xl-12 col-sm-12 col-md-8">
                     <div class="section-two">
                        <h2 class="mt-20">Asuriz's college builder tool is transformative and groundbreaking in its functionality.</h2>
                        <p class="" style="font-size: 14px;"> Although there are no guarantees to success, Asuriz's college list builder offers you the ability to:</p>
                        <ul style="line-height: 1.7;overflow: hidden;list-style: disc;font-size: 14px;">
                           <li>Search one of the largest databases for US colleges in the world with over 3,000,000 records and over 6,800 colleges.</li>
                           <li>See the results organized by your chances of acceptance, which utilizes proprietary algorithms developed by a team of college counselors.</li>
                           <li>Analyze your college list to see if it is balanced, and receive feedback to let you know how many schools should be in each category.</li>
                        </ul>
                        <p class="mb-20" style="font-size: 14px;">We want to help you succeed in finding the right college for you. Let's get started.</p>
                        <div class="mt-30 mb-30 blueBtnBigdiv">
						<?php
							
							if(isset($_SESSION['data_profile'])){
								echo '<a href="form.php" class="blueBtnBig" aria-hidden="false">Launch</a>';
							}
							else{
								echo '<a href="form2.php" class="blueBtnBig" aria-hidden="false">Launch</a>';
							}
						?>
                           <!--<a href="form2.php" class="blueBtnBig" aria-hidden="false">Launch</a>-->
                        </div>
                     </div>
                  </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------Section one-----------------------------------> 





<?php include 'footer.php'; ?>
