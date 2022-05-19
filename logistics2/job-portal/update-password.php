 if(empty($pass)){
            
            $session->msg('d','Password can\'t be empty.');
          redirect('edit-profile.php', false);

        }elseif(strlen($pass)<=7){

            $session->msg('d','Password must be 8 character and above.');
          redirect('edit-profile.php', false);
            
        }elseif(!preg_match("#[0-9]+#", $pass)){
            $session->msg('d','Password must contain numbers.');
          redirect('edit-profile.php', false);
            
        }elseif(!preg_match("#[A-Z]+#", $pass)){
             $session->msg('d','Password must contain Capital Letters.');
          redirect('edit-profile.php', false);
           
        }elseif(!preg_match("/[\'^£$%&*()}{@#~?><>!.,|=_+¬-]/", $pass)){
             $session->msg('d','Password must contain special characters.');
          redirect('edit-profile.php', false);
           
        }else{
            $password = remove_junk($db->escape($pass));
            $password= sha1($password);
        }
        $pass = trim($_POST['password']);