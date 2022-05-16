<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['deleteplantbtn']))
{
    $planid = $_POST['del_id'];
    
        $query = "DELETE FROM jobplan WHERE jp_id='$planid' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Plan is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: job-planning.php');
        }
        else 
        {
            $_SESSION['status'] =  "Plan is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: job-planning.php');
        }
    }

?>