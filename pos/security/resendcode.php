<?php
session_start();
include('../config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

function resend_email_verify( $name, $email , $verify_token)
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
            <a href='http://localhost:8080/idats-store/pos/security/verify-email.php?token=$verify_token'> Click Me </a>
            ";
        
            $mail->Body = $email_template;
            $mail->send();
            //echo 'Message has been sent';
       
}

if(isset($_POST['resendBtn']))
    {
        if(!empty(trim($_POST['email'])))
        {
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $checkemail_qry = "SELECT * FROM tblusers WHERE email='$email' LIMIT 1";
            $checkemail_qry_run = mysqli_query($con,$checkemail_qry);

            if(mysqli_num_rows($checkemail_qry_run)>0)
            {
                $row = mysqli_fetch_array($checkemail_qry_run);
                if($row['verify_status'] == 0)
                {
                    $name = $row['name'];
                    $email = $row['email'];
                    $verify_token = $row['verify_token'];

                    resend_email_verify( $name, $email , $verify_token);
                    $_SESSION['status'] = "Verification link has been sent to your email.";
                    header('Location: resend.php');
                    exit(0); 
                }
                else
                {
                    $_SESSION['status'] = "Email is already verified please login";
                    header('Location: resend.php');
                    exit(0); 
                }
                
            }
            else
            {
                $_SESSION['status'] = "Email is not registered. Please register now!";
                header('Location: registration.php');
                exit(0);  
            }
        }
        else
        {
            $_SESSION['status'] = "Please enter the email field.";
            header('Location: resend.php');
            exit(0);  
        }
    }
//password reset function

function send_password_reset( $get_name,$get_email,$token)
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
        
            $mail->setFrom("archiealvarado20@gmail.com",$get_name);
            $mail->addAddress($get_email);    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification idats Store';
            
            $email_template = "
            <h2>Hello</h2>
            <h5>You are receiving this email because we received a password request for you account</h5>
            <br/><br/>
            <a href='http://localhost:8080/idats-store/pos/security/passwordChange.php?token=$token&email=$get_email'> Click Me </a>
            ";
        
            $mail->Body = $email_template;
            $mail->send();
            //echo 'Message has been sent';
       
}
if(isset($_POST['resendPassBtn']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM tblusers WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con,$check_email);
    if(!empty($email))
    {
        if(mysqli_num_rows($check_email_run)>0)
            {
                
                $row = mysqli_fetch_array($check_email_run);
                $get_name = $row['name'];
                $get_email = $row['email'];

                $update_token = "UPDATE tblusers SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
                $update_token_run = mysqli_query($con,$update_token);

                if($update_token_run)
                {
                    send_password_reset($get_name,$get_email,$token);
                    $_SESSION['status'] = "Password link has been sent";
                    header('Location: passwordReset.php');
                    exit(0);  

                }
                else
                {
                    $_SESSION['status'] = "Something went wrong. #1";
                    header('Location: passwordReset.php');
                    exit(0);   
                }
            }
            else
            {
                $_SESSION['status'] = "No email found.";
                header('Location: passwordReset.php');
                exit(0);  

            }

    }
    else
    {
        $_SESSION['status'] = "All fields are required.";
        header('Location: passwordReset.php');
        exit(0); 

    }
    

}

//password reset update function

if(isset($_POST['btnPasswordUpdate']))

    $email  = mysqli_real_escape_string($con,$_POST['email']);
    $new_password  = mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password  = mysqli_real_escape_string($con,$_POST['confirm_password']);
    $token = mysqli_real_escape_string($con,$_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password)  && !empty($confirm_password))
        {
            //checking if token is valid
            $check_token = "SELECT verify_token FROM tblusers WHERE verify_token='$token' LIMIT 1 ";
            $check_token_run = mysqli_query($con,$check_token);

            if(mysqli_num_rows($check_token_run)>0)
            {
                if($new_password == $confirm_password)
                {
                    $update_password = "UPDATE tblusers SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con,$update_password);

                    if($update_password_run)
                    {
                        $new_token = md5(rand());

                        $update_token_new = "UPDATE tblusers SET verify_token = '$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_token_new_run = mysqli_query($con,$update_token_new);

                        $_SESSION['status'] = "New password successfully updated. You may login";
                        header("Location: login.php");
                        exit(0); 


                    }
                    else
                    {
                        $_SESSION['status'] = "Did not update password. Something went wrong";
                        header("Location: passwordChange.php?token=$token&email=$email");
                        exit(0); 

                    }

                }
                else
                {
                    $_SESSION['status'] = "Password does not match.";
                    header("Location: passwordChange.php?token=$token&email=$email");
                    exit(0); 

                }

            }
            else
            {
                $_SESSION['status'] = "Invalid token.";
                header("Location: passwordChange.php?token=$token&email=$email");
                exit(0); 

            }

        }
        else
        {
            $_SESSION['status'] = "All fields are required.";
            header("Location: passwordChange.php?token=$token&email=$email");
            exit(0); 
        }

    }
    else
    {
        $_SESSION['status'] = "No token available.";
        header('Location: passwordChange.php');
        exit(0);  
    }




?>