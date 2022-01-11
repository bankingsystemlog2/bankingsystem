<?php
  $page_title = 'Reservation Form';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  //sample changes
  $groups = find_all('v_res');
  $fleet = find_all('v_info');
  $users_id = current_user()['id'];
?>
<?php
  if(isset($_POST['vehicle_reservation_form'])){

   $req_fields = array('emp_id,res_time,s_date,r_deadline');
   validate_fields($req_fields);

   if(empty($errors)){
       $emp_id   = remove_junk($db->escape($_POST['emp_id']));
       $emp_pos   = remove_junk($db->escape($_POST['emp_pos']));
       $res_time   = remove_junk($db->escape($_POST['res_time']));
       $s_date   = remove_junk($db->escape($_POST['s_date']));
       $r_deadline   = remove_junk($db->escape($_POST['r_deadline']));
       $fleetid   = remove_junk($db->escape($_POST['fleetid'])); 
        $query = "INSERT INTO v_res (";
        $query .="emp_id,emp_pos,res_time,s_date,r_deadline,fleetid";
        $query .=") VALUES (";
        $query .="'{$emp_id}', '{$emp_pos}', '{$res_time}', '{$s_date}', '{$r_deadline}', '{$fleetid}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Application form sent! ");
          redirect('fleet_addvehicle.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry Application form failed to send!');
          redirect('fleet_addvehicle.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('fleet_addvehicle.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add Application</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="fleet_addvehicle.php" autocomplete="off">
            <div class="form-group">
                <label for="v_category">Category</label>
                <select class="form-control" name="v_category" placeholder="v_category">
                  <option <?php if('v_category')  echo 'selected="selected"';?>value="3">ARMORED VEHICLE</option>
                  <option <?php if('v_category')  echo 'selected="selected"';?>value="2">VAN</option>
                  <option <?php if('v_category')  echo 'selected="selected"';?>value="1">CAR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="v_model">Model</label>
                <input type="text" class="form-control" name ="v_model"  placeholder="v_model">
            </div>
            <div class="form-group">
                <label for="v_year">Year</label>
                <input type="text" class="form-control" name ="v_year"  placeholder="v_year">
            </div>
            <div class="form-group">
                <label for="v_color">Color</label>
                <input type="text" class="form-control" name ="v_color"  placeholder="v_color">
            </div>
            <div class="form-group">
                <label for="v_regnum">Registration Number</label>
                <input type="text" class="form-control" name ="v_regnum"  placeholder="v_regnum">
            </div>
            <div class="form-group">
                <label for="v_serialnum">Serial Number</label>
                <input type="text" class="form-control" name ="v_serialnum"  placeholder="v_serialnum">
            </div>
            <div class="form-group">
                <label for="v_capacity">Maximum Capacity</label>
                <input type="text" class="form-control" name ="v_capacity"  placeholder="v_capacity">
            </div>
            <div class="form-group">
                <label for="v_datepur">Date of Purchase</label>
                <input type="text" class="form-control" name ="v_datepur"  placeholder="v_datepur">
            </div>
            <div class="form-group">
                <label for="v_manu">Manufacturer</label>
                <input type="text" class="form-control" name ="v_manu"  placeholder="v_manu">
            </div>
            <div class="form-group">
                <label for="v_enginetype">Engine Type</label>
                <input type="text" class="form-control" name ="v_enginetype"  placeholder="v_enginetype">
            </div>
            <div class="form-group">
                <label for="v_loc">Location of purchase</label>
                <input type="text" class="form-control" name ="v_loc"  placeholder="v_loc">
            </div>
            <div class="form-group">
                <label for="v_fueltype">Fuel Type</label>
                <input type="text" class="form-control" name ="v_fueltype"  placeholder="v_fueltype">
            </div>
            <div class="form-group">
                <label for="v_fuelcap">Fuel Capacity</label>
                <input type="text" class="form-control" name ="v_fuelcap"  placeholder="v_fuelcap">
            </div>
            <div class="form-group">
                <label for="v_license">License</label>
                <input type="text" class="form-control" name ="v_license"  placeholder="v_license">
            </div>
            <div class="form-group">
                <label for="v_condition">Condition</label>
                <input type="text" class="form-control" name ="v_condition"  placeholder="v_condition">
            </div>
            <div class="form-group">
                <label for="v_avail">Availability</label>
                <input type="text" class="form-control" name ="v_avail"  placeholder="v_avail">
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="fleet_addvehicle" class="btn btn-success">Submit</button>              
            </div>
            
        </form>
        
        <a href="admin.php"><button type="submit" name="fleet_addvehicle" class="btn btn-danger">Home</button></a>
        <a href="applicant_edit.php"><button type="submit" name="fleet_addvehicle" class="btn btn-success">edit submittion</button></a>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
