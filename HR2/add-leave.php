<?php
  $page_title = 'Request Leave';
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

  <a href="leave.php" class="breadcrumbs__item">Leave</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Request Leave</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Request Leave</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <input type="hidden" name="lv_ide" value="<?php echo $_SESSION['user_id'];?>" class="form-control">  
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Available Request Only</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="5" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Leave Type</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet = $conn->query("SELECT * FROM lvtype");
                      ?>
                      <select class="form-control" name="lv_tp">
                      <?php 
                      while ($rows =$resultSet->fetch_assoc()) {
                      $lvt = $rows['l_name'];
                      echo "<option value='$lvt'> $lvt </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">From</label>
                    <div class="col-md-8">
                      <input type="date" name="lv_f" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">To</label>
                    <div class="col-md-8">
                      <input type="date" name="lv_t" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Reason</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="lv_r" rows="4" cols="50" placeholder="Enter Reason"></textarea>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addLeaveBtn" class="btn btn-primary text-white">Submit</button>
                      <a href="leave.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
