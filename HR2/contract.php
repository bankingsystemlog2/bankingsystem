<?php
  $page_title = 'Contract';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Contract</a>
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
        <div class="text-end">
          <a href="add_contract.php" class="btn btn-primary btn-xs-block" type="button">
         <i class="bi bi-plus"></i>
          Add Contract
         </a>
        </div>
      </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT * FROM contract c, users u WHERE u.employee_id=c.con_eid ORDER BY con_id ASC";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                <th style="display: none">#</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Contract Type</th>
                <th>Contract Details</th>
                <th>Duration From</th>
                <th>Duration To</th>
                <th>Status</th>
                <th>Signed Date</th>
                <th class="text-end">Action</th>
             </tr>
            </thead>
           <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 )
            {
            while($row = mysqli_fetch_assoc($query_run))
            {
            $totalsal = "100";
            ?>
             <tr>
            <td style="display: none"><?php echo $row['con_id']; ?></td>
            <td><?php echo $row['con_eid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['con_type']; ?></td>
            <td><?php echo $row['con_detail']; ?></td>
            <td><?php echo $row['con_from']; ?></td>
            <td><?php echo $row['con_to']; ?></td>
            <td>
            <?php
              if ($row['con_status'] === 'Unsigned') {
                echo '<span class="badge rounded-pill bg-danger">'.$row['con_status'].'</span>';
              } else if ($row['con_status'] === 'Signed') {
                echo '<span class="badge rounded-pill bg-success">'.$row['con_status'].'</span>';
              } else {
                echo '';
              }
            ?>
            </td>
            <td><?php echo $row['con_sdate']; ?></td>
            <td class="text-end">
              <a href="edit_contract.php?id=<?php echo $row['con_id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
            </td>
             </tr>
              <?php
              }
              }
              else {
              echo "";
              }
              ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

