<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}



$id = $_GET['id'];
$sql = "SELECT * FROM applicants WHERE applicant_id = '$id'";
$result = $db->query($sql);
$applicant = $result->fetch_assoc();
$row = $result->num_rows;



if(isset($_POST['s'])){
$pass = $_POST['password'];
	if(empty($pass)){
            $session->msg("d", "Password can't be empty.");
     		redirect('forgot.php?id='.$id,false);
        }elseif(strlen($pass)<=7){
            $session->msg("d", "Password must be 8 character and above.");
     		redirect('forgot.php?id='.$id,false);
        }elseif(!preg_match("#[0-9]+#", $pass)){
			$session->msg("d", "Password must contain numbers");
     		redirect('forgot.php?id='.$id,false);
        }elseif(!preg_match("#[A-Z]+#", $pass)){
            $session->msg("d", "Password must contain Capital Letters.");
     		redirect('forgot.php?id='.$id,false);
        }elseif(!preg_match("/[\'^£$%&*()}{@#~?><>!.,|=_+¬-]/", $pass)){
            $session->msg("d", "Password must contain special characters.");
     		redirect('forgot.php?id='.$id,false);

        }else{
            $password = remove_junk($db->escape($pass));
            $password= sha1($password);
        }

        $query = "UPDATE applicants set password = '$password' WHERE applicant_id = '$id'";
      if($db->query($query)){
      	$session->msg("s", "Password has been changed");
     	redirect('login.php',false);

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

                 <?php if($row>0){ ?>


                
                            <form class="bg-white" style="padding:30px; border-radius: 15px;" method="post"
                            action="forgot.php?id=<?php echo $id ?>">


                                <div class="form-group row mb-3">
                                    <div class="col-md-12 col-form-label text-center">

                                        <h2>Reset Password</h2>
                                    </div>

                                  
                                    <?php echo display_msg($msg);  ?>

                                 <div class="form-group row mb-5">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="password" name="password" class="form-control border border-dark" value="">
                                        <input type="checkbox" onclick="show()" class="mt-2" > show password </br>
                                        <span><i>password must contain a-Z,0-9,#!-&^</i></span>
                                    </div>
                                </div>

                                

                                <div class="col-md-12 offset-md-3 mt-4 mb-2">
                                        <button type="submit" name="s" class="btn btn-primary">
                                       Change Password
                                        </button>
                                       
                                    </div>
                            
                            </form>
                     

                        

                   

                    <?php }else{


                    	 $session->msg("d", "Account not registered");
     					 redirect('login.php',false);

                  } ?>

                    </div>
                </div>
            </div>
        </header>




</body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script type="text/javascript">

        var elem = document.getElementById('elem').value;
        var hs = document.getElementById('hs').value;
        var col = document.getElementById('col').value;
        var add = document.getElementById('add').value;
        
        var educ1 = document.getElementById('educ1');
        var educ2 = document.getElementById('educ2');
        var educ3 = document.getElementById('educ3');
        var addr = document.getElementById('address');
        

        educ1.value = elem;
        educ2.value = hs;
        educ3.value = col;
        addr.value = add;
        


        function show(){ 
         var x = document.getElementById("password");
        if (x.type === "password") {
         x.type = "text";
  } else {
    x.type = "password";
  }
}


    </script>
        
    </body>
</html>