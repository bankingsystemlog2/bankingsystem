<?php
  require_once('../includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(4);
?>
<?php
  $delete_id = delete_by_id('vendors',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Submittion deleted.");
      redirect('vendor_form.php');
  } else {
      $session->msg("d","Deletion failed.");
      redirect('vendor_form.php');
  }
?>