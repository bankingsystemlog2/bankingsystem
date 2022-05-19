<?php
  ob_start();
  require_once('includes/load.php');

 


$id = $_GET['id'];

if(isset($_POST['update'])){


$col = trim($_POST['educ_college']);
$course = trim($_POST['course']);

          
            
            if(empty($course)){
                $session->msg('d','Course can\'t be empty.');
          redirect('edit-college.php', false);
            }else{
                $course = remove_junk($db->escape($course));
            }


            if(empty($col)){
                $session->msg('d','Name of school can\'t be empty.');
          redirect('edit-college.php', false);
            }else{
                $college = remove_junk($db->escape($col));
            }


            $query = "UPDATE college SET name_of_school = '$college', course = '$course' WHERE id = $id;";
            if($db->query($query)){
               $session->msg('s','College education successfuly updated.');
          redirect('edit-college.php?id='.$id, false);
            }

          }


if(isset($_POST['delete'])){


    $query = "DELETE FROM college WHERE id = '$id';";
     if($db->query($query)){
               $session->msg('s','College education successfuly deleted.');
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
$query = "SELECT * FROM college WHERE id = '$id';";
$result = $db->query($query);
$info = $result->fetch_assoc();
?>

<div class="container">
  <div class="row">

  <div class="col-md-5 mt-2 mb-2" style="margin: auto;">
<?php echo display_msg($msg);  ?>
</div>

  <div class="col-xl-10 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
    <form method="post" action="edit-college.php?id=<?php echo $id; ?>">
    <div class="col-md-12 mb-5 text-center">
      <h4>College education</h4>
    </div>

<div class="row mb-2">
         <div class="col-2">
        <label>Name of School</label>
      </div>
      <div class="col-10 ">
        <input class="col-10 " type="text" name="educ_college" value="<?php echo $info['name_of_school'] ; ?>">
      </div>
      </div>

       <div class="row mb-2">
         <div class="col-2">
        <label>Course</label>
      </div>
      <div class="col-10 ">
        <input class="col-10 " type="text" name="course" value="<?php echo $info['course'] ; ?>">
        
      </div>
      </div>
     
      <div class="col-10 mt-5">
        <div class="row">
        <div class="col-2">
        <button type="submit" name='update' class="btn btn-sm btn-success" >Update</button>
      </div>


      <div class="col-2">
        <button type="submit" name='delete' class="btn btn-sm btn-danger confirm">Delete</button></div>
      </div>
    </div>
    
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
