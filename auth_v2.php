<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

  if(empty($errors)){
    $user = authenticate_v2($username, $password);

    $userlevel=$user['user_level'];
    $userDept=$user['Department'];
    $PersonName= remove_junk(ucfirst($user['name']));

        if($user):
          if ($user['status'] === '1'):
           //create session with id
           $session->login($user['id']);
           //Update Sign in time
           updateLastLogIn($user['id']);
           // redirect user to group Finance page by user level-----------------

                  switch ([$userlevel, $userDept]) {
                       case ['1', 'SuperAdmin']:

                        // Logging user entries................
                       $Log=$PersonName.',a '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('admin.php',false);
                       break;

                       case ['1', 'Finance'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/admin.php',false);
                       break;

                       case ['2', 'Finance'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................
                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('Finance/user_dashboard.php',false);
                       break;

                       case ['1', 'HR1'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR1/hr1/manager.php',false);
                       break;

                       case ['1', 'administrative'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Administrative System");
                       redirect('Administrative/admin.php',false);
                       break;
					   
					    case ['1', 'logistic2'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Administrative System");
                       redirect('logistics2/admin.php',false);
                       break;
                       case ['3', 'logistic2'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello ".$user['username'].", Welcome to Administrative System");
                       redirect('logistics2/driver.php',false);
                       break;
                       
                        case ['1', 'HR4'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Banking And Financial Management System..");
                       redirect('HR4/admin.php',false);
                       break;
					   
					   
					    case ['1', 'core1'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Core 1 Module..");
                       redirect('Core1/admin.php',false);
                       break;
                       
					   
					   case ['1', 'core2'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Core 2 Module..");
                       redirect('Core2/admin.php',false);
                       break;
					   
					   
					   case ['1', 'logistic1'];
                       // Logging user entries................
                       $Log=$PersonName.', From '.$userDept.' has Logged in to the system.';
                       activitylog($Log);
                       //end of Logs..........................

                       $session->msg("s", "Hello, ".$user['username'].", Welcome To Logistic 2 Module..");
                       redirect('Logistic1/admin.php',false);
                       break;
                       
                       

                      }

                      
                      
                      

        else:
        $session->msg("w", "Sorry Account Temporarily deactivated.");
        redirect('index.php',false);
        endif;
        else:
        $session->msg("d", "Sorry Username/Password incorrect.");
        redirect('index.php',false);
        endif;
      } else {
      $session->msg("d", $errors);
     redirect('login_v2.php',false);
     }

?>
