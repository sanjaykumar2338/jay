<?php 
include 'header-dashboard.php'; 
include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';

?>
<style type="text/css"> 

.widget-26-contact-info .btn{
    padding: 10px 16px !important;
    border: 0px;
    min-width: 175px;
    color: #fff;
    border-radius: 27px;
    
}
.btn.yellow {
    background: #e5c300;
}
.btn.green {
    background: #00c851;
}
.widget-26-contact-info {
    padding: 0px 20px;
    text-align:center;
    padding-top: 22px;
}


.result-list {
    border-top: 1px solid #ddd;
    padding: 20px;
}
.result-list:hover {
    background: #9e9e9e0a;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
}
.txt-blue{
    color: #019ff0;
}

.txt-black-01{
    font-weight: 600;
    color: #3a3a3a;
}



@media only screen and (max-width: 768px) {
  /* For mobile phones: */
    .result-list {
     text-align: center;    
    }
    .widget-26-contact-info {      
        padding-top: 10px;
    }

}


</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My College Counselors</h1> 
  </div>
  <!-- Content Row -->
  <div class="row">   
    <div class="col-xl-12 col-md-12 mb-12">
      <!-- Counselor List -->
      <?php 
      $user_id = $_SESSION['userid'];
      $qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '".$user_id."' and approval_status = 1";
      $result = $con->query($qry);
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {       
          $cnslrIds = $row['req_to_couselorID'];

          $coundelor_detail = getCounselorDetail($cnslrIds);
          // print_r($coundelor_detail);
          $description = $coundelor_detail['counselor_overview'];
          $city = $coundelor_detail['counselor_city'];
          $state = $coundelor_detail['counselor_state'];

          $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
          if(!empty($row['profile_picture'])):
            $profile_picture = $row['profile_picture']; 
          endif;
          if(!empty($city) || !empty($state)):
            $location = $city.", ".$state;
          endif; ?>
          <div class="col-sm-12 result-list">
            <div class="col-md-1 col-sm-12 profile-image">
             <img src="<?php echo $profile_picture; ?>"/>
            </div>
            <div class="col-md-11 col-sm-12">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-9">
                  <div class="widget-26-title">
                    <span class="txt-blue"><?php echo $coundelor_detail['name']; ?></span>
                    <p class="txt-black-01  location">
                      <i class="fa fa-map-marker"></i> <?php echo $location; ?>
                    </p>
                    <p class="m-0">
                    <span class="txt-black-01">
                      <?php echo (empty($coundelor_detail['counselor_fees'])) ? "$" : "$".trim($coundelor_detail['counselor_fees']);?><span class="text-muted time">/ hr</span>
                    </span>                                          
                    </p>
                  </div>

                  <div class="widget-26-job-title">
                    <p>
                      <?php echo (empty($description)) ? "Not defined" : trim($description);?>
                    </p>
                  </div>
                  
                </div>
                 <div class="col-md-3 col-sm-12 widget-26-contact-info">
                  <p>  
                     <button data-id="<?php echo $cnslrIds; ?>" class="btn email green requestConsult" data-toggle="modal" data-target="#myModalMessage">Message</button>                     
                  </p>                                    
                </div>
              </div>              
            </div>
          </div>
          <?php
        }
      } 
      ?>
    </div>

  </div>

</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->



<!-- Modal -->
  <div class="modal fade" id="myModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message">Subject:</label>
            <input type="text" class="form-control" name="subject" value="" id="subject">            
          </div>  
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control" id="message" rows="5" required=""></textarea>
          </div>
          <div class="form-group">
          <input type="hidden" name="cnslrIds" value="" id="cnslrIds">
            <button class="btn btn-info" id="sendMessage">Send</button> <br />
            <span class="notification-msg"></span>
          </div>
          
         
        </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


<!-- functions -->
<?php 
function getCounselorDetail($cnslrIds){
  global $con;
  $sql = "SELECT * FROM `tbl_users` join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE counselor_detail.user_id='".$cnslrIds."' ";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();    
    return $row;  
  } 
}



?>

<?php include 'footer-dashboard.php'; ?>
