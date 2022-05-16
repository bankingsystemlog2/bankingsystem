<?php
  $page_title = 'Loandetails';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $stat="";
?>
<?php
$Table="collection";
$row = loan_details();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Loan Details</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Loan Details</span>
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
                  
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Reference number</th>
                  <th>Type of Loan</th>
                  <th>Plan</th>
                  <th>Total Amount</th>
                  <th>Total Payable</th>
                  <th>Monthly Payable</th>
                  <th>Total Paid</th>
                  <th>Next Payment Monitoring</th>
                  <th>Status</th>
                  <th>Date Released</th>
                  <th>Action</th>
               </tr>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($row as $row): ?>
               
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['Full_name']; ?></td>
              <td><?php echo $row['Ref_number']; ?></td>
              <td><?php echo $row['loan_type']; ?></td>
              <td><?php echo $row['plan']; ?></td>
              <td><?php echo $row['t_amount']; ?></td>
              <td><?php echo $row['t_payable']; ?></td>
              <td><?php echo $row['m_payable']; ?></td>
              <td><?php echo $row['t_paid']; ?></td>
              <td><?php echo $row['n_p_monitoring']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['d_released']; ?></td>


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
