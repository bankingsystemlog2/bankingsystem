<?php
require_once('includes/load.php');
require_once('includes/activitylog.inc.php');
$job_id = $_GET['id'];
$vacancy = $_POST['no_of_vacancy'];

$sql = "SELECT * FROM posted_jobs WHERE job_id = '$job_id'";
$result = $db->query($sql);
$row = $result->num_rows;

if($row>0){
$session->msg("d", "Job request is already existing or the job is already posted");
      redirect('job-posting.php',false);
}else{

$sql = "INSERT INTO posted_jobs (job_id,status,no_of_vacancy) values ('$job_id','request for approval','$vacancy');";
if($db->query($sql)){
	$id = $_SESSION['user_id'];
	$sql = "SELECT name FROM users WHERE id = '$id'";
	$result = $db->query($sql);
	$pangalan = $result->fetch_assoc();
  	$name = $pangalan['name'];
  	$log=$name.' has request approval for requesting';
    logger($log);
	
	 $_SESSION['status'] ="Job posting request was sent to the manager";
            $_SESSION['status_code'] = "success";
      redirect('job-posting.php',false);
}
}

?>