<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['addcontractbtn']))
{
    $add_eid = $_POST['add_eid'];
    $add_type = $_POST['add_type'];
    $add_detail = $_POST['add_detail'];
    $add_from = $_POST['add_from'];
    $add_to = $_POST['add_to'];
    $add_status = "Unsigned";
    
        $query = "INSERT INTO contract (`con_eid`,`con_type`,`con_detail`,`con_from`,`con_to`,`con_status`) VALUES ('$add_eid','$add_type','$add_detail','$add_from','$add_to','$add_status')";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['status'] =  "Contract is Added";
            $_SESSION['status_code'] =  "success";
            header('Location: contract.php');
        }
        else 
        {
            // echo "not done";
            $_SESSION['status'] =  "Contract is Not Added";
            $_SESSION['status_code'] =  "error";
            header('Location: contract.php');
        }
    }
?>