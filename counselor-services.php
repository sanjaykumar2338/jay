<?php 
include 'header-dashboard.php'; 
include('includes/config.php');

//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];

$message = '';
if(isset($_POST['saveOverview'])){
    $overview = $_POST['overview'];   
    $sql = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
    $result = $con->query($sql); 
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
     
      $sql = "UPDATE counselor_detail SET counselor_overview='".$overview."' WHERE user_id='".$userid."' ";
        if ($con->query($sql) === TRUE) {
          $message .= "Overview updated successfully";
        }
     
    }else{
        $sql = "INSERT INTO counselor_detail (user_id,counselor_email,counselor_overview)
        VALUES ('".$userid."','".$emailid."','".$overview."')";

        if ($con->query($sql) === TRUE) {
          $message .=  "Overview save successfully";
        } 
    } 
}


$sql = "SELECT * FROM counselor_detail WHERE user_id = '".$userid."' ";
$result = $con->query($sql); 
if ($result->num_rows > 0) {
    // output data of each row
    $counselor_details = $result->fetch_assoc();
    $counselor_overview = $counselor_details['counselor_overview'];  
    // print_r($counselor_details);
}
?>
<style>
.counsellor-services-section input[type="checkbox"] {
    width: 35px;
    height: 35px;
    position: relative;
    top: 0px;
}
.counsellor-services-section input[type='checkbox']:checked:after {
    content: '\2714';
    color: #37A000;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    right: 0px;
    top: -10px;
    position: absolute;
    width: 35px;
    height: 35px;
    z-index: 1000;
    font-size: 4.5rem;
    cursor: pointer;
} 
.counsellor-services-section input[type="checkbox"]:before {
    width: 35px;
    height: 35px;
}
</style>

  <div id="wrapper">
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
       <?php include 'counselor-das-sidebar.php'; ?>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" class="counsellor-services-section">
      <div id="page-inner">
        <div class="row">
          <div class="col-lg-12">
            <h2>Services</h2> 
			  <span>steps 3 to 8</span> 
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
            <form method="post" name="counsellor-services">
              <div class="form-group">
                <label for="exampleInputEmail1">Enter the Services </label>
                <input type="text" id="name" placeholder="Heading">
                <input type="text" id="email" placeholder="Information">
                <input type="button" class="btn btn-info add-row" value="Add Row">
              </div>
             
            </form>
          </div>

          <div class="col-md-12">
            <table class="table">
              <thead>
                  <tr>
                      <th>Select</th>
                      <th>Heading</th>
                      <th>Information</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td><input type="checkbox" name="record"></td>
                      <td>heading Text</td>
                      <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industr</td>
                  </tr>
              </tbody>
            </table>
            <button type="button" class="delete-row">Delete Row</button>            
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
 
  <?php include 'footerapp.php'; ?>
 <script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
  </script>