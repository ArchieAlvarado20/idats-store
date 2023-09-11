<?php
require_once '../config/function.php';
//add
if(isset($_POST['saveProduct']))
{
    $pcode = 'PC-' .$beta;
    $barcode = validate($_POST['barcode']);
    $description = validate($_POST['description']);
    $brand = validate($_POST['brand']);
    $category = validate($_POST['category']);
    $re_order = validate($_POST['re_order']);

    if($re_order != '' && $pcode != '' && $barcode != '' && $brand != '' && $category != '' && $description != '' )
    {
        $qry = "INSERT INTO tblproduct (pcode,barcode,description,brand,category,re_order) VALUES ('$pcode','$barcode','$description','$brand','$category','$re_order')";
        $qry_run = mysqli_query($con,$qry); 

        if($qry_run)
        {
            redirect('product.php','Product successfully added');
        }
        else
        {
            redirect('product-create.php','Something went wrong');
        }
    }
    else
    {
      redirect('product-create.php','All fields are required');
    }
}
//save edit
if(isset($_POST['updateProduct']))
{
    $pcode = 'PC-' .$beta;
    $barcode = validate($_POST['barcode']);
    $description = validate($_POST['description']);
    $brand = validate($_POST['brand']);
    $category = validate($_POST['category']);
    $re_order = validate($_POST['re_order']);
    $userId = validate($_POST['userId']);

    $user = getById('tblproduct',$userId);
    if($user['status'] != 200)
    {
        redirect('product-edit.php?id='.$userId,'No such Id found');
    }
    
    if($pcode != '' && $barcode != '' && $description != '' && $brand != '' && $category != '')
    {
        $qry = "UPDATE tblproduct SET pcode='$pcode',barcode='$barcode',description='$description',brand='$brand',category='$category' ,re_order='$re_order' WHERE id='$userId'";
        $qry_run = mysqli_query($con,$qry); 

        if($qry_run)
        {
            redirect('product.php?id='.$userId,'Product successfully updated ');
        }
        else
        {
            redirect('product-create.php','Something went wrong');
        }
    }
    else
    {
      redirect('product-edit.php?id='.$userId,'All fields are required');
    }
}
//delete product
$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $userId = validate($paraResult);

    $user = getById('tblproduct',$userId);
    if($user['status']==200)
    {
        $userDeleted = deleteQuery('tblproduct',$userId);
        if($userDeleted)
        {
            redirect('product.php','Product deleted successfully');
        }
        else
        {
            redirect('product.php','Something went wrong');
        }
    }
    else
    {
        redirect('product.php',$user['message']);
    }
}
else
{
    redirect('product.php',$paraResult);
}



?>