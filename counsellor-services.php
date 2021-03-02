<?php include 'headerapp.php'; ?>

<?php 
//get User id by session 
// $userid = $_SESSION['userid'];

include('includes/config.php');
$errormsg = '';
if(isset($_POST['saveTitle'])){
  print_r($_POST);
  $_POST = array();
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
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li > 
            <a href="counsellor-dashboard.php"><i class="fa fa-pencil" aria-hidden="true"></i>Title<i class="fa fa-check-circle" aria-hidden="true"></i> </a> 
          </li>
          <li> 
            <a href="counsellor-overview.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>Overview <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li class="active-link"> 
            <a href="counsellor-services.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Services <i class="fa fa-check-circle" aria-hidden="true"></i>  </a> 
          </li>
          <li> 
            <a href="counsellor-expertise.php"><i class="fa fa-qrcode "></i>Expertise <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-location.php"><i class="fa fa-map-marker" aria-hidden="true"></i>Location <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-visibility.php"><i class="fa fa-user" aria-hidden="true"></i> Visibility <i class="fa fa-check-circle" aria-hidden="true"></i> </a> 
          </li>
          <li> 
            <a href="counsellor-fees.php"><i class="fa fa-usd" aria-hidden="true"></i>Fees <i class="fa fa-check-circle" aria-hidden="true"></i></a> </li>
          <li> <a href="counsellor-review.php"><i class="fa fa-check" aria-hidden="true"></i>Review</a> </li>
        </ul>
      </div>
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