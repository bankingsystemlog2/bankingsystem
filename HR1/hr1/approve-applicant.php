<?php include_once('includes/load.php'); 
include 'includes/activitylog.inc.php';
$user = $_SESSION['user_id'];
$id = $db->escape($_GET['id']);
$sql = "UPDATE applications set status = 'On Hiring Process' WHERE applicant_id = '$id'";
if($db->query($sql)){
	$sql = "INSERT INTO qualified_applicants (applicant_id) VALUES ('$id')";
	if($db->query($sql)){
$sql = "SELECT name FROM users WHERE id = '$user'";
$result = $db->query($sql);
$name = $result->fetch_assoc();
 $log = $name['name']." approved an application request";
logger($log);


            $_SESSION['status'] = "Applicant Approved";
            $_SESSION['status_code'] = "success";
      redirect('applicant-approval.php',false);
  }
}
?>