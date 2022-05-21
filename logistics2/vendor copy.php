<?php
  $page_title = 'Vendor Portal';
  require_once('includes/log2load.php');
// Checkin What level user has permission to view this page
  
//pull out all user form database
   
  ?>
  <?php
  page_require_level(1);
  $all_vendors = find_all_inner('vendors');
  ?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="datatables.css">

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">List Of Applicant</a>
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
          <button class="btn btn-warning btn-xs-block" type="button">
         <i class="bi bi-printer-fill"></i>
          Print Report
         </button>
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
              <th> # </th>
                <th>Product Name</th>
                <th>Name</th>
                <th> Address </th>
                <th>Company Name</th>
                <th> Email </th>
                <th> Item Description </th>
                <th>  Bidding Price </th>
                <th> Contact # </th>
                <th> Category </th>
                <th> Status </th>
                <th> Files </th>
                <?php if($user['user_level'] === '1'): ?>
            <th>Actions</th>
            <?php endif;?>
             </tr>
            </thead>
        <tbody>
        <?php foreach($all_vendors as $a_vendor): ?>
          <tr>
           <td class="text-center"><?php echo $a_vendor['id'];?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['product_name']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Name']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Address']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Company']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Email']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['item_description']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Offer']))?></td>
           <td><?php echo remove_junk(ucwords($a_vendor['Phone']))?></td>
           <td>
           <?php if($a_vendor['category'] == 0): ?>
            <span class="label label-success"><?php echo "Contractor"; ?></span>
            <?php elseif($a_vendor['category'] == 1):?>
            <span class="label label-default"><?php echo "Supplier"; ?></span>
            <?php endif;?>
           </td>
           <td>
           <?php if($a_vendor['statuss'] === '1'): ?>
            <span class="label label-success"><?php echo "Approved"; ?></span>
            <?php elseif($a_vendor['statuss'] === '0'): ?>
            <span class="label label-default"><?php echo "Pending"; ?></span>
            <?php elseif($a_vendor['statuss'] === '3'): ?>
            <span class="label label-danger"><?php echo "Rejected"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Error"; ?></span>
          <?php endif;?>
           </td>
           <td> 
                <a href="download_vendor.php?id=<?php echo $a_vendor['id']; ?>&path_url=<?php echo $a_vendor['path_url']; ?>" class="btn btn-small btn-success" data-toggle="tooltip" title="Download file">
                <?php echo basename($a_vendor['path_url'])?><i class="glyphicon glyphicon-download"></i>
                </a>
            </td>
            <?php if($user['user_level'] === '1'): ?>
           <td class="text-center">
             <div class="btn-group">
                <a href="vendor_approval.php?id=<?php echo (int)$a_vendor['id'];?>" class="btn btn-sm btn-success" style="margin-right: 5px;"><i class="bi bi-pencil"></i>
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
               <button data-bs-toggle = "modal" data-bs-target = "#exampleModal-<?php echo $a_vendor['id'];?>" class="btn btn-warning"><i class="bi bi-file-earmark-post-fill"></i> Delete</a></td>
                <div class="modal top fade" id="exampleModal-<?php echo $a_vendor['id'];?>">
                          <div class="modal-dialog modal-l modal-dialog-centered">
                            <div class="modal-content"> 
                              <form class="modal-content" action="vendor_delete.php" method="post">
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
                        </div>
                </div>
           </td>
           <?php endif;?>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>