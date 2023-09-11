<?php
require('../config/function.php');
//addtransactionFunction
    if(isset($_POST['save_Transaction'])){
    $supplier = mysqli_real_escape_string($con, $_POST['supplier']);
    $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
     
    if($supplier == null)
    {
        
        $res = [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;

    }
    $query = "INSERT INTO tblsupplier (supplier,contact_person,phone,email,address)VALUES('$supplier','$contact_person','$phone','$email','$address')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status'=> 200,
            'message' => 'Saved successfully.'
        ];
        echo json_encode($res);
        return false;

    }
    else
    {
        
        $res = [
            'status'=> 500,
            'message' => 'Failed to save transaction.'
        ];
        echo json_encode($res);
        return false;

    }

}
 //Update data
 if(isset($_POST['update_Transaction'])){
    $transaction_id = mysqli_real_escape_string($con, $_POST['transaction_id']);
    $name = mysqli_real_escape_string($con, $_POST['supplier']);
    $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    
    if($name == null && $contact_person == null && $phone == null && $email == null && $address == null  )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;

    }
    $query = "UPDATE tblsupplier SET supplier='$name',contact_person='$contact_person',phone='$phone',email='$email',address='$address' WHERE id='$transaction_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status'=> 200,
            'message' => 'Successfully updated.'
        ];
        echo json_encode($res);
        return false;

    }
    else
    {
        $res = [
            'status'=> 500,
            'message' => 'failed to update transaction.'
        ];
        echo json_encode($res);
        return false;

    }
}
 //submit data from edit modal
 if(isset($_GET['transaction_id']))
 {
     $transaction_id =mysqli_real_escape_string($con, $_GET['transaction_id']);

     $query = "SELECT * FROM tblsupplier WHERE id='$transaction_id'";
     $query_run = mysqli_query($con, $query);

     if(mysqli_num_rows($query_run) == 1)
     {
         $transaction = mysqli_fetch_array($query_run);
         $res = [
             'status' => 200,
             'message' => 'Save successfully',
             'data' => $transaction
         ];
         echo json_encode($res);
         return false;
     }
     else
     {
         $res = [
             'status' => 404,
             'message' => 'Transaction id not found.'
         ];
         echo json_encode($res);
         return false;
     }
 }
 //deleteFunction
 if(isset($_POST['delete_transaction']))
 {
     $transaction_id = mysqli_real_escape_string($con, $_POST['transaction_id']);

     $query = "DELETE FROM tblsupplier WHERE id='$transaction_id'";
     $query_run = mysqli_query($con, $query);
     if($query_run)
     {
         $res = [
             'status'=> 200,
             'message' => 'Successfully deleted.'
         ];
         echo json_encode($res);
         return false;
 
     }
     else
     {
         $res = [
             'status'=> 500,
             'message' => 'failed to delete transaction.'
         ];
         echo json_encode($res);
         return false;
 
     }

 }

?>