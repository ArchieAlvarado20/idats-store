
<?php
            include('includes/header.php');
            include('function.php');
            ?>
 <style>
        @import url('assets/css/login.css');
       </style>
<div class="py-5">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                   
                        
                        <div class="card">
                            <div class="card-header text-center">
                                <h3>Sign-up here</h5>

                            </div>
                            <div class="card-body">
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
                                <form action="function.php" method="POST">
                                    <div class="form-group mb-3 ">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="confirmpassword" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 d-flex ">
                                        <button type="submit" class="btn" name="btnRegister">Sign-up</button>
                                        <hr>
                                    
                                    <a href="login.php" class="m-2 ms-4">Login</a>
                                 
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