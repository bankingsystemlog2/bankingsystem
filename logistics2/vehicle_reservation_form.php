<?php
  $page_title = 'Reservation Form';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  //sample changes
  $groups = find_all('v_res');
  $fleet = find_all('v_info');
  $users_id = current_user()['id'];
  $user_name = current_user()['name'];
  $from_date = $_SESSION['from_date'];
  $to_date = $_SESSION['to_date'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php
  if(isset($_POST['vehicle_reservation_form'])){

   $req_fields = array('emp_id,res_time,s_date,r_deadline');
   validate_fields($req_fields);

   if(empty($errors)){
       $emp_id   = remove_junk($db->escape($_POST['emp_id']));
       $fromdate   = remove_junk($db->escape($_POST['from_date']));
       $todate   = remove_junk($db->escape($_POST['to_date']));
       $fleetid   = remove_junk($db->escape($_POST['fleetid'])); 
       $remarks   = remove_junk($db->escape($_POST['remarks'])); 
       $location   = remove_junk($db->escape($_POST['location'])); 
        $query = "INSERT INTO v_res (";
        $query .="emp_id,from_date,to_date,fleetid,location,remarks";
        $query .=") VALUES (";
        $query .="'{$emp_id}', '{$fromdate}', '{$todate}', '{$fleetid}','{$location}','{$remarks}'";
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
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="vehicles.php" class="breadcrumbs__item">Vehicle Reservation</a>

  <a href="#checkout" class="breadcrumbs__item is-active">Reservation Form</a>
</nav>
<!-- /Breadcrumb -->
  <?php echo display_msg($msg);  
  if(isset($_GET['fleetid'])){
  ?>
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
          <form method="post" action="vehicle_reservation_form.php" autocomplete="off">
            <?php $fleet_id = $_GET['fleetid'];?>
            <div class="form-group">
              <input type="hidden" class="form-control" name = "from_date" value = <?php echo $from_date; ?>>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name = "to_date" value = <?php echo $to_date; ?>>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name = "fleetid" value = <?php echo $fleet_id; ?>>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name ="emp_id"  value = <?php echo $users_id; ?>>
            </div>
            <div class="form-group">
                <label for="from_date">From date</label>
              <input type="text" class="form-control" name = "samplefrom_date" value = <?php echo $from_date; ?> readonly>
            </div>
            <div class="form-group">
                <label for="to_date">To date</label>
              <input type="text" class="form-control" name = "sampleto_date" value = <?php echo $to_date; ?> readonly>
            </div>
            <div class="form-group">
                <label for="v_year">Vehicle ID</label>
              <input type="text" class="form-control" name = "samplefleetid" value = <?php echo $fleet_id; ?> readonly>
            </div>
            <div class="form-group">
                <label for="v_year">Location</label>
                <input type="text" class="form-control" name ="location"  placeholder="Address">
            </div>
            <div class="form-group">
                <label for="v_color">Remarks</label>
                <textarea class="form-control" name ="remarks"  placeholder="Additional Informations"></textarea>
            </div>
            
        </form>
        
        <a href="vehicles.php"><button type="submit" name="fleet_addvehicle" class="btn btn-danger">Cancel</button></a>
        <a href="applicant_edit.php"><button type="submit" name="fleet_addvehicle" class="btn btn-success">Reserve Vehicle</button></a>
        </div>

      </div>

    </div>
  </div>
  <?php }
  else{
    echo "ERROR!!";
  }?>
<?php include_once('layouts/footer.php'); ?>