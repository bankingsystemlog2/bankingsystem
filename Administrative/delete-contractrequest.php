<?php
session_start();
include('includes/config1.php');

if(isset($_POST['deleteprmtbtn']))
{
    $promotedid = $_POST['del_id'];
    
        $query = "DELETE FROM request_contract WHERE id='$promotedid' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Request Info is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: RequestContract.php');
        }
        else 
        {
            $_SESSION['status'] =  "Request Info is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: RequestContract-list.php');
        }
    }

?>