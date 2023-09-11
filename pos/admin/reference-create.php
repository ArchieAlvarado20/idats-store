<?php
require_once('partials/_head.php');
//add
if(isset($_POST['save_stock'])){
  $id = $_POST['stock'];
 //  echo $all_id;

 foreach($id as $stock)
 {
   $qry = "INSERT INTO tblstock(pcode1)VALUES('$stock')";
   $qry_run = mysqli_query($con, $qry);

   if($qry_run){
    redirect('stock-history.php','Stock successfully added');
   }else{
     redirect('stock-create.php','Something went wrong');
   }
 }
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
          <div class="col-sm-12 text-center">
          <h1 class="fw-bold text-center" style="font-weight: bolder;">Stock Reference</h1>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
             
                    <!-- <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#stock-add-modal">
                          Check Out
                   </button> -->
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
                <?=alertMessage();?>
                <form action="stock-code.php" method="POST">
                <div class="mb-3">
                  <label for="">Reference No.</label>
                  <input type="text" readonly name="refno" id="refno" class="form-control" autocomplete="off" value="RF-<?php echo $beta; ?>">
                </div>

                <div class="mb-3">
                <label for="">Recieving Personnel</label>  
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
                <?php date_default_timezone_set("Asia/Manila"); ?>
                  <label for="">Recieving Date</label>
                  <input type="date" name="stock_at" id="stock_at" class="form-control" value="<?php echo date('Y-m-d');?>" >
                </div>

             
                <div class="mb-3">
                <label for="">Supplier Name</label>  
                  <?php
                      $supplier=getAll('tblsupplier');
                      ?>
                      <select class="form-control" name="supplier" id="supplier">
                      <?php 
                      while($row = mysqli_fetch_array($supplier))
                      {
                          ?>
                          <option value="" disabled selected hidden>Select Supplier</option>
                          <option value="<?php echo $row['supplier'];?>"><?php echo $row['supplier'];?></option>
                          <?php
                      }
                      ?>
                      </select>
                </div>
                      
                <div class="modal-footer">
                <a href="reference.php"><button type="button" class="btn btn-danger text-light " data-bs-toggle="modal" data-bs-target="#transactionAddModal">
                          Back
                        </button></a>
                <button type="submit" class="btn btn-primary" name="saveRefno">Save</button>
              </div>
                </form>
              </div>
        </div>
      </div>
     </section>
</div>
  </div>
  



                <?php
  require_once('partials/_footer.php');
  require_once('partials/_scripts.php');
  // require_once('product-ajax.php');
  ?>