<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['deleteprmtbtn']))
{
    $promotedid = $_POST['del_id'];
    
        $query = "DELETE FROM promoted WHERE pr_id='$promotedid' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Promotion is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: promoted-list.php');
        }
        else 
        {
            $_SESSION['status'] =  "Promotion is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: promoted-list.php');
        }
    }

?>