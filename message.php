<?php 
include 'header-dashboard.php'; 
//include('includes/config.php');

$qry_req_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."'  group by `reply_id`,ifnull(`reply_id`,Id)  ORDER BY `counselor_dash_message`.`Id` DESC";

$qry_req_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."'  ORDER BY `counselor_dash_message`.`Id` DESC";

$result_m = $con->query($sql_m);
if ($result_m->num_rows > 0) {
  $total_request_message = $result_m->num_rows;
}
$result_req_msg = $con->query($qry_req_m);

?>
<style type="text/css">  
  .message-counselor .header span.date.flot-right {
    float: right;
    font-size: 12px;
    color: #5a5c69;
  }
  .message-counselor .description {
    font-size: 15px;
  }
  .message-counselor .reply-back{
    border: 1px solid #858796;
  } 

  .alert.alert-info.replyback {
    font-style: italic;
    font-size: 15px;    
  }
  span.date_ {
    display: block;
    font-size: 11px;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div >
   <!--  <h1  class="">Message</h1>      -->    
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-md-12 message-counselor">    
      <?php 
      if($result_req_msg):
        foreach ($result_req_msg as $key => $value) {
          $id = $value['Id'];
          $from_id = $value['from_id'];
          $message = $value['message'];
          $dismiss = $value['dismiss'];
          $subject = $value['subject'];
          $date_ = $value['date'];
          $date1 = new DateTime($date_);
          $currentDate = date('Y-m-d H:i:s');
          $date2 = $date1->diff(new DateTime($currentDate)); 
          $reply_id = $value['reply_id'];
          $userInfor = getUserInfo($from_id);  
          
                 
          ?>   
          <div class="alert alert-success">
            <div class="header text-gray-900">
              <strong><?php echo (!empty($reply_id))?'me, ':''; ?><?php echo $userInfor['name'].'( '.$userInfor['emailid'];?>)</strong> 
              <span class="date flot-right"><?php echo $date = get_dateFormat($date2) . ' ago'; ?></span>  
            </div><hr>
            <p>
            <?php 
            if($reply_id): 
              $rep_subject = replySubject($reply_id);
              $rep_messsage = replyMessage($reply_id);             
           
            ?>
              <span class="subject text-gray-800">Subject : reply, <?php echo $subject; ?>  </span> <br>
              <span class="description text-gray-700"><?php echo $message; ?></span> 
              <p style="
    font-style: italic;
    font-size: 12px;
    text-indent: 10px;
">&gt; Reply of  "<?php echo $rep_messsage[0]; ?>"</p>

            <?php else: ?>
              <span class="subject text-gray-800">Subject : <?php echo $subject; ?>  </span> <br>
              <span class="description text-gray-700"><?php echo $message; ?></span> 
            <?php endif; ?>                       
            </p>  
            <p>
              <hr>              
              <button class="btn btn-light reply-back" type="button" data-toggle="collapse" data-target="#collapseSection<?php echo $id; ?>" aria-expanded="false" aria-controls="collapseExample">
               <i class="fa fa-reply"></i> Reply
              </button>  

              <!-- check reply for current Message -->
              <?php $replyAns = checkReply($id); ?>        
            </p>  


            <div class="collapse" id="collapseSection<?php echo $id; ?>">
              <div class="card card-body">

              <?php 
              // if($reply_id):
              //   $username = $userInfor['name'];
              //   $emailid = $userInfor['emailid'];                
              //   foreach ($rep_messsage as $key => $value) {
              //     echo '<div class="alert alert-info replyback text-gray-700">

              //     <div class="header text-gray-900">
              //       <strong>'.$username.'('.$emailid.')</strong> 
              //       <span class="date flot-right"></span>  
              //     </div><hr>

              //         <span class="date_" >'.$new_date .'</span>
              //         <strong>Message: </strong> '.$value.'
              //         </div>'; 
              //   }

              // else:              
               $qry_req_r = "SELECT * FROM `counselor_dash_message` WHERE from_id = '".$userid."' AND reply_id = '".$id."' ORDER BY `counselor_dash_message`.`Id` DESC LIMIT 4";
                  $result_r = $con->query($qry_req_r);
                  if ($result_r->num_rows > 0) {
                    while($row_r = $result_r->fetch_assoc()) {
                      $date_ = $row_r['date'];
                      $date =date_create($date_);
                      $new_date = 'On '.date_format($date,"D M d Y"). ' at '.date_format($date,"H:i A"); 
                      $reply = $row_r['message'];
                      echo '<div class="alert alert-info replyback text-gray-700">
                      <span class="date_" >'.$new_date .'</span>
                      <strong>Replied: </strong> '.$reply.'
                      </div>';                      
                    }
                  }
              // endif; 
              ?>

                <form>
                  <div class="form-group">                   
                    <textarea name="message" class="form-control" id="message<?php echo $id; ?>" rows="5" required=""></textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="cnslrIds" value="<?php echo $from_id; ?>" id="cnslrIds<?php echo $id; ?>">
                     <input type="hidden" name="msgSub" value="<?php echo $subject; ?>" id="subject<?php echo $id; ?>">
                    <input type="hidden" name="replyId" value="<?php echo $id; ?>" id="replyId<?php echo $id; ?>">
                    <button class="btn btn-success replyBack" data-id="<?php echo $id; ?>">Send</button> <br>
                    <span class="notification-msg"></span>
                  </div>               
                </form>
              </div>
            </div>        
          </div>          
        <?php  }
      endif;?>                  
    </div>

  </div>
  
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->





<?php 


function get_dateFormat($date2){
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

  return $res_date;
}

function getUserInfo($userid){
  global $con;
  $sql = "SELECT * FROM `tbl_users` WHERE id = '".$userid."' "; 
  $result_n = $con->query($sql);
  $row = array();
  if ($result_n->num_rows > 0) {
   $row = $result_n->fetch_assoc();      
  }
  return $row;
}

function checkReply($id){
  global $con;
  $qry = "SELECT * FROM `counselor_dash_message` WHERE reply_id = '".$id."'";
  $result_n = $con->query($qry);
  $total_replay = 0;
  if ($result_n->num_rows > 0) {
    $total_replay = $result_n->num_rows;
  }
  return $total_replay;
}

function replySubject($reply_id){
  global $con;
  $qry = "SELECT subject FROM `counselor_dash_message` WHERE id = '".$reply_id."'";
  $result_n = $con->query($qry);
  $total_replay = 0;
  if ($result_n->num_rows > 0) {
    $row = $result_n->fetch_assoc();  
  }
  return $row;
}

function replyMessage($reply_id){
  global $con;
  $qry = "SELECT * FROM `counselor_dash_message` WHERE reply_id = '".$reply_id."' ORDER BY `counselor_dash_message`.`Id` DESC";
  $result_n = $con->query($qry);
  $total_replay = 0;
  $message = array();
  if ($result_n->num_rows > 0) {    
    while ($row = $result_n->fetch_assoc()) {

      array_push($message, $row['message']);      
    } 
  }
  return $message;  
}

?>


<?php include 'footer-dashboard.php'; ?>