<div class="modal fade" id="cart-add-modal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add to Cart</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card p-3">
            <div class="modal-body">
            <form action="cart-code.php" method="POST" id="saveTransaction">
            <div class="row-md-12 d-flex">
                <div class="col-sm-6">    
                <div class="mb-3">
                  <label for="">Qty</label>
                  <input type="number" name="qty" id="qty" class="form-control" autocomplete="off" required value="1">
                </div>
                </div>
                <div class="col-sm-6">    
                <div class="mb-3">
                <label for="" class="w-100 ">Add</label>
                  <button type="submit"  class="btn btn-primary btn-sm mt-1">+<i class="fa fa-shopping-cart"></i></button> 
                </div>
                </div>
                </div>
            
                <table id="myTable_modal" class="table table-sm table-bordered table-striped table-hover">
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Barcode</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Brand</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Action</th>
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
                              <td class="text-center" style="font-weight:bolder;width:500px;"><?= $transaction['description'] ?></td>
                              <td class="text-center"><?= $transaction['brand'] ?></td>
                              <td class="text-center"><?= $transaction['category'] ?></td>
                              <td class="text-center" style="font-weight:bolder;"><?= $transaction['price']; ?></td>
                              <td class="text-center"><?= $transaction['qty'] ?></td>
                              <td  class="text-center">
                              <input type="hidden" value="<?=$_SESSION['auth_user']['username'];?>" name="cashier">
                              <input type="radio" name="price" value="<?= $transaction['price'];?>">
                              <input type="radio" name="p_id" value="<?= $transaction['id'] ;?>" class="mt-2">
                              
                              </td>
                            </tr>
                          <?php
                        }
                      } 
                  ?>
                  </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="setTimeout(function(){ window.location=window.location;},1000);">Items</button>
            </div>
          </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->-
        
      </div>
      <!-- /.modal -->


