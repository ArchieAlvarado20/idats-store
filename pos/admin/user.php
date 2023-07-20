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
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Users Table</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <a href="user-create.php" class="btn btn-primary text-light">New user</a>         
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container col-md-12">
        <div class="card shadow p-2">
            <div class="card-body">
            <?= alertMessage();?>
                <table id="myTable" class="table table-sm table-bordered table-striped bg-light mb-0 text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Active</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = getAll('tblusers');
                        if(mysqli_num_rows($users) > 0 )
                        {
                            foreach($users as $userItem)
                            {
                                ?>
                                    <tr>
                                        <td><?= $userItem['id'];?></td>
                                        <td><?= $userItem['name'];?></td>
                                        <td><?= $userItem['email'];?></td>
                                        <td><?= $userItem['phone'];?></td>
                                        <td><?= $userItem['role'];?></td>
                                        <td><?= $userItem['is_ban'] == 1 ? 'Active':'Deactivated'; ?></td>
                                        <td><?= $userItem['verify_status'] == 1 ? 'Verified':'Pending'; ?></td>
                                      <td class="text-center">
                                            <a href="user-edit.php?id=<?= $userItem['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                            <a href="user-code.php?id=<?= $userItem['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash "></i></a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        

                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="7">No Record Found</td>
                            </tr>

                            <?php
                            
                        }
                        ?>
                   
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
  </div>
  </div>
  


<?php 
include('partials/_footer.php');
include('partials/_scripts.php');
?>