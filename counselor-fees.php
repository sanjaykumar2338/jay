<?php 
include 'header-dashboard.php'; 
include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';
if(isset($_POST['save-btn'])){
  //Save Image 
    $fees = $_POST['fees'];   
    $other_services_fee = addslashes($_POST['other_services_fee']); 
    
    $sql = "SELECT * FROM `counselor_detail` WHERE  user_id = '".$userid."' ";
    $result = mysqli_query($con,$sql) or ("query failed");      
    if (mysqli_num_rows($result) > 0) {
      // output data of each row 
      $sql1 = "UPDATE `counselor_detail` SET `counselor_fees`='".$fees."', `counselor_other_services_fee`='".$other_services_fee."' WHERE user_id = '".$userid."'";
       $result1 = mysqli_query($con,$sql1) or ("query failed 1");
        if ($result1 == TRUE) {
          $message .= "update successfully";
        }     
     
    }else{
        $sql2 = "INSERT INTO counselor_detail (user_id, counselor_email,counselor_fees,counselor_other_services_fee)
        VALUES ('".$userid."','".$emailid."','".$fees."','".$other_services_fee."')";
        $result2 = mysqli_query($con,$sql2) or ("query failed 2");

        if ($result2 == TRUE) {
          $message .=  "save successfully";
        } 
    }

    
}


$sql3 = "SELECT * FROM counselor_detail 
RIGHT JOIN tbl_users
ON counselor_detail.user_id = tbl_users.id

WHERE tbl_users.id = '".$userid."' ";
$result = $con->query($sql3);
if ($result->num_rows > 0) {
  $counselor_details = $result->fetch_assoc();
 
    // print_r($counselor_details);
    @$counselor_fees = $counselor_details['counselor_fees'];  
    @$other_services_fee = $counselor_details['counselor_other_services_fee'];      
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fees</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
     <form method="post" enctype="multipart/form-data"> 
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-3 col-form-label">Hourly Fee</label>
          <div class="col-sm-9">                  
                  <input type="text" class="form-control" id="fees" name="fees"  value="<?php echo (empty($counselor_fees)) ? "" : $counselor_fees;?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Other Fees & Services</label>
          <div class="col-sm-9">
            <textarea rows="9" name="other_services_fee" class="form-conrol" style="width:100%;"><?php echo (empty($other_services_fee)) ? "" : $other_services_fee;?></textarea>
          </div>
        </div>  
        <button type="submit" class="btn btn-primary" name="save-btn">Save</button>
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