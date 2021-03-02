<?php 
session_start();
if (!isset($_SESSION['userid'])) {
  header('Location: ' . 'login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Isuriz</title>

  <!-- Custom fonts for this template-->
  <link href="counselor-dashboard-assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="counselor-dashboard-assets/css/sb-admin-2.css" rel="stylesheet">
<style>
    .logout{
        background: #019ff0;
        color: #fff !important;
        padding: 8px 2px !important;
        border-radius: 28px;
        box-shadow: 8px 10px 28px #9fdbf9;
        text-decoration: none;
        width: 129px;
        text-align: center;
        font-size: 17px!important;
        font-family: 'Montserrat', sans-serif;
    }

     .user-status {
        color: #019ff0;
        text-align: center;
        margin-right: 30px;
        align-self: center;
    }


</style>
</head>
<body id="page-top">
<?php 


include_once 'includes/config.php';
$total_request = 0;
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$userid = $_SESSION['userid'];
  $directoryURI = $_SERVER['REQUEST_URI'];
  $path = parse_url($directoryURI, PHP_URL_PATH);
  $components = explode('/', $path);
  $first_part = $components[1];

$sql = "SELECT * FROM counselor_detail RIGHT JOIN tbl_users ON counselor_detail.user_id = tbl_users.id WHERE tbl_users.id = '".$userid."' ";
$result = $con->query($sql);
$profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
if ($result->num_rows > 0) {
  $counselor_details = $result->fetch_assoc();
  if(!empty($counselor_details['profile_picture'])):
    $profile_picture = $counselor_details['profile_picture']; 
  endif;  
}

$name = $_SESSION['first_name'];
$fname = explode(" ",$name);
$fname = $fname[0];


//Request Notification -
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

// Message Notification
$sql_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."' AND dismiss = 0 ";
$qry_req_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."' ORDER BY `counselor_dash_message`.`Id` DESC LIMIT 5";
$total_request_message = 0;
$result_m = $con->query($sql_m);

if ($result_m->num_rows > 0) {
  $total_request_message = $result_m->num_rows;
}
$result_req_msg = $con->query($qry_req_m);

?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'counselor-das-sidebar.php'; ?>   
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->



                <ul class="navbar-nav flex-row ml-auto">
                    <li class="user-status">
                        <?php
                        $id = $_SESSION['userid'];
                        $sql = "SELECT * FROM `commission` WHERE `from_id` =$id";
                        $qu = mysqli_query($con, $sql);
                        if (mysqli_num_rows($qu) > 0) {
                            $row = mysqli_fetch_array($qu);
                            if ($row['credits'] > 4) { ?>

                                <i class="fas fa-user-circle"></i>
                                <?php echo "<span>Premium</span> <span>Account</span>";
                            } else { ?>

                                <i class="fas fa-user-circle"></i>
                                <?php echo "<span>Basic</span> <span>Account</span>"; ?>
                            <?php }
                        } else { ?>
                            <i class="fas fa-user-circle"></i>
                            <span>Basic</span> <span>Account</span>
                            <?php
                        }

                        ?>
                    </li>
                </ul>


                <ul class="navbar-nav flex-row">
                    <li class=" logout-li"><a class="nav-link logout" href="logout.php"
                                              style="margin-left:15px;" data-search-open="">Logout</a></li>
                </ul>







        </nav>
        <!-- End of Topbar -->

<?php 
function get_user_info($userid){
  global $con;
  $sql = "SELECT * FROM `tbl_users` WHERE id = '".$userid."' "; 
  $result_n = $con->query($sql);
  if ($result_n->num_rows > 0) {
   $row = $result_n->fetch_assoc();
   return $row;   
  }
}

function get_cnslr_profile($userid){
  global $con;
  $sql = "SELECT `profile_picture` FROM `counselor_detail` WHERE user_id = '".$userid."' "; 
  $result_n = $con->query($sql);
  $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
  if ($result_n->num_rows > 0) {
   $row = $result_n->fetch_assoc();
   $profile_picture = $row['profile_picture'];  
  }
  return $profile_picture;
}
?>