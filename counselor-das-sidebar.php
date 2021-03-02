<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>

<style>
    .nav-item {
        margin-top: -5px !important;
    }
    .sidebar-nav{
        font-size: 14px;
        font-family: Source Sans Pro,sans-serif;
    }
</style>


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-nav sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center bk-white" href="dashboard.php">
   <img class="brand-logo" src="images/logo.png" alt="App Logo" /> 
   <img class="brand-logo-collapsed" src="images/collapse-logo.png" alt="App Logo" />    
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  

  <?php 
  if($_SESSION['usertype'] == 'College_Counselor'): ?>
      <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Main Navigation</a></li>
      <li class="nav-item <?php echo ($first_part == "dashboard.php") ? "active" : "";?>">
          <a class="nav-link" href="dashboard.php" title="Dashboard" >
              <i class="fas fa-tachometer-alt"></i>
              <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
          </a>
      </li>
      <!-- Nav Item - Dashboard -->
<!--      <li class='nav-item --><?php //echo ($first_part == "counselor-dashboard.php") ? "active" : "";?><!--'>-->
<!--          <a class="nav-link" href="counselor-dashboard.php"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a>-->
<!--      </li>-->
      <!-- Divider -->
      <hr class="sidebar-divider">
    <!-- Nav Item - Profile -->
    <li class='nav-item <?php echo ($first_part == "counselor-profile.php") ? "active" : "";?>'>
      <a class="nav-link" href="counselor-profile.php"> <i class="fas fa-user-cog"></i> <span>Profile</span></a>
    </li>


    <!-- Nav Item - About -->
  <li class='nav-item <?php echo ($first_part == "counselor-about.php") ? "active" : "";?>'>
    <a class="nav-link" href="counselor-about.php"> <i class="fas fa-user-edit"></i><span>About</span></a>
  </li>

  <!-- Nav Item - Fees -->
  <li class='nav-item <?php echo ($first_part == "counselor-fees.php") ? "active" : "";?>'>
    <a class="nav-link" href="counselor-fees.php"> <i class="fas fa-hand-holding-usd"></i> <span>Fees</span></a>
  </li>

  <!-- Student List -->
	<!--
  <li class='nav-item <?php echo ($first_part == "counselor-student.php") ? "active" : "";?>'>
    <a class="nav-link" href="counselor-student.php"> <i class="fas fa-user-friends"></i> <span>Student List</span></a>
  </li>
-->

  <?php else: ?>
      <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Main Navigation</a></li>
      <li class="nav-item <?php echo ($first_part == "dashboard.php") ? "active" : "";?>">
          <a class="nav-link" href="dashboard.php" title="Dashboard" >
              <i class="fas fa-tachometer-alt"></i>
              <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
          </a>
      </li>
<!--    <li class='nav-item --><?php //echo ($first_part == "my-counselor-list.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="my-counselor-list.php"> <i class="fas fa-user-check"></i> <span>My College Counselors</span></a>-->
<!--    </li>-->

<!--    <li class='nav-item --><?php //echo ($first_part == "counselor-list.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="counselor-list.php"> <i class="fas fa-search"></i> <span>College Counselors</span></a>-->
<!--    </li>-->

<!--    <li class='nav-item --><?php //echo ($first_part == "counselor-contact-us.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="counselor-contact-us.php"> <i class='fas fa-envelope'></i> <span> Contact Us</span></a>-->
<!--    </li>-->


  <?php endif; ?>

    <li class='nav-item active <?php echo ($first_part == "counselor_college_list.php") ? "active" : "";?>'>
        <a class="nav-link" href="counselor_college_list.php"> <i class="fas fa-list"></i> <span>My College List</span></a>
    </li>

    <li class='nav-item '>
        <a class="nav-link" href="form2.php"> <i class="far fa-edit"></i> <span>Edit Profile</span></a>
    </li>

    <li class='nav-item <?php echo ($first_part == "counselor_contact_us.php") ? "active" : "";?>'>
        <a class="nav-link" href="counselor_contact_us.php"> <i class="fas fa-ticket-alt"></i> <span>Contact Us</span></a>
    </li>

    <li class='nav-item <?php echo ($first_part == "counselor_invite.php") ? "active" : "";?>'>
        <a class="nav-link" href="counselor_invite.php"> <i class="fas fa-ticket-alt"></i> <span>Invite Students</span></a>
    </li>
    <li class="nav-item <?php echo ($first_part == "counselor-dashboard.php") ? "active" : "";?>">
        <a class="nav-link" href="counselor-dashboard.php">
            <i class="fa fa-globe"></i>
            <span>College Counselor Hub</span>
        </a>
    </li>
    <li class='nav-item <?php echo ($first_part == "counselor_setting.php") ? "active" : "";?>'>
        <a class="nav-link" href="counselor_setting.php"> <i class="fas fa-cog"></i> <span>Settings</span></a>
    </li>
    <li class='nav-item'>
      <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
      </a>     
    </li>

  <!-- Divider -->
<!--  <hr class="sidebar-divider d-none d-md-block">-->
  <!-- Sidebar Toggler (Sidebar) -->
<!--  <div class="text-center d-none d-md-inline">-->
<!--    <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
<!--  </div>-->
</ul>



