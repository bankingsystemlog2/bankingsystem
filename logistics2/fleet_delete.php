<?php
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_idf('v_info',$_POST['delete_fleet']);
  if($delete_id){
      $session->msg("s","Submittion deleted.");
      redirect('fleet.php');
  } else {
      $session->msg("d","Deletion failed.");
      redirect('fleet.php');
  }
?>