<?php
  $page_title = 'facility pending req';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_request_facility = find_all('request_facility')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of request</a>
</nav>
<!-- /Breadcrumb -->
<br>

<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
  
  <a href="facilityavailable.php"><button type="button" class="btn btn-light">Facility Available</button></a> 
<a href="facility-pending-request.php"><button type="button" class="btn btn-success">Facility Pending Request</button></a>
<a href="facility-complain.php"><button type="button" class="btn btn-danger">Facility Complaints</button></a>

</nav>




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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Facility Available Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                 <th>Id</th>
						
							<th>Lastname</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Department</th>
							<th>Position</th>
							<th>Event type</th>
							<th>Facility type</th>
							<th>Reservation date</th>
							<th>Start</th>
							<th>Until</th>
							<th>Purpose</th>
							<th class="text-center" style="width: 100px;">Actions</th>
					
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_request_facility as $facilitycomplain):?>
                <tr>
                     <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['id']));?>
					 
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['lname']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['fname']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['mname']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['contact']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['email']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['department']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['position']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['event_type']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['facility_type']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['reservation_date']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['date_start']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['until']));?></td>
					 <td class="text-center"><?php echo remove_junk(ucfirst($facilitycomplain['purpose']));?></td>
					 
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="approve_facility_request.php?id=<?php echo $facilitycomplain['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-check"></i></a>
                           
                      <a href="decline_facility_request.php?id=<?php echo $facilitycomplain['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
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
  </div>
<!-- End of Data table  -->


<?php include_once('layouts/footer.php'); ?>
