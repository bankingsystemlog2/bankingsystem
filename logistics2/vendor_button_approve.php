<?php require_once('includes/log2load.php');


$groups = vendor_request_tbl();
//  $result = find_vendor_by_id('vendors',$users_id);
//  $is_show = 1;
 $all_vendors = vendor_request_tbl();
 // FORM then post
 ?>
 <?php
 if(isset($_POST['vendor_approve'])){
    if(empty($errors)){
    $statuss   = remove_junk($db->escape($_POST['status'])); 
    $sql= "UPDATE vendor_request_tbl SET status='Approved'";
    $result = $db->query($sql);
    if($result && $db->affected_rows() === 1){
        $session->msg('s',"The Request have been Approved and Posted ");
 }
 redirect('vendor_request.php', false);
} else {
  $session->msg('d',' Sorry failed to updated!');
  redirect('vendor_request.php', false);
}
} 
elseif(isset($_POST['vendor_reject'])){
    if(empty($errors)){
    $statuss   = remove_junk($db->escape($_POST['status'])); 
    $sql= "UPDATE vendor_request_tbl SET status='Rejected'";
    $result = $db->query($sql);
    if($result && $db->affected_rows() === 1){
        $session->msg('s',"The Request have been Approved and Posted ");
 }
 redirect('vendor_request.php', false);
} else {
  $session->msg('d',' Sorry failed to updated!');
  redirect('vendor_request.php', false);
}
} else {
$session->msg("d", $errors);
redirect('vendor_request.php',false);
}

?>
 ?>