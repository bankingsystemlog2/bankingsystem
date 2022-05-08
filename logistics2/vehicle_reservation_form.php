<?php
  $page_title = 'Reservation Form';
  require_once('../includes/log2load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(1);
  //sample changes
  $groups = find_all('v_res');
  $fleet = find_all('v_info');
  $users_id = current_user()['id'];
  $fleet_id = $_POST['fleetid'];
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
<?php include_once('../layouts/log2header.php'); ?>
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
              <input type="hidden" class="form-control" name = "from_date" value = <?php echo $from_date; ?>>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name = "to_date" value = <?php echo $from_date; ?>>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name = "fleetid" value = <?php echo $fleet_id; ?>>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name ="emp_id"  value = <?php echo $users_id; ?>>
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
  <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>

<?php include_once('../layouts/footer.php'); ?>