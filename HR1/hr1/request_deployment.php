<?php
  require_once('includes/load.php');

  $id = $db->escape($_GET['id']);
  $sql = "UPDATE new_hires set status = 'requesting for deployment approval' WHERE employee_id = '$id'";
  if($db->query($sql)){
  	$sql = "DELETE FROM training WHERE employee_id = '$id'";
   if($db->query($sql)){
  	
    $_SESSION['status'] ="Deployment request sent to manager";
            $_SESSION['status_code'] = "success";
      redirect('deployment.php',false);
  }
  }
?>
<?php