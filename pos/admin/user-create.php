<?php 
$menu = "";
$active_main = " ";
$active_dashboard = "";
$active_product = " ";
$active_brand = "";
$active_category = "";
$stock_menu = "";
$stock_main = "";
$active_stocks = "";
$active_logs = "";
$active_critical = "";
$active_pricing = "";
$user_menu = " menu-open";
$user_main = " active";
$active_user= " active";
require_once('partials/_head.php');
require_once('partials/_sidebar.php');
?>
<style>
  @import url('dist/css/brand-style.css');
</style>
<!-- Google Font: Source Sans Pro -->

  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Create User</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <!-- <a href="users-create.php" class="btn btn-primary text-light">New user</a>          -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container col-md-12">
    <div class="card shadow">
            <div class="card-body">
            <?= alertMessage();?>
                <form action="user-code.php" method="POST">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>      
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">Select Role</label>
                       <select name="role" id="" class="form-control">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                       </select>
                    </div>
                    </div>
                    <div class="col-md-1">
                    <div class="mb-3 mt-1">
                    <label for="">Active</label>
                        <br/>
                        <input type="checkbox" class="form-control text-danger" name="is_ban" checked style="width:30px;height:30px">
                    </div>
                    
                    </div>
                    <div class="col-md-2">
                    <div class="mb-3 mt-1">
                    <label for="">Verified</label>
                        <br/>
                        <input type="checkbox" class="form-control text-danger" name="verify_status" checked style="width:30px;height:30px">
                    </div>
                    
                    </div>
                    <div class="col-md-3">
                    <div class="mb-5 text-right mt-4">
                        <a href="user.php" class="btn btn-danger" style="width: 100px; ">Back</a>
                        <button type="submit" name="saveUser" class="btn btn-primary" style="width: 100px;">Save</button>
                    </div>
                    </div>

                    
                    </div>
                   
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
  </div>
  </section>



<?php 
include('partials/_footer.php');
include('partials/_scripts.php');
require_once('product-ajax.php');
?>