<?php require_once('includes/log2load.php');
$id = $_GET['id'];
$groups = contractor_request();
//  $result = find_vendor_by_id('vendors',$users_id);
//  $is_show = 1;
 $all_vendors = contractor_request();
 // FORM then post
 ?>
 <?php
 if(isset($_POST['contractor_approve'])){
    if(empty($errors)){
    $request_stat   = remove_junk($db->escape($_POST['request_stat'])); 
    $sql= "UPDATE contractor_request SET request_stat='Approved'";
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
    if(empty($errors)){
    $request_stat   = remove_junk($db->escape($_POST['request_stat'])); 
    $sql= "UPDATE contractor_request SET request_stat='Rejected'";
    $result = $db->query($sql);
    if($result && $db->affected_rows() === 1){
        $session->msg('s',"The Request have been Approved and Posted ");
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
 ?>