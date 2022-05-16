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
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Date</th>
            <th>Department</th>
            <th>Time</th>
             </tr>
            </thead>
           <tbody>
                   <?php
        $sclist = "SELECT * FROM users u, sc sc WHERE u.id={$_SESSION['user_id']} AND u.id=sc.sc_ide";
        $sc_list_run = mysqli_query($conn, $sclist);
        
        if(mysqli_num_rows($sc_list_run) > 0 )
        {
        while($row = mysqli_fetch_assoc($sc_list_run))
        {
        ?>
          <tr>
           <td class="text-center"><?php echo $row['sc_id'];?></td>
           <td><?php echo date("F d, Y", strtotime($row['sc_d']));?></td>
           <td><?php echo $row['sc_dpt'];?></td>
           <td><?php echo date("h:i a", strtotime($row['sc_t1']));?> - <?php echo date("h:i a", strtotime($row['sc_t2']));?></td>
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

