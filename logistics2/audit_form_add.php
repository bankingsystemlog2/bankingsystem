<?php 
  $page_title = 'Add Vehicle Form';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  //sample changes
  $user_id = current_user()['id'];
  $conn = mysqli_connect("localhost", "root", "", "bank");
  $employees = "SELECT * FROM employees INNER JOIN users ON employees.employee_id = users.employee_id WHERE users.id = ".$user_id;
  $employees1 = mysqli_query($conn, $employees);
  $employee = mysqli_fetch_array($employees1);
  $postasset = $_POST['asset'];
?>
<?php
  if(isset($_POST['applicationform'])){
    header('Content-Type: text/plain; charset=utf-8');

   $req_fields = array('asset','stated_amount','actual_amount');
   validate_fields($req_fields);
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if(empty($errors)){
       $asset   = remove_junk($db->escape($_POST['asset']));
       $datecreated   =  date('Y-m-d');
       // remove_junk($db->escape(date('Y-m-d', strtotime($_POST['date_created']))));
       $preparedby   = remove_junk($db->escape($_POST['auditor']));
        $query = "INSERT INTO auditor_done (";
        $query .="task,date_created,preparedby,urlpath";
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
                <label for="v_model">Task</label>
                <input type="text" class="form-control" name ="asset" value="<?php echo $postasset;?>" readonly>
            </div>
            <div class="form-group">
                <label for="v_year">Year model</label>
                <input type="tel" maxlength = "4" class="form-control" value = "2000"name ="v_year"  placeholder="Model year">
            </div>
            <div class="form-group">
                <label for="v_color">Color</label>
                <input type="text" class="form-control" name ="v_color"  placeholder="Car Color">
            </div>
            <div class="form-group">
                <label for="v_regnum">Registration Number</label>
                <input type="text" class="form-control" name ="v_regnum"  placeholder="Registration Number">
            </div>
            <div class="form-group">
                <label for="v_serialnum">Serial Number</label>
                <input type="text" class="form-control" name ="v_serialnum"  placeholder="Serial Number">
            </div>
            <div class="form-group">
                <label for="v_capacity">Maximum Capacity</label>
                <input type="number" class="form-control" name ="v_capacity"  placeholder="Car Capacity">
            </div>
            <div class="form-group">
                <label for="v_datepur">Date of Purchase</label>
                <input type="date" class="form-control" name ="v_datepur"  placeholder="Date Purchased">
            </div>
            <div class="form-group">
                <label for="v_manu">Manufacturer</label>
                <input type="text" class="form-control" name ="v_manu"  placeholder="Manufacturer">
            </div>
            <div class="form-group">
                <label for="v_enginetype">Transmission</label>
                <select class="form-control" name ="v_enginetype"  placeholder="Automatic or Manual">
                  <option disable selected value> -- select an option -- </option>
                  <option value="Automatic">Automatic</option>
                  <option value="Manual">Manual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="v_loc">Location of purchase</label>
                <input type="text" class="form-control" name ="v_loc"  placeholder="Location of purchase">
            </div>
            <div class="form-group">
                <label for="v_fueltype">Fuel Type</label>
                <select class="form-control" name ="v_fueltype"  placeholder="Fuel Type">
                  <option disable selected value> -- select an option -- </option>
                  <option value="Gasoline">Gasoline</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Bio-diesel">Bio-diesel</option>
                  <option value="Ethanol">Ethanol</option>
                </select>
            </div>
            <div class="form-group">
                <label for="v_fuelcap">Fuel Capacity</label>
                <input type="text" class="form-control" name ="v_fuelcap"  placeholder="Fuel Capacity">
            </div>
            <div class="form-group">
                <label for="v_license">License</label>
                <input type="text" class="form-control" name ="v_license"  placeholder="License">
            </div>
            <div class="form-group">
                <label for="v_condition">Condition</label>
                <select class="form-control" name ="v_condition"  placeholder="Car Condition">
                  <option disable selected value> -- select an option -- </option>
                  <option value="Excellent">Excellent</option>
                  <option value="Good">Good</option>
                  <option value="Bad">Bad</option>
                  <option value="Unusable">Unusable</option>
                </select>
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
