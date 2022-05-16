<?php
session_start();
include('includes/config1.php');

if(isset($_POST['deleteprmtbtn']))
{
    $promotedid = $_POST['del_id'];
    
        $query = "DELETE FROM rules_and_regulation WHERE id='$promotedid' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Rules and Regulation Info is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: rulesandregulation.php');
        }
        else 
        {
            $_SESSION['status'] =  "Rules and Regulation Info is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: rulesandregulation-list.php');
        }
    }

?>