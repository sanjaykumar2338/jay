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

if(isset($_POST['reply'])){
	$id =$_GET['id'];
$sql2 = "SELECT * FROM `counselor_dash_message` WHERE id =$id ";
	$query2 =mysqli_query($con, $sql2) or die("query failed selection");
	if(mysqli_query($con, $sql2)){
	$row2 =mysqli_fetch_assoc($query2);
		echo $row2;
		
		$reply = $row2['Id'];
		$from_id =  $_SESSION['userid'];	
		$to_id =  $row2['from_id'];
		$message = $_POST['message'];
		$date = date("Y-m-d h:i:s");
		
		$sql3 ="INSERT INTO `counselor_dash_message` (`from_id`, `to_id`, `message`, `date`, `reply_id`) VALUES ('$from_id', '$to_id', '$message' , '$date', '$reply')";
	
		$query3 =mysqli_query($con, $sql3) or die("query failed inserted");
		
	}

	
$id =$_GET['id'];
if(isset($id)) {
	$sql = "SELECT * FROM `counselor_dash_message` WHERE id =$id ";
	$query =mysqli_query($con, $sql) or die("query failed");
	
	?>

		<div class="row">
        <div class="col-2"></div>
        <div class="col-8 fmessage">
        <?php 
	while($row = mysqli_fetch_array($query)) {
		$from_id = $row['from_id']; 
		
		
		
		?>
			<header style="height:70px;">
	<h2 ><?php 
	
	$sql1 = "SELECT * FROM `tbl_users` where id='$from_id'";
	$query_1 =mysqli_query($con, $sql1) or die("query failed");
	while($row_1 = mysqli_fetch_array($query_1)){
		echo "From " .  $row_1['name'];
		
		
		?></h2>
	</header>
<hr>
		<div class="row">
		
			<div class="col-8">
			<span style="color:#33ccff;" ><?php echo trim($row['message']); ?></span>
			</div>
				<div class="col-4"></div>
			</div>
			
		<?php  
		$sql5 = "SELECT * FROM `counselor_dash_message` WHERE id =$from_id";
		$query5 =mysqli_query($con, $sql5) or die("query failed");
		while($row5 = mysqli_fetch_array($query5)) {
		?>
			<div class="row">
			<div class="col-4"></div>
			<div class="col-8">
			<span style="color:#33ff33; margin-left:100px;" ><?php echo $row5['message']; }?></span>
			</div>
			</div>
	<?php } } ?>
		
			
			<br>
			<form method="post">
			<textarea name="message" id="" cols="30" rows="2" style="overflow: auto;"></textarea> 
			<input type="submit" name="reply" value="Reply" style="border-radius:50px;" class="btn btn-success text-white">
			</form>
			
			<?php } } ?>
				
				
				
			
        </div>
			
        <div class="col-2">
			
			</div>
        
        </div>

