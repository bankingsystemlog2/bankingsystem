<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}

  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign in</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
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

                 
                            <form class="bg-white" style="padding:30px; border-radius: 15px;" method="post" action="auth.php">


                                <div class="form-group row mb-3">
                                    <div class="col-md-12 col-form-label text-center">

                                        <h2>Login</h2>
                                    </div>

                                  
                                    <?php echo display_msg($msg);  ?>

                                 <div class="form-group row mb-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-8">
                                        <input type="text" id="email" class="form-control border border-dark" name="email" >
                                        
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
                                    <div class="col-md-8">

                                        <input type="password" id="password" class="form-control border border-dark" name="password" >
                                    
                                        
                                    </div>
                                </div>

                                <div class="col-md-12 offset-md-3 mt-4 mb-2">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                        Sign In
                                        </button>
                                        <div class="col-md-12 mt-3">
                                        <a href="forgot-password.php">Forgot password?</a>
                                    </div>
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