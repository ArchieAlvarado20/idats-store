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
          <div class="col-sm-6 text-center">
            <h1>Product Table</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
             
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
              <?= alertMessage();?>
               <form action="product-code.php" method="POST" >
               <?php
                        $paramResult = checkParamId('id');
                        if(!is_numeric($paramResult))
                        {
                            echo  '<h5 class="text-danger">'.$paramResult.'</h5>';
                            return false;
                        }
                        $user = getById('tblproduct',checkParamId('id'));
                        if($user['status'] == 200)
                        {
                            ?>
                          <input type="hidden" class="form-control" name="userId" value="<?=$user['data']['id'];?>" required>
               <div class="mb-3">
                  <label for="">Pcode</label>
                  <input type="number" name="pcode" id="pcode" class="form-control" autocomplete="off" value="<?=$user['data']['pcode'];?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="">Barcode</label>
                  <input type="number" name="barcode" id="barcode" class="form-control" autocomplete="off" value="<?=$user['data']['barcode'];?>" required>
                </div>
                <div class="mb-3">
                  <label for="">Description</label>
                  <input type="text" name="description" id="description" class="form-control" autocomplete="off" value="<?=$user['data']['description'];?>" required>
                </div>
                <div class="mb-3">
                <label for="">Brand</label>  
                  <?php
                      $brand=getAll('tblbrand');
                      ?>
                      <select class="form-control" name="brand" id="brand">
                      <?php 
                      while($row = mysqli_fetch_array($brand))
                      
                      {
                          ?>
                          <option value="<?=$user['data']['brand'];?>" hidden selected><?=$user['data']['brand'];?></option>
                          <option value="<?php echo $row['brand'];?>"><?php echo $row['brand'];?></option>
                          <?php
                      }
                      ?>
                      </select>
                </div>
                <div class="mb-3">
                <label for="">Category</label>  
                  <?php
                      $category=getAll('tblcategory');
                      ?>
                      <select name="category" id="category" class="form-control">
                      <?php 
                      while($row = mysqli_fetch_array($category))
                      {
                          ?>
                          <option value="<?=$user['data']['category'];?>" hidden  selected><?=$user['data']['category'];?></option>
                          <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                          <?php
                      }
                      ?>
                      </select>
                </div>
                <div class="mb-3">
                  <label for="">Re-order level</label>
                  <input type="number" name="re_order" id="re_order" class="form-control re_order" autocomplete="off" value="<?=$user['data']['re_order'];?>" required>
                </div>
               
              
                <div class="modal-footer">
                <a href="product.php"><button type="button" class="btn btn-danger text-light " data-bs-toggle="modal" data-bs-target="#transactionAddModal">
                          Back
                        </button></a>
                <button type="submit" class="btn btn-primary" name="updateProduct">Save</button>
              </div>
            
               </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php
                        }
                        else
                        {
                            echo '<h5>'.$user['message'].'</h5>';
                        }
                    ?>
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
    //Get profit from addItemModal
$(document).ready(function(){
    	// Get value on keyup funtion
    	$(".price, .cost").keyup(function(){

    	var total=0;    	
    	var x = Number($(".price").val());
    	var y = Number($(".cost").val());
    	var total= x - y;  

    	$('.profit').val(total);

    });
});
//profit percentage
$(function(){

$('#price').on('input', function() {
  calculate();
});
$('#cost').on('input', function() {
 calculate();
});
function calculate(){
    var price = parseInt($('#price').val()); 
    var cost = parseInt($('#cost').val());
    var perc="";
    if(isNaN(price) || isNaN(cost)){
        perc=" ";
       }else{
       perc = ((price-cost)/(cost) * 100).toFixed(3);
       }

    $('#percent').val(perc);
}

});

</script>
  
  