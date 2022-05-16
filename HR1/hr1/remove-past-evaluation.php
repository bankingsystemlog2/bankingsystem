<?php
  $page_title = 'Applicant Management';
  require_once('includes/load.php');

  $id = $_GET['id'];

  $sql = "DELETE FROM performance_review WHERE employee_id = '$id'";
  if($result = $db->query($sql)){

  	
     $_SESSION['status'] ="performance review deleted";
            $_SESSION['status_code'] = "info";
  	redirect('performance-management.php',false);
  }
?>