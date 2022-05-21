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
        <title>Banking and Finance - Supplier Portal</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/sweetalert/sweetalert2.min.js"></script>
        <div class="row">
    </head>
    <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-primary static-top">
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">
      Banking and Finance
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white " aria-current="page" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="login.php">login</a>
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
    </div>
</nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            
                            <h1 class="mb-0 pt-0">Looking for Supplier!</h1></br>
                            
                          
                                <div class="row">
                                    <div class="col">
                                       
                                    </div>
                                    <div class="col-my-12"><a href="search.php" class="btn btn-primary btn-lg">Apply now</a>
                                    </div>
                                </div>
                               
                           
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <body>
       
        </body>
        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    ?>
    <script>
    swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "OK",
    });
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>
        
    </body>
</html>
