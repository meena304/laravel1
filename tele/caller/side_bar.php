<?php 
include "dbcon.php";
$a=$_SESSION['a'];
$data = "SELECT * FROM tele_caller WHERE t_id = '$a' ";
$result = mysqli_query($con,$data);
$c = mysqli_fetch_array($result);

$data = "SELECT * FROM login WHERE telecaller_email = '$a' ";
$re = mysqli_query($con,$data);
$d = mysqli_fetch_array($re);
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="side">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
       <img src="image/5.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $c['telecaller_name'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="image/panda.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Lead Management</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="caller_dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
               <li class="nav-item">
                <a href="caller_dashboard.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="add_lead.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leads</p>
                </a>
              </li>       

              <li class="nav-item">
                <a href="password_change.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Password Change</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>