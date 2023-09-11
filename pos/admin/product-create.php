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
               <form action="product-code.php" method="POST" >
              
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
  ?>