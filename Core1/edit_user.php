<?php
  $page_title = 'Edit User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('users',(int)$_GET['id']);
  $groups  = find_all('user_groups');
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('users.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('name','username','level');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
          $level = (int)$db->escape($_POST['level']);
       $status   = remove_junk($db->escape($_POST['status']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
// Update user password
if(isset($_POST['update-pass'])) {
  $req_fields = array('password');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_user['id'];
     $password = remove_junk($db->escape($_POST['password']));
     $h_pass   = sha1($password);
          $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"User password has been updated ");
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        } else {
          $session->msg('d',' Sorry failed to updated user password!');
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('edit_user.php?id='.(int)$e_user['id'],false);
  }
}

?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '2'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '3'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
   <a href="users.php" class="breadcrumbs__item">List Of Users</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit User</a>
</nav>
<!-- /Breadcrumb -->
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>

 <!--  start of edit card form -->
 <section>
   <div class="row">
     <div class="col-md-8 mb-4">
       <div class="card mb-4">
         <div class="card-header py-3">
           <h5 class="mb-0"><i class="bi bi-person-badge"></i> Update <?php echo remove_junk(ucwords($e_user['name'])); ?> Account</h5>
         </div>
         <div class="card-body">
           <form method="post" action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
             <!-- 2 column grid layout with text inputs for the first and last names -->
             <div class="row mb-4">
               <div class="col">
                 <div class="form-outline">
                   <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($e_user['name'])); ?>">
                   <label class="form-label" for="form6Example1">Full Name</label>
                 </div>
               </div>
               <div class="col">
                 <div class="form-outline">
                   <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_user['username'])); ?>">
                   <label class="form-label" for="form6Example2">Username</label>
                 </div>
               </div>
             </div>
             <hr class="my-4" />
             <hr class="my-4" />

             <h5 class="mb-4">More details</h5>

             <div class="row mb-4">
               <div class="col">
                 <div class="form-outline">
                   <select class="form-control" name="level">
                     <?php foreach ($groups as $group ):?>
                      <option <?php if($group['group_level'] === $e_user['user_level']) echo 'selected="selected"';?> value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                   <?php endforeach;?>
                   </select>
                   <label class="form-label" for="formNameOnCard">User Role</label>
                 </div>
               </div>
                <div class="col">
                 <div class="form-outline">
                       <select class="form-control" name="status">
                         <option <?php if($e_user['status'] === '1') echo 'selected="selected"';?>value="1">Active</option>
                         <option <?php if($e_user['status'] === '0') echo 'selected="selected"';?> value="0">Deactive</option>
                       </select>
                       <label for="status">Status</label>
                 </div>
               </div>
             </div>

             <div class="form-group clearfix">
                     <button type="submit" name="update" class="btn btn-info">Update</button>
             </div>
           </form>
         </div>
       </div>
     </div>

  <!-- Change password form -->
     <div class="col-md-4 mb-4">
       <div class="card mb-4">
         <div class="card-header py-3">
           <h5 class="mb-0"><i class="bi bi-file-lock2-fill"></i> Change <?php echo remove_junk(ucwords($e_user['name'])); ?> password</h5>
         </div>
         <div class="card-body">
           <div class="row mb-4">
              <form action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" method="post" class="clearfix">
             <div class="col">
               <div class="form-outline">
                <input type="password" class="form-control" name="password" placeholder="Type user new password" required> <br>
               </div>
             </div>
               <button type="submit" name="update-pass" class="btn btn-danger pull-right">Change</button>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End of card form -->

<?php include_once('layouts/footer.php'); ?>
