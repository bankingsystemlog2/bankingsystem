<?php
  require_once('includes/load.php');
  
  $id = $_GET['id'];
  
  $sql = "UPDATE job_vacancy SET status = 'approved' WHERE job_id = '$id'";
  if($db->query($sql)){
	   $_SESSION['status'] =  "Manpower request Approved";
       $_SESSION['status_code'] =  "success";
	   redirect('manpower_request.php',false);
  }
  
  
  ?>