<?php
  $page_title = 'APPROVED CLIENT';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $stat="";
?>

<?php
$Table="collection";
$row = approve();
?>

<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#checkout" class="breadcrumbs__item is-active">APPROVED</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> APPROVED</span>
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
                  <th> Full Name </th>
                  <th> Reference Number </th>
                  <th> Type of Loan </th>
                  <th> Amount Loan </th>
                  <th> Date Released </th>
                  
               </tr>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($row as $row): ?>
              <tr>
              <td><?php echo $row['Full_Name']; ?></td>
              <td><?php echo $row['Ref_Number']; ?></td>
              <td><?php echo $row['Type_of_loan']; ?></td>
              <td><?php echo $row['Amount_loan']; ?></td>
              <td><?php echo $row['D_released']; ?></td>
            
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
