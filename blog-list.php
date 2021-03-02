<?php
session_start();

if(isset($_SESSION['blog-username'])){

include 'includes/config.php';

$sql1 = "SELECT * FROM blog_post ";
$query1 =mysqli_query($con,$sql1);
if(mysqli_num_rows($query1)>0){
    ?>
    <html>
        <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        </head>
        <body>
            <div class="container">
			
               <b> Blog List</b><a href="blog-category.php"><input type="submit" value="Category" style="margin-left:800px;"  class="btn btn-light"></a><a href="blog-post.php"><input type="submit" value="Add New" style="float:right;"  class="btn btn-light"></a>
                
            <table class="table  table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
 

    <?php
    while($row =mysqli_fetch_array($query1)){
        ?>
        <tbody>
        <tr>
          
          <td><?php echo $row['title'];?></td>
          <td><button class="btn btn-success"><a href="blog-update.php?id=<?php echo $row['id']; ?>" class="text-white">Edit</a></button></td>
          <td><button class="btn btn-success"><a href="blog-delete.php?id=<?php echo $row['id']; ?>" class="text-white">Remove</a></button></td>
        </tr>
       
      </tbody>
<?php
    }
    ?>
    </table>
    <?php
}


?>

</div>
        </body>
    </html>
<?php
}
else{
header('location:blog-login.php');
}
?>