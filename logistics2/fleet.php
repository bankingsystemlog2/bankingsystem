<?php
  $page_title = 'Vehicle Information';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $vehicle = find_all('v_info');

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

  <a href="#checkout" class="breadcrumbs__item is-active">Vehicle Information</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Fleet Table</span>
        <!-- <div class="text-end">
        <div class="text-end">
          <a href="fleet_addvehicle.php" class="btn btn-info pull-right"> Add New Vehicle</a>
         </div>
        </div> -->
      </div>
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
                <th> Color </th>
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
            <td><?php echo $row['v_color']; ?>
            </td>
            <td><?php echo $row['v_condition']; ?></td>
            <td>
            <button $id =<?php echo $row['fleetid'];?> data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $row['fleetid'];?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal-<?php echo $row['fleetid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-keyboard="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel" style="Color:white">Vehicle Details</h5>
                      <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <div class="modal-body">                      
                      <form method="post" action="edit_fleet.php" class="clearfix">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-6"><img src="uploads/<?php echo $row['fleetimg']; ?>" height='150' /></div>
                        <div class="row">
                          <div class="col-md-3 ml-auto"><h5><?php echo $row['v_model'];?></h5></div>
                        </div>
                          <div class="col-md-4 ml-auto">
                            <p><b>Category: </b><?php if($row['v_category'] == 1){echo "car";} elseif($row['v_category'] == 2){echo "Van";} elseif($row['v_category'] == 3){echo "Armored Vehicle";} else{echo "Undefined";}?> </p>
                            <p><b>Capacity: </b><?php echo $row['v_capacity'];?> </p>
                            <p><b>Year Model: </b><?php echo $row['v_year'];?> </p>
                            <p><b>Color: </b><?php echo $row['v_color'];?> </p>
                            <p><b>Registration Number: </b><?php echo $row['v_regnum'];?> </p>
                            <p><b>Serial Number: </b><?php echo $row['v_serialnum'];?> </p>
                          </div>
                          <div class="col-md-7 ml-auto">
                            <p><b>Date Purchased: </b><?php echo $row['v_datepur'];?> </p>
                            <p><b>Manufacturer: </b><?php echo $row['v_manu'];?> </p>
                            <p><b>Location Purchased: </b><?php echo $row['v_loc'];?> </p>
                            <p><b>Fuel Type: </b><?php echo $row['v_fueltype'];?> </p>
                            <p><b>Fuel Capacity: </b><?php echo $row['v_fuelcap'];?> </p>
                            <p><b>Transmission: </b><?php echo $row['v_enginetype'];?> </p>
                            <p><b>Condition: </b><?php echo $row['v_condition'];?> </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-secondary">
                    <input type="hidden" name="fleetid" value="<?php echo $row['fleetid'];?>">
                    <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                      <?php if($user['user_level'] == 1):?>
                      <button type="submit" name="edit_fleet" class="btn btn-success"><i class="fas fa-check"></i> Edit</button>
                      <!-- <button type="button" name="delete_fleet" data-bs-toggle = "modal" data-bs-dismiss="modal" class="btn btn-danger" data-bs-target = "#deleteModal-<?php echo $row['fleetid'];?>">Delete</button> -->
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
  </div>
<?php include_once('layouts/footer.php'); ?>