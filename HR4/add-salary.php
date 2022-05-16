<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['addsalarybtn']))
{
    $add_bs = $_POST['add_bs'];
    $add_ot = $_POST['add_ot'];
    $add_hra = $_POST['add_hra'];
    $add_con = $_POST['add_con'];
    $add_oa = $_POST['add_oa'];
    $add_pdate = $_POST['add_pdate'];

    $add_peid = $_POST['add_peid'];
    
        $query = "INSERT INTO payroll (`p_bs`,`p_ot`,`p_hra`,`p_con`,`p_oa`,`p_date`,`p_eid`) VALUES ('$add_bs','$add_ot','$add_hra','$add_con','$add_oa','$add_pdate','$add_peid')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Salary is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: payroll.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Salary is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: payroll.php');
        }
    }
?>