<?php
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('vendors',(int)$_POST['i_d']);
  if($delete_id){
      $session->msg("s","Submittion deleted.");
      redirect('bidding.php');
  } else {
      $session->msg("d","Deletion failed.");
      redirect('bidding.php');
  }
?>