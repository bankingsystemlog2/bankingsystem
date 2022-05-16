<?php include_once('includes/load.php'); 
include 'includes/activitylog.inc.php';


$user = $_SESSION['user_id'];
$id = $db->escape($_GET['id']);
$sql = "UPDATE applications set status = 'declined' WHERE applicant_id = '$id'";
if($db->query($sql)){

$q = "SELECT * FROM applications WHERE applicant_id = '$id'";
if($db->query($q)){
$result = $db->query($q);
$job = $result->fetch_assoc();
$job_id = $job['job_id'];




$sq = "UPDATE job_vacancy SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($sq)){

  $s = "UPDATE posted_jobs SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($s)){


$sql = "SELECT name FROM users WHERE id = '$user'";
$result = $db->query($sql);
$name = $result->fetch_assoc();
 $log = $name['name']." Rejected an application request";
        logger($log);


 $_SESSION['status'] ="Application rejected";
            $_SESSION['status_code'] = "info";
      redirect('applicant-approval.php',false);
  }
}
}
}
?>