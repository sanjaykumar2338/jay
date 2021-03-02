
<?php 

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Asuriz</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
	  color:#000;
    padding-top: 7px;
    margin-right: 10px;
    font-size: 16px;
}
span.navbar-toggler-icon {
    font-size: 18px;
}
.logdiv {
    background: #019ff0;
    color: #fff !important;
    padding: 10px;
    border-radius: 27px;
    box-shadow: 8px 10px 28px #9fdbf9;
    width: 129px;
    text-align: center;
}
	@media screen and (max-width: 767px) {  
	  .mystyle {
		  color:#019ff0 !important;
	  }
	  }
@media screen and (max-width: 600px) {
 .logdiv {
    background: transparent;
    box-shadow: none;
    color: #000 !important;
    width: 60px;
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

  </style>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!----------------------------HEADER----------------------------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand logo" href="index.php"><img src="images/logo.png" alt="logo"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse8">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse8">
			
           
              <div class="navbar-nav ml-auto" id="mainnav">
                    <a href="login.php" class="nav-item nav-link <?php if ($first_part=="login") {echo "active"; } else  {echo "noactive";}?>" >Login Now</a>
              <a href="signup.php" class="nav-item nav-link logdiv <?php if ($first_part=="login") {echo "active"; } else  {echo "noactive";}?>">Sign Up</a>
              </div>
        
        </div>
</nav>
</header>
<!----------------------------HEADER-----------------------------------> 

