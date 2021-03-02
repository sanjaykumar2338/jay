<?php 
session_start();

if(isset($_SESSION['blog-username'])){


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/config.php';

if(isset($_POST['submit'])){
    $title = addslashes($_POST['title']);
    $author = $_POST['author'];
    $desc = addslashes($_POST['desc']);
	 $date = $_POST['date'];
	 $meta_desc = addslashes($_POST['meta_desc']);
	$meta_key = addslashes($_POST['meta_key']);
    $profile_picture = '';
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
  if($title == '' || $desc == '' || $profile_picture ==''){
      echo "All filed are Required";
  }
  else{

    $sql = "INSERT INTO `blog_post` (`title`, `Author`, `description`, `image`, `date`, `meta_description`, `meta_keyword`) VALUES ('$title', '$author','$desc', '$profile_picture','$date','$meta_desc','$meta_key')";
    $query = mysqli_query($con, $sql);
	  print_r($query);
    if($query){
        
       header('location:blog.php');
		
    }else{
        echo "not inserted";
    }

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
	<a  style="color:green" href="blog-list.php"><i class="fa fa-home"></i>&nbsp;Blog List</a>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">

  <div >
    <label for="Title">Title</label>
    <input type="text" name="title" class="form-control" id="date">
  </div>
  <div >
    <label for="Title">Author</label>
    <input type="text" name="author" class="form-control" id="author">
  </div>
  <div>
    
    <label for="pwd">Description</label><br>
    <textarea id="w3review" name="desc" rows="8" cols="77"> </textarea>
  </div>
  <div>
   
    <label for="pwd">Image</label>
    <input type="file" id="image" name="image" id="fileToUpload">
  </div>
 <div>
    <label for="Title">Date</label>
    <input type="date" name="date" class="form-control" id="date">
  </div>
  <br>
			 <label for="Category">Category</label>
			<select name="parent_category" class="form-control" id="select1" >
                  <option>None</option> 
					  <?php
				  $sql1 ="SELECT category_name FROM `blog_category`";                          
                  $query1 =mysqli_query($con, $sql1) or die("query failed");
				  if (mysqli_num_rows($query1) > 0) {
					  while($row = mysqli_fetch_assoc($query1)) { ?>
					  <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
					  
					  <?php
					  }					  
				  }
				  ?>
                   
                  </select>
			
			<h3 style="margin-top:40px; color:black; text-decoration:underline;">For SEO Purpose</h3>
			<div>
    
    <label for="pwd">Meta Description</label><br>
    <textarea id="w3review"  placeholder="Describe yourself here..." name="meta_desc" rows="8" cols="77" ></textarea>
				<p>Write Brief Description about the content</p>
  </div>
			<div>
    
    <label for="pwd">Meta Keyword</label><br>
    <textarea id="w3review"  placeholder="eg. School ,college ,University" name="meta_key" rows="8" cols="77"  ></textarea>
        
        
				<p>Write Meta Keyword about the content</p>
  </div>
			<br>
  <button type="submit" name="submit" id="insert" class="btn btn-success">Submit</button>
			
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>
<script>  
	CKEDITOR.replace( 'desc' );
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
</body>
</html>
<?php
}
else{
header('location:blog-login.php');
}
?>