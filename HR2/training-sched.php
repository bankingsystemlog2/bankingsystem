<?php
  $page_title = 'Schedule';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Schedule</a>
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
          <a href="add-sched.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Schedule
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
                        <th>Sched ID</th>
                        <th>Training Name</th>
                        <th>Max Participants</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Participants</th>
                        <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT *,GROUP_CONCAT(name,mname,lname SEPARATOR '<br>') AS part FROM users u, tsched ts WHERE u.id=ts.ts_part AND NOT ts_status='DISAB' GROUP BY ts.ts_sid";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['ts_id']; ?></td>
                        <td><?php echo $row['ts_sid']; ?></td>
                        <td><?php echo $row['ts_name']; ?></td>
                        <td><?php echo $row['ts_maxtrain']; ?></td>
                        <td><?php echo $row['ts_from']; ?></td>
                        <td><?php echo $row['ts_to']; ?></td>
                        <td><?php echo $row['ts_status']; ?></td>
                        <td><?php echo $row['part']; ?></td>
                        <td>
                            <a href="add-part.php?id=<?php echo $row['ts_id']; ?>" class="btn btn-sm btn-success pull-right">Add</a>
                            <a href="delete-sched.php?id=<?php echo $row['ts_id']; ?>" class="btn btn-sm btn-danger pull-right">Delete</a>
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

