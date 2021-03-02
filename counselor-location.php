<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'header-dashboard.php'; 
include('includes/config.php');

//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];



$message = '';
if(isset($_POST['saveTitle'])){
    $title = $_POST['title'];   
    $sql = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
    $result = $con->query($sql); 
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
     
      echo $sql = "UPDATE counselor_detail SET counselor_title='".$title."' WHERE user_id='".$userid."' ";
        if ($con->query($sql) === TRUE) {
          $message .= "Title updated successfully";
        }
     
    }else{
        $sql = "INSERT INTO counselor_detail (user_id,counselor_email,counselor_title)
        VALUES ('".$userid."','".$emailid."','".$title."')";

        if ($con->query($sql) === TRUE) {
          $message .=  "Title save successfully";
        } 
    } 
}

$sql = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
$result = $con->query($sql); 
if ($result->num_rows > 0) {
    // output data of each row
    $counselor_details = $result->fetch_assoc();
    $counselor_title = $counselor_details['counselor_title'];  
    // print_r($counselor_details);
}

?>

<div id="wrapper">
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
     <?php include 'counselor-das-sidebar.php'; ?>   
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-lg-12">
            <h2>Title</h2> <span>steps 1 to 8</span> 
          </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
          <div class="col-lg-12 "> </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">         


            <form method="post" name="postTitle">              
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Check me out
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>





          </div>

          <div class="col-md-12">
            <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
                      
          </div>


        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
  </div>
<?php 
  echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>
  <?php include 'footerapp.php'; ?>