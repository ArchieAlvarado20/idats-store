<?php
            session_start();
            include('includes/header.php');
            ?>
                   <style>
        @import url('assets/css/login.css');
       </style>

            <!-- Login container -->
<div class="py-5">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    
                              
                       
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Reset Password</h5>

                            </div>
                            <div class="card-body">
                            <?php    
                                if(isset($_SESSION['status']))
                                {
                                    ?>
                                    <div class="alert  alert-success text-center">
                                <h4 ><?=$_SESSION['status'];?></h4>
                                </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                                ?>
                                <form action="resendcode.php" method="POST">
                                
                                    <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email address">
                                    </div>
                                  
                                    <div class="form-group mb-3 text-center send w-100 float-center">
                                        <button type="submit" class="btn" name="resendPassBtn"
                                       >Send password reset link</button>
                                    
                                    <a href="login.php" class="justify-content-cemter" style="color:#e3398d">Login</a>
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
