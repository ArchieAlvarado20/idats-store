<!-- add student modal-->
<div class="modal fade" id="stock-add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
              <h1 class="fw-bold text-center ms-5" style="font-weight: bolder;">Stock Reference</h1>
                <button type="button"  class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form id="" method="POST" action="stock-code.php">
              <div class="modal-body">

              <div class="mb-3">
                  <label for="">Refernce No.</label>
                  <input type="number" name="reference" id="reference" class="form-control" autocomplete="off" >
                </div>

                <div class="mb-3">
                <label for="">Stocked By</label>  
                  <?php
                      $user=getAll('tblusers');
                      ?>
                      <select class="form-control" name="stock_by" id="stock_by">
                      <?php 
                      while($row = mysqli_fetch_array($user))
                      {
                          ?>
                          <option value="" disabled selected hidden>Select Personnel</option>
                          <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                          <?php
                      }
                      ?>
                      </select>
                </div>

                <div class="mb-3">
                  <label for="">Stocked at</label>
                  <input type="date" name="stock_at" id="stock_at" class="form-control" autocomplete="off" >
                </div>

                <div class="mb-3">
                  <label for="">Supplier</label>
                  <input type="number" name="supplier" id="supplier" class="form-control" autocomplete="off" >
                </div>
              </div>
              <div class="col-md-3">
                <button type="submit" name="save" class="remove btn btn-primary text-end">save</button>
                </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="setTimeout(function() { window.location=window.location;},1000);">Save Brand</button>
              </div> -->
              </form>
            </div>
          </div>
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