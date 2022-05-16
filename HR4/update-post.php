<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['upbtnapprvd']))
{
    $id = $_POST['e_id'];

    $status = "Approved";
    
        $query = "UPDATE resigned SET rs_status='$status' WHERE rs_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Resignation is Approved";
            $_SESSION['status_code'] =  "success";
            header('Location: post-employment.php');
        }
        else 
        {
            $_SESSION['status'] =  "Resignation is Not Approved";
            $_SESSION['status_code'] =  "error";
            header('Location: post-employment.php');
        }
    }

if(isset($_POST['upbtnreject']))
{
    $id = $_POST['e_id'];

    $status = "Reject";
    
        $query = "UPDATE resigned SET rs_status='$status' WHERE rs_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Resignation is Rejected";
            $_SESSION['status_code'] =  "success";
            header('Location: post-employment.php');
        }
        else 
        {
            $_SESSION['status'] =  "Resignation is Not Rejected";
            $_SESSION['status_code'] =  "error";
            header('Location: post-employment.php');
        }
    }
?>