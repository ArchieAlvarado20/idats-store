<?php
session_start();
//logout
    unset($_SESSION['aunthenticated']);
    unset($_SESSION['auth_user']);
    $_SESSION['status'] = "Thank you for trusting us!";
    header('Location: ../security/login.php');
    ?>