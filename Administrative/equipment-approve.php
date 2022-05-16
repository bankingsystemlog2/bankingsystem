<?php
  $page_title = 'Request Approve';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
     $all_equipment_reservation = find_all('equipment_reservation')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">Equipment Approve</a>
</nav>
<!-- /Breadcrumb -->
<br>

<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
   
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  
  
 <a href="equipment-available.php"><button type="button" class="btn btn-light">Equipment Available</button></a> 
<a href="equipment-approve.php"><button type="button" class="btn btn-info">Request Approve</button></a>
<a href="equipment-pending-request.php"><button type="button" class="btn btn-success">Equipment Pending Request</button></a>
<a href="equipment-complain.php"><button type="button" class="btn btn-danger">Equipment Complaints</button></a>

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
                <th class="text-center" style="width: 50px;">Equipment no.</th>
                  
					  <th>Last Name</th>
					   <th>First Name</th>
					    <th>Middle Name</th>
						 <th>Department</th>
						  <th>Position</th>
						   <th>Time&Date Request</th>
						    <th>List of Equipment reserve</th>
						    <th>Action</th>
							
                    
              </tr>
            </thead>
            <tbody>

           <?php foreach ($all_equipment_reservation as $request):?>
									<tr>
										<td class="text-center"><?php echo count_id();?></td>
										
										 <td
										 
										  <td><?php echo remove_junk(ucfirst($request['lname'])); ?></td>
										   <td><?php echo remove_junk(ucfirst($request['fname'])); ?></td>
											<td><?php echo remove_junk(ucfirst($request['mname'])); ?></td>
											 <td><?php echo remove_junk(ucfirst($request['department'])); ?></td>
											  <td><?php echo remove_junk(ucfirst($request['position'])); ?></td>
											   <td><?php echo remove_junk(ucfirst($request['time_date_request'])); ?></td>
												<td><?php echo remove_junk(ucfirst($request['list_equipment_request'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$complainant['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                         <a href="delete_legal_complain.php?id=<?php echo (int)$complainant['id'];?>"   class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
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
