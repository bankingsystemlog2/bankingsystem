<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['addpromtbtn']))
{
    $add_peid = $_POST['add_peid'];
    $add_from = $_POST['add_from'];
    $add_to = $_POST['add_to'];
    $add_date = $_POST['add_date'];
    
        $query = "INSERT INTO promoted (`pr_eid`,`pr_from`,`pr_to`,`pr_date`) VALUES ('$add_peid','$add_from','$add_to','$add_date')";
        $query_run = mysqli_query($conn, $query);


        if($query_run)
        {
        $query = "UPDATE users SET type='$add_to' WHERE employee_id='$add_peid' ";
        $query_run = mysqli_query($conn, $query);
        }
        if($query_run)
        {
            $_SESSION['status'] =  "Promotion is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: promoted-list.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Promotion is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: promoted-list.php');
        }
    }
?>