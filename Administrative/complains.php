<?php
  $page_title = 'List of Complains';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_complain = find_all('complain')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of Complains</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Complain Table</span>
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
                <th>Fullname</th>
               
                <th>Gmail</th>
                <th>Company</th>
                <th>Your Complain</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date of Complain</th>
                     
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_complain as $complainant):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
					
					<td><?php echo remove_junk(ucfirst($complainant['fname'].' '.$complainant['mname'].' '.$complainant['lname'])); ?></td>
					
                    
					   <td><?php echo remove_junk(ucfirst($complainant['gmail'])); ?></td>
					    <td><?php echo remove_junk(ucfirst($complainant['company'])); ?></td>
						 <td><?php echo remove_junk(ucfirst($complainant['type_of_complain'])); ?></td>
						  <td><?php echo remove_junk(ucfirst($complainant['description'])); ?></td>
						    <td><?php echo remove_junk(ucfirst($complainant['status'])); ?></td>
						   <td><?php echo remove_junk(ucfirst($complainant['date'])); ?></td>
						    
                    <td class="text-center">
                      <div class="btn-group">
                         <a href="edit_visitor.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i></a>      
                      <a href="delete_complain.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-danger" style="margin-right: 5px;"><i class="bi bi-trash"></i></a>
                      <a href="delete_contractrequest.php?id=<?php echo $complainant['id'];?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
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
