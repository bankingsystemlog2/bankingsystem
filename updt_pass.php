<?php
require_once('includes/load.php');

if(isset($_POST['submit'])){
    
$pass = $db->escape(remove_junk($_POST['pass']));
$pass1 =$db->escape( remove_junk($_POST['pass1']));
$key = $_POST['key'];

$error ="";

        if(empty($pass)){
            $error = "Password can't be empty.";
        }elseif(strlen($pass)<=7){
            $error = "Password must be 8 character and above.";
        }elseif(!preg_match("#[0-9]+#", $pass)){
            $error = "Password must contain numbers";
        }elseif(!preg_match("#[A-Z]+#", $pass)){
            $error = "Password must contain Capital Letters.";
        }elseif(!preg_match("/[\'^£$%&*()}{@#~?><>!.,|=_+¬-]/", $pass)){
            $error = "Password must contain special characters.";
        }elseif($pass !== $pass1){
             $error = "Passwords don't match.";
            }else{
            $password = remove_junk($db->escape($pass));
            $password= sha1($password);
        }
        
        if(empty($error)){
            $sql = "SELECT employee_id FROM pass_key WHERE pkey = '$key'";
            $res = $db->query($sql);
            $id = $res->fetch_assoc();
            $id = $id['employee_id'];
            $row = $res->num_rows;
            
            if($row>0){
                $sql ="UPDATE users SET password = '$password' WHERE employee_id = '$id'";
                if($db->query($sql)){
                    
                $sql = "DELETE FROM pass_key WHERE employee_id ='$id'";
                if($db->query($sql)){
                     $session->msg('s','password changed');
            redirect('index.php',false);
                }
                }
            }else{
                $session->msg('s','password changed');
            redirect('change_pass.php?key='.$key,false);
            }
            
            
        }else{
            $session->msg('d',$error);
            redirect('change_pass.php?key='.$key,false);
        }
        
        
        
        }else{
            echo "male";
        }
        


?>