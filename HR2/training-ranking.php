<?php
  $page_title = 'Training Ranking';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Training Ranking</a>
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
  <?php
  $att_list = "SELECT * FROM tcourse tc, teval te WHERE tc.tc_name=te.te_tname GROUP BY te.te_tname";
  $att_list_run = mysqli_query($conn, $att_list);
  
  $i = 1;
  
  if(mysqli_num_rows($att_list_run) > 0 )
  {
  while($row = mysqli_fetch_assoc($att_list_run))
  {
  ?>
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-list"></i> Training Name: <?php echo $row['tc_name']; ?></span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <th>Rank</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Training Name</th>
                <th>Total Grade</th>
              </tr>
            </thead>
           <tbody>
              <?php
              $att_list1 = "SELECT * FROM users u, teval te WHERE u.id=te.te_eid AND te.te_tname='{$row["tc_name"]}' GROUP BY u.id ORDER BY te.te_total DESC";
              $att_list_run1 = mysqli_query($conn, $att_list1);
              
              $i = 1;
              if(mysqli_num_rows($att_list_run1) > 0 )
              {
              while($rows = mysqli_fetch_assoc($att_list_run1))
              {
              ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $rows['te_eid']; ?></td>
                <td><?php echo $rows['name']; ?> <?php echo $rows['mname']; ?> <?php echo $rows['lname']; ?></td>
                <td><?php echo $row['tc_name']; ?></td>
                <td><?php echo $rows['te_total']; ?></td>
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
  <?php
  }
  }
  else {
  echo "";
  }
  ?>
<?php include_once('layouts/footer.php'); ?>

