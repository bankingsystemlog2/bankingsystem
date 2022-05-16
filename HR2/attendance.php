<?php
  $page_title = 'Attendance';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Attendance</a>
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
            <th>In</th>
            <th>Out</th>
            <th class="text-center">Status</th>
             </tr>
            </thead>
           <tbody>
                   <?php
        $att_list = "SELECT *, MAX(att_d) AS maxdate, MAX(att_i) AS maxin, MAX(att_o) AS maxout FROM users u, att a WHERE u.id={$_SESSION['user_id']} AND u.id=a.att_ide GROUP BY a.att_d ORDER BY a.att_d ASC";
        $att_list_run = mysqli_query($conn, $att_list);
        
        if(mysqli_num_rows($att_list_run) > 0 )
        {
        while($row = mysqli_fetch_assoc($att_list_run))
        {
        ?>
          <tr>
           <td class="text-center"><?php echo $row['att_id'];?></td>
           <td><?php echo date("F d, Y", strtotime($row['maxdate']));?></td>
           <td>
               <?php 
               if(empty($row['maxin'])) {
                   echo "";
               } else {
               echo date("h:i:s a", strtotime($row['maxin']));
               }
               ?>
            </td>
           <td>
               <?php 
               if(empty($row['maxout'])) {
                   echo "";
               } else {
               echo date("h:i:s a", strtotime($row['maxout']));
               }
               ?>               </td>
           <td class="text-center">
           <?php if($row['att_s'] === 'Present') {
                echo '<span class="badge rounded-pill bg-success">Present</span>';
           } elseif($row['att_s'] === 'Absent') {
                echo '<span class="badge rounded-pill bg-danger">Absent</span>';
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

