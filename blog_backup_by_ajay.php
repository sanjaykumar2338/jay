<?php include 'headerapp.php'; 
require 'includes/config.php';
?>

<!----------------------------BANNER----------------------------------->
<html>
	<head>
		<style>
			.hover-item:hover{
			color:green;
			}
			
			</style>
		</head>
	<body>
<div class="banner inner-banner" style="background:url(images10/blog-img.jpg) no-repeat; background-position:bottom;">
  <div class="container">
    <div class="banner-part">
      <h1> Blog </h1>
    </div>
  </div>
</div>
<!----------------------------BANNER-----------------------------------> 

<!----------------------------BODY-----------------------------------> 

<!----------------------------service----------------------------------->\
<?php 
		$id =$_GET['id'];
		
$sql ="SELECT * FROM `blog_post`";
$query =mysqli_query($con, $sql)  or die('query failed');

?>
<div class="service">
<div class="container">
	<div class="row">
		<?php while($row =mysqli_fetch_array($query)) { 
		
		?>
		<div class="col-md-4" style="margin:10px 0px 40px 0px; padding:10px; color:black;">
		<a href=""><img style="height:200px;width:500px;" src="<?php echo $row['image']; ?>" /></a>
			<br><br>
			<a  href="read-more-post.php?id=<?php echo $row['id'];?>"><h1 style="color:black;"><?php echo $row['title']; ?></h1></a>
			
		<p><?php echo $row['Author']; ?>&nbsp;|&nbsp;<?php 
	$some_time = strtotime($row['date']);
	echo date('F d, Y', $some_time);
	 ?></p>
			
		<p><?php echo substr($row['description'],0,120); ?></p>
			<a class="hover-item" href="read-more-post.php?id=<?php echo $row['id']; ?>">Read more ></a>
		</div>
	<?php }?>	
		
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
<footer>
  <div class="container">
    <div class="socaldiv"> <a href="https://www.facebook.com/Isuriz-102213118305822"> <i class="fa fa-facebook"> </i> </a> <a href="https://twitter.com/IsurizLLC"> <i class="fa fa-twitter"> </i> </a>  <a href="https://www.instagram.com/isurizllc"> <i class="fa fa-instagram"> </i> </a> </div>
    <div class="fotdiv">
      <ul>
        <li><a href="/about.html"> About Us </a> </li>        
        <li><a href=""> Contact Us </a> </li>
        <li><a href="/careers.html"> Careers </a> </li>        
        <li><a href="/privacy-policy.html"> Privacy Policy </a> </li>
      </ul>
      <p> © 2020 Isurison. All Rights Reserved. </p>
    </div>
  </div>
</footer>

<!----------------------------FOOTER-----------------------------------> 
<!-- jQuery --> 
<script src="js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
