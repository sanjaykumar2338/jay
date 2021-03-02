<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'includes/config.php';
if(isset($_POST['submit'])) {
  $category = $_POST['category'];
  $slug = $_POST['slug'];
  $parent_category = $_POST['parent_category'];

  $sql ="INSERT INTO `blog_category` (`id`, `category_name`, `slug`, `parent_category`) VALUES (NULL, '$category', '$slug', '$parent_category')";

  $query =mysqli_query($con, $sql);
  if($query){
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
          <h1 style="margin-top:50px;">Add New Category</h1>
          <div class="row">
            <div class="col-md-5">
              <form class="form-group" action="" method="post">
                <lable>Name</lable>
                <input type="text" class="form-control" name="category">
                <p>The name is how it appears on your site.</p>
              <br>
                <lable>slug</lable>
                <input type="text" class="form-control" name="slug">
                <p>The “slug” is the URL-friendly version of the name. It is usually
                   all lowercase and contains only letters, numbers, and hyphens.</p>
                   <br>
                   
                <lable>Parent category</lable>
                  <label for="sel1">Select list:</label>
				  
				  
				  
				  
                  <select name="parent_category" class="form-control" id="select1">
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
             <p>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, 
               and under that have children categories for Bebop and Big Band. Totally optional.</p>

               <input type="submit"  class="btn btn-success" value="Add New Category" name="submit">
              </form>

            </div>
            <div class="col-md-7">
              <table class="table table-striped table-hover">
              <tr>
                <th>Name</th>
                <th>slug</th>
                <th>parent</th>
                <th>Action</th>
                </tr>
              <?php
              
              $sql2 ="SELECT * FROM `blog_category`";                          
                  $query2 =mysqli_query($con, $sql2) or die("query failed");
				  if (mysqli_num_rows($query2) > 0) {
					  while($row2 = mysqli_fetch_assoc($query2)) { ?>
                      <tr>
                      <td><?php echo $row2['category_name']; ?></td>
                      <td><?php echo strtolower(str_replace(" ","-",$row2['slug'])); ?></td>
                      <td><?php echo $row2['parent_category']; ?></td>
                      <td><button class="btn btn-success"><a href="blog-category-update.php?id=<?php echo $row2['id']; ?>" class="text-white">Edit</a></button>
                      &nbsp;&nbsp;<button class="btn btn-danger"><a href="blog-category-delete.php?id=<?php echo $row2['id']; ?>" class="text-white">Delete</a></button></td>
                      </tr>
                      <?php } 
                      }
                      ?>
              </table>

            </div>


          </div>
          
        </div>
      
      </body>
</html>