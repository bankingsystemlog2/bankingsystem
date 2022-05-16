<?php include_once('includes/load.php'); 
include 'includes/activitylog.inc.php';
$user = $_SESSION['user_id'];
$id = $db->escape($_GET['id']);
$sql = "UPDATE posted_jobs set status = 'posted' WHERE job_id = '$id'";
if($db->query($sql)){
$sql = "SELECT name FROM users WHERE id = '$user'";
$result = $db->query($sql);
$name = $result->fetch_assoc();
 $log = $name['name']." Approved a job posting request";
        logger($log);


            $_SESSION['status'] = "Job posted";
            $_SESSION['status_code'] = "success";
      redirect('jobposting-approval.php',false);
  }

?>