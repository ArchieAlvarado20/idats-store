<?php
if(isset($_SESSION['auth_user'])) : 
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/shopping-basket.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Idats Store</span>
      <span class="badge badge-danger navbar-badge">Admin Panel</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3">
        <div class="image">
          <img src="dist/img/archie.jpg" class="img-circle elevation-2" style="margin-top:-50px;" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block px-2 text-sm text-white" style="font-weight: bold; text-transform:uppercase"><?=$_SESSION['auth_user']['username'];?><a href="#" class=" px-2 text-sm text-white" ><?=$_SESSION['auth_user']['role'];?></a></a>
        </div>
        <div class="info">
          
        </div>
      </div>
      
<?php endif?>

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
         
          <li class="nav-item">
            <a href="index.php" class="nav-link<?php echo $active_dashboard;?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sales
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          
          <li class="nav-item<?php echo $menu;?>">
            <a href="" class="nav-link<?php echo $active_main;?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-warning right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="product.php" class="nav-link<?php echo $active_product;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pricing.php" class="nav-link<?php echo $active_pricing;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pricing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="brand.php" class="nav-link<?php echo $active_brand;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php" class="nav-link<?php echo $active_category;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item<?php echo $stock_menu;?>">
            <a href="" class="nav-link<?php echo $stock_main;?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Stocks
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-warning right">6</span> -->
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="stock-inventory.php" class="nav-link<?php echo $active_stocks;?>">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Inventory
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="stock-history.php" class="nav-link<?php echo $active_logs;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Logs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="stock-critical.php" class="nav-link<?php echo $active_critical;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Critical Stock</p>
                </a>
              </li>
          </ul>
          </li>
    
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Supplier
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
           <!-- Divider -->
        <hr class="my-2 border-2">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Records</h6>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Top Selling
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sold Items
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cancelled Order
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        
          <hr class="my-2 border-2">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Settings</h6>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Store Setting
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo $user_menu;?>">
            <a href="" class="nav-link <?php echo $user_main;?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User Setting
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-warning right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="user.php" class="nav-link<?php echo $active_user;?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Account</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active/Deactivate Account</p>
                </a>
              </li> -->
            </ul>
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