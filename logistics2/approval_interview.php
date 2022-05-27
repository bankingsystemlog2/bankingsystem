<?php
  $page_title = 'Approval For Interview';
  require_once('includes/log2load.php');
// Checkin What level user has permission to view this page
  
//pull out all user form database
   
  ?>
  <?php
  page_require_level(1);
  $all_vendors = find_all_approval_interview();
  ?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">
<style>
@media print{
	#button{
		display: none; !important;
	}
  #example_length{
		display: none; !important;
	}
  #example_filter{
		display: none; !important;
	}
  .topNavBar{
    display: none; !important;
  }
  #example_info{
    display: none; !important;
  }
  #example_previous{
    display: none; !important;
  }
  #example_next{
    display: none; !important;
  }
  .page-link{
    display: none; !important;
  }
	.breadcrumbs{
		display: none; !important;
	}
  table{
    zoom: 80%;
  }
}
@page {
       /* auto is the initial value */
    size: auto%;
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">For Interview Approval</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Vendor Portal</span>
        <div class="text-end">
        <div class="text-end">
        <button onclick="print()" id="button" class="btn btn-info md-2"><i class="bi bi-file-post"></i> Print report</button>
        <!-- <div class="text-end">
          <a href="fleet_addvehicle.php" class="btn btn-info pull-right"> View Approved List</a>
         </div> -->
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
                <th>Name</th>
                <th> Address </th>
                <th> Email </th>
                <th> Contact # </th>
                <th> Category </th>
                <th> Status </th>
                <th> Files </th>
            <th>Actions</th>
             </tr>
            </thead>
        <tbody>
        <?php foreach($all_vendors as $a_vendor): ?>
          <tr>
           <td><?php echo $a_vendor['vendors_fname'],' ',$a_vendor['vendors_mi'],' ',$a_vendor['vendors_lname']?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['vendors_address']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['vendors_email']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['vendors_contact']))?></td>
           <td>
           <?php if($a_vendor['vendors_category'] == 0): ?>
            <span class="label label-success"><?php echo "Contractor"; ?></span>
            <?php elseif($a_vendor['vendors_category'] == 1):?>
            <span class="label label-default"><?php echo "Supplier"; ?></span>
            <?php endif;?>
            </td>
           <td><?php echo remove_junk(ucwords($a_vendor['vendors_status']))?></td>
           <td> 
                <a href="download_contractor.php?id=<?php echo $a_vendor['id']; ?>&vendor_pathurl=<?php echo $a_vendor['vendor_pathurl']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_vendor['vendor_pathurl'])?><i class="glyphicon glyphicon-download"></i>
                </a>
            </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="contractor_approval.php?id=<?php echo (int)$a_vendor['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i>
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
               <!-- <button data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $a_vendor['id'];?>" class="btn btn-danger"><i class="bi bi-file-earmark-post-fill"></i> Delete</a></td>
                <div class="modal top fade" id="exampleModal-<?php echo $a_vendor['id'];?>">
                          <div class="modal-dialog modal-l modal-dialog-centered">
                            <div class="modal-content"> 
                              <form class="modal-content" action="bidding_delete.php" method="post">
                                <div class="modal-header bg-secondary">
                                  <div class="container">
                                    <h1 class="modal-title">Are you sure?</h1>
                                  </div>
                                </div>
                                <div class="modal-body">                                  
                                    <h5>Do You Want To Delete This Application?</h5>
                                </div>
                                <div class="modal-footer bg-secondary">
                                  <div>
                                    <input type="hidden" class = "form-control" name="i_d" value=<?php echo $a_vendor['id'];?>>
                                  </div>
                                  <button type="button" data-bs-dismiss="modal" class="btn btn-success"><i class="fas fa-check"></i>Cancel</button>
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div> -->
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>