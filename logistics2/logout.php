<?php
  require_once('includes/log2load.php');
  if(!$session->logout()) {redirect("index.php");}
?>
