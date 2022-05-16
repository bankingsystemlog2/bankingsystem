<?php
  $page_title = 'Edit Salary';
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

  <a href="payroll.php" class="breadcrumbs__item">Payroll</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Salary</a>
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
  include('function.php');
  $payid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM payroll p, users u, jobplan jp WHERE p.p_eid=u.employee_id AND jp.jp_position=u.position AND jp.jp_type=u.type AND p.p_id = {$payid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Salary</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-salary.php" method="POST">
                <input type="hidden" name="e_id" class="form-control" value="<?php echo $row['p_id'];?>">
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee Name</label>
                    <div class="col-md-8">
                      <input type="name" class="form-control" value="<?php echo $row['name'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee ID</label>
                    <div class="col-md-8">
                      <input type="name" class="form-control" value="<?php echo $row['employee_id'];?>" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Overtime (Numbers Of Hours)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_ot" class="form-control" value="<?php echo $row['p_ot'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Basic Salary (Numbers Of Hours)</label>
                    <div class="col-md-8">
                      <input type="number" name="e_bs" class="form-control" value="<?php echo $row['p_bs'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">House And Rent Allowance (H.R.A)</label>
                      <div class="col-md-8">
                        <input type="number" name="e_hra" class="form-control" value="<?php echo $row['p_hra'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Conveyance</label>
                    <div class="col-md-8">
                      <input type="number" name="e_con" class="form-control" value="<?php echo $row['p_con'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Other Allowance</label>
                    <div class="col-md-8">
                      <input type="number" name="e_oa" class="form-control" value="<?php echo $row['p_oa'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary Date</label>
                    <div class="col-md-8">
                      <input type="date" name="e_pdate" class="form-control" value="<?php echo $row['p_date'];?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editsalbtn" class="btn btn-primary text-white">Save</button>
                      <a href="payroll.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
