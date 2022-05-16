<?php
  $page_title = 'Edit Promotion';
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

  <a href="succession-promotion.php" class="breadcrumbs__item">Promotion</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Promotion</a>
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

  $query = mysqli_query($conn, "SELECT * FROM users u, prom p WHERE u.id=p.p_eid AND p.p_id = {$conid}");
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
                <input type="hidden" name="promId" class="form-control" value="<?php echo $row['p_id'];?>">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo $row['name'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Promotion Type</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet = $conn->query("SELECT * FROM promsl");
                      ?>
                      <select class="form-control" name="p_type" id="p_type">
                      <?php 
                      while ($rows =$resultSet->fetch_assoc()) {
                      $ptype = $rows['psl_name'];
                      echo "<option value='$ptype'> $ptype </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Date Effective</label>
                      <div class="col-md-8">
                        <input type="date" name="p_date" class="form-control" value="<?php echo $row['p_date'];?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editBtnProm" class="btn btn-primary text-white">Submit</button>
                      <a href="succession-promotion.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
