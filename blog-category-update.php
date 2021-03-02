<?php 
require 'includes/config.php';
if(isset($_POST['submit'])){
$id =$_GET['id'];
$name =$_POST['category'];
$slug =$_POST['slug'];
$parent =$_POST['parent_category'];
	
	$sql ="update blog_category set category_name='$name', slug='$slug', parent_category='$parent' where id=$id  ";
	
	if(mysqli_query($con, $sql)){
	header('location:blog-category.php');
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
<style>
		 p{
			  font-size: 13px;
			}
		  </style>
</head>
      <body>
        <div class="container">
          <h1 style="margin:50px 0px 40px 280px;">Add New Category</h1>
          <div class="row">
			  <div class="col-md-3"></div>
            <div class="col-md-6">
				<?php
				$id = $_GET['id'];
				$sql3 = "SELECT * FROM `blog_category` WHERE id=$id";
				$q3 =mysqli_query($con, $sql3);
				if(mysqli_num_rows($q3)>0){
					
					$result = mysqli_fetch_array($q3);
					
				
				?>
              <form class="form-group" action="" method="post">
                <lable>Name</lable>
                <input type="text" class="form-control" value="<?php echo (isset($_POST['category']))?$_POST['category']:$result['category_name'] ; ?>" name="category">
				 
                <p>The name is how it appears on your site.</p>
              <br>
                <lable>slug</lable>
                <input type="text" class="form-control" value="<?php echo (isset($_POST['slug']))?$_POST['slug']:$result['slug'] ; ?>" name="slug">
                <p>The “slug” is the URL-friendly version of the name. It is usually
                   all lowercase and contains only letters, numbers, and hyphens.</p>
                   <br>
                   
                <lable>Parent category</lable>
                  <label for="sel1">Select list:</label>
			
       <select name="parent_category"  class="form-control" id="select1">
                  <option ><?php echo (isset($_POST['parent_category']))?$_POST['parent_category']:$result['parent_category'] ; ?></option> 
			 <?php
					 }
				
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
             <p>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, 
               and under that have children categories for Bebop and Big Band. Totally optional.</p>

               <input type="submit"  class="btn btn-success" value="Update" name="submit">
              </form>

            </div>
            <div class="col-md-3">
             

            </div>


          </div>
          
        </div>
      
      </body>
</html>