<?php
	$page_title = 'Visitor Monitoring';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_visitor_registration = find_all('visitor_registration')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="visitorinformation.php" class="breadcrumbs__item is-active">List of visitor Log</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of visitor monitoring</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
               <th class="text-center" style="width: 50px;">Visitor Id</th>
				
				<th>Full Name</th>				
				<th>Department</th>
				
				<th>Contact</th>
				<th>Visitor Type</th>
				<th>Visitor Purpose</th>
			
				<th>Time</th>
				<th>Action</th>
				
				
			
              </tr>
            </thead>
            <tbody>

                         <?php foreach ($all_visitor_registration as $Monitoring):?>
                <tr>
                      <td><?php echo remove_junk(ucfirst($Monitoring['id'])); ?></td>
					 <td><?php echo remove_junk(ucfirst($Monitoring['last_name'].' '.$Monitoring['first_name'].' '.$Monitoring['middle_name'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($Monitoring['department'])); ?></td>	
						    <td><?php echo remove_junk(ucfirst($Monitoring['contact'])); ?></td>
							 <td><?php echo remove_junk(ucfirst($Monitoring['visitor_type'])); ?></td>
							  <td><?php echo remove_junk(ucfirst($Monitoring['visitor_purpose'])); ?></td>
							  <td><?php echo remove_junk(ucfirst($Monitoring['time'])); ?></td>
							  
							  
							  <td class="text-center">
                      <div class="btn-group">
                         
                      <a href="delete_contractrequest.php?id=<?php echo $Monitoring['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                      </div>
                    </td>
							 
						    
                    
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
