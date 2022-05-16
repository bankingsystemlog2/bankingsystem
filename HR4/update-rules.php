<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['updappaprovd']))
{
    $id = $_POST['employee_id'];
	$ra_no = $_POST['ra_no'];
	
  
    
        $query = "UPDATE employees SET ra_no='$ra_no'";
		
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Employee Information Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: rulesandregulation.php');
        }
        else 
        {
            $_SESSION['status'] =  "Error Updating";
            $_SESSION['status_code'] =  "error";
            header('Location: rulesandregulation.php');
        }
    }

if(isset($_POST['updreject']))
{
    $id = $_POST['app_id'];

    $status = "Reject";
    
        $query = "UPDATE applicantl SET app_status='$status' WHERE app_id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Applicant is Rejected";
            $_SESSION['status_code'] =  "success";
            header('Location: applicant-list.php');
        }
        else 
        {
            $_SESSION['status'] =  "Applicant is Not Rejected";
            $_SESSION['status_code'] =  "error";
            header('Location: applicant-list.php');
        }
    }
?>