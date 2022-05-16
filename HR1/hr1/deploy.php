<?php
require_once('includes/load.php');

$id = $_GET['id'];
$sql = "SELECT department FROM deployment WHERE employee_id = '$id' ";
$result = $db->query($sql);
$dept = $result->fetch_assoc();
$pos = $dept['department'];

$sql = "SELECT * FROM employees WHERE employee_id = '$id';";
$result = $db->query($sql);
$emp = $result->fetch_assoc();

$name = $emp['first_name'];
$dept = $emp['department'];
$pos = $emp['designation'];
$username = $name."_".$pos;
$pass = sha1($name.'1234');



$sql = "INSERT INTO users (name, username, password, user_level, position, department, status) VALUES ('$name','$username','$pass','2','$pos','$dept','1')";

if($db->query($sql)){
$sql = "DELETE FROM new_hires WHERE employee_id = '$id'";

if($db->query($sql)){

  $_SESSION['status'] = "Deployment success";
            $_SESSION['status_code'] = "success";
      redirect('deployment.php',false);

}

}









?>