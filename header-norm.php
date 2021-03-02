<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Isuriz</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
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
	display:none;
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
.hide-menu{
  display: none;
}
#myLinks a{
  color: #fff;
}
.topnav .menu_login{
  border-bottom:2px solid #fff;
  }

  </style>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!----------------------------HEADER----------------------------------->
<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$segment = 0; 
if($uri_segments[1] == 'counsellor.php' || $uri_segments[1] == 'signup_counsellor.php' || $uri_segments[1] =='counsellor-dashboard.php'){
  $segment = 1;
} 
?>  
  
<header>
  <div class="container">
    <div class="top-lft logo_mob"> <a class="logo" href="index.php"><img src="images/logo.png" alt="logo"></a> </div>
    <div class="top_rht menu_mobile <?php if($segment == 1){ echo 'hide-menu';}?>">
      <ul >
        <li> <a href="login.php"> Login Now </a> </li>
        <li> <a href="signup.php" class="logdiv"> Sign Up </a> </li> 
      </ul>
    </div>



<!-- Top Navigation Menu -->
<div class="topnav ">
  <a href="/" class="active"><img src="images/logo.png" alt="logo" width="100"></a>
  <div class="<?php if($segment == 1){ echo 'hide-menu';}?>">
    <div id="myLinks">  
       <a href="login.php" class="menu_login"> Login Now </a>
       <a href="signup.php" class="logdiv"> Sign Up </a>  
    </div>
    <a href="javascript:void(0);" class="icon" id="icon" onclick="menuFunction()">
    <i class="fa fa-bars mobilemenu-baar"></i>
    </a>
  </div>
</div>

  </div>
</header>
<!----------------------------HEADER-----------------------------------> 
