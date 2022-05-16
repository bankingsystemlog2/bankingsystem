<?php
  $page_title = 'List of Calims and Reimbursment';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

?>
<?php
$Table="reimbursment";
$row = join_reimbursment_table();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">List Of Claims & Reimbursment</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-13">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success" style="font-size:14px;"><i class="bi bi-table"></i> Claims & Reimbursment Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
               <tr class="bg-success bg-gradient text-light">
                  <th>Department</th>
                  <th>Requestor</th>
                  <th> Date </th>
                  <th> Status </th>
                  <th> Action </th>
               </tr>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($row as $row): ?>
              <?php if (remove_junk($row['Status']) === 'Pending'):?>
              <tr>
              <td><?php echo remove_junk($row['Co_Source']);?></td>
              <td><?php echo remove_junk($row['Co_Desc']);?></td>
              <td><?php echo remove_junk($row['Co_Date']); ?></td>
               <td>
                <span class="badge rounded-pill bg-danger bg-gradient"><?php echo remove_junk($row['Status']); ?></span>
               </td>
               <td><a href="DisbursmentDetails.php?id=<?php echo (int)$row['Co_Code']. "&Tablename=". urlencode($Table)."&PageName=". urlencode('Claims_reimbursment.php');?>" class="btn btn-success bg-gradient btn-viewReciept"><i class="bi bi-file-earmark-medical-fill"></i> Details</a></td>
               </tr>
             <?php elseif ($row['Status']=='Approved'):?>
               <tr>
                 <td><?php echo remove_junk($row['Co_Source']);?></td>
                 <td><?php echo remove_junk($row['Co_Desc']);?></td>
                 <td><?php echo remove_junk($row['Co_Date']); ?></td>
              <td>
                <span class="badge rounded-pill bg-primary bg-gradient"><?php echo remove_junk($row['Status']); ?></span>
              </td>
              <td><a href="DisbursmentDetails.php?id=<?php echo (int)$row['Co_Code']. "&Tablename=". urlencode($Table)."&PageName=". urlencode('Claims_reimbursment.php');?>" class="btn btn-success bg-gradient btn-viewReciept"><i class="bi bi-file-earmark-medical-fill"></i> Details</a></td>
               </tr>
             <?php endif; ?>
             <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Department</th>
              <th>Requestor</th>
              <th> Date </th>
              <th> Status </th>
              <th> Action </th>
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
