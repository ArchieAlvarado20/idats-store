<?php
$menu = " menu-open";
$active_main = " active";
$active_dashboard = " ";
$active_product = "";
$active_brand = " active";
$active_category = "";
$stock_menu = "";
$stock_main = "";
$active_stocks = "";
$active_logs = "";
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
    require_once('modals/brand-modal.php');
    ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Brand</h1>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#transactionAddModal">
                          Add New Brand
                        </button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
     <section class="content">
      <div class="container ">
        <div class="card shadow p-3">
              <div class="card-body">
                <table id="myTable" class="table table-sm table-bordered table-striped bg-light mb-0 text-center">
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Brand</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        $users = getAll('tblbrand');
                        if(mysqli_num_rows($users) > 0 )
                        {
                            foreach($users as $transaction)
                            {
                          ?>
                           
                            <tr>
                              <td ><?= $transaction['id'] ?></td>
                              <td style="font-weight:bolder"><?= $transaction['brand'] ?></td>
                              <td class="p-1">
                                <button type="button" class="BtnEditTransaction btn btn-sm btn-success m-1" value="<?=$transaction['id'] ?>"><i class="fa fa-edit"></i> Edit</button>
                                <button type="button" class="BtnDeleteTransaction btn btn-sm btn-danger m-1" value="<?=$transaction['id'] ?>"><i class="fa fa-trash"></i> Delete</button>
                                
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
  
<?php require_once('partials/_footer.php'); ?>

  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  require_once('brand-ajax.php');
  ?>
</body>
</html>
