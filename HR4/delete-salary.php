<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['deletesalbtn']))
{
    $delsal = $_POST['deleteid'];
    
        $query = "DELETE FROM payroll WHERE p_id='$delsal' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Salary is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: payroll.php');
        }
        else 
        {
            $_SESSION['status'] =  "Salary is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: payroll.php');
        }
    }

?>