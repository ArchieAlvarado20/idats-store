
<?php
            include('includes/header.php');
            include('function.php');
            ?>
             <style>
        @import url('assets/css/login.css');
       </style>
            <!-- registration container start -->
<div class="py-5">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    <?php    
                            if(isset($_SESSION['status']))
                            {
                                ?>
                                <div class="alert  alert-success text-center ">
                              <h4 ><?=$_SESSION['status'];?></h4>
                              </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                            ?>
                        
                        <div class="card">
                            <div class="card-header text-center">
                                <h3>Change Password</h5>

                            </div>
                            <div class="card-body">
                                <form action="resendcode.php" method="POST">
                                <input type="hidden" name="password_token" class="form-control" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="new_password" class="form-control" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 d-flex ">
                                        <button type="submit" class="btn btn-success w-100" name="btnPasswordUpdate" 
                                        >Update Password</button>
                                    
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
    
    include('includes/scripts.php');
    ?>
    <script>
        //fade-out alert
$('.alert').show();
setTimeout(function() {
    $('.alert').fadeOut(400);
}, 5000);

</script>