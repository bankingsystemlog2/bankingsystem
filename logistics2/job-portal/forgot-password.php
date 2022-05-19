<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}






if(isset($_POST['s'])){
$emailPattern = "/^[a-zA-z\d\._]+@[a-zA-z]+\.[a-zA-z]+$/";
$email = $db->escape($_POST['email']);
	if(empty($email)){
		 $session->msg("d", "Email Can't Be Empty.");
    redirect('forgot-password.php',false);
	}elseif(!preg_match($emailPattern, $email)){
            $error = "Invalid E-mail";
       }else{
       	$em = $email;
       }

       $sql = "SELECT * FROM applicants WHERE email = '$em'";
       $result = $db->query($sql);
       $row = $result->num_rows;
       $e_mail = $result->fetch_assoc();
       if($row>0){

       	$id = $e_mail['applicant_id'];
 	 $to_email = $e_mail['email'];
            $subject = "Password Recovery ";
            $body = "<p>Click the link below to change your password.<br>";
            $body .= '<a href="obms.online/HR1/portal/job-portal/forgot.php?id='.$id.'">Click Here.</a>';
           

            $headers = "From:  BankingAndfinance@obms.com\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to_email, $subject, $body, $headers)) {



    $session->msg("s", "Password Recovery link has been sent to your email");
      redirect('login.php',false);
   
}else{

     $session->msg('d',' theres something wrong');
          redirect('forgot-password.php', false);
}
 	
       }else{
       	$session->msg("d", "Email is not registered.");
    redirect('forgot-password.php',false);
       }
}






  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Banking and Finance - Forgot Password</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>

 <nav class="navbar navbar-expand-lg navbar-light bg-primary static-top">
  <div class="container ">
    <a class="navbar-brand text-white" href="index.php">
      Banking and Finance
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="login.php">login</a>
        </li>
      <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li> 
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6 " >

                 
                            <form class="bg-white" style="padding:30px; border-radius: 15px;" method="post" action="forgot-password.php">


                                <div class="form-group row mb-3">
                                    <div class="col-md-12 col-form-label text-center">

                                        <h2>Forgot Password</h2>
                                    </div>

                                  
                                    <?php echo display_msg($msg);  ?>

                                 <div class="form-group row mb-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-8">
                                        <input type="text" id="email" class="form-control border border-dark" name="email" >
                                        
                                    </div>
                                </div>

                                

                                <div class="col-md-12 offset-md-3 mt-4 mb-2">
                                        <button type="submit" name="s" class="btn btn-primary">
                                        Send Password Recovery Link
                                        </button>
                                       
                                    </div>
                            
                            </form>
                     

                        

                   





                    </div>
                </div>
            </div>
        </header>




</body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        
    </body>
</html>