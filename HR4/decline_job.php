<?php
  require_once('includes/load.php');
  
  $id = $_GET['id'];
  
  $sql = "UPDATE job_vacancy SET status = 'declined' WHERE job_id = '$id'";
  if($db->query($sql)){
	   $_SESSION['status'] =  "Manpower request Declined";
       $_SESSION['status_code'] =  "Danger";
	   redirect('manpower_request.php',false);
  }
  
  
  ?>