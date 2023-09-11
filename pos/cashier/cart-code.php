<?php
require_once '../config/function.php';

//add stock to tbl stock
if(isset($_POST['cart'])){
  $p_id = mysqli_real_escape_string($con, $_POST['p_id']);
  $qty = mysqli_real_escape_string($con, $_POST['qty']);
  $price = mysqli_real_escape_string($con, $_POST['price']);
  $cashier = mysqli_real_escape_string($con, $_POST['cashier']);

  if($qty == null && $p_id == null)
  {
      
      $res = [
          'status' => 422,
          'message' => 'All fields are required'
      ];
      echo json_encode($res);
      return false;

  }
  else
  {
          $query = "INSERT INTO tblcart(p_id,qty,price,status,cashier)VALUES('$p_id','$qty','$price','Pending','$cashier')";
          $query_run = mysqli_query($con, $query);

          if($query_run)
          { 
              //update qty from stock
            $qry = "UPDATE tblproduct SET qty = qty - '$qty' WHERE id = '$p_id'";
            $qry_run = mysqli_query($con, $qry);
              $res = [
                  'status'=> 200,
                  'message' => 'Successfully Added.'
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
}

//delete product
$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $userId = validate($paraResult);

    $user = getById('tblcart',$userId);
    if($user['status']==200)
    {
        $userDeleted = deleteQuery('tblcart',$userId);
        if($userDeleted)
        {
            redirect('index.php','Item deleted successfully');
        }
        else
        {
            redirect('index.php','Something went wrong');
        }
    }
    else
    {
        redirect('index.php',$user['message']);
    }
}
else
{
    redirect('index.php',$paraResult);
}



?>