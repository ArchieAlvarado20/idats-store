<?php
require('../config/function.php');
//addtransactionFunction
    if(isset($_POST['save_Transaction'])){
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
     
    if($brand == null)
    {
        
        $res = [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;

    }
    $query = "INSERT INTO tblbrand (brand)VALUES('$brand')";
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
 //retrieve Data To Modal
 if(isset($_POST['update_Transaction'])){
    $transaction_id = mysqli_real_escape_string($con, $_POST['transaction_id']);
    $name = mysqli_real_escape_string($con, $_POST['brand']);
    
    if($name == null )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;

    }
    $query = "UPDATE tblbrand SET brand='$name' WHERE id='$transaction_id'";
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

     $query = "SELECT * FROM tblbrand WHERE id='$transaction_id'";
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

     $query = "DELETE FROM tblbrand WHERE id='$transaction_id'";
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