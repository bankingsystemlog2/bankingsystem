<?php 
 require_once('includes/load.php');



 $id = $_GET['id'];

 $sql = "UPDATE new_hires SET status = 'for orientation' WHERE employee_id = '$id'";
 if($db->query($sql)){

 	 $_SESSION['status'] ="Contract signing complete";
            $_SESSION['status_code'] = "success";
      redirect('view_contract_signing.php?id='.$id,false);
 }