<?php require_once('includes/log2load.php');

$groups = contractor_request();
//  $result = find_vendor_by_id('vendors',$users_id);
//  $is_show = 1;
 $all_vendors = contractor_request();
 // FORM then post
 ?>
 <form method="post" action="contractor_button_approve.php">
 <?php
 if(isset($_POST['contractor_approve'])){
   
 $id = $_POST['con_id'];
    if(empty($errors)){
    $sql= "UPDATE contractor_request SET request_stat='Approved' WHERE con_id = '$id'";
    $result = $db->query($sql);
    if($result && $db->affected_rows() === 1){
        $session->msg('s',"The Request have been Approved and Posted ");
 }
 redirect('contractor_request.php', false);
} else {
  $session->msg('d',' Sorry failed to updated!');
  redirect('contractor_request.php', false);
}
} 
elseif(isset($_POST['contractor_reject'])){
  $id = $_POST['con_id'];
    if(empty($errors)){
    $sql= "UPDATE contractor_request SET request_stat='Rejected' WHERE con_id = '$id'";
    $result = $db->query($sql);
    if($result && $db->affected_rows() === 1){
        $session->msg('s',"The Request have been Rejected ");
 }
 redirect('contractor_request.php', false);
} else {
  $session->msg('d',' Sorry failed to updated!');
  redirect('contractor_request.php', false);
}
} else {
$session->msg("d", $errors);
redirect('contractor_request.php',false);
}

?>
</form>