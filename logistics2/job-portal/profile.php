<?php
  ob_start();
  require_once('includes/load.php');


   $applicant_id = $_SESSION['applicant_id'];

  $query = "SELECT * FROM applicants WHERE applicant_id = '$applicant_id;'";
  $result = $db->query($query);
  $applicant = $result->fetch_assoc();

  







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
          
            <li>
              <hr class="dropdown-divider">
            </li> 
            <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

 <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>
<div class="container mt-5">
<div class="row">
  
  <div class="col-xl-3"  >
    <div class="col mb-3 ">
   <img  class="rounded-circle img-fluid" src="uploads/users/<?php 
      if(empty($applicant['profile_pic'])){
         echo 'default.png';
      }else{
          echo $applicant['profile_pic'] ; 
        }
   ?>" alt="No Profile image" style="width:200px; height: 200px;" >
  </div>
<div class="row-xl-2">
   
    
    <div class="col  ">
      <h5><?php echo ucfirst($applicant['first_name'])." ".ucfirst($applicant['middle_name'])." ".ucfirst($applicant['last_name']) ; ?></h5>
    </div >
     <div class="col mb-3">
      <a href="change-dp.php" class="text-decoration-none"  style="font-weight: bold">Change profile picture</a>
    </div>
   
    <div class="col">
      <a href="my-application.php" class="text-decoration-none"  style="font-weight: bold">My applications</a>
    </div>
    
    <div class="col mb-3">
      <a  href="edit-profile.php?id=<?php echo $_SESSION['applicant_id']; ?>"  style="font-weight: bold" class="text-decoration-none">Edit profile</a>
    </div>

    <div class="col">
      <a  href="change-pass.php?id=<?php echo $_SESSION['applicant_id']; ?>"  style="font-weight: bold" class="text-decoration-none">Change password</a>
    </div>
  </div>
</div>


  <div class="col-xl-7">

<div class="col-xl-10 mx-auto rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
    <div class="col-md-12  text-center">
      <h4>Personal Information </h4>
    </div>
    <div class="col-md-12 ">
      <p>Full name : <?php echo ucfirst($applicant['first_name'])." ".ucfirst($applicant['middle_name'])." ".ucfirst($applicant['last_name']) ; ?></p>
    </div >
    <div class="col-md-12">
      <p>E-mail : <?php echo ucfirst($applicant['email']) ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Cellphone No. : <?php echo $applicant['contact_number'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Age : <?php echo $applicant['age'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Birth-date : <?php echo date('m-d-Y',strtotime($applicant['birth_date'])) ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Gender : <?php echo $applicant['gender'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Civil status : <?php echo $applicant['civil_status'] ; ?></p>
    </div>
     <div class="col-md-12">
      <p>Religion : <?php echo $applicant['religion'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Address : <?php echo $applicant['address'] ; ?></p>
    </div>   
  </div>


  <?php



  $query = "SELECT * FROM education_background WHERE applicant_id = '$applicant_id;'";
  $result = $db->query($query);
  $applicant = $result->fetch_assoc();


?>


  <div class="col-xl-10 mx-auto rounded-3 mb-3"  style="border-left: 5px solid #0076Be; padding-left: 5%; ">
    <div class="col-md-12 text-center">
      <h4>Educational Background </h4>
    </div>
    <div class="col-md-12">
      <p>Elementary : <?php echo $applicant['elementary'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Junior high school : <?php echo $applicant['junior_high_school'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Senior high school : <?php echo $applicant['senior_high_school'] ; ?></p>
    </div>

    <?php



  $query = "SELECT * FROM college WHERE applicant_id = '$applicant_id;'";
  $result = $db->query($query);
  $applicant = $result->fetch_assoc();
  $rows = $result->num_rows;

  if($rows>0){
?>
 <div class="col-md-12 text-center" >
      <b>College </b>
    </div>
   <?php do{
?>
    <div class="col-md-12">
      <p>Name of school: <?php echo $applicant['name_of_school'] ; ?></p>
    </div>
    <div class="col-md-12 mb-5">
      <p>Course : <?php echo $applicant['course'] ; ?></p>
    </div>
  

 <?php
    }while($applicant = $result->fetch_assoc());
  }
?> </div> 

<?php

  $query = "SELECT * FROM job_history WHERE applicant_id = '$applicant_id;'";
  $result = $db->query($query);
  $rows = $result->num_rows;
  $info = $result->fetch_assoc();



  if($rows>0){


?>



  <div class="col-xl-10 mx-auto rounded-3 mb-3"  style="border-left: 5px solid #0076Be; padding-left: 5%; ">
    <div class="col-md-12 text-center">
      <h4>Previous Employment </h4>
    </div>
    <?php do{ ?>
       <div class="col-md-12">
      <p>Company : <?php echo $info['company'] ; ?></p>
    </div>
     <div class="col-md-12">
      <p>Position : <?php echo $info['position'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Date started: <?php echo date('m-d-Y',strtotime($info['date_started'])) ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Date ended: <?php echo date('m-d-Y',strtotime($info['date_ended'])) ; ?></p>
    </div>
    <div class="col-md-12 mb-5">
      <p>Years of service: <?php echo $info['years_of_service'] ; ?></p>
    </div>
  <?php }while($info = $result->fetch_assoc()); ?>
  </div>
<?php } ?>


 </div>
</div>
</div>



















</body>
        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        
    </body>
</html>

<?php }else{  $session->msg('d','Please login...');
            redirect('login.php', false); }?>