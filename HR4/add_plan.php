<?php
  $page_title = 'Add Plan';
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
  <a href="#checkout" class="breadcrumbs__item is-active">Add Plan</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Plan</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="add-jobplan.php" method="POST">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Position</label>
                    <div class="col-md-8">
                      <input type="text" name="add_position" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Type (Casual or Regular)</label>
                    <div class="col-md-8">
                      <input type="text" name="add_type" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Experience</label>
                    <div class="col-md-8">
                      <input type="text" name="add_exp" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Rate</label>
                      <div class="col-md-8">
                        <input type="number" name="add_salrate" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Day Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="add_drate" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Hour Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="add_hrate" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Overtime Rate</label>
                    <div class="col-md-8">
                      <input type="number" name="add_otrate" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Philhealth (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="add_ph" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">SSS (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="add_sss" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">PagIbig (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="add_pi" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Tax (Deduction)</label>
                    <div class="col-md-8">
                      <input type="number" name="add_tax" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addjbplnbtn" class="btn btn-primary text-white">Submit</button>
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
