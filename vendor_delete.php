<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('vendors',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Submittion deleted.");
      redirect('vendor.php');
  } else {
      $session->msg("d","Deletion failed.");
      redirect('vendor.php');
  }
?>