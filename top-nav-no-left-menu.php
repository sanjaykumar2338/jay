<header>
 	<nav class="navbar my-header-nav">
  		<div class="container-fluid">
		  	<div class="profile-header"> 
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed headernavtoggle" data-toggle="collapse">
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>                      
					</button>
					<?php 
						if (!isset($_SESSION['userid'])) {
							echo '<a class="logo navbar-brand" href="index.php">';
						}
						else{
							echo '<a class="logo navbar-brand" href="dashboard.php">';
						}
						?>
					<div class="brand-logo"><img class="img-responsive" src="images/logo.png" alt="App logo"></div>
					</a>
					<!--user status for mobile-->
					<div class="user-status d-mobile">
					<?php 
					$id =$_SESSION['userid'];
					$sql ="SELECT * FROM `commission` WHERE `from_id` =$id";
					$qu =mysqli_query($con, $sql);
					if(mysqli_num_rows($qu) >= 0){
					$row =mysqli_fetch_array($qu);  
					if($row['credits'] >4) {  ?>    
						<i class="fas fa-user-circle"></i>
					<?php echo "<span>Premium</span> <span>Account</span>"; 
						}else {?>
						<i class="fas fa-user-circle"></i>
					<?php echo "<span>Basic</span> <span>Account</span>";?>
					<?php  } } ?> 
				</div>   
				<!--end user status mobile-->
				</div>
				<!--user status for desktop-->
				<div class="user-status d-desktop">
					<?php 
					$id =$_SESSION['userid'];
					$sql ="SELECT * FROM `commission` WHERE `from_id` =$id";
					$qu =mysqli_query($con, $sql);
					if(mysqli_num_rows($qu) >= 0){
					$row =mysqli_fetch_array($qu);  
					if($row['credits'] >4) {  ?>    
						<i class="fas fa-user-circle"></i>
					<?php echo "<span>Premium</span> <span>Account</span>"; 
						}else {?>
						<i class="fas fa-user-circle"></i>
					<?php echo "<span>Basic</span> <span>Account</span>";?>
					<?php  } } ?> 
				</div>   
				<!--end user status desktop-->
		
				<div class="collapse navbar-collapse" id="myNavbar2">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php" class="nav-logout"><i class="fa fa-sign-out pr-3 d-none"></i> Logout </a> </li>
					</ul>
				</div>
			</div>
  		</div>
	</nav>
</header>