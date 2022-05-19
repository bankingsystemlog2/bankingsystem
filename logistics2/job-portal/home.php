<?php
  ob_start();
  require_once('includes/load.php');
  $id = current_user();
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
        <script src="js/sweetalert/sweetalert2.min.js"></script>
    </head>
    <body>
      <?php  if ($session->isUserLoggedIn(true)){ ?>
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
          <a class="nav-link active text-white" aria-current="page" href="home.php">Home</a>
        </li>
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php?id=<?php echo $id['applicant_id']; ?>">Profile</a></li>
            
              <hr class="dropdown-divider">
            </li> 
            <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php 
$user = $id['applicant_id'];
  
  

  





  $query = "SELECT job_vacancy.*,posted_jobs.*,positions.*,departments.*,job_qualifications.* FROM job_vacancy JOIN posted_jobs ON job_vacancy.job_id = posted_jobs.job_id JOIN positions ON job_vacancy.pos_id = positions.pos_id JOIN departments ON job_vacancy.dept_id = departments.dept_id JOIN job_qualifications ON job_vacancy.quali_id = job_qualifications.id WHERE posted_jobs.status = 'posted' AND posted_jobs.no_of_vacancy > 0 AND job_vacancy.status = 'approved'";
  $result = $db->query($query);
  $posii  = $result->fetch_assoc();
  $row = $result->num_rows;





?>



<div class="container" >
  <div class="row">
    <div class="col-xl-12 mt-3">
      <form class="col-xl-5 mx-auto " method="get" action="search.php" >
          <div class="input-group">
    <input type="text" class="form-control" placeholder="Search Job" name="search_job">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit" name="search">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
      </button>
  </div>
               </div>
               </form>
      
      </div>
      <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>
<?php if($row>0){   
    do{
?>


       <div class="col-xl-11 mx-auto mt-3 mb-5 rounded-3 " style="border-left: 5px solid #0076Be;">

              <form method="post" action="apply.php">
            <div class="col-xl-11 mt-2 mx-auto text-primary">
             <h3><?php echo ucfirst(str_replace('_',' ',$posii['pos_name'])) ; ?></h3> 
             <input type="hidden" name="job_title" value="<?php echo $posii['pos_name'] ?>">
           </div>
           <div class="col-xl-11 mx-auto mt-4">
            <h5> Job Description</h5>
           </div>
           <div class="col-xl-11 mx-auto mt-2">
            <p><?php echo $posii['job_desc']; ?></p>
           </div>
           <div class="col-xl-11 mx-auto mt-4">
            <h5> Job Qualification</h5>
           </div>
            <div class="col-xl-11 mx-auto mt-2">
            <p><?php echo $posii['job_quali'];   ?></p>
           </div>
           <input type="hidden" name="job_id" value="<?php echo $posii['job_id'] ; ?>">
           <div class="col-xl-11 mx-auto mt-4 mb-3" >
            <form class="">
              <button type="submit" name="apply" class="col-sm-3 btn btn-success btn-sm " >Apply</button>
            
           </div>
                 
              </form>

            </div> 


          <?php }while($posii = $result->fetch_assoc()); } ?>
        
  </div>
</div>


        
    
      
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
<?php



 
 }else{  $session->msg('d','Please login...');
            redirect('login.php', false); }?>