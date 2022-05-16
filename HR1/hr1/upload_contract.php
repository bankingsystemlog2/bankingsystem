<?php 
include_once('includes/load.php');


if(isset($_POST['upload'])){
    
    

 $id = $_POST['id'];
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["cont"]["name"]);
   
   
   $folder = '../../Administrative/uploads/'.basename($_FILES["cont"]["name"]);
   $url = 'uploads/'.basename($_FILES["cont"]["name"]);
    
    $sql = "UPDATE hr1files SET status = 'signed' , urlpath = '$url' WHERE req_id = '$id'";
    if($db->query($sql)){

    	 move_uploaded_file($_FILES["cont"]["tmp_name"], $folder);
          $_SESSION['status'] ="Data has been saved";
            $_SESSION['status_code'] = "success";
          redirect('contract_signing.php', false);
        } else {
         
          $_SESSION['status'] ="data not saved";
            $_SESSION['status_code'] = "error";
          redirect('contract_signing.php', false);
        }
    }







?>
