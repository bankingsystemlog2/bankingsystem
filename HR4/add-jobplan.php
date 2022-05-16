<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['addjbplnbtn']))
{
    $add_position = $_POST['add_position'];
    $add_type = $_POST['add_type'];
    $add_exp = $_POST['add_exp'];
    $add_salrate = $_POST['add_salrate'];
    $add_drate = $_POST['add_drate'];
    $add_hrate = $_POST['add_hrate'];
    $add_otrate = $_POST['add_otrate'];
    $add_ph = $_POST['add_ph'];
    $add_sss = $_POST['add_sss'];
    $add_pi = $_POST['add_pi'];
    $add_tax = $_POST['add_tax'];
    
        $query = "INSERT INTO jobplan (`jp_position`,`jp_type`,`jp_exp`,`jp_salrate`,`jp_drate`,`jp_hrate`,`jp_otrate`,`jp_ph`,`jp_sss`,`jp_pi`,`jp_tax`) VALUES ('$add_position','$add_type','$add_exp','$add_salrate','$add_drate','$add_hrate','$add_otrate','$add_ph','$add_sss','$add_pi','$add_tax')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Job Plan is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: job-planning.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Job Plan is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: job-planning.php');
        }
    }
?>