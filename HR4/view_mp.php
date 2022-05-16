<?php
  $page_title = 'Manpower request info';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
   
   $id = $_GET['id'];
    $query = "SELECT * FROM job_vacancy WHERE job_id = '$id'";
             $res = $db->query($query);
			$row = $res->fetch_assoc();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">View Request</a>
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
       <div class="form-group row">
                  <label class="col-form-label col-md-4">Request ID</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['job_id']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Title</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['job_title']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Description</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['job_description']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Qualification</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['job_qualification']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['salary']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Department</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['department']; ?>" class="form-control" disabled>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee needed</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['no_of_vacancy']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date of Request</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['date_of_request']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Status</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['status']; ?>" class="form-control" disabled>
                    </div>
                  </div>
				  <?php if($row['status'] == 'pending'){ ?>
				  
				   <div class="form-group row">
				      <div class="col-md-8">
					  
                <a href="approve_job.php?id=<?php echo $row['job_id']?>" class="btn btn-sm btn-success"><i class="bi bi-check"></i></a>
			    <a href="decline_job.php?id=<?php echo $row['job_id']?>" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                    </div>
				   </div>
				   
				  <?php } ?>
        
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

