<?php 
require_once('includes/load.php');

if(isset($_POST['fp'])){
    
    $id = $db->escape($_POST['employee_id']);
    $reason =  $db->escape($_POST['reason']);
    $dept =$db->escape( $_POST['department']);
    
    $sql = "SELECT * FROM change_pass_request WHERE employee_id = '$id'";
    $res =  $db->query($sql);
    $num = $res->num_rows;
    
    if($num<1){
    $sql = "SELECT employees.*,users.* FROM employees JOIN users ON employees.employee_id = users.employee_id WHERE users.employee_id = '$id'";
    $result = $db->query($sql);
    $row = $result->num_rows;
    $emp = $result->fetch_assoc();
    
    
    if($row>0){
        
        $sql = "INSERT INTO change_pass_request (employee_id, reason,department,status) VALUES ('$id','$reason','$dept','pending')";
        if($db->query($sql)){
            
           $session->msg('s','Request Sent');
           redirect('forgotp.php',false);
        }
        
    }else{
        $session->msg('d','Employee record not found');
        redirect('forgotp.php',false);
    }
    
}else{
     $session->msg('d','Request Already Existing');
        redirect('forgotp.php',false);
}

}

?>