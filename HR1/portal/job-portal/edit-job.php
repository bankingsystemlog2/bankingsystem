<?php
  ob_start();
  require_once('includes/load.php');

 


$id = $_GET['id'];


  if(isset($_POST['update'])){

$comp = $_POST['company'];
  $pos = $_POST['position'];
  $ds = $_POST['date_started'];
  $de = $_POST['date_ended'];
  $id = $_POST['id'];


  $today = date("Y-m-d");
  $years = date_diff(date_create($ds),date_create($de));
  $years_of_service = $years->format('%y');
            


 
  if($ds >= $de){
  $session->msg('d','date invalid.');
          redirect('edit-job.php?id='.$id, false);
  }
  if(empty($de)){
    $session->msg('d','date ended can\'t be empty.');
          redirect('edit-job.php?id='.$id, false);
  }elseif($de === $today){
    $session->msg('d','date invalid.');
          redirect('edit-job.php?id='.$id, false);
  }else{
    $date_ended = remove_junk($db->escape($de));
  }

  if(empty($ds)){
    $session->msg('d','date started can\'t be empty.');
          redirect('edit-job.php?id='.$id, false);
  }elseif($ds === $today){
     $session->msg('d','date invalid');
          redirect('edit-job.php?id='.$id, false);
  }else{
    $date_started = remove_junk($db->escape($ds));
  }

  if(empty($pos)){
     $session->msg('d','Position can\'t be empty.');
          redirect('edit-job.php?id='.$id, false);
  }else{
    $position = remove_junk($db->escape($pos));
  }
 if(empty($comp)){
  $session->msg('d','Name of company can\'t be empty.');
          redirect('edit-job.php?id='.$id, false);
  }else{
    $company = remove_junk($db->escape($comp));
  }
  
 
$sql = "UPDATE job_history SET company = '$company', position = '$position',";
$sql .= " date_started = '$date_started', date_ended = '$date_ended', years_of_service = '$years_of_service' WHERE id = '$id';";

if($db->query($sql)){
$session->msg('s','Previous job updated');
          redirect('edit-job.php?id='.$id, false);

}
}
 
 if(isset($_POST['delete'])){

  $id = $_POST['id'];

  $sql = "DELETE FROM job_history WHERE id = '$id'; ";
  if($db->query($sql)){
    $session->msg('s','Previous job deleted');
          redirect('profile.php', false);
  }
 }





 ?>


<?php  if ($session->isUserLoggedIn(true)){ ?>

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
       <nav class="navbar navbar-expand-lg navbar-light bg-primary static-top mb-2">
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
            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $_SESSION['applicant_id']; ?>
              ">Edit profile</a></li>
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
<?php 

$query = "SELECT * FROM job_history WHERE id = '$id';";
$result = $db->query($query);
$info = $result->fetch_assoc();

?>

<div class="container"> 
  <div class="row">
     <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>
    <div class="col-xl-10 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">

<div class="col-md-12 mb-5 text-center">
      <h4>Edit previous job</h4>
    </div>
<form method="post" action="edit-job.php">
<div class="row mb-3">
        <div class="col-2">
        <label>Company</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="company" value="<?php echo $info['company']; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Position</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="position" value="<?php echo $info['position']; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Date started</label>
      </div>
      <div class="col-5">
        <input class="col-5" type="date" name="date_started" value="<?php echo $info['date_started']; ?>">
      </div>
      </div>

       <div class="row mb-5">
        <div class="col-2">
        <label>Date ended</label>
      </div>
      <div class="col-5">
        <input class="col-5" type="date" name="date_ended" value="<?php echo $info['date_ended']; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      </div>
      </div>

      <div class="col"><button type="submit" name='update' class="btn btn-sm btn-success">Update</button>
      <button type="submit" name='delete' class="btn btn-sm btn-danger">Delete</button></div>

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