<?php
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
          
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Recieving Reference</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <a href="reference-create.php" class="btn btn-primary text-light">Add Reference</a>         
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
              <?=alertMessage();?>
              <?php
               $query = "SELECT sum(status = 'Pending') AS count FROM tblreference";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $count = $row['count'];
               
               ?>
                 <p>Total Available Reference: <?= $row['count']?></p>
                  <?php } ?>

             

                <table id="myTable" class="table table-sm table-bordered table-striped bg-light mb-0 text-center">
                  <thead class="bg-light">
               
                  <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Supplier</th>
                    <th class="text-center">Reference</th>
                    <th class="text-center">Recieved by</th>
                    <th class="text-center">Recieving Date</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" style="width: 75px;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $users = getAll('tblreference');
                   if(mysqli_num_rows($users) > 0 )
                   {
                       foreach($users as $transaction)
                       {
                          ?>
                            <tr>
                            <td class="text-center" ><?= $transaction['id'] ?></td>
                            <td class="text-center"><?= $transaction['supplier'] ?></td>
                              <td class="text-center"><?= $transaction['refno'] ?></td>
                              <td class="text-center"><?= $transaction['stock_by'] ?></td>
                              <td class="text-center"><?= $transaction['stock_at'] ?></td>
                              <td class="text-center"><?= $transaction['status'] == "Pending" ? "<span class='badge badge-danger text-sm'>Processing...</span>" : "<span class='badge badge-success text-sm'>Accomplished</span>" ?></td>
                              <td  class="text-center">
                                <form action="stock-code.php" method="POST" >
                              <button type="submit" class="btn btn-sm btn-success " name="status" value="<?=$transaction['id'] ?>" onclick="return confirm('Are you sure you want to update this record?')" ><i class="fa fa-thumbs-up"></i></button>

                              <a class="btn btn-sm btn-danger" href="stock-code.php?id=<?=$transaction['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i> </a>
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


  
  