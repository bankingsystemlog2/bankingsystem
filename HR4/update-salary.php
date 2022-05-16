<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['editsalbtn']))
{
    $id = $_POST['e_id'];
    
    $e_ot = $_POST['e_ot'];
    $e_bs = $_POST['e_bs'];
    $e_hra = $_POST['e_hra'];
    $e_con = $_POST['e_con'];
    $e_oa = $_POST['e_oa'];
    $e_pdate = $_POST['e_pdate'];
    
        $query = "UPDATE payroll SET p_ot='$e_ot', p_bs='$e_bs', p_hra='$e_hra', p_con='$e_con', p_oa='$e_oa', p_date='$e_pdate' WHERE p_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Salary is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: payroll.php');
        }
        else 
        {
            $_SESSION['status'] =  "Salary is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: payroll.php');
        }
    }

?>