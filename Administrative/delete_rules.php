<?php
  $page_title = 'Delete Promotion';
  require_once('includes/load.php');
  require_once('includes/config1.php');
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

 
  <a href="#checkout" class="breadcrumbs__item is-active">Delete Promotion</a>
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
        $promotedid = mysqli_real_escape_string($conn, $_GET['id']);

        $query = mysqli_query($conn, "SELECT * FROM rules_and_regulation WHERE id = {$promotedid}");
        $row = mysqli_fetch_array($query);

        ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-danger"><i class="bi bi-trash"></i> Delete Information</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="delete-rules.php" method="POST">
                <input type="hidden" name="del_id" class="form-control" value="<?php echo $row['id'];?>">
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4">Are You Sure You Want To Delete This Information</label>
                    <div class="col-md-12">
                      <button type="submit" name="deleteprmtbtn" class="btn btn-danger text-white">Delete</button>
                      <a href="RequestContract.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
