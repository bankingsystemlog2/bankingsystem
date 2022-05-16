<?php
  
  require_once('includes/load.php');


  $id = $_GET['id'];
$q = "SELECT * FROM applications WHERE applicant_id = '$id'";
if($db->query($q)){
$result = $db->query($q);
$job = $result->fetch_assoc();
$job_id = $job['job_id'];




$sq = "UPDATE job_vacancy SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($sq)){

  $s = "UPDATE posted_jobs SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($s)){


$sql = "DELETE FROM final_interview WHERE applicant_id = '$id'";
if($db->query($sql)){

$sql = "DELETE FROM initial_interview WHERE applicant_id = '$id'";
if($db->query($sql)){
$sql = "DELETE FROM qualified_applicants WHERE applicant_id = '$id'";
if($db->query($sql)){
$sql = "DELETE FROM passed_applicant WHERE applicant_id = '$id'";
if($db->query($sql)){
	$sql = "UPDATE applications SET status = 'declined' WHERE applicant_id;";
	if($db->query($sql)){
	  $_SESSION['status'] ="Application rejected";
            $_SESSION['status_code'] = "error";
    redirect('hiring-approval.php',false);
  }
}
}

}
}
}
}

}




















  ?>