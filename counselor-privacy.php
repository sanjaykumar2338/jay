<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'header-dashboard.php'; 
include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';

$status = "";
$sql3 = "SELECT counselor_privacy FROM counselor_detail WHERE user_id = '".$userid."' ";
$result = $con->query($sql3);
if ($result->num_rows > 0) {
   $counselor_details = $result->fetch_assoc(); 
   $status = $counselor_details['counselor_privacy'];       
}

if(isset($_POST['clr_privacy'])):
   $status = $_POST['clr_privacy'];
   $qry = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
   $result = $con->query($qry);
   if ($result->num_rows > 0) {
      $sql = "UPDATE counselor_detail SET counselor_privacy='".$status."' WHERE user_id= '".$userid."' ";
      if ($con->query($sql) === TRUE) {
        $message = "Record updated successfully";
      } else {
         $message = "Error updating record: " . $conn->error;
      }       
   }else{
      $sql2 = "INSERT INTO counselor_detail (user_id, counselor_email,counselor_privacy)
        VALUES ('".$userid."','".$emailid."','".$status."')";
      if ($con->query($sql2) === TRUE) {
        $message =  "New record created successfully";
      } else {
        $message =  "Error: " . $sql . "<br>" . $conn->error;
      }        
   } 
endif;
?>
<style type="text/css">
   .note {
    font-size: 13px;
    font-style: italic;
    margin-top: 20px;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Privacy</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
     <form method="post" enctype="multipart/form-data"> 
        <div class="form-group row"> 
         <label for="staticEmail" class="col-sm-2 col-form-label">Visivility <i class="fa fa-globe" aria-hidden="true" style="color: #019ff0;"></i>: </label>         
          <div class="col-sm-10">           
          <input type="radio" name="clr_privacy" value="public" id="public" <?php echo ($status == 'public')?'checked':''; ?> required> <label for="public">Public</label>  <br />
          <input type="radio" name="clr_privacy" value="private" id="private" <?php echo ($status == 'private')?'checked':''; ?>  required> <label for="private">Private</label> 
            
          </div>
        </div>        
        <button type="submit" class="btn btn-primary" name="save-btn">Save</button>
      </form>    
    </div>
    <div class="col-xl-12 col-md-12 mb-12 note">
       <div class="alert alert-info" role="alert">
         <ul>
          <li><b>Public : </b>Profile available in counselor list</li>
          <li><b>Private : </b>Profile not available in counselor list</li>
       </ul>
      </div>
       
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