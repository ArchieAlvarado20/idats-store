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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="fw-bold text-center" style="font-weight: bolder;">Edit User</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
            <!-- <a href="user-create.php" class="btn btn-primary text-light">New user</a>          -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container col-md-12">
    <div class="card shadow">
            <div class="card-body">
                <?= alertMessage();?>
                <form action="user-code.php" method="POST">
                    <?php
                        $paramResult = checkParamId('id');
                        if(!is_numeric($paramResult))
                        {
                            echo  '<h5 class="text-danger">'.$paramResult.'</h5>';
                            return false;
                        }
                        $user = getById('tblusers',checkParamId('id'));
                        if($user['status'] == 200)
                        {
                            ?>


                    <input type="hidden" class="form-control" name="userId" value="<?=$user['data']['id'];?>" required>
                    <div class="row py-0">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="<?=$user['data']['name'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?=$user['data']['phone'];?>" required>
                        </div>      
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="<?=$user['data']['email'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" value="<?=$user['data']['password'];?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">Select Role</label>
                       <select name="role" required id="" class="form-control" >
                        <option value="">Select Role</option>
                        <option value="admin" <?=$user['data']['role'] == 'admin' ? 'selected':'';?>>Admin</option>
                        <option value="Cashier" <?=$user['data']['role'] == 'Cashier' ? 'selected':'';?>>Cashier</option>

                       </select>
                    </div>
                    
                    </div>
                
                    <div class="col-md-1">
                    <div class="mb-3 mt-2 ">
                        <label for="">Active</label>
                        <br/>
                        <input type="checkbox"  class="form-control" name="is_ban" <?= $user['data']['is_ban'] == true ? 'checked':'';?> style="width:30px;height:30px;">
                        
                    </div>
                    </div> 
                    <div class="col-md-2">
                    <div class="mb-3 mt-2 ">
                        <label for="">Verified</label>
                        <br/>
                        <input type="checkbox"  class="form-control" name="verify_status" <?= $user['data']['verify_status'] == true ? 'checked':'';?> style="width:30px;height:30px;"> 
                    </div>
                    </div> 
                    <div class="col-md-3">
                    <div class=" mb-5 text-right mt-4">
                        <a href="user.php" class="btn btn-danger" style="width: 100px; ">Back</a>
                        <button type="submit" name="updateUser" class="btn btn-primary" style="width: 100px; ">Update</button>
                        </div>
                    </div>
                    
                   
                    </div>
                            <?php
                        }
                        else
                        {
                            echo '<h5>'.$user['message'].'</h5>';
                        }
                    ?>
               
                </form>
                
            </div>
        </div>
    </div>
</div>



<?php 
include('partials/_footer.php');
include('partials/_scripts.php');
require_once('product-ajax.php');
?>