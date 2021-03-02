<?php
include_once 'header-dashboard.php';
?>
<div class="container-fluid">

    <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading" id="welcometext-div">
                <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Settings</h3><small data-localize="dashboard.WELCOME"></small></div>
            </div>

            <!--
            <div class="row">
               <div class="col-xl-2 col-lg-6 col-md-3">

               </div>
               <div class="col-xl-8 col-md-6 home-search-bar">

                  <form action="#!" style="width: 100%">
                     <div class="input-group">
                        <input class="form-control form-control-lg" type="text" placeholder="Search for a College by Name"><span class="input-group-btn">
                        <button class="btn btn-secondary btn-lg" type="submit"><i class="fa fa-search"></i></button></span>
                     </div>
                  </form>


               </div>
               <div class="col-xl-2 col-lg-6 col-md-3">

               </div>
            </div>
             -->
            <div class="row myProfileUpdate">
                <!-- START dashboard main content-->
                <div class="col-xl-12">
                    <!-- START -->
                    <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                            <div class="mycontactus form-wrap">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12">
                                        <div class="log-inpart form-white-box">
                                            <form role="form" name="myform" id="idForm" method="POST" >
                                                <div class="after-two">
                                                    <div class="log-inpart-sec">
                                                        <?php echo @$errormsg; ?>
                                                        <div class="form-group apj_update_form">
                                                            <label for="name" class="sr-only">Name</label>
                                                            <input type="text" class="form-control" placeholder="Name" id="name"  value="<?php echo $_SESSION['first_name']; ?>" name="name" required>
                                                        </div>
                                                        <div class="form-group apj_update_form">
                                                            <label for="emailid" class="sr-only">Email</label>
                                                            <input type="text" class="form-control updateprofile_emailid" placeholder="Email" value="<?php echo $_SESSION['emailid']; ?>" id="emailid"  name="emailid" readonly>
                                                            <!--<small>( To update your email, <a href="contact-us.php">click here</a> to contact us and someone would be glad to assist you. )</small>-->
                                                        </div>
                                                        <div class="form-group apj_update_form">
                                                            <label for="password" class="sr-only">Password</label>
                                                            <input type="password" class="form-control" placeholder="Password"  value="<?php echo $_SESSION['password']; ?>"  id="password" name="password" required>
                                                        </div>
                                                        <div class="form-check apj-form-check pl-0">
                                                            <!-- <input type="checkbox" class="form-check-input" id="isclosed" name="isclosed" >
                                                            <label class="form-check-label" for="isclosed">Close Account</label> -->
                                                            <div class="checkbox-container circular-container" style="margin-top: 20px;">
                                                                <label class="checkbox-label" for="isclosed">
                                                                    <input type="checkbox" id="isclosed" name="isclosed">
                                                                    <span class="checkbox-custom circular"></span>
                                                                </label>
                                                                <label class="form-check-label" for="isclosed" style="font-size: 17px;">Deactivate Account</label>
                                                            </div>
                                                        </div>
                                                        <div class="full submit-center-xs"><button class="btn btn-primary mt-30 mb-30 mr-2" name="sub" id="sub"> Update </button>
                                                            <a class="btn btn-warning blue-border mt-30 mb-30" href="dashboard.php"> Cancel </a>
                                                        </div>


                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
        </div>
</section>
</div>


<?php include 'footer-dashboard.php'; ?>