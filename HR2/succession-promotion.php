<?php
  $page_title = 'Succession Promotion';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Succession Promotion</a>
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
          <a href="add-promotion.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Promotion
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                        <th>#</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Promotion Type</th>
                        <th>Date Effective</th>
                        <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT * FROM users u, prom p WHERE u.id=p.p_eid ORDER BY p_id ASC";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['p_id']; ?></td>
                        <td><?php echo $row['p_eid']; ?></td>
                        <td><?php echo $row['name']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></td>
                        <td><?php echo $row['p_type']; ?></td>
                        <td><?php echo $row['p_date']; ?></td>
                        <td>
                            <a href="edit-promotion.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete-promotion.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-danger pull-right">Delete</a>
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

