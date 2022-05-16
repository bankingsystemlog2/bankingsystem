<?php
  require_once('includes/load.php');
  
  $id = $_GET['id'];

  $sql = "UPDATE change_pass_request SET status ='declined' WHERE employee_id = '$id'";
            if($db->query($sql)){
                 $_SESSION['status'] = "Request Declined";
            $_SESSION['status_code'] = "warning";
    redirect('password_approval.php',false);
                
            }


          ?>