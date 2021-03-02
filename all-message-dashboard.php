<?php 
include 'header-dashboard.php'; 
// include('includes/config.php');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$servername = "localhost";
$username = "vb_live_db";
$password = "?67kxpA1";
$db = "ipeds";

// Create connection
$con = new mysqli($servername, $username, $password,$db);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>
<?php 
$qry_req_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."' ORDER BY `counselor_dash_message`.`Id` DESC";

$result_m = $con->query($sql_m);
if ($result_m->num_rows > 0) {
  $total_request_message = $result_m->num_rows;
}
$result_req_msg = $con->query($qry_req_m);

?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div >
    <h1  class="">Message</h1> 	  
	  
	</div>
  <!-- Content Row -->
  <div class="row">
	  <div style=" width:1600px;" class="maindivr">
	  <div class="dropdown-msgBox">
                <?php 
                  foreach ($result_req_msg as $key => $value) {
					  $id = $value['Id'];
                    $from_id = $value['from_id'];
                    $message = $value['message'];
                    $dismiss = $value['dismiss'];
                    $date_ = $value['date'];
                    $date1 = new DateTime($date_);
                    $currentDate = date('Y-m-d H:i:s');
                    $date2 = $date1->diff(new DateTime($currentDate));

                     ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
					<img  style=" border-radius: 50%; width:40px; margin-bottom:10px;"        				src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="<?php echo ($dismiss == 0)?'font-weight-bold':''; ?>">
                        <div class="text-truncate"><?php echo substr($message,0,20); ?></div>
                        <div class="small text-gray-500"><?php $infoD = get_user_info($from_id); echo $infoD['name']; ?> . 
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
							<a class="read-more" href="read-message-dashboard.php?id=<?php echo $id ; ?>">Read more </a>
                        </div>
                      </div>
                    </a>
<hr>
		  	
                  <?php                    
                  }
                ?>                  
                </div>
</div>
  </div>
	
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php 

function statusCalculator($userid,$status){
  global $con;
  if($_SESSION['usertype'] == 'College_Counselor'){
    $usertype = "req_to_couselorID";
  }else{
    $usertype = "req_by_id";
  }
  $sql = "SELECT * FROM `counselor_request` WHERE approval_status = '".$status."' AND ".$usertype." = '".$userid."' "; 
  if($status == "pending"){
    $sql = "SELECT * FROM `counselor_request` WHERE approval_status IS NULL AND req_to_couselorID = '".$userid."' "; 
  }
  
  $result_a = $con->query($sql);
  $total = 0;
  if ($result_a->num_rows > 0) {
    $total = $result_a->num_rows;
  }
  return $total;
}
?>
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <div class="dropdown-msgBox">
                <?php 
                  foreach ($result_req_msg as $key => $value) {
                    $from_id = $value['from_id'];
                    $message = $value['message'];
                    $dismiss = $value['dismiss'];
                    $date_ = $value['date'];
                    $date1 = new DateTime($date_);
                    $currentDate = date('Y-m-d H:i:s');
                    $date2 = $date1->diff(new DateTime($currentDate));

                     ?>
                  
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="<?php echo ($dismiss == 0)?'font-weight-bold':''; ?>">
                        <div class="text-truncate"><?php echo $message; ?></div>
                        <div class="small text-gray-500"><?php $infoD = get_user_info($from_id); echo $infoD['name']; ?> . 
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
              

                  <?php                    
                  }
                ?>                  
                </div>
                
               
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a> -->
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>

<?php include 'footer-dashboard.php'; ?>