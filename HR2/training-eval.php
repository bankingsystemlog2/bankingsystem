<?php
  $page_title = 'Evaluation';
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
          <a href="add-eval.php" class="btn btn-primary btn-xs-block">
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
            <thead>
              <tr>
                        <th>#</th>
                        <th>Training Name</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Grade #1</th>
                        <th>Grade #2</th>
                        <th>Grade #3</th>
                        <th>Grade #4</th>
                        <th>Grade #5</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
             </tr>
            </thead>
           <tbody>
                    <?php
                    $att_list = "SELECT * FROM users u, teval te WHERE u.id=te.te_eid ORDER BY te_id ASC";
                    $att_list_run = mysqli_query($conn, $att_list);
                    
                    if(mysqli_num_rows($att_list_run) > 0 )
                    {
                    while($row = mysqli_fetch_assoc($att_list_run))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['te_id']; ?></td>
                        <td><?php echo $row['te_tname']; ?></td>
                        <td><?php echo $row['te_eid']; ?></td>
                        <td><?php echo $row['name']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></td>
                        <td><?php echo $row['te_test1']; ?></td>
                        <td><?php echo $row['te_test2']; ?></td>
                        <td><?php echo $row['te_test3']; ?></td>
                        <td><?php echo $row['te_test4']; ?></td>
                        <td><?php echo $row['te_test5']; ?></td>
                        <td><?php echo $row['te_total']; ?></td>
                        <td>
                        <?php
                        if ($row['te_total'] === '5') {
                        echo "Strongly Agree";
                        }
                        else if ($row['te_total'] === '4') {
                        echo "Agree";
                        }
                        else if ($row['te_total'] === '3') {
                        echo "Neutral";
                        }
                        else if ($row['te_total'] === '2') {
                        echo "Disagree";
                        }
                        else if ($row['te_total'] === '1') {
                        echo "Strongly Disagree";
                        }
                        else if ($row['te_total'] === '0') {
                        echo "Failed";
                        }
                        else
                        {
                        echo "No Grade";
                        }
                        ?>
                        </td>
                        <td>
                            <a href="edit-eval.php?id=<?php echo $row['te_id']; ?>" class="btn btn-sm btn-success pull-right">Edit</a>
                            <a href="delete-eval.php?id=<?php echo $row['te_id']; ?>" class="btn btn-sm btn-danger pull-right">Delete</a>
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

