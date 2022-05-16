<?php
  $page_title = 'Employee Information';
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

  <a href="applicant-list.php" class="breadcrumbs__item">Employee List</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Employee Information</a>
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

  $query = mysqli_query($conn, "SELECT * FROM employees WHERE employee_id = {$applid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-info"><i class="bi bi-eye"></i> Employeee Information</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee ID</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['employee_id']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Firstname</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['first_name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Middlename</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['middle_name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Lastname</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['last_name']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Birthdate</label>
                    <div class="col-md-8">
                      <input type="date" value="<?php echo $row['birth_date']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Gender</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['gender']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Address</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['address']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Contact</label>
                    <div class="col-md-8">
                      <input type="number" value="<?php echo $row['contact_number']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Email</label>
                    <div class="col-md-8">
                      <input type="email" value="<?php echo $row['email']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['designation']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date of Hired</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['date_hired']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
