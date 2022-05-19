<?php
  ob_start();
  require_once('includes/load.php');


   $applicant_id = $_SESSION['applicant_id'];

 

  if(isset($_POST['upload'])) {
  $photo = new Media();
  $user_id = (int)$applicant_id;
  $photo->upload($_FILES['dp']);
  if($photo->process_user($user_id)){
    $session->msg('s','photo has been uploaded.');
    redirect('profile.php?id='.$applicant_id);
    } else{
      $session->msg('d',join($photo->errors));
      redirect('profile.php?id='.$applicant_id);
    }
  }



  if(isset($_POST['delete'])){

    $sql = "UPDATE applicants SET profile_pic = '' WHERE applicant_id = '$applicant_id'";
    if($db->query($sql)){

      redirect('profile.php?id='.$applicant_id);
    
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
    <div class="col-xl-7 mx-auto mt-5 rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%;">
    <div class="col-md-12 mb-5 ">
      <h4>Change Profile picture </h4>
    </div>
    <form class="col-xl-12 mb-5" method="post" action="change-dp.php" enctype="multipart/form-data" id="form">
        <div class="row mb-3">
       
      <div class="col-12 mx-auto mb-5">
        <input class="col-7" type="file" name="dp" >
      </div>
       </div>
      <div class="col"><button type="submit" name='upload' class="btn btn-sm btn-success">Upload</button>
       <button onclick="bullshit()" name='delete' class="btn btn-sm btn-danger" style="margin-left: 10px;">Delete</button></div>
    </form> 
      </form>
      </div>
  </div>
</div>







</body>
        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script type="text/javascript">
          function bullshit() {

            var form = document.getElementById("form");
            var conf = confirm("Are you sure you want to delete your profile picture?");

            if(conf == true){
                form.submit();
            }else{
              form.preventDefault();
            }
          }
          
        </script>
       
        
    </body>
</html>

<?php }else{  $session->msg('d','Please login...');
            redirect('login.php', false); }?>