<?php 
include 'header-dashboard.php'; 
include('includes/config.php');

if($_SESSION['usertype'] == 'College_Counselor'): 
  $sql = "SELECT * FROM `counselor_request` WHERE req_dismiss = 0 AND req_to_couselorID = '".$userid."' ";
  $qry_req = "SELECT * FROM `counselor_request` WHERE approval_status IS NULL AND req_to_couselorID = '".$userid."' ORDER BY `counselor_request`.`req_id` DESC LIMIT 5";
else:
  $sql = "SELECT * FROM `counselor_request` WHERE req_dismiss_stu = 0 AND approval_status IS NOT NULL  AND req_by_id = '".$userid."' ";
  $qry_req = "SELECT * FROM `counselor_request` WHERE approval_status IS NOT NULL  AND req_by_id = '".$userid."' ORDER BY `counselor_request`.`req_id` DESC LIMIT 5";
endif;

$result_n = $con->query($sql);
if ($result_n->num_rows > 0) {
  $total_request = $result_n->num_rows;
}
$result_req = $con->query($qry_req);


?>

<div class="container-fluid">
	<div class="row">
    	<div class="col-md-12 message-counselor"> 
    	 <div class="" >               
                <div class="drop-down-content-box">
                  <?php 
                  if ($result_req->num_rows > 0) {
                    while($row = $result_req->fetch_assoc()) { 
                    
                      $req_date = $row['req_date'];
                      $req_date_new=date_create($req_date);
                      $std_id =  $row['req_by_id'];
                      $req_id = $row['req_id'];
                      $cnslr_id = $row['req_to_couselorID'];
                      $approval_status = $row['approval_status'];
                      $response_date_cnslr = $row['response_date_cnslr'];
                      $date1 = new DateTime($response_date_cnslr);
                      $currentDate = date('Y-m-d H:i:s');
                      $date2 = $date1->diff(new DateTime($currentDate));

                      // style for dismiss
                       $req_dismiss = $row['req_dismiss_stu'];
                      if($_SESSION['usertype'] == "College_Counselor"){
                        $req_dismiss = $row['req_dismiss'];
                      }
                      

                      if($_SESSION['usertype'] == 'College_Counselor'): ?>
                        <a class="dropdown-item d-flex align-items-center dropdownAlertsItem <?php echo ($req_dismiss == 0)? 'dismiss':''; ?>" href="#" data-id="<?php echo $req_id; ?>">
                         
                          <div>
                            <div class="small text-gray-500"><?php  echo date_format($req_date_new,"F d, Y"); ?></div>
                            <span><?php $infoD = get_user_info($std_id); echo $infoD['emailid']; ?></span>
                            <br />
                            <button type="button" class="btn btn-success responseRequest" data-id="<?php echo $req_id;  ?>" value="1">Accept</button>
                            <button type="button" class="btn btn-danger responseRequest" data-id="<?php echo $req_id;  ?>" value="0">Reject</button>                          
                          </div>
                        </a>
                      <?php else: ?>
                        <a class="dropdown-item d-flex align-items-center dropdownAlertsItem" href="#" data-id="<?php echo $req_id; ?>">
                          <div class="dropdown-list-image mr-3">
                            
                            <?php 
                            $profile = get_cnslr_profile($cnslr_id);
                            ?>                         
                              <img class="img-profile rounded-circle" src="<?php echo $profile; ?>" alt="Profile" >
                            
                          </div>
                          <div> 
                            <b><?php $infoD = get_user_info($cnslr_id); echo $infoD['name']; ?></b>                       
                            <?php echo ($approval_status==1)? 'Approve':'Reject'; ?> your request
                            <div class="small text-gray-500">
                              <?php 
                              
                              if(!empty($date2->s)){
                                $res_date = $date2->s.' seconds';
                              }
                              if (!empty($date2->i)) {
                                $res_date = $date2->i.' minutes';
                              }
                              if (!empty($date2->h)) {
                                $res_date =$date2->h.' hours';
                              }
                              if (!empty($date2->d)) {
                                $res_date = $date2->d.' days';
                              }
                              if (!empty($date2->m)) {
                                $res_date = $date2->m.' months';
                              }
                              if (!empty($date2->y)) {
                                $res_date = $date2->y.' years';
                              }
                              if(isset($res_date)){
                                echo $res_date. " ago";
                              }

                              ?>
                            </div>
                          </div>
                        </a>
                      <?php endif; ?>
                    <?php                     
                    }
                  }else{
                    echo "<p>No more notification</p>";
                  }
                  ?>
                </div>   
              </div>
    	</div>
    </div>
</div>

<?php include 'footer-dashboard.php'; ?>