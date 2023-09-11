
<!-- add student modal-->
<div class="modal fade" id="transactionAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Supplier/Dealer</h5>
                <button type="button"  class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form id="saveTransaction" method="POST" action="supplier-code.php">
              <div class="modal-body">
              <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                  <label for="">Supplier</label>
                  <input type="text" name="supplier"  class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Contact Person</label>
                  <input type="text" name="contact_person"  class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Phone</label>
                  <input type="text" name="phone"  class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Email</label>
                  <input type="email" name="email"  class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Address</label>
                  <textarea type="text" name="address"  class="form-control" autocomplete="off"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="setTimeout(function() { window.location=window.location;},1000);">Save</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Supplier/Dealer</h5>
                <button type="button"  class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form id="updateTransaction" method="POST" action="supplier-code.php">
              <div class="modal-body">
              <?=alertMessage()?>
              <input type="hidden" name="transaction_id" id="transaction_id" class="form-control" autocomplete="off">
              <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                  <label for="">Supplier</label>
                  <input type="text" name="supplier" id="supplier" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Contact Person</label>
                  <input type="text" name="contact_person" id="contact_person" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Email</label>
                  <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="">Address</label>
                  <textarea type="text" name="address" id="address" class="form-control" autocomplete="off"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Update</button>
              </div>
              </form>
            </div>
          </div>
        </div>