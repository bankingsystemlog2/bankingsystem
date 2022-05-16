<?php
session_start();
include('includes/coninsert.php');

if(isset($_POST['updappaprovd']))
{
    $id = $_POST['employee_id'];
	$fname = $_POST['first_name'];
	$mname = $_POST['middle_name'];
	$lname = $_POST['last_name'];
	$gender = $_POST['gender'];
	$bday = $_POST['birth_date'];
	$dh = $_POST['date_hired'];
	$cont = $_POST['contact'];
	$email = $_POST['email'];
	$add = $_POST['address'];
	$rel = $_POST['rel'];
	$cs = $_POST['cs'];

  
    
        $query = "UPDATE employees SET first_name='$fname', middle_name = '$mname', last_name = '$lname', gender = '$gender', ";
		$query .= "birth_date = '$bday', date_hired = '$dh', contact_number = '$cont', email  = '$email', address = '$add', ";
		$query .= "religion = '$rel', civil_status = '$cs' WHERE employee_id = '$id'";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Employee Information Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: applicant-list.php');
        }
        else 
        {
            $_SESSION['status'] =  "Error Updating";
            $_SESSION['status_code'] =  "error";
            header('Location: applicant-list.php');
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