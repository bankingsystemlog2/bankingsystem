
<?php
  ob_start();
   require_once('includes/load.php');



if($session->isUserLoggedIn(true)){

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Banking and Finance - Job Posting page</title>
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
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">
      Banking and Finance
    </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
       

        
       <li class="nav-item dropdown">

         <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
        </li>
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['applicant_id']; ?>">Profile</a></li>
           
              <hr class="dropdown-divider">
            </li> 
            <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="col-md-9 mt-3">
<center><h3>Upload the following documents </h3></center><br>
<div class="cold-md-5" style="margin-left:35%;">

  <center><i>file extensions allowed: .jpg, .jpeg, .pdf, .docx </i></center>
    <form  method="post" action="upload-docu.php" enctype="multipart/form-data">
                                <div class="form-group row mb-3">
                                    <label for="first_name" class="col-md-3 col-form-label text-md-right">Resume</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="first_name" class="form-control border border-dark" name="resume" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="middle_name" class="col-md-3 col-form-label text-md-right">SSS ID or E1 Form </label>
                                    <div class="col-md-6">
                                        <input type="file" required id="middle_name"  class="form-control border border-dark" name="sss" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="last_name" class="col-md-3 col-form-label text-md-right">Philhealth ID or Registration Form</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="last_name" class="form-control border border-dark" name="phil" value="">
                                        
                                    </div>
                                    
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">Pag-ibig ID or Registration Form</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="email" class="form-control border border-dark" name="pag-ibig" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="contact" class="col-md-3 col-form-label text-md-right">NBI or Police clearance</label>
                                    <div class="col-md-6">
                                        <input type="file" required min="11" max="11" id="contact" class="form-control border border-dark" name="nbi" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right"> Any Valid ID</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="password" name="valids" class="form-control border border-dark" value="">
                                        
                                    </div>
                                </div>


                        

                         
                              
  
                                    <div class="col-md-6 offset-md-4 mt-4 mb-5">
                                      
                                        <button type="submit" name="submit" class="btn btn-primary">
                                        Upload
                                        </button>
                                    </div>
                                </div>
                            </form>
</div>
</div>


 </body>
        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <?php }else{  $session->msg('d','Please login...');
            redirect('login.php', false); }?>