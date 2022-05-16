<?php
  $page_title = 'Promoted List';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Promoted List</a>
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
          <a href="add_promotion.php" class="btn btn-primary btn-xs-block" type="button">
         <i class="bi bi-plus"></i>
          Add Promotion
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT * FROM promoted p, users u WHERE p.pr_eid=u.employee_id ORDER BY pr_id ASC";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                <th style="display: none">#</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>From</th>
                <th>To</th>
                <th>Promotion Date</th>
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
            <td style="display: none"><?php echo $row['pr_id']; ?></td>
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['pr_from']; ?></td>
            <td><?php echo $row['pr_to']; ?></td>
            <td><?php echo $row['pr_date']; ?></td>
            <td class="text-end">
              <a href="edit_promotion.php?id=<?php echo $row['pr_id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
              <a href="delete_promotion.php?id=<?php echo $row['pr_id']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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

