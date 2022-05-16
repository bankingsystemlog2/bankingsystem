<?php
  $page_title = 'Personal Information';
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

  <a href="#checkout" class="breadcrumbs__item is-active">Personal Information</a>
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

  $query = mysqli_query($conn, "SELECT * FROM users WHERE id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-pencil"></i> Personal Information</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php" method="POST">
                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>">
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Firstname</label>
                    <div class="col-md-8">
                      <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Middlename</label>
                    <div class="col-md-8">
                      <input type="text" name="mname" class="form-control" value="<?php echo $row['mname'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Lastname</label>
                    <div class="col-md-8">
                      <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Birthday</label>
                    <div class="col-md-8">
                      <input type="date" name="bdate" class="form-control" value="<?php echo $row['bdate'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Gender</label>
                    <div class="col-md-8">
                      <input type="text" name="gender" class="form-control" value="<?php echo $row['gender'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Address</label>
                    <div class="col-md-8">
                      <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Contact</label>
                    <div class="col-md-8">
                      <input type="number" name="contact" class="form-control" value="<?php echo $row['contact'];?>">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-4">Email</label>
                    <div class="col-md-8">
                      <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="updateinfonow" class="btn btn-primary text-white">Update</button>
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
