<?php
  ob_start();
  require_once('includes/load.php');


$id = $_GET['id'];

if(isset($_POST['update'])){

	$old_pass = trim($_POST['old_password']);
	$new_pass = trim($_POST['new_password']);

		  if(empty($old_pass)){
        	$session->msg('d','Old password can\'t be empty.');
          redirect('change-pass.php?id='.$id, false);
        }else{
        	$old_password = sha1($old_pass);
        }

        if(empty($new_pass)){
        	$session->msg('d','New password can\'t be empty.');
          redirect('change-pass.php?id='.$id, false);
        }elseif(strlen($new_pass)<=7){
        	$session->msg('d','New password must be 8 character and above.');
          redirect('change-pass.php?id='.$id, false);
        }elseif(!preg_match("#[0-9]+#", $new_pass)){
        	$session->msg('d','New password must contain numbers.');
          redirect('change-pass.php?id='.$id, false);
        }elseif(!preg_match("#[A-Z]+#", $new_pass)){
        	$session->msg('d','New password must contain Capital Letters.');
          redirect('change-pass.php?id='.$id, false);
        }elseif(!preg_match("/[\'^£$%&*()}{@#~?><>!.,|=_+¬-]/", $new_pass)){
        	$session->msg('d','New password must contain special characters.');
          redirect('change-pass.php?id='.$id, false);
        }else{
            $new_pass = remove_junk($db->escape($new_pass));
            $new_password= sha1($new_pass);
        }
        
	$sql = "SELECT password FROM applicants WHERE applicant_id = '$id';";
	$result = $db->query($sql);
	$pass_comparator = $result->fetch_assoc();
	if($old_password === $pass_comparator['password']){
		$sql = "UPDATE applicants SET password = '$new_password';";
		if($db->query($sql)){
			$session->msg('s','Password changed.');
          redirect('change-pass.php?id='.$id, false);
		}
	}else{
		$session->msg('d','Old password is incorrect.');
          redirect('change-pass.php?id='.$id, false);
	}
} 
  ?>
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



 
  <div class="col-xl-10 mx-auto rounded-3 mb-3 "  style="border-left: 5px solid #0076Be; padding-left: 5%; margin-top: 7%">
    <?php echo display_msg($msg);  ?>
<div class="col-md-12 mb-5 " style="margin-left: 23%;">
      <h4>Change password</h4>
    </div>
    <?php   ?>
<form method="post" action="change-pass.php?id=<?php echo $id; ?>">
 <div class="row mb-3">
        <div class="col-2">
        <label>Old password</label>
      </div>
      <div class="col-7">
        <input class="col-7" type="password" name="old_password" >
      </div>
      </div>

       <div class="row mb-3">
        <div class="col-2">
        <label>New password</label>
      </div>
      <div class="col-7">
        <input class="col-7" type="password" name="new_password" >
      </div>
      </div>
       <div class="row mb-3">
       <button type="submit" name="update" class="btn btn-sm btn-success mb-3" style="width: 100px;">Submit</button>
      </div>
     
  </div>
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