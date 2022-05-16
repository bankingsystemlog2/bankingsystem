<?php
  $page_title = 'Edit Qualification';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

   

?>
<?php include_once('layouts/header.php'); ?>
<!-- Breadcrumb -->
<nav class="breadcrumbs">
 
    <a href="hr_qualification.php" class="breadcrumbs__item">Back</a>
  <a href="#checkout" class="breadcrumbs__item is-active">Edit Qualification</a>
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

  $query = mysqli_query($conn, "SELECT * FROM job_qualifications WHERE id = {$conid}");
  $row = mysqli_fetch_array($query);
  ?>
  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-plus"></i> Edit Qualification</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-box">
              <form action="hr2-codes.php?" method="POST">
               
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Job title</label>
                      <div class="col-md-8">
                        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <input type="text" name="jt" class="form-control" value="<?php echo $row['job_title']?>" required>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    <label class="col-form-label col-md-4">Job Description</label>
                      <div class="col-md-8">
                        <input type="text" name="jd" class="form-control" value="<?php echo $row['job_desc']?>" required>
                    </div>
                  </div> <br>
                  <div class="form-group row">
                    
                    <label class="col-form-label col-md-4">Job qualification</label>
                    <div class="col-md-8">
                      <input type="text" name="jq" class="form-control" value="<?php echo $row['job_quali']?>" requireds>
                    </div>
                  </div> <br>
                   <div class="form-group row">
                    <label class="col-form-label col-md-4">Salary</label>
                      <div class="col-md-8">
                        <input type="text" name="sal" class="form-control" value="<?php echo $row['salary']?>" required>
                    </div>
                  </div><br>
                  <br>
                  <div class="form-group row mt-10">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                      <button type="submit" name="editquali" class="btn btn-primary text-white">Submit</button>
                     
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
