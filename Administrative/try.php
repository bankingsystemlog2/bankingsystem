<?php
  $page_title = 'Applicant List';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
   $all_contractrequest = find_all('contractrequest');
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Applicant List</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-list"></i> Applicant List</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT * FROM contractrequest";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
              <tr>
                <th style="display: none">#</th>
                <th>department</th>
                
                <th>Status</th>
                <th class="text-end">Action</th>
             </tr>
            </thead>
           <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 )
            {
            while($row = mysqli_fetch_assoc($query_run))
            {
            ?>
             <tr>
            <td style="display: none"><?php echo $row['id']; ?></td>
            <td><?php echo $row['department']; ?></td>
            
            <td>
            <?php
              if ($row['app_status'] === 'New') {
                echo '<span class="badge rounded-pill bg-secondary">'.$row['app_status'].'</span>';
              } else if ($row['app_status'] === 'Approved') {
                echo '<span class="badge rounded-pill bg-success">'.$row['app_status'].'</span>';
              } else if ($row['app_status'] === 'Reject') {
                echo '<span class="badge rounded-pill bg-danger">'.$row['app_status'].'</span>';
              } else {
                echo '';
              }
            ?>
            </td>
            <td class="text-end">
              <a href="edit_applicant.php?id=<?php echo $row['app_id'];?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
              <a href="view_applicant.php?id=<?php echo $row['app_id'];?>" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
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

