<?php session_start();
include 'header.php';
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
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
img {
    max-width: 100%;
    height: auto;
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
<div class="container">
    <div class="row">
        <div class="result-header">
            <div class="col-sm-12">
                <h2 class="text-center welcometext-mb" style="color: #3a3a3a;padding-bottom: 20px;">College Counselors <span style="color:#019ff0">List</span></h2>
            </div>
        </div>
    </div>

    <div class="row">
        <?php 
        $user_id = $_SESSION['userid'];        
        
        $sql = "SELECT * FROM `tbl_users` LEFT join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE tbl_users.usertype = 'College_Counselor' ";    
        $result = $con->query($sql);
        if ($result->num_rows > 0) {   
            while($row = $result->fetch_assoc()) { 
                $description = $row['counselor_overview'];
                $city = $row['counselor_city'];
                $state = $row['counselor_state'];
                $location = "";
                if(!empty($city) || !empty($state)):
                    $location = $city.", ".$state;
                endif;
                
                $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
                if(!empty($row['profile_picture'])):
                    $profile_picture = $row['profile_picture']; 
                endif; 
                
            ?>               
                    <div class="col-sm-12 result-list">
                        <div class="col-md-1 col-sm-12 profile-image">
                            <img src="<?php echo $profile_picture; ?>"/>
                        </div>
                        <div class="col-md-11 col-sm-12">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-9">
                                    <div class="widget-26-title">
                                        <span class="txt-blue"><?php echo $row['name']; ?></span>
                                        <p class="txt-black-01  location">
                                            <i class="fa fa-map-marker"></i> <?php echo $location; ?>
                                        </p>
                                        <p class="m-0">
                                        <span class="txt-black-01">
                                            <?php echo (empty($row['counselor_fees'])) ? "$" : "$".trim($row['counselor_fees']);?>                                         
                                           <span class="text-muted time">/ hr</span>
                                        </span>
                                        
                                        </p>
                                    </div>

                                    <div class="widget-26-job-title">
                                        <p>
                                            <?php echo (empty($description)) ? "Not defined" : trim($description);?>
                                            <?php 
                                        
                                        ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 widget-26-contact-info">
                                    <p>  
                                    <?php 
                                    $counselor_id = $row['id'];
                                    $status = checkRequestStatus($user_id,$counselor_id); 
                                    ?>
                                        <button  class="btn email green requestConsult" req-by-id="<?php echo $user_id; ?>" data-id="<?php echo $row['id']; ?>" <?php echo ($status == 1)?'disabled':''; ?>>
                                            <?php echo ($status == 1)?"Requested Consult":"Request Consult"; ?>
                                        </button>  
                                    </p>
                                    
                                </div>
                            </div>
                        </div>                
                    </div>
               
            <?php }
        }?>       
    </div>
</div>



<?php 

function checkRequestStatus($user_id,$counselor_id){
    global $con;
   $sql = "SELECT * FROM counselor_request WHERE req_by_id = '".$user_id."' AND req_to_couselorID = '".$counselor_id."' AND req_dismiss = 0";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      // $row = $result->fetch_assoc();
      // print_r($row);
        return 1;
    } else {
      return 0;
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"> 
$(".requestConsult").click(function(){    
    var $this = $(this);
    var req_to_couselorID = $(this).attr("data-id");   
    var req_by_id = $(this).attr("req-by-id");
    var myKeyVals = { req_by_id : req_by_id, req_to_couselorID : req_to_couselorID};
    var saveData = $.ajax({
          type: 'POST',
          url: "ajax_function.php?action=requestConsult",
          data: myKeyVals,
          dataType: "text",
          success: function(resultData) {
            if(resultData == '1'){
                console.log("Success Data");
                $this.html("Requested Consult");   
                $this.prop("disabled", true);;
            }           
       },error: function (error) {
           console.log("error" + error);
        }
    });

})

</script>
</body>
</html>