<?php
session_start();
include('includes/config1.php');

if(isset($_POST['updtplanbtn']))
{
    $id = $_POST['id'];
    
    $title = $_POST['title'];
    $description = $_POST['description'];
  
    
        $query = "UPDATE com_announcement SET title='$title', description='$description' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Announcement Info is Updated";
            $_SESSION['status_code'] =  "success";
            header('Location: create-anouncement.php');
        }
        else 
        {
            $_SESSION['status'] =  "Announcement Info is Not Updated";
            $_SESSION['status_code'] =  "error";
            header('Location: create-anouncement.php');
        }
    }

?>