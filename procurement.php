<?php
  $page_title = 'List of Procurments';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

?>
<?php
$Table="collection";
$row = join_procurment_table();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">List Of procurement</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Procurement Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <tr>
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
                <?php if ($row['Status'] === 'Pending'):?>
              <tr>
              <td><?php echo $row['PRO_Department']; ?></td>
              <td><?php echo $row['PRO_Requestor']; ?></td>
              <td><?php echo $row['PRO_Date']; ?></td>
              <td>
              <span class="badge rounded-pill bg-danger"><?php echo remove_junk($row['Status']); ?></span>
              </td>
              <td><a href="#" class="btn btn-info"><i class="bi bi-file-earmark-medical-fill"></i> Details</a></td>
               </tr>
             <?php elseif ($row['Status']=='Approved'):?>
               <tr class="table-success">
                 <td class="text-center"><?php echo $row['PRO_Department']; ?></td>
                 <td class="text-center"><?php echo $row['PRO_Requestor']; ?></td>
                 <td class="text-center"><?php echo $row['PRO_Date']; ?></td>
                 <td>
                  <span class="badge rounded-pill bg-success"><?php echo remove_junk($row['Status']); ?></span>
                 </td>
                 <td><a href="#" class="btn btn-info"><i class="bi bi-file-earmark-medical-fill"></i> Details</a></td>
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
