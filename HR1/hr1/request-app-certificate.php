<?php
  
  require_once('includes/load.php');


$id = $_GET['id'];
$sql = "SELECT * FROM social_recognition WHERE employee_id = '$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if($row>0){

 $_SESSION['status'] ="Request to print certificate is already existing.";
            $_SESSION['status_code'] = "error";
      redirect('training-awards.php');


}else{
$sql = "SELECT * FROM appreciation_awards WHERE employee_id = '$id'";
$result = $db->query($sql);
$info = $result->fetch_assoc();
$date = $info['date'];
$title = $info['award_title'];
$sql = "INSERT INTO social_recognition (employee_id,date,award,status) values ('$id','$date','$title','for approval')";
if($db->query($sql)){
	
   $_SESSION['status'] ="Printing of certificate request was sent to the manager";
            $_SESSION['status_code'] = "success";
      redirect('app-awards.php');
}

}




?>