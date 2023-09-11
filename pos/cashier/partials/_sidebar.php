<?php
if(isset($_SESSION['auth_user'])) : 
 
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/shopping-basket.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Idats Store</span>
      <span class="badge badge-danger navbar-badge">Cashier Panel</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/archie.jpg" class="img-circle elevation-2 mt-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block px-2 text-sm text-white" style="font-weight: bold; text-transform:uppercase"><?=$_SESSION['auth_user']['username'];?></a><a href="#" class="d-block px-2 text-sm text-white" style="font-weight: regular; text-transform:lowercase"><?=$_SESSION['auth_user']['role'];?></a>
          
        </div>
      </div>
<?php endif?>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F1] New Transaction
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#cart-add-modal" >
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F2] Search Product
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F3] Add Discount
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F4] Settle Payment
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F5] Clear Cart
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../security/passwordReset.php" class="nav-link" onclick="return confirm('Are you sure you want to your password?')">
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F6] Change Password
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                [F7] Daily Sales
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          
          

          <hr class="py-1">

          <li class="nav-item">
            <a href="logout-code.php" class="nav-link active bg-danger" onclick="return confirm('Are you sure you want to logout?')">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
                <!-- <span class="badge badge-warning right">6</span> -->
              </p>
            </a>
          </li>

          <hr class="py-2">
              
      </nav>
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>