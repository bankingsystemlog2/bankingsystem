<?php
  $page_title = 'Learning Schedules';
  require_once('includes/load.php');



$id = $_GET['id'];
$sql = "UPDATE seminar_sched SET approval_status = 'Approved' WHERE seminar_id = '$id'";
if($db->query($sql)){

 $_SESSION['status'] =  "Request Approved";
  $_SESSION['status_code'] =  "success";
redirect('learning_sched_approval.php',false);
}
?>