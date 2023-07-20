<?php
require '../config/function.php';


//add
if(isset($_POST['saveUser']))
{
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $verify_status = validate($_POST['verify_status']) == true ? 1:0;

    if($name != '' && $phone != '' && $email != '' && $password != '' && $role != '')
    {
        $qry = "INSERT INTO tblusers (id,name,phone,email,password,is_ban,role,verify_status) VALUES ('$id','$name','$phone','$email','$password','$is_ban','$role','$verify_status')";
        $qry_run = mysqli_query($con,$qry); 

        if($qry_run)
        {
            redirect('user.php','User/Admin added successfully');

        }
        else
        {
            redirect('user-create.php','Something went wrong');


        }

    }
    else
    {
      redirect('user-create.php','All fields are required');
    }
}


//save edit
if(isset($_POST['updateUser']))
{
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $verify_status = validate($_POST['verify_status']) == true ? 1:0;

    $userId = validate($_POST['userId']);

    $user = getById('tblusers',$userId);
    if($user['status'] != 200)
    {
        redirect('users-edit.php?id='.$userId,'No such Id found');
    }
    
    if($name != '' && $phone != '' && $email != '' && $password != '')
    {
        $qry = "UPDATE tblusers SET name='$name',phone='$phone',email='$email',password='$password',is_ban='$is_ban',role='$role' ,verify_status='$verify_status' WHERE id='$userId'";
        $qry_run = mysqli_query($con,$qry); 

        if($qry_run)
        {
            redirect('user.php?id='.$userId,'Admin/User successfully updated ');
        }
        else
        {
            redirect('user-create.php','Something went wrong');
        }
    }
    else
    {
      redirect('user-edit.php','All fields are required');
    }
}



//delete user
$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $userId = validate($paraResult);

    $user = getById('tblusers',$userId);
    if($user['status']==200)
    {
        $userDeleted = deleteQuery('tblusers',$userId);
        if($userDeleted)
        {
            redirect('user.php','User deleted successfully');
        }
        else
        {
            redirect('user.php','Something went wrong');
        }
    }
    else
    {
        redirect('user.php',$user['message']);
    }
}
else
{
    redirect('user.php',$paraResult);
}

?>