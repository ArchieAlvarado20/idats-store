<?php
require_once('partials/_head.php');
require_once('partials/_sidebar.php');
require_once('modals/category-modals.php');
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
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Category</h1>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn btn-primary text-light " data-bs-toggle="modal" data-bs-target="#transactionAddModal">
                          New Category
                        </button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="container">
        
        <div class="card shadow p-3">
         
              <!-- /.card-header -->
              <div class="card-body">
                <table id="myTable" class="table table-sm table-bordered table-striped bg-light mb-0 text-center">
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                     $users = getAll('tblcategory');
                     if(mysqli_num_rows($users) > 0 )
                     {
                         foreach($users as $transaction)
                         {
                          ?>
                           
                            <tr>
                              <td ><?= $transaction['id'] ?></td>
                              <td style="font-weight:bolder"><?= $transaction['category'] ?></td>
                              <td class="p-1" style="width: 200px;">
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
  <?php
  require_once('partials/_footer.php');
  require_once('partials/_scripts.php');
  require_once('category-ajax.php');
  ?>
