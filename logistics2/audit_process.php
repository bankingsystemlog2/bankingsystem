<?php
  $page_title = 'Audit Form';
  require_once('includes/load.php');
   page_require_level(1);
   global $db;
   $id = $_GET['id'];
   $sql = $db->query("SELECT * FROM audit WHERE id='{$id}' LIMIT 1");
          //if(
            $audit = $db->fetch_assoc($sql);
            //return $vendors;
?>
<?php
 //update user other info
 if(isset($_POST['update-audit'])) {
  $req_fields = array('title','sec_dep','date_created','preparedby','date_from','date_to','body','status');
  //validate_fields($req_fields);

  if(empty($errors)){
      $title   = remove_junk($db->escape($_POST['title']));
      $sectiondep   = remove_junk($db->escape($_POST['sec_dep']));
      $datecreated   = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_created']))));
      $preparedby   = remove_junk($db->escape($_POST['preparedby']));
      $datefrom   = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_from']))));
      $dateto = remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_to']))));
      $body   = remove_junk($db->escape($_POST['body']));
      $status   = remove_junk($db->escape($_POST['status']));
       $query = "UPDATE audit SET ";
       $query .="title = '{$title}',sec_dep = '{$sectiondep}',date_created = '{$datecreated}',preparedby = '{$preparedby}',date_from = '{$datefrom}',date_to = '{$dateto}',body = '{$body}',status = '{$status}'";
       $query .=" WHERE ";
       $query .="id = '{$id}'";


       
       if($db->query($query)){
         
         $session->msg('s',"Data has been save! ");
         redirect('audit_form.php', false);
       } else {
        
         $session->msg('d',' Sorry Data not saved!');
         redirect('audit_form.php', false);
       }
  } else {
    $session->msg("d", $errors);
     redirect('audit_form.php',false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="glyphicon glyphicon-edit"></span>
        <span>Audit Form</span>
      </div>
      <div class="panel-body">
          <form method="post" action="audit_process.php?id=<?php echo (int)$audit['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="title" class="control-label">Title</label>
                  <input type="text" class="form-control" name="title" value="<?php echo remove_junk(ucwords($audit['title'])); ?>">
            </div>
            <div class="form-group">
                  <label for="sectiondep" class="control-label">Section/Department</label>
                  <input type="text" class="form-control" name="sec_dep" value="<?php echo remove_junk(ucwords($audit['sec_dep'])); ?>">
            </div>
            <div class="form-group">
                  <label for="date_created" class="control-label">Date Created</label>
                  <input type="text" class="form-control" name="date_created" value="<?php echo remove_junk(ucwords($audit['date_created'])); ?>">
            </div>
            <div class="form-group">
            <label for="preparedby">Prepared by</label>
                    <select class="form-control" name="preparedby" placeholder="preparedby">
                    <option <?php if('preparedby')  echo 'selected="selected"';?>value="1">Staff</option>
                    <option <?php if('preparedby')  echo 'selected="selected"';?>value="0">Admin</option>
                    </select>
                </div>
            <div class="form-group">
                  <label for="date_from" class="control-label">Date From</label>
                  <input type="text" class="form-control" name="date_from" value="<?php echo remove_junk(ucwords($audit['date_from'])); ?>">
            </div>
            <div class="form-group">
                  <label for="date_to" class="control-label">Date To</label>
                  <input type="text" class="form-control" name="date_to" value="<?php echo remove_junk(ucwords($audit['date_to'])); ?>">
            </div>
            <div class="form-group">
                    <label for="body">Description</label>
                    <input type="text" class="form-control" name="body" value="<?php echo remove_junk(ucwords($audit['Body'])); ?>">
                </div>
            <?php if($_SESSION['user_id'] == '1'){?>
            <div class="form-group">
              <label for="status">Status</label>
                <select class="form-control" name="status">
                 <option <?php if($audit['status'] === '5') echo 'selected="selected"';?>value="5">Canceled</option>
                  <option <?php if($audit['status'] === '3') echo 'selected="selected"';?>value="3">Verified</option>
                </select>
            </div>
            <?php }?>
            <div class="form-group clearfix">
                    <button type="submit" name="update-audit" class="btn btn-info">Update</button>
            </div>
        </form>
        <div>
        <a href="audit_form.php"><button type="submit" name="cancel" class="btn btn-danger">Cancel</button></a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once('layouts/footer.php'); ?>
