<?php
  $page_title = 'LoanRestructuring';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $stat="";
?>
<?php
$Table="collection";
$row = loan_restructuring();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Loan Restructuring</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Loan Restructuring</span>
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
                  <th> FULL NAME </th>
                  <th> REFERENCE NUMBER </th>
                  <th> TYPE OF LOAN </th>
                  <th> TYPE OF RESTRUCTURING </th>
                  <th> FULL ADDRESS </th>
                  <th> CONTACT NO. </th>
                  <th> EMAIL ADDRESS </th>
                  <th> PAYMENT TERM </th>
                  <th> STATUS </th>
                  <th> DATE RELEASED </th>
                  
               </tr>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($row as $row): ?>
               
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['Full_name']; ?></td>
              <td><?php echo $row['ref_number']; ?></td>
              <td><?php echo $row['type_of_loan']; ?></td>
              <td><?php echo $row['type_of_restruct']; ?></td>
              <td><?php echo $row['full_address']; ?></td>
              <td><?php echo $row['c_number']; ?></td>
              <td><?php echo $row['e_address']; ?></td>
              <td><?php echo $row['p_term']; ?></td>
              
              <?php if ($row['status']=="approved") { ?>
              <td>
              <span class="badge rounded-pill bg-primary"><?php echo remove_junk($row['status']); ?></span>
              </td>
            <?php } else{ ?>
               <td>
              <span class="badge rounded-pill bg-danger"><?php echo remove_junk($row['status']); ?></span>
              </td>
            <?php } ?>
              <td><?php echo $row['date_released']; ?></td>
              
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
