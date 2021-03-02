
<?php
include 'header-dashboard.php';
//include('includes/config.php');
//get User id by session

$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';
$sql = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '".$userid."' ";
$result_n = $con->query($sql);
if ($result_n->num_rows > 0) {
    $total_request = $result_n->num_rows;
}
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
    .btn.red {
        background: #e74a3b;
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

    .slider .card {
        margin-right: 20px;
    }

    .slider .card:last-child {
        margin-right: 0;
    }

    .slider {
        position: relative;
    }
    .slider .prev{
        position: absolute;
        top: 45%;
        left: -20px;
    }
    .slider .prev i{
        font-size: 35px;
        text-align: center;
        color: #5bc0de;
    }
    .slider .next{
        position: absolute;
        top: 45%;
        right: 0;
    }

    .slider .next i{
        font-size: 35px;
        text-align: center;
        color: #5bc0de;
    }
    ul {
        list-style-type: none;

        overflow: visible;
        display: block;

    }

    /*li {*/
    /*    float: right;*/
    /*}*/
    /*.nav-element li a{*/
    /*    position: relative;*/
    /*}*/
    /*.nav-element li a i{*/
    /*    font-size: 30px;*/
    /*}*/
    /*.nav-element li a span{*/
    /*    !*position: absolute;*!*/
    /*    !*right: 10px;*!*/
    /*    !*top: 0;*!*/
    /*}*/
    .custom-nav ul li a{
        font-size: 30px;
    }
    .custom-nav ul li a i{
        color: #019ff0;
    }
    .sidebar .nav-item .nav-link .badge-counter, .topbar .nav-item .nav-link .badge-counter{
        position: absolute;
        transform: scale(0.7);
        transform-origin: top right;
        right: 3px;
        margin-top: -8px;
    }
    a.dropdownAlertsItem div:nth-child(2){
        font-size: 14px!important;
    }
    .last-nav a{
        font-size: 14px!important;
    }
</style>

<!-- Begin Page Content -->



<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top custom-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow mx-1" id="dropdownAlerts">
                        <a data-toggle="tooltip" data-placement="top" title="My College Counselors" class="nav-link dropdown-toggle" href="my-counselor-list.php" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-check"></i>
                            <!-- Counter - Alerts -->
                        </a>
                        <!-- Dropdown - Alerts -->

                    </li>
                    <li class="nav-item dropdown no-arrow mx-1" id="dropdownAlerts">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">
                         <?php echo (isset($total_request)) ? $total_request : '0'; ?>
                        </span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in last-nav" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alert Center
                            </h6>
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
                                <a class="dropdown-item d-flex align-items-center dropdownAlertsItem" href="#"
                                   data-id="<?php echo $id; ?>">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                             alt="">
                                        <!-- <div class="status-indicator bg-success"></div> -->
                                    </div>
                                    <div class="<?php echo ($dismiss == 0) ? 'font-weight-bold' : ''; ?>">
                                        <div class="text-truncate"><?php echo $message; ?></div>
                                        <div class="small text-gray-500"><?php $infoD = get_user_info($from_id);
                                            echo $infoD['name']; ?> .
                                            <?php

                                            if (!empty($date2->s)) {
                                                $res_date = $date2->s . ' seconds';
                                            }
                                            if (!empty($date2->i)) {
                                                $res_date = $date2->i . ' minutes';
                                            }
                                            if (!empty($date2->h)) {
                                                $res_date = $date2->h . ' hours';
                                            }
                                            if (!empty($date2->d)) {
                                                $res_date = $date2->d . ' days';
                                            }
                                            if (!empty($date2->m)) {
                                                $res_date = $date2->m . ' months';
                                            }
                                            if (!empty($date2->y)) {
                                                $res_date = $date2->y . ' years';
                                            }
                                            if (isset($res_date)) {
                                                echo $res_date . " ago";
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </a>

                                <?php
                            }
                            ?>
                            <a class="dropdown-item text-center small text-gray-500" href="message.php">Read More Messages</a>
                        </div>

                    </li>
                    <li class="nav-item dropdown no-arrow mx-1" id="dropdownAlerts">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">
                         <?php echo (isset($total_request_message)) ? $total_request_message : '0'; ?>
                        </span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alert Center
                            </h6>
                            <div class="drop-down-content-box">
                                <?php
                                if ($result_req->num_rows > 0) {
                                    while ($row = $result_req->fetch_assoc()) {
                                        $req_date = $row['req_date'];
                                        $req_date_new = date_create($req_date);
                                        $std_id = $row['req_by_id'];
                                        $req_id = $row['req_id'];
                                        $cnslr_id = $row['req_to_couselorID'];
                                        $approval_status = $row['approval_status'];
                                        $response_date_cnslr = $row['response_date_cnslr'];
                                        $date1 = new DateTime($response_date_cnslr);
                                        $currentDate = date('Y-m-d H:i:s');
                                        $date2 = $date1->diff(new DateTime($currentDate));

                                        // style for dismiss
                                        $req_dismiss = $row['req_dismiss_stu'];
                                        if ($_SESSION['usertype'] == "College_Counselor") {
                                            $req_dismiss = $row['req_dismiss'];
                                        }


                                        if ($_SESSION['usertype'] == 'College_Counselor'): ?>
                                            <a class="dropdown-item d-flex align-items-center dropdownAlertsItem <?php echo ($req_dismiss == 0) ? 'dismiss' : ''; ?>"
                                               href="#" data-id="<?php echo $req_id; ?>">
                                                <!-- <div class="dropdown-list-image mr-3">
                                                  <img class="rounded-circle" src="/images/test-account.png" alt="user">
                                                <div class="status-indicator bg-success"></div>
                                                </div> -->
                                                <div>
                                                    <div class="small text-gray-500"><?php echo date_format($req_date_new, "F d, Y"); ?></div>
                                                    <span><?php $infoD = get_user_info($std_id);
                                                        echo $infoD['emailid']; ?></span>
                                                    <br/>
                                                    <button type="button" class="btn btn-success responseRequest"
                                                            data-id="<?php echo $req_id; ?>" value="1">Accept
                                                    </button>
                                                    <button type="button" class="btn btn-danger responseRequest"
                                                            data-id="<?php echo $req_id; ?>" value="0">Reject
                                                    </button>
                                                </div>
                                            </a>
                                        <?php else: ?>
                                            <a class="dropdown-item d-flex align-items-center dropdownAlertsItem" href="#"
                                               data-id="<?php echo $req_id; ?>">
                                                <div class="dropdown-list-image mr-3">

                                                    <?php
                                                    $profile = get_cnslr_profile($cnslr_id);
                                                    ?>
                                                    <img class="img-profile rounded-circle" src="<?php echo $profile; ?>"
                                                         alt="Profile">

                                                </div>
                                                <div>
                                                    <b><?php $infoD = get_user_info($cnslr_id);
                                                        echo $infoD['name']; ?></b>
                                                    <?php echo ($approval_status == 1) ? 'Approve' : 'Reject'; ?> your request
                                                    <div class="small text-gray-500">
                                                        <?php

                                                        if (!empty($date2->s)) {
                                                            $res_date = $date2->s . ' seconds';
                                                        }
                                                        if (!empty($date2->i)) {
                                                            $res_date = $date2->i . ' minutes';
                                                        }
                                                        if (!empty($date2->h)) {
                                                            $res_date = $date2->h . ' hours';
                                                        }
                                                        if (!empty($date2->d)) {
                                                            $res_date = $date2->d . ' days';
                                                        }
                                                        if (!empty($date2->m)) {
                                                            $res_date = $date2->m . ' months';
                                                        }
                                                        if (!empty($date2->y)) {
                                                            $res_date = $date2->y . ' years';
                                                        }
                                                        if (isset($res_date)) {
                                                            echo $res_date . " ago";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                        <?php
                                    }
                                } else {
                                    echo "<p class='dropdown-item d-flex align-items-center'>No new notifications</p>";
                                }
                                ?>
                            </div>
                            <?php if ($total_request > 5): ?>
                                <a class="dropdown-item text-center small text-gray-500" href="notification-alert.php">Show All
                                    Alerts</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row mb-5">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo (isset($total_request))? $total_request:'0'; ?></div>
                        </div>
                        <div class="col-auto"> <i class="fas fa-calendar fa-2x text-gray-300"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Accepted Requests</div>

                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $total_request_accept = statusCalculator($userid,1);
                                        echo (!empty($total_request_accept))? $total_request_accept:'0'; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rejected Requests</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $total_request_reject= statusCalculator($userid,'0');
                                        echo (!empty($total_request_reject))? $total_request_reject:'0'; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"> <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $total_request_pending = statusCalculator($userid,'pending');
                                        echo (!empty($total_request_pending))? $total_request_pending:'0'; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"> <i class="fas fa-comments fa-2x text-gray-300"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center  mb-4 mt-5 justify-content-center">
        <h1 class="h3 mb-0 font-weight-bold" style="color: black">Find College Counselors</h1>
    </div>
    <!-- Content Row -->

    <div class="slider">
        <?php
        $user_id = $_SESSION['userid'];
        $qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '".$user_id."' and approval_status = 1";
        $result = $con->query($qry);
        $cnslrIds = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cnslrIds[] = $row['req_to_couselorID'];
            }
        }

        $sql = "SELECT * FROM `tbl_users` LEFT join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE tbl_users.usertype = 'College_Counselor' AND `tbl_users`.`is_email_verified` = 1 ";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cnslr_id = $row['user_id'];
                if(in_array($cnslr_id, $cnslrIds)){
                    continue;
                }
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
                <div class="card" style="width: 18rem;">
                    <div class="text-center d-block"><img src="<?php echo $profile_picture; ?>" class="card-img-top" style="max-height: 200px; max-width: 200px; display: inline-block" alt="..."></div>
                    <div class="card-body text-center ">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text">College Counselor</p> <?php //echo (empty($description)) ? "Not defined" : trim($description);?>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>


</div>

<!-- /.container-fluid -->
</div>

<?php
function checkRequestStatus($user_id,$counselor_id){
    global $con;
    $sql = "SELECT * FROM counselor_request WHERE req_by_id = '".$user_id."' AND req_to_couselorID = '".$counselor_id."' AND (approval_status is Null OR approval_status = 0)";
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
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick-theme.css"/>
<script src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.slider').slick(
            {
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                prevArrow : '<span class="prev"><i class="fas fa-arrow-circle-left"></i></span>',
                nextArrow : '<span class="next"><i class="fas fa-arrow-circle-right"></i></span>',
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            }
        );
    });
</script>

<?php include 'footer-dashboard.php'; ?>
