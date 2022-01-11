<?php
  require_once('includes/load.php');
?>
<?php
  $id = $_GET['id']);
  $sql = "UPDATE vendors SET  statuss='3' WHERE id ='{$id}'";
 $result = $db->query($sql);
  if($result){
      $session->msg("s","Submittion successfully.");
      redirect('vendor.php');
  } else {
      $session->msg("d"," failed.");
      redirect('vendor.php');
  }
?>