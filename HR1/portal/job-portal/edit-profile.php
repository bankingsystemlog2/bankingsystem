<?php
  ob_start();
  require_once('includes/load.php');

 


$id = $_SESSION['applicant_id'];


  
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


</div>

<?php 

$query = "SELECT * FROM applicants WHERE applicant_id = '$id';";
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
      <h4>Personal Information </h4>
    </div>
    <form class="col-xl-12 mb-5" method="post" action="update-profile.php">
        <div class="row mb-3">
        <div class="col-2">
        <label>First name</label>
      </div>
      <div class="col-7">
        <input class="col-7" type="text" name="first_name" value="<?php echo ucfirst($info['first_name']) ; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Middle name</label>
      </div>
      <div class="col-7">
        <input class="col-7" type="text" name="middle_name" value="<?php echo ucfirst($info['middle_name']) ; ?>">
      </div>
      </div>

     <div class="row mb-3">
        <div class="col-2">
        <label>Last name</label>
      </div>
      <div class="col-7">
        <input class="col-xl-7" type="text" name="last_name" value="<?php echo ucfirst($info['last_name']) ; ?>">
      </div>
      </div>


      <div class="row mb-3">
        <div class="col-2">
        <label>E-mail</label>
      </div>
      <div class="col-7">
        <input class="col-xl-7" type="text" name="email" value="<?php echo ucfirst($info['email']) ; ?>">
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>Cellphone no.</label>
      </div>
      <div class="col-7">
        <input class="col-xl-7" type="text" name="contact_no" value="<?php echo ucfirst($info['contact_number']) ; ?>">
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>Birthday</label>
      </div>
      <div class="col-5">
        <input class="col-xl-5" type="date" name="bday" value="<?php echo ucfirst($info['birth_date']) ; ?>">
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>Gender</label>
      </div>
      <div class="form-group col-7">
        <select name="gender">
            <option value="Male" <?php echo ($info['gender'] == "Male")? 'Selected' : '' ?> >Male</option>
            <option value="Female" <?php echo ($info['gender'] == "Female")? 'Selected' : '' ?> >Female</option>          
        </select>
      </div>
      </div>

      <div class="form-group row mb-3">
        <div class="col-2">
        <label>Civil status</label>
      </div>
      <div class="col-7">
       <select name="civil_status">
          <option value="Single" <?php echo ($info['civil_status'] == "Single")? 'Selected' : '' ?> >Single</option>
          <option value="Married" <?php echo ($info['civil_status'] == "Married")? 'Selected' : '' ?> >Married</option>
          <option value="Seperated" <?php echo ($info['civil_status'] == "Seperated")? 'Selected' : '' ?> >Seperated</option>
          <option value="Widowed" <?php echo ($info['civil_status'] == "Widowed")? 'Selected' : '' ?> >Widowed</option>
      </select>
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>Religion</label>
      </div>
      <div class="col-7">
        <input type="text" class="col-xl-7" type="text" name="rel"  value="<?php echo $info['religion'] ?>">
        
        
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Address</label>
      </div>
      <div class="col-7">
        <textarea class="col-xl-7" type="text" name="address" id="nadd"></textarea>
        <input type="hidden" name="add" id="add" value="<?php echo $info['address']; ?>">
        
      </div>
      </div>
     

  </div>



<?php 

$query = "SELECT * FROM education_background WHERE applicant_id = '$id';";
$result = $db->query($query);
$info = $result->fetch_assoc();

?>

<div class="col-xl-10 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
<div class="col-md-12 mb-5 text-center">
      <h4>Educational Background</h4>
    </div>


    
      <div class="row mb-3">
        <div class="col-2">
        <label>Elementary</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="educ_elem" value="<?php echo $info['elementary']; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Junior high school</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="educ_hs" value="<?php echo $info['junior_high_school']; ?>">
      </div>
      </div>
       <div class="row mb-3">
        <div class="col-2">
        <label>Senior high school</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" name="educ_hs2" value="<?php echo $info['senior_high_school']; ?>">
      </div>
      </div>


<?php 

$query = "SELECT * FROM college WHERE applicant_id = '$id';";
$result = $db->query($query);
$info = $result->fetch_assoc();
$row = $result->num_rows;


if($row>0){

?>


<div class="col-md-12 mb-2 text-center">
      <b>College education</b>
    </div>
<?php do{ ?>

      <div class="row mb-2">
         <div class="col-2">
        <label>Name of School :</label>
      </div>
      <div class="col-10 ">
        <p><?php echo $info['name_of_school'] ; ?></p>
      </div>
      </div>

       <div class="row mb-1">
         <div class="col-2">
        <label>Course :</label>
      </div>
      <div class="col-10 ">
        <p><?php echo $info['course'] ; ?></p>
        
      </div>
      </div>
      <a href="edit-college.php?id=<?php echo $info['id'] ?>" class="btn btn-primary btn-sm mb-5" style="height: 35px;font-size: 14px;">Edit</a>
<?php }while($info = $result->fetch_assoc());  ?>
<div class="col">
  <a href="add-college.php?id=<?php echo $_SESSION['applicant_id'] ?>" class="btn btn-success mt-5" style=";width:100px; font-size: 14px;">Add</a>
</div>

   <?php } ?>
</div>






<?php 

$query = "SELECT * FROM job_history WHERE applicant_id = '$id';";
$result = $db->query($query);
$info = $result->fetch_assoc();
$row = $result->num_rows;


if($row>0){

?>


<div class="col-xl-10 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
<div class="col-md-12 mb-5 text-center">
      <h4>Previous employment</h4>
    </div>


    
<?php do{ ?>

      <div class="row mb-3">
        <div class="col-2">
        <label>Company</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" disabled name="company" value="<?php echo $info['company']; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Position</label>
      </div>
      <div class="col-10">
        <input class="col-10" type="text" disabled name="" value="<?php echo $info['position']; ?>">
      </div>
      </div>

      <div class="row mb-3">
        <div class="col-2">
        <label>Date started</label>
      </div>
      <div class="col-5">
        <input class="col-5" type="text" disabled name="date_started" value="<?php echo date('m-d-Y',strtotime($info['date_started'])); ?>">
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>Date ended</label>
      </div>
      <div class="col-5">
        <input class="col-5" disabled type="text" name="date_ended" value="<?php echo date('m-d-Y',strtotime($info['date_ended'])); ?>">
      </div>
      </div>
      
      
<div class="col mb-5"><a href="edit-job.php?id=<?php echo $info['id']; ?>" name='update' class="btn btn-sm btn-primary">Edit</a></div>
<div class="col">
  <a href="add-jobexp.php?id=<?php echo $_SESSION['applicant_id'] ?>" class="btn btn-success mt-5" style=";width:100px; font-size: 14px;">Add</a>
</div>
<?php }while($info = $result->fetch_assoc()); } ?>


</div>


<div class="col-md-12"><button type="submit" name='update-profile' class="btn btn-lg btn-success" style="margin-left:45%; margin-bottom: 5%;">Update Profile</button></div>
</form>



</div>


<?php }else{  $session->msg('d','Please login...');
            redirect('login.php', false); }?>























</body>
        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script type="text/javascript">
          var add = document.getElementById('add').value;
          var nadd = document.getElementById('nadd');

          nadd.value = add;
        </script>
       
        
    </body>
</html>