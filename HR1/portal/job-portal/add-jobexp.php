<?php
  ob_start();
  require_once('includes/load.php');


   $applicant_id = $_SESSION['applicant_id'];





  $compf = "";
  $posf = "";
  $dsf = "";
  $def = "";
  $error = "";





 if(isset($_POST['add'])){

  $comp = $_POST['company'];
  $pos = $_POST['position'];
  $ds = $_POST['date_started'];
  $de = $_POST['date_ended'];


  $today = date("Y-m-d");
  $years = date_diff(date_create($ds),date_create($de));
  $years_of_service = $years->format('%y');
            


 
  if($ds >= $de){

  $error = "date invalid";
  }

  if(empty($de)){
    $error = "date ended can't be empty.";
  }elseif($de === $today){
    $error = "date invalid";
  }else{
    $date_ended = remove_junk($db->escape($de));
  }

  if(empty($ds)){
    $error = "date started can't be empty.";
  }elseif($ds === $today){
    $error = "date invalid";
  }else{
    $date_started = remove_junk($db->escape($ds));
  }

  if(empty($pos)){
    $error = "Position can't be empty.";
  }else{
    $position = remove_junk($db->escape($pos));
  }
 if(empty($comp)){
    $error = "$de.";
  }else{
    $company = remove_junk($db->escape($comp));
  }



  if(empty($error)){

    $sql = "INSERT INTO job_history (applicant_id,company,position,date_started,date_ended,years_of_service) VALUES";
    $sql .= "('$applicant_id','$company','$position','$date_started','$date_ended','$years_of_service');";
    if($db->query($sql)){

       $session->msg('s','Previous job successfuly added.');
          redirect('profile.php', false);
    }
  }



 }

  







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



<div class="container">
  
  <div class="row">
     <?php if(strlen($error) >0){  
                            

                            echo "<div class=\"alert alert-danger text-center col-md-6 mb-3 mt-3\" style=\"margin:auto\">";
                            echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\"></a>";
                            echo $error;                          
                            echo  "</div>";}
                           ?>

    <div class="col-xl-10 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
     <div class="col-md-12 mb-5 text-center">
      <h4>Add previous job</h4>
    </div>
    <form method="post" action="add-jobexp.php">
 <div class="row mb-3">
        <div class="col-2">
        <label>Company</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="company" value="<?php echo $compf; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Position</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="position" value="<?php echo $posf; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Date started</label>
      </div>
      <div class="col-5">
        <input class="col-5" type="date" name="date_started" value="<?php echo $dsf; ?>">
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>Date ended</label>
      </div>
      <div class="col-5">
        <input class="col-5" type="date" name="date_ended" value="<?php echo $def; ?>">
      </div>
      </div>
      
      
<div class="col"><button type="submit" name='add' class="btn btn-sm btn-success">Add</button></div>
</form>
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