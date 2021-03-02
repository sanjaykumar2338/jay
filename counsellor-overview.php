<?php include 'header-norm.php'; ?>

<?php 
//get User id by session 
// $userid = $_SESSION['userid'];

include('includes/config.php');
$errormsg = '';
if(isset($_POST['saveTitle'])){

}

?>

  <div id="wrapper">
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li > 
            <a href="counsellor-dashboard.php"><i class="fa fa-pencil" aria-hidden="true"></i>Title<i class="fa fa-check-circle" aria-hidden="true"></i> </a> 
          </li>
          <li class="active-link"> 
            <a href="counsellor-overview.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>Overview <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-services.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Services <i class="fa fa-check-circle" aria-hidden="true"></i>  </a> 
          </li>
          <li> 
            <a href="counsellor-expertise.php"><i class="fa fa-qrcode "></i>Expertise <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-location.php"><i class="fa fa-map-marker" aria-hidden="true"></i>Location <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-visibility.php"><i class="fa fa-user" aria-hidden="true"></i> Visibility <i class="fa fa-check-circle" aria-hidden="true"></i> </a> 
          </li>
          <li> 
            <a href="counsellor-fees.php"><i class="fa fa-usd" aria-hidden="true"></i>Fees <i class="fa fa-check-circle" aria-hidden="true"></i></a> </li>
          <li> <a href="counsellor-review.php"><i class="fa fa-check" aria-hidden="true"></i>Review</a> </li>
        </ul>
      </div>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-lg-12">
            <h2>Overview</h2> 
			  <span>steps 2 to 8</span> 
          </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
          <div class="col-lg-12 ">
			 
		  </div>
			
        </div>
        <!-- /. ROW  -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form method="post" name="postTitle">
			  <div class="form-group">
                <label>Here are some good examples:</label>
                <ul style="    list-style: disc;">
                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                </ul>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Overview</label>
                <textarea  name="title" class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-info" id="submit" name="saveTitle" value="Save">
                <button class="btn">Next</button>
              </div>
            </form>
          </div>

          <div class="col-md-12">
            <div class="alert alert-success">
            <!-- <strong>Success!</strong> Indicates a successful or positive action. -->
          </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
  </div>
  <?php include 'footerapp.php'; ?>