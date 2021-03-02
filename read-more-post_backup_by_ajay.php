
<?php include 'header-blog.php'; 

$id =$_GET['id'];
if(isset($id)) {

$sql ="SELECT * FROM blog_post WHERE id=$id";
$query =mysqli_query($con, $sql) or die("query failed");
while($row = mysqli_fetch_array($query)) {
  ?>

        <div class="container">
        
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="" style="">
               
                 <img class="card-img-top" style="height:300px;width:100%; margin-top:30px;" src="<?php echo $row['image']; ?>" />
                <div class="card-body">
                <h2><?php echo $row['title']; ?></h2>
                  <br>
                  <p><?php echo $row['Author']; ?>&nbsp;|&nbsp;<?php $some_time = strtotime($row['date']);
                               echo date('F d, Y', $some_time); ?></p>
                  <br>
                <p><?php echo $row['description']; ?></p>
                
                </div>
              </div>
              </div>

              <div class="col-md-2"></div>
            </div>
            

            <div class="row">
               <div class="col-md-2"></div>
             <div class="col-md-2" style="margin-top:30px;">
           <a id="logdiv1"  href="blog.php">Go Back</a>
               </div>
             <div class="col-md-8"></div>
            </div>




           </div>
          

          
           
            <br><br>
                 <footer>
            <div class="container">
            <div class="socaldiv"> <a href="https://www.facebook.com/Isuriz-102213118305822"> <i class="fa fa-facebook"> </i> </a> <a href="https://twitter.com/IsurizLLC"> <i class="fa fa-twitter"> </i> </a> <a href="https://www.instagram.com/isurizllc"> <i class="fa fa-instagram"> </i> </a> </div>
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

         </div>
        
    </body>
</html>
<?php
}
}
 else { ?>
<meta http-equiv="refresh" content="0;url=blog.php">
<?php }?>