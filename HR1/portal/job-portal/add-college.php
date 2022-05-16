<?php
  ob_start();
  require_once('includes/load.php');

 


$id = $_SESSION['applicant_id'];
$error = "";
$namef = "";
$coursef = "";

if(isset($_POST['add'])){


$col = trim($_POST['educ_college']);
$course = trim($_POST['course']);

$col = $_POST['educ_college'];
$course = $_POST['course'];



          
            
            if(empty($course)){
                $error ='Course can\'t be empty.';
         
            }else{
                $course = remove_junk($db->escape($course));
            }


            if(empty($col)){
                $error = 'Name of school can\'t be empty.';
          
            }else{
                $college = remove_junk($db->escape($col));
            }

if(empty($error)){
            $query = "INSERT INTO college (applicant_id,name_of_school,course) VALUES ('$id','$college','$course')";
            if($db->query($query)){
               $session->msg('s','College education added.');
          redirect('profile.php', false);
            }

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

 <?php   if(strlen($error) >0){  
                            

                            echo "<div class=\"alert alert-danger text-center col-md-6 mb-3\" style=\"margin:auto\">";
                            echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\"></a>";
                            echo $error; 
                            
                            
                            
                            
                            echo  "</div>";}
                       
                           
  ?>

  <div class="col-xl-10 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
    <form method="post" action="add-college.php">
    <div class="col-md-12 mb-5 text-center">
      <h4>College education</h4>
    </div>

<div class="row mb-2">
         <div class="col-2">
        <label>Name of School</label>
      </div>
      <div class="col-10 ">
        <input class="col-10 " type="text" name="educ_college" value="<?php echo $namef ; ?>">
      </div>
      </div>

       <div class="row mb-2">
         <div class="col-2">
        <label>Course</label>
      </div>
      <div class="col-10 ">
        <input class="col-10 " type="text" name="course" value="<?php echo $coursef; ?>">
        
      </div>
      </div>
     
      <div class="col-10 mt-5">
        <div class="row">
        <div class="col-2">
        <button type="submit" name='add' class="btn btn-sm btn-success" style="width:100px;">Add</button>
      </div>


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
