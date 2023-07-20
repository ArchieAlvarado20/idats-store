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
                    
                                <?php    
                                if(isset($_SESSION['status']))
                                {
                                    ?>
                                    <div class="alert alert-success text-center ">
                                <h4 ><?=$_SESSION['status'];?></h4>
                                </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                                ?>
                       
                        <div class="card">
                            <div class="card-header" style="background-color: gray;
                            color:white;">
                                <h3 class="text-center">Resend email verification</h5>

                            </div>
                            <div class="card-body">
                                <form action="resendcode.php" method="POST">
                                
                                    <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email address">
                                    </div>
                                  
                                    <div class="form-group mb-3 text-center">
                                        <button type="submit" class="btn btn-primary" name="resendBtn"
                                       >Submit</button>
                                        
                                    </div>
                                  
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php');?>
        <script>
        //fade-out alert
$('.alert').show();
setTimeout(function() {
    $('.alert').fadeOut(400);
}, 5000);

</script>