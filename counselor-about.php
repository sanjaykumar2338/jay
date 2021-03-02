<?php 
include 'header-dashboard.php'; 
include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];

$message = '';
if(isset($_POST['saveOverview'])){    
    $overview = addslashes($_POST['overview']); 
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

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">About</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
      <form method="post" name="postTitle">
        <div class="form-group">
          <p>Tell us about yourself. You can include information on your experience, description of services, expertise or credentials, and why students should choose you as their college counselor.</p>
                
        </div>
        <div class="form-group">
          
          <textarea  name="overview" class="form-control" id="overview" rows="5" required><?php echo (empty($counselor_overview)) ? "" : trim($counselor_overview);?></textarea>
        </div>
              
        <div class="form-group">
          <input type="submit" class="btn btn-info" id="submit" name="saveOverview" value="Save">
          <a class="btn" href="/counselor-fees.php">Next</a>
        </div>
      </form>      
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?php echo $message; ?>
        </div>
      <?php endif; ?>           
    </div>    
  </div>


</div>

<!-- /.container-fluid -->
</div>



<!-- End of Main Content -->

<?php include 'footer-dashboard.php'; ?>