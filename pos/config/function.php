<?php
session_start();
require 'dbcon.php';
require_once 'code-generator.php';


function validate($inputData){

    global $con;

     $validatedData = mysqli_real_escape_string($con, $inputData);
     return trim($validatedData);
}

function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}
function alertMessage()
{
    if(isset($_SESSION['status']))
    {
        echo '<div id="alert" class="alert text-center">
        <h5>'.$_SESSION['status'].'</h5>
        </div>';
        unset($_SESSION['status']);
    }
}

function checkParamId($paramType) {
    if(isset($_GET[$paramType]))
    {
        if($_GET[$paramType] != null)
        {
            return $_GET[$paramType];
        }
        else
        {
            return 'No id found';
        }

    }
    else
    {
        return 'No id given';
    }
    
}

function getAll($tableName)
{
    global $con;
    $table = validate($tableName);

    $qry = "SELECT * FROM $table";
    $qry_run = mysqli_query($con, $qry);
    return $qry_run;
}

function getById($tableName, $id)
{
    global $con;

    $table = validate($tableName);
    $id = validate($id);

    $qry = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $qry_run = mysqli_query($con, $qry);

    if($qry_run)
    {
        if(mysqli_num_rows($qry_run) == 1)
        {
            $row = mysqli_fetch_array($qry_run, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'Fetched data',
                'data' => $row
            ];
            return $response;
        }
        else
        {
            $response = [
                'status' => 404,
                'message' => 'No record found'
            ];
            return $response;
        }
    }
    else
    {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response;
    }
}   
function deleteQuery($tableName,$id)
{
    global $con;

    $table = validate($tableName);
    $id = validate($id);

    $qry = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $qry_run = mysqli_query($con, $qry);
    return $qry_run;
}

?>

