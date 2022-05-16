<?php
require_once('includes/load.php');

$id = $_GET['id'];
$sql = "UPDATE new_hires SET status = 'for deployment' WHERE employee_id = '$id'";
if($db->query($sql)){
 $_SESSION['status'] ="Training complete";
            $_SESSION['status_code'] = "success";
	redirect('view_training.php?id='.$id,false);


}