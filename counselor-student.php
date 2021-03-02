<?php 
include 'header-dashboard.php'; 
include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
//Select user list
$sql = "SELECT tbl_users.id,tbl_users.name,tbl_users.emailid FROM `counselor_request` JOIN tbl_users ON tbl_users.id = counselor_request.req_by_id WHERE counselor_request.req_to_couselorID = '".$userid."'";
$result_n = $con->query($sql);


?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Student List</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
    <?php 
    if ($result_n->num_rows > 0) { 
      echo '
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
      while($row = $result_n->fetch_assoc()) {
        $id = $row['id']; ?>
          
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['emailid']; ?></td>
            <td>
            <form method="post" action="student_profile.php">
              <input type="hidden" name="college_builder_by" value="<?php echo $userid; ?>">              
              <input type="hidden" name="college_builder_to" value="<?php echo $id; ?>">
              <button class="btn-info college_builder" type="submit">Start Survey</button></td>
            </form>            
          </tr>   
      <?php
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
      }  
      echo ' </tbody>
      </table>';    
    }

    ?>
    </div>
  </div>

 


</div>

<!-- /.container-fluid -->
</div>



<!-- End of Main Content -->

<?php include 'footer-dashboard.php'; ?>