<?php include 'headerapp.php'; 
require 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Blog | Isuriz</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="Blog | Isuriz">
<meta name="description" content="Find tips and information on college planning topics. Isuriz wants to help you find the right college for you.">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Blog | Isuriz" />
<meta property="og:description" content="Find tips and information on college planning topics. Isuriz wants to help you find the right college for you." />
<meta property="og:url" content="https://www.isuriz.com/blog.php" />
	
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/site.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
	<!-- Custom script -->
	<script src="js/mycustomjs.js"></script> 

		</head>
	<body>
		<!----------------------------HEADER----------------------------------->
		<?php include 'header-before-login.php'; ?>
<!----------------------------HEADER-----------------------------------> 
		
		
		
<!----------------------------BANNER----------------------------------->
<div class="banner inner-banner multi-step-banner" style="background:url(images/blog2.png) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> Blog </h1>
    </div>
  </div>
</div>
<!----------------------------BANNER-----------------------------------> 
<!----------------------------BANNER-----------------------------------> 

<!----------------------------BODY-----------------------------------> 

<!----------------------------service----------------------------------->
<?php 
		$id =$_GET['id'];
		
$sql ="SELECT * FROM `blog_post` ORDER BY `blog_post`.`date` DESC";
$query =mysqli_query($con, $sql)  or die('query failed');

?>
<div class="service myblog-archive">
	<div class="container">
	<div class="row row-cols-1 row-cols-md-3">
		
		
			<?php while($row =mysqli_fetch_array($query)) { 
			?>
			<div class="col mb-4">
			<div class="card h-100">
				<div class="main-img">
					<a href=""><img src="<?php echo $row['image']; ?>" class="card-img-top blog-img" /></a>
				</div>
				<div class="card-body">
			<a class="title-link"  href="read-more-post.php?id=<?php echo $row['id'];?>"><h1 class="card-title blog-heading"><?php echo $row['title']; ?></h1></a>
			<p class="card-text">
				<?php echo $row['Author']; ?>&nbsp;|&nbsp;<?php 
				$some_time = strtotime($row['date']);
				echo date('F d, Y', $some_time);
				?>
			</p>
			<p>
				

				<?php echo substr(strip_tags($row['description']),0,120).'...'; ?>
			</p>
					<div class="card-footer">
			<a class="read-more" href="read-more-post.php?id=<?php echo $row['id']; ?>">Read more <i></i></a>
			</div>
					</div>
				</div>
			</div>
		<?php }?>	

		</div>
	</div>
	</div>
</div>
<!----------------------------BANNER-----------------------------------> 

<!----------------------------BODY-----------------------------------> 

<!----------------------------service----------------------------------->


<!----------------------------service-----------------------------------> 

<!----------------------------why choose-----------------------------------> 

<!----------------------------why choose-----------------------------------> 

<!----------------------------FOOTER----------------------------------->
<?php include 'footer.php'; ?>

<!----------------------------FOOTER-----------------------------------> 
<!-- jQuery --> 
<script src="js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
