<?php
$menu = "";
$active_main = "";
$active_dashboard = "";
$active_product = "";
$active_brand = "";
$active_category = "";
$stock_menu = " menu-open";
$stock_main = " active";
$active_stocks = " active";
$active_logs = "";
$active_critical = "";
$active_pricing = "";
$user_menu="";
$user_main="";
$active_user= "";
$active_supplier = "";
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
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Inventory List and Actual Stocks</h1>
          </div>
          <!-- <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <a href="stock-create.php" class="btn btn-primary text-light">Add stock</a>         
            </ol>
          </div> -->
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
                <table id="myTable" class="table table-sm table-bordered table-striped bg-light mb-0 text-center"   keys: {
        tabIndex: -1>
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Barcode</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Re-order</th>
                    <th class="text-center">Actual Stock</th>
                    <th class="text-center">Status</th>
                   
                 
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $users = getAll('tblproduct');
                   if(mysqli_num_rows($users) > 0 )
                   {
                       foreach($users as $transaction)
                       {
                   
                          ?>
                            <tr>
                              <td class="text-center" style="font-weight:bolder"><?= $transaction['id'] ?></td>
                              <td class="text-center"><?= $transaction['pcode'] ?></td>
                              <td class="text-center" ><?= $transaction['barcode'] ?></td>
                              <td class="text-center" style="font-weight:bolder"><?= $transaction['description'] ?></td>
                              <td class="text-center"><?= $transaction['re_order'] ?></td>
                              <td class="text-center"><?= $transaction['qty'] ?></td> 
                              <td class="text-center"><?= $transaction['status'] == 1 ? "<span class='badge badge-danger text-sm'>Critical</span>":"<span class='badge badge-success text-sm'>Full</span>" ?>
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
  ?>


  
  