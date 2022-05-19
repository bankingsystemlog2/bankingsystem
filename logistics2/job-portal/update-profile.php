<?php
  ob_start();
  require_once('includes/load.php');

 

$namePattern = "/^[a-zA-z]+$/";
$emailPattern = "/^[a-zA-z\d\._]+@[a-zA-z]+\.[a-zA-z]+$/";
$id = $_SESSION['applicant_id'];

if(isset($_POST['update-profile'])){

   $fname = trim($_POST['first_name']);
            $lname = trim($_POST['last_name']);
            $mname = trim($_POST['middle_name']);
            $email = trim($_POST['email']);
            
            $cont = trim($_POST['contact_no']);       
            $gender = trim($_POST['gender']);
            $gender = remove_junk($db->escape($gender));
            $civil_status =trim($_POST['civil_status']);
            $civil_status = remove_junk($db->escape($civil_status));
            $add = trim($_POST['address']);
            $bday = trim($_POST['bday']);
            $today = date("Y-m-d");
            $agec = date_diff(date_create($bday),date_create($today));
            $age = $agec->format('%y');
            $rel = trim($_POST['rel']);



              if(empty($rel)){
                $session->msg('d','Religion can\'t be empty.');
          redirect('edit-profile.php', false);
            }elseif(strlen($rel) > 50){
             $session->msg('d','Religion is too long.');
          redirect('edit-profile.php', false);
           }elseif(!preg_match($namePattern, $rel)){
                $session->msg('d','Invalid religion name.');
          redirect('edit-profile.php', false);
            }else{
                $religion = remove_junk($db->escape($rel));
            }

             if(empty($add)){

            $session->msg('d','Address can\'t be empty.');
          redirect('edit-profile.php', false);

      
            }elseif(strlen($add) > 150){
             $session->msg('d','address is too long.');
          redirect('edit-profile.php', false);
             }else{
                $address = remove_junk($db->escape($add));
            }


            if((int)$age <= 17){
                
            $session->msg('d','Too young.');
          redirect('edit-profile.php', false);
            }elseif ((int)$age > 63) {
                
            $session->msg('d','Too old.');
          redirect('edit-profile.php', false);
            }else{
                $b_day = remove_junk($db->escape($bday));

            }

            if(empty($bday)){
                
            $session->msg('d','Set your birthday.');
          redirect('edit-profile.php', false);
            }

       

       if(empty($cont)){
         $session->msg('d','Cellphone number can\'t be empty.');
          redirect('edit-profile.php', false);
           
       }elseif (!preg_match("/[0-9]/", $cont)) {
         $session->msg('d','Invalid cellphone number');
          redirect('edit-profile.php', false);
            
       }elseif (strlen($cont) != 11) {
         $session->msg('d','Invalid cellphone number');
          redirect('edit-profile.php', false);
            
       }else{
            $contact = remove_junk($db->escape($cont));
       }

       if(empty($email)){
        $session->msg('d','E-mail can\'t be empty.');
          redirect('edit-profile.php', false);
            
       }elseif(!preg_match($emailPattern, $email)){
            $session->msg('d','Invalid email');
          redirect('edit-profile.php', false);
            
       }else{
            $e_mail = remove_junk($db->escape($email));
       }


       if(empty($lname)){
         $session->msg('d','Last name can\'t be empty.');
          redirect('edit-profile.php', false);
           
        }elseif(strlen($lname) > 50){
            $session->msg('d','Last name is too long.');
          redirect('edit-profile.php', false);
        }elseif(!preg_match($namePattern,$lname)){
             $session->msg('d','Invalid  last tname.');
          redirect('edit-profile.php', false);
            
        }else{
            $l_name = remove_junk($db->escape($lname));
        }

        if(empty($mname)){
             $session->msg('d','Middle name can\'t be empty.');
          redirect('edit-profile.php', false);
            
        }elseif(strlen($mname) > 50){
            $session->msg('d','Middle name is too long.');
          redirect('edit-profile.php', false);
        }elseif(!preg_match($namePattern,$mname)){
            $session->msg('d','Invalid middle name.');
          redirect('edit-profile.php', false);
        }else{
            $m_name = remove_junk($db->escape($mname));
        }


         if(empty($fname)){
             $session->msg('d','First name can\'t be empty.');
          redirect('edit-profile.php', false);
            
        }elseif(strlen($fname) > 50){
            $session->msg('d','First name is too long.');
          redirect('edit-profile.php', false);
        }elseif(!preg_match($namePattern,$fname)){
            $session->msg('d','Invalid  first name.');
          redirect('edit-profile.php', false);
            
        }else{
            $f_name = remove_junk($db->escape($fname));
        }




$query = "UPDATE applicants SET first_name = '$f_name', middle_name = '$m_name', last_name = '$l_name',";
$query .= "email = '$email', contact_number = '$contact', gender = '$gender', birth_date = '$b_day', age = '$age', civil_status = '$civil_status', ";
$query .= "religion = '$religion' WHERE applicant_id = '$id';";

if($db->query($query)){

       
$elem = trim($_POST['educ_elem']);
$hs = trim($_POST['educ_hs']);
$hs2 = trim($_POST['educ_hs2']);



            if(empty($hs)){
               $session->msg('d','Junior high school can\'t be empty.');
          redirect('edit-profile.php', false);
               
               
            }elseif(strlen($hs) > 50){
            $session->msg('d','Name of school is too long.');
          redirect('edit-profile.php', false);
             }else{
                $junior_high_school = remove_junk($db->escape($hs));
            }

            if(empty($hs2)){
               $session->msg('d','Senior high school can\'t be empty.');
          redirect('edit-profile.php', false);
               
               
            }elseif(strlen($hs2) > 50){
            $session->msg('d','Name of school is too long.');
          redirect('edit-profile.php', false);
             }else{
                $senior_high_school = remove_junk($db->escape($hs2));
            }

            if(empty($elem)){
               $session->msg('d','Elementary can\'t be empty.');
          redirect('edit-profile.php', false);
                
            }elseif(strlen($elem) > 50){
            $session->msg('d','Name of school is too long.');
          redirect('edit-profile.php', false);
             }else{
                $elementary = remove_junk($db->escape($elem));
            }

$id = $_SESSION['applicant_id'];
$query = "UPDATE education_background SET elementary = '$elementary', junior_high_school = '$junior_high_school' ,";
$query.= "senior_high_school = '$senior_high_school' WHERE applicant_id = '$id';";
if($db->query($query)){



  $session->msg('s','Profile updated');
    redirect('edit-profile.php',false);
}
}

  }
  
  ?>