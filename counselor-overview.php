<?php 
include 'header-dashboard.php'; 
include('includes/config.php');

//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];

$message = '';
if(isset($_POST['saveOverview'])){
    $overview = $_POST['overview'];   
    $sql = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
    $result = $con->query($sql); 
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
     
      $sql = "UPDATE counselor_detail SET counselor_overview='".$overview."' WHERE user_id='".$userid."' ";
        if ($con->query($sql) === TRUE) {
          $message .= "Overview updated successfully";
        }
     
    }else{
        $sql = "INSERT INTO counselor_detail (user_id,counselor_email,counselor_overview)
        VALUES ('".$userid."','".$emailid."','".$overview."')";

        if ($con->query($sql) === TRUE) {
          $message .=  "Overview save successfully";
        } 
    } 
}


$sql = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
$result = $con->query($sql); 
if ($result->num_rows > 0) {
    // output data of each row
    $counselor_details = $result->fetch_assoc();
    $counselor_overview = $counselor_details['counselor_overview'];  
    // print_r($counselor_details);
}


?>

  <div id="wrapper">
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
     <?php include 'counselor-das-sidebar.php';
      ?>
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
                <textarea  name="overview" class="form-control" id="overview" rows="5" required><?php echo (empty($counselor_overview)) ? "" : trim($counselor_overview);?></textarea>
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-info" id="submit" name="saveOverview" value="Save">
                <a class="btn" href="counselor-services.php">Next</a>
              </div>
            </form>
          </div>

          <div class="col-md-12">
            <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>           
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