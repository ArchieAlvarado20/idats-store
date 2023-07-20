<?php
$menu = "";
$active_main = "";
$active_dashboard = "";
$active_product = "";
$active_brand = "";
$active_category = "";
$stock_menu = " menu-open";
$stock_main = " active";
$active_stocks = "";
$active_logs = " active";
$active_critical = "";
$active_pricing = "";
$user_menu="";
$user_main="";
$active_user= "";
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Stock History and Logs</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <a href="stock-create.php" class="btn btn-primary text-light">Add stock</a>         
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="container col-md-12">
        <div class="card shadow p-3">
              <!-- /.card-header -->
              <div class="card-body">
              <?= alertMessage();?></div>
                <table id="myTable" class="table table-sm table-bordered table-striped bg-light mb-0 text-center">
                  <thead class="bg-light">
                  <tr>
                  <th class="text-center">ID</th>
                    <th class="text-center">Reference</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Stocked at</th>
                    <th class="text-center">Stocked by</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $users = getAll('vw_stock');
                   if(mysqli_num_rows($users) > 0 )
                   {
                       foreach($users as $transaction)
                       {
                          ?>
                            <tr>
                            <td class="text-center" ><?= $transaction['id'] ?></td>
                              <td class="text-center" ><?= $transaction['refno'] ?></td>
                              <td class="text-center"><?= $transaction['pcode'] ?></td>
                              <td class="text-center" style="font-weight:bolder"><?= $transaction['description'] ?></td>
                              <td class="text-center" ><?= $transaction['qty'] ?></td>
                              <td class="text-center"><?= $transaction['stock_at'] ?></td>
                              <td class="text-center"><?= $transaction['stock_by'] ?></td>
                              <td class="text-center"><?= $transaction['supplier'] ?></td>
                              <td  class="text-center">
                              <a href="product-edit.php?id=<?= $transaction['id'];?>" class="btn btn-sm btn-success m-0"><i class="fa fa-edit"></i> </a>
                                <a class="btn btn-sm btn-danger m-0" href="product-code.php?id=<?=$transaction['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i> </a>
                                
                              </td>
                              
                            </tr>
                         
                            
                          <?php
                        }
                      }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <?php
  require_once('partials/_footer.php');
  require_once('partials/_scripts.php');
  require_once('product-ajax.php');
  ?>

 

  
  