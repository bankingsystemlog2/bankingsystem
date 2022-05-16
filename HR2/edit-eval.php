<?php
  $page_title = 'Edit Evaluation';
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

  <a href="training-eval.php" class="breadcrumbs__item">Evaluation</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Evaluation</a>
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

  $query = mysqli_query($conn, "SELECT * FROM users u, teval te WHERE u.id=te.te_eid AND te.te_id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Edit Evaluation</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <input type="hidden" name="teEdtid" class="form-control" value="<?php echo $row['te_id'];?>">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Training Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo $row['te_tname'];?>" disabled>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo $row['name'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Grade#1 (0 or 1)</label>
                    <div class="col-md-8">
                      <input type="number" name="te_test1" class="form-control" value="<?php echo $row['te_test1'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Grade#2 (0 or 1)</label>
                    <div class="col-md-8">
                      <input type="number" name="te_test2" class="form-control" value="<?php echo $row['te_test2'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Grade#3 (0 or 1)</label>
                    <div class="col-md-8">
                      <input type="number" name="te_test3" class="form-control" value="<?php echo $row['te_test3'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Grade#4 (0 or 1)</label>
                    <div class="col-md-8">
                      <input type="number" name="te_test4" class="form-control" value="<?php echo $row['te_test4'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Grade#5 (0 or 1)</label>
                    <div class="col-md-8">
                      <input type="number" name="te_test5" class="form-control" value="<?php echo $row['te_test5'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Total (1 to 5)</label>
                    <div class="col-md-8">
                      <input type="number" name="te_total" class="form-control" value="<?php echo $row['te_total'];?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editbtnEvalnews" class="btn btn-primary text-white">Submit</button>
                      <a href="training-eval.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
