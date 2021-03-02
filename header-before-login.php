<header>
    <nav class="navbar navbar-expand-lg navbar-light mycustomnav my-header-nav">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="index.php"><div class="brand-logo"><img src="images/logo.png" alt="logo"></div></a>
        <!--<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse8">
            <span class="navbar-toggler-icon"></span>
        </button>-->
		
		<button class="navbar-toggler collapsed navtoggle" type="button" data-toggle="collapse" data-target="#navbarCollapse8" aria-controls="navbarCollapse8" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icon-bar top-bar"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>				
		</button>
		
        <div class="collapse navbar-collapse px-sm-0" id="navbarCollapse8">
            <ul class="navbar-nav ml-auto" id="mainnav">
            <li>
                <a href="login.php" class="nav-item nav-link before-login-nav-link <?php if ($first_part=="login.php") {echo "active"; } else  {echo "noactive";}?>" ><i class="fa fa-sign-in pr-3 d-none"></i> Login Now</a>
                </li>
                <li>
                <a id="logdiv1" href="signup.php" class="nav-item nav-link nav-logout <?php if ($first_part=="signup.php") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-user-plus pr-3 d-none"></i> Sign Up</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</header>