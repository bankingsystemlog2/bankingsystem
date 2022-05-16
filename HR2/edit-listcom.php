<?php
  $page_title = 'Edit Competent';
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

  <a href="list-com.php" class="breadcrumbs__item">Competent</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Competent</a>
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

  $query = mysqli_query($conn, "SELECT * FROM users u, listcom lc WHERE u.id=lc.lc_eid AND lc.lc_id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Edit Competent</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <input type="hidden" name="listComId" class="form-control" value="<?php echo $row['lc_id'];?>">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Employee</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo $row['name'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Energy</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet5 = $conn->query("SELECT sl_en FROM slcom");
                      ?>
                      <select class="form-control" name="lc_en" id="lc_en">
                      <?php 
                      while ($rows =$resultSet5->fetch_assoc()) {
                      $sl_en = $rows['sl_en'];
                      
                      echo "<option value='$sl_en'> $sl_en </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Motivating</label>
                    <div class="col-md-8">
                      <?php
                      $resultSet6 = $conn->query("SELECT sl_mot FROM slcom");
                      ?>
                      <select class="form-control" name="lc_mot" id="lc_mot">
                      <?php 
                      while ($rows =$resultSet6->fetch_assoc()) {
                      $sl_mot = $rows['sl_mot'];
                      
                      echo "<option value='$sl_mot'> $sl_mot </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Adaptability</label>
                      <div class="col-md-8">
                      <?php
                      $resultSet7 = $conn->query("SELECT sl_ad FROM slcom");
                      ?>
                      <select class="form-control" name="lc_ad" id="lc_ad">
                      <?php 
                      while ($rows =$resultSet7->fetch_assoc()) {
                      $sl_ad = $rows['sl_ad'];
                      
                      echo "<option value='$sl_ad'> $sl_ad </option>";
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editbtnListcomnews" class="btn btn-primary text-white">Submit</button>
                      <a href="list-com.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

        <script>
        $(document).ready(function () {
            $('.ediListcomBtn').on('click', function() {
                
                $('#modalForEditListcom').modal('show');
                
                $tr = $(this).closest('tr');
                
                var data = $tr.children("td").map(function() {
                return $(this).text();
                }).get();
                
                console.log(data);
                
                $('#listComId').val(data[0]);
                $('#empid').val(data[1]);
                $('#empname').val(data[2]);
                $('#lc_en').val(data[3]);
                $('#lc_mot').val(data[4]);
                $('#lc_ad').val(data[5]);
            });
        });
        </script>

<?php include_once('layouts/footer.php'); ?>
