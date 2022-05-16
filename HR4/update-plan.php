<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['e_id'];
    
    $e_position = $_POST['e_position'];
    $e_type = $_POST['e_type'];
    $e_exp = $_POST['e_exp'];
    $e_salrate = $_POST['e_salrate'];
    $e_drate = $_POST['e_drate'];
    $e_hrate = $_POST['e_hrate'];
    $e_otrate = $_POST['e_otrate'];
    $e_ph = $_POST['e_ph'];
    $e_sss = $_POST['e_sss'];
    $e_pi = $_POST['e_pi'];
    $e_tax = $_POST['e_tax'];
    
        $query = "UPDATE jobplan SET jp_position='$e_position', jp_type='$e_type', jp_exp='$e_exp', jp_salrate='$e_salrate', jp_drate='$e_drate', jp_hrate='$e_hrate', jp_otrate='$e_otrate', jp_ph='$e_ph', jp_sss='$e_sss', jp_pi='$e_pi', jp_tax='$e_tax' WHERE jp_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Plan is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: job-planning.php');
        }
        else 
        {
            $_SESSION['status'] =  "Plan is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: job-planning.php');
        }
    }

?>