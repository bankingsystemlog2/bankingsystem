<?php
  $page_title = 'Evaluation of Employee';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Evaluation</a>
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
          <a href="add-evaluation.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Add Evaluation
         </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT * FROM jobplan";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                <th>#</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Training Grade</th>
                <th>Exam Grade</th>
                <th>Total</th>
                <th>Status</th>
                <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT * FROM users u, evalcom ec WHERE u.id=ec.ec_eid ORDER BY ec_id ASC";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['ec_id']; ?></td>
                        <td><?php echo $row['ec_eid']; ?></td>
                        <td><?php echo $row['name']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></td>
                        <td><?php echo $row['ec_gt']; ?></td>
                        <td><?php echo $row['ec_ge']; ?></td>
                        <td><?php echo $row['ec_total']; ?></td>
                        <td>
                        <?php
                        if ($row['ec_total'] > 75) {
                        echo "Qualified";
                        }
                        else if ($row['ec_total'] < 75 ) {
                        echo "Not Qualified";
                        }
                        else
                        {
                        echo "";
                        }
                        ?>
                        </td>
                        <td>
                            <a href="edit-evaluation.php?id=<?php echo $row['ec_id']; ?>" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete-evaluation.php?id=<?php echo $row['ec_id']; ?>" class="btn btn-sm btn-danger pull-right">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    }
                    else {
                    echo "No Record";
                    }
                    ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

