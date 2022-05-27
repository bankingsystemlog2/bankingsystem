<?php
  $page_title = 'Contractor Interview Approval';
  require_once('includes/log2load.php');
   page_require_level(1);
   global $db;
   $id = $_GET['id'];
   $sql = $db->query("SELECT * FROM contractor_form WHERE id='{$id}' LIMIT 1");
            $vendors = $db->fetch_assoc($sql);
?>
<?php
 //update user other info
 if(isset($_POST['update-contractor1'])) {
    $req_fields = array('vendors_fname','vendors_mi','vendors_lname','vendors_address','vendors_email','vendors_contact');
   // validate_fields($req_fields);
    if(empty($errors)){
             $vendors_id   = remove_junk($db->escape($_POST['id']));
             $vendors_fname   = remove_junk($db->escape($_POST['vendors_fname']));
             $vendors_mi   = remove_junk($db->escape($_POST['vendors_mi']));
             $vendors_lname   = remove_junk($db->escape($_POST['vendors_lname']));
             $vendors_address   = remove_junk($db->escape($_POST['vendors_address']));
             $vendors_email   = remove_junk($db->escape($_POST['vendors_email']));
             $vendors_contact  = remove_junk($db->escape($_POST['vendors_contact']));
             $vendors_status   = remove_junk($db->escape($_POST['vendors_status'])); 
             $sql = "UPDATE contractor_form SET vendors_fname ='{$vendors_fname}', vendors_mi ='{$vendors_mi}', vendors_lname ='{$vendors_lname}', vendors_address ='{$vendors_address}', vendors_email ='{$vendors_email}', vendors_contact ='{$vendors_contact}', vendors_status='{$vendors_status}' WHERE id= '$vendors_id'";
             $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Application updated ");
              // for Audit Log
              // $link = $_SERVER[PHP_SELF'];
              // $link_array = explode('/',$link);
              // $page = end($link_array);
              // $now =  date('Y-m-d H:i:s');

              // $sqlAudit = "INSERT INTO `audit_logs`(`module`, `action_taken`, `users_id`, `datetime_created`) values ('{$page }',' Record has been Update where vendor is {$name}','{$_SESSION['user_id']}','{$now}' )";
              // $db->query($sqlAudit);
              //sample

              // Variables nyo
              // $link = $_SERVER['PHP_SELF'];
              // $link_array = explode('/',$link);
              // $page = end($link_array);
              // $variable4 = $_POST[id for file]
              // $now = date('Y-m-d H:i:s');

              //$sqlDocumentTracking = "INSERT INTO `docu_tracking`( `Action`, `users_id`, `Location`, `Document_Subject`, `Date_Created`) VALUES ('"(action)" to {$variable1}','{$_SESSION['user_id']}','{$page}','{$variable4}','{$now}')";
              // $db->query($sqlDocumentTracking);

              



          //end AuditLog Insert
            redirect('approval_interview.php', false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('approval_interview.php', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('approval_interview.php',false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="glyphicon glyphicon-edit"></span>
        <span>Application Form</span>
      </div>
      <div class="panel-body">
          <form method="post" action="contractor_approval.php" class="clearfix">
          <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $vendors['id']; ?>"readonly>
            </div>
          <div class="form-group">
                  <label for="name" class="control-label">First name</label>
                  <input type="name" class="form-control" name="vendors_fname" value="<?php echo $vendors['vendors_fname']; ?>"readonly>
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Middle Initial</label>
                  <input type="name" class="form-control" name="vendors_mi" value="<?php echo $vendors['vendors_mi']; ?>"readonly>
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Last name</label>
                  <input type="name" class="form-control" name="vendors_lname" value="<?php echo $vendors['vendors_lname']; ?>"readonly>
            </div>
            <div class="form-group">
                  <label for="address" class="control-label">Address</label>
                  <input type="text" class="form-control" name="vendors_address" value="<?php echo remove_junk(ucwords($vendors['vendors_address'])); ?>"readonly>
            </div>
            <div class="form-group">
                  <label for="email" class="control-label">Email</label>
                  <input type="text" class="form-control" name="vendors_email" value="<?php echo remove_junk(ucwords($vendors['vendors_email'])); ?>"readonly>
            </div>
            <div class="form-group">
                  <label for="phone" class="control-label">Contact #</label>
                  <input type="tel" class="form-control" name="vendors_contact" value="<?php echo remove_junk(ucwords($vendors['vendors_contact'])); ?>"readonly>
            <div class="form-group">
              <label for="vendors_status">Status</label>
                <select class="form-control" name="vendors_status">
                  <option <?php if($vendors['vendors_status'] === 'Approved') echo 'selected="selected"';?>value="Approved">Approved</option>
                  <option <?php if($vendors['vendors_status'] === 'Rejected') echo 'selected="selected"';?>value="Rejected">Rejected</option>
                  <option <?php if($vendors['vendors_status'] === 'Pending') echo 'selected="selected"';?>value="Pending">Pending</option>
                </select>
            </div>
            <div>
              <br>
            <button type="submit" name="update-contractor1" class="btn btn-info">Update</button></a>
            <a href="approval_interview.php" name="update-contractor" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once('layouts/footer.php'); ?>