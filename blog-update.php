<?php 
session_start();



if(isset($_SESSION['blog-username'])){
require 'includes/config.php';

$id=$_GET['id'];
$profile_picture = $message = '';
$sql1 = "SELECT * FROM blog_post WHERE id=$id";
$query1 =mysqli_query($con,$sql1);
if(mysqli_num_rows($query1)>0){
  $row =mysqli_fetch_array($query1);
  $da = $row['date'];
	$title=$row['title'];
  $date=date_create($da);
  $date2=date_format($date,"Y-m-d");
  $profile_picture = $row['image'];
  $author = $row['Author'];
	$meta_desc = addslashes($_POST['meta_desc']);
	$meta_key = addslashes($_POST['meta_key']);
?>
<?php } 

if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $title = addslashes($_POST['title']);
    $author = $_POST['author'];
    $desc = addslashes($_POST['desc']);
    $date = $_POST['date'];
	 $meta_desc = addslashes($_POST['meta_desc']);
	
	
	$meta_key = addslashes($_POST['meta_key']);

    
  $valid_extensions = array('jpeg','jpg','png','gif','bmp','pdf','doc','ppt'); //valid extensions
  $path = "assets/blog/"; 
  if($_FILES['image']){
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = "counselor_profile_".rand(1000,1000000).$img;

    // check's valid format
    if(in_array($ext, $valid_extensions)){
      $path = $path.strtolower($final_image); 
      if(move_uploaded_file($tmp,$path)){
        $profile_picture = $path;
      }
    }
  }

  $sql = "update blog_post set title='$title', Author='$author',description=' $desc', image='$profile_picture',date = '$date', meta_description='$meta_desc', meta_keyword='$meta_key' where id=$id  ";
	
  
    $query = mysqli_query($con, $sql) or die('query failed');
    if($query){
      $message =  "Update Successfully";	 
		
      //echo "<meta http-equiv='refresh' content='2'>";  
        // header('location:blog-list.php');
    }else{
        $message = "Something goes wrong, re try again. ";
    }
 
}



?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
<form style="margin-top:40px;" action="" method="post" enctype="multipart/form-data" class="form-group">
	<a  style="color:green" href="blog-list.php"><i class="fa fa-home"></i>&nbsp;Blog List</a><a href="blog-post.php"><input type="button" value="Add New" style="float:right; background:dark;"  class="btn btn-light"></a>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">

  <div >
    <label for="Title">Title</label>
    <input type="text" name="title" value="<?php echo (isset($_POST['title']))?$_POST['title']:$title ; ?>" class="form-control" id="date" required>
  </div>
  <div >
    <label for="Title">Author</label>
    <input type="text" name="author" value="<?php echo (isset($_POST['author']))?$_POST['author']:$author ; ?>" class="form-control" id="author" required>
  </div>
  <div>
    
    <label for="pwd">Description</label><br>
    <textarea id="w3review"  name="desc" rows="8" cols="77" required><?php echo (isset($_POST['desc']))?$_POST['desc']: $row['description']; ?></textarea>
  </div>
  <div>
   
    <label for="pwd">Image</label>
    <input type="file" id="image" value="<?php echo (isset($_POST['image']))?$_POST['image']:$profile_picture ; ?>" name="image" id="fileToUpload">
	  <img style="height:120px; width:120px;"  src="<?php echo $row['image'];?>">
  </div>
 <div>
    <label for="Title" required>Date</label>
    <input type="date" name="date" value="<?php echo (isset($_POST['date']))?$_POST['date']:$date2 ; ?>" class="form-control" id="date">
  </div>
			<h3 style="margin-top:40px; color:black; text-decoration:underline;">For SEO Purpose</h3>
			<div>
    
    <label for="pwd">Meta Description</label><br>
    <textarea id="w3review" name="meta_desc" rows="8" cols="77" required><?php echo (isset($_POST['meta_desc']))?$_POST['meta_desc']: $row['meta_description']; ?></textarea>
        
        
				<p>Write Brief Description about the content</p>
  </div>
			<div>
    
    <label for="pwd">Meta Keyword</label><br>
    <textarea id="w3review" name="meta_key" rows="8" cols="77"  required><?php echo (isset($_POST['meta_key']))?$_POST['meta_key']: $row['meta_keyword']; ?></textarea>
        
      
				<p>Write Meta Keyword about the content</p>
  </div>
  <br>
  <button type="submit" name="submit" id="insert" class="btn btn-success">Submit</button>
</form>
<div class="col-sm-12 alert alert-info" style="display:<?php echo (!empty($message))?'block':'none'; ?>">  
	<?php 
	if(!empty($message)){
		echo $message;
	}
	?>
</div>		
		
</div>

</div>
</div>
	<script>
		CKEDITOR.replace( 'desc' );
		</script>
</body>
</html>
<?php
}
else{
header('location:blog-login.php');
}
?>
