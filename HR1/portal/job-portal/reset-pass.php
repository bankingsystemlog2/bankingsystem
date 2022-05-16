<?php
require_once('includes/load.php');
if(isset($_POST['s'])){
$pass = $_POST['password'];
	if(empty($pass)){
            $session->msg("d", "Password can't be empty.");
     		redirect('forgot.php',false);
        }elseif(strlen($pass)<=7){
            $session->msg("d", "Password must be 8 character and above.");
     		redirect('forgot.php',false);
        }elseif(!preg_match("#[0-9]+#", $pass)){
			$session->msg("d", "Password must contain numbers");
     		redirect('forgot.php',false);
        }elseif(!preg_match("#[A-Z]+#", $pass)){
            $session->msg("d", "Password must contain Capital Letters.");
     		redirect('forgot.php',false);
        }elseif(!preg_match("/[\'^£$%&*()}{@#~?><>!.,|=_+¬-]/", $pass)){
            $session->msg("d", "Password must contain special characters.");
     		redirect('forgot.php',false);

        }else{
            $password = remove_junk($db->escape($pass));
            $password= sha1($password);
        }
}

?>