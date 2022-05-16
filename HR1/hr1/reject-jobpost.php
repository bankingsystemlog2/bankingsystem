<?php include_once('includes/load.php'); 
include 'includes/activitylog.inc.php';
$user = $_SESSION['user_id'];
$id = $db->escape($_GET['id']);
$sql = "DELETE FROM posted_jobs WHERE job_id = '$id'";
if($db->query($sql)){
$sql = "SELECT name FROM users WHERE id = '$user'";
$result = $db->query($sql);
$name = $result->fetch_assoc();
 $log = $name['name']." Rejected a job posting request";
        logger($log);



 $_SESSION['status'] ="Job posting request rejected";
            $_SESSION['status_code'] = "info";
      redirect('jobposting-approval.php',false);
  }

?>