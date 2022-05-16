<?php
  $page_title = 'Add Question';
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

  <a href="exam-question.php" class="breadcrumbs__item">Question</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Add Question</a>
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
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Add Question</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Test Name</label>
                    <div class="col-md-8">
                        <?php
                        $resultSet2 = $conn->query("SELECT * FROM mst_test ORDER BY test_id ASC");
                        ?>
                        <select class="form-control" name="test_id">
                        <?php 
                        while ($rows =$resultSet2->fetch_assoc()) {
                        $test_id = $rows['test_id'];
                        $test_name = $rows['test_name'];
                        echo "<option value='$test_id'> $test_name </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Question</label>
                      <div class="col-md-8">
                        <textarea type="text" name="que_desc" class="form-control" placeholder="Input Question" rows="4" cols="50"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Answer #1</label>
                      <div class="col-md-8">
                        <input type="text" name="ans1" class="form-control" placeholder="Input Answer #1">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Answer #2</label>
                      <div class="col-md-8">
                        <input type="text" name="ans2" class="form-control" placeholder="Input Answer #2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Answer #3</label>
                      <div class="col-md-8">
                        <input type="text" name="ans3" class="form-control" placeholder="Input Answer #3">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Answer #4</label>
                      <div class="col-md-8">
                        <input type="text" name="ans4" class="form-control" placeholder="Input Answer #4">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">True Answer</label>
                      <div class="col-md-8">
                        <select name="true_ans" class="form-control">
                          <option value="1">Answer #1</option>
                          <option value="2">Answer #2</option>
                          <option value="3">Answer #3</option>
                          <option value="4">Answer #4</option>
                        </select>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="addtstbtnsw1" class="btn btn-primary text-white">Submit</button>
                      <a href="exam-question.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
