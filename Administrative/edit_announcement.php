<?php
  $page_title = 'Edit Announcement';
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

 
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Information</a>
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
  require_once('includes/config1.php');
  $resignid = mysqli_real_escape_string($conn, $_GET['id']);

  $query = mysqli_query($conn, "SELECT * FROM com_announcement WHERE id = {$resignid}");
  $row = mysqli_fetch_array($query);
  ?>

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Edit Anouncement Information</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-7">
            <div class="card-box">
              <form action="edit-announcement.php" method="POST">
			  
			  <div class="form-group row">
                  <label class="col-form-label col-md-4">Id</label>
                    <div class="col-md-8">
                <input type="text" name="" value="<?php echo $row['id']; ?>" class="form-control" disabled>
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
				 </div>
                  </div>
				<br>
				
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Title</label>
                    <div class="col-md-8">
                      <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control ">
                    </div>
                  </div>
				  
				  <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Description</label>
                    <div class="col-md-8">
                      <input type="text" name="description" value="<?php echo $row['description']; ?>" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="updtplanbtn" class="btn btn-primary text-white">Save</button>
                      <a href="create-anouncement.php" class="btn btn-secondary text-white" data-dismiss="modal">Back</a>
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
