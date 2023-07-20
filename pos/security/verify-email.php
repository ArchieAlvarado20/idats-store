<?php
session_start();
require '../config/dbcon.php';
if(isset($_GET['token']))
{
     $token = $_GET['token'];
     $verify_query = "SELECT verify_token,verify_status FROM tblusers WHERE verify_token = '$token' LIMIT 1";
     $verify_query_run = mysqli_query($con, $verify_query);

     if(mysqli_num_rows($verify_query_run) > 0)
     {
        $row = mysqli_fetch_array($verify_query_run);
        // echo $row['verify_token'];
        if($row['verify_status'] == 0)
        {
            $_clicked_token = $row['verify_token'];
            $update_query = "UPDATE tblusers SET verify_status = '1' WHERE verify_token = '$_clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run)
            {
                $_SESSION['status'] = "Your account has been verified successfully.";
                header('Location: login.php');
                exit(0); 
            }
            else
            {
                $_SESSION['status'] = "Verification failed.";
                header('Location: login.php');
                exit(0); 

            }
        }
        else
        {
            $_SESSION['status'] = "This email is already verified. Please login.";
            header('Location: login.php');
            exit(0);  
        }
     }
     else
     {
        $_SESSION['status'] = "This token does not exist.";
        header('Location: login.php');
     }
}
else
{
    $_SESSION['status'] = "Not allowed";
    header('Location: login.php');
}




?>