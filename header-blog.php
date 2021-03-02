<?php 

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
 include 'includes/config.php';
$id =$_GET['id'];
if(isset($id)) {

$sql4 ="SELECT * FROM blog_post WHERE id=$id";
$query4 =mysqli_query($con, $sql4) or die("query failed");
	if(mysqli_num_rows($query4)>0){
$row4 = mysqli_fetch_assoc($query4);
		$meta_desc = $row4['meta_description'];
		$meta_key = $row4['meta_keyword'];

}else {
	header('location:blog.php');
	}
}

$id =$_GET['id'];


$sql ="SELECT * FROM blog_post WHERE id=$id";
	
$query =mysqli_query($con, $sql) or die("query failed");
$roww = mysqli_fetch_array($query); 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php echo  $roww['title']; ?>" />
	<meta name="twitter:description" content="<?php echo  $roww['description']; ?>" />
	<meta name="twitter:image" content="https://www.isuriz.com/<?php echo $roww['image']; ?>" />
	<meta name="twitter:label1" content="Written by">
	<meta name="twitter:data1" content="ProviderTrust">
	<meta name="twitter:label2" content="Est. reading time">
	<meta name="twitter:data2" content="3 minutes">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $meta_desc; ?>">
	<meta name="keywords" content="<?php echo $meta_key; ?>">
<meta name="author" content="">
<title>Isuriz</title>
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
  <style type="text/css">
    .dropdown.multiselect.cityDropdown.open ul.dropdown-menu {
      display: block;
      height: 234px;
      overflow-y: scroll;
    }
    ul{
      list-style: none;
    }
  span.no_of_result {
    float: right;
  }
  div#navbarCollapse8 {
    padding-top: 10px;
  }
  a.nav-item.nav-link {
    padding-top: 7px;
    margin-right: 10px;
    font-size: 16px;
}
span.navbar-toggler-icon {
    font-size: 18px;
}
#logdiv1 {
    background: #019ff0;
	color:#fff;
    padding: 10px;
    border-radius: 27px;
    box-shadow: 8px 10px 28px #9fdbf9;
    width: 129px;
    text-align: center;
}
	@media screen and (max-width: 767px) {  
	  .active {
		  color:#019ff0 !important;
	  }
	  }
@media screen and (max-width: 600px) {
 #logdiv1 {
    background: transparent;
    box-shadow: none;
    color: #000;
    width: 60px;
	 padding: 0px;
}
}
    .parts ul {
      -moz-column-count:3;
      -moz-column-gap: 20px;
      -webkit-column-count: 3;
      -webkit-column-gap: 20px;
      column-count: 3;
      column-gap: 20px;
        padding: 0;
    }
   label.heading {
    font-size: 16px;
  }
  .result {
    padding-top: 0px;
    margin-top: 50px;
    border-top: 2px solid gray;
}
.loader {
  border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  display: none;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    #collegeForm .form-row {   
    clear: both;
  }
  
 .slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.topnav {
  overflow: hidden;
  background-color: #019ff0;
  position: relative;
}

.topnav #myLinks {
  display: none;
}

.topnav a {
  color: #019ff0;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: #fff;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
  padding: 20px 18px;
}
.topnav .active {
  background-color: #fff;
  color: white;
}
.topnav a.icon:hover{
  background-color: #019ff0;
  color: #fff;
}
#myLinks a{
  color: #fff;
}
.topnav .menu_login{
  border-bottom:2px solid #fff;
  }

	 a.navbar-brand.logo img{
		 height:56px;
	  }
	  
  </style>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</head>
<body>
<!----------------------------HEADER----------------------------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-light mycustomnav">
        <a class="navbar-brand logo"  rel="external nofollow"  href="index.php"><div class="brand-logo"><img src="images/logo.png" alt="logo"></div></a>
        <!--<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse8">
            <span class="navbar-toggler-icon"></span>
        </button>-->
		
		
		<button class="navbar-toggler collapsed navtoggle" type="button" data-toggle="collapse" data-target="#navbarCollapse8" aria-controls="navbarCollapse8" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icon-bar top-bar"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>				
		</button>
		
		
		
		

        <div class="collapse navbar-collapse" id="navbarCollapse8">
			
           
              <div class="navbar-nav ml-auto" id="mainnav">
                    <a style="color:#000;" rel="external nofollow" href="login.php" class="nav-item nav-link <?php if ($first_part=="login.php") {echo "active"; } else  {echo "noactive";}?>" ><i class="fa fa-sign-in pr-3 d-none"></i> Login Now</a>
              <a  id="logdiv1"  rel="external nofollow"  href="signup.php" class="nav-item nav-link logdiv <?php if ($first_part=="signup.php") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-user-plus pr-3 d-none"></i> Sign Up</a>
              </div>
        
        </div>
</nav>
</header>
<!----------------------------HEADER-----------------------------------> 

