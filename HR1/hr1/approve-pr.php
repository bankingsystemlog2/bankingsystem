<?php
  
  require_once('includes/load.php');




$id = $_GET['id'];
$sql = "UPDATE performance_review set status = 'approved' WHERE employee_id = '$id'";
if($db->query($sql)){

	     $_SESSION['status'] = "Performance evaluation Approved";
            $_SESSION['status_code'] = "success";
      redirect('pr-requests.php');
}









  ?>