<?php 
include('security/includes/header.php');
include('security/login-code.php');



?>
       <style>
        @import url('security/assets/css/login.css');
       </style>
<div class="py-5">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    
                               
                       
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Login </h3>

                            </div>
                            <div class="card-body" >
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
                                <form action="login-code.php" method="POST">
                                
                                    <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                               
                                    <div class="form-group mb-3 text-center d-flex">
                                        <button type="submit" class="btn" name="btnLogin">Login</button>
                                       <a href="passwordReset.php" class="float-end mt-2">Forgot your password?</a>
                                    </div>
                                    <hr>
                                    <h5 class="register fs-6 text-center" >Not yet registered?
                                    <a href="registration.php" class="ms-1">Register</a>
                                    </h5>
                                    <!-- <hr>
                                    <h5 class="fs-6" >Did not recieve your verification Email?
                                    <a href="resend.php" class="ms-3">Resend</a>
                                    </h5> -->
                                   

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('security/includes/footer.php');?>

<script>
        //fade-out alert
$('.alert').show();
setTimeout(function() {
    $('.alert').fadeOut(400);
}, 5000);

</script>