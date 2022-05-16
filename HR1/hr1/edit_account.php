<?php
  $page_title = 'Edit Account';
  require_once('includes/load.php');
   page_require_level(1);
?>
<?php $user = current_user(); ?>

<?php
//update user image
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $user_id = (int)$_POST['user_id'];
  $photo->upload($_FILES['file_upload']);
  if($photo->process_user($user_id)){
    $session->msg('s','photo has been uploaded.');
    redirect('edit_account.php');
    } else{
      $_SESSION['status'] =$photo->errors;
      $_SESSION['status_code'] ="error";
      redirect('edit_account.php');
    }
  }
?>
<?php
 //update user other info
  if(isset($_POST['update'])){
    $req_fields = array('name','username' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$_SESSION['user_id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
    $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
             $_SESSION['status'] ="Account updated";
            $_SESSION['status_code'] ="success";
            redirect('edit_account.php', false);
          } else {
            $_SESSION['status'] = "Failed to update";
            $_SESSION['status_code'] = "error";
            redirect('edit_account.php', false);
          }
    } else {
    
      $_SESSION['status'] = $errors;
      $_SESSION['status_code'] = "error";
      redirect('edit_account.php',false);
    }
  }
//Change password---------------------------------------------------------------
  if(isset($_POST['change_password'])){

    $req_fields = array('new-password','old-password','id' );
    validate_fields($req_fields);

    if(empty($errors)){

             if(sha1($_POST['old-password']) !== current_user()['password'] ){
               $_SESSION['status'] = "Your old password does not match";
            $_SESSION['status_code'] = "error";
               redirect('edit_account.php',false);
             }

            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['new-password'])));
            $sql = "UPDATE users SET password ='$new' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $_SESSION['status'] = "Login with your new password";
            $_SESSION['status_code'] = "success";
                  redirect('../../index.php', false);
                else:
                  $_SESSION['status'] = "Sorry failed to update";
            $_SESSION['status_code'] = "error";
                  redirect('edit_account.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('edit_account.php',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>


<div class="row">
  <div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav class="breadcrumbs">
            <?php if ($user['user_level'] === '1'): ?>
              <a href="manager.php" class="breadcrumbs__item">Home</a>
            <?php elseif ($user['user_level'] === '2'): ?>
             <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
            <?php endif; ?>
             <a href="profile.php?id=<?php echo (int)$user['id'];?>" class="breadcrumbs__item">Profile</a>
            <a href="#checkout" class="breadcrumbs__item is-active">Edit Profile</a>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row">
            <div class="col-md-12">
              <?php echo display_msg($msg); ?>
            </div>
          </div>

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <span class="glyphicon glyphicon-camera"></span>
                  <h6 class="text-center">Change My photo</h6>
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="uploads/users/<?php echo $user['image'];?>" alt="Admin" class="rounded-circle" width="140">
                    <div class="mt-3">

                      <form class="form" action="edit_account.php" method="POST" enctype="multipart/form-data">
                      <div class="input-group mb-3">
                        <div class="form-group">
                          <input type="file" name="file_upload" multiple="multiple" class="btn btn-secondary btn-file"/>
                        </div>
                      </div>
                      <input type="hidden" name="user_id" value="<?php echo $user['id'];?>">
                       <button type="submit" name="submit" class="btn btn-outline-success">Change</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <form method="post" action="edit_account.php?id=<?php echo (int)$user['id'];?>" class="clearfix">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-5 text-secondary">
                     <input type="name" class="form-control shadow-none" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-5 text-secondary">
                      <input type="text" class="form-control shadow-none" name="username" value="<?php echo remove_junk(ucwords($user['username'])); ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Change Password
                    </button> &nbsp;
                      <button type="submit" name="update" class="btn btn-info">Update</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel" style="Color:white">Change password</h5>
                      <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="edit_account.php" class="clearfix">
                      <div class="form-group">
                            <label for="newPassword" class="control-label">New password</label>
                            <input type="password" class="form-control" name="new-password" placeholder="New password" required>
                      </div>
                      <br>
                      <div class="form-group">
                            <label for="oldPassword" class="control-label">Old password</label>
                            <input type="password" class="form-control" name="old-password" placeholder="Old password" required>
                      </div>
                    </div>
                    <div class="modal-footer bg-secondary">
                      <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                       <button type="Submit" name="change_password" class="btn btn-success"><i class="fas fa-check"></i> Change password</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


         <!--     <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->



            </div>
          </div>

        </div>
    </div>

</div>


<?php include_once('layouts/footer.php'); ?>
