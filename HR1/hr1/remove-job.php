<?php
  $page_title = 'Recruitment | Job posting';
  require_once('includes/load.php');
require_once('includes/activitylog.inc.php');
if(isset($_POST['remove-job'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM posted_jobs WHERE job_id = '$id';";
	if($db->query($sql)){
	$id = $_SESSION['user_id'];
	$sql = "SELECT name FROM users WHERE id = '$id'";
	$result = $db->query($sql);
	$pangalan = $result->fetch_assoc();
  	$name = $pangalan['name'];
  	$log = $name.' has removed job posted';
    logger($log);
		
		 $_SESSION['status'] ="Job removed from being posted";
            $_SESSION['status_code'] = "info";
          redirect('job-posting.php', false);
	}
}














?>



