<?php
  require_once('includes/load.php');
  
  $id = $_GET['id'];
  
  $sql = "SELECT * FROM employees WHERE employee_id = '$id'";
  $res = $db->query($sql);
  $email = $res->fetch_assoc();
  if($db->query($sql)){
      
      
     $e_mail = $email['email'];
     $id = $email['employee_id'];
     $date = date('Y-m-d h:i:s');
     $pkey = sha1($email['name']).sha1($date);
  
            $subject = "Change password";
            $body = "<p>The manager Approved your request, Click the link to change your password.<br>";
            $body .= "<a href='obms.online/change_pass.php?key=".$pkey."'>Click here</a>";
           


            $headers = "From:  BankingAndFinance@obms.online \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            if(mail($e_mail, $subject, $body, $headers)){
                
        $sql = "INSERT INTO pass_key (employee_id,pkey) VALUES ('$id','$pkey')";
        if($db->query($sql)){
            
            $sql = "UPDATE change_pass_request SET status ='approved' WHERE employee_id = '$id'";
            if($db->query($sql)){
                 $_SESSION['status'] = "Request Approved";
            $_SESSION['status_code'] = "success";
    redirect('password_approval.php',false);
                
            }
            
            
        }
            }
  }
  ?>