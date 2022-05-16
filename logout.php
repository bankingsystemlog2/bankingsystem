<?php
  require_once('includes/load.php');
  $use = current_user();
  if(!$session->logout()) {
    // Logging user exit................
    $Log=$use['name'].', From '.$use['Department'] .' has Logged out.';
    activitylog($Log);
    //end of Logs..........................

    redirect("index.php");}
?>
