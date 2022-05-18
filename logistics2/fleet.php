<?php
  $page_title = 'Vehicle Information';
  require_once('includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $vehicle = find_all('v_info');
?>
<link rel="stylesheet" href="datatables.css">
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
        <div class="text-end">
          <button class="btn btn-warning btn-xs-block" type="button">
         <i class="bi bi-printer-fill"></i>
          Print Report
         </button>
        <div class="text-end">
          <a href="fleet_addvehicle.php" class="btn btn-info pull-right"> Add New Vehicle</a>
         </div>
        </div>
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
                <th> Availability </th>
                <th> Condition </th>
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
            <td>
            <button $id =<?php echo $row['fleetid'];?> data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $row['fleetid'];?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
              <!-- Modal -->
              <div class="modal top fade" id="exampleModal-<?php echo $row['fleetid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-keyboard="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel" style="Color:white">Vehicle Information</h5>
                      <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <div class="modal-body">                      
                      <form method="post" action="edit_fleet.php" class="clearfix">
                      
                    </div>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-4"><img src="uploads/<?php echo $row['fleetimg']; ?>" height='150' /></div>
                        <div class="col-md-4 ml-auto">
                          <h6>Category:</h6><p><?php if($row['v_category'] == 1){echo "car";} elseif($row['v_category'] == 2){echo "Van";} elseif($row['v_category'] == 3){echo "Armored Vehicle";} else{echo "Undefined";}?> </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 ml-auto"><h5><?php echo $row['v_model'];?></h5></div>
                        <div class="col-md-2 ml-auto">.col-md-2 .ml-auto</div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
                      </div>
                      <div class="row">
                        <div class="col-sm-9">
                          Level 1: .col-sm-9
                          <div class="row">
                            <div class="col-8 col-sm-6">
                              Level 2: .col-8 .col-sm-6
                            </div>
                            <div class="col-4 col-sm-6">
                              Level 2: .col-4 .col-sm-6
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
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