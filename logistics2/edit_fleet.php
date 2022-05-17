<?php
  $page_title = 'Edit User';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_fleet = find_by_idf('v_info',(int)$_POST['id']);
  $groups  = find_all('user_groups');
  if(!$e_fleet){
    $session->msg("d","Missing user id.");
    redirect('users.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('v_category','v_model','v_year');
    validate_fields($req_fields);
    if(empty($errors)){
      $fleetid = (int)$e_fleet['fleetid'];
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
          $sql = "UPDATE v_info SET v_category ='{$v_category}', v_model ='{$v_model}',v_year='{$v_year}',v_color='{$v_color}',v_regnum='{$v_regnum}',v_serialnum='{$v_serialnum}',v_capacity='{$v_capacity}',v_datepur='{$v_datepur}',v_manu='{$v_manu}',v_enginetype='{$v_enginetype}',v_loc='{$v_loc}',v_fueltype='{$v_fueltype}',v_fuelcap='{$v_fuelcap}',v_license='{$v_license}',v_condition='{$v_condition}',v_avail='{$v_avail}',fleetimg='{$fleetimg}' WHERE fleetid='{$fleetid}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Account Updated ");
            redirect('edit_fleet.php?id='.(int)$e_fleet['fleetid'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_fleet.php?id='.(int)$e_fleet['fleetid'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Update Fleet
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_fleet.php" class="clearfix">
          <div class="form-group">
                <label for="v_category" class="control-label">Category</label>
                <select class="form-control" name="v_category" value="<?php echo remove_junk(ucwords($e_fleet['v_category'])); ?>">
                  <option <?php if($e_fleet['v_category'] === '3')  echo 'selected="selected"';?>value="3">ARMORED VEHICLE</option>
                  <option <?php if($e_fleet['v_category'] ==='2')  echo 'selected="selected"';?>value="2">VAN</option>
                  <option <?php if($e_fleet['v_category'] === '1')  echo 'selected="selected"';?>value="1">CAR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="v_model" class="control-label">Model</label>
                <input type="text" class="form-control" name ="v_model"  value="<?php echo remove_junk(ucwords($e_fleet['v_model'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_year">Year</label>
                <input type="text" class="form-control" name ="v_year"  value="<?php echo remove_junk(ucwords($e_fleet['v_year'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_color">Color</label>
                <input type="text" class="form-control" name ="v_color"  value="<?php echo remove_junk(ucwords($e_fleet['v_color'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_regnum">Registration Number</label>
                <input type="text" class="form-control" name ="v_regnum"  value="<?php echo remove_junk(ucwords($e_fleet['v_regnum'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_serialnum">Serial Number</label>
                <input type="text" class="form-control" name ="v_serialnum"  value="<?php echo remove_junk(ucwords($e_fleet['v_serialnum'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_capacity">Maximum Capacity</label>
                <input type="text" class="form-control" name ="v_capacity"  value="<?php echo remove_junk(ucwords($e_fleet['v_capacity'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_datepur">Date of Purchase</label>
                <input type="date" class="form-control" name ="v_datepur"  value='<?php echo $e_fleet["v_datepur"]?>'>
            </div>
            <div class="form-group">
                <label for="v_manu">Manufacturer</label>
                <input type="text" class="form-control" name ="v_manu"  value="<?php echo remove_junk(ucwords($e_fleet['v_manu'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_enginetype">Engine Type</label>
                <input type="text" class="form-control" name ="v_enginetype"  value="<?php echo remove_junk(ucwords($e_fleet['v_enginetype'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_loc">Location of purchase</label>
                <input type="text" class="form-control" name ="v_loc"  value="<?php echo remove_junk(ucwords($e_fleet['v_loc'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_fueltype">Fuel Type</label>
                <input type="text" class="form-control" name ="v_fueltype"  value="<?php echo remove_junk(ucwords($e_fleet['v_fueltype'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_fuelcap">Fuel Capacity</label>
                <input type="text" class="form-control" name ="v_fuelcap"  value="<?php echo remove_junk(ucwords($e_fleet['v_fuelcap'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_license">License</label>
                <input type="text" class="form-control" name ="v_license"  value="<?php echo remove_junk(ucwords($e_fleet['v_license'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_condition">Condition</label>
                <input type="text" class="form-control" name ="v_condition"  value="<?php echo remove_junk(ucwords($e_fleet['v_condition'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_avail">Availability</label>
                <input type="text" class="form-control" name ="v_avail"  value="<?php echo remove_junk(ucwords($e_fleet['v_avail'])); ?>">
            </div>
            <div class="form-group">
                <label for="v_avail">Vehicle Image</label>
                <input type="file" accept=".jpg,.jpeg,.png,.gif" multiple="multiple" class="form-control" name ="fleetimg"  value="<?php echo remove_junk(ucwords($e_fleet['fleetimg'])); ?>">
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="update" class="btn btn-info">Submit</button>              
            </div>
        </form>
       </div>
     </div>
  </div>
 </div>
<?php include_once('layouts/footer.php'); ?>
