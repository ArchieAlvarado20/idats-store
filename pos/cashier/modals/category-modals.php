<!-- add student modal-->
<div class="modal fade" id="transactionAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Put Category/Aile/Section here</h5>
                <button type="button"  class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form id="saveTransaction" method="POST" action="category-code.php">
              <div class="modal-body">

              <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                  <label for="">Category</label>
                  <input type="text" name="category"  class="form-control" autocomplete="off">
                </div>
                
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="setTimeout(function() { window.location=window.location;},1000);">Save Brand</button>
              </div>
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