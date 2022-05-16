<?php
require_once('includes/load.php');



$id = $_GET['id'];
$sql = "UPDATE new_hires SET status = 'for training' WHERE employee_id = '$id'";
if($db->query($sql)){

       $_SESSION['status'] ="Orientation complete";
            $_SESSION['status_code'] = "success";
      redirect('view_orientation.php?id='.$id,false);
}





?>





























