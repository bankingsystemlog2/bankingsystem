<?php 
  $page_title = 'Add Vehicle Form';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  //sample changes
  page_require_level(1);
  $groups = find_all('v_info');
  $users_id = current_user()['id'];
?>
<?php
  if(isset($_POST['fleet_addvehicle'])){
    $fleetimg1 = $_FILES['fleetimg'];

    $fileName = $_FILES['fleetimg']['name'];
    $fileTmpName = $_FILES['fleetimg']['tmp_name'];
    $fileSize = $_FILES['fleetimg']['size'];
    $fileError = $_FILES['fleetimg']['error'];
    $fileType = $_FILES['fleetimg']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','gif');
    $req_fields = array('v_category', 'v_model', 'v_year', 'v_color', 'v_regnum', 'v_serialnum', 'v_capacity', 'v_datepur', 'v_manu', 'v_enginetype', 'v_loc', 'v_fueltype', 'v_fuelcap', 'v_license', 'v_condition', 'v_avail');
    validate_fields($req_fields);
    if($fileSize <= 100000000){
      $fileNameNew = uniqid('',true).".".$fileActualExt;
      $fileDestination = 'uploads/'.$fileNameNew;
      move_uploaded_file($fileTmpName, $fileDestination);
      if(empty($errors)){
        $v_category   = remove_junk($db->escape($_POST['v_category']));
        $v_model   = remove_junk($db->escape($_POST['v_model']));
        $v_year   = remove_junk($db->escape($_POST['v_year']));
        $v_color   = remove_junk($db->escape($_POST['v_color']));
        $v_regnum   = remove_junk($db->escape($_POST['v_regnum']));
        $v_serialnum   = remove_junk($db->escape($_POST['v_serialnum'])); 
        $v_capacity   = remove_junk($db->escape($_POST['v_capacity']));
        $v_datepur   = remove_junk($db->escape($_POST['v_datepur']));
        $v_manu   = remove_junk($db->escape($_POST['v_manu']));
        $v_enginetype   = remove_junk($db->escape($_POST['v_enginetype']));
        $v_loc   = remove_junk($db->escape($_POST['v_loc'])); 
        $v_fueltype   = remove_junk($db->escape($_POST['v_fueltype']));
        $v_fuelcap   = remove_junk($db->escape($_POST['v_fuelcap']));
        $v_license   = remove_junk($db->escape($_POST['v_license']));
        $v_condition   = remove_junk($db->escape($_POST['v_condition']));
        $v_avail   = remove_junk($db->escape($_POST['v_avail'])); 
        $fleetimg  = remove_junk($db->escape($_POST['fleetimg'])); 
          $query = "INSERT INTO v_info (";
          $query .="v_category,v_model,v_year,v_color,v_regnum,v_serialnum,v_capacity,v_datepur,v_manu,v_enginetype,v_loc,v_fueltype,v_fuelcap,v_license,v_condition,v_avail,fleetimg";
          $query .=") VALUES (";
          $query .="'{$v_category}', '{$v_model}', '{$v_year}', '{$v_color}', '{$v_regnum}', '{$v_serialnum}', '{$v_capacity}', '{$v_datepur}', '{$v_manu}', '{$v_enginetype}', '{$v_loc}', '{$v_fueltype}', '{$v_fuelcap}', '{$v_license}', '{$v_condition}', '{$v_avail}','{$fleetimg}'";
          $query .=")";
          if($db->query($query)){
            //success
            $session->msg('s',"Application form sent! ");
            redirect('fleet.php?uploadsuccess', false);
          } 
          else {
            //failed
            $session->msg('d',' Sorry Application form failed to send!');
            redirect('fleet_addvehicle.php?1', true);
          }
      }
      else {
        $session->msg("d", $errors);
        redirect('fleet_addvehicle.php?4',true);
     }
    }
    else{
      $session->msg('s',"Your file is too big! ");
      redirect('fleet_addvehicle.php?2', true);
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
                <label for="v_category">Category</label>
                <select class="form-control" name="v_category" placeholder="v_category">         
                  <option disable selected value> -- select an option -- </option>         
                  <option <?php if('v_category');?>value="3">ARMORED VEHICLE</option>
                  <option <?php if('v_category');?>value="2">VAN</option>
                  <option <?php if('v_category');?>value="1">CAR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="v_model">Model</label>
                <input type="text" class="form-control" name ="v_model"  placeholder="Car Model">
            </div>
            <div class="form-group">
                <label for="v_year">Year model</label>
                <input type="number" maxLength = "4" class="form-control" value = "2000"name ="v_year"  placeholder="Model year">
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
                <label for="v_avail">Availability</label>
                <select class="form-control" name ="v_avail"  placeholder="Availability">
                  <option disable selected value> -- select an option -- </option>
                  <option value="1">Available</option>
                  <option value="2">Unavailable</option>
                  <option value="3">Under Maintenance</option>
                </select>
            </div>
            <div class="input-group">
              <label for="v_avail">Vehicle Image</label>
              <span class="input-group-btn">
                <input type="file" accept=".jpg,.jpeg,.png,.gif" name="fleetimg" multiple="multiple" class="btn btn-primary btn-file"/>
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