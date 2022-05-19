<?php



  ob_start();
  require_once('includes/load.php');


  if(isset($_POST['apply'])){

  	$job_title = $db->escape($_POST['job_title']);
  	$today = date('Y-m-d');
  	$applicant_id = $_SESSION['applicant_id'];
    $job_id = $_POST['job_id'];



   
  	 $sql = "SELECT applicant_id FROM applications WHERE applicant_id = '$applicant_id'; ";
  	 $result = $db->query($sql);
  	 $row = $result->num_rows;

  	 if($row > 0){

$session->msg('d','You already applied for a position');
      redirect('home.php',false);
  	}else{


$sql = "INSERT INTO applications (applicant_id,job_id, job_title, date_of_application,status) VALUES ('$applicant_id','$job_id',
 '$job_title','$today','pending');";
  	if($db->query($sql)){

$sql = "UPDATE job_vacancy SET no_of_vacancy = no_of_vacancy - 1 WHERE job_id = '$job_id'";
if($db->query($sql)){

  $sql = "UPDATE posted_jobs SET no_of_vacancy = no_of_vacancy - 1 WHERE job_id = '$job_id'";
if($db->query($sql)){
  

      
  		$session->msg('s','Application was sent to the recruitment wait for their email');
      redirect('home.php',false);
    }
    }
  	}
  }


 

}

?>