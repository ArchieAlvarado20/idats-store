<?php
require '../config/function.php';
 //login function
if(isset($_POST['btnLogin']))
{
    if(!empty(trim($_POST['email']))&&!empty(trim($_POST['password'])))
    {
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $login_query = "SELECT * FROM tblusers WHERE email='$email' AND password='$password' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $row = mysqli_fetch_array($login_query_run);
            
            if($row['verify_status'] == "1")
            {
                if($row['role']== "admin"){
                $_SESSION['aunthenticated'] = true;
                $_SESSION['auth_user'] = [
                    'username' => $row['name'],
                    'role' => $row['role'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                ];
                $_SESSION['status'] = "WELCOME!";
                header('Location: ../admin');
                exit(0);  
                }else{
                    $_SESSION['aunthenticated'] = true;
                    $_SESSION['auth_user'] = [
                        'username' => $row['name'],
                        'role' => $row['role'],
                        'phone' => $row['phone'],
                        'email' => $row['email'],
                    ];
                    $_SESSION['status'] = "WELCOME!";
                    header('Location: ../cashier');
                    exit(0);  
                }

            }
            else
            {
                $_SESSION['status'] = "Please verify your Email to login.";
                header('Location: login.php');
                exit(0);  

            }

        }
        else
        {
            $_SESSION['status'] = "Invalid email or password.";
            header('Location: login.php');
            exit(0);  
        }

    }
    else
    {
        $_SESSION['status'] = "All fields are required.";
        header('Location: login.php');
        exit(0);  
    }
   
    
}
// // Autintication for login
// if(!isset($_SESSION['aunthenticated']))
// {
//     $_SESSION['status'] = "Please login to access dashboard.";
//     header('Location: login.php');
//     exit(0);  
// }

    ?>