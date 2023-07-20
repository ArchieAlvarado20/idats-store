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
require_once('partials/_head.php');
//add
if(isset($_POST['save_stock'])){
  $id = $_POST['stock'];
 //  echo $all_id;

 foreach($id as $stock)
 {
   $qry = "INSERT INTO tblstock(pcode1)VALUES('$stock')";
   $qry_run = mysqli_query($con, $qry);

   if($qry_run){
    redirect('stock-history.php','Stock successfully added');
   }else{
     redirect('stock-create.php','Something went wrong');
   }
 }
}
require_once('partials/_sidebar.php');
require_once('modals/stock-modal.php');
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
          <div class="col-sm-12 text-center">
          <h1 class="fw-bold text-center" style="font-weight: bolder;">Add stock</h1>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
             
                    <!-- <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#stock-add-modal">
                          Check Out
                   </button> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="container col-md-8">
      
        <div class="card shadow">

              <!-- /.card-header -->
              
              <div class="card-body">
                <form action="" method="POST">
              <table id="myTable" class="table table-bordered table-striped table-hover">
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $users = "SELECT * FROM tblproduct ORDER BY description ASC";
                   $users_run = mysqli_query($con,$users);
                   if(mysqli_num_rows($users_run) > 0 )
                   {
                       foreach($users_run as $transaction)
                       {
                          ?>
                            <tr>
                              <td class="text-center"><?= $transaction['id'] ?></td>
                              <td class="text-center"><?= $transaction['pcode'] ?></td>
                              <td class="text-center" style="font-weight:bolder"><?= $transaction['description'] ?></td>
                              <td  class="text-center">
                                  <input type="checkbox" value="<?= $transaction['id']; ?>" name="stock[]">
                              </td> 
                            </tr>
                          <?php
                        }
                      }
                  ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
                <div class="text-right mt-2">
                <button type="submit"  name="save_stock" class="btn btn-primary float-end ">Add to Stock</button> 
                </div>
                </form>
              
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
  // require_once('product-ajax.php');
  ?>
  <script>  
    $(document).ready(function(){
      $(document).on('click','.remove', function(){
          $(this).closest('.main-form').remove();
      });
      $(document).on('click','.add-form', function(){
          $('.new-form').append('<div class="main-form">\
          <div class="row">\
              <div class="col-md-3">\
                  <label for="">Pcode</label>\
                  <input type="number" name="pcode[]" id="pcode" class="form-control" required autocomplete="off" >\
                </div>\
                <div class="col-md-3">\
                  <label for="">Description</label>\
                  <input type="text" name="description[]" id="description" class="form-control" required autocomplete="off" >\
                </div>\
                <div class="col-md-3">\
                  <label for="">Qty</label>\
                  <input type="number" name="qty[]" id="qty" class="form-control" required autocomplete="off" >\
                </div>\
                <div class="col-md-3 mt-2 float-end">\
                  <br>&nbsp;\
                  <button type="button" class="remove btn btn-danger text-end">Remove</button>\
                </div>\
                </div>\
                </div>');
      });
    });
  </script>