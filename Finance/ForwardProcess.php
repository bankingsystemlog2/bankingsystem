<?php
include_once('includes/load.php');

if(isset($_POST['Forward'])) {

  $sql="SELECT * FROM budgetreleasing WHERE P_Status = '103';";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {

     $sql="UPDATE budgetreleasing g INNER JOIN account_list s ON s.definedStat = g.P_Status SET g.P_Status='104',s.definedStat = '104' WHERE s.definedStat = '103' AND g.P_Status= '103';";
     if ($db->query($sql)) {

         $session->msg("s","Record Sent!");
          redirect('Budgetreleasing.php',false);
      }

  }else{
    $session->msg("d","Failed to send Data Please make sure you have settled request before forwarding data!");
     redirect('Budgetreleasing.php',false);
  }

  }else{
  $session->msg("d", $errors);
  redirect('Budgetreleasing.php',false);
}
