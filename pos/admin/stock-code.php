<?php
require_once '../config/function.php';

//add stock to tbl stock
if(isset($_POST['stock'])){
  $refno = mysqli_real_escape_string($con, $_POST['reference']);
  $p_id = mysqli_real_escape_string($con, $_POST['p_id']);
  $qty = mysqli_real_escape_string($con, $_POST['qty']);

  if($refno == null && $p_id == null && $qty == null)
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
          $query = "INSERT INTO tblstock(ref_id,p_id,status,qty)VALUES('$refno','$p_id','Done','$qty')";
          $query_run = mysqli_query($con, $query);

          if($query_run)
          { 
              //update qty from stock
            $qry = "UPDATE tblproduct SET qty = qty + '$qty' WHERE id = '$p_id'";
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




//edit reference status
if(isset($_POST['status'])){
  $status = $_POST['status'];

  $qry = "UPDATE tblreference SET status = 'Done' WHERE id= '$status'";
  $qry_run = mysqli_query($con, $qry);
  if($qry_run){
    redirect('reference.php','Reference updated successfully');
   }else{
     redirect('reference.php','Something went wrong');
   }
}

//insert into rblreference
  if(isset($_POST['saveRefno'])){
    $refno = $_POST['refno'];
    $stock_by = $_POST['stock_by'];
    $stock_at = $_POST['stock_at'];
    $supplier = $_POST['supplier'];
    $status = $_POST['status'];
  
    if($refno != '' && $stock_by != '' && $supplier != '')
    {
     $qry = "INSERT INTO tblreference(refno,stock_by,stock_at,supplier,status)VALUES('$refno','$stock_by','$stock_at','$supplier','Pending')";
     $qry_run = mysqli_query($con, $qry);
  
      if($qry_run)
      {
          redirect('reference.php','Reference successfully added');
      }
      else
      {
          redirect('reference.php','Something went wrong');
      }
    }
    else
    {
      redirect('reference-create.php','All fields are required');
    }
  }
  
 //Deleted_stock 
if(isset($_POST['delete_qty'])){
  $p_id = $_POST['delete_qty'];
  $qty = $_POST['qty'];
  $s_id = $_POST['s_id'];


  $qry = "UPDATE tblproduct SET qty = qty - '$qty' WHERE id = '$p_id'";
  $qry_run = mysqli_query($con, $qry);
  if($qry_run){
    $qry = "UPDATE tblstock SET status = 'Deleted_stock' WHERE id = '$s_id'";
    $qry_run = mysqli_query($con, $qry);
    redirect('stock-history.php','Stock log deleted successfully');
   }else{
     redirect('stock-history.php','Something went wrong');
   }
}

 

//delete product
$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $userId = validate($paraResult);

    $user = getById('tblreference',$userId);
    if($user['status']==200)
    {
        $userDeleted = deleteQuery('tblreference',$userId);
        if($userDeleted)
        {
            redirect('reference.php','Reference deleted successfully');
        }
        else
        {
            redirect('reference.php','Something went wrong');
        }
    }
    else
    {
        redirect('reference.php',$user['message']);
    }
}
else
{
    redirect('reference.php',$paraResult);
}



?>