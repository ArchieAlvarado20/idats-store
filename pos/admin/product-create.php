<?php
$menu = " menu-open";
$active_main = " active";
$active_dashboard = "";
$active_product = " active";
$active_brand = "";
$active_category = "";
$stock_menu = "";
$stock_main = "";
$active_stocks = "";
$active_logs = "";
$active_critical = "";
$active_pricing = "";
$user_menu="";
$user_main="";
$active_user= "";

require_once('partials/_head.php');

//add
if(isset($_POST['saveProduct']))
{
    $pcode = $beta;
    $barcode = validate($_POST['barcode']);
    $description = validate($_POST['description']);
    $brand = validate($_POST['brand']);
    $category = validate($_POST['category']);
    $re_order = validate($_POST['re_order']);

    if($re_order != '' && $pcode != '' && $barcode != '' && $brand != '' && $category != '' && $description != '' )
    {
        $qry = "INSERT INTO tblproduct (pcode,barcode,description,brand,category,re_order) VALUES ('$pcode','$barcode','$description','$brand','$category','$re_order')";
        $qry_run = mysqli_query($con,$qry); 

        if($qry_run)
        {
            redirect('product.php','Product successfully added');
        }
        else
        {
            redirect('product-create.php','Something went wrong');
        }
    }
    else
    {
      redirect('product-create.php','All fields are required');
    }
}
//delete product
$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $userId = validate($paraResult);

    $user = getById('tblproduct',$userId);
    if($user['status']==200)
    {
        $userDeleted = deleteQuery('tblproduct',$userId);
        if($userDeleted)
        {
            redirect('product.php','Product deleted successfully');
        }
        else
        {
            redirect('product.php','Something went wrong');
        }
    }
    else
    {
        redirect('product.php',$user['message']);
    }
}
else
{
    redirect('product.php',$paraResult);
}

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
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Add New Product</h1>
          </div>
          <div class="col-sm-12">
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
               <form action="" method="POST" >
              
               <!-- <div class="mb-3">
                  <label for="">Pcode</label>
                  <input type="number" name="pcode" id="pcode" class="form-control" autocomplete="off" >
                </div> -->
                <div class="mb-3">
                  <label for="">Barcode</label>
                  <input type="number" name="barcode" id="barcode" class="form-control" autocomplete="off" >
                </div>
                <div class="mb-3">
                  <label for="">Description</label>
                  <input type="text" name="description" id="description" class="form-control" autocomplete="off" >
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
                          <option value="" disabled selected hidden>Select brand</option>
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
                          <option value="" disabled selected hidden>Select category</option>
                          <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                          <?php
                      }
                      ?>
                      </select>
                </div>
                <div class="mb-3">
                  <label for="">Re-order level</label>
                  <input type="number" name="re_order" id="re_order" class="form-control re_order" autocomplete="off" >
                </div>
               
                <div class="modal-footer">
                <a href="product.php"><button type="button" class="btn btn-danger text-light " data-bs-toggle="modal" data-bs-target="#transactionAddModal">
                          Back
                        </button></a>
                <button type="submit" class="btn btn-primary" name="saveProduct">Save</button>
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
  require_once('product-ajax.php');
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