<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['editcontractbtn']))
{
    $id = $_POST['e_id'];
    
    $e_eid = $_POST['e_eid'];
    $e_type = $_POST['e_type'];
    $e_detail = $_POST['e_detail'];
    $e_from = $_POST['e_from'];
    $e_to = $_POST['e_to'];
    $e_status = $_POST['e_status'];
    $e_sdate = $_POST['e_sdate'];
    
        $query = "UPDATE contract SET con_eid='$e_eid', con_type='$e_type', con_detail='$e_detail', con_from='$e_from', con_to='$e_to', con_status='$e_status', con_sdate='$e_sdate' WHERE con_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Contract is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: contract.php');
        }
        else 
        {
            $_SESSION['status'] =  "Contract is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: contract.php');
        }
    }

?>