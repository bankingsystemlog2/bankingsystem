<?php
  $page_title = 'Admin Home Page';
  require_once('includes/log2load.php');
?>
<?php
 $c_user = count_by_id('users');
 $username = current_user()['name'];

?>
<?php
// All Variables ----------------------------------------------------------------------
$Expenses=0;
$Collections=0;
$rev=0;
$total=0;
$c_user = count_by_id('users');
$user = current_user()['id'];
$vehicle = find_all('v_info');
$conn = mysqli_connect("localhost", "root", "", "bank");
$employees = "SELECT * FROM employees INNER JOIN users ON employees.employee_id = users.employee_id WHERE users.id = ".$user;
$employees1 = mysqli_query($conn, $employees);
$employee = mysqli_fetch_array($employees1);
$driver = find_res_driver($employee['employee_id']);
$driver1 = find_res_driver1($employee['employee_id']);
$com = 0;
// End of Variable Declarations---------------------------------------------------------

 $all_users = find_all_user();
?>

<?php include_once('layouts/header.php'); ?>
<!-- Taking Array of Datas From Budget and putting to com Variable...-->
<?php foreach ($driver1 as $Budget): ?>
  <?php $com++;?>
<?php endforeach; ?>
<!-- End of Loop-->
<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->
<div class="row">
  <div class="col-md-12">
    <h4>Dashboard</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card bg-primary text-white h-100">
      <div class="card-body py-5"><p><?php echo $com; ?><br><span><i class="bi bi-truck"></i> Total Reservations </span></p></div>
      <div class="card-footer d-flex">
        View Details
        <span class="ms-auto">
          <i class="bi bi-chevron-right"></i>
        </span>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="tab" id="tabs1">
    <button class="tablinks" onclick="Tab(event, 'Reservations')" >Reservations</button>
    <button class="tablinks" onclick="Tab(event, 'past')">Past Reservations</button>
    <button class="tablinks" onclick="Tab(event, 'vehicles')"id="defaultOpen">Vehicle Info</button>

</div>
<div id="Reservations" class="tabcontent">
    <form method="post" action="audit_form.php" autocomplete="off" enctype="multipart/form-data"> 
    <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Model</th>
                <th>Reservee</th>
                <th>Date range</th>
                <th>Location</th>
                <th> Remarks </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($driver1 as $row): ?>
             <tr>
            <td><?php echo $row['v_model']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['from_date']," to ",$row['to_date']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['Remarks']; ?></td>
            </tr>
           <?php endforeach; ?>
           </tbody>
         </table>
        </div>
      </div>
    </form>
</div>
<div id="past" class="tabcontent">
    <form method="post" action="audit_form.php" autocomplete="off" enctype="multipart/form-data"> 
    <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Model</th>
                <th>Reservee</th>
                <th>Date range</th>
                <th>Location</th>
                <th> Remarks </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($driver as $row): ?>
             <tr>
            <td><?php echo $row['v_model']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['from_date']," to ",$row['to_date']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['Remarks']; ?></td>
            </tr>
           <?php endforeach; ?>
           </tbody>
         </table>
        </div>
      </div>
    </form>
</div>
<div id="vehicles" class="tabcontent">    
    <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Model</th>
                <th>Seating Capacity</th>
                <th> Type </th>
                <th>Category</th>
                <th> Availability </th>
                <th> Condition </th>
                <th></th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($vehicle as $row): ?>
             <tr>
            <td><?php echo $row['v_model']; ?></td>
            <td><?php echo $row['v_capacity']; ?></td>
            <td><?php echo $row['v_enginetype']; ?></td>
            <td><?php if($row['v_category'] === '1'):?>
            <?php echo "Car";?>
            <?php elseif($row['v_category'] === '2'):?>
            <?php echo "Van";?>
            <?php elseif($row['v_category'] === '3'):?>
            <?php echo "Armored Vehicle";?>
            <?php endif;?>
            </td>
            <td><?php if($row['v_avail'] === '1'){
              echo "Available";}
            elseif($row['v_avail'] === '2'){
              echo "Unavailable";}
            elseif($row['v_avail'] === '3'){
              echo "Under Maintenance";}
            ?>
            </td>
            <td><?php echo $row['v_condition']; ?></td>
            <td><button $id =<?php echo $row['fleetid'];?> data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $row['fleetid'];?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal-<?php echo $row['fleetid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-keyboard="true">
                <div class="modal-dialog modal-m modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel" style="Color:white">Change password</h5>
                      <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <div class="modal-body">                      
                      <form method="post" action="edit_fleet.php" class="clearfix">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-4"><img src="uploads/<?php echo $row['fleetimg']; ?>" height='150' /></div>
                          <div class="col-md-4 ml-auto">
                            <h6>Category:</h6><p><?php if($row['v_category'] == 1){echo "car";} elseif($row['v_category'] == 2){echo "Van";} elseif($row['v_category'] == 3){echo "Armored Vehicle";} else{echo "Undefined";}?> </p>
                            <h6>Capacity:</h6><p><?php echo $row['v_capacity'];?> </p>
                            <h6>Transmission:</h6><p><?php echo $row['v_enginetype'];?> </p>
                            <h6>Condition:</h6><p><?php echo $row['v_condition'];?> </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 ml-auto"><h5><?php echo $row['v_model'];?></h5></div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-secondary">
                    <input type="hidden" name="fleetid" value="<?php echo $row['fleetid'];?>">
                    <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                      <?php if($user['user_level'] == 1):?>
                      <button type="submit" name="edit_fleet" class="btn btn-success"><i class="fas fa-check"></i> Edit</button>
                      <button type="button" name="delete_fleet" data-bs-toggle = "modal" data-bs-dismiss="modal" class="btn btn-danger" data-bs-target = "#deleteModal-<?php echo $row['fleetid'];?>">Delete</button>
                        <?php endif;?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Delete Modal -->
              <div class="modal top fade" id="deleteModal-<?php echo $row['fleetid'];?>">
                <div class="modal-dialog modal-l modal-dialog-centered">
                  <div class="modal-content"> 
                    <form class="modal-content" action="fleet_delete.php" method="post">
                      <div class="modal-header bg-secondary">
                        <div class="container">
                          <h1 class="modal-title">Delete Vehicle</h1>
                        </div>
                      </div>
                      <div class="modal-body">
                        <h5>Are you sure you want to delete?</h5>
                      </div>
                      <div class="modal-footer bg-secondary">
                        <input type="hidden" name="delete_fleet" value="<?php echo $row['fleetid'];?>">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-success"><i class="fas fa-check"></i>Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </td>
            </tr>
           <?php endforeach; ?>
           </tbody>
         </table>
        </div>
      </div>
</div>
<script>
  document.getElementById("defaultOpen").click();
  function Tab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<?php include_once('layouts/footer.php'); ?>
