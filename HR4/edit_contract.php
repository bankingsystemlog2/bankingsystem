<?php
  $page_title = 'Edit Contract';
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

  <a href="contract.php" class="breadcrumbs__item">Contract</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Contract</a>
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
  $conid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM contract c, users u WHERE u.employee_id=c.con_eid AND c.con_id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Contract</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="update-contract.php" method="POST">
                <input type="hidden" name="e_id" value="<?php echo $row['con_id'];?>" class="form-control">
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee Name</label>
                    <div class="col-md-8">
                      <input type="text" value="<?php echo $row['name'];?>" class="form-control" disabled>
                    </div>
                  </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee ID</label>
                    <div class="col-md-8">
                      <input type="text" name="e_eid" value="<?php echo $row['con_eid'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Contract Type</label>
                    <div class="col-md-8">
                      <input type="text" name="e_type" value="<?php echo $row['con_type'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Contract Details</label>
                    <div class="col-md-8">
                      <input type="text" name="e_detail" value="<?php echo $row['con_detail'];?>" class="form-control" rows="4" cols="50">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Duration From</label>
                    <div class="col-md-8">
                      <input type="date" name="e_from" value="<?php echo $row['con_from'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Duration To</label>
                    <div class="col-md-8">
                      <input type="date" name="e_to" value="<?php echo $row['con_to'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Status (Unsigned or Signed)</label>
                    <div class="col-md-8">
                      <input type="text" name="e_status" value="<?php echo $row['con_status'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date Signed</label>
                    <div class="col-md-8">
                      <input type="date" name="e_sdate" value="<?php echo $row['con_sdate'];?>" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editcontractbtn" class="btn btn-primary text-white">Submit</button>
                      <a href="contract.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
