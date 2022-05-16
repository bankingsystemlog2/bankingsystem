<?php
session_start();
include('includes/config1.php');

if(isset($_POST['deleteprmtbtn']))
{
    $promotedid = $_POST['del_id'];
    
        $query = "DELETE FROM com_announcement WHERE id='$promotedid' ";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['status'] =  "Announcement is Deleted";
            $_SESSION['status_code'] =  "success";
            header('Location: create-anouncement.php');
        }
        else 
        {
            $_SESSION['status'] =  "policy Info is Not Deleted";
            $_SESSION['status_code'] =  "error";
            header('Location: create-anouncement-list.php');
        }
    }

?>