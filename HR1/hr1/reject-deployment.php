<?php
 
  require_once('includes/load.php');


  $id = $_GET['id'];
  $sql = "UPDATE new_hires SET status = 'rejected deployment' WHERE employee_id = '$id'";
  if($db->query($sql)){

  		 $_SESSION['status'] ="Deployment rejected";
            $_SESSION['status_code'] = "info";
      redirect('deployment_requests.php',false);
  }