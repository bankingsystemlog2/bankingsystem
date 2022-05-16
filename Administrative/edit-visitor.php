<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $visitor_type = $_POST['visitor_type'];
    $visitor_purpose = $_POST['visitor_purpose'];
  
    
        $query = "UPDATE visitor_registration SET last_name='$last_name', first_name='$first_name', 
		middle_name='$middle_name', department='$department'
		, address='$address', email='$email', contact='$contact', gender='$gender', visitor_type='$visitor_type', visitor_purpose='$visitor_purpose' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "visitor Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: visitorinformation.php');
        }
        else 
        {
            $_SESSION['status'] =  "visitor Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: visitorinformation.php');
        }
    }

?>