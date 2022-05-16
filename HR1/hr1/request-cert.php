<?php 
 require_once('includes/load.php');


$id = $_GET['id'];
$date = date("Y-m-d");
$sql = "SELECT * FROM appreciation_awards WHERE employee_id = '$id' AND date = '$date'";
$result = $db->query($sql);
$row = $result->num_rows;
if($row>0){

  $_SESSION['status'] ="Request is already existing";
            $_SESSION['status_code'] = "warning";
    redirect('performance_dashboard.php',false);

}else{
$sql = "INSERT INTO appreciation_awards (employee_id,date,award_title,status) VALUES ";
$sql .= "('$id','$date','Employee of the Month','pending')";
if($db->query($sql)){
    
    $_SESSION['status'] ="Request created";
            $_SESSION['status_code'] = "success";
    redirect('performance_dashboard.php',false);
}
}









?>