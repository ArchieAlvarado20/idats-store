<div class="modal fade" id="modal-xl"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <?= alertMessage();?></div>
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
                              <td class="text-center"><?= $transaction['price'] ?></td>
                              <td class="text-center"><?= $transaction['qty'] ?></td>
                              <td  class="text-center">
                              <a href="product-edit.php?id=<?= $transaction['id'];?>" class="btn btn-sm btn-primary m-0"><i class="fa fa-cart-plus"></i> </a> 
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
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->-
        
      </div>
      <!-- /.modal -->


