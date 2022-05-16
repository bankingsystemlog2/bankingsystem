<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  $namePattern = "/^[a-zA-z ]+$/";
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password','level' );
   validate_fields($req_fields);

   if(!preg_match($namePattern, $_POST['full-name'])){
      $session->msg("d", "Enter a valid name");
      redirect('add_user.php',false);
   }

   if(strlen($_POST['username']) <= 7 ){
       $session->msg("d", "username must be 8 characters and above");
      redirect('add_user.php',false);
   }
   if(strlen($_POST['password']) <= 7){
     $session->msg("d", "password must be 8 characters and above");
      redirect('add_user.php',false);
    }
    if(!preg_match("#[0-9]+#",$_POST['password'])){
      $session->msg("d", "password must contain  numbers, capital letters and special characters.");
      redirect('add_user.php',false);
    }
    if(!preg_match("#[A-Z]+#",$_POST['password'])){
       $session->msg("d", "password must contain  numbers, capital letters and special characters.");
      redirect('add_user.php',false);
    }
    if(!preg_match('/[\'^£$%&*()}!{@#~?><>.,|=_+¬-]/',$_POST['password'])){
       $session->msg("d", "password must contain  numbers, capital letters and special characters.");
      redirect('add_user.php',false);
    }

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = (int)$db->escape($_POST['level']);
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"User account has been creted! ");
          redirect('add_user.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_user.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_user.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="manager.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="users.php" class="breadcrumbs__item">List of Users</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add user</a>
</nav>
<!-- /Breadcrumb -->

  <div class="row">
    <?php echo display_msg($msg); ?>
  <div class="col-sm-6 mx-auto">
    <div class="card-header bg-dark">
    <span style="color:White"><i class="bi bi-person-plus-fill"></i> Add new user</span>
  </div>
    <div class="card">
      <div class="card-body">
        <form method="post" action="add_user.php">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="full-name" placeholder="Full Name">
          </div>
          <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name ="password"  placeholder="Password">
          </div>
          <div class="form-group">
            <label for="level">User Role</label>
              <select class="form-control" name="level">
                <?php foreach ($groups as $group ):?>
                 <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
              <?php endforeach;?>
              </select>
          </div> <br>
          <div class="form-group clearfix">
            <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
          </div>
      </form>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
