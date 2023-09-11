<!-- add student modal-->
<div class="modal fade" id="stock-add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
          <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content">
           <div class="modal-header text-center">
                <h5 class="modal-title " id="exampleModalLabel">Add Stock</h5>
                <button type="button"  class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
     <!-- Main content -->
     <section class="content">
        <div class="card shadow">
              <!-- /.card-header -->
              
              <div class="card-body">
                <form action="stock-code.php" method="POST" id="saveTransaction">
                  <div class="row-md-12 d-flex">
                <div class="col-md-6">
                <div class="mb-3">
                <label for="">Reference</label>  
                  <?php
                      $supplier='SELECT * FROM tblreference WHERE status = "Pending"' ;
                      $supplier_run = mysqli_query($con,$supplier);
                      ?>
                      <select class="form-control" name="reference" id="reference" required > 
                      <?php 
                      while($row = mysqli_fetch_array($supplier_run))
                      {
                          ?>
                          <option value="<?php echo $row['id'];?>" selected hidden><?php echo $row['refno'];?></option>
                          <option value="<?php echo $row['id'];?>"><?php echo $row['refno'];?></option>
                          <?php
                      }
                      ?>
                      </select>
                </div>
                </div>
                <div class="col-sm-5">    
                <div class="mb-3">
                  <label for="">Qty</label>
                  <input type="number" name="qty" id="qty" class="form-control" autocomplete="off" required>
                </div>
                </div>
                <div class="col-sm-1">    
                <div class="md-3">
                <label for="">Add</label>
                  <button type="submit"  name="stock" class="btn btn-primary btn-sm float-end">+<i class="fa fa-shopping-cart"></i></button> 
                </div>
                </div>
                </div>
              <table id="myTable" class="table table-bordered table-striped table-hover">
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Barcode</th>
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
                              <td class="text-center"><?= $transaction['barcode'] ?></td>
                              <td class="text-center" style="font-weight:bolder; width: 350px;"><?= $transaction['description'] ?></td>
                              <td  class="text-center w-10">
                              <input type="radio" name="p_id" value="<?= $transaction['id'] ;?>" class="mt-2">
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
                <!-- <div class="text-right mt-2">
                <button type="submit"  name="save_stock" class="btn btn-primary float-end ">Add to Stock</button> 
                </div> -->
                </form>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         
     </section>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   
    <!-- /.content -->
  </div>
       
      

<!-- edit brand modal-->
<div class="modal fade" id="transactionEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Put Category/Aile/Section here</h5>
                <button type="button"  class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form id="updateTransaction" method="POST" action="category-code.php">
              <div class="modal-body">
              <input type="hidden" name="transaction_id" id="transaction_id" class="form-control" autocomplete="off">
              <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                  <label for="">Category</label>
                  <input type="text" name="category" id="category" class="form-control" autocomplete="off">
                </div>
                
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save Category</button>
              </div>
              </form>
            </div>
          </div>
        </div>