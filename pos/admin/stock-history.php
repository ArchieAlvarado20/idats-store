<?php
require_once('partials/_head.php');
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
          <div class="col-sm-12">
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Stock History and Logs</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <a href="stock-create.php" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#stock-add-modal">Add stock</a>         
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
                <table id="myTable1" class="table table-sm table-bordered table-striped bg-light mb-0 text-center">
                  <thead class="bg-light">
                  <tr>
                  <th class="text-center">ID</th>
                 
                    <th class="text-center">Reference</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Barcode</th>
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
                   $users = 'SELECT * FROM vw_stock WHERE status = "Done"';
                   $users_run = mysqli_query($con,$users);
                   if(mysqli_num_rows($users_run) > 0 )
                   {
                       foreach($users_run as $transaction)
                       {
                          ?>
                            <tr>
                            <td class="text-center" ><?= $transaction['id'] ?></td>
               
                              <td class="text-center" ><?= $transaction['refno'] ?></td>
                              <td class="text-center"><?= $transaction['pcode'] ?></td>
                              <td class="text-center"><?= $transaction['barcode'] ?></td>
                              <td class="text-center" style="font-weight:bolder;" ><?= $transaction['description'] ?></td>
                              <td class="text-center" ><?= $transaction['qty'] ?></td>
                              <td class="text-center"><?= $transaction['stock_at'] ?></td>
                              <td class="text-center"><?= $transaction['stock_by'] ?></td>
                              <td class="text-center"><?= $transaction['supplier'] ?></td>
                              <td  class="text-center">
                              <form action="stock-code.php" method="POST" >
                                <input type="hidden" name="s_id" value="<?= $transaction['id'] ?>">
                                <input type="hidden" name="qty" value="<?= $transaction['qty'] ?>">
                             <button type="submit" class="btn btn-sm btn-danger " name="delete_qty" value="<?=$transaction['p_id'] ?>" onclick="return confirm('Deleting this data will affect the quantity of the product. Are you sure you want to delete this data?')" ><i class="fa fa-trash"></i></button>
                             </form>
                         
                                
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
<script>
   //SaveAddTransaction
$(document).on('submit','#saveTransaction', function (e){
    e.preventDefault();

    var formData =new FormData(this);
    formData.append("stock", true);
    $.ajax({
        type: "POST",
        url: "stock-code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response){

            var res = jQuery.parseJSON(response);
            if(res.status == 422){
                $('#errorMessage').removeClass('d-none');
                $('#errorMessage').text(res.message);
            }else 
            if(res.status == 200){
                $('#errorMessage').addClass('d-none');
                $('#saveTransaction')[0].reset();
                $('#stock-add-modal').modal('show');
                alertify.set('notifier','position','top-right');
                alertify.success(res.message);
                $('#myTable1').load(location.href + " #myTable1");  
            }

        }

    });

              
  }
);
</script>
 
<script>
    //data table script
 $(document).ready(function(){
    $('#myTable1').DataTable({
      "order": [[ 0, 'desc' ], [ 0, 'desc' ]],
      "pagingType": "full_numbers",
      "lengthMenu":[
        [15, 25, 50, -1],
        [15, 25, 50, "All"],
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search here...",
      },
    })
  });

</script>
  
  