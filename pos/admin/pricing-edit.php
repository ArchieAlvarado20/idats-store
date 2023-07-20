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
//save edit price
if(isset($_POST['updateProduct']))
{
    $pcode = $beta;
    $description = validate($_POST['description']);
    $cost = validate($_POST['cost']);
    $price = validate($_POST['price']);
    $profit = validate($_POST['profit']);
    $percent = validate($_POST['percent']);
    $date = validate($_POST['date']);
    $userId = validate($_POST['userId']);

    $user = getById('tblproduct',$userId);
    if($user['status'] != 200)
    {
        redirect('pricing-edit.php?id='.$userId,'No such Id found');
    }
    
    if($pcode != '' && $description != '' && $cost != '' && $price != '' && $profit != '')
    {
        $qry = "UPDATE tblproduct SET pcode='$pcode',description='$description',cost='$cost',price='$price',profit='$profit',percent='$percent',date='$date' WHERE id='$userId'";
        $qry_run = mysqli_query($con,$qry); 

        if($qry_run)
        {
            redirect('pricing.php?id='.$userId,'Price successfully updated ');
        }
        else
        {
            redirect('pricing-edit.php','Something went wrong');
        }
    }
    else
    {
      redirect('pricing-edit.php?id='.$userId,'All fields are required');
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
               <form action="" method="POST" >
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
                  <label for="">Description</label>
                  <input type="text" name="description" id="description" class="form-control" autocomplete="off" value="<?=$user['data']['description'];?>" required>
                </div>
                <div class="mb-3">
                  <label for="">Cost</label>
                  <input type="text" name="cost" id="cost" class="form-control cost" autocomplete="off" value="<?=$user['data']['cost'];?>" required>
                </div>
                <div class="mb-3">
                  <label for="">Price</label>
                  <input type="text" name="price" id="price" class="form-control price" autocomplete="off" value="<?=$user['data']['price'];?>" required>
                </div>
                <div class="mb-3">
                  <label for="">Profit</label>
                  <input type="number" name="profit" id="profit" class="form-control profit" autocomplete="off" value="<?=$user['data']['profit'];?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="">Percent</label>
                  <input type="number" name="percent" id="percent" class="form-control" autocomplete="off" value="<?=$user['data']['percent'];?>" readonly>
                </div>
                <?php date_default_timezone_set("Asia/Manila"); ?>
                        <div class="mb-3">
                        <input type="hidden" name="date" class="form-control" value="<?php echo date('Y/m/d H:i:s');?>" >
                        </div>
                <div class="modal-footer">
                <a href="product-pricing.php"><button type="button" class="btn btn-danger text-light " data-bs-toggle="modal" data-bs-target="#transactionAddModal">
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
   

  
  