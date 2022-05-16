<?php
  $page_title = 'Salary';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Salary</a>
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
            <th class="text-center">Check</th>
             </tr>
            </thead>
           <tbody>
        <?php
        $sclist = "SELECT * FROM users u, sl sl WHERE u.id={$_SESSION['user_id']} AND u.id=sl.s_ide";
        $sc_list_run = mysqli_query($conn, $sclist);
        
        if(mysqli_num_rows($sc_list_run) > 0 )
        {
        while($row = mysqli_fetch_assoc($sc_list_run))
        {
        ?>
          <tr>
           <td class="text-center"><?php echo $row['s_id'];?></td>
           <td><?php echo date("F d, Y", strtotime($row['s_d']));?></td>
           <td class="text-center">
                <a href="salary_view.php?id=<?php echo $row['s_id'];?>" class="btn btn-xs btn-info">
                  View
                </a>
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

