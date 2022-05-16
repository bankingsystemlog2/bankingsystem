<?php
  
  require_once('includes/load.php');


$id = $_GET['id'];



$sql = "DELETE FROM qualified_applicants WHERE applicant_id = '$id'";

if($db->query($sql)){

$sql = "DELETE FROM initial_interview WHERE applicant_id = '$id'";

if($db->query($sql)){
	 $session->msg("d", "initial interview failed applicant deleted");
    redirect('failed-applicants-initial.php',false);


}
}



  ?>