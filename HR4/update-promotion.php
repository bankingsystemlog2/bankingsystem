<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['updtprombtn']))
{
    $id = $_POST['e_id'];
    
    $e_eid = $_POST['e_eid'];
    $e_from = $_POST['e_from'];
    $e_to = $_POST['e_to'];
    $e_date = $_POST['e_date'];
    
        $query = "UPDATE promoted SET pr_eid='$e_eid', pr_from='$e_from', pr_to='$e_to', pr_date='$e_date' WHERE pr_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
        $query = "UPDATE users SET type='$e_to' WHERE employee_id='$e_eid' ";
        $query_run = mysqli_query($conn, $query);
        }
        if($query_run)
        {
            $_SESSION['status'] =  "Promotion is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: promoted-list.php');
        }
        else 
        {
            $_SESSION['status'] =  "Promotion is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: promoted-list.php');
        }
    }

?>