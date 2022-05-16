<?php
  $page_title = 'Leave';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Leave</a>
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
          <a href="add-leave.php" class="btn btn-primary btn-xs-block">
         <i class="bi bi-plus"></i>
          Request Leave
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
            <th class="text-center" style="width: 50px;">#</th>
            <th>Leave Type </th>
            <th>From</th>
            <th>To</th>
            <th>Reason</th>
            <th class="text-center">Status</th>
             </tr>
            </thead>
           <tbody>
                    <?php
        $lvlist = "SELECT * FROM lv l, users u WHERE l.lv_ide=u.id AND l.lv_ide={$_SESSION['user_id']} ORDER BY l.lv_id ASC";
        $lv_list_run = mysqli_query($conn, $lvlist);
        
        if(mysqli_num_rows($lv_list_run) > 0 )
        {
        while($row = mysqli_fetch_assoc($lv_list_run))
        {
        ?>
          <tr>
           <td class="text-center"><?php echo $row['lv_id'];?></td>
           <td><?php echo $row['lv_tp'];?></td>
           <td><?php echo $row['lv_f'];?></td>
           <td><?php echo $row['lv_t'];?></td>
           <td><?php echo $row['lv_r'];?></td>
           <td class="text-center">
           <?php if($row['lv_s'] === 'Approved') {
                echo '<span class="badge rounded-pill bg-success">Approved</span>';
           } elseif($row['lv_s'] === 'Pending') {
                echo '<span class="badge rounded-pill bg-warning">Pending</span>';
           } else {
               echo '';
           }?>
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

