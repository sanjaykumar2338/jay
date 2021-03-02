<?php 
include 'header-dashboard.php'; 
include('includes/config.php');
?>
<style type="text/css">
  .imgInp {
    width: 150px;
    margin-top: 10px;
    padding: 10px;
    background-color: #d3d3d3;
}

.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: calc(2.25rem + 2px);
    margin: 0;
    opacity: 0;
}
.custom-file-label {
    cursor: pointer;
}
.custom-control-label::before, .custom-file-label, .custom-select {
    transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.custom-file-label {
   bottom: 37px;
    position: absolute;
    width: 330px;
    right: 0;
    left: 0;
    z-index: 1;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    padding-bottom: 20px;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    font-size: 12px;
}

.custom-file-input:lang(en)~.custom-file-label::after {
    content: "Browse";
}
.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: 2.25rem;
    padding: .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: 1px solid #ced4da;
    border-radius: 0 .25rem .25rem 0;
}
</style>

<?php 
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$profile_picture = "";
$sql3 = "SELECT * FROM counselor_detail 
RIGHT JOIN tbl_users
ON counselor_detail.user_id = tbl_users.id

WHERE tbl_users.id = '".$userid."' ";
$result = $con->query($sql3);
if ($result->num_rows > 0) {
  $counselor_details = $result->fetch_assoc(); 
    // print_r($counselor_details);
    @$counselor_city = $counselor_details['counselor_city'];  
    @$counselor_state = $counselor_details['counselor_state'];  
    @$counselor_name = $counselor_details['name']; 
    @$profile_picture = $counselor_details['profile_picture']; 
}
 
$message = '';
if(isset($_POST['save-btn'])){
  //Save Image
  $profile_picture = $profile_picture;
  $valid_extensions = array('jpeg','jpg','png','gif','bmp','pdf','doc','ppt'); //valid extensions
  $path = "assets/counselor/"; 
  if($_FILES['image']){
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = "counselor_profile_".rand(1000,1000000).$img;

    // check's valid format
    if(in_array($ext, $valid_extensions)){
      $path = $path.strtolower($final_image); 
      if(move_uploaded_file($tmp,$path)){
        $profile_picture = $path;
      }
    }
  }
  


    $counselor_state = $_POST['state'];   
    $counselor_city = $_POST['city']; 

    
    $sql = "SELECT * FROM `counselor_detail` WHERE  user_id = '".$userid."' ";
    $result = mysqli_query($con,$sql) or ("query failed");      
    if (mysqli_num_rows($result) > 0) {
      // output data of each row 
       $sql1 = "UPDATE `counselor_detail` SET `counselor_city`='$counselor_city', `counselor_state`='$counselor_state',`profile_picture` = '".$profile_picture."' WHERE user_id = '".$userid."'";
       $result1 = mysqli_query($con,$sql1) or ("query failed 1");
        if ($result1 == TRUE) {
          $message .= "update successfully";
        }     
     
    }else{
        $sql2 = "INSERT INTO counselor_detail (user_id,counselor_city,counselor_state,profile_picture)
        VALUES ('".$userid."','".$counselor_city."','".$counselor_state."','".$profile_picture."')";
        $result2 = mysqli_query($con,$sql2) or ("query failed 2");

        if ($result2 == TRUE) {
          $message .=  "save successfully";
        } 
    }

    //Name field
    if(isset($_POST['full_name'])){
      $name = $_POST['full_name'];
      $sql_ = "UPDATE `tbl_users` SET `name`='".$name."' WHERE  id = '".$userid."'";
       $result1 = mysqli_query($con,$sql_) or ("query failed 1");
        if ($result1 == TRUE) {
          $_SESSION['first_name'] = $name;
        }
    }
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputAddress">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="full_name" value="<?php echo (empty($counselor_name)) ? " " : trim($counselor_name);?>"> </div>
        <div class="form-row row">
          <div class="col-sm-12">
            <label>Address</label>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo (empty($counselor_city)) ? " " : $counselor_city;?>"> </div>
          <div class="form-group col-md-6">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" name="state" value="<?php echo (empty($counselor_state)) ? " " : $counselor_state;?>"> </div>
        </div>
        <div class="form-group">
          <label for="inputState">Upload a photo of yourself</label>
          <div id="preview" style="width: 200px;">
            <?php $img = (empty($profile_picture)) ? "https://img.icons8.com/color/100/000000/test-account.png" : $profile_picture;?> <img id="previewImg" src="<?php echo $img; ?>" style="max-width:100%;" /> </div>
          <div class="custom-file">
            <input id="uploadImage" class="form-control imgInp custom-file-input" type="file" accept="image/*" name="image" onchange="previewFile(this);" />
            <label class="custom-file-label" for="uploadImage">Choose file</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="save-btn">Save Profile</button> <a class="btn" href="/counselor-about.php">Next</a> 
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