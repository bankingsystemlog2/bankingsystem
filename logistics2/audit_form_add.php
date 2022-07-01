<?php 
  $page_title = 'Add Vehicle Form';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  //sample changes
  $user_id = current_user()['id'];
  $employee_id = current_user()['employee_id'];
  $employee_name = current_user()['name'];
  $postasset = $_POST['asset'];
  if(isset($_POST['asset'])){}
  else{
    $session->msg('s',"Asset error");
    redirect('audit_tasks.php',false);}
?>
<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   $req_fields = array('asset');
   validate_fields($req_fields);
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if(empty($errors)){
       $asset   = remove_junk($db->escape($_POST['asset']));
       $datecreated   =  date('Y-m-d');
       $remarks = remove_junk($db->escape($_POST['remarks']));
       // remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_created']))));
       $preparedby   = remove_junk($db->escape($_POST['auditor']));
        $query = "INSERT INTO auditor_done (";
        $query .="task_audited,date_created,auditor,filepath,remarks,status";
        $query .=") VALUES (";
        $query .="'{$asset}', '{$datecreated}', '{$preparedby}','{$target_file}'";
        $query .=")";


    
        if($db->query($query)){
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
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
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
    <a href="fleet.php" class="breadcrumbs__item">Vehicle Information</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Vehicle Form</a>
</nav>
<!-- /Breadcrumb -->
  <div class="row">
  <?php echo display_msg($msg); ?>
    <div class="col-sm-6 mx-auto">
      <div class="card-header bg-dark">
      <span style="color:White"><i class="bi bi-person-plus-fill"></i> Add new vehicle</span>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="fleet_addvehicle.php" autocomplete="off">
            <div class="form-group">
                <input type="hidden" class="form-control" name ="v_color"  placeholder="Car Color">
            </div>
            <div class="form-group">
                <label for="v_model">Task</label>
                <input type="hidden" class="form-control" value = "<?php echo $employee_id;?>" name ="auditor"  readonly>
                <input type="hidden" class="form-control" name ="asset" value="<?php echo $postasset;?>" readonly>
            </div>
            <div class="form-group">
                <label for="v_year">Auditor</label>
                <input type="text" class="form-control" value = "<?php echo $employee_name;?>" name ="auditor1"  readonly>
            </div>
            <div class="form-group">
                <label for="v_year">Audit Task</label>
                <input type="text" class="form-control" name ="asset1" value="<?php echo $postasset;?>" readonly>
            </div>
            <div class="form-group">
                <label for="v_avail">Status</label>
                <select class="form-control" name ="status"  placeholder="Availability">
                  <option disable selected value> -- select an option -- </option>
                  <option value="1">Unqualified</option>
                  <option value="2">Qualified</option>
                  <option value="3">Adverse</option>
                  <option value="4">Disclamer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="v_year">Remarks</label>
                <textarea class="form-control" name ="asset1"></textarea>
            </div>
            <div class="input-group">
              <label for="v_avail">Vehicle Image</label>
              <span class="input-group-btn">
                <input type="file" name="filepath" multiple="multiple" class="btn btn-primary btn-file"/>
              </span>
            </div> 
            <div class="form-group clearfix">
              <button type="submit" name="fleet_addvehicle" class="btn btn-success">Submit</button>              
            </div>          
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
