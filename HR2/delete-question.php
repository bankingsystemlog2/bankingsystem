<?php
  $page_title = 'Delete Subject';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $Table="collection";
   $row=Recievables();
?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->

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

  $query = mysqli_query($conn, "SELECT * FROM questionaires WHERE id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-danger"><i class="bi bi-trash"></i> Delete Question</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <input type="hidden" name="delId" class="form-control" value="<?php echo $_GET['id'];?>">
                <input type="hidden" name="page" value="<?php echo $_GET['page']?>">
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4">Are You Sure You Want To Delete This question?</label>
                    <div class="col-md-12">
                      <button type="submit" name="delsubjntniai" class="btn btn-danger text-white">Delete</button>
                      <a href="<?php echo $_GET['page']?>" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
