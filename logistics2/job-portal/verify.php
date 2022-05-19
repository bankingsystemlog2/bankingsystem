<?php
include('includes/load.php');
ob_start();

$vkey = $db->escape($_GET['vkey']);

$sql = "SELECT verified FROM account_verification WHERE vkey = '$vkey'";
$result = $db->query($sql);
$verified = $result->fetch_assoc();


if($verified['verified'] > 0){

	$session->msg('s','Account already verified');
          redirect('login.php', false);
}else{

$sql = "UPDATE account_verification SET verified = '1' WHERE vkey = '$vkey'";
if($db->query($sql)){
$session->msg('s','Account verification success you may login now');
          redirect('login.php', false);
      }
}


?>