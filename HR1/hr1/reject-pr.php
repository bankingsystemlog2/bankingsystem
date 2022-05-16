<?php
  
  require_once('includes/load.php');




$id = $_GET['id'];
$sql = "DELETE FROM performance_review  WHERE employee_id = '$id'";
if($db->query($sql)){

	
   $_SESSION['status'] ="Performance evaluation Rejected";
            $_SESSION['status_code'] = "info";
      redirect('pr-requests.php');
}









  ?>