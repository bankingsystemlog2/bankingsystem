<?php
  $page_title = 'List of Collections';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $col=collections();
?>

<?php include_once('layouts/header.php'); ?>
<!-- Notification div -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- End Notification div -->

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '2'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '3'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">All Collections</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> All Collections Table</span>
     <div class="text-end">
       <button class="btn btn-success btn-xs-block" type="button">
       <i class="bi bi-send-fill"></i>
         Forward to DM
       </button>
       <button class="btn btn-warning btn-xs-block" type="button">
      <i class="bi bi-printer-fill"></i>
       Print Report
      </button>
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
              <th>Invoice #</th>
              <th>Account Name</th>
              <th>Account Number</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
         <tbody>
          <?php foreach ($col as $col): ?>
          <tr>
          <td><?php echo $col['Co_Code']; ?></td>
          <td><?php echo $col['LS_Account_name']; ?></td>
          <td><?php echo $col['A_Number']; ?></td>
          <td><?php echo $col['LS_Date']; ?></td>
          <td>
            <a href="Collection_Details.php?id=<?php echo $col['Co_Code']. "&Tablename=". urlencode($Table)."&PageName=". urlencode('Collections.php');; ?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
           </tr>
         <?php endforeach; ?>
         </tbody>
         <tfoot>
           <tr>
             <th>Collection Code</th>
             <th>Account Name</th>
             <th>Account Number</th>
             <th>Date</th>
             <th>Action</th>
           </tr>
         </tfoot>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
<!-- End of Data table  -->




<?php include_once('layouts/footer.php'); ?>
