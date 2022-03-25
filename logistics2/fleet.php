<?php
  $page_title = 'Accounts Payable';
  require_once('../includes/log2load.php');
  // Checkin What level user has permission to view this page
   page_require_level(4);
  $vehicle = find_all('v_info');
?>
<?php include_once('../layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="../admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="../user_dashboard.php" class="breadcrumbs__item">Home</a>
   <?php elseif ($user['user_level'] === '4'): ?>
   <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Fleet Management</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Recievables Table</span>
        <div class="text-end">
          <button class="btn btn-warning btn-xs-block" type="button">
         <i class="bi bi-printer-fill"></i>
          Print Report
         </button>
        <div class="text-end">
          <a href="fleet_addvehicle.php" class="btn btn-info pull-right"> Add New Vehicle</a>
         </div>
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
                <th>Model</th>
                <th>Seating Capacity</th>
                <th> Type </th>
                <th>Category</th>
                <th> Availability </th>
                <th> Condition </th>
             </tr>
            </thead>
           <tbody>
            <?php foreach ($vehicle as $row): ?>
             <tr>
            <td><?php echo $row['v_model']; ?></td>
            <td><?php echo $row['v_capacity']; ?></td>
            <td><?php echo $row['v_enginetype']; ?></td>
            <td><?php if($row['v_category'] === '1'):?>
            <?php echo "Car";?>
            <?php elseif($row['v_category'] === '2'):?>
            <?php echo "Van";?>
            <?php elseif($row['v_category'] === '3'):?>
            <?php echo "Armored Vehicle";?>
            <?php endif;?>
            </td>
            <td><?php echo $row['v_avail']; ?></td>
            <td><?php echo $row['v_condition']; ?></td>
            <td>
            <a href="fleet.php?id=<?php echo $row['fleetid']. "&Tablename=". urlencode($Table)."&PageName=". urlencode('AccountsRecievable.php'); ?>" class="btn btn-info btn-viewReciept"><i class="bi bi-file-earmark-post-fill"></i> Details</a></td>
              </td>
             </tr>
           <?php endforeach; ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('../layouts/footer.php'); ?>