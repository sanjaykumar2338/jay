<?php
require 'includes/config.php';
$id=$_GET['id'];
$sql ="DELETE FROM `blog_post` WHERE id=$id";
$query=mysqli_query($con,$sql);
if($query){
    header('location:blog-list.php');
}


?>