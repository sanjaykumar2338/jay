<?php
session_start();
include 'includes/config.php';
if(isset($_POST['submit'])){
$username=$_POST['username']; 
$password=$_POST['password'];

 
if($username == "admin" && $password == xjdsyz123){
	$_SESSION['blog-username'] = $username;
	header('location:blog-list.php');
}else{
	?>
<script>
	alert('Unauthorized username');
	</script>
<?php
}
}
?>



<html>
	<head>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>
	<body>
		<div class="container">
			<div class="row" style="margin-top:100px;">
			<div class="col-md-3"></div>
			<div class="col-md-6">
<form method="post">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" class="form-control" placeholder="Enter username" autocomplete="off" >
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
				</div>
				<div class="col-md-3"></div>
				</div>
			</div>
		</body>
	</html>
