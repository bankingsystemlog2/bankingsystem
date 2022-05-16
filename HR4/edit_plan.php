<?php
  $page_title = 'Edit Plan';
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

  <a href="job-planning.php" class="breadcrumbs__item">Job Planning</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Plan</a>
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
  $jobplan = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM jobplan WHERE jp_id = {$jobplan}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Plan</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-plan.php" method="POST">
                <input type="hidden" name="e_id" value="<?php echo $row['jp_id']; ?>" class="form-control">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <input type="text" name="e_position" value="<?php echo $row['jp_position']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Type (Casual or Regular)</label>
                    <div class="col-md-8">
                      <input type="text" name="e_type" value="<?php echo $row['jp_type']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Experience</label>
                    <div class="col-md-8">
                      <input type="text" name="e_exp" value="<?php echo $row['jp_exp']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Rate</label>
                      <div class="col-md-8">
                        <input type="number" name="e_salrate" value="<?php echo $row['jp_salrate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Day Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="e_drate" value="<?php echo $row['jp_drate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Hour Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="e_hrate" value="<?php echo $row['jp_hrate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Overtime Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="e_otrate" value="<?php echo $row['jp_otrate']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Philhealth (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_ph" value="<?php echo $row['jp_ph']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">SSS (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_sss" value="<?php echo $row['jp_sss']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">PagIbig (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_pi" value="<?php echo $row['jp_pi']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Tax (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_tax" value="<?php echo $row['jp_tax']; ?>" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="updtplanbtn" class="btn btn-primary text-white">Save</button>
                      <a href="job-planning.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
