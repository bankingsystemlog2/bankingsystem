<?php
  $page_title = 'Employee Leave';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $id = $_GET['id'];
    
?>



<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="applicant-list.php" class="breadcrumbs__item">Employee List</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Employee</a>
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
  $applid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT tblleaves.*, employees.* FROM tblleaves JOIN employees ON tblleaves.employee_id = employees.employee_id WHERE tblleaves.employee_id = {$applid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> View Employee Leave</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-applicant.php" method="POST">
                <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>" class="form-control">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee ID</label>
                    <div class="col-md-8">
                      <input type="text"  value="<?php echo $row['employee_id']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Firstname</label>
                    <div class="col-md-8">
                      <input type="text"  name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Middlename</label>
                    <div class="col-md-8">
                      <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Lastname</label>
                    <div class="col-md-8">
                      <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Leave Type</label>
                    <div class="col-md-8">
                      <input type="date" name="birth_date" value="<?php echo $row['LeaveType']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Leave Description</label>
                    <div class="col-md-8">
                      <input type="text" name="gender" value="<?php echo $row['Description']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">From</label>
                    <div class="col-md-8">
                      <input type="text" name="address" value="<?php echo $row['FromDate']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">To</label>
                    <div class="col-md-8">
                      <input type="text" name="contact" value="<?php echo $row['ToDate']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Amount of Day</label>
                    <div class="col-md-8">
                      <input type="text" name="email" value="<?php echo $row['amount_of_days']; ?>" class="form-control" disabled>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label class="col-form-label col-md-4">Days Remaining</label>
                    <div class="col-md-8">
                      <input type="text" name="rel" value="<?php echo $row['remaining_days']; ?>" class="form-control" disabled>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label class="col-form-label col-md-4">Admin Remarks</label>
                    <div class="col-md-8">
                      <input type="text" name="cs" value="<?php echo $row['AdminRemark']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Admin Remark Date</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['AdminRemarkDate']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Status</label>
                    <div class="col-md-8">
                      <input type="text" name="date_hired" value="<?php echo $row['Status']; ?>" class="form-control" disabled >
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      
                      <a href="emp_leave.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>