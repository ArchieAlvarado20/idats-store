<?php
session_start();
require '../config/dbcon.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function  sendemail_verify($name,$email,$verify_token)
    {
        $mail = new PHPMailer(true);
            //Server settings
            // $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();   
            $mail->SMTPAuth   = true;   
                                                     //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->Username   = 'archiealvarado20@gmail.com';                     //SMTP username
            $mail->Password   = 'wowozynkvkcfbguw';      
                                    
            $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            $mail->setFrom("archiealvarado20@gmail.com",$name);
            $mail->addAddress($email);    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification idats Store';
            
            $email_template = "
            <h2>You register with Idats Printing Shop</h2>
            <h5>Verify your email address to login with the below given link</h5>
            <br/><br/>
            <a href='http://localhost:8080/idats-store/pos/security/verify-email.php?token=$verify_token'> Click Me</a>
            ";
        
            $mail->Body = $email_template;
            $mail->send();
            //echo 'Message has been sent';
       
    }
    
    //registration 
    if(isset($_POST['btnRegister']))
    {
        if(!empty(trim($_POST['name']))&&!empty(trim($_POST['password'])&&!empty(trim($_POST['email']))&&!empty(trim($_POST['confirmpassword']))))
        {
            if ($_POST["password"] === $_POST["confirmpassword"]) 
                {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $verify_token = md5(rand());
    
                //email verification
                $check_email_query = "SELECT email FROM tblusers WHERE email = '$email' LIMIT 1";
                $check_email_query_run = mysqli_query($con, $check_email_query);
    
                if(mysqli_num_rows($check_email_query_run) > 0)
                {
                    $_SESSION['status'] = "Email already exist.";
                    header('Location: registration.php');
                }
                else
                {
                    //register user data
                    $query = "INSERT INTO tblusers (name,email,password,verify_token)VALUES('$name','$email','$password','$verify_token')";
                    $query_run =  mysqli_query($con, $query);
    
                    if($query_run)
                    {
                        sendemail_verify("$name","$email","$verify_token");
                        $_SESSION['status'] = "Registration successfull. <br/> Please verify your email.";
                        header('Location: registration.php');
    
                    }
                    else
                    {
                        $_SESSION['status'] = "Registration failed.";
                        header('Location: registration.php');
    
                    }
    
                }
             }
             else {
                $_SESSION['status'] = "Password do not match.";
                header('Location: registration.php');
             } 
        }
        else
        {
            $_SESSION['status'] = "All fields are required.";
            header('Location: registration.php');
            exit(0); 

        }

    }
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
                $_SESSION['aunthenticated'] = true;
                $_SESSION['auth_user'] = [
                    'username' => $row['name'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                ];
                $_SESSION['status'] = "WELCOME!";
                header('Location: dashboard.php');
                exit(0);  


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