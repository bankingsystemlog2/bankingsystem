<?php
	$page_title = 'Visitor Information';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
    $all_maintenance_request = find_all('maintenance_request')
?>

<?php include_once('layouts/header.php'); ?>




<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="maintenance_approval.php" class="breadcrumbs__item is-active">List of Maintenance Request</a>
</nav>
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>

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
         <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Table of Maintenance Request</span>
		
		<div class="text-end">
          <a  class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New Visitor</a>
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
               <th class="text-center" style="width: 50px;">Request Id</th>
				
                <th>Requestor</th>
                <th>Department</th>
                <th>Name of Equipment</th>
                <th>Issue</th>
               <th>Date</th>
                 <th>Status</th>
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($all_maintenance_request as $request):?>
          <tr>
          <td><?php echo remove_junk(ucfirst($request['id'])); ?></td>
                    
         
					    <td><?php echo remove_junk(ucfirst($request['requestor'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($request['department'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($request['name_of_equipment'])); ?></td>
						   
						    <td><?php echo remove_junk(ucfirst($request['issue'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($request['date'])); ?></td>
							
							
							 <td><?php if($request['status'] == 'Approve'){ ?>
					<span class="badge rounded-pill bg-success">
					<?php echo remove_junk(ucwords($request['status']))?></span>
					<?php }else{ ?>
					<span class="badge rounded-pill bg-danger"> <?php echo remove_junk(ucwords($request['status'])); }?></span></td>
							  
						    
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="edit_visitor.php?id=<?php echo $request['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>
                           
                      <a href="delete_visitor.php?id=<?php echo $request['id'];?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </td>

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  
  






<?php include_once('layouts/footer.php'); ?>
