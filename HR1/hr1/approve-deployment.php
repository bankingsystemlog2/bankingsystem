<?php
 
  require_once('includes/load.php');


  $id = $_GET['id'];
  $sql = "UPDATE new_hires SET status = 'for deployment' WHERE employee_id = '$id'";
  if($db->query($sql)){

  		$_SESSION['status'] = "Deployment Approved";
            $_SESSION['status_code'] = "success";
      redirect('deployment_requests.php',false);
  }