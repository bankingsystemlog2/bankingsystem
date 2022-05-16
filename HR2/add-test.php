<?php
  $page_title = 'Add Test';
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

  <a href="exam-test.php" class="breadcrumbs__item">Test</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Test</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Test</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Subject Name</label>
                    <div class="col-md-8">
                        <?php
                        $resultSet = $conn->query("SELECT * FROM mst_subject ORDER BY sub_id ASC");
                        ?>
                        <select class="form-control" name="sub_id">
                        <?php 
                        while ($rows =$resultSet->fetch_assoc()) {
                        $sub_id = $rows['sub_id'];
                        $sub_name = $rows['sub_name'];
                        echo "<option value='$sub_id'> $sub_name </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Test Name</label>
                      <div class="col-md-8">
                        <input type="text" name="test_name" class="form-control" placeholder="Input Test Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Total Question</label>
                      <div class="col-md-8">
                        <input type="number" name="total_que" class="form-control" placeholder="Input Total Question">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addtstbtnsw" class="btn btn-primary text-white">Submit</button>
                      <a href="exam-test.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
