<?php include_once('includes/load.php'); 

$req_fields = array('email','password' );
validate_fields($req_fields);
$username = $db->escape($_POST['email']);
$password = $db->escape($_POST['password']);

if(empty($errors)){

$sql = "SELECT * FROM applicants WHERE email = '$username'";
     $result = $db->query($sql);
     $applicant_id = $result->fetch_assoc();
     $id = $applicant_id['applicant_id'];
     $sql = "SELECT * FROM account_verification WHERE applicant_id = '$id'";
     $result = $db->query($sql);
     $verified = $result->fetch_assoc();

 if($verified['verified']>0){   
  $user_id = authenticate($username, $password);
  if($user_id){
     
    //create session with id
     $session->login($user_id);
    //Update Sign in time
     updateLastLogIn($user_id);


     $session->msg("s", "Login success");
     redirect('home.php', false);
     

  }else{
    $session->msg("d", "Sorry Username/Password incorrect.");
    redirect('login.php',false);
  } }else{

  $session->msg("d", "verify your email to continue ");
   redirect('login.php',false);
}

}else{
   $session->msg("d", $errors);
   redirect('login.php',false);
}


?>
