<?php
  $page_title = 'List of Complains';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_facility = find_all('facility')
?>



<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">List of avaible equipment</a>
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
                 <th class="text-center" style="width: 50px;">Id</th>
                    <th>Name of Room</th>
                    <th>Status</th>
					<th class="text-center" style="width: 100px;">Actions</th>
                    
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_facility as $available):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                  <td class="text-center"><?php echo remove_junk(ucfirst($available['name_of_room']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($available['status']));?></td>
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
