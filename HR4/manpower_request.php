<?php
  $page_title = 'Manpower request';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Manpower request</a>
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
        <span class="badge rounded-pill bg-success"><i class="bi bi-list"></i> Manpower Request</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <?php
            $query = "SELECT * FROM job_vacancy";
             $res = $db->query($query);
			$row = $res->fetch_assoc();
			$num = $res->num_rows;
            ?>
            <thead>
              <tr>
                <th style="display: none">Request_ID</th>
                <th>Job Title</th>
				<th>People Needed</th>
                <th>Date of Request</th>
				<th>Status</th>
                <th class="text-end">Action</th>
             </tr>
            </thead>
           <tbody>
            <?php
            if($num > 0 )
            {
            do{
            
            
            ?>
             <tr>
            <td style="display: none"><?php echo $row['job_id']; ?></td>
            <td><?php echo $row['job_title']; ?></td>
            <td><?php echo $row['no_of_vacancy']; ?></td>
            <td><?php echo $row['date_of_request']; ?></td>
            
            <td>
            <?php
              if ($row['status'] === 'pending') {
                echo '<span class="badge rounded-pill bg-warning">'.$row['status'].'</span>';
              } else if ($row['status'] === 'approved') {
                echo '<span class="badge rounded-pill bg-success">'.$row['status'].'</span>';
              } else if ($row['status'] === 'declined') {
                echo '<span class="badge rounded-pill bg-danger">'.$row['status'].'</span>';
              } else {
                echo '';
              }
            ?>
            </td>
            <td class="text-end">
              <a href="view_mp.php?id=<?php echo $row['job_id']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
			   
            </td>
             </tr>
             <?php
              
              }while($row = $res->fetch_assoc());
			}else {
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

