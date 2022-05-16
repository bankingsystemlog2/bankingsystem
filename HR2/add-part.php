<?php
  $page_title = 'Add Participant';
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
  <a href="#checkout" class="breadcrumbs__item is-active">Add Participant</a>
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

  $query = mysqli_query($conn, "SELECT *,GROUP_CONCAT(name,mname,lname SEPARATOR '<br>') AS part FROM users u, tsched ts WHERE u.id=ts.ts_part AND ts.ts_id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Participant</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Schedule ID</label>
                    <div class="col-md-8">
                      <input type="text" name="ts_sid" class="form-control" value="<?php echo $row['ts_sid'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Training Name</label>
                    <div class="col-md-8">
                      <input type="text" name="ts_name" class="form-control" value="<?php echo $row['ts_name'];?>">
                    </div>
                  </div>
                  <input type="hidden" name="ts_maxtrain" value="<?php echo $row['ts_maxtrain'];?>">
                  <input type="hidden" name="ts_from" value="<?php echo $row['ts_from'];?>">
                  <input type="hidden" name="ts_to" value="<?php echo $row['ts_to'];?>">
                  <input type="hidden" name="ts_status" value="<?php echo $row['ts_status'];?>">
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Participant</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet4 = $conn->query("SELECT * FROM users WHERE NOT user_level='1' ORDER BY id ASC");
                      ?>
                      <select class="form-control" name="ts_part">
                      <?php 
                      while ($rows =$resultSet4->fetch_assoc()) {
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
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addnewsched" class="btn btn-primary text-white">Submit</button>
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
