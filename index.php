<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) {

    $current_user = current_user();

    $userlevel=$current_user['user_level'];
    $userDept=$current_user['Department'];

   switch ([$userlevel, $userDept]) {
     case ['1', 'SuperAdmin']:
      redirect('home.php', false);
       break;

       case ['1', 'Finance'];
       redirect('Finance/home.php', false);
         break;
         
        case ['1', 'HR1'];
         redirect('HR1/hr1/manager.php', false);
          break;

     default:

       break;
   }
  }
?>
<?php include_once('layouts/header.php'); ?>



<div class="container containerLog">
      <?php echo display_msg($msg); ?>
      <div class="wrapper wrapperLog">
        <div class="title"><span>Welcome <p>Sign in to start your session</p></span> </div>
        <form class="clearfix" method="post" action="auth_v2.php">
          <div class="row">
            <i class="bi bi-person-circle"></i>
            <input type="name" class="form-control" name="username" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="bi bi-lock-fill"></i>
            <input type="password" name= "password" class="form-control" placeholder="password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <button type="submit" style="border-radius:0%">Login</button>
          </div>
          <div class="signup-link">All rights reserved. <a href="#">AABank</a></div>
        </form>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
