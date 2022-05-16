<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    
    $image = $_POST['image'];
    $name_of_room = $_POST['name_of_room'];
    $description = $_POST['description'];
    $status = $_POST['status'];
  
    
        $query = "UPDATE facility SET image='$image', name_of_room='$name_of_room', description='$description', status='$status' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Facility Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: facilityavailable.php');
        }
        else 
        {
            $_SESSION['status'] =  "Visitor Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: facilityavailable.php');
        }
    }

?>