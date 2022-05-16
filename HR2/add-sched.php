<?php
  $page_title = 'Add Schedule';
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

  <a href="training-sched.php" class="breadcrumbs__item">Schedule</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Schedule</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Schedule</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Schedule ID</label>
                    <div class="col-md-8">
                      <input type="text" name="ts_sid" class="form-control" placeholder="Input Schedule ID">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Training Name</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet2 = $conn->query("SELECT * FROM tcourse ORDER BY tc_name ASC");
                      ?>
                      <select class="form-control" name="ts_name">
                      <?php 
                      while ($rows =$resultSet2->fetch_assoc()) {
                      $tname = $rows['tc_name'];
                      echo "<option value='$tname'> $tname </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Participant</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet = $conn->query("SELECT * FROM users WHERE NOT user_level='1' ORDER BY id ASC");
                      ?>
                      <select class="form-control" name="ts_part">
                      <?php 
                      while ($rows =$resultSet->fetch_assoc()) {
                      $user_id = $rows['id'];
                      $pname = $rows['name'];
                      $pmname = $rows['mname'];
                      $plname = $rows['lname'];
                      echo "<option value='$user_id'> $pname $pmname $plname </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Max</label>
                      <div class="col-md-8">
                        <input type="number" name="ts_maxtrain" class="form-control" placeholder="Input Max Participants">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">From</label>
                      <div class="col-md-8">
                        <input type="date" name="ts_from" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">To</label>
                      <div class="col-md-8">
                        <input type="date" name="ts_to" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Status</label>
                      <div class="col-md-8">
                        <select class="form-control" name="ts_status" required="">
                          <option value="Active">Active</option>
                          <option value="Inactive">Inactive</option> 
                        </select>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addSchedPartbtn" class="btn btn-primary text-white">Submit</button>
                      <a href="training-sched.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
