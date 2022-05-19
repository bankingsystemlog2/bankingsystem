<?php
  ob_start();
  require_once('includes/load.php');

if(isset($_POST['delete'])){

$id = $_POST['id'];



$q = "SELECT * FROM applications WHERE applicant_id = '$id'";
if($db->query($q)){
$result = $db->query($q);
$job = $result->fetch_assoc();
$job_id = $job['job_id'];




$sq = "UPDATE job_vacancy SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($sq)){

  $s = "UPDATE posted_jobs SET no_of_vacancy = no_of_vacancy + 1 WHERE job_id = '$job_id'";
if($db->query($s)){


  $sql = "DELETE FROM applications WHERE applicant_id = '$id';";
  if($db->query($sql)){


    $session->msg('s','Application cancelled');
      redirect('my-application.php',false);
  }
}
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




<div class="container mt-5">
  <div class="row">
      <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>

<div class="col-xl-10 mx-auto rounded-3 mb-3 "  >


</div>

<?php
    $id = $_SESSION['applicant_id'];
    $sql = "SELECT * FROM applications WHERE applicant_id = '$id' ;";
    $result = $db->query($sql);
    $info = $result->fetch_assoc();
    $row = $result->num_rows;


if($row>0){?>

<div class="col-md-12  text-center">
      <h4>Your job application</h4>
    </div>
 <?php do{
?>

    <div class="col-xl-10 mx-auto rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">



   <form method="post" action="my-application.php">
    <div class="col-md-12 ">
      <p>Job title:    <?php echo ucfirst(str_replace('_',' ',$info['job_title'])) ; ?></p>
    </div >
    <div class="col-md-12">
      <p>Date of application :    <?php echo date('m-d-Y',strtotime($info['date_of_application'])) ; ?></p>
    </div>
     <div class="col-md-12">
      <p>Application status :    <?php echo $info['status'] ; ?></p>
    </div>
    <?php
    $sq = "SELECT * FROM applications  WHERE status = 'qualified for hiring' ";
    $res = $db->query($sq);
    $num = $res->num_rows;
    if($num>0){ ?>

      <a href="upload_document.php" class="btn btn-sm btn-info">Upload Documents</a>
<?php }else{ 
     if($info['status'] == 'For initial interview'){ 


      $sql ="SELECT * FROM initial_interview WHERE applicant_id = '$id'";
      $result = $db->query($sql);
      $info = $result->fetch_assoc();


      ?>


      <div class="col-md-12">
      <p>Date of interview :    <?php echo date('m-d-Y',strtotime($info['date'])) ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Time :    <?php echo $info['time'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Location :    <?php echo $info['location'] ; ?></p>
    </div>

  <?php } 

    $sql = "SELECT * FROM applications WHERE applicant_id = '$id' ;";
    $result = $db->query($sql);
    $info = $result->fetch_assoc();

    if($info['status'] == 'For final interview'){ 


      $sql ="SELECT * FROM final_interview WHERE applicant_id = '$id'";
      $result = $db->query($sql);
      $info = $result->fetch_assoc();


      ?>


      <div class="col-md-12">
      <p>Date of interview :    <?php echo date('m-d-Y',strtotime($info['date'])) ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Time :    <?php echo $info['time'] ; ?></p>
    </div>
    <div class="col-md-12">
      <p>Location :    <?php echo $info['location'] ; ?></p>
    </div>
  <?php } 



    $id = $_SESSION['applicant_id'];
    $sql = "SELECT * FROM applications WHERE applicant_id = '$id' ;";
    $result = $db->query($sql);
    $info = $result->fetch_assoc();


  ?>

      <div class="col-2">
       <?php if($info['status'] === 'pending'){ ?>
        <input type="hidden" name="id" value="<?php echo $info['applicant_id'] ; ?>">
        <button type="submit" name='delete' class="btn btn-sm btn-danger mb-3 mt-3">Cancel application</button>
      <?php }
      if($info['status'] === 'declined' OR $info['status'] === 'failed'){ ?>
         <input type="hidden" name="id" value="<?php echo $info['applicant_id'] ; ?>">
        <button type="submit" name='delete' class="btn btn-sm btn-danger mb-3 mt-3">Delete</button>

    <?php  }
      ?>
      </div>
   </form>
    </div>


<?php } }while($info = $result->fetch_assoc()) ; }else{ ?>



<div class="col-md-12  text-center">
      <h4>You have no applications</h4>
    </div>


<?php } ?>

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