<?php
  require_once('includes/load.php');
  require_once('includes/activitylog.inc.php');
  $id = $db->escape($_GET['id']);
  $sql = "SELECT * FROM applications WHERE applicant_id = '$id' AND status = 'requesting for approval'";
  $result = $db->query($sql);
  $row = $result->num_rows;

  if($row>0){
  	$session->msg("d", "Hiring request is already existing");
      redirect('applicants-for-hiring.php',false);
  }else{
  $sql = "UPDATE applications set status = 'requesting for approval' WHERE applicant_id = '$id'";
  if($db->query($sql)){
  $sql = "SELECT name FROM users WHERE id = '$user_id'";
  $result = $db->query($sql);
  $pangalan = $result->fetch_assoc();
    $name = $pangalan['name'];
    $log = $name.' has request hiring approval';
    logger($log);
  	
            $_SESSION['status'] = "Hiring request was sent to the HR Manager";
            $_SESSION['status_code'] = "success";
      redirect('applicants-for-hiring.php',false);
  }
}
?>
<?php