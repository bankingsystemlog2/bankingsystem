<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contact_no = $_POST['contact_no'];
    $company_department = $_POST['company_department'];
    $reason = $_POST['reason'];
  
    
        $query = "UPDATE blacklist_person SET fname='$fname', mname='$mname', lname='$lname', contact_no='$contact_no', company_department='$company_department', reason='$reason' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Blacklisted Person is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: visitorblacklisted.php');
        }
        else 
        {
            $_SESSION['status'] =  "Visitor Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: visitorblacklisted.php');
        }
    }

?>